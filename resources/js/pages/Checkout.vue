<template>
  <section class="container">

<div class="row">
    <div class="col-lg-6 col-12">
        <div class="my-5 window">
            <div class="top-section">
              <span>Dati Ordine</span>
          </div>
          
          <div class="form container">
          <div>
              <h5>Form content</h5>
              <h5>Form content</h5>
              <h5>Form content</h5>
              <h5>Form content</h5>
              <h5>Form content</h5>
             

          <div class="d-flex justify-content-between">
          <a class="btn pay" href="">
              Procedi al pagamento
          </a>

          <a class="btn cancel"  href="">
              Annulla
          </a>
         

          </div>
          
          <!-- loader apparirà al click e error message dentro il form-->
          <Loader />

          <div class="error">
            <div class="d-flex justify-content-center p-2">
                <i class="fa-solid fa-circle-xmark"></i>
                </div>
            <h5>Messaggio di errore</h5>
           <p >Non siamo stati in grado di procedere con il pagamento, verifica di aver inserito correttamente il numero della tua carta di credito.</p>
          </div>
          
          </div>
          </div>

        </div>
    </div>


    <CartRestaurant class="col-xs-12 col-md-6" />


</div>


  </section>
</template>

<script>
import CartRestaurant from '../components/CartRestaurant';
import Loader from '../components/Loader';
export default {
name:'Checkout',
components:{
    CartRestaurant,
    Loader,
}
}
</script>

<style scoped lang="scss">
@import '../../sass/front.scss';
.window{
    width:400px;
    border:5px solid $orange;
    border-radius:10px;
    .top-section{
        width:100%;
        height:25px;
        background-color:$orange;
        color:white;
        padding:5px;
    }
    .form{
        margin:10px;
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
    .pay,.cancel{
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