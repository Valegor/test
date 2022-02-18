import '@babel/polyfill'
import 'mutationobserver-shim'
import Vue from 'vue'
import './plugins/bootstrap-vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import router from './router'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
// import axios from './axios/axios'
// import Vuex from 'vuex'
import store from './store/index'
import 'es6-promise/auto'
import DefaultLayout from "./layouts/Default"
import GameLayout from "./layouts/Game"

import GameCategories from './components/Game/GameCategories'
import PostsCategories from '@/components/Blog/PostsCategories'
import CardsCategories from '@/components/Game/CardsCategories'
import Cards from '@/components/Game/Cards'
import Store from '@/components/Store'

// axios.defaults.baseURL = 'http://laravel-super.loc:8888/';

// Vue.use(Vuex)

library.add(faUserSecret)

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('default-layout', DefaultLayout)
Vue.component('game-layout', GameLayout)
Vue.component('GameCategories', GameCategories)
Vue.component('PostsCategories', PostsCategories)
Vue.component('CardsCategories', CardsCategories)
Vue.component('Cards', Cards)
Vue.component('Store', Store)

Vue.component('pagination', require('laravel-vue-pagination'));

// Vue.prototype.axios = axios

Vue.config.productionTip = false


new Vue({
  vuetify,
  router,
  store,
  render: h => h(App)
}).$mount('#app')
