<template>
  <div>
    <p>Voce sera redirecionado!</p>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  methods: {
    ...mapActions({
      logout: "logout"
    })
  },
  created() {
    this.logout();
    this.$router.push("/");
  }
};
</script>

