<template>
    <div>
        <CreateTask @update-list="getData"/>
 
        <Loading v-if="loading" />
        <div v-else>
            
            <div v-if="notDoneTasks.length" class="text-end mb-2">
                <b class="bg-cool-gray-400 inline-block leading-0 px-2 pt-1 rounded-sm text-white">{{notDoneTasks.length}}</b>
            </div>

            <TaskRow v-for="task in notDoneTasks" :key="task.id" :task="task" @update-list="getData" :project="project" />

            <div class="my-8 text-center border-b-2 border-cool-gray-300" v-if="doneTasks.length && notDoneTasks.length">
                <div class="block -mb-3 "> <span class="px-2 bg-cool-gray-200 text-cool-gray-400"> المهام المنجزة </span></div>
                <!-- <hr class=" ">  -->
            </div>

            <div v-if="doneTasks.length" class="text-end mb-2">
                <b class="bg-green-500 inline-block leading-0 px-2 pt-1 rounded-sm text-white">{{doneTasks.length}}</b>
            </div>
            <TaskRow v-for="task in doneTasks" :key="task.id" :task="task" @update-list="getData" :project="project" />
             
        </div>
    </div>
</template>

<script>
export default {
    props: ['project'],
    data() {
        return {
            loading: false,
            items: [],
            doneTasks: [],
            notDoneTasks: [],
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            var that = this;
            that.loading = true;
            axios.get('projects/' + that.$route.params.id + '/tasks')
                .then(function (response) {
                    that.loading = false;
                    that.items = response.data.data;
                    that.doneTasks = response.data.doneTasks;
                    that.notDoneTasks = response.data.notDoneTasks;
                });
        },
    }
}
</script>

