<template>
	<div class="restaurant_card">
		<img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8cmVzdGF1cmFudHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=700&q=60" alt="">
		<div class="restaurant_card__name">
			Nome Ristorante
		</div>
	</div>
</template>

<script>
export default {
	name: 'RestaurantCard',
	props: {
		restaurant_id: Number,
		restaurant_name: String,
		restaurant_cover: String,
	},
}
</script>

<style scoped lang="scss">
@import '../../sass/front.scss';
.restaurant_card {
	border-radius: .8rem;
	// background-color: $dark-700;
	position: relative;
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