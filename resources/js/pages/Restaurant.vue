<template>
    <section class="restaurant">
        <div class="col-xs-12 px-xs-3 col-md-10 px-md-0 mx-md-auto col-lg-10">
        <InfoRestaurant v-if="this.restaurant"
        :restaurantInfo="restaurant"
        />
        <p v-else>Loading...</p>
        <div class="restaurant-container row">
            <div class="col-sm-12 col-md-7 plates_container mb-4 px-md-0">
                <CardRestaurant v-for="(plate, i) in plates" :key="`plate_${i}`"
                v-show="plate.visibility"
                class="col-xs-12 col-sm-6 col-md-12 col-lg-6"
                :name="plate.name"
                :ingredients="plate.ingredients"
                :price="plate.price"
                :plate="plate"
                @click.native="toggleToCart(plate)"/>
            </div>
            <div class="col-sm-12 col-md-4 offset-md-1 px-md-0">
                <CartRestaurant :carrello="cart" :total="tot" :menu="plates" />
            </div>
        </div>
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
            tot: cartLS.total(),
        }
    },
    created() {
        this.getPlates();
        this.getRestaurant();
        this.getLocalStorage();
        this.setCartComponentTotal();
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
                
                if (cartLS.list().length == 0) {
                    window.localStorage.setItem('restaurant_id', '0');
                }
                window.localStorage.setItem('total_cart', JSON.stringify(cartLS.total()));
                this.$children[0].$data.tot = cartLS.total();
            } else {
                let piatto = {id: plate.id, name: plate.name, price: plate.price};
                cartLS.add(piatto);
                window.localStorage.setItem('total_cart', JSON.stringify(cartLS.total()));
                window.localStorage.setItem('restaurant_id', this.restaurant.id.toString());
                this.$children[0].$data.tot = cartLS.total();
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
                        this.$children[0].$data.tot = cartLS.total();
                    } else {
                        const url = `/restaurant/${window.localStorage.restaurant_id}`;
                        window.location.href = url;
                    }
            }
        },
        setCartComponentTotal() {
            this.$children[0].$data.tot = cartLS.total();
        },

    }

}
</script>

<style scoped lang="scss">

.restaurant-container {
    margin-block: 19rem 5rem;
    display: flex;
    align-items: flex-start;
    .plates_container {
        display: flex;
        flex-wrap: wrap;
    }
}

</style>
