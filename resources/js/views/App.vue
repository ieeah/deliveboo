<template>
	<div class="col-6 offset-3">
		<!-- importare qui header generico del front end -->
			<router-view></router-view>
			<h1>ciao</h1>
			<a href="/restaurants/dashboard">admin</a>
		<!-- <ExampleComponent /> -->

		<!-- importare qui footer generico per il front end -->
	</div>
</template>

<script>
// import ExampleComponent from '../components/ExampleComponent.vue';
export default {
	name: 'App',
	components: {
		// ExampleComponent,
	},
}
</script>

<style lang="scss">

</style>