
import Vue from 'vue';
import App from './views/App.vue';
import Braintree from 'vue-braintree';
// importiamo Braintree come componente globale così da poterlo utilizzare ovunque all'interno del front end
Vue.use(Braintree);



// importazione router
import router from './routes.js';


const app = new Vue({
	el: '#root',
	router,
	render: h => h(App),
});
//