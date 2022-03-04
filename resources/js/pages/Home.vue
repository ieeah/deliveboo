<template>
	<div class="home_page">
		<div class="hero_banner col-12">
			<h1 class="hero_title col-xs-12 offset-lg-1 col-lg-5">
				Il tuo cibo preferito dove vuoi <br> quando vuoi
			</h1>
		</div>
	</div>
</template>

<script>
export default {
	name: 'Home',
}
</script>

<style scoped lang="scss">
@import '../../sass/front.scss';

.hero_banner {
	height: 400px;
	background: rgb(243,162,119);
	background: linear-gradient(66deg, rgba(243,162,119,1) 0%, rgba(255,141,92,1) 100%);
	display: flex;
	align-items: center;
	background-image: url('/storage/front/burger.png');
	background-repeat: no-repeat;
	background-size: cover;
	background-position: top right;
	.hero_title {
		height: fit-content;
		text-align: right;
		color: $body-bg;
	}
}
</style>