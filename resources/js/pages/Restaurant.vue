<template>
    <section class="restaurant">
        <InfoRestaurant v-if="this.restaurant"
        :restaurantInfo="restaurant"
        />
        <p v-else>Loading...</p>
        
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
            restaurant: null,
            cart: {},
        }
    },

    created() {
        this.getPlates()
        this.getRestaurant()
    },

    methods: {
        getRestaurant() {
            axios.get(`http://localhost:8000/api/restaurant/${this.$route.params.id}`)
            .then(result => {
                this.restaurant = result.data[0];
            })
            .catch(err => {
                console.log(err);
            })
        },
        getPlates() {
            axios.get(`http://localhost:8000/api/plates/${this.$route.params.id}`)
            .then(result => {
                this.plate = result.data;
            })
            .catch(err => {
                console.log(err);
            })
        },
        toggleToCart(plateName) {
            if(!plateName in this.cart) {
                this.cart[plateName] = {
                prezzo: 10,
                quantity: 1,
                };
            } else delete this.cart[plateName];
        },
        plusQuantity(plateName) {
            if(plateName in this.cart) {
                // se presente, allora aumento/diminuisco la sua quantità (serviranno due funzioni separate)
                this.cart[plateName].quantity++;
            }
        },
        lessQuantity(plateName) {
            if(plateName in this.cart) {
                (this.cart[plateName].quantity > 1) ? this.cart[plateName].quantity-- : delete this.cart[plateName];
            }
        },

    }

}
</script>

<style scoped lang="scss">
.restaurant {
    p {
        text-align: center;
    }
    .restaurant-container {
        padding-top: 50px;
    }
}

</style>