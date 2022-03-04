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
                        <strong class="mb-2">Nome ristorante ha appena ricevuto il tuo ordine</strong><br>
                        <strong>mettiti comodo, la tua cena è in arrivo!</strong>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="data d-flex">
                <p>Totale ordine:  23.00€</p>
                <div class="date-h d-flex ml-5">
                    <p>04/03/2022</p>
                    <p class="ml-4">19:33</p>
                </div>
            </div>
            </div>
            <a href="#">Torna alla lista dei ristoranti</a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Confirm',
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