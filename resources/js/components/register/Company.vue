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
              <h5 class="modal-title" id="companyModalLabel">Cadastre sua Empresa ou Caminhoneiro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="save">
                <div class="row mb-3">
                  <div class="col-4">
                    <label for="Inputcorporative_name">Nome / Razão Social</label>
                    <input class="form-control" type="text" v-model="form.corporative_name" />
                  </div>
                  <!--  <div class="col-4">
                    <label for="Inputfantasy_name">Nome Fantasia</label>
                    <input class="form-control" type="text" v-model="form.fantasy_name" />
                  </div>-->
                  <div class="col-4">
                    <label for="Inputdocumentation">CNPJ / CPF</label>
                    <input
                      type="text"
                      v-mask="[
                        '###.###.###-##',
                        '##.###.###/####-##'
                      ]"
                      class="form-control"
                      id="phone"
                      v-model="form.documentation"
                    />
                  </div>
                  <div class="col-4">
                    <label for="Inputemail">Email</label>
                    <input class="form-control" type="email" v-model="form.email" />
                  </div>
                  <div class="col-4">
                    <label for="Inputphonel">Telefone</label>
                    <input
                      type="text"
                      v-mask="[
                        '(##) #####-####',
                        '(##) ####-####'
                      ]"
                      class="form-control"
                      id="phone"
                      v-model="form.phone"
                    />
                  </div>
                  <div class="col-4">
                    <label for="Inputcellphone">Celular</label>
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
                  <div class="col-4">
                    <label for="Inputadress">Endereço</label>
                    <input class="form-control" type="text" v-model="form.adress" />
                  </div>
                  <div class="col-3">
                    <label for="Inputnumber">Número</label>
                    <input class="form-control" type="text" v-model="form.number" />
                  </div>
                  <div class="col-3">
                    <label for="Inputneighborhood">Bairro</label>
                    <input class="form-control" type="text" v-model="form.neighborhood" />
                  </div>
                  <div class="col-3">
                    <label for="Inputcity">Cidade</label>
                    <input class="form-control" type="text" v-model="form.city" />
                  </div>
                  <div class="col-3">
                    <label for="Inputstate">Estado</label>
                    <!-- <input class="form-control" type="inputState" /> -->
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
                  <!--   <div class="col-4">
                    <label for="Inputcountry">País</label>
                    <input class="form-control" type="text" v-model="form.country" />
                  </div>-->
                  <div class="col-12 py-3 d-flex justify-content-between">
                    <div class="col-3">
                      <button type="submit" class="btn btn-primary form-control">Salvar</button>
                    </div>
                    <div class="col-3">
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
</template>

<script>
export default {
  props: {
    form: {
      required: true,
    },
  },
  methods: {
    save: function () {
      this.$emit("save");
    },
  },
};
</script>
