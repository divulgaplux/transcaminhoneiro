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
              <h5 class="modal-title" id="clientModalLabel">CLIENTE</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="save">
                <div class="row col-12">
                  <div class="col-4">
                    <label for="InputCompany">Empresa</label>
                    <select class="form-control" type="text" v-model="form.company_id">
                      <option
                        v-for="item in companies"
                        :key="item.id"
                        :value="item.id"
                      >{{ item.corporative_name }}</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <label for="ImputValue">Nome</label>
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="form.name" />
                    </div>
                  </div>
                  <div class="col-4">
                    <label for="ImputValue">CPF</label>
                    <div class="input-group">
                      <input
                        v-mask="[
                        '###.###.###-##'
                      ]"
                        class="form-control"
                        v-model="form.cpf"
                      />
                    </div>
                  </div>
                  <div class="col-4">
                    <label for="ImputValue">RG</label>
                    <div class="input-group">
                      <input
                        v-mask="[
                        '########'
                      ]"
                        class="form-control"
                        v-model="form.rg"
                      />
                    </div>
                  </div>
                  <div class="col-4">
                    <label for="ImputValue">CNH</label>
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="form.cnh" />
                    </div>
                  </div>
                  <div class="col-4">
                    <label for="ImputValue">Estado CNH</label>
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="form.cnh_state" />
                    </div>
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
      companies: [],
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
    loadCompany: function () {
      axios
        .get("/api/companies")
        .then((res) => {
          this.companies = res.data.data;
        })
        .catch((err) => {
          console.error(err);
        });
    },
    loadData: function () {
      this.loadCompany();
    },
  },
  mounted() {
    this.loadData();
  },
};
</script>
