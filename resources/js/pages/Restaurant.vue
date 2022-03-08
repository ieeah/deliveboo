<template>
    <section class="restaurant">
        <InfoRestaurant v-if="this.restaurant"
        :restaurantInfo="restaurant"
        />
        <p v-else>Loading...</p>
        <div class="restaurant-container col-xs-12 col-md-9 mx-auto px-xs-3">
                <!-- <MenuRestaurant :plate="plate"/> -->
            <div class="col-sm-12 col-md-6 plates_container">
                <CardRestaurant v-for="(plate, i) in plates" :key="`plate_${i}`"
                v-show="plate.visibility"
                :name="plate.name"
                :ingredients="plate.ingredients"
                :price="plate.price"
                @click.native="toggleToCart(plate)"/>
            </div>
            <CartRestaurant class="col-sm-12 col-md-6" :carrello="cart" />
        </div>
    </section>
</template>

<script>
import InfoRestaurant from '../components/InfoRestaurant.vue';
import MenuRestaurant from '../components/MenuRestaurant.vue';
import CardRestaurant from '../components/CardRestaurant.vue';
import CartRestaurant from '../components/CartRestaurant.vue';
import axios from 'axios'
export default {
    name: 'Restaurant',
    components: {
        InfoRestaurant,
        MenuRestaurant,
        CartRestaurant,
        CardRestaurant,
    },
    data() {
        return {
            plates: null,
            restaurant: null,
            cart: null,
        }
    },
    created() {
        this.getPlates();
        this.getRestaurant();
        this.getLocalStorage();
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
                this.plates = result.data;
            })
            .catch(err => {
                console.log(err);
            })
        },
        toggleToCart(plate) {
            if (cartLS.exists(plate.id)) {
                cartLS.remove(plate.id);
            } else {
                let piatto = {id: plate.id, name: plate.name, price: plate.price};
                cartLS.add(piatto);
            }
            this.cart = JSON.parse(window.localStorage.__cart);
        },
        getLocalStorage() {
            this.cart = JSON.parse(window.localStorage.__cart);
            console.log(this.cart);
        }

    }

}
</script>

<style scoped lang="scss">

.restaurant-container {
    margin-top: 150px;
    display: flex;
    align-items: flex-start;
    .plates_container {
        display: flex;
        flex-wrap: wrap;
    }
}

</style>