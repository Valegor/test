import Vue from 'vue'
import Vuex from 'vuex'
import env from './env'
import game from './game'
import user from './user'
import object from './object'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {},
  getters: {},
  mutations: {},
  actions: {},
})

export default new Vuex.Store({
  modules: {
    env,
    game,
    user,
    object
  }
})
