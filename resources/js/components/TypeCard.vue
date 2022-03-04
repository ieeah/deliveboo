<template>
	<div class="type_card">
		<!-- <img :src="cover" :alt="name + ' type'"> -->
		<img src="https://images.unsplash.com/photo-1646243375307-3f6a0b03a664?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw5fHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=700&q=60" alt="">
		<div class="type_name h4">alberto</div>
	</div>
</template>

<script>
export default {
	name: 'TypeCard',
	// props: {
	// 	cover: String,
	// 	name: String,
	// },
}
</script>

<style scoped lang="scss">
@import '../../sass/front.scss';
	.type_card {
		position: relative;
		width: clamp(150px, 19%, 300px);
		flex-shrink: 0;
		scroll-snap-align: start;
		img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			object-position: center;
			filter: brightness(80%);
			border-radius: .8rem;
		}
		.type_name {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			color: $body-bg;
			font-weight: bold;
		}
	}
</style>