import Vue from 'Vue';
import App from './views/App.vue';

// importazione router
import router from './routes.js';

const app = new Vue({
	el: '#root',
	render: h => h(App),
});