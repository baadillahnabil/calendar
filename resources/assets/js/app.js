import Buefy from 'buefy'
import 'buefy/lib/buefy.css'
import Vue from 'vue';
import App from './app.vue';
import './bootstrap';

// Add external library
Vue.use(Buefy);

// Vue settings
Vue.config.productionTip = false;

// Vue main instance
new Vue({
    components: { App },
    template: '<App />'
}).$mount('#app');