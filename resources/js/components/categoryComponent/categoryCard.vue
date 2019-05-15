<template>

    <div class="col-lg-4 col-sm-6 col-centered card-wrapper">
      <div class="sub-category-card">
        <div class="image-wrapper saturate" :style="{
          backgroundImage : 'url(\'' + this.image + '\')',
          backgroundSize: 'cover',
          backgroundPosition: 'center center'
        }">

        </div>

        <div class="category-title">
          <center>
            <h4>
              {{ category.name }}
            </h4>
          </center>
        </div>

        <div class="button-container container">
          <div class="row">
            <div class="col text-center">
              <a @click="redirect()" href="###" class="hvr-outline-in-blue btn-custom-green-blue">SHOP NOW</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>

  export default {
    props: ['category'],
    data() {
      return {
        //
      }
    },
    methods: {
      redirect: function(){
        alert('hello');
      }
    },
    computed: {
      image: function () {

        switch(this.category.image) {
          case null:
            return 'images/product/default_product.jpg';
            break;
          default:
            return 'images/sub_category/' + this.category.image;
        }
      },
    },
    mounted() {
      // console.log(this.category);
    }
  };

</script>

<style scoped>

.image-wrapper {
  position: relative;
  overflow: hidden;
  /* box-shadow: -1px 1px 2px rgba(0,0,0,.125); */
}


.card-wrapper {
  padding: 32px;
  padding-top: 0px;
}

.btn-custom-green {
  padding-left: 40px;
  padding-right: 40px;
}

.image-wrapper:before {
  content: '';
  display: block;
  padding-top: 71.42857143%;
  overflow: hidden;
  background-color: rgba(18, 39, 58, 0.26);
}

.image-wrapper img {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  max-height: 100%;
  width: auto;
}

.category-title h4 {
  padding: 6px;
  padding-top: 16px;
}

.sub-category-card {
  /* background-color: white;
  box-shadow: -1px 1px 2px rgba(0,0,0,.125); */
  margin-bottom: 20px;
  padding-bottom: 30px;
}

</style>
