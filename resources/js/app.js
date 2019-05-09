
require('./bootstrap');
require('./aboutTrainParallax');

// import $ from 'jquery';
// window.$ = window.jQuery = $;
global.$ = global.jQuery = require('jquery');

import 'jquery-ui/ui/widgets/sortable.js';
// require('./css3-animate-it');





window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('nav-menu', require('./components/productNavigationMenu/menu.vue').default);
Vue.component('menu-pop-out', require('./components/productNavigationMenu/menuPopOut.vue').default);
Vue.component('category-card', require('./components/categoryComponent/categoryCard.vue').default);
Vue.component('user-navigation', require('./components/userNavigationMenu/menu.vue').default);
Vue.component('menu-list', require('./components/productNavigationMenu/menuList.vue').default);
Vue.component('product-slider', require('./components/productSlider/products.vue').default);
Vue.component('video-modal', require('./components/videoModal/modal.vue').default);
Vue.component('shopping-cart', require('./components/cart/cartComponent.vue').default);
Vue.component('product', require('./components/cart/productComponent.vue').default);
Vue.component('cart-icon', require('./components/cart/cartIcon.vue').default);

Vue.prototype.$mainEventBus = new Vue(); // Global event bus


const app = new Vue({
    el: '#app'
});
