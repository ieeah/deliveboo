<template>
  <section class="card-restaurant">
        <div class="card">
            <div class="thumb">
                <img src="https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8cGl6emF8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="">
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
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

    .card-restaurant {
        min-width: 50%;
        width: 50%;
        padding: 5px;
        .card {
            border: 2px solid $primary-400;
            border-radius: 20px;
            height: 120px;
            cursor: pointer;
            transition: all 0.5s ease;
            padding: 3px;
            display: flex;

            .thumb {
                height: 100%;
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
                    position: absolute;
                    right: 10px;
                    font-size: 14px;
                    font-weight: 600;
                    bottom: 10px;
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