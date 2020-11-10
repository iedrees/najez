<template>
  <div class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow-sm hover:bg-blue-50">
        <router-link :to="{ name: 'showProfile', params: {id:item.id}}" class="flex-1 flex flex-col p-8 ">
            
            <img v-if="item.profile_image" class="w-32 h-32 flex-shrink-0 mx-auto bg-black rounded-full" :src="item.profile_image" alt="">
            <h3 class="mt-6 text-gray-900 text-lg leading-6 font-medium">{{item.name}}</h3>
            <dl class="mt-1 flex-grow flex flex-col justify-between">
                <dd class="text-gray-500 text-sm leading-5 truncate" v-if="item.account_history">{{item.account_history.biography}}</dd>
                <dd class="mt-3">
                    <span class="px-2 py-1 text-teal-800 text-xs leading-4 font-medium bg-teal-100 rounded-full" v-if="item.category">{{item.category.category_name}}</span>
                </dd>
            </dl>
        </router-link> 

        <div class="border-t border-gray-100">
            <div class="-mt-px flex" v-if="item.accounts.length">
                <div v-for="account in item.accounts" :key="account.id" class="w-0 flex-1 flex border-e border-gray-100">
                    <router-link :to="{ name: 'showProfile', params: {id:item.id}}" v-if="account.social_app == 'snapchat'" class="relative -me-px w-0 flex-1 inline-flex items-center justify-center py-3 text-sm leading-5 text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 transition ease-in-out duration-150">
                        <!-- <img class="w-8" src="/images/snapchat.png" alt=""> -->
                        <img class="w-6 opacity-25" src="/images/icons/snapchat.svg" alt="">
                    </router-link>
                    <router-link  :to="{ name: 'showProfile', params: {id:item.id}}" v-if="account.social_app == 'instagram'"  class="relative -me-px w-0 flex-1 inline-flex items-center justify-center py-3 text-sm leading-5 text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 transition ease-in-out duration-150">
                        <img class="w-6 opacity-25" src="/images/icons/instagram.svg" alt="">
                    </router-link>
                </div>  
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item']
}
</script>
 