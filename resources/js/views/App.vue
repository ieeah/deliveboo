<template>
	<div>
		<!-- importare qui header generico del front end -->
			<Header class="col-xs-12 col-md-9 mx-auto px-3" />
			<router-view></router-view>
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