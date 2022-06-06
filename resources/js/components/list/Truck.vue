<template>
  <div>
    <div class="px-4 py-4 d-flex justify-content-between">
      <h5>
        <strong>Caminhões Cadastrados</strong>
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
        <tr>
          <th>N°</th>
          <th>Caminhão</th>
          <th>Empresa Proprietária</th>
          <th>Placa</th>
          <th>Renavam</th>
          <th>Marca</th>
          <th>Cor</th>
          <th>Cidade</th>
          <th>Chassi</th>
          <th>Modelo</th>
          <th>Estado</th>
          <th>País</th>
          <th>Tecnologia</th>
          <th>Ano de Fabricação</th>
          <th>Ano do Modelo</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items.data" :key="item.id">
          <td>{{item.id}}</td>
          <td v-if="item.truck.typetruck == 'CRT'">Carreta</td>
          <td v-if="item.truck.typetruck == 'CLS'">Carreta LS {{item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'VDL'">Vanderléia {{ item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'BRT'">Bitrem {{ item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'RTM'">Rodotrem {{ item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'TCK'">Truck {{item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'BTK'">Bitruck {{item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'VLC'">VLC {{item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'TPQ'">3 {{item.truck.description}}/4</td>
          <td v-if="item.truck.typetruck == 'TRC'">Toco {{ item.truck.description}}</td>
          <td>{{item.company.corporative_name}}</td>
          <td>{{item.board}}</td>
          <td>{{item.renavam}}</td>
          <td>{{item.brand}}</td>
          <td>{{item.color}}</td>
          <td>{{item.city}}</td>
          <td>{{item.chassi}}</td>
          <td>{{item.model}}</td>
          <td>{{item.state}}</td>
          <td>{{item.country}}</td>
          <td>{{item.technology}}</td>
          <td>{{item.year_of_manufacture}}</td>
          <td>{{item.year_of_model}}</td>
          <td>
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
        .get("/api/companytrucks", {
          params: {
            page: this.page,
          },
        })
        .then((res) => {
          this.items = res.data;
        });
    },
  },
};
</script>

