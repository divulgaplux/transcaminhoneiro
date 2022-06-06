<template>
  <div>
    <div class="page-size">
      <home-admin />
    </div>
  </div>
</template>
<script>
import HomeAdmin from "./../../components/general/admin/Home";

export default {
  components: {
    "home-admin": HomeAdmin
  },
  data() {
    return {
      isLoading: false
    };
  }
};
</script>
