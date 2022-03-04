<template>
	<div class="home_page">
		<div class="hero_banner col-12 d-md-flex">
			<h1 class="hero_title col-xs-12 col-md-5 offset-lg-1 col-lg-5">
				Il tuo cibo preferito dove vuoi <br> quando vuoi
			</h1>
			<img src="/storage/front/burger.png" alt="">
		</div>

		<section class="types_container col-xs-12 col-md-9 mx-auto px-xs-3">
			<h2 class="section_title h2 ">
				Di cosa hai voglia stasera?
			</h2>
			<div class="scrolling_arrows ">
				<div class="prev" @click="scrollCarousel(-150, '.types_carousel')">
					<i class="fa-solid fa-chevron-left"></i>
				</div>
				<div class="next" @click="scrollCarousel(150, '.types_carousel')">
					<i class="fa-solid fa-chevron-right"></i>
				</div>
			</div>

			<div class="types_carousel">
				<TypeCard v-for="(n, i) in 7" :key="'type_' + i" />
			</div>
		</section>

		
		<section class="restaurants_container col-xs-12 col-md-9 mx-auto px-xs-3">
			<h2 class="section_title">
				Ordina dai migliori in città
			</h2>
			<div class="restaurants_flex">
				<RestaurantCard v-for="(n, i) in 8" :key="'restaurant_' + i" />
			</div>
		</section>
	</div>
</template>

<script>
import TypeCard from '../components/TypeCard.vue';
import RestaurantCard from '../components/RestaurantCard.vue';
export default {
	name: 'Home',
	components: {
		TypeCard,
		RestaurantCard,
	},
	methods: {
		scrollCarousel(quantity, querySelector) {
			let carousel = document.querySelector(querySelector);
			let scrolled = carousel.scrollLeft;
			if (quantity < 0 && scrolled + (quantity) < 0) {
				carousel.scroll({
					left: 0,
					behavior: 'smooth',
				});
			} else if (quantity > 0 && scrolled + (quantity) > carousel.scrollLeftMax) {
				carousel.scroll({
					left: carousel.scrollLeftMax,
					behavior: 'smooth',
				});
			} else {
				carousel.scroll({
					left: scrolled + (quantity),
					behavior: 'smooth',
				});
			}
		}
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

.types_container {
	margin-bottom: 5rem;

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

	.types_carousel {
		display: flex;
		flex-wrap: nowrap;
		column-gap: max(2vw, 10%);
		overflow-x: auto;
		padding-block: .8rem;
		scroll-snap-type: x mandatory;
		scroll-padding: 0 0 0 1.5rem;
		// hiding scrollbars
		-ms-overflow-style: none;
  	scrollbar-width: none;
		&::-webkit-scrollbar {
			display: none;
		}
	}
}

.restaurants_flex {
	$row: 180px;
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	grid-template-rows: $row;
	grid-auto-rows: $row;
	gap: 3.8rem .8rem;
	padding-bottom: 6.8rem;
}
</style>