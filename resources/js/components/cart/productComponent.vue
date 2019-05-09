<template>

<div class="product">

  <div class="image-wrapper">
    <img :src="this.getThumbnail" alt="">
  </div>

  <div class="product-title">{{ trimString }}</div>

  <div>
    <i class="fa fa-times-circle deleteIcon" @click="deleteItem()"></i>
  </div>

  <div>

  <input class="form-control" type="number" id="itemCounter" name="counter"
       min="1" max="100" :value="product.qty" @change="updateCart($event)">
  <div class="itemTotal">{{ "$" + product.price.toFixed(2) }}</div>
 </div>
 </div>

</template>

<script>
  export default {
    props: ['product'],
    data() {
      return {
        image: this.product.item.main_image,
      }
    },
    methods: {

      updateCart(e){

        let count = e.target.value;
        let id = this.product.item.id;

        axios.get("update-cart/"+id+"/"+count)
        .then(response => {
          let cart = response.data.cart;
          this.$mainEventBus.$emit('updateCart');
        })
      },
      deleteItem(id){

        axios.get("delete-item/"+this.product.item.id)
        .then(response => {
          let cart = response.data.cart;
          this.$mainEventBus.$emit('updateCart');
        })

      }
    },
    computed: {

      getThumbnail: function() {

        switch(this.image) {
          case null:
            return 'images/thumbnails/default_product.jpg';
            break;
          default:
            return 'images/thumbnails/' + this.image;
          }
      },
      trimString: function(){
        var length = 28;

        var text = this.product.item.name;

         return text.length > length ?
          text.substring(0, length - 3) + "..." :
          text
      }
    }
  }
</script>

<style scoped>

.product {
  /* border-bottom: 1px solid hsla(0, 0%, 0%, 0.16); */
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  box-shadow: -1px 1px 3px -1px hsla(0, 0%, 50%, 0.51);
  padding: 5px;
  background-color: white;
  padding: 10px;
  margin-bottom: 10px;
}

.product img {
    display: block;
    width: 100%;
}

.product-title {
  color: black;
  flex-grow: 2;
  line-height: 16px;
  color: hsla(211, 11%, 21%, 1);
  margin-left: 5px;
}

.itemTotal {
  color: hsla(211, 11%, 21%, 1);
}

.image-wrapper {
  min-width: 100px;
  height: 72px;
}

#itemCounter {
  color: black;
  width: 54px;
  text-align: left;
  font-size: 12px;
  height: 28px;
  margin-bottom: 4px;
}



.deleteIcon {
  color: #F44336;
  width: 32px;
  font-size: 15px;
  display: inline;
  margin-right: 12px;
}


</style>
