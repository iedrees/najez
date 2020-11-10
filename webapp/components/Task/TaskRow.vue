<template>
      <div class="flex items-start text-cool-gray-600">
            <div class="p-2 bg-cool-gray-300 rounded-r">
                <input
                    v-model="task.done"
                    @change="setDoneStatus(task)"
                    type="checkbox"
                    class="form-checkbox cursor-pointer hover:opacity-75 border border-gray-100 h-8 w-8 text-indigo-600 bg-gray-200 transition duration-150 ease-in-out focus:shadow-outline-none">
            </div>
            <div  class=" bg-white w-full mb-1 border-gray-200 shadow-sm p-4 rounded  cursor-pointer hover:bg-gray-50 hover:border-blue-200">
                
                <div class="flex items-start">
                    <div class="flex-grow">
                        <!-- <div class="text-xs mb-2 text-indigo-600">{{data_get(task , 'project.name')}}</div> -->
                        <span :class="{'line-through text-gray-400': task.done}">{{task.task}}</span>
                    </div>
                
                    <div>
                        <div class="p-1 inline-block px-1 text-sm text-gray-300 flex items-center">
                            <span dir="ltr" class="text-xs" title="task.created_at">{{task.created_at}}</span>
                        </div>
                        <div class="inline-flex items-center rounded-md border border-green-300 px-1 py-1 bg-green-100 text-green-500 text-sm leading-4">
                            <svg class="h-4 w-4 " fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z" clip-rule="evenodd"></path></svg>
                        <div class="mx-1 -mb-1" v-if="task.assigned_user">
                            {{task.assigned_user.name}}
                        </div>
                        
                        </div>
                    </div>
                </div>

            </div>
    </div>
</template>

<script>
export default {
    props:['task'],
    methods: {
        setDoneStatus(task){
            var that = this;
            that.loading = true;
            axios.post('tasks/'+task.id+'/set-done-status', {
                done: task.done
            })
            .then(function (response) {
                // console.log(response.data.data)
            });
        },
    }
}
</script>

<style>

</style>