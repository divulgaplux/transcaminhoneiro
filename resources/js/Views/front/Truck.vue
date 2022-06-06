<template>
  <div class="py-4 px-4">
    <div class="row col-12">
      <div class="mr-md-2">
        <button
          type="button"
          class="btn btn-truck"
          data-toggle="modal"
          data-target="#truckModal"
        >Cadastrar</button>
      </div>
    </div>
    <list-truck :items="items" @edit="edit" @del="del" />
    <register-truck :form="form" @save="save" />
  </div>
</template>

<script>
import RegisterTruck from "./../../components/register/Truck";
import ListTruck from "./../../components/list/Truck";

export default {
  components: {
    "register-truck": RegisterTruck,
    "list-truck": ListTruck
  },
  data() {
    return {
      items: {},
      form: new Form({
        id: undefined,
        truck_id: undefined,
        company_id: undefined,
        board: undefined,
        renavam: undefined,
        brand: undefined,
        color: undefined,
        city: undefined,
        chassi: undefined,
        model: undefined,
        state: undefined,
        country: undefined,
        technology: undefined,
        year_of_manufacture: undefined,
        year_of_model: undefined,
        is_actived: true
      })
    };
  },

  methods: {
    del: function(id) {
      axios.delete(`/api/companytrucks/${id}`).then(res => {
        this.load();
      });
    },

    load: function() {
      axios.get("/api/companytrucks").then(res => {
        this.items = res.data;
      });
    },

    // loadCompany: function() {
    //   axios.get("/api/companies").then(res => {
    //     this.items = res.data;
    //   });
    // },

    edit: function(id) {
      if (id != undefined) {
        axios.get(`/api/companytrucks/${id}`).then(res => {
          this.form.fill(res.data.data);
          $("#truckModal").modal("show");
        });
      }
    },

    save: function() {
      this.form
        .post("/api/companytrucks")
        .then(res => {
          Swal.fire({
            icon: "success",
            title: "Caminhão Cadastrado!"
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
          $("#truckModal").modal("hide");
          this.form.reset();
        });
    }
  },
  mounted() {
    this.load();
  }
};
</script>

