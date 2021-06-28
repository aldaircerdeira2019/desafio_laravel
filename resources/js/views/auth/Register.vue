<template>
  <div>
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="card">
          <div class="card-body">
            <div style="padding: 10px; max-width: 600px; margin: 0 auto">
              <h5 class="card-title text-center">Cadastre-se</h5>
              <form class="py-3">
                <div class="form-group row">
                  <label for="staticName" class="col-sm-2 col-form-label"
                    >Nome</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="text"
                      :class="`form-control ${errors.name ? 'is-invalid' : ''}`"
                      id="staticName"
                      v-model="form.name"
                    />
                    <div class="invalid-feedback" v-if="errors.name">
                      {{ errors.name[0] }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label"
                    >Email</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="text"
                      :class="`form-control ${
                        errors.email ? 'is-invalid' : ''
                      }`"
                      id="staticEmail"
                      v-model="form.email"
                    />
                    <div class="invalid-feedback" v-if="errors.email">
                      {{ errors.email[0] }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label"
                    >Senha</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="password"
                      :class="`form-control ${
                        errors.password ? 'is-invalid' : ''
                      }`"
                      id="inputPassword"
                      v-model="form.password"
                    />
                    <div class="invalid-feedback" v-if="errors.password">
                      {{ errors.password[0] }}
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputConfirmation" class="col-sm-2 col-form-label"
                    >Confirmar senha</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="password"
                      :class="`form-control ${
                        errors.password_confirmation ? 'is-invalid' : ''
                      }`"
                      id="inputConfirmation"
                      v-model="form.password_confirmation"
                    />
                    <div
                      class="invalid-feedback"
                      v-if="errors.password_confirmation"
                    >
                      {{ errors.password_confirmation[0] }}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10 float-right">
                    <button
                      @click.prevent="resgisterUser"
                      class="btn btn-primary btn-sm"
                    >
                      Entrar
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import apiAuth from "../../api/auth";
export default {
  name: "Register",
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      errors: [],
    };
  },
  methods: {
    resgisterUser() {
      apiAuth
        .register(this.form)
        .then((r) => {
          this.$toastr.s("Cadastrado com sucesso!");
          this.login();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
    async login() {
      await new Promise((t) => setTimeout(t, 2000));
      window.location.href = "/#/";
      apiAuth
        .login({ email: this.form.email, password: this.form.password })
        .then(() => {
          window.location.href = "/spa/";
        })
        .catch((error) => {
          window.location.href = "/spa/";
        });
    },
  },
};
</script>
