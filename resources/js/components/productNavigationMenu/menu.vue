<template>
  <nav class="navbar-custom">
    <div>
      <ul class="list">
        <menu-list :fontcolor='fontcolor' :category='category' v-for='(category, index) in categories'></menu-list>
      </ul>
    </div>
    <slot></slot>
    <menu-pop-out :popOutVisibility="this.popOutVisibility"></menu-pop-out>
  </nav>
</template>

<script>

import list from './menuList.vue';

  export default {
    props: ['categories', 'fontcolor'],
      components: {
        MenuList: list
    },
    data() {
      return {
        popOutVisibility: false,
        activeColor: this.fontcolor
      }
    },
    methods: {
      passData: function(category, subCategory){
        subCategory.categoryName = category;
        this.$mainEventBus.$emit('showData', subCategory);
        this.activeColor = '#2ab73a';
      }
    },
    mounted() {
      this.$mainEventBus.$on('hidePopOut', () => {this.popOutVisibility = false});
      this.$mainEventBus.$on('showPopOut', () => {this.popOutVisibility = true});
    }
  };

</script>

<style scoped>

</style>
