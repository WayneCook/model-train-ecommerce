<template>
<transition name="fade" @enter="showContent = true" @after-leave="showContent = false">
  <div v-if="show" class="cart-background" @click="showContent = false">
    <transition name="slide" @leave="show = false">
      <div v-if="showContent" class="small-cart" @click.stop>
        <div class="small-cart-container">
          <span @click="showContent = false" class="fa fa-chevron-right close-arrow"></span>
          <h1 v-if="cartExists">Review your cart</h1>
          <h1 v-else>Your cart is empty!</h1>
          <div class="shipping-header" v-if="cartExists">
            <span class="free-shipping promo-shipping" style="display: inline;">
              <img src="images/checkIcon.svg" alt="">
              Free Shipping
            </span>
          </div> <!-- Shipping header -->
          <div v-if="!cartExists" class="emptyCartImage">
            <img src="images/emptyCartIcon.svg" alt="">
          </div>
          <div class="product-container">
            <product :product="item" v-for='(item, index) in items' v-bind:key="item.id"></product>
          </div>
          <div class="order-total" v-if="cartExists">
            <p>Order Subtotal:</p>
            <p>{{ "$" + this.totalPrice.toFixed(2) }}</p>
          </div>
          <div v-if="cartExists" class="cart-actions row">
            <div class="col-sm-6 col-xs-12 item"><button class="btn-custom-green btn-block" type="button" name="button">CHECKOUT</button></div>
            <div class="col-sm-6 col-xs-12 item"><button class="btn-custom-info btn-block" type="button" name="button">VIEW CART</button></div>
          </div>
          <div v-else class="empty-cart-actions row">
            <div class="col-12">
              <div class="text-center">
                <button class="btn-custom-green" type="button" name="button" @click="showContent = false">CONTINUE SHOPPING</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</transition>
</template>

<script>
import product from './productComponent.vue';

export default {

  components: {
    Product: product
},
  data() {
    return {
      cartExists: false,
      totalQty: 0,
      totalPrice: 0,
      items: [],
      show: false,
      showContent: false
    }
  },
  methods: {

    getCart(){

      axios.get("get-cart")
      .then(response => {
        let cart = response.data.cart;
        this.updateCart(cart);
        this.updateIcon();
      })

    },
    addToCart(id){

      axios.get("add-to-cart/"+id+"/1")
      .then(response => {
        let cart = response.data.cart;
        this.updateCart(cart);
        this.updateIcon();
      })
    },
    updateCart(cart){

      if (!cart) {
        this.cartExists = false;
        this.totalQty = 0;
        this.totalPrice = 0;
        this.items = '';
      } else {
        this.cartExists = true;
        this.totalQty = cart.totalQty;
        this.totalPrice = cart.totalPrice;
        this.items = cart.items;
      }
  },
    updateIcon(){
      this.$mainEventBus.$emit('updateIcon', this.totalQty);
    },
    toggleCart(){
      this.show = !this.show;
    }
  },
  mounted() {
    this.getCart();
    this.$mainEventBus.$on('addToCartEvent', this.addToCart);
    this.$mainEventBus.$on('updateCart', this.getCart);
    this.$mainEventBus.$on('toggle-cart', this.toggleCart);
  }
}
</script>

<style scoped>


.small-cart {
  width: 100%;
  max-width: 422px;
  position: fixed;
  top: 0px;
  right: 0px;
  z-index: 99999;
  height: 100vh;
  background-color: whitesmoke;
  padding: 18px;
}

.small-cart-container {
  width: 100%;
}

.close-arrow {
  font-size: 24px;
  color: hsla(210, 57%, 20%, 0.82);
  margin: 10px;
}

.small-cart-container h1 {
  font-size: 24px;
  font-weight: 600;
  text-align: center;
  margin-top: 10px;
  color: hsla(210, 57%, 20%, 0.78);
}

.shipping-header {
  text-align: center;
  padding: 8px 8px 12px;
  border-bottom: 1px solid #f7f8f9;
}

.product-container {
  max-height: 200px;
  overflow-y: scroll;
}


#total {
  text-align: center;
}

.cart-background {
  width: 100vw;
  height: 100vh;
  position: fixed;
  top: 0px;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 99999;
}

.order-total {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  font-size: 15px;
  margin: 22px 0px;
  padding: 5px;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}



.slide-leave-active,
.slide-enter-active {
  transition: .5s;
}
.slide-enter {
  transform: translate(100%, 0);
}
.slide-leave-to {
  transform: translate(+100%, 0);
}

.emptyCartImage {
  width: 133px;
  margin: 28px auto;
}

.cart-actions div {
  margin-bottom: 10px;
}

.empty-cart-actions {
  /* margin-top: 20px; */
}

</style>
