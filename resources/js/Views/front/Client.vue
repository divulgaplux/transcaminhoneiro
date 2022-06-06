<template>
  <div class="py-4 px-4">
    <div class="row col-12">
      <div class="mr-md-2">
        <button
          type="button"
          class="btn btn-truck"
          data-toggle="modal"
          data-target=".bd-example-modal-xl"
        >Novo Cliente</button>
      </div>
    </div>
    <list-client :items="items" @edit="edit" @del="del" />
    <register-client :form="form" @save="save" />
  </div>
</template>

<script>
import Client from "./../../components/register/Client";
import ClientList from "./../../components/list/Client";

export default {
  components: {
    "register-client": Client,
    "list-client": ClientList,
  },
  data() {
    return {
      items: {},
      form: new Form({
        id: undefined,
        company_id: undefined,
        name: undefined,
        cpf: undefined,
        rg: undefined,
        cnh: undefined,
        cnh_state: undefined,
        is_actived: true,
      }),
    };
  },

  methods: {
    del: function (id) {
      axios.delete(`/api/clients/${id}`).then((res) => {
        this.load();
      });
    },

    load: function () {
      axios.get("/api/clients").then((res) => {
        this.items = res.data;
      });
    },

    edit: function (id) {
      if (id != undefined) {
        axios.get(`/api/clients/${id}`).then((res) => {
          this.form.fill(res.data.data);
          $(".bd-example-modal-xl").modal("show");
        });
      }
    },

    save: function () {
      this.form
        .post("/api/clients")
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: "Cliente Cadastrado!",
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


