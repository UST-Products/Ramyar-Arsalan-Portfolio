import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import vuetify from '@/plugins/vuetify' // path to vuetify expor
import axios from 'axios'
import VueMeta from 'vue-meta'

const serverUrl = 'http://localhost/work/app-smartlife' 
store.state.serverurl = serverUrl
Vue.config.productionTip = false
axios.defaults.baseURL = serverUrl+'/api'

var VueScrollTo = require('vue-scrollto');

Vue.use(VueScrollTo, {
    container: "body",
    duration: 500,
    easing: "ease",
    offset: 0,
    force: true,
    cancelable: true,
    onStart: false,
    onDone: false,
    onCancel: false,
    x: false,
    y: true
})

Vue.use(VueMeta) 
new Vue({
router,
store,
vuetify,
render: h => h(App)
}).$mount('#app')