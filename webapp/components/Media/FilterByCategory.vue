<template>
  <div>
     
        <div class="relative inline-block me-2" v-click-outside="hideMe">

            <div>
              <button @click="open = !open" class="max-w-xs bg-cool-gray-200 p-2 px-3 cursor-pointer hover:opacity-75 flex items-center text-sm rounded focus:outline-none" id="user-menu" aria-label="User menu" aria-haspopup="true">
                <svg class=" h-4 me-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                <span class="hidden sm:inline-block me-2 text-cool-gray-500">القسم : </span>
                <span class="truncate" v-if="selectedCategory"> {{selectedCategory.category_name}} </span>
                <span v-else> الكل </span>
                 
              </button>
            </div>

            <div v-show="open" @click="open = false">
              <div class="z-10 py-1 rounded-b-md bg-white absolute right-0 w-48 shadow" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                 
                <button @click="selectCategory(null)"
                    :class="{'bg-blue-100':selectedCategory==null}"
                      class="block w-full text-start px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                    الكل
                </button>
                 
                <button v-for="item in items" :key="item.id" @click="selectCategory(item)"
                      :class="{'bg-blue-100':selectedCategory==item}"
                      class="block w-full text-start px-4 py-3 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">

                    {{ item.category_name }}
                </button>
             
              </div>
            </div>
          </div>

  </div>
</template>

<script>
    import ClickOutside from 'vue-click-outside'
    export default {
        directives: {ClickOutside},
        data(){
            return {
                loading: false,
                items: [],
                selectedCategory: null,
                open: false,
            }
        },
        mounted(){
            this.getData();  
        },
        methods: {
            getData(){
                var that = this;
                that.loading = true;
                axios.get('categories')
                .then(function (response) {
                    that.loading = false;
                    that.items = response.data.data;
                });
            },
            selectCategory(item){
                this.selectedCategory = item;
                this.$emit('selected-category', item);
            },
            hideMe(){
                this.open = false
            },
        }
    }
</script>
 