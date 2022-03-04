<template>
	<footer class="">
		<div class="footer container pb-5">
			<div class="row pt-5">
				<div class="item-container col-md-3 col-sm-12">
					<div class="item">
						<h5 class="mb-3">Su Di Noi</h5>
						<ul>
							<li>
								<a href="">Chi Siamo</a>
							</li>
							<li>
								<a href="">Chi Siamo</a>
							</li>
							<li>
								<a href="">Chi Siamo</a>
							</li>
							<li>
								<a href="">Chi Siamo</a>
							</li>
							<li>
								<a href="">Chi Siamo</a>
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
									<a href="">Tipologia di Cucina</a>
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
					<ul>
						<li>Francesco Luca Labianca</li>
						<li>Aurora Grippaudo</li>
						<li>Dario Di Cuia</li>
						<li>Roberto Dottori</li>
						<li>Abdelilah El Hajji</li>
					</ul>
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
					background-color: $clear-100;
					padding: 10px;
					ul {
						list-style: none;
						li {
							a {
								text-decoration: none;
								color: $dark-900;
								font-size: 14px;
							}
						}
					}
					.socials {
						height: 100px;
						display: flex;
						align-items: center;
						a {
							padding: 15px;
							background-color: $primary-400;
							border-radius: 100%;
							margin-left: 15px;
							i {
								color: white;
							}
							&:first-child {
								padding: 15px 18px;
								margin-left: 0;
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
				ul {
					list-style: none;
					li {
						margin-top: 10px;
						text-align: center;
					}
				}
			}
		}
	}


	


}



</style>