require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-resource'));

Vue.component('tablaproducto-component', require('./components/inventario/inventario.vue').default);

Vue.component('formulario-component', require('./components/inventario/modalinventario.vue').default);
/**
 *Funcionalidades axios para los productos.
*/

const app = new Vue({
    el: '#app',
});