<template>
  <div>
    <div class="px-4 py-4 d-flex justify-content-between">
      <h5>
        <strong>Minhas Cotações</strong>
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
          <th>ORIGEM</th>
          <th>DESTINO</th>
          <th>DISTÂNCIA</th>
          <th>E-MAIL</th>
          <th>CELULAR</th>
          <th>TELEFONE</th>
          <!--<th>CAMINHÃO</th> -->
          <th>PESO</th>
          <!-- <th>EMPRESA</th> -->
          <th>VALOR</th>
          <th>SEGURO</th>
          <!-- <th class="text-center">STATUS</th> -->
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items.data" :key="item.id">
          <td>{{item.origin}}</td>
          <td>{{item.destination}}</td>
          <td>{{item.distance}} km</td>
          <td>{{item.email}}</td>
          <td>{{item.cellphone}}</td>
          <td>{{item.telephone}}</td>
          <!-- <td>{{item.truck_id}}</td> -->
          <!-- <td v-if="item.truck.typetruck == 'CRT'">Carreta</td>
          <td v-if="item.truck.typetruck == 'CLS'">Carreta LS - {{item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'VDL'">Vanderléia - {{ item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'BRT'">Bitrem - {{ item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'RTM'">Rodotrem - {{ item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'TCK'">Truck - {{item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'BTK'">Bitruck - {{item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'VLC'">VLC - {{item.truck.description}}</td>
          <td v-if="item.truck.typetruck == 'TPQ'">3/4 - {{item.truck.description}}/4</td>
          <td v-if="item.truck.typetruck == 'TRC'">Toco - {{ item.truck.description}}</td>-->
          <td>{{item.weight}} kg</td>
          <!-- <td>{{item.client}}</td> -->
          <td>R$ {{item.value_suggested | formatMoney}}</td>
          <!-- <td v-if="item.company_truck_id == undefined">Aguadando Solicitação</td>
          <td v-else>{{item.company_truck_id}}</td>-->
          <td v-if="item.insurance_price == undefined">Não Possui</td>
          <td v-else>R$ {{item.insurance_price | formatMoney}}</td>
          <!-- <td v-if="item.status == 'REQ'">
            <div class="alert alert-warning text-center" role="alert">REQUERIDO</div>
          </td>
          <td v-if="item.status == 'ACP'">
            <div class="alert alert-success" role="alert">ACEITO</div>
          </td>
          <td v-if="item.status == 'REJ'">
            <div class="alert alert-secondary" role="alert">REJEITADO</div>
          </td>
          <td v-if="item.status == 'FIN'">
            <div class="alert alert-primary" role="alert">FINALIZADO</div>
          </td>
          <td v-if="item.status == 'CAN'">
            <div class="alert alert-danger" role="alert">CANCELADO</div>
          </td>-->
          <td>
            <a
              @click.prevent="del( item.id )"
              class="btn btn-danger btn-sm fa fa-trash nav-icon"
              href="#"
            ></a>
            <router-link
              :to="`/admin/cotacao/cadastrar/${ item.id }`"
              class="btn btn-primary btn-sm nav-icon"
            >
              <i class="fa fa-eye"></i>
            </router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: {},
    };
  },
  methods: {
    del: function (id) {
      this.$emit("del", id);
    },
    // edit: function(id) {
    //   this.$emit("edit", id);
    // },

    load: function (page = 1) {
      this.page = page;
      axios
        .get("/api/shippings", {
          params: {
            page: this.page,
          },
        })
        .then((res) => {
          this.items = res.data;
        });
    },

    edit: function (id) {
      if (id != undefined) {
        axios.get(`/api/shippings/${id}`).then((res) => {
          this.form.fill(res.data.data);
        });
      }
    },

    save: function () {
      this.form
        .post("/api/shippings")
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: "Frete Solicitado!",
          });
          this.load();
        })
        .catch((err) => {
          console.error(err);
          Swal.fire({
            icon: "error",
            title: "Opss!",
            text: "Alguma coisa deu errado, tente novamente mais tarde",
          });
        })
        .then(() => {
          this.form.reset();
        });
    },
  },

  mounted() {
    this.load();
  },
};
</script>

