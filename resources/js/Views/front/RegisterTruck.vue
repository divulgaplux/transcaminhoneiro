<template>
  <div>
    <div class="page-size content d-flex justify-content-center align-items-center">
      <truck-profile />
      <register-truck />
    </div>
  </div>
</template>

<script>
import TruckProfile from "./../../components/profile/TruckProfile";
import Truck from "./../../components/register/TypeTruck";

export default {
  components: {
    "truck-profile": TruckProfile,
    "register-truck": Truck
  },
  data() {
    return {
      isLoading: false
    };
  }
};
</script>
