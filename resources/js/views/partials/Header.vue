<template>
	<header class="py-lg-2">
		<a href="/" class="brand">
			<img :src="`/storage/front/brand_logo.jpeg`" alt="">
		</a>
		<a class="btn" href="/restaurants/dashboard">
			<i class="fa-solid fa-circle-user d-md-none"></i>
			<p v-if="!logged" class="d-md-block">Accedi/Registrati</p>
			<p v-else class="d-md-block">Profilo</p>
		</a>

	</header>
</template>

<script>
export default {
	name: 'Header',
	data() {
		return {
			meta: document.querySelector('meta[name=login-status]').content,
			logged: null,
		}
	},
	created() {
		this.setLogged();
	},
	methods: {
		setLogged() {
			if (this.meta) this.logged = true;
			if (!this.meta) this.logged = false;
		}
	},
}
</script>

<style scoped lang="scss">
@import '../../../sass/front.scss';
header {
	display: flex;
	justify-content: space-between;
	align-items: center;

	.brand {
		height: 55px;
		display: inline-block;
		img {
			height: 100%;
			width: 100%;
			object-fit: contain;
		}
	}

	.btn {
		background-color: $secondary-200;
		color: $body-bg;
		font-weight: bold;
		text-decoration: none;
		color: $dark-700;
		p {
			display: none;
		}
	}
}

</style>