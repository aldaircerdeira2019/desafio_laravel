<template>
  <div>
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title text-center">DICAS AUTOMOTIVAS</h5>
          </div>
          <div class="card-body">
            <form class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-md-3 mb-3">
                  <label for="01">Tipo</label>
                  <select
                    class="custom-select"
                    v-model="params.tipo_id"
                    @change="onchangeTipo()"
                    id="01"
                  >
                    <option selected disabled value="">...</option>
                    <option
                      v-for="tipo in tipos"
                      :key="tipo.id"
                      :value="tipo.id"
                    >
                      {{ tipo.name }}
                    </option>
                  </select>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="02">Marca</label>
                  <select
                    v-model="params.marca_id"
                    @change="onchangeMarca()"
                    class="custom-select"
                    id="02"
                  >
                    <option selected disabled value="">...</option>
                    <option
                      v-for="marca in marcas"
                      :key="marca.id"
                      :value="marca.id"
                    >
                      {{ marca.name }}
                    </option>
                  </select>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="03">Modelo</label>
                  <select
                    v-model="params.modelo_id"
                    @change="onchangeModelo()"
                    class="custom-select"
                    id="03"
                  >
                    <option selected disabled value="">...</option>
                    <option
                      v-for="modelo in modelos"
                      :key="modelo.id"
                      :value="modelo.id"
                    >
                      {{ modelo.name }}
                    </option>
                  </select>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="04">Versão</label>
                  <select
                    v-model="params.versao_id"
                    class="custom-select"
                    i
                    d="04"
                  >
                    <option selected disabled value="">...</option>
                    <option
                      v-for="versao in versoes"
                      :key="versao.id"
                      :value="versao.id"
                    >
                      {{ versao.name }}
                    </option>
                  </select>
                </div>
              </div>
              <button class="btn btn-primary btn-sm">Filtrar</button>
            </form>
            <p>
              Non arcu risus quis varius quam quisque. Dictum varius duis at
              consectetur lorem. Posuere sollicitudin aliquam ultrices sagittis
              orci a scelerisque purus semper.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import apiCategory from "../../api/category";
export default {
  name: "Home",
  data() {
    return {
      params: {
        tipo_id: "",
        marca_id: "",
        modelo_id: "",
        versao_id: "",
      },
      tipos: {},
      marcas: {},
      modelos: {},
      versoes: {},
      errors: [],
    };
  },
  mounted() {
    this.getTipos();
  },
  methods: {
    getTipos() {
      apiCategory
        .tipos()
        .then((r) => {
          this.tipos = r.data;
        })
        .catch((error) => {});
    },
    getMarcas(tipo_id) {
      apiCategory
        .marcas({ tipo_id })
        .then((r) => {
          this.marcas = r.data;
        })
        .catch((error) => {});
    },
    getModelo(marca_id) {
      apiCategory
        .modelos({ marca_id })
        .then((r) => {
          this.modelos = r.data;
        })
        .catch((error) => {});
    },
    getVersao(modelo_id) {
      apiCategory
        .versoes({ modelo_id })
        .then((r) => {
          this.versoes = r.data;
        })
        .catch((error) => {});
    },
    onchangeTipo() {
      this.modelos = {};
      this.versoes = {};
      this.getMarcas(this.params.tipo_id);
    },
    onchangeMarca() {
      this.versoes = {};
      this.getModelo(this.params.marca_id);
    },
    onchangeModelo() {
      this.getVersao(this.params.modelo_id);
    },
  },
};
</script>
