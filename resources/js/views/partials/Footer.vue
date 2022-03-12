<template>
	<footer class="">
		<div class="footer container pb-5 col-xs-12 col-md-9 mx-auto px-xs-3">
			<div class="row pt-5">
				<div class="item-container col-md-3 col-sm-12">
					<div class="item">
						<h5 class="mb-3">Su Di Noi</h5>
						<ul>
							<li>
								<a href="">Chi Siamo</a>
							</li>
							<li>
								<a href="">Ristoranti</a>
							</li>
							<li>
								<a href="">Lavora con noi</a>
							</li>
							<li>
								<a href="">Design</a>
							</li>
							<li>
								<a href="">Diventa nostro partner</a>
							</li>
							<h5 class="mt-4">#restaconnesso</h5>
							<div class="socials">
								<a href=""><i class="fa-brands fa-facebook-f"></i></a>
								<a href=""><i class="fa-brands fa-instagram"></i></a>
								<a href=""><i class="fa-brands fa-twitter"></i></a>
							</div>
						</ul>
					</div>
				</div>
				<div class="note col-md-3 col-sm-12">
					<div class="item-container">
						<div class="item">
							<h5 class="mb-3">Note Legali</h5>
							<ul>
								<li>
									<a href="">Termini e Condizioni</a>
								</li>
								<li>
									<a href="">Informativa sulla privacy</a>
								</li>
								<li>
									<a href="">Cookie</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="item-container">
						<div class="item">
							<h5 class="mb-3">Aiuto</h5>
							<ul>
								<li>
									<a href="">Contatti</a>
								</li>
								<li>
									<a href="">FAQ</a>
								</li>
								<li>
									<a href="">Tipologie di Cucina</a>
								</li>
								<li>
									<a href="">Sitemap</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="authors col-md-6 col-sm-12">
					<h5>Coded by</h5>
					<div class="d-flex flex-column align-items-center">
						<a href="">Francesco Luca Labianca</a>
						<a href="">Aurora Grippaudo</a>
						<a href="">Dario Di Cuia</a>
						<a href="">Roberto Dottori</a>
						<a href="">Abdelilah El Hajji</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</template>

<script>
export default {
	name: 'Footer',
}
</script>

<style scoped lang="scss">
@import '../../../sass/front.scss';

footer {
	background-color: $primary-400;
	.footer {
		.row {
			.note {
				padding: 0;
			}
			.item-container {
				padding: 10px;
				.item {
					background-color: $body-bg;
					padding: 10px;
					ul {
						list-style: none;
						li {
							a {
								text-decoration: none;
								color: $dark-900;
								font-size: 14px;
								transition: color .15s ease-in;
								position: relative;
								font-weight: 600;
								&:hover {
									left: .6rem;
									color: $secondary-400;
								}
							}
						}
					}
					.socials {
						height: 100px;
						display: flex;
						align-items: center;
						a {
							height: 45px;
							aspect-ratio: 1;
							background-color: $primary-400;
							border-radius: 50%;
							margin-left: 15px;
							display: grid;
							place-content: center;
							text-decoration: none;
							transition: transform .35s ease-in-out;
							transition: background-color .2s ease-in;
							&:hover {
								transform: scale(1.25);
								background-color: $secondary-400;
								i {
									font-size: 1.8rem;
								}
							}
							&:first-child {
								margin-left: 0;
							}
							i {
								color: $body-bg;
							}
						}
					}
				}
			}
			.authors {
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
				a {
					margin-top: .8rem;
					color: $dark-700;
					font-weight: 600;
				}
			}
		}
	}
}



</style>