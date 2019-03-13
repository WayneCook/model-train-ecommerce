<template>
  <section class="featured-product-section">
    <div class="featured-heading">
      <h1>{{ title }}</h1>
    </div>

    <div class="fpSection row">

      <product-card v-for='(product, index) in products' :product='product'></product-card>

    </div>

  </section>
</template>

<script>

  import productCard from './productCard.vue';

  export default {
    props: ['products', 'heading'],
    data() {
      return {
        title: this.heading
      }
    },
    components: {
      productCard
    }

  }
</script>

<style scoped>


  * {
    color: hsl(211, 11%, 28%);
  }

  h1 {
    color: hsla(210, 57%, 20%, 0.82);
    font-size: 28px;
    font-weight: 700;
  }

  .fpSection {
    max-width: 1200px;
    margin: auto;
  }

  .featured-heading {
    text-align: center;
    padding: 20px;
    color: hsla(210, 45%, 30%, 1);
  }

  section.featured-product-section {
      padding: 100px 0px;
  }
</style>
