require('./bootstrap');

import Vue from 'vue'
import Vuetify from 'vuetify/lib'

import VApp from 'vuetify/lib/components/VApp'
import VMain from 'vuetify/lib/components/VMain'

Vue.use(Vuetify)

const app = new Vue({
  vuetify: new Vuetify({}),
  components: {
    VApp, VMain
  },
  el: '#app'
})