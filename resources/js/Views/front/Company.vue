<template>
  <div class="py-4 px-4">
    <div class="row col-12">
      <div class="mr-md-2">
        <button
          type="button"
          class="btn btn-truck"
          data-toggle="modal"
          data-target=".bd-example-modal-xl"
        >Cadastrar</button>
      </div>
    </div>
    <list-company :items="items" @edit="edit" @del="del" />
    <register-company :form="form" @save="save" />
  </div>
</template>

<script>
import Company from "./../../components/register/Company";
import CompanyList from "./../../components/list/Company";

export default {
  components: {
    "register-company": Company,
    "list-company": CompanyList,
  },
  data() {
    return {
      items: {},
      form: new Form({
        id: undefined,
        // user_id: undefined,
        documentation: undefined,
        email: undefined,
        phone: undefined,
        cellphone: undefined,
        corporative_name: undefined,
        fantasy_name: undefined,
        adress: undefined,
        number: undefined,
        neighborhood: undefined,
        city: undefined,
        state: undefined,
        country: "brasil",
        is_actived: true,
      }),
    };
  },

  methods: {
    del: function (id) {
      axios.delete(`/api/companies/${id}`).then((res) => {
        this.load();
      });
    },

    load: function () {
      axios.get("/api/companies").then((res) => {
        this.items = res.data;
      });
    },

    edit: function (id) {
      if (id != undefined) {
        axios.get(`/api/companies/${id}`).then((res) => {
          this.form.fill(res.data.data);
          $(".bd-example-modal-xl").modal("show");
        });
      }
    },

    save: function () {
      this.form
        .post("/api/companies")
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: "Empresa Cadastrada!",
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


