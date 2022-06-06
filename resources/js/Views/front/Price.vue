<template>
  <div class="py-4 px-4">
    <div class="row col-12">
      <div class="mr-md-2">
        <button
          type="button"
          class="btn btn-truck"
          data-toggle="modal"
          data-target="#priceModal"
        >Cadastrar Frete</button>
      </div>
    </div>
    <list-price :items="items" @edit="edit" @del="del" />
    <register-price :form="form" @save="save" />
  </div>
</template>

<script>
import Price from "./../../components/register/Price";
import ListPrice from "./../../components/list/Prices";
import { mapGetters } from "vuex";

export default {
  computed: {
    ...mapGetters({
      user: "getCurrentUser",
      isLogged: "isLogged"
    })
  },
  components: {
    "register-price": Price,
    "list-price": ListPrice
  },
  data() {
    return {
      items: {},
      form: new Form({
        id: undefined,
        truck_id: undefined,
        receiver: undefined,
        origin: undefined,
        destination: undefined,
        weight: undefined,
        value_suggested: undefined,
        insurance_price: undefined,
        distance: undefined,
        client: undefined,
        have_insurance: undefined,
        is_actived: true
      })
    };
  },

  methods: {
    del: function(id) {
      axios.delete(`/api/shippings/${id}`).then(res => {
        this.load();
      });
    },

    load: function(page = 1) {
      this.page = page;
      axios.get("/api/shippings").then(res => {
        this.items = res.data;
      });
    },

    edit: function(id) {
      if (id != undefined) {
        axios.get(`/api/shippings/${id}`).then(res => {
          this.form.fill(res.data.data);
          $("#editModal").modal("show");
        });
      }
    },

    save: function() {
      this.form.client = this.user.id;
      this.form
        .post("/api/shippings")
        .then(res => {
          Swal.fire({
            icon: "success",
            title: "Frete Solicitado!"
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
          $("#priceModal").modal("hide");
          this.form.reset();
        });
    }
  },

  loadData: function() {
    this.load(this.$route.params.id);
  },

  mounted() {
    this.load();
  }
};
</script>
