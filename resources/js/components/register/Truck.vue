<template>
  <div class="py-3">
    <div class="px-2 py-3 col-12 row col-md-6">
      <div
        class="modal fade bd-example-modal-xl"
        id="truckModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="truckModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="truckModalLabel">Cadastre seu Caminhão</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="save">
                <div class="row col-12">
                  <div class="col-6">
                    <label for="InputTruck">Tipo de Caminhão</label>
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
                    <label for="InputCompany">Empresa Proprietária</label>
                    <select class="form-control" type="text" v-model="form.company_id">
                      <option
                        v-for="item in companies"
                        :key="item.id"
                        :value="item.id"
                      >{{ item.corporative_name }}</option>
                    </select>
                  </div>
                  <div class="modal-header col-12">
                    <h5 class="modal-title" id="truckModalLabel">Opcionais</h5>
                  </div>
                  <div class="col-3 py-3">
                    <label for="ImputValue">Placa:</label>
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="form.board" />
                    </div>
                  </div>
                  <div class="col-3 py-3">
                    <label for="ImputValue">Renavam:</label>
                    <div class="input-group">
                      <input type="number" class="form-control" v-model="form.renavam" />
                    </div>
                  </div>
                  <div class="col-3 py-3">
                    <label for="ImputValue">Marca:</label>
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="form.brand" />
                    </div>
                  </div>
                  <div class="col-3 py-3">
                    <label for="ImputValue">Cor:</label>
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="form.color" />
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="ImputValue">Cidade:</label>
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="form.city" />
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="ImputValue">Chassi:</label>
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="form.chassi" />
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="ImputValue">Modelo:</label>
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="form.model" />
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="Inputstate">Estado</label>
                    <select id="inputState" class="form-control" v-model="form.state">
                      <option value>Selecione</option>
                      <option value="AC">Acre</option>
                      <option value="AL">Alagoas</option>
                      <option value="AP">Amapá</option>
                      <option value="AM">Amazonas</option>
                      <option value="BA">Bahia</option>
                      <option value="CE">Ceará</option>
                      <option value="DF">Distrito Federal</option>
                      <option value="ES">Espirito Santo</option>
                      <option value="GO">Goiás</option>
                      <option value="MA">Maranhão</option>
                      <option value="MS">Mato Grosso do Sul</option>
                      <option value="MT">Mato Grosso</option>
                      <option value="MG">Minas Gerais</option>
                      <option value="PA">Pará</option>
                      <option value="PB">Paraíba</option>
                      <option value="PR">Paraná</option>
                      <option value="PE">Pernambuco</option>
                      <option value="PI">Piauí</option>
                      <option value="RJ">Rio de Janeiro</option>
                      <option value="RN">Rio Grande do Norte</option>
                      <option value="RS">Rio Grande do Sul</option>
                      <option value="RO">Rondônia</option>
                      <option value="RR">Roraima</option>
                      <option value="SC">Santa Catarina</option>
                      <option value="SP">São Paulo</option>
                      <option value="SE">Sergipe</option>
                      <option value="TO">Tocantins</option>
                    </select>
                  </div>
                  <div class="col-3">
                    <label for="ImputValue">País:</label>
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="form.country" />
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="ImputValue">Tecnologia:</label>
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="form.technology" />
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="ImputValue">Ano de Fabricação:</label>
                    <div class="input-group">
                      <input type="number" class="form-control" v-model="form.year_of_manufacture" />
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="ImputValue">Ano do Modelo:</label>
                    <div class="input-group">
                      <input type="number" class="form-control" v-model="form.year_of_model" />
                    </div>
                  </div>
                </div>
                <div class="py-3">
                  <button type="submit" class="btn btn-primary form-control">Salvar</button>
                  <div class="py-1">
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
      companies: []
    };
  },
  props: {
    form: {
      required: true
    }
  },
  methods: {
    save: function() {
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
    loadData: function() {
      this.loadCompany();
      this.loadTruck();
    }
  },
  mounted() {
    this.loadData();
  }
};
</script>
