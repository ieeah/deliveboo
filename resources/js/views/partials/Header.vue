<template>
	<header>
		<a href="/" class="brand">
			<img :src="`/storage/front/brand_logo.jpeg`" alt="">
		</a>
		<a class="btn" href="/restaurants/dashboard">Profilo</a>
	</header>
</template>

<script>
export default {
	name: 'Header',
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
	}
}

</style>