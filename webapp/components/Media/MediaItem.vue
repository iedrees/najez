<template>
<div>
    <div :class="{'border-indigo-200x': item.mime_type == 'image/jpeg'}" class="border-red-300x group h-auto min-h-200  rounded bg-cool-gray-300x xborder  p-0.5">
    
        <div class="flex  w-full justify-between items-center rounded-t bg-white p-2 py-2 mb-0.5 h-16">
            <router-link :to="{ name: 'showProfile', params: {id:item.profile.id}}" class="flex min-w-0 items-center justify-between" v-if="item.profile">
                <img v-if="item.profile" class="w-12 h-12 me-2 bg-gray-300 rounded flex-shrink-0" :src="item.profile.profile_image" alt="">

                <div class="flex-1 min-w-0">
                    <h2 class="text-cool-gray-500 text-md leading-6 font-medium truncate" v-if="item.profile.name">{{item.profile.name}}</h2>
                    <h2 class="text-cool-gray-500 text-md leading-6 font-medium truncate" v-else>{{item.profileName}}</h2>
                    <p class="text-cool-gray-400 text-xs leading-5 truncate">{{item.accountUsername}}</p>
                </div>
            </router-link> 
            <div>
                <small v-if="item.since" class="text-xs text-cool-gray-400 truncate">{{item.since}}</small>
                <div class="text-end">...</div>
            </div>
        </div>

        <div class="relative">
            <span class="absolute  top-2 left-0 block px-0.5 transform rounded-s text-white bg-black bg-opacity-50">
                <img v-if="item.collection_name == 'snapchat'" class="w-8 p-1 my-0.5" src="/images/snapchat.png" alt="">
                <img v-if="item.collection_name == 'instagram'" class="w-8 p-1 my-0.5" src="/images/instagram.png" alt="">
            </span>
            <span v-if="item.mime_type == 'video/mp4'" class="absolute mt-1.5 top-10 left-0 block px-0.5 transform rounded-s text-white bg-black bg-opacity-50">
                <svg class="w-8 h-8  p-.5 text-cool-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            </span>
  
           
            <div v-if="item.mime_type == 'image/jpeg'"  class=" hidden group-hover:flex justify-center align-middle z-50 absolute w-full">
                <a href="#"  @click.prevent="showImage = true" class="absolute inline-block mx-auto mt-20 p-1 w-10 h-10 hover:bg-cool-gray-900 bg-black px-0.5 transform rounded-full text-white bg-black bg-opacity-25">
                    <svg class="w-6 h-6 mx-auto mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </a>
            </div>
          
            
            <img v-if="item.mime_type == 'image/jpeg'" class="rounded-sm object-cover w-full" :src="item.fullUrl" alt="">
                
            <div v-if="item.mime_type == 'video/mp4'" class="rounded-sm z-0 w-full">
                <video  class="z-0 rounded-sm" style="min-height: 200px; min-width:200px" height="200" controls>
                    <source :src="item.fullUrl" type="video/mp4" style="min-height: 200px; min-width:200px">
                    Your browser does not support the video tag.
                </video>
            </div>    
        </div>
    

        <Modal 
            :open="showImage"
            @close="showImage=false"
            :hideFooter="true"    
            >
            <div class="relative text-center flex justify-center align-middle w-full">
                <img class="rounded-sm object-cover w-full" style="min-height: 200px;" :src="item.fullUrl" alt="">
            
                <div v-if="item.mime_type == 'video/mp4'" class="rounded-sm z-0 mx-auto w-full">
                    <video  class="z-0 rounded-sm w-full" style="min-height: 200px;  min-width:400px" height="200" controls>
                        <source :src="item.fullUrl" type="video/mp4" style="min-height: 200px;  min-width:400px">
                        Your browser does not support the video tag.
                    </video>
                </div> 

            </div>  
        </Modal>
            
    </div> 
</div>
</template>

<script>
 
export default {
    props: ['item', 'index', 'items'],
 
    mounted(){
        // console.log(this.items);
    },
    data(){
        return {
            showImage: false,
        }
    }
}
</script>

<style>

</style>