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
    firstName: null,
    lastName: null,
    token: null
  },

  mutations: {
    setUser(state, user) {
      state.user = user
    },

    setToken(state, token) {
      state.token = token
    },
    
    setFirstName(state, firstName) {
      state.firstName = firstName
    },

    setLastName(state, lastName) {
      state.lastName = lastName
    },

    logOff(state) {
      state.user = null
      state.token = null
      state.firstName = null
      state.lastName = null
    }
  },
  
  getters: {
    getUser: (state) => {
      return state.user
    },

    getFirstName: (state) => {
      return state.firstName
    },

    getLastName: (state) => {
      return state.lastName
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


