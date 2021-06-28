<template>
  <div>
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="card">
          <div class="card-body">
            <div style="padding: 10px; max-width: 600px; margin: 0 auto">
              <h5 class="card-title text-center">Suas credenciais</h5>
              <form class="py-3">
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
                <div class="form-group">
                  <div class="col-sm-10 float-right">
                    <button
                      @click.prevent="loginUser"
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
  name: "Login",
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      errors: [],
    };
  },
  methods: {
    loginUser() {
      apiAuth
        .login(this.form)
        .then((r) => {
          window.location.href = "/#/";
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          this.form.password = null;
        });
    },
  },
};
</script>
