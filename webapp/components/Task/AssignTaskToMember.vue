<template>
  <div>
        <div class="flex items-center">
            <div v-if="task.assigned_user" class="flex items-center -ml-px rounded-r-md border border-gray-300 px-2 py-3 h-9 bg-green-100 text-green-500 text-sm leading-5 h-8">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z" clip-rule="evenodd"></path></svg>
                <!-- <div class="mx-1 -mb-1">
                    {{task.assigned_user.name}}
                </div> -->
            </div>    

            <select v-model="task.assigned_user_id" v-if="project" @change="assignUser" class="w-32 border focus:outline-none p-2 h-9 rounded-e bg-white">
                <option value="" disabled> تعيين المهمة إلى : </option>
                <option :value="project.user.id">{{project.user.name}}</option>
                <option v-for="item in project.members" :key="item.id" v-if="item.user" :value="item.user.id" >{{item.user.name}}</option>
            </select>                                      
        </div>

   
  </div>
</template>

<script>
export default {
    props: ['task', 'project'],
    methods: {
        assignUser() {
                var that = this;
                axios.post('assign-task-to-user', {
                    id : that.task.id,
                    assigned_user_id : that.task.assigned_user_id,
                })
                .then(function (response) {
                    that.$notify({group: 'app',type: 'success',text: response.data.message});
                    that.$emit('update-list');
                    // that.task.assigned_user = response.data.data
                })
                .catch(e => {
                    if(e.response){
                        that.$store.commit('setErrors', e.response.data.errors);
                        that.$notify({group: 'app',type: 'error',text: e.response.data.message});
                    }
                });
            },
    }

}
</script>

<style>

</style>