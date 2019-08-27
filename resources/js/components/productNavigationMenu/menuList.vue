<template>
    <li :style='{color: activeColor}' @mouseover='passData(category.name, category.sub_categories)'>{{ category.name }} <i :class="arrowClass" :style='{color: activeColor}'></i></li>
</template>

<script>

  export default {
    props: ['category', 'fontcolor'],
    data() {
      return {
        activeColor: this.fontcolor,
        arrowClass: 'fas fa-angle-down'
      }
    },
    methods: {
      passData: function(category, subCategory){
        subCategory.categoryName = category;
        this.$mainEventBus.$emit('showData', subCategory);
        this.activeColor = '#009485';
        this.arrowClass = 'fas fa-angle-down iconActive'
      },
      resetMenuStyles: function(){
        this.arrowClass = 'fas fa-angle-down';
        this.activeColor = this.fontcolor;
      }
    },
    mounted() {
      this.$mainEventBus.$on('showData', this.resetMenuStyles);
      this.$mainEventBus.$on('resetMenuStyles', this.resetMenuStyles);
    }
  };

</script>
