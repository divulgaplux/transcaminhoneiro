<template>
  <div>
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#requestModal"
    >ENVIAR SOLICITAÇÃO</button>

    <div class="col-12 py-3 d-flex col-md-6">
      <div
        class="modal fade"
        id="requestModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5
                class="modal-title"
                id="requestModalLabel"
              >Envie uma proposta para solicitar esse frete.</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="save">
                <div class="row">
                  <div class="col-12">
                    <label for="InputCompany">Empresa:</label>
                    <select class="form-control" type="text" v-model="form.company_id">
                      <option
                        v-for="item in companies"
                        :key="item.id"
                        :value="item.id"
                      >{{ item.corporative_name }}</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="ImputValue">Valor:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                      </div>
                      <input type="number" class="form-control" v-model="form.value" />
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="ImputValue">Tempo Aproximado:</label>
                    <div class="input-group">
                      <input type="number" class="form-control" v-model="form.time_approximate" />
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">Dias</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 form-group">
                    <label for="exampleFormControlTextarea1">Observações:</label>
                    <textarea
                      class="form-control"
                      v-model="form.observation"
                      id="exampleFormControlTextarea1"
                      rows="3"
                    ></textarea>
                  </div>
                  <!--<div class="col-4" v-model="form.status"></div>-->
                  <div class="py-3 col-12">
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary form-control">Enviar Solicitação</button>
                    </div>
                    <div class="py-2 col-12">
                      <button
                        type="button"
                        class="btn btn-danger form-control"
                        data-dismiss="modal"
                      >Cancelar</button>
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
  data() {
    return {
      companies: [],
      form: new Form({
        id: undefined,
        company_id: undefined,
        shipping_id: undefined,
        value: undefined,
        time_approximate: undefined,
        observation: undefined,
        date: undefined,
        status: undefined,
        date_acceptation: undefined,
        is_actived: true
      })
    };
  },
  methods: {
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
    save: function() {
      this.form.shipping_id = this.$route.params.id;
      this.form.status = "REQ";
      this.form
        .post("/api/requests")
        .then(res => {
          Swal.fire({
            icon: "success",
            title: "Solicitação Enviada!"
          });
        })
        .catch(err => {
          console.error(err);
          Swal.fire({
            icon: "error",
            title: "Opss!",
            text: "Alguma coisa deu errado, tente novamente mais tarde"
          });
        })
        .then(() => {
          $("#requestModal").modal("hide");
          this.form.reset();
        });
    },
    loadData: function() {
      this.loadCompany();
    }
  },
  mounted() {
    this.loadData();
  }
};
</script>
