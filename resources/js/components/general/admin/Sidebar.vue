<template>
  <aside class="main-sidebar sidebar-white-primary elevation-4">
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <div class="row justify-content-center">
            <router-link to="/admin/inicio" class="nav-link">
              <img src="/images/favicon.png" />
            </router-link>
          </div>
          <div class="py-3"></div>
          <router-link to="/admin/perfil" class="nav-link">
            <h4 class="d-block" v-if="isLogged">Olá {{ user.name }}</h4>
          </router-link>
        </div>
      </div>
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/caminhao" class="nav-link">
                  <i class="fa fa-truck nav-icon"></i>
                  <p>Meus Caminhões</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/tipo/caminhao" class="nav-link">
                  <i class="fa fa-truck-moving nav-icon"></i>
                  <p>Tipo de Caminhão</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/empresa" class="nav-link">
                  <i class="fa fa-building nav-icon"></i>
                  <p>Empresas e Caminhoneiros</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/cliente" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Clientes</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/cotacao" class="nav-link">
                  <i class="fa fa-money-bill-alt nav-icon"></i>
                  <p>Meus Fretes</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/contratos" class="nav-link">
                  <i class="fa fa-file-contract nav-icon"></i>
                  <p>Contratos de Serviços</p>
                </router-link>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
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

