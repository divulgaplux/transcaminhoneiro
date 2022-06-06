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
import Truck from "./../../components/register/TypeTruck";
import TypeTruck from "./../../components/list/TypeTruck";

export default {
  components: {
    "register-truck": Truck,
    "list-truck": TypeTruck
  },
  data() {
    return {
      items: {},
      form: new Form({
        id: undefined,
        description: undefined,
        typetruck: undefined,
        bodywork: undefined,
        volume: undefined,
        axes: undefined,
        limit: undefined,
        is_actived: true
      })
    };
  },

  methods: {
    del: function(id) {
      axios.delete(`/api/trucks/${id}`).then(res => {
        this.load();
      });
    },

    load: function() {
      axios.get("/api/trucks").then(res => {
        this.items = res.data;
      });
    },

    edit: function(id) {
      if (id != undefined) {
        axios.get(`/api/trucks/${id}`).then(res => {
          this.form.fill(res.data.data);
          $("#truckModal").modal("show");
        });
      }
    },

    save: function() {
      this.form
        .post("/api/trucks")
        .then(res => {
          Swal.fire({
            icon: "success",
            title: "Tipo de Caminhão Cadastrado!"
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

