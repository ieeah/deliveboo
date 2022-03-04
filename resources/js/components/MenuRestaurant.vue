<template>
    <section class="menu-restaurant col-md-6 col-sm-12">
        <h4>Menù</h4>
        <div class="menu-container">
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
            <CardRestaurant />
        </div>
    </section>
</template>

<script>
import CardRestaurant from './CardRestaurant.vue';
export default {
    name: 'MenuRestaurant',
    components: {
        CardRestaurant,
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