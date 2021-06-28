import axios from "axios";

const rota = "http://localhost:8080/api/";

let auth = {
  login(params) {
    return axios.post(rota + "login", params);
  },
  register(params) {
    return axios.post(rota + "register", params);
  },
  athenticated() {
    return axios.get(rota + "athenticated");
  },
  logout() {
    return axios.get(rota + "logout");
  },
};

export default auth;
