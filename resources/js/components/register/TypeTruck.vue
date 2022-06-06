<template>
  <div class="py-3">
    <div class="col-12 py-1 d-flex">
      <div
        class="modal fade"
        id="truckModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="truckModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
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
                  <!--        <div class="col-6">
                    <label for="InputDescription">Nome</label>
                    <input class="form-control" type="text" v-model="form.description" />
                  </div>-->
                  <div class="col-6">
                    <label for="Inputtypetruck">Tipo de Caminhão</label>
                    <select class="form-control" type="text" v-model="form.typetruck">
                      <option :value="undefined">Escolha</option>
                      <option value="CRT">Carreta</option>
                      <option value="CLS">Carreta LS</option>
                      <option value="VDL">Vanderléia</option>
                      <option value="BRT">Bitrem</option>
                      <option value="RTM">Rodotrem</option>
                      <option value="TCK">Truck</option>
                      <option value="BTK">Bitruck</option>
                      <option value="VLC">VLC</option>
                      <option value="TPQ">3/4</option>
                      <option value="TRC">Toco</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="InputBodywork">Tipo de Carroçeria</label>
                    <select class="form-control" type="text" v-model="form.bodywork">
                      <option :value="undefined">Escolha</option>
                      <option value="CCB">Caçamba</option>
                      <option value="GDB">Grade Baixa</option>
                      <option value="GNL">Graneleiro</option>
                      <option value="PCH">Prancha</option>
                      <option value="CVQ">Cavaqueira</option>
                      <option value="BAU">Baú</option>
                      <option value="BAF">Baú Frigorífico</option>
                      <option value="SDR">Sider</option>
                      <option value="BPC">Bug Porta Container</option>
                      <option value="MNK">Munk</option>
                      <option value="SLO">Silo</option>
                      <option value="TNQ">Tanque</option>
                      <option value="GLA">Gaiola</option>
                      <option value="CGR">Cegonheiro</option>
                      <option value="APC">Apenas Cavalo</option>
                    </select>
                  </div>

                  <div class="col-6">
                    <label for="InputVolume">Volume</label>
                    <input class="form-control" type="text" v-model="form.volume" />
                  </div>

                  <div class="col-6">
                    <label for="InputAxes">Eixos</label>
                    <select class="form-control" type="text" v-model="form.axes">
                      <option :value="undefined">Escolha</option>
                      <option value="1">3 (três)</option>
                      <option value="2">5 (cinco)</option>
                      <option value="3">6 (seis)</option>
                      <option value="4">8 (oito)</option>
                    </select>
                  </div>

                  <div class="col-6">
                    <label for="InputLimit">Limite de Peso</label>
                    <input class="form-control" type="text" v-model="form.limit" />
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
