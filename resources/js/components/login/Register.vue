<template>
  <div class="row justify-content-center">
    <div class="card col-12 col-md-4 pb-3 my-5">
      <form @submit.prevent="saveData" class="login-form">
        <div class="col-12 d-flex justify-content-center mb-4">
          <img src="/images/logo2.png" height="50" />
        </div>

        <div class="col-12">
          <label for="name">Nome de Usuário</label>
          <input
            type="text"
            :class="{
                'form-control': true,
                'is-invalid': user.errors.has('name')
              }"
            v-model="user.name"
          />
          <has-error :form="user" field="name" />
        </div>

        <div class="col-12">
          <label for="email">E-mail</label>
          <input
            type="email"
            id="email"
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

        <div class="col-12">
          <label for="c_password">Repita a Senha</label>
          <input
            type="password"
            id="c_password"
            :class="{
                'form-control': true,
                'is-invalid': user.errors.has('c_password')
              }"
            v-model="user.c_password"
          />
          <has-error :form="user" field="c_password" />
        </div>

        <div class="col-12 my-3">
          <button class="btn btn-primary form-control" type="submit">Cadastrar</button>
          <router-link to="/entrar" class="btn btn-primary form-control">Retorne ao Login</router-link>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  nome: "register",
  data() {
    return {
      user: new Form({
        id: "",
        name: "",
        email: "",
        password: "",
        c_password: ""
      })
    };
  },
  methods: {
    saveData: function() {
      this.user
        .post("/api/auth/register")
        .then(res => {
          Swal.fire({
            icon: "success",
            title: "Usuário Cadastrado!",
            text: "Seu usuário já esta cadastrado, você pode fazer login"
          }).then(() => {
            this.$router.push("/entrar");
          });
        })
        .catch(err => {
          console.error(err);
          Swal.fire({
            icon: "error",
            title: "Opss!",
            text: "Alguma coisa deu errado, tente novamente mais tarde"
          });
        });
    }
  }
};
</script>
