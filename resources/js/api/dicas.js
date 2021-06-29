import axios from "axios";

const rota = "http://localhost:8080/api/";

let dicas = {
  dicasAll(params) {
    return axios.get(rota + "home", {params});
  },
};

export default dicas;
