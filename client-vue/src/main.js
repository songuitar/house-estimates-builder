import Vue from 'vue'
import App from './App.vue'
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import BootstrapVue from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

//import routes
import routes from './router/_routes'

import Full from './components/base/Full'

Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(BootstrapVue);


// Add routes to VueRouter
const router = new VueRouter({
    // ...
    routes: [
        {
            name: 'Full',
            path: '/',
            component: Full,
            children: routes
        }
    ]
});

// Add the modules in the store
import woodtype from './store/modules/woodtype/';
import planksize from './store/modules/planksize/';
import plank from './store/modules/plank/';
import element from './store/modules/element/';


export const store = new Vuex.Store({
    // ...
    modules: {
        woodtype,
        planksize,
        plank,
        element
    }
});


new Vue({
    el: '#app',
    store,
    router,
    render: h => h(App)
})
