<template>

  <div class="small-cart">
    <div class="small-cart-container">
      <h1>Shopping Cart</h1>




    </div>
  </div>


</template>

<script>
  export default {
    data() {
      return {
        cartExists: false,
        totalQty: 0,
        totalPrice: 0,
        items: []
      }
    },
    methods: {

      getCart(){
        axios.get("get-cart")
        .then(response => {
          let cart = response.data.cart;
          this.updateCart(cart);
        })
      },
      addToCart(id){

        axios.get("add-to-cart/"+id+"/1")
        .then(response => {
          let cart = response.data.cart;
          this.updateCart(cart);
        })
      },
      updateCart(cart){
        var cartCounters = document.querySelectorAll('[data-count]');

        console.log(cart);

        if (cart) {
          this.cartExists = true;
          this.totalQty = cart.totalQty;
          this.totalPrice = cart.totalPrice;
          this.items = cart.items;

            cartCounters.forEach(function(counter){
              counter.dataset.count = cart.totalQty;
              counter.style.display = '';
            })
        } else {
          cartCounters.forEach(function(counter){
            counter.style.display = 'none';
          })
        }
      }
    },
    mounted() {
      this.getCart();
      this.$mainEventBus.$on('addToCartEvent', this.addToCart);
    }
  }
</script>

<style scoped>

  .small-cart-container {
    width: 300px;
    height: 400px;
    background-color: pink;
  }

  .small-cart-container h1 {
    font-size: 22px;
  }

</style>
