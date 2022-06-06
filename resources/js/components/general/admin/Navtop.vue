<template>
  <div>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light navbar-admin">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link class="nav-link" data-widget="pushmenu" to="#">
            <i class="fas fa-bars"></i>
          </router-link>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Início</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/cotacao" class="nav-link">Fretes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-slide="true" href="/sair">Sair</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      user: "getCurrentUser",
      isLogged: "isLogged"
    })
  }
};
</script>

