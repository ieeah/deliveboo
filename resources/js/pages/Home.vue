<template>
	<div class="home_page">
		<div class="hero_banner col-12 d-md-flex">
			<h1 class="hero_title col-xs-12 col-md-5 offset-lg-1 col-lg-5">
				Il tuo cibo preferito dove vuoi <br> quando vuoi
			</h1>
			<img src="/storage/front/burger.png" alt="">
		</div>

		<h2 class="section_title h2 col-md-9 mx-auto">
			Di cosa hai voglia stasera?
		</h2>
		<div class="scrolling_arrows col-md-9 mx-auto">
			<div class="prev">
				<i class="fa-solid fa-chevron-left"></i>
			</div>
			<div class="next">
				<i class="fa-solid fa-chevron-right"></i>
			</div>
		</div>

		<div class="types col-xs-12 col-md-9 mx-auto px-xs-3">
			<TypeCard v-for="(n, i) in 7" :key="'type_' + i" />
		</div>
	</div>
</template>

<script>
import TypeCard from '../components/TypeCard.vue';
export default {
	name: 'Home',
	components: {
		TypeCard,
	},
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

.section_title {
		color: $primary-400;
		margin-block: 2rem 1.5rem;
	}

	.scrolling_arrows {
		display: flex;
		.prev,
		.next {
			height: 40px;
			aspect-ratio: 1;
			background-color: $primary-400;
			display: grid;
			place-content: center;
			border-radius: 50%;
			font-size: 1.8rem;
			color: $body-bg;
			cursor: pointer;
		}
		.prev {
			margin-right: 1.5rem;
		}
	}

.types {
	display: flex;
	flex-wrap: nowrap;
	column-gap: max(2vw, 10%);
	overflow-x: auto;
	padding-block: .8rem;
	scroll-snap-type: x mandatory;
	scroll-padding: 0 .8rem 0 .8rem;

}
</style>