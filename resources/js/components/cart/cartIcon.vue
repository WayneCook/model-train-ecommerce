<template>

  <span @click="toggleCart()" class="flaticon-online-shopping-cart main-nav"><span :data-count="totalQty" v-show="show" class="cartIcon"></span></span>

</template>


<script>

export default {

  data() {
    return {
      totalQty: 0,
      show: false

    }
  },
  methods: {

    updateIcon(count){

      if (count > 0) {

        this.totalQty = count;
        this.show = true;

      } else {
        this.show = false;
      }
    },
    toggleCart(){

      this.$mainEventBus.$emit('toggle-cart');
    }
  },
  computed: {
    //

  },
  mounted() {

    this.$mainEventBus.$on('updateIcon', this.updateIcon);
  }
}
</script>

<style scoped>


</style>
