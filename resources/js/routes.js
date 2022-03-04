// dichiarazione dipendenze
import Vue from 'vue';
import VueRouter from 'vue-router';

// componenti per rotta
// import Home from './pages/home';
import Home from './pages/Home.vue';
import Confirm from './pages/Confirm.vue';

// attivazione del router
Vue.use(VueRouter);

// definizione delle rotte
const router = new VueRouter({
	mode: 'history',
	linkExactActiveClass: 'active',
	routes: [
		// esempio di rotta
		{
			path: '/',
			name: 'home',
			component: Home,
		},
		{
			path: '/confirmed',
			name: 'confirmed-payment',
			component: Confirm,
		},
	],
});

// esportazione delle rotte per il loro utilizzo in altri file
export default router;