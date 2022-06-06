<template>
  <div class="py-4 px-4">
    <div class="row col-12">
      <div class="mr-md-2">
        <button
          type="button"
          class="btn btn-truck"
          data-toggle="modal"
          data-target=".bd-example-modal-xl"
        >Novo Contrato</button>
      </div>
    </div>
    <list-contract :items="items" @edit="edit" @del="del" />
    <register-contract :form="form" @save="save" />
  </div>
</template>

<script>
import Contract from "./../../components/register/Contract";
import ContractList from "./../../components/list/Contract";

export default {
  components: {
    "register-contract": Contract,
    "list-contract": ContractList,
  },
  data() {
    return {
      items: {},
      form: new Form({
        id: undefined,
        company_id: undefined,
        truck_id: undefined,
        client_id: undefined,
        services: undefined,
        collect: undefined,
        is_actived: true,
      }),
    };
  },

  methods: {
    del: function (id) {
      axios.delete(`/api/contracts/${id}`).then((res) => {
        this.load();
      });
    },

    load: function () {
      axios.get("/api/contracts").then((res) => {
        this.items = res.data;
      });
    },

    edit: function (id) {
      if (id != undefined) {
        axios.get(`/api/contracts/${id}`).then((res) => {
          this.form.fill(res.data.data);
          $(".bd-example-modal-xl").modal("show");
        });
      }
    },

    save: function () {
      this.form
        .post("/api/contracts")
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: "Contrato Salvo!",
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
          $(".bd-example-modal-xl").modal("hide");
          this.form.reset();
        });
    },
  },
  mounted() {
    this.load();
  },
};
</script>


