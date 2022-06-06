<template>
  <div class="py-3">
    <div class="col-12 py-3 text-center">
      <button
        type="button"
        class="btn btn-primary"
        data-toggle="modal"
        data-target="#requestModal"
      >ENVIAR SOLICITAÇÃO para o frete</button>
    </div>

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
                  <div class="col-6">
                    <label for="ImputOrigin">Empresa:</label>
                    <input type="text" class="form-control" v-model="form.company_id" />
                  </div>
                  <div class="col-6">
                    <label for="ImputOrigin">Valor Sugerido:</label>
                    <input type="text" class="form-control" v-model="form.value" />
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
    load: function(page = 1) {
      this.page = page;
      axios.get("/api/requests").then(res => {
        this.items = res.data;
      });
    },

    save: function() {
      this.form
        .post("/api/requests")
        .then(res => {
          Swal.fire({
            icon: "success",
            title: "Solicitação Enviada!"
          });

          this.load();
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
    }
  }
};
</script>
