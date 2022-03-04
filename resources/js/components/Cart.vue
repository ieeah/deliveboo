<template>
  <div>
      <!-- Quando arriverà il momento ci metto 
      le props e tutti i box li faccio venire fuori
       con un loop 
       i riquadri arancioni sono solo di riferimento-->
      <div class="window">
          <div class="top-section">
              <span>Carrello</span>
          </div>

          <div class="d-flex">
          <div class="big-box"></div>
          <div class="medium-box d-flex justify-content-center">
              <div><i class="fa-solid fa-plus"></i></div>
              <div class="middle-box"></div>
              <div><i class="fa-solid fa-minus"></i></div>
              </div>
          <div class="small-box"></div>
          </div>
         
          <div class="d-flex">
          <div class="big-box"></div>
          <div class="medium-box d-flex justify-content-center">
              <div><i class="fa-solid fa-plus"></i></div>
              <div class="middle-box"></div>
              <div><i class="fa-solid fa-minus"></i></div>
              </div>
          <div class="small-box"></div>
          </div>

          <div class="d-flex">
          <div class="big-box"></div>
          <div class="medium-box d-flex justify-content-center">
              <div><i class="fa-solid fa-plus"></i></div>
              <div class="middle-box"></div>
              <div><i class="fa-solid fa-minus"></i></div>
              </div>
          <div class="small-box"></div>
          </div>

          <div class="d-flex">
          <div class="big-box"></div>
          <div class="medium-box d-flex justify-content-center">
              <div><i class="fa-solid fa-plus"></i></div>
              <div class="middle-box"></div>
              <div><i class="fa-solid fa-minus"></i></div>
              </div>
          <div class="small-box"></div>
          </div>

          <div class="bottom-section d-flex justify-content-between">
          <span>Tot</span>
          <span>€€</span>
          </div>

      </div>

  </div>
</template>

<script>
export default {
name:'Cart',
}
</script>

<style scoped lang="scss">
@import '../../sass/front.scss';

.window{
    width:300px;
    border:5px solid $orange;
    border-radius:10px;
    .top-section{
        width:100%;
        height:25px;
        background-color:$orange;
        color:white;
        padding:5px;
    }
    .big-box{
        width:150px;
        height:30px;
        margin:10px;
        background-color:#f5c9b3;
    }
    .medium-box{
        width:60px;
        height:30px;
        margin:10px;
        background-color:$secondary-200;
        padding:5px;
        border-radius:5px;
        i{
            font-size:10px;
            color:$blue;
        }
        .middle-box{
            width:20px;
            height:100%;
            background-color:white;
            border-radius:5px 0px;
            margin:0px 5px;
        }
    }
    .small-box{
        width:30px;
        height:30px;
        margin:10px;
        background-color:#f5c9b3;
    }
    .bottom-section{
        width:100%;
        height:30px;
        background-color:$orange;
        color:white;
        padding:5px;
    }
}
</style>