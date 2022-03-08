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
    mounted() {
        this.checkCartRestaurant();
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
                cartLS.list().length == 0 ? window.localStorage.setItem('restaurant_id', '0') : console.log('ok');
            } else {
                let piatto = {id: plate.id, name: plate.name, price: plate.price};
                cartLS.add(piatto);
                window.localStorage.setItem('restaurant_id', this.restaurant.id.toString());
            }
            this.cart = JSON.parse(window.localStorage.__cart);
        },
        getLocalStorage() {
            this.cart = JSON.parse(window.localStorage.__cart);
            console.log(this.cart);
        },
        checkCartRestaurant() {
            if(window.localStorage.restaurant_id == '0' || window.localStorage.restaurant_id == this.$route.params.id) {
                return console.log('no problemo amico');
            } else {
                let ok = confirm('nel carrello sono presenti piatti di un altro ristorante\n se procedi, verrà svuotato');
                    if (ok) {
                        window.localStorage.setItem('__cart', '[]');
                        window.localStorage.setItem('restaurant_id', '0');
                        this.cart = [];
                        cartLS.list().forEach(item => cartLS.remove(item.id));
                    } else {
                        window.location.href = '/';
                    }
            }
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