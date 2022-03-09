<template>
	<section class="container">
		<div class="row">
			<div class="col-lg-6 col-12 left">
				<div class="my-5 window">
					<div class="top-section">
						<h4>Dati Ordine</h4>
						<div class="small">
							Compila correttamente tutti i campi per far apparire il campo per la carta di credito
						</div>
						<div class="notice small">
							Tutti i campi sono obbligatori
						</div>
					</div>
					<div class="form">
						
							<!-- @submit.prevent="sendEmail" -->
							<form action=""
							
							>
								<label for="name">Nome *</label>
								<input type="text" id="name" v-model="name" autofocus
								required minlength="2" maxlength="255"
								>
								<label for="lastname">Cognome *</label>
								<input type="text" id="lastname" v-model="lastname" autocomplete="off"
								required minlength="2" maxlength="255"
								>
								<label for="email">Email *</label>
								<input type="email" id="email" v-model="email" autocomplete="off"
								required minlength="2" maxlength="80"
								>
								<label for="phone">N.Telefono *</label>
								<input type="phone" id="phone" v-model="phone" autocomplete="off"
								required minlength="10" maxlength="12"
								>
								<label for="address">Indirizzo di Consegna *</label>
								<input type="text" id="address" v-model="address" autocomplete="off"
								required minlength="8" maxlength="255"
								>
								<input v-if="showCheckOut" type="submit" value="Procedi al pagamento" @click="saveOrderData()">
								<Loader />

								<v-braintree v-if="paymentToken && dataIsProcessed"
									:authorization="paymentToken"
									locale="it_IT"
									@success="onPaymentSuccess"
									@error="onPaymentError">
								</v-braintree>
								
								<!-- loader apparirà al click e error message dentro il form-->
								
								<!-- <div class="error">
									<div class="d-flex justify-content-center p-2">
										<i class="fa-solid fa-circle-xmark"></i>
									</div>
									<h5>Messaggio di errore</h5>
									<p >Non siamo stati in grado di procedere con il pagamento, verifica di aver inserito correttamente il numero della tua carta di credito.</p>
								</div> -->
							</form>
					</div>
				</div>
			</div>
			<CartRestaurant class="col-xs-12 col-md-6" :carrello="cart" />
		</div>
	</section>
</template>

<script>
import CartRestaurant from '../components/CartRestaurant';
import Loader from '../components/Loader';
import axios from 'axios';
export default {
name:'Checkout',
components:{
	CartRestaurant,
	Loader,
	},
	computed: {
		showPayment() {
			if (this.name !== '' && this.lastname !== '' && this.phone !== '' && this.email !== '' && this.address !== '') {
				return this.showCheckOut = true
			}
			return this.showCheckOut = false
		}
	},
	data() {
		return {
			// questo campo viene riempito in automatico dalla funzione in created
			paymentToken: null,
			name: '',
			lastname: '',
			email: '',
			phone: '',
			address: '',
			cart: null,
			showCheckOut: null,
			dataIsProcessed: false,
		}
	},
	async created() {
		// questa funzione richiede la generazione di un token sul nostro server che utilizzeremo come token di autorizzazione per la ricchiesta effetiva di pagamento
		this.getLocalStorage();
		await axios.get('http://127.0.0.1:8000/api/token')
			.then(({
				data
			}) => {
				this.paymentToken = data.token;
			})
			.catch(err => {
				console.error(err);
			});
	},
	methods: {
		// qui verrà gestito il caso di successo del pagamento
		onPaymentSuccess (payload) {
			let nonce = payload.nonce;
			console.log('payload', payload, 'nonce', nonce);
		},
		// qui verrà gestito il caso di errore
		onPaymentError (error) {
			let message = error.message;
			console.log('message', message,'error', error);
		},
		getLocalStorage() {
				this.cart = JSON.parse(window.localStorage.__cart);
				console.log(this.cart);
		},
		saveOrderData() {
			let orderData = {
				name: this.name,
				lastName: this.lastname,
				email: this.email,
				phone: this.phone,
				address: this.address,
				tot: cartLS.total(),
			};
			window.localStorage.setItem('order_data', JSON.stringify(orderData));
			this.dataIsProcessed = true;
			console.log(orderData);
		},

		//mostriamo il metodo di pagamento alla compilazione dei campi
	
	},
}
</script>

<style scoped lang="scss">
@import '../../sass/front.scss';
body {
	font-family: $font-family-sans-serif;
}

.left {
	position: relative;
	top: -20px;
}

.row {
	margin-top: 5rem;
}
.window{
	.top-section{
		color: $primary-400;
		transform: translateY(-1.2rem);
		.notice {
			color: red;
		}
		.small:first-of-type {
			font-weight: bold;
			margin-bottom: .5rem;
		}
	}
	.form{
		form {
			input {
				display: block;
				width: 100%;
				font-size: 17px;
				margin-block: .5rem 1.5rem;
				height: 35px;
				border: 1px solid lightgrey;
				border-radius: .8rem;
				padding: 3px 0 3px .5rem;
				background-color: $clear-100;
				&:valid {
					border: 1px solid lightgreen;
				}
				&:invalid {
					border: 1px solid $primary-400;
				}
				&:focus {
					outline: none;
					border-bottom-width: 4px;
				}
			}
		}
		.pay{
			background-color: $secondary-200;
			color: $dark-700;
			font-weight: bold;
			color: $dark-700;
		}
		.cancel{
		background-color: white;
		text-decoration: none;
		color: $primary-400;
		color: $orange;
	}
	.pay,
	.cancel{
		margin-top:10px;
		text-decoration: none;
	}
	.error{
		width:350px;
		border:5px solid $orange;
		border-radius:10px;
		padding:10px;
		text-align: center;
		.fa-circle-xmark{
			font-size:50px;
			color:$red;
		}
		p{
			padding:10px 0px;
		}
	}
	}
}
</style>