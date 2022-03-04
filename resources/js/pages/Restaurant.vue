<template>
    <section class="restaurant">
        <InfoRestaurant />
        
        <div class="container restaurant-container">
        <div class="row">
            <MenuRestaurant />
            <CartRestaurant />
        </div>
            
        </div>



    </section>
</template>

<script>
import InfoRestaurant from '../components/InfoRestaurant.vue'
import MenuRestaurant from '../components/MenuRestaurant.vue'
import CartRestaurant from '../components/CartRestaurant.vue'
export default {
    name: 'Restaurant',
    components: {
        InfoRestaurant,
        MenuRestaurant,
        CartRestaurant,
    }
 

}
</script>

<style scoped lang="scss">
.restaurant {
    .restaurant-container {
        padding-top: 50px;
    }
}

</style>