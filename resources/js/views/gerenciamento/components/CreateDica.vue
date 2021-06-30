<template>
  <div>
    <div
      class="modal fade"
      id="ModalDica"
      tabindex="-1"
      role="dialog"
      aria-labelledby="ModalDicaLabel"
      aria-hidden="true"
      data-backdrop="static"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"><h5>Nova dica</h5></div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="01" class="col-form-label">Tipo</label>
                <select
                  v-model="params.tipo_id"
                  @change="onchangeTipo()"
                  type="text"
                  id="01"
                  class="form-control"
                >
                  <option selected disabled value="">...</option>
                  <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">
                    {{ tipo.name }}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="02" class="col-form-label">Marca</label>
                <select
                  v-model="params.marca_id"
                  @change="onchangeMarca()"
                  type="text"
                  id="02"
                  class="form-control"
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
              <div class="form-group">
                <label for="03" class="col-form-label">Modelo</label>
                <select
                  v-model="params.modelo_id"
                  @change="onchangeModelo()"
                  type="text"
                  id="03"
                  :class="`form-control ${
                    errors.modelo_id ? 'is-invalid' : ''
                  }`"
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
                <div class="invalid-feedback" v-if="errors.modelo_id">
                  {{ errors.modelo_id[0] }}
                </div>
              </div>
              <div class="form-group">
                <label for="04" class="col-form-label">Versão (opcional)</label>
                <select
                  v-model="params.versao_id"
                  type="text"
                  id="04"
                  class="form-control"
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
              <div class="form-group">
                <label for="05" class="col-form-label">Titulo</label>
                <input
                  type="text"
                  v-model="dica.title"
                  :class="`form-control ${errors.title ? 'is-invalid' : ''}`"
                  id="05"
                />
                <div class="invalid-feedback" v-if="errors.title">
                  {{ errors.title[0] }}
                </div>
              </div>
              <div class="form-group">
                <label for="06" class="col-form-label">Descrição</label>
                <textarea
                  v-model="dica.descri"
                  :class="`form-control ${errors.descri ? 'is-invalid' : ''}`"
                  id="06"
                ></textarea>
                <div class="invalid-feedback" v-if="errors.descri">
                  {{ errors.descri[0] }}
                </div>
              </div>
              <button
                type="button"
                class="btn btn-danger btn-sm"
                data-dismiss="modal"
              >
                Cancelar
              </button>
              <button
                type="button"
                class="btn btn-success btn-sm float-right"
                @click.prevent="storeDica()"
              >
                Cadastrar
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import apiCategory from "../../../api/category";
import api from "../../../api/dicas";
export default {
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
      dica: {
        title: "",
        descri: "",
        modelo_id: "",
        versao_id: "",
      },
      errors: {},
    };
  },
  methods: {
    modalPost() {
      this.getTipos();
      this.errors = {};
      this.resetForm();
      $("#ModalDica").modal("show");
    },
    getTipos() {
      apiCategory
        .tipos()
        .then((r) => {
          this.tipos = r.data;
        })
        .catch(() => {});
    },
    storeDica() {
      const data = {
        title: this.dica.title,
        descri: this.dica.descri,
        modelo_id: this.params.modelo_id,
        versao_id: this.params.versao_id,
      };
      api
        .dicasStore(data)
        .then((r) => {
          this.resetForm();
          this.$toastr.s("Cadastrado com sucesso!");
          $("#ModalDica").modal("hide");
          this.$parent.getDicas();
        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
          }
          this.$toastr.e("Ocorreu um erro.");
        });
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
      this.params.marca_id = "";
      this.params.modelo_id = "";
      this.params.versao_id = "";
      this.getMarcas(this.params.tipo_id);
    },
    onchangeMarca() {
      this.versoes = {};
      this.params.modelo_id = "";
      this.params.versao_id = "";
      this.getModelo(this.params.marca_id);
    },
    onchangeModelo() {
      this.params.versao_id = "";

      this.getVersao(this.params.modelo_id);
    },
    resetForm() {
      this.params = {};
      this.dica = {};
    },
  },
};
</script>
