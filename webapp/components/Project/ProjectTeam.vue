<template>
  <div>
    <h4 class="border-b-2 border-gray-300 p-2 mb-2 text-gray-600 font-bold flex items-center">
        <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
        <span class="mx-2"> أعضاء الفريق </span>
    </h4>

    <AddTeamMember v-if="project.user_id == $store.state.user.id" @update-list="getData" :teamMembers="teamMembers" />

    <div v-if="project.user" class="bg-white mb-1 rounded">
        <div class="flex items-center px-4 py-4 sm:px-6">
            <div class="min-w-0 flex-1 flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-12 w-12 rounded-full" :src="project.user.image" alt="" />
                </div>
                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                    <div>
                    <div class="leading-5 font-bold text-lg text-gray-600 truncate">{{project.user.name}}</div>
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                            <svg class="flex-shrink-0 ml-1 -mt-2 h-5 w-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                            <span class="truncate text-gray-400"> صاحب المشروع </span>
                        </div>
                        <div v-if="project.user.employee_ext" class="mt-2 flex items-center text-md leading-5 text-gray-500">
                            <span class="truncate text-gray-400 font-bold" > رقم التحويلة : {{project.user.employee_ext}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div v-for="member in teamMembers" :key="member.id" class="bg-white mb-1 rounded">
        <div class="flex items-center px-4 py-4 sm:px-6">
            <div class="min-w-0 flex-1 flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-12 w-12 rounded-full" v-if="member.user" :src="member.user.image" alt="" />
                </div>
                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                    <div>
                        <div class="leading-5 font-bold text-lg text-gray-600 truncate" v-if="member.user">{{member.user.name}}</div>
                        <div class="mt-3 flex items-center text-sm leading-5 text-gray-500">
                            <svg v-if="member.rule == 'member'" class="flex-shrink-0 ml-1 -mt-2 h-5 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <svg v-if="member.rule == 'leader'" class="flex-shrink-0 ml-1 -mt-2 h-5 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            <span class="truncate text-gray-400 capitalize">{{member.rule}}</span>
                        </div>
                        <div v-if="member.employee_ext" class="mt-2 flex items-center text-md leading-5 text-gray-500">
                            <span class="truncate text-gray-400 font-bold" v-if="member.user"> رقم التحويلة : {{member.user.employee_ext}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                
                <SetTeamMemberRule v-if="project.user_id == $store.state.user.id" :member="member" />
                <button @click="deleteRecord(member)" class="focus:outline-none me-1">
                    <svg class="h-6 w-6 text-gray-400 hover:text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                </button>
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
            deleteRecord(member) {
                if(confirm("هل تريد بالتأكيد إزالة العضو من فريق هذه المشروع ؟")){
                    this.deleteIte(member)
                }
            },
            deleteIte(member){
                var that = this;
                axios.delete('projects/'+that.$route.params.id+'/team',{ params:{
                    id : member.id
                }})
                .then(function (response) {
                    that.$notify({group: 'app',type: 'success',text: response.data.message});
                    that.getData();
                });
            },
        }
    }
</script>

 

