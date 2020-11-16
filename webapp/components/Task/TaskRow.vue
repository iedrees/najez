<template>
    <div class="flex items-start text-cool-gray-600">
        <div class="p-2 bg-cool-gray-300 rounded-r">
            <input
                v-model="task.done"
                @change="setDoneStatus(task)"
                type="checkbox"
                class="form-checkbox cursor-pointer hover:opacity-75 border border-gray-100 h-8 w-8 text-indigo-600 bg-gray-200 transition duration-150 ease-in-out focus:shadow-outline-none">
        </div>
        <div @click="openDetail"
             class="bg-white w-full mb-1 border-gray-200 shadow-sm p-4 rounded  cursor-pointer hover:bg-gray-50 hover:border-blue-200">
            <div class="flex items-start">
                <div class="flex-grow">
                    <div class="text-xs mb-2 text-indigo-600" v-if="task.project">{{ task.project.name }}</div>
                    <span :class="{'line-through text-gray-400': task.done}">{{ task.task }}</span>
                </div>

                <div>
                    <div class="p-1 inline-block px-1 text-sm text-gray-300 flex items-center">
                        <span dir="ltr" class="text-xs" title="task.created_at">{{ task.created_at }}</span>
                    </div>
                    <div
                        class="inline-flex items-center rounded-md border border-green-300 px-1 py-1 bg-green-100 text-green-500 text-sm leading-4">
                        <svg class="h-4 w-4 " fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <div class="mx-1 -mb-1" v-if="task.assigned_user">
                            {{ task.assigned_user.name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="showDetail" class="fixed inset-0 overflow-hidden z-50">
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="showDetail=false"></div>

                <section class="absolute inset-y-0 right-0 max-w-full flex z-50">
                    <div class="w-screen max-w-2xl">
                        <div class="h-full flex flex-col bg-white overflow-y-scroll">
                            <header class="p-4 sm:p-4 bg-indigo-50">
                                <div class="flex items-center justify-between">
                                    <h2 class="text font-medium text-gray-700">
                                        تفاصيل المهمة
                                    </h2>
                                    <button @click="showDetail= false" aria-label="Close panel"
                                            class="text-gray-400 hover:text-gray-500 focus:outline-none transition ease-in-out duration-150">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            </header>
                            <div class="relative flex-1 p-1 ">
                                <div>
                                    <div class="px-1">
                                        <textarea id="task"
                                                  v-model="task.task"
                                                  rows="4"
                                                  @keyup="$store.commit('clearErrorKey', 'task')"
                                                  :class="{'border-red-500 bg-red-50': $store.state.errors['task']}"
                                                  class="p-3 focus:bg-cool-gray-200 block w-full rounded-t transition ease-in-out duration-150 text-gray-500 border-2 border-cool-gray-200 focus:border-indigo-300  focus:outline-none"
                                                  placeholder="">
                                        </textarea>

                                        <div class="flex justify-between bg-cool-gray-100 p-2">
                                            <div>
                                                <!-- <input type="date" v-model="task.start_date" class="p-1.5 h-9 bg-white rounded"  > -->
                                                <input type="date" v-model="task.end_date" class="p-1.5 h-9 bg-white rounded"  >
                                                                                        <span v-if="task.end_date" class="text-indigo-700 text-sm"> {{TaskDue}}</span>

                                            </div>

                                            <div>
                                                <PrimaryButton @save="update(task)"> حفظ  </PrimaryButton>
                                                <SecondaryButton @save="deleteRecord(task)"> حذف  </SecondaryButton>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between bg-cool-gray-100 p-2 rounded-b mt-px">
                                            <span></span>
                                            <AssignTaskToMember :task="currentTask" :project="currentTask.project" @update-list="$emit('update-list')" />
                                        </div>
                                    </div>

                                    <!-- <div v-html="task.task" class="text-gray-700 bg-gray-50 p-3 rounded leading-8 text-sm">
                                    </div> -->
                                </div>

                                <div class="mb-2">
                                    <div class="border-t border-dotted bg-cool-gray-200 mx-1 mt-px">
                                        <nav class="-mb-px flex justify-between">
                                            <a href="#" @click.prevent="currentTab='commentsTab'" :class="{'border-indigo-500 font-medium text-indigo-600':currentTab=='commentsTab'}" class="w-full py-3 px-1 text-center border-b-2 border-transparent text-sm leading-5  text-gray-500 focus:outline-none " aria-current="page">
                                            التعليقات
                                            </a>
                                            <a href="#" @click.prevent="currentTab='activitiesTab'" :class="{'border-indigo-500 font-medium text-indigo-600':currentTab=='activitiesTab'}" class="w-full py-3 px-1 text-center border-b-2 border-transparent text-sm leading-5  text-gray-500 focus:outline-none">
                                            الأحداث
                                            </a>
                                        </nav>
                                    </div>
                                </div>


                                <TaskComments v-if="currentTab=='commentsTab'" :task="currentTask" @update-comment-list="getData" />
                                <TaskActivities v-if="currentTab=='activitiesTab'" :activities="currentTask.activities" />
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
import { format, differenceInCalendarDays, parseISO, startOfToday } from 'date-fns';
export default {
    props:['task'],
    data(){
        return {
            showDetail: false,
            currentTask: {},
            currentTab: 'commentsTab',
        }
    },
    computed: {
        TaskDue:  function () {
            if(this.task.end_date){
                var days = differenceInCalendarDays(parseISO(this.task.end_date), startOfToday());
                if(days < 0){
                    return 'متأخرة'
                }else{
                    return differenceInCalendarDays(parseISO(this.task.end_date), startOfToday()) + ' أيام لإنجاز المهمة'
                }
            }
        }
    },
    methods: {
        setDoneStatus(task){
            var that = this;
            that.loading = true;
            axios.post('tasks/'+task.id+'/set-done-status', {
                done: task.done
            })
            .then(function (response) {
                that.$emit('update-counts');
            });
        },
        openDetail(){
            var that = this;
            that.showDetail = true;
            that.getData();
        },
        getData(){
            var that = this;
            that.loading = true;
            axios.get('tasks/'+that.task.id)
            .then(function (response) {
                that.loading = false;
                that.currentTask = response.data.data;
            });
        },
        update(task){
            var that = this;
            axios.patch('tasks/'+task.id, {
                task : task.task,
                start_date : task.start_date,
                end_date : task.end_date,
            })
            .then(function (response) {
                that.$notify({group: 'app',type: 'success',text: response.data.message});
                // that.showDetail = false;
            })
            .catch(e => {
                if(e.response){
                    that.$store.commit('setErrors', e.response.data.errors);
                    that.$notify({group: 'app',type: 'error',text: e.response.data.message});
                }
            });
        },
        deleteRecord(task) {
            if(confirm("هل تريد بالتأكيد حذف المهمة؟")){
                this.deleteIte(task)
            }
        },
        deleteIte(task){
            var that = this;
            axios.delete('tasks/'+task.id, { params:{
                id : task.id
            }})
            .then(function (response) {
                that.$emit('update-list');
                that.$emit('update-counts');
                that.$notify({group: 'app',type: 'success',text: response.data.message});
                that.showDetail = false;

            });
        },
    }
}
</script>
