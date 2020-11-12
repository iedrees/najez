<template>
<div class="bg-gradient-to-r from-blue-900 to-blue-800 sm:px-0 py-1">
  <div class="flex container mx-auto">
   
    <div class="flex-1 px-4 md:px-0 flex justify-between text-white">
    
      <AppLogo />  
        
      <div class=" flex items-center text-gray-400 hover:opactiy-50"> 
        <div class="mr-3 relative" v-click-outside="hideMe">

            <div>
              <button @click="open = !open" class="max-w-xs cursor-pointer hover:opacity-75 flex items-center rounded-full focus:outline-none" id="user-menu" aria-label="User menu" aria-haspopup="true">
                <span class="mx-2 truncate hidden md:inline-block">{{$store.state.user.name}} </span>
                <img class="h-8 w-8 rounded-full" :src="$store.state.user.image" alt="">
              </button>
            </div>

            <div v-show="open" @click="open = false">
              <div class="z-10 py-1 rounded-b-md bg-white absolute left-0 w-48 shadow mt-4" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                <div class="px-4 py-2">
                 <p class="text-sm leading-5 font-bold">
                   {{$store.state.user.name}} 
                 </p>
                 <p class="text-sm leading-5 font-medium text-gray-500 truncate">
                   {{$store.state.user.email}} 
                 </p>
               </div>
               <div class="border-t border-gray-100"></div>
                <router-link :to="{ name: 'myProfile'}" 
                    class="flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                >
                  <svg class="w-4 h-4 me-2 text-cool-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    الملف الشخصي
                </router-link>
            
               <div class="border-t border-gray-100"></div>
                <a
                    href="/logout"
                    class="flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                >
                <svg class="h-4 w-4 me-2  text-cool-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                    خروج
                </a>
              </div>
            </div>
          </div>
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
                open: false,
            }
        },
        methods: {
            hideMe(){
                this.open = false
            },
        },
    }
</script>
