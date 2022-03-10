<template>
  <section class="card-restaurant">
        <div class="card">
            <div class="thumb">
                <img v-if="plate.thumb == 'plates_thumbs/food_placeholder.jpg'" src="/storage/plates_thumbs/food_placeholder.jpg" alt="">
                <img v-else :src="plate.thumb" alt="">
            </div>
            <div class="info">
                <h5>{{name}}</h5>
                <p>{{ingredients}}</p>
                <span>{{price}}</span>
            </div>
        </div>
  </section>
</template>

<script>
export default {
    name: 'CardRestaurant',
    props: {
        name: String,
        ingredients: String,
        price: String,
        thumb: String,
        plate: Object,
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

    .card-restaurant {
        min-width: 50%;
        width: 50%;
        padding: 5px;
        min-height:150px;
        .card {
            border: 2px solid $primary-400;
            border-radius: 20px;
            height: 100%;
            cursor: pointer;
            transition: all 0.5s ease;
            padding: 10px;
            display: flex;

            .thumb {
                height: 100px;
                width: 45%;
                border-radius: 15px;
                overflow: hidden;
                img {
                    height: 100%;
                    width: 100%;
                    object-fit: cover;
                }
            }
            .info {
                padding: 5px 10px;
                width: 55%;
                position: relative;
                h5 {
                    font-size: 16px;
                }
                p {
                    padding-top: 0px;
                    font-size: 13px;
                    font-weight: 300;
                }
                span {
                    right: 10px;
                    font-size: 14px;
                    font-weight: 600;
                }
            }
            &:hover {
                transform: scale(105%);
                box-shadow: 0px 0px 30px $primary-400;
            }
        }
    }

@media screen and (max-width: 992px) {
    .card-restaurant {
        width: 100%;
    }
}



</style>
