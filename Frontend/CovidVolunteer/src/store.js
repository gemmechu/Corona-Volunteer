import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import * as Cookies from 'js-cookie'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    barColor: 'rgba (0, 0, 0, .8), rgba (0, 0, 0, .8)',
    barImage:
      'https://demos.creative-tim.com/material-dashboard/assets/img/sidebar-1.jpg',
    drawer: null,
    userId: null,
    role: null,
  },
  getters: {
    getUserId: state => {
      state.userId = localStorage.getItem('userId')
      return state.userId
    },
  },
  mutations: {
    SET_BAR_IMAGE (state, payload) {
      state.barImage = payload
    },
    SET_DRAWER (state, payload) {
      state.drawer = payload
    },
    SET_USER (state, id) {
      state.userId = id
      localStorage.setItem('userId', id)
    },
    SET_ROLE (state, role) {
      state.role = role
      localStorage.setItem('role', role)
    },
    CLEAR_STORE (state) {
      localStorage.setItem('userId', -Infinity)
      localStorage.setItem('role', '')
      state.userId = null
      state.role = null
    },

  },
  actions: {
    setRole (context, role) {
      context.commit('SET_ROLE', role)
    },
    setUser (context, userId) {
      context.commit('SET_USER', userId)
    },
    clearStore (context) {
      context.commit('CLEAR_STORE')
    },
  },
  plugins: [
    createPersistedState({
      storage: {
        getItem: key => Cookies.get(key),
        setItem: (key, value) =>
          Cookies.set(key, value, { expires: 3, secure: true }),
        removeItem: key => Cookies.remove(key),
      },
    }),
  ],
})
