<template>
	<div class="type_card" @click="$emit('searchTypes', id)">
		<!-- <img :src="thumb" :alt="name + ' type'"> -->
		<img :src="thumb" alt="">
		<div class="type_name h4">{{name}}</div>
	</div>
</template>

<script>
export default {
	name: 'TypeCard',
	props: {
		thumb: String,
		name: String,
		id: Number,
	},
}
</script>

<style scoped lang="scss">
@import '../../sass/front.scss';
	.type_card {
		position: relative;
		flex-shrink: 0;
		scroll-snap-align: end;
		@media screen and (max-width: 450px) {
			scroll-snap-align: end;
		}
		width: min(200px, 40%);
		max-height: 350px;
		border-radius: .8rem;
		overflow: hidden;
		cursor: pointer;
		&.disabled {
			opacity: .7;
			pointer-events: none;
			box-shadow: 0 0 1rem $secondary-400;
		}
		img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			object-position: center;
			filter: brightness(80%);
			// border-radius: .8rem;
		}
		.type_name {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			color: $body-bg;
			font-weight: bold;
			font-size: clamp(16px, 3vw, 25px);
		}
	}
</style>