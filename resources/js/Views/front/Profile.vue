<template>
  <div>
    <div class="page-size">
      <site-profile />
    </div>
  </div>
</template>
<script>
import SiteProfile from "./../../components/profile/Profile.vue";

export default {
  components: {
    "site-profile": SiteProfile
  },
  data() {
    return {
      isLoading: false
    };
  }
};
</script>
