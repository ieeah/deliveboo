<template>
    <section class="info-restaurant container">
        <div class="row">
            <div class="info col-md-6 col-sm-12">
                <h3>Nome Ristorante</h3>
                <p>Indirizzo Ristorante</p>
                <p>Tipologia Ristorante</p>
                <p>Email</p>
                <p>P.Iva</p>
            </div>
        <div class="thumb col-md-6 col-sm-12">
            <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>
        </div>
    </section>

</template>

<script>

export default {
    name:'InfoRestaurant',
    

}
</script>

<style lang="scss" scoped>
.info-restaurant {
    .info {
        height: 200px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: space-between;
    }
    .thumb {
        height:300px;
        img {
            height: 100%;
            width: 100%;
            object-fit: container;
        }
    }
}


@media screen and (max-width: 768px) {
    section {
       .info {
           align-items: center !important;
       }
       .thumb {
           margin-top: 30px;
       }
    }
}

</style>