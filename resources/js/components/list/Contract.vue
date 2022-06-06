<template>
  <div>
    <div class="px-4 py-4 d-flex justify-content-between">
      <h5>
        <strong>Contratos de Serviço</strong>
      </h5>
      <pagination
        :data="items"
        @pagination-change-page="load"
        :limit="5"
        align="right"
        size="small"
      />
    </div>
    <table class="table table-striped table-responsive-md table-sm">
      <thead>
        <th>CONTRATANTE</th>
        <th>CONTRATADO</th>
        <th>VEÍCULO</th>
        <th>SERVIÇO CONTRATADO</th>
        <th>ORDENS DE COLETA RELACIONADAS</th>
        <th></th>
      </thead>
      <tbody>
        <tr v-for="item in items.data" :key="item.id">
          <td v-for="item in companies" :key="item.id" :value="item.id">{{ item.corporative_name }}</td>
          <td v-for="item in clients" :key="item.id" :value="item.id">{{ item.name }}</td>
          <div v-for="item in trucks" :key="item.id" :value="item.id">
            <td v-if="item.typetruck == 'CRT'">Carreta</td>
            <td v-if="item.typetruck == 'CLS'">Carreta LS</td>
            <td v-if="item.typetruck == 'VDL'">Vanderléia</td>
            <td v-if="item.typetruck == 'BRT'">Bitrem</td>
            <td v-if="item.typetruck == 'RTM'">Rodotrem</td>
            <td v-if="item.typetruck == 'TCK'">Truck</td>
            <td v-if="item.typetruck == 'BTK'">Bitruck</td>
            <td v-if="item.typetruck == 'VLC'">VLC</td>
            <td v-if="item.typetruck == 'TPQ'">3/4</td>
            <td v-if="item.typetruck == 'TRC'">Toco</td>
          </div>
          <td>{{item.services}}</td>
          <td>{{item.collect}}</td>
          <td class="text-right">
            <a
              @click.prevent="del( item.id )"
              class="btn btn-danger btn-sm fa fa-trash nav-icon"
              href="#"
            ></a>
            <a @click.prevent="edit( item.id )" class="btn btn-primary btn-sm nav-icon" href="#">
              <i class="fa fa-edit"></i>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    items: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      items: {},
      trucks: [],
      companies: [],
      clients: [],
    };
  },
  methods: {
    del: function (id) {
      this.$emit("del", id);
    },
    edit: function (id) {
      this.$emit("edit", id);
    },
    load: function (page = 1) {
      this.page = page;
      axios
        .get("/api/companies", {
          params: {
            page: this.page,
          },
        })
        .then((res) => {
          this.items = res.data;
        });
    },
    loadTruck: function () {
      axios
        .get("/api/trucks")
        .then((res) => {
          this.trucks = res.data.data;
        })
        .catch((err) => {
          console.error(err);
        });
    },
    loadCompany: function () {
      axios
        .get("/api/companies")
        .then((res) => {
          this.companies = res.data.data;
        })
        .catch((err) => {
          console.error(err);
        });
    },
    loadClient: function () {
      axios
        .get("/api/clients")
        .then((res) => {
          this.clients = res.data.data;
        })
        .catch((err) => {
          console.error(err);
        });
    },
    loadData: function () {
      this.loadCompany();
      this.loadClient();
      this.loadTruck();
    },
  },
  mounted() {
    this.loadData();
  },
};
</script>

