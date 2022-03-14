<template>
  <section class="card-restaurant">
        <div class="card">
            <div class="thumb col-xs-4 col-md-6 px-0">
                <img v-if="plate.thumb == 'plates_thumbs/food_placeholder.jpg'" src="/storage/plates_thumbs/food_placeholder.jpg" alt="">
                <img v-else :src="plate.thumb" alt="">
            </div>
            <div class="info col-xs-8 col-md-6">
                <h5 class="mb-xs-1 mb-md-0">{{name}}</h5>
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
        padding: 5px;
        .card {
            border: 2px solid $primary-400;
            border-radius: 20px;
            min-height: 100px;
            max-height: 150px;
            cursor: pointer;
            transition: all 0.5s ease;
            padding: 10px;
            display: flex;

            .thumb {
                aspect-ratio: 1;
                border-radius: 1rem;
                overflow: hidden;
                img {
                    height: 100%;
                    width: 100%;
                    object-fit: cover;
                    border-radius: 1rem;
                }
            }
            .info {
                padding: 5px 10px;
                max-height: 100%;
                h5 {
                    font-size: 16px;
                }
                p {
                    padding-top: 0px;
                    font-size: 13px;
                    font-weight: 300;
                    max-height: 60%;
                    overflow: hidden;
                }
                span {
                    right: 10px;
                    font-size: 14px;
                    font-weight: 600;
                    max-height: 15%;
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
