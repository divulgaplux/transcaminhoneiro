<template>
  <div>
    <div class="page-size">
      <site-home />
    </div>
  </div>
</template>
<script>
import SiteHome from "./../../components/home/Home.vue";

export default {
  components: {
    "site-home": SiteHome
  },
  data() {
    return {
      isLoading: false,
      items: {}
    };
  }
};
</script>
