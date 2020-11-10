<template>
  <div>
    <div class="relative inline-block me-2" v-click-outside="hideMe">
        <div>
            <button @click="open = !open" class="max-w-xs bg-cool-gray-200 p-2 px-3 cursor-pointer hover:opacity-75 flex items-center text-sm rounded focus:outline-none" id="user-menu" aria-label="User menu" aria-haspopup="true">
                <svg class="h-4 me-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                <span class="hidden sm:inline-block me-2 text-cool-gray-500"> الشبكة : </span>
                <span class="truncate hidden md:inline-block" v-if="selectedNetworks.length"> {{selectedNetworks.length}} </span>
                <span v-else> الكل </span>
            </button>
        </div>

        <div v-show="open">
            <div class="z-10 py-1 rounded-b-md  bg-white absolute right-0 w-48 shadow" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
            <label v-for="(item, index) in networks" :key="index"  
                    class="flex items-center w-full text-start cursor-pointer px-4 py-3 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                <input @change="$emit('selected-networks', selectedNetworks)" type="checkbox" :id="index" :value="index" v-model="selectedNetworks">
                <span class="ms-2 -mb-1 inline-block">{{ item }}</span>
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
                selectedNetworks: [],
                networks: {
                    'instagram': 'انستجرام',
                    'snapchat': 'سنابتشات',
                },
                open: false,
            }
        },
        methods: {
            hideMe(){
                this.open = false
            },
        }
    }
</script>
 