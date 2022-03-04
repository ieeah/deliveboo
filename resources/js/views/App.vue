<template>
	<div>
		<!-- importare qui header generico del front end -->
			<Header class="col-xs-12 col-md-9 mx-auto px-xs-3 px-md-0" />
			<router-view></router-view>
		<!-- <ExampleComponent /> -->

		<!-- importare qui footer generico per il front end -->
		<Footer />
	</div>
</template>

<script>
import Header from './partials/Header.vue';
import Footer from './partials/Footer.vue';
// import Home from '../pages/Home.vue';
export default {
	name: 'App',
	components: {
		Header,
		Footer,
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