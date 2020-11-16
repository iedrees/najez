<template>
  <AppPage>
            <h4 class="border-b-2 border-gray-300 p-2 mb-5 text-gray-400 font-bold flex justify-between">

                <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                    </svg>
                    <span class="mx-2">  المهام المُسندة إلي
                        <span class="bg-red-500 px-2 mx-1 py-1 rounded-sm text-white">
                            {{allMyNotDoneTasks}}
                        </span>
                    </span>
                </div>

                <div class="flex items-center overflow-hidden text-2xl text-gray-700">
                    <p class="text-gray-500 mx-1">  {{total}}</p>
                    <span class="text-gray-300 mx-1">/</span>
                    <b class="text-green-300"> {{allMyDoneTasks}}  </b>
                    <i class="ti-check-box text-sm text-green-300 inline-block -mt-1.5 mr-2"></i>
                </div>
            </h4>

       <TaskRow v-for="task in items" :key="task.id" :task="task" v-if="task.assigned_user_id == $store.state.user.id" @update-list="getData" />

  </AppPage>
</template>

<script>
    export default {
        metaInfo: {
            title: 'مهامي'
        },
        data(){
            return {
                loading: false,
                items: [],
                total: 0,
                allMyDoneTasks: 0,
                allMyNotDoneTasks: 0,
            }
        },
        mounted(){
            this.getData();
        },
        methods: {
            getData(){
                var that = this;
                that.loading = true;
                axios.get('my-task-list')
                .then(function (response) {
                    that.loading = false;
                    that.items = response.data.data.data;
                    that.total = response.data.data.total;
                    that.allMyDoneTasks = response.data.allMyDoneTasks;
                    that.allMyNotDoneTasks = response.data.allMyNotDoneTasks;
                });
            },
        }
    }
</script>


