<template>
  <div>
    <div class="grid grid-cols-2 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <router-link :to="{ name: 'profiles'}" class="block bg-white rounded-2xl p-1.5 group hover:bg-white shadow-sm hover:shadow">
            <div class="bg-cool-gray-100 rounded-2xl p-6 py-10 group-hover:bg-white">
                <div class="">
                    <img src="/images/icons/051-male.svg" alt="" class="w-20">
                </div>
                <h1 class="text-3xl leading-12 mt-10 text-start" dir="ltr">{{profilesCount}}</h1>
                <h3 class="text-cool-gray-400 font-bold text-sm">الملفات الشخصية</h3>
            </div>
        </router-link>
        <router-link :to="{ name: 'profiles'}" class="block bg-white rounded-2xl p-1.5 group hover:bg-white shadow-sm hover:shadow">
            <div class="bg-cool-gray-100 rounded-2xl p-6 py-10 group-hover:bg-white">
                <div class="">
                    <img src="/images/icons/061-share.svg" alt="" class="w-20">
                </div>
                <h1 class="text-3xl leading-12 mt-10 text-start" dir="ltr">{{accountsCount}}</h1>
                <h3 class="text-cool-gray-400 font-bold text-sm"> حسابات السوشال ميديا </h3>
            </div>
        </router-link>
        <router-link :to="{ name: 'media'}" class="block bg-white rounded-2xl p-1.5 group hover:bg-white shadow-sm hover:shadow">
            <div class="bg-cool-gray-100 rounded-2xl p-6 py-10 group-hover:bg-white">
                <div class="">
                    <img src="/images/icons/040-game.svg" alt="" class="w-20">
                </div>
                <h1 class="text-3xl leading-12 mt-10 text-start" dir="ltr">{{mediaCount}}</h1>
                <h3 class="text-cool-gray-400 font-bold text-sm"> الوسائط </h3>
            </div>
        </router-link>
        <a href="#" class="block bg-white rounded-2xl p-1.5 group hover:bg-white shadow-sm hover:shadow">
            <div class="bg-cool-gray-100 rounded-2xl p-6 py-10 group-hover:bg-white">
                <div class="">
                    <img src="/images/icons/031-coins.svg" alt="" class="w-20">
                </div>
                <h1 class="text-3xl leading-12 mt-10 text-start" dir="ltr">4212.1K</h1>
                <h3 class="text-cool-gray-400 font-bold text-sm">العمليات</h3>
            </div>
        </a>
    </div>
  </div>
</template>


<script>
    export default {
        data(){
            return {
                profilesCount: 0,
                accountsCount: 0,
                mediaCount: 0,
            }
        },
        mounted(){
            this.getProfilesCount();  
            this.getAccountsCount();  
            this.getMediaCountCount();  
        },
        methods: {
            getProfilesCount(){
                var that = this;
                axios.get('analyses/get-profiles-count')
                .then(function (response) {
                    that.profilesCount = response.data.data;
                });
            },
            getAccountsCount(){
                var that = this;
                axios.get('analyses/get-accounts-count')
                .then(function (response) {
                    that.accountsCount = response.data.data;
                });
            },
            getMediaCountCount(){
                var that = this;
                axios.get('analyses/get-media-count')
                .then(function (response) {
                    that.mediaCount = response.data.data;
                });
            },
 
        }
    }
</script>
 

 