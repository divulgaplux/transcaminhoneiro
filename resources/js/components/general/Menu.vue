<template>
  <div class="col-12">
    <nav class="navbar navbar-expand-lg fixed-top navbar p-3 navbar-default" type="light">
      <img src="/images/logo.png" class="navbar-brand" height="50" />

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarGeneralMenu"
        aria-controls="navbarGeneralMenu"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse space-menu" id="navbarGeneralMenu">
        <div class="w-100 d-flex justify-content-md-start justify-content-lg-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link class="nav-link active" to="/">INÍCIO</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link active" to="/cotacao">FRETE</router-link>
            </li>
            <a class="nav-link active" v-if="isLogged" href="/admin/inicio">MINHA CONTA</a>
            <a class="nav-link active" v-if="isLogged" href="/sair">SAIR</a>
            <li class="nav-item" v-else>
              <router-link class="nav-link btn btn-outline-dark" to="/entrar">ENTRAR</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      user: "getCurrentUser",
      isLogged: "isLogged",
    }),
  },
};
</script>
