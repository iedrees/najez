<template>
    <div>
        <CreateTask @update-list="getData"/>

        <Loading v-if="loading" />
        <div v-else>
            <TaskRow v-for="task in items" :key="task.id" :task="task" @update-list="getData"/>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: false,
            items: [],
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
                });
        },
    }
}
</script>

