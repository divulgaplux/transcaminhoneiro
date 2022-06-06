<template>
  <div class="py-4 px-4">
    <price-register :cotation="$route.params.id" />
  </div>
</template>

<script>
import PriceRegister from "./../../components/register/PriceRegister";

export default {
  components: {
    "price-register": PriceRegister
  },
  data() {
    return {
      isLoading: false
    };
  }
};
</script>
