/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('materialize-css');
import Categorias from './components/Almacen/Categorias.vue'
import Subcategorias from './components/Almacen/Subcategorias.vue'
import Productos from './components/Almacen/Productos.vue'
import NotFound from './components/error/NotFound.vue'
import Admin from './components/Admin/Admin.vue'
import VueRouter from 'vue-router'

window.Vue = require('vue');
Vue.use(VueRouter);




var router = new VueRouter({
    routes:[
        {   
            path:'/home',
            component: Admin
        },
        {   
            name:'almacen-categorias',
            path:'/administracion-categorias',
            component: Categorias
        },
        {
            name:'almacen-subcategorias',
            path:'/administracion-subcategorias',
            component: Subcategorias
        },
        {
            name:'almacen-productos',
            path:'/administracion-productos',
            component: Productos
        },
        {
            
            path:'*',
            component: NotFound
        },

              
    ],
    mode:'history'
})



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
