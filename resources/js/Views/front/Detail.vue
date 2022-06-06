<template>
  <div class="py-5 px-4">
    <price-detail :cotation="$route.params.id" />
  </div>
</template>

<script>
import PriceDetail from "./../../components/home/Detail.vue";
export default {
  components: {
    "price-detail": PriceDetail
  },
  data() {
    return {
      isLoading: false
    };
  }
};
</script>
