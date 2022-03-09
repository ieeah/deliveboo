<template>
	<div class="restaurant_card">
		<img :src="restaurant_thumb" :alt="restaurant_name">
		<div class="restaurant_card__name">
			{{`${restaurant_name}`}}
		</div>
	</div>
</template>

<script>
export default {
	name: 'RestaurantCard',
	props: {
		restaurant_id: Number,
		restaurant_name: String,
		restaurant_thumb: String,
	},
}
</script>

<style scoped lang="scss">
@import '../../sass/front.scss';
.restaurant_card {
	height: 100%;
	border-radius: .8rem;
	// background-color: $dark-700;
	position: relative;
	grid-column: span 1;
	grid-row: span 1;
	img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		object-position: center;
		border-radius: .8rem;
		filter: brightness(85%);
		opacity: .8;
		&:hover {
			opacity: 1;
			filter: brightness(100%);
			cursor: pointer;
		}
	}
	&__name {
		position: absolute;
		bottom: - 1.8rem;
		text-transform: uppercase;
		font-weight: bold;
	}
}
</style>