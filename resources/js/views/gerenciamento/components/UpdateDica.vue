<template>
  <div>
    <div
      class="modal fade"
      id="ModalDicaUpdate"
      tabindex="-1"
      role="dialog"
      aria-labelledby="ModalDicaUpdateLabel"
      aria-hidden="true"
      data-backdrop="static"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"><h5>Atualizar</h5></div>
          <div class="modal-body">
            <form>
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
                @click.prevent="putDica(dica)"
              >
                Atualizar
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import api from "../../../api/dicas";
export default {
  data() {
    return {
      errors: {},
      dica: {},
    };
  },
  methods: {
    modalPut(dica) {
      this.dica = dica;
      this.errors = {};
      $("#ModalDicaUpdate").modal("show");
    },
    putDica(dica) {
      api
        .dicaPut(dica)
        .then(() => {
          this.$toastr.s("Atualizado com sucesso!");
          $("#ModalDicaUpdate").modal("hide");
          this.$parent.getDicas();
        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
          }
          this.$toastr.e("Ocorreu um erro.");
        });
    },
  },
};
</script>
