<template>
  <div>
    <div class="page-size content d-flex justify-content-center align-items-center">
      <profile-company />
      <register-company />
    </div>
  </div>
</template>

<script>
import CompanyProfile from "./../../components/profile/CompanyProfile.vue";
import Company from "./../../components/register/Company.vue";

export default {
  components: {
    "profile-company": CompanyProfile,
    "register-company": Company
  },
  data() {
    return {
      isLoading: false
    };
  }
};
</script>
