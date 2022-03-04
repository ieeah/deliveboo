<template>
	<div class="home_page">
		<div class="hero_banner col-12 d-md-flex">
			<h1 class="hero_title col-xs-12 col-md-5 offset-lg-1 col-lg-5">
				Il tuo cibo preferito dove vuoi <br> quando vuoi
			</h1>
			<img src="/storage/front/burger.png" alt="">
		</div>
		
		<div class="types col-xs-12 col-md-9 mx-auto px-xs-3">
			<h2 class="section_title h2">
				Di cosa hai voglia stasera?
			</h2>
			<div class="type_card ">

			</div>
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
	display: none;
	align-items: center;
	overflow: hidden;
	margin-bottom: 5rem;
	
	.hero_title {
		height: fit-content;
		text-align: right;
		color: $body-bg;
	}

		img {
			height: 140%;
			transform: rotate(-3deg);
		}

}

.types {
	.section_title {
		color: $primary-400;
		margin-bottom: 1.5rem;
	}
	.type_card {

	}
}
</style>