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
							<form action="">
								<div class="field">
									<label for="name">Nome *</label>
									<input type="text" id="name" v-model="name" autofocus
									required minlength="2" maxlength="255"
									>
									<div class="validation_error">
										<div v-show="verror.name" v-for="(error, i) in verror.name" :key="`${error}_${i}`">
											{{verror.name[i]}}
											<i class="fa-solid fa-circle-xmark"></i>
										</div>
									</div>
								</div>


								<div class="field">
									<label for="lastname">Cognome *</label>
									<input type="text" id="lastname" v-model="lastname" autocomplete="off"
									required minlength="2" maxlength="255" 
									>
									<div class="validation_error">
										<div v-show="verror.lastname" v-for="(error, i) in verror.lastname" :key="`${error}_${i}`">
											{{verror.lastname[i]}}
											<i class="fa-solid fa-circle-xmark"></i>
										</div>
									</div>
								</div>
								
								<div class="field">
									<label for="email">Email *</label>
									<input type="email" id="email" v-model="email" autocomplete="off"
									required minlength="2" maxlength="80" ref="emailNode"
									>
									<div class="validation_error">
										<div v-show="verror.email" v-for="(error, i) in verror.email" :key="`${error}_${i}`">
											{{verror.email[i]}}
											<i class="fa-solid fa-circle-xmark"></i>
										</div>
									</div>
								</div>

								<div class="field">
									<label for="phone">N.Telefono *</label>
									<input type="number" id="phone" v-model="phone" autocomplete="off"
									required minlength="10" maxlength="12"
									>
									<div class="validation_error">
										<div v-show="verror.phone" v-for="(error, i) in verror.phone" :key="`${error}_${i}`">
											{{verror.phone[i]}}
											<i class="fa-solid fa-circle-xmark"></i>
										</div>
									</div>
								</div>
								
								<div class="field">
									<label for="address">Indirizzo di Consegna *</label>
									<input type="text" id="address" v-model="address" autocomplete="off"
									required minlength="8" maxlength="255"
									>
									<div class="validation_error">
										<div v-show="verror.address" v-for="(error, i) in verror.address" :key="`${error}_${i}`">
											{{verror.address[i]}}
											<i class="fa-solid fa-circle-xmark"></i>
										</div>
									</div>
								</div>

								<input v-if="showPaymentButton" type="submit" value="Procedi al pagamento" @click.prevent="saveOrderData">

							</form>

							<div class="error" v-show="error">
								<div class="d-flex justify-content-center p-2">
									<i class="fa-solid fa-circle-xmark"></i>
								</div>
								<h5>Transazione Negata</h5>
								<p>{{error_message}}</p>

								<a href="/checkout" v-show="error">Riprova</a>
							</div>

							<v-braintree v-if="paymentToken && dataIsProcessed && !error && noValidationErrors"
									:authorization="paymentToken"
									locale="it_IT"
									@success="onPaymentSuccess"
									@error="onPaymentError">
							</v-braintree>
					</div>
				</div>
			</div>
			<CartRestaurant class="col-xs-12 col-md-6 cart" :carrello="cart" v-show="!dataIsProcessed"/>
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
		showPaymentButton() {
			if (this.name.length > 1 && this.lastname.length > 1 && this.phone.length > 9 && this.email.includes('@') && this.email.includes('.') && this.address.length > 7) {
				return true
			}
			return false
		},
		noValidationErrors() {
			if(Object.keys(this.verror).length === 0) return true;
			return false;
		},
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
			error: false,
			error_message: null,
			showCheckOut: null,
			dataIsProcessed: false,
			APIsave: 'http://127.0.0.1:8000/api/save',
			orderData: null,
			plates: null,
			verror: {},
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
			let amount = cartLS.total();
			console.log(nonce);
			axios.get(`http://127.0.0.1:8000/api/sale/${amount}/${nonce}`)
			.then(({
				data
			}) => {
				if(data.success) {
					// svuotiamo il carrello nel localStorage
					window.localStorage.setItem('__cart', '[]');
					// settiamo a zero il restaurant_id del localStorage
					window.localStorage.setItem('restaurant_id', '0');
					// settiamo a zero il totale dell'ordine sul localStorage
					window.localStorage.setItem('total_cart', '0');
					// svuotiamo il carrello di cartLS
					cartLS.list().forEach(item => cartLS.remove(item.id));
					// andiamo alla pagina di conferma dell'ordine
					window.location.href = '/confirmed';
				}
				else {
					let message = data.message;
					this.error_message = message;
					this.error = true;
				}
			})
			.catch(err => {
				console.error(err);
			});
			
		},
		// qui verrà gestito il caso di errore
		onPaymentError(error) {
			console.log('errore: ', error );
		},
		getLocalStorage() {
				this.cart = JSON.parse(window.localStorage.__cart);
		},
		saveOrderData() {
			this.orderData = {
				name: this.name,
				lastName: this.lastname,
				email: this.email,
				phone: this.phone,
				address: this.address,
				tot: cartLS.total(),
				user_id: JSON.parse(window.localStorage.getItem('restaurant_id')),
				plates: JSON.stringify(window.localStorage.__cart),
			};

			localStorage.setItem('order_data', JSON.stringify(this.orderData));
			document.querySelector('form').style = "display: none;";
			this.dataIsProcessed = true;
			this.validateForm();
		},
		axiosPost() {
			axios.get('http://127.0.0.1:8000/api/save', {
				params: JSON.parse(window.localStorage.order_data)
			})
			.then(res => {
				console.log('order', res.data);
			})
			.catch(err => {
				console.log(err);
			})
		},
		validateForm() {
			axios.get('http://127.0.0.1:8000/api/validation', {
				params: {
					name: this.name,
					lastname: this.lastname,
					email: this.email,
					phone: this.phone,
					address: this.address,
				}
			})
			.then(res => {
				this.axiosPost();
			})
			.catch(error => {
				this.verror = error.response.data.error;
				console.error(this.verror);
				document.querySelector('form').style = "display: block;";
			});
		},
		

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

.cart {
	position: sticky;top: 20px;
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
	.form {
		form {
			input {
				display: block;
				width: 100%;
				font-size: 17px;
				height: 35px;
				border: 1px solid lightgrey;
				border-radius: .8rem;
				padding: 3px 0 3px .5rem;
				background-color: $clear-100;
				margin-top: .3rem;
				border: 1px solid $primary-400;
				&[type="number"] {
					-moz-appearance: textfield;
					&::-webkit-outer-spin-button,
					&::-webkit-inner-spin-button {
						-webkit-appearance: none;
						margin: 0;
					}
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
		.error {
			border: 5px solid $primary-400;
			border-radius: .5rem;
			text-align: center;
			.fa-circle-xmark{
				margin-block: .8rem;
				font-size: 3rem;
				color:$red;
			}
			p{
				padding:10px 0px;
			}
		}
		.validation_error{
			color:$red;
			font-size: .9rem;
			margin-block: .3rem 1.5rem;
			.fa-circle-xmark{
				font-size: .75rem;
			}
		}
	}
}
</style>