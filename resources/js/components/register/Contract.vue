<template>
  <div class="py-3">
    <div class="px-2 py-3 col-12 row col-md-6">
      <div
        class="modal fade bd-example-modal-xl"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="truckModalLabel">CONTRATO DE SERVIÇO</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="save">
                  <div class="modal-header col-12">
                    <h5 class="modal-title" id="truckModalLabel">CONTRATANTE</h5>
                  </div>
                <div class="row col-12">
                  <div class="col-6">
                    <label for="InputCompany">Empresa ou Caminhoneiro</label>
                    <select class="form-control" type="text" v-model="form.company_id">
                      <option
                        v-for="item in companies"
                        :key="item.id"
                        :value="item.id"
                      >{{ item.corporative_name }}</option>
                    </select>
                  </div>
                  <div class="modal-header col-12">
                    <h5 class="modal-title" id="truckModalLabel">CONTRATADO</h5>
                  </div>
                  <div class="col-6">
                    <label for="InputTruck">Dados do Veículo</label>
                    <select class="form-control" type="text" v-model="form.truck_id">
                      <option v-for="item in trucks" :key="item.id" :value="item.id">
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
                      </option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="InputClient">Cliente</label>
                    <select class="form-control" type="text" v-model="form.client_id">
                      <option
                        v-for="item in clients"
                        :key="item.id"
                        :value="item.id"
                      >{{ item.name }}</option>
                    </select>
                  </div>
                  <div class="modal-header col-12">
                    <h5 class="modal-title" id="truckModalLabel">SERVIÇOS CONTRATADOS</h5>
                  </div>
                  <div class="col-12">
                    <input class="form-control" type="text" v-model="form.services" />
                  </div>
                    <div class="modal-header col-12">
                    <h5 class="modal-title" id="truckModalLabel">ORDENS DE COLETA RELACIONADAS</h5>
                  </div>
                  <div class="col-12">
                    <input class="form-control" type="text" v-model="form.collect" />
                  </div>
                </div>
                <div class="col-12 py-3 d-flex justify-content-between">
                  <button type="submit" class="col-6 btn btn-primary form-control">Salvar</button>
                  <div class="col-6">
                    <button
                      type="button"
                      class="btn btn-danger form-control"
                      data-dismiss="modal"
                    >Fechar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: {},
      trucks: [],
      companies: [],
      clients: []
    };
  },
  props: {
    form: {
      required: true,
    },
  },
  methods: {
    save: function () {
      this.$emit("save");
    },
    loadTruck: function() {
      axios
        .get("/api/trucks")
        .then(res => {
          this.trucks = res.data.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    loadCompany: function() {
      axios
        .get("/api/companies")
        .then(res => {
          this.companies = res.data.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    loadClient: function() {
      axios
        .get("/api/clients")
        .then(res => {
          this.clients = res.data.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    loadData: function() {
      this.loadCompany();
      this.loadClient();
      this.loadTruck();
    }
  },
  mounted() {
    this.loadData();
  }
};
</script>
