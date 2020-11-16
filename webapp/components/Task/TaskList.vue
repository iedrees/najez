<template>
  <div>
       <CreateTask @update-list="getData" />
<!-- v-if="task.project.amILeader || task.assigned_user.id == $store.state.user.id"-->
      <TaskRow v-for="task in items" v-if="task.project.amILeader || task.assigned_user_id == $store.state.user.id" :key="task.id" :task="task" @update-list="getData" />
  {{items }}
  </div>
</template>

<script>
    export default {
        data(){
            return {
                loading: false,
                items: [],
            }
        },
        mounted(){
            this.getData();
        },
        methods: {
            getData(){
                var that = this;
                that.loading = true;
                axios.get('projects/'+that.$route.params.id+'/tasks')
                .then(function (response) {
                    that.loading = false;
                    that.items = response.data.data;
                });
            },
        }
    }
</script>

