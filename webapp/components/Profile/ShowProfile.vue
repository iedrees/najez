<template>
  <div>
  
    <div class="bg-cool-gray-800">
    <div class="container mx-auto">
        <div class="lg:flex lg:items-center lg:justify-between py-8">
    
                <div class="flex w-full justify-between items-center">
                    <div class="md:flex px-4 md:px-0 min-w-0 items-center justify-between">
                        
                        <img v-if="item.profile_image" class="w-24 h-24 me-5 bg-gray-300 rounded-2xl flex-shrink-0" :src="item.profile_image" alt="">

                        <div class="flex-1 min-w-0">
                            <h2 class="text-2xl font-bold text-white sm:text-3xl sm:leading-9 sm:truncate" v-if="item.name">{{item.name}}</h2>
                            <dd class="text-gray-500 text-sm leading-8" v-if="item.account_history">{{item.account_history.biography}}</dd>
                        
                            
                            <div class="flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap mt-2">
                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-300 sm:me-6">
                                    <svg class="flex-shrink-0 me-1.5 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                    </svg>
                                    {{item.since}}
                                </div>
                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-300 sm:me-6">
                                    
                                    <svg class="flex-shrink-0 me-1.5 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>

                                    <span class="text-xs leading-4 font-medium" v-if="item.category">{{item.category.category_name}}</span>
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                </div>
    
            
            </div>
        </div>
    </div>

    <div class="bg-cool-gray-300">
        <div class="container mx-auto">
            <div class="border-b border-cool-gray-200 border-cool-gray-300">
                <nav class="flex -mb-px">
                    <router-link :to="{ name: 'showProfile', params: {id:item.id}}" active-class="border-blue-700 hover:border-blue-700 text-blue-700 hover:text-blue-700" class="group inline-flex items-center py-4 px-4 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none">
                        <svg class="me-2 h-5 w-5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>  الوسائط </span>
                    </router-link>

                    <!-- <div v-for="account in item.accounts" :key="account.id" class="">
                        <a href="#" v-if="account.social_app == 'snapchat'" class="group inline-flex items-center py-4 px-4 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none">
                            <img class="w-6 opacity-25" src="/images/icons/snapchat.svg" alt="">
                        </a>
                        <a href="#" v-if="account.social_app == 'instagram'" class="group inline-flex items-center py-4 px-4 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none">
                            <img class="w-6 opacity-25" src="/images/icons/instagram.svg" alt="">
                        </a>
                    </div>   -->

                </nav>
            </div>
        </div>
    </div>
 
    <div>
        <Media :profiles="[$route.params.id]" />
        
    </div>
 
  </div>
</template>
 

<script>
    export default {
        metaInfo () {
            return { title: this.item.name}
        },
        watch: {
            '$route.params.id': function (id) {
                this.getData();
            }
        },
        mounted() {
            this.getData();
        },
        data() {
            return {
                    item: {},
                }
        },
        methods: {
            getData(){
                var that = this;
                axios.get('profiles/'+that.$route.params.id)
                .then(function (response) {
                    that.item = response.data.data;
                });
            },
        }
    }
</script>
 