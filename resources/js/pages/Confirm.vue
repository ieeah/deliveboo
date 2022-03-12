<template>
    <div class="page-confirm">
        <div class="col-xs-12 col-md-9 mx-auto px-xs-3 px-md-0 d-flex flex-column align-items-center">
            <div class="confirm d-flex justify-content-center">
                <i class="fa-solid fa-circle-check text-success"></i>
            </div>
            <div class="row">
                <div class="col">
                    <h3 class="mb-3">Ordine effettuato!</h3>
                    <div class="text d-flex flex-column align-items-center">
                        <strong class="mb-2">Abbiamo appena confermato il tuo ordine!</strong><br>
                        <strong>mettiti comodo, la tua cena è in arrivo!</strong>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="data d-flex">
                <p>Totale ordine: {{tot}}€</p>
                <div class="date-h d-flex ml-5">
                    <p>{{today}}</p>
                    <p class="ml-4">{{time}}</p>
                </div>
            </div>
            </div>
            <a href="/">Torna alla lista dei ristoranti</a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Confirm',
    data() {
        return {
            tot: JSON.parse(localStorage.order_data).tot,
            today: new Date().toLocaleDateString(),
            time: new Date().toLocaleTimeString('it-IT', { hour: "numeric", minute: "numeric"}),
        }
    },
    created() {
        setTimeout(this.clearLocalStorage(), 5000);
    },
    methods: {
        clearLocalStorage() {
            window.localStorage.setItem('order_data', '[]');
            window.localStorage.setItem('total_cart', '0');
        },
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/front.scss';

    .confirm{
        margin-top: 50px;
        margin-bottom: 100px;
        i{
            font-size: 250px;
            color: rgb(1, 155, 1);
        }
    }
    h3{
        color: rgb(1, 155, 1);
        text-align: center;
    }
    .text{
        margin-bottom: 60px;
    }

    .data{
        margin-bottom: 80px;
    }
    a{
        color: $primary-400;
        margin-bottom: 60px;
    }
</style>