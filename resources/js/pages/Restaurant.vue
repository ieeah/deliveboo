<template>
    <section class="restaurant">
        <InfoRestaurant 
        :restaurantInfo="restaurant"
        />
        
        <div class="container restaurant-container">
        <div class="row">
            <MenuRestaurant :plate="plate"/>
            <CartRestaurant />
        </div>
            
        </div>



    </section>
</template>

<script>
import InfoRestaurant from '../components/InfoRestaurant.vue'
import MenuRestaurant from '../components/MenuRestaurant.vue'
import CartRestaurant from '../components/CartRestaurant.vue'
import axios from 'axios'
export default {
    name: 'Restaurant',
    components: {
        InfoRestaurant,
        MenuRestaurant,
        CartRestaurant,
    },
    data() {
        return {
            plate: null,
            restaurant: null
        }
    },

    created() {
        this.getPlates()
        this.getRestaurant()
    },

    methods: {
        getPlates() {
            axios.get(`http://localhost:8000/api/plates/${this.$route.params.id}`)
            .then(result => {
                this.plate = result.data;
                console.log(this.plate);
            })
        },

        getRestaurant() {
            axios.get(`http://localhost:8000/api/restaurant/${this.$route.params.id}`)
            .then(result => {
                this.restaurant = result.data[0];
                console.log(this.restaurant);
            })
        }
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