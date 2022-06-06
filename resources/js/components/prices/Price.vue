<template>
  <div class="card col-12 col-md-6">
    <div class="card-body">
      <h1 class="text-center">Nova Cotação</h1>
      <div class="row">
        <input-autocomplete label="Origem da Mercadoria" />
        <input-autocomplete label="Destino da Mercadoria" />

        <div class="container">
          <div class="row">
            <div class="col">
              <label>Peso</label>
              <input type="text" class="form-control" />
            </div>
            <div class="col">
              <div class="form-group">
                <label for="inputTruck">Tipo de Mercadoria</label>
                <select id="inputTruck" class="form-control">
                  <option selected></option>
                  <option value="1">Carga Geral</option>
                  <option value="2">Carga Neogranel</option>
                  <option value="3">Carga Frigorificada</option>
                  <option value="4">Carga Perigosa</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="inputTruck">Tipo de Caminhão</label>
                <select id="inputTruck" class="form-control">
                  <option selected></option>
                  <option value="1">Carreta</option>
                  <option value="2">Carreta LS</option>
                  <option value="3">Vanderléia</option>
                  <option value="4">Bitrem</option>
                  <option value="5">Rodotrem</option>
                  <option value="6">Truck</option>
                  <option value="7">Bitruck</option>
                  <option value="8">VLC</option>
                  <option value="9">3/4</option>
                  <option value="10">Toco</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <label for="sendspecial">
              <input type="checkbox" id="sendspecial" value="sendSpecial" v-model="checkboxOptions" /> Preciso de seguro.
            </label>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary form-control" role="button">Calcular</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import InputAutocomplete from "./../basics/InputAutocomplete";

export default {
  components: {
    "input-autocomplete": InputAutocomplete
  },
  data() {
    return {
      form: new Form({
        origin: undefined,
        destination: undefined,
        type: undefined,
        weight: undefined,
        truck: undefined
      })
    };
  },
  methods: {
    createShipping: function() {
      this.form
        .post("api para calcular valor frete")
        .then(res => {
          this.$router.push({
            name: "price",
            params: {}
          });
        })
        .catch(err => {
          console.error(err);
        });
    }
  }
};
</script>

