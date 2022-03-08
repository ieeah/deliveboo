<template>
    <section class="menu-restaurant col-md-6 col-sm-12">
        <h4>Menù</h4>
        <div class="menu-container">
            <CardRestaurant v-for="(item, index) in plates" :key="`plate-${index}`"
            :name="item.name"
            :ingredients="item.ingredients"
            :price="item.price"
            :thumb="item.thumb"
            :plate="item"
            />
        </div>
    </section>
</template>

<script>
import CardRestaurant from './CardRestaurant.vue';


export default {
    name: 'MenuRestaurant',
    components: {
        CardRestaurant,
    },
    props: {
        plates: Array,
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

.menu-restaurant {
    padding: 10px;
    h4 {
        color: $primary-400;
    }
    .menu-container {
        display: flex;
        flex-wrap: wrap;
    }
}

</style>