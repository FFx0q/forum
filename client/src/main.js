import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import vueResource from 'vue-resource'

Vue.use(vueResource)
Vue.config.productionTip = false

Vue.http.options.root = 'http://localhost:8000/'

new Vue({
    router,
    render: h => h(App),
}).$mount('#app')
