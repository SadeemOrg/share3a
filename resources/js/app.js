import './bootstrap';

import { createApp } from 'vue';
// import App from './app.vue'
import App from '/resources/js/app.vue';


createApp({
})
.component('app-component', App)
.mount('#app');