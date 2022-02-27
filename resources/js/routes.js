import Vue from 'vue';
import VueRouter from 'vue-router';

// importare qui i componenti che faranno da pagina

Vue.use(VueRouter);

const router = new VueRouter({
	mode: 'history',
	linkExactActiveClass: 'active',
	routes: [
		//esempio di rotta
		// {
		// 	path: '/',
		// 	name: 'home',
		// 	component: Home,
		// },
	],
});

// esportazione delle rotte per il loro utilizzo in altri file
export default router;