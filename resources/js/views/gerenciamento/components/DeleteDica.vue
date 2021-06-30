<template>
  <div
    class="modal fade"
    id="delModalDica"
    tabindex="-1"
    role="dialog"
    aria-labelledby="delModalDicaLabel"
    aria-hidden="true"
    data-backdrop="static"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h4>
            Deseja realmente excluir : <b>{{ dica.title }}.</b>
          </h4>
          <button
            type="button"
            class="btn btn-danger btn-sm"
            data-dismiss="modal"
          >
            Cancelar
          </button>
          <button
            type="button"
            class="btn btn-success btn-sm pull-right"
            @click.prevent="delDica(dica.id)"
          >
            Sim
          </button>
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
      dica: {},
    };
  },
  methods: {
    modalDel(dica) {
      this.dica = dica;
      $("#delModalDica").modal("show");
    },
    delDica(id) {
      api
        .dicaDelete(id)
        .then(() => {
          this.$toastr.s("Excluido com sucesso!");
          $("#delModalDica").modal("hide");
          this.$parent.getDicas();
        })
        .catch((r) => {
          this.$toastr.e("Ocorreu um erro.");
        });
    },
  },
};
</script>
