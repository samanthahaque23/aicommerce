import axios from "axios";
import store from "./store";
import router from "./router";

const axiosClient = axios.create({
  baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`
});

axiosClient.interceptors.request.use(config => {
  config.headers.Authorization = `Bearer ${store.state.user.token}`;
  return config;
});

axiosClient.interceptors.response.use(response => {
  return response;
}, error => {
  if (error.response) {
    if (error.response.status === 401) {
      store.commit('setToken', null)
      router.push({name: 'login'})
    } else if (error.response.status === 500) {
      console.error('Server error:', error.response.data); // Log the server error details
    }
  }
  throw error;
});

export default axiosClient;
