<template>
  <div>
      <!-- Quando arriverà il momento ci metto 
      le props e tutti i box li faccio venire fuori
       con un loop -->
      <div class="window">
          <div class="top-section">
              <span>Carrello</span>
          </div>

          <div class="d-flex">
          <div class="big-box"></div>
          <div class="medium-box d-flex justify-content-center"><div class="middle-box"></div></div>
          <div class="small-box"></div>
          </div>
         
          <div class="d-flex">
          <div class="big-box"></div>
          <div class="medium-box d-flex justify-content-center"><div class="middle-box"></div></div>
          <div class="small-box"></div>
          </div>

          <div class="d-flex">
          <div class="big-box"></div>
          <div class="medium-box d-flex justify-content-center"><div class="middle-box"></div></div>
          <div class="small-box"></div>
          </div>

          <div class="d-flex">
          <div class="big-box"></div>
          <div class="medium-box d-flex justify-content-center"><div class="middle-box"></div></div>
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
        background-color:#f5c9b3;
        .middle-box{
            width:30px;
            height:100%;
            background-color:$orange;
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
    }
}
</style>