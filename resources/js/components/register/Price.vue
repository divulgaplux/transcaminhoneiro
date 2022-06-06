<template>
  <div>
    <div class="py-3">
      <div class="col-12 py-3 d-flex col-md-6">
        <div
          class="modal fade"
          id="priceModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="myExtraLargeModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="priceModalLabel">Solicite um Novo Frete {{user.name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form @submit.prevent="save">
                  <div class="row">
                    <div class="col-6">
                      <label for="ImputOrigin">Origem</label>
                      <input type="text" class="form-control" v-model="form.origin" />
                    </div>

                    <div class="col-6">
                      <label for="Imputdestination">Destino</label>
                      <input type="text" class="form-control" v-model="form.destination" />
                    </div>

                    <div class="col-12">
                      <label for="Imputemail">E-mail</label>
                      <input type="email" class="form-control" v-model="form.email" />
                    </div>

                    <div class="col-6">
                      <label for="Imputcellphone">Celular</label>
                      <input
                        type="text"
                        v-mask="[
                        '(##) #####-####',
                        '(##) ####-####'
                      ]"
                        class="form-control"
                        id="phone"
                        v-model="form.cellphone"
                      />
                    </div>

                    <div class="col-6">
                      <label for="Imputcellphone">Telefone</label>
                      <input
                        type="text"
                        v-mask="[
                        '(##) #####-####',
                        '(##) ####-####'
                      ]"
                        class="form-control"
                        id="phone"
                        v-model="form.telephone"
                      />
                    </div>

                    <div class="container">
                      <div class="row">
                        <div class="col-4">
                          <label for="ImputDistance">Distância</label>
                          <input type="number" class="form-control" v-model="form.distance" />
                        </div>

                        <div class="col-4">
                          <label for="InputWeight">Peso</label>
                          <input type="number" class="form-control" v-model="form.weight" />
                        </div>

                        <!-- <div class="col-4">
                          <label for="InputDescription">Tipo de Caminhão</label>
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
                        </div>-->

                        <div class="col-4">
                          <label for="Inputveinsurance">Precisa de Seguro?</label>
                          <select class="form-control" type="text" v-model="form.have_insurance">
                            <option :value="undefined"></option>
                            <option :value="true">Sim</option>
                            <option :value="false">Não</option>
                          </select>
                        </div>

                        <div class="col-4 input-group mb-3 py-2" v-if="form.have_insurance == true">
                          <label for="Imput">Valor do Seguro</label>
                          <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                          </div>
                          <input type="text" class="form-control" v-model="form.insurance_price" />
                        </div>

                        <div class="col-4 input-group mb-3 py-2">
                          <label for="Imput">Valor Sugerido</label>
                          <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                          </div>
                          <input type="text" class="form-control" v-model="form.value_suggested" />
                        </div>
                      </div>
                    </div>

                    <div class="py-3 col-12">
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary form-control">Salvar</button>
                      </div>
                      <div class="py-2 col-12">
                        <button
                          type="button"
                          class="btn btn-danger form-control"
                          data-dismiss="modal"
                        >Fechar</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      items: {},
      trucks: [],
    };
  },
  computed: {
    ...mapGetters({
      user: "getCurrentUser",
      isLogged: "isLogged",
    }),
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
    loadData: function () {
      this.loadTruck();
    },
  },
  mounted() {
    this.loadData();
  },
};
</script>
