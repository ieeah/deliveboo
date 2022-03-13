<template>
	<div class="test">
		<h1>porco dio</h1>
	</div>
</template>

<script>
import axios from 'axios';
export default {
	name: 'Test',
	data() {
		return {

		}
	},
	created() {
		this.axiosToDB();
	},
	methods: {
		axiosToDB() {
			axios.get('http://127.0.0.1:8000/api/save', {
				params: {
					name: 'test name 1',
					lastName: 'test surname',
					email: 'email@mail.it',
					phone: '3403149340',
					address: 'via del culo di cane 4',
					tot: 123,
					user_id: 1,
				}
			})
			.then(res => {
				console.log('order', res.data);
			})
			.catch(err => {
				console.log(err);
			})
		},
	},
}
</script>

<style lang="scss" scoped>

</style>