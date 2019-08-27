<template>
  <div class="cards-container row row-centered">

    <category-card :key="index" :category="category" v-for="(category, index) in categories"></category-card>

  </div><!-- Card container -->

</template>

<script>

  import categoryCard from './categoryCard.vue';

  export default {
    props: ['categories'],
    data() {
      return {

      }
    },
    components: {
      categoryCard
    },
    methods: {
      //
    },
    mounted() {
      //
    }
  };

</script>

<style scoped>

.cards-container {
  max-width: 1200px;
  margin: auto;
  margin-bottom: 100px;
}


</style>
