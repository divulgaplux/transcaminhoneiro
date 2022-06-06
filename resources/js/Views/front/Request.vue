<template>
  <div class="py-4 px-4">
    <request-price :cotation="$route.params.id" />
  </div>
</template>

<script>
import RequestPrice from "./../../components/register/Request";

export default {
  components: {
    "request-price": RequestPrice
  },
  data() {
    return {
      items: {},
      form: new form({
        id: undefined,
        company_id: undefined,
        shipping_id: undefined,
        value: undefined,
        time_approximate: undefined,
        observation: undefined,
        date: undefined,
        date_acceptation: undefined,
        is_actived: undefined
      })
    };
  },
  load: function() {
    axios.get("/api/requests").then(res => {
      this.items = res.data;
    });
  },
  mounted() {
    this.load();
  }
};
