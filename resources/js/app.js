require('./bootstrap');

import Vue from 'vue'
import Vuetify from 'vuetify/lib'

import VApp from 'vuetify/lib/components/VApp'
import VMain from 'vuetify/lib/components/VMain'
import Residents from './views/Residents.vue'
import Payments from './views/Payments.vue'
import Paiments from './views/Paiments.vue'

Vue.use(Vuetify)

const app = new Vue({
  vuetify: new Vuetify({
    icons: { iconfont: 'md'},
  }),
  components: {
    VApp, VMain, Residents, Payments, Paiments
  },
  el: '#app'
})