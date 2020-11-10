<template>
  <div>
    <div class="relative inline-block me-2" v-click-outside="hideMe">
        <div>
            <button @click="open = !open" class="max-w-xs bg-cool-gray-200 p-2 px-3 cursor-pointer hover:opacity-75 flex items-center text-sm rounded focus:outline-none" id="user-menu" aria-label="User menu" aria-haspopup="true">
            <svg class="h-4 me-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            <span class="hidden sm:inline-block me-2 text-cool-gray-500"> الوسوم : </span>
            <span class="truncate hidden md:inline-block" v-if="selectedTags.length"> {{selectedTags.length}} </span>
            <span v-else> الكل </span>
                
            </button>
        </div>

        <div v-show="open">
            <div class="z-10 py-1 rounded-b-md  bg-white absolute right-0 w-48 shadow" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
            <label v-for="item in items" :key="item.id"  
                    class="flex items-center w-full text-start cursor-pointer px-4 py-3 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                <input @change="$emit('selected-tags', selectedTags)" type="checkbox" :id="item.id" :value="item.id" v-model="selectedTags">
                <span class="ms-2 -mb-1 inline-block">{{ item.tag_name }}</span>
                
            </label>
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
                selectedTags: [],
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
                axios.get('tags')
                .then(function (response) {
                    that.loading = false;
                    that.items = response.data.data;
                });
            },
            selectTag(){
                this.$emit('selectedTags', selectedTags);
            },
            hideMe(){
                this.open = false
            },
        }
    }
</script>
 