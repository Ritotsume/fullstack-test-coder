import Vue from 'vue'
import { BootstrapVue } from 'bootstrap-vue'
import moment from 'moment'
import App from './App.vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import router from './router'

Vue.config.productionTip = false

Vue.use(BootstrapVue)

Vue.filter('formatDate', function(value, format) {
  if (value) {
    moment.locale('pt-br')
    return moment(String(value)).format(format)
  }
})

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
