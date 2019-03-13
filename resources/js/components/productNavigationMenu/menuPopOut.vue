<template>

  <div class="dropDownSection" v-show='this.popOutVisibility' @mouseleave='resetMenuStyles()'>
    <ul>
      <li v-for='category in subCategories'><a :href="categoryName +'/'+category.slug">{{ category.name }}</a></li>
    </ul>
  </div>

</template>

<script>

    export default {
      props: ['popOutVisibility'],
      data() {
        return {
          categoryName: '',
          subCategories: []
        }
      },
      methods: {
        resetMenuStyles(){
          this.$mainEventBus.$emit('resetMenuStyles');
          this.hidePopOut();
        },
        showPopOut(){
          this.$mainEventBus.$emit('showPopOut');
        },
        hidePopOut(){
          this.$mainEventBus.$emit('hidePopOut');
        }
      },
      mounted() {
          this.$mainEventBus.$on('showData', subCategory => {
          this.showPopOut();
          if (this.categoryName === subCategory.categoryName) {
            this.showPopOut();
            this.categoryName = '';
          } else {
            this.categoryName = subCategory.categoryName;
            this.subCategories = subCategory;
          }
        });
      }
    }
</script>

<style scoped>



.dropDownSection ul {
  list-style-type: none;
}

.dropDownSection li {
  display: inline-block;
  margin-right: 20px;

}

.dropDownSection li a {
  color: black;
}

</style>
