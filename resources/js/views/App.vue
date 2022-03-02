<template>
	<div class="col-6 offset-3">
		<!-- importare qui header generico del front end -->
			<Header />
			<router-view></router-view>
			<h1>ciao</h1>
			<a href="/restaurants/dashboard">admin</a>
		<!-- <ExampleComponent /> -->

		<!-- importare qui footer generico per il front end -->
	</div>
</template>

<script>
import Header from './partials/Header.vue';
export default {
	name: 'App',
	components: {
		Header,
	},
}
</script>

<style lang="scss">
@import '../../sass/front.scss';

*,
*::after,
*::before {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}

body {
	background-color: $body-bg;
	font-family: $font-family-sans-serif;
}
</style>