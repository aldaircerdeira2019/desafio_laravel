<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Home</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#" v-if="authUser"
              >{{ authUser.name }}
            </a>
          </li>
        </ul>
        <a
          v-if="authUser"
          href="#"
          class="btn btn-outline-success my-2 my-sm-0"
          @click.prevent="logout"
        >
          Sair</a
        >
        <div v-else class="btn-group" role="group">
          <router-link
            :to="{ name: 'login' }"
            class="btn btn-outline-success my-2 my-sm-0"
          >
            <strong> Entrar </strong>
          </router-link>
          <router-link
            :to="{ name: 'register' }"
            class="btn btn-outline-success my-2 my-sm-0"
          >
            <strong> Cadastre-se </strong>
          </router-link>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  name: "NavBar",
  data() {
    return {
      authUser: [],
    };
  },
  mounted() {
    this.athenticated();
  },
  methods: {
    logout() {
      axios.post("/api/logout").then((r) => {
        window.location.href = "/spa/";
      });
    },
    athenticated() {
      axios
        .get("/api/athenticated")
        .then((r) => {
          this.authUser = r.data;
          localStorage.setItem("auth", "true");
        })
        .catch(() => {
          this.authUser = null;
          localStorage.removeItem("auth");
        });
    },
  },
};
</script>
