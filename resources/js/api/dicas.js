import axios from "axios";

const rota = "http://localhost:8080/api/";

let dicas = {
    dicasAll(params) {
        return axios.get(rota + "home", { params });
    },
    dicasByUser(params) {
        return axios.get(rota + "dica", { params });
    },
    dicasStore(params) {
        return axios.post(rota + "dica", params);
    },
    dicaPut(params) {
        return axios.put(rota + "dica/" + params.id, params);
    },
};

export default dicas;
