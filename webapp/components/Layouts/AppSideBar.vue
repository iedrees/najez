<template>
  <div>
    <nav class="my-6">
  
        <div class="p-2">
            <router-link :to="{ name: 'home'}" exact
                active-class=" bg-gradient-to-l from-blue-700 to-blue-800 hover:bg-blue-900 rounded-sm"
                class="group my-1 flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-300 rounded bg-cool-gray-800 hover:bg-cool-gray-700 focus:outline-none transition ease-in-out duration-150" aria-current="page">
                    <svg class="flex-shrink-0 me-3 h-6 w-6  opacity-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="truncate">
                        لوحة التحكم
                    </span>
            </router-link>
        </div>

        <hr class="border-b border-cool-gray-800 my-3 border-opacity-50">
 
        <div class="p-2">
            <router-link :to="{ name: 'bookings'}" 
                active-class=" bg-gradient-to-l from-blue-700 to-blue-800 hover:bg-blue-900 rounded-sm"
                class="group my-1 flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-300 rounded bg-cool-gray-800 hover:bg-cool-gray-700 focus:outline-none transition ease-in-out duration-150" aria-current="page">
    
                    <svg class="flex-shrink-0 me-3 w-6 h-6 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="truncate"> الحجوزات </span>
            </router-link>

            <router-link :to="{ name: 'clients'}" 
                active-class=" bg-gradient-to-l from-blue-700 to-blue-800 hover:bg-blue-900 rounded-sm"
                class="group my-1 flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-300 rounded bg-cool-gray-800 hover:bg-cool-gray-700 focus:outline-none transition ease-in-out duration-150" aria-current="page">
    
                    <svg class="flex-shrink-0 me-3 w-6 h-6 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="truncate"> العملاء </span>
            </router-link>
        </div>

        <hr class="border-b border-cool-gray-800 my-3 border-opacity-50">

        <div class="p-2">
            <router-link :to="{ name: 'resources'}"  
                active-class=" bg-gradient-to-l from-blue-700 to-blue-800 hover:bg-blue-900 rounded-sm"
                class="group my-1 flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-300 rounded bg-cool-gray-800 hover:bg-cool-gray-700 focus:outline-none transition ease-in-out duration-150" aria-current="page">
                    <svg class="flex-shrink-0 me-3 w-6 h-6 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>

                    <span class="truncate"> الوحدات </span>
            </router-link>

            <router-link :to="{ name: 'services'}"
                active-class=" bg-gradient-to-l from-blue-700 to-blue-800 hover:bg-blue-900 rounded-sm"
                class="group my-1 flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-300 rounded bg-cool-gray-800 hover:bg-cool-gray-700 focus:outline-none transition ease-in-out duration-150" aria-current="page">
                    <svg class="flex-shrink-0 me-3 h-6 w-6 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>

                    <span class="truncate"> الخدمات </span>
            </router-link>

            <router-link :to="{ name: 'staff'}"
                active-class=" bg-gradient-to-l from-blue-700 to-blue-800 hover:bg-blue-900 rounded-sm"
                class="group my-1 flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-300 rounded bg-cool-gray-800 hover:bg-cool-gray-700 focus:outline-none transition ease-in-out duration-150" aria-current="page">
                    <svg class="flex-shrink-0 me-3 h-6 w-6 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>

                    <span class="truncate"> الموظفين </span>
            </router-link>
        </div>
  
  
        <hr class="border-b border-cool-gray-800 my-3 border-opacity-50">

        <div class="p-2">
            <router-link :to="{ name: 'tenantSettings'}"  
                active-class=" bg-gradient-to-l from-blue-700 to-blue-800 hover:bg-blue-900 rounded-sm"
                class="group my-1 flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-300 rounded bg-cool-gray-800 hover:bg-cool-gray-700 focus:outline-none transition ease-in-out duration-150" aria-current="page">
                    <svg class="flex-shrink-0 me-3 w-6 h-6 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span class="truncate"> الإعدادات </span>
            </router-link>
        </div>    


    </nav>

  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>