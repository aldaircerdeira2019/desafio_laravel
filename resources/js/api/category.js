import axios from "axios";

const rota = "http://localhost:8080/api/";

let auth = {
  tipos() {
    return axios.get(rota + "category/tipos");
  },
  marcas(params) {
    return axios.get(rota + "category/marcas", { params });
  },
  modelos(params) {
    return axios.get(rota + "category/modelos", { params });
  },
  versoes(params) {
    return axios.get(rota + "category/versoes", { params });
  },
};

export default auth;
