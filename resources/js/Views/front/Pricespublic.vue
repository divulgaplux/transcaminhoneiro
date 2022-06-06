<template>
  <div class="py-5 px-4">
    <prices-home :items="items" />
    <register-price :form="form" @save="save" />
  </div>
</template>

<script>
import Prices from "./../../components/home/Prices";
import Price from "./../../components/register/Price";

export default {
  components: {
    "prices-home": Prices,
    "register-price": Price
  },
  data() {
    return {
      items: {},
      form: new Form({
        id: undefined,
        truck_id: undefined,
        client: undefined,
        receiver: undefined,
        email:undefined,
        telephone:undefined,
        cellphone:undefined,
        origin: undefined,
        destination: undefined,
        weight: undefined,
        value_suggested: undefined,
        insurance_price: undefined,
        distance: undefined,
        company_truck_id: undefined,
        // status: undefined,
        have_insurance: undefined,
        is_actived: true
      })
    };
  },

  methods: {
    load: function(page = 1) {
      this.page = page;
      axios
        .get("/api/shippings", {
          params: {
            page: this.page
          }
        })
        .then(res => {
          this.items = res.data;
        });
    },

    save: function() {
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

  mounted() {
    this.load();
  }
};
</script>
