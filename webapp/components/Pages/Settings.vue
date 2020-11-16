<template>

  <div>
      <div class="bg-cool-gray-100">
        <div class="container mx-auto">
            <div class="border-b border-cool-gray-200 border-cool-gray-300">
                <nav class="flex -mb-px">
                    <router-link :to="{ name: 'settings'}" active-class="border-blue-700 hover:border-blue-700 text-blue-700 hover:text-blue-700" class="group inline-flex items-center py-4 px-4 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none">
                        <svg class="me-2 h-5 w-5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span> الأقسام </span>
                    </router-link>
                    <router-link :to="{ name: 'home'}" exact active-class="border-blue-700 hover:border-blue-700 text-blue-700 hover:text-blue-700" class="group inline-flex items-center py-4 px-4 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none">
                        <svg class="me-2 h-5 w-5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span> الوسوم </span>
                    </router-link>

                </nav>
            </div>
        </div>
    </div>
    <AppPage>
      <div>
         الإعدادات ..
      </div>
    </AppPage>
  </div>
</template>

<script>
    export default {
        metaInfo: {
            title: 'الإعدادات'
        },
    }
</script>
