<template>
    <section class="cart-restaurant col-md-6 col-sm-12 mb-5">
        <div class="cart-container">
            <h4>Carrello</h4>
            <div class="cart">
                <div class="cart-item">
                    <div class="item-name">
                        <p>Tagliatelle al Ragù</p>
                    </div>
                    <div class="buttons">
                        <button>-</button>
                        <span>0</span>
                        <button>+</button>
                    </div>
                    <div class="item-price">
                        <p>11,20 €</p>
                    </div>
                </div>
            </div>
            <div class="total-price">
                    <h3>Tot</h3>
                    <h3>€€</h3>
            </div>
        </div>
            <button class="payment">Procedi con il Pagamento</button>
    </section>
</template>

<script>
export default {
    name: 'CartRestaurant'
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
        padding: 10px;
        background-color: $primary-400;
        height: 90%;
        h4 {
        color: $clear-100;
    }
    .cart {
        overflow: auto;
        height: 80%;
        padding: 20px;
        background-color: $clear-100;
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
                padding-left: 30px;
            }
        }
    }
    .total-price {
        width: 100%;
        margin-top: 20px;
        display: flex;
        h3 {
            color: $clear-100;
        }
        h3:first-child {
            flex-grow: 1;
        }
        
    }
    }
    .payment {
        margin-top: 10px;
        border: none;
        background-color: $secondary-200;
        padding: 10px 20px;
        font-weight: 600;
        font-size: 15px;
        border-radius: 10px;
        cursor: pointer;
        &:active {
            background-color: $secondary-400;
        }
        
    }
}


</style>