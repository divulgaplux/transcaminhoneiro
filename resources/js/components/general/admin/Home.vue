<template>
  <div class="col-10 py-3">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Caminhões</h3>
                <p>Cadastrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
              <router-link to="/admin/caminhao" class="small-box-footer">
                Mais Informações
                <i class="fas fa-arrow-circle-right"></i>
              </router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  Caminhões
                  <!-- <sup style="font-size: 20px">%</sup> -->
                </h3>
                <p>Tipos de Caminhões</p>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
              <router-link to="/admin/tipo/caminhao" class="small-box-footer">
                Mais Informações
                <i class="fas fa-arrow-circle-right"></i>
              </router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Empresas</h3>
                <p>Cadastradas</p>
              </div>
              <div class="icon">
                <i class="fas fa-building"></i>
              </div>
              <router-link to="/admin/empresa" class="small-box-footer">
                Mais Informações
                <i class="fas fa-arrow-circle-right"></i>
              </router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Fretes</h3>
                <p>Solicitados</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill-alt"></i>
              </div>
              <router-link to="/admin/cotacao" class="small-box-footer">
                Mais Informações
                <i class="fas fa-arrow-circle-right"></i>
              </router-link>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
    </section>
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
