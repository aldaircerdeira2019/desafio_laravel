<template>
  <div>
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title text-center">
              Minhas dicas publicadas
              <button
                type="button"
                class="btn btn-primary float-right"
                @click.prevent="enviarCreateDica()"
              >
                Novo
              </button>
            </h5>
          </div>
          <div class="card-body">
            <div class="card">
              <div class="card-body">
                <div v-for="dica in dicas.data" :key="dica.id">
                  <h5 class="card-title">
                    <strong>{{ dica.title }}</strong>
                  </h5>
                  <p class="card-text">{{ dica.descri }}</p>
                  <button type="button" class="btn btn-primary btn-sm">
                    atualizar
                  </button>
                  <button type="button" class="btn btn-danger btn-sm">
                    deletar
                  </button>
                  <hr style="border: 0; border-top: 1px solid black" />
                </div>
              </div>
              <pagination
                :data="dicas"
                @pagination-change-page="getDicas"
                :limit="2"
              >
                <span slot="prev-nav">&lt;</span>
                <span slot="next-nav">&gt;</span>
              </pagination>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <SubcategoryUpdate ref="update" :categories="categories"></SubcategoryUpdate>
    <SubcategoryDelete ref="delete"></SubcategoryDelete> -->
    <CreateDica ref="create"></CreateDica>
  </div>
</template>
<script>
import api from "../../api/dicas";
import CreateDica from "./components/CreateDica";
import DeleteDica from "./components/DeleteDica";
import UpdateDica from "./components/UpdateDica";

export default {
  name: "Dicas",
  components: {CreateDica, DeleteDica, UpdateDica},
  data() {
    return {
      dicas: {},
      errors: [],
    };
  },
  mounted() {
    this.getDicas();
  },
  methods: {
    getDicas: function (page = 1) {
      api
        .dicasByUser({ page })
        .then((response) => {
          this.dicas = response.data;
        })
        .catch(() => {
          this.$toastr.e("Ocorreu um erro.");
        });
    },
    enviarCreateDica: function (){
        this.$refs.create.modalPost()
      }

  },
};
</script>
