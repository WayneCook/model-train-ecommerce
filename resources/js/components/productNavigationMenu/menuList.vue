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

<style scoped>

ul.list {
  list-style-type: none;
  cursor: default;
  margin: 0px;
}

.list li * {
  pointer-events: none;
}

.list li i {
  margin-left: 2px;
  transition: all .15s ease;
}

.selected {
  box-shadow: inset 0px -5px 0px 0px #EC4036;
}

/* .fa-angle-down:before {
  color: hsl(210, 39%, 92%);
}

.iconActive:before {
  color: #009485;
} */

.underline {
  width: 100%;
  display: block;
  position: absolute;
  height: 3px;
  background-color: rgba(22, 51, 80, 0.45);
  bottom: 0px;
  left: 0px;
}

</style>
