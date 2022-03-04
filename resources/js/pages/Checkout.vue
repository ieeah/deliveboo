<template>
  <section class="container">

<div class="row">
    <div class="col-6">
        <div class="window">
            <div class="top-section">
              <span>Dati Ordine</span>
          </div>

          <div><span>Content</span></div>

          <div>
          <a class="btn" href="">
              Procedi al pagamento
          </a>

          <a href="">Annulla</a>
          </div>
          
        </div>
    </div>

    <div class="col-6">
        <Cart />

    </div>

</div>


  </section>
</template>

<script>
import Cart from '../components/Cart'
export default {
name:'Checkout',
components:{
    Cart,
}
}
</script>

<style scoped lang="scss">
@import '../../sass/front.scss';
.window{
    width:300px;
    height:300px;
    border:5px solid $orange;
    border-radius:10px;
    .top-section{
        width:100%;
        height:25px;
        background-color:$orange;
        color:white;
    }
    .btn{
        background-color: $secondary-200;
		font-weight: bold;
		text-decoration: none;
		color: $dark-700;
    }
}
</style>