<template>
    <section class="cart-restaurant">
        <div class="cart-container">
            <h4>Carrello</h4>
            <div class="cart">
                <div class="cart-items" v-if="carrello.length > 0">
                    <div class="cart-item"
                    v-for="(x, i) in carrello" :key="x.id">
                        <p class="item-name">
                            {{x.name}}
                        </p>
                        <div class="buttons">
                            <button @click="removeQuantity(x.id, i)">-</button>
                            <span>
                                {{x.quantity}}
                            </span>
                            <button @click="addQuantity(x.id, i)">+</button>
                        </div>
                        <p class="item-price">
                            {{x.quantity * x.price}}€
                        </p>
                    </div>

                    <!-- <div v-for="(plate, j) in menu" :key="`plate_${j}`" class="cart-item">
                        <p class="item-name">
                            {{plate.name}}
                        </p>
                        <div class="buttons">
                            <button @click="removeQuantity(plate.id, i)">-</button>
                            <span>
                                {{plate.quantity}}
                            </span>
                            <button @click="addQuantity(plate.id, i)">+</button>
                        </div>
                        <p class="item-price">
                            {{plate.quantity * plate.price}}€
                        </p>
                    </div> -->
                </div>
                <div v-else >Nessun articolo nel carrello</div>
            </div>
            <div class="total-price">
                    <h3>Tot</h3>
                    <h3>
                        {{tot}} €
                    </h3>
            </div>
        </div>
        <a v-show="this.$route.name != 'checkout'" href="/checkout" class="payment">Procedi con il Pagamento</a>
    </section>
</template>

<script>
export default {
    name: 'CartRestaurant',
    props: {
        carrello: Array,
        total: Number,
        menu: Array,
    },
    data() {
        return {
            tot: JSON.parse(window.localStorage.total_cart),
            plates_list: this.menu,
        }
    },
    methods: {
        addQuantity(id, index) {
            let q = this.carrello[index]['quantity'];
            if (cartLS.exists(id)) {
                q++;
                cartLS.update(id,'quantity', q);
                this.carrello[index]['quantity'] = q;
                window.localStorage.setItem('total_cart', JSON.stringify(cartLS.total()));
                this.tot = JSON.parse(window.localStorage.total_cart);
            }
        },
        removeQuantity(id, index) {
            let q = this.carrello[index]['quantity'];
            if(q > 1) {
                this.carrello[index]['quantity']--;
                q--;
                cartLS.update(id,'quantity', q);
                window.localStorage.setItem('total_cart', JSON.stringify(cartLS.total()));
                this.tot = JSON.parse(window.localStorage.total_cart);
            } else {
                this.carrello.splice(index, 1);
                cartLS.remove(id);
                window.localStorage.setItem('total_cart', JSON.stringify(cartLS.total()));
                this.tot = JSON.parse(window.localStorage.total_cart);
            }
        },
    },
}
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';
.cart-restaurant {
    height: 580px;
    position: sticky;
    top: 20px;
    .cart-container {
        border-radius: 20px;
        margin-bottom: 1.5rem;
        padding: 10px;
        background-color: $primary-400;
        h4 {
        color: $clear-100;
    }
    .cart {
        overflow: auto;
        min-height: 200px;
        padding: 20px;
        background-color: $body-bg;
        border-radius: 15px;
        margin-top: 10px;
        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            &:last-child {
                margin-bottom: 0;
            }
            .item-name {
                flex-grow: 1;
            }
            .buttons {
                height: 40px;
                background-color: $secondary-200;
                border-radius: 10px;
                display: flex;
                align-items: center;
                overflow: hidden;
                button {
                    cursor: pointer;
                    width: 30px;
                    height: 100%;
                    border: none;
                    background-color: transparent;
                    font-size: 18px;
                    &:active {
                        background-color: $secondary-400;
                    }
                }
                span {
                    background-color: $clear-100;
                    height: 80%;
                    width: 30px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
            }
            .item-price {
                text-align: right;
                min-width: 15%;
            }
        }
    }
    .total-price {
        width: 100%;
        display: flex;
        transform: translateY(10px);
        h3 {
            color: $clear-100;
        }
        h3:first-child {
            flex-grow: 1;
        }

    }
    }
    .payment {
        border: none;
        background-color: $secondary-200;
        padding: 10px 20px;
        font-weight: 600;
        font-size: 15px;
        border-radius: 10px;
        text-decoration: none;
        cursor: pointer;
        &:active {
            background-color: $secondary-400;
        }

    }
}


</style>
