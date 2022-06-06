<template>
  <div class="row justify-content-center mt-5 pt-5">
    <div class="card col-12 col-md-4 pb-3 my-5 py-3">
      <form class="login-form" @submit.prevent="login">
        <div class="col-12 d-flex justify-content-center mb-4">
          <img src="/images/logo.png" height="50" />
        </div>

        <div class="col-12">
          <label for="email">E-mail</label>
          <input
            type="email"
            id="username"
            :class="{
                'form-control': true,
                'is-invalid': user.errors.has('email')
              }"
            v-model="user.email"
          />
          <has-error :form="user" field="email" />
        </div>

        <div class="col-12">
          <label for="password">Senha</label>
          <input
            type="password"
            id="password"
            :class="{
                'form-control': true,
                'is-invalid': user.errors.has('password')
              }"
            v-model="user.password"
          />
          <has-error :form="user" field="password" />
        </div>

        <div class="col-12 my-3">
          <button class="btn btn-primary form-control mb-2" type="submit">Entrar</button>
          <router-link to="/registrar" class="btn btn-primary form-control">Cadastrar</router-link>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "login",
  data() {
    return {
      user: new Form({
        email: "",
        password: ""
      })
    };
  },
  methods: {
    ...mapActions({
      setCurrentUser: "setCurrentUser"
    }),

    login() {
      this.user.post("/api/auth/login").then(res => {
        console.log(res);
        if (!res.data.success) {
          this.user.errors.set("email", "Usuário não cadastrado");
        } else {
          this.setCurrentUser(res.data.user);
          this.$router.push("/");
        }
      });
    }
  }
};
</script>
