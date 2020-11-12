<template>
<div class="bg-gradient-to-l from-blue-700 to-blue-800 border-t-0 border-dotted border-cool-gray-500">
    <div class="container mx-auto py-3 px-3 md:px-0">
 
      <nav class="flex justify-between md:justify-start">
        <router-link :to="{ name: 'home'}" exact active-class="bg-gradient-to-b from-blue-600 to-blue-500 text-blue-100 bg-opacity-100 hover:bg-blue-600" class="text-white bg-blue-500 bg-opacity-25 hover:bg-blue-600 me-2 px-6 py-4 w-full md:w-auto text-md text-center justify-center space-y-3  flex flex-col font-medium leading-6 rounded-2xl focus:outline-none">
            <svg :class="{'bgx-cool-gray-600 bg-opacity-25': $route.name !== 'home'}" class="w-12 h-12 mx-auto p-2 rounded-lg  bg-opacity-25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            <div> الأولى </div>
        </router-link>

        <router-link :to="{ name: 'media'}" active-class="bg-gradient-to-b from-blue-600 to-blue-500 text-blue-100 bg-opacity-100 hover:bg-blue-600" class="text-white bg-blue-500 bg-opacity-25 hover:bg-blue-600 me-2 px-6 py-4 w-full md:w-auto text-md text-center justify-center space-y-3  flex flex-col font-medium leading-6 rounded-2xl focus:outline-none">
            <svg :class="{' bg-opacity-25': $route.name !== 'media'}" class="w-12 h-12 mx-auto p-2 rounded-lg  bg-opacity-25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <div> الوسائط </div>
        </router-link>

        <router-link :to="{ name: 'profiles'}" active-class="bg-gradient-to-b from-blue-600 to-blue-500 text-blue-100 bg-opacity-100 hover:bg-blue-600" class="text-white bg-blue-500 bg-opacity-25 hover:bg-blue-600 me-2 px-6 py-4 w-full md:w-auto text-md text-center justify-center space-y-3  flex flex-col font-medium leading-6 rounded-2xl focus:outline-none">
            <svg :class="{' bg-opacity-25': $route.name !== 'profiles'}" class="w-12 h-12 mx-auto p-2 rounded-lg  bg-opacity-25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <div> الملفات الشخصية </div>
        </router-link>

        <router-link :to="{ name: 'settings'}" active-class="bg-gradient-to-b from-blue-600 to-blue-500 text-blue-100 bg-opacity-100 hover:bg-blue-600" class="text-white bg-blue-500 bg-opacity-25 hover:bg-blue-600 me-2 px-6 py-4 w-full md:w-auto text-md text-center justify-center space-y-3  flex flex-col font-medium leading-6 rounded-2xl focus:outline-none">
            <svg :class="{'bxg-cool-gray-600 bg-opacity-25': $route.name !== 'settings'}" class="w-12 h-12 mx-auto p-2 rounded-lg  bg-opacity-25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            <div> الإعدادات </div>
        </router-link>
      </nav>
  </div>
   
</div>
</template>

<script>
export default {

}
</script>
 