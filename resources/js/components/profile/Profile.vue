<template>
  <div col="page-size content d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-12 text-center py-4 px-4">
      <div class="row col-md-3">
        <div class="box box-primary">
          <div class="box-body box-profile pt-3">
            <h1>Minha Conta</h1>
            <img
              class="profile-user-img img-responsive img-circle"
              src="/images/favicon.png"
              alt="User profile picture"
            />
            <h3 class="profile-username text-center">{{ user.name }}</h3>
            <p class="text-muted text-center"></p>
            <strong>
              <i class="fa fa-envelope nav-icon margin-r-5 px-2"></i>Email
            </strong>
            <p class="text-muted">{{ user.email }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 card">
      <div class="card-title pt-3 px-3">
        <h3>Altere a sua senha</h3>
      </div>

      <!-- <div class="card-body pt-0 mt-0">
        <form @submit.prevent="save">
          <div class="row">
            <div class="form-group col-md-4">
              <label for="inputPassword">Nova Senha</label>
              <input type="password" class="form-control" />
            </div>

            <div class="form-group col-md-4">
              <label for="inputPassword">Repita a Senha</label>
              <input type="password" class="form-control" />
            </div>

            <div class="col-2">
              <label>&nbsp;</label>
              <button type="submit" class="btn form-control btn-primary">
                <b>Salvar</b>
              </button>
            </div>
          </div>
        </form>
      </div>-->
    </div>
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

