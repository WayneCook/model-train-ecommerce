<template>

<div class="container">
    <div class="row">

        <div class="col-3">

            <div class="control-section">
                <h4>Scale:</h4>
                <div class="form-check" v-bind:key='index' v-for='(filter, index) in getUnique("scale")'>
                    <input @click="checkboxTrigger" type="checkbox" class="form-check-input" :value='filter' :id='filter' v-model='filters.scale'>
                    <label class="form-check-label" :for="filter">{{ filter }} ({{ getCount('scale', filter) }})</label>
                </div>

            </div>

            <div class="control-section">
                <h4>Brand:</h4>
                <div class="form-check" v-bind:key='index' v-for='(filter, index) in getUnique("brand")'>
                    <input @click="checkboxTrigger" type="checkbox" class="form-check-input" :value='filter' :id='filter' v-model='filters.brand'>
                    <label class="form-check-label" :for="filter">{{ filter }} ({{ getCount('brand', filter) }})</label>
                </div>

            </div>

             <div class="control-section">
                <h4>Price range</h4>
                <div class="form-check" v-show='getPriceBetween(0,9999999) != 0'>
                    <input @click="checkboxTrigger" type="radio" class="form-check-input" :value='anyPriceRange' id='any' v-model='filters.price'>
                    <label class="form-check-label" for="one">Any ({{ getPriceBetween(0,99999) }})</label>
                </div>

                <div v-bind:key='key' v-for='(range, key) in priceRanges' class="form-check" v-show='getPriceBetween(range.start,range.end) != 0'>
                    <input @click="checkboxTrigger" type="radio" class="form-check-input" :value='priceRanges[key]' id='one' v-model='filters.price'>
                    <label class="form-check-label" for="one">${{ range.start }} to ${{ range.end }} ({{ getPriceBetween(range.start,range.end) }})</label>
                </div>

            </div>

        </div>

        <div class="col-9">
            <div class="row align-items-start">
                <product-card class="col-lg-4 col-md-6 col-sm-6" v-for='(product) in collection.data' :product='product' v-bind:key="product.id"></product-card>
            </div>

        </div>
    </div>
</div>

</template>

<script>
import { log } from 'util';
import productCard from '../productSlider/productCard.vue';

  export default {
    props: ['category', 'subcategory'],
    components: {
      productCard
    },
    data() {
      return {

          url: '/product/api',
          allData: [],
          data: '',
          filters: {
              scale: [],
              brand: [],
              price: {
                  start: 0,
                  end: 99999
              }
          },
          query: {
              category: this.category,
              subcategory: this.subcategory,
              limit: 12,
              order_column: 'name',
              order_direction: 'asc',
          },
          collection: {
              data: []
          },
          anyPriceRange: {
            start: 0,
            end: 99999,
          },
            priceRanges: {

                first: {
                    start: 0,
                    end: 9.99
                },
                second: {
                    start: 10.00,
                    end: 19.99
                },
                third: {
                    start: 20.00,
                    end: 49.99
                },
                fourth: {
                    start: 50.00,
                    end: 99.99
                },
                fifth: {
                    start: 100,
                    end: 199
                },
                 sixth: {
                    start: 200.00,
                    end: 499.00
                },
                seventh: {
                    start: 500.00,
                    end: 10000.00
                },
          },
      }
    },
    methods: {
        fetch(){
        const filters = this.getFilters();
        const params = { filters: filters, ...this.query }

        axios.get(this.url, { params: params })
          .then((res) => {

            this.allData = res.data.allData;

            // this.data = res.data.collection.data;
            Vue.set(this.$data, 'collection', res.data.collection);

            // this.table.pagination.total = res.data.collection.last_page;
            // this.query.page = res.data.collection.current_page;
          })
          .catch((error) => {
            if (error.response) {
              this.errors = error.response.data.errors;
            }
          })
          .finally(() => {
            //

        })

        },
        getFilters(){
            const filters = this.filters;
            return filters;
        },
        toCurrency(number){
            return '$'+number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

        },
        checkboxTrigger(){

            // this.fetch();
        },
        getUnique(property){

           return this.allData.map(product => product[property]).filter((value, index, self) => self.indexOf(value) === index).sort();
        },
        getCount(property, value){

           return this.allData.filter(product => product[property] === value).length;
        },
        getPriceBetween(start, end){
           return this.allData.filter(product => product.price >= start && product.price <= end).length;

        }
    },
      watch: {
        filters: {
            handler(val){
              this.fetch();
            },
            deep: true
        }
      },
    created() {
      this.fetch();

    }
  };

</script>

<style scoped>
    .cards-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;

    }

</style>
