import Vue from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify';
import axios from 'axios'
import VueAxios from 'vue-axios'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate";

Vue.use(VueAxios, axios)

Vue.use(Vuex);

Vue.config.productionTip = false

const store = new Vuex.Store({
  plugins: [createPersistedState()],

  state: {
    user: null,
    token: null
  },

  mutations: {
    setUser(state, user) {
      state.user = user
    },

    setToken(state, token) {
      state.token = token
    },

    logOff(state) {
      state.user = null
      state.token = null
    }
  },
  
  getters: {
    getUser: (state) => {
      return state.user
    },

    getToken: (state) => {
      return state.token
    }
  }
});


new Vue({
  router,
  vuetify,
  store,
  render: h => h(App)
}).$mount('#app')


