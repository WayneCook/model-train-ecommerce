<template>

<div class="col-lg col-md-6 card-custom" style="width: 18rem;">
  <div class="card card-inner">
    <div class="image">
      <span @click='viewDetails()' class="icon-1 flaticons flaticon-spy"></span>
      <span class="icon-2 flaticons flaticon-heart"></span>
      <span class="icon-3 flaticons flaticon-spy"></span>
      <img class="img img-responsive full-width productImage" alt="Card image cap" :src="productImage">
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ product.name }}</h5>
      <p class="item-price">{{ "$" + product.price.toFixed(2) }}</p>
      <form v-on:submit.prevent class="" :action="'add-to-cart/' + product.id +'/1'" method="get">
        <button @click='addToCart()' class="hvr-outline-in-blue btn-custom-green-blue">ADD TO CART</button>
      </form>
    </div>
  </div>
</div>

</template>

<script>
  export default {
    props: ['product'],
    data() {
      return {
        totalItems: 0
      }
    },
    methods: {
      viewDetails(){
        console.log(this.product);
      },
      addToCart(){


        if (this.product.stock >= 1) {

          this.$mainEventBus.$emit('addToCartEvent', this.product.id);
        }

      }
    },
    computed: {
      productImage: function () {

        switch(this.product.main_image) {
          case null:
            return 'images/product/default_product.jpg';
            break;
          default:
            return 'images/product/' + this.product.main_image;
        }
      }
    }
  }
</script>

<style scoped>

.card-title {
  height: 70px;
  overflow: auto;
  margin-bottom: 0px;
}

p.item-price {
  font-size: 16px;
  margin-bottom: 10px;
}

.card-inner {
  margin: 10px;
  border: none;
  background-color: transparent;
  border-radius: 0px;
}

.card-img-top {
  box-shadow: -1px 1px 2px rgba(0,0,0,.125);
  transition: box-shadow 150ms ease,-webkit-transform 150ms ease;
  transition: transform 150ms ease,box-shadow 150ms ease;
  transition: transform 150ms ease,box-shadow 150ms ease,-webkit-transform 150ms ease;
}

.card-custom {
  padding-right: 10px;
  padding-left: 10px;
  margin: auto;
}

.image {
  position: relative;
  overflow: hidden;
  padding-bottom:100%;
  background-color: white;
  box-shadow: -1px 1px 3px 0px hsla(0, 0%, 50%, 0.25);
  transition: all .25s cubic-bezier(0.2, 0.2, 0, 1.01);
}

.image .icon-1 {
  position: absolute;
  z-index: 9999;
  top: -17px;
  right: -100px;
  margin: 13px 14px;
  transform: scale(0);
  transition: all .35s cubic-bezier(0, 0, 0, 1.5) .05s;

}

.image .icon-2 {
  position: absolute;
  z-index: 9999;
  top: 18px;
  right: -100px;
  margin: 13px 14px;
  transform: scale(0);
  transition: all .35s cubic-bezier(0, 0, 0, 1.5) .12s;
}

.image .icon-3 {
  position: absolute;
  z-index: 9999;
  top: 48px;
  right: -100px;
  margin: 13px 14px;
  transform: scale(0);
  transition: all .35s cubic-bezier(0, 0, 0, 1.5) .19s;
}

.image:hover .icon-1 {
  right: 0px;
  transform: scale(1.10);
}

.image:hover .icon-2 {
  right: 1px;
  transform: scale(1.10);
}

.image:hover .icon-3 {
  right: 0px;
  transform: scale(1.10);
}

.image:hover span:before {
  color: hsla(210, 57%, 20%, 0.8);
  right: 0px;
  opacity: 1;
}

.image span:before {
  color: hsla(210, 24%, 39%, 0.98);
  font-size: 24px;
  opacity: 0;
}


.image .icon-2:before {
  color: hsla(210, 24%, 39%, 0.98);
  font-size: 21px;
  opacity: 0;
}

.image span:hover::before {
  color: hsla(174, 100%, 30%, 1);
}

.productImage {

}

.image img {
  position: absolute;
  max-width: 100%;
  max-height: 100%;
  top: 50%;
  left: 50%;
  transform: translateX(-50%) translateY(-50%);
}

.image:hover {
  transform: scale(1.05);
  box-shadow: -1px 3px 11px -4px hsla(0, 0%, 50%, 0.75);
}

.card-body {
    flex: 1 1 auto;
    padding: 1.25rem 0px;
}

</style>
