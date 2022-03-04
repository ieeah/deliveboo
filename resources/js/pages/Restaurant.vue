<template>
    <section class="restaurant">
        <InfoRestaurant />
        
        <div class="container">
        <MenuRestaurant />
            
        </div>



    </section>
</template>

<script>
import InfoRestaurant from '../components/InfoRestaurant.vue'
import MenuRestaurant from '../components/MenuRestaurant.vue'
export default {
    name: 'Restaurant',
    components: {
        InfoRestaurant,
        MenuRestaurant,
    }
 

}
</script>

<style scoped lang="scss">


</style>