import axiosClient from "../axios";

export function getUser({ commit }, data) {
  return axiosClient.get('/user', data)
    .then(({ data }) => {
      commit('setUser', data);
      return data;
    });
}

export function login({ commit }, data) {
  return axiosClient.post('/login', data)
    .then(({ data }) => {
      commit('setUser', data.user);
      commit('setToken', data.token);
      return data;
    });
}

export function logout({ commit }) {
  return axiosClient.post('/logout')
    .then((response) => {
      commit('setToken', null);
      return response;
    });
}

export function getProducts({ commit }) {
  return axiosClient.get('/product')
    .then(res => {
      // Assuming you want to commit the products to the state
      commit('setProducts', res.data); // Assuming you have a mutation to set products
      return res.data;
    })
    .catch(error => {
      console.error('Error fetching products:', error);
      throw error; // Re-throw if you want the caller to handle it
    });
}
