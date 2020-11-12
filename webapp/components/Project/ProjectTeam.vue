<template>
  <div>
        <div v-for="member in teamMembers" :key="member.id" class="bg-white mb-1 rounded">
            <div class="flex items-center px-4 py-4 sm:px-6">
                <div class="min-w-0 flex-1 flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full" v-if="member.user" :src="member.user.image" alt="" />
                    </div>
                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                        <div>
                        <div class="leading-5 font-bold text-lg text-gray-600 truncate" v-if="member.user">{{member.user.name}}</div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                <svg class="flex-shrink-0 ml-1 -mt-2 h-5 w-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                <span class="truncate text-gray-400">{{member.rule}}</span>
                            </div>
                            <div class="mt-2 flex items-center text-md leading-5 text-gray-500">
                                <span class="truncate text-gray-400 font-bold" v-if="member.user"> رقم التحويلة : {{member.user.employee_ext}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>
 
<script>
    export default {
        props: ['project'],
        metaInfo () {
            return { title: 'فريق العمل - ' + this.project.name}
        },
        data(){
            return {
                loading: false,
                teamMembers: [],
            }
        },
        mounted(){
            this.getData();  
        },
        methods: {
            getData(){
                var that = this;
                that.loading = true;
                axios.get('projects/'+that.$route.params.id+'/team')
                .then(function (response) {
                    that.loading = false;
                    that.teamMembers = response.data.data;
                });
            },
        }
    }
</script>

 

