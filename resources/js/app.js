require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-resource'));

Vue.component('tablaproducto-component', require('./components/inventario/inventario.vue').default);

Vue.component('formulario-component', require('./components/inventario/modalinventario.vue').default);

/** proceso de los productos*/
Vue.component('tablaproductos-component', require('./components/producto/tablaproductos.vue').default);
Vue.component('modalproducto-component', require('./components/producto/modalproductos.vue').default);
/**
 *Funcionalidades axios para los productos.
*/

const app = new Vue({
    el: '#app',
});