import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate";

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


export default store
