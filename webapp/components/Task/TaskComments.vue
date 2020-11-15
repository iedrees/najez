<template>
    <div>
        <div class="p-2">
            <textarea id="comment" 
                v-model="comment" 
                rows="2"
                @keyup="$store.commit('clearErrorKey', 'comment')"
                :class="{'border-red-500 bg-red-50': $store.state.errors['comment']}"
                class="p-3 mb-1 focus:bg-cool-gray-200 block w-full rounded transition ease-in-out duration-150 text-gray-500 border-2 border-cool-gray-200 focus:border-indigo-300  focus:outline-none" 
                placeholder="" >
            </textarea>
            <PrimaryButton @save="save"> أضف تعليق  </PrimaryButton>
        </div>

        <div v-if="task.comments && task.comments.length" class="mt-3 p-2" >
            <div v-for="comment in task.comments" :key="comment.id" class="bg-cool-gray-100 rounded-lg p-3 mb-0.5 text-gray-600">
                <div class="flex justify-between">
                    <span v-if="comment.commented">
                        <img class="inline-block h-5 w-5 rounded-full" :src="comment.commented.image" alt="" />
                        <span class="text-sm opacity-50">{{comment.commented.name}}</span>
                    </span>
                    <span class="p-1 inline-block px-1 text-sm text-gray-300 flex items-center">
                        <span dir="ltr" class="text-xs" title="activity.created_at">{{formatDuration(comment.created_at)}}</span>
                    </span>
                </div>
                <div class="text-sm leading-7">
                    {{comment.comment}}
                </div>
            </div>
        </div>
        <div v-else class="p-3 bg-blue-50 rounded mx-2 text-sm text-blue-400">
            لا توجد تعليقات بعد.
        </div>
    </div>
</template>

<script>
    import { distanceInWordsToNow, parseISO,format } from 'date-fns'
    export default {
        props: ['task'],
        data() {
            return {
                comment: null,
            }
        } ,
       methods: {
            save() {
                var that = this;
                axios.post('comments', {
                    taskId : that.task.id,
                    comment : that.comment,
                })
                .then(function (response) {
                    that.$notify({group: 'app',type: 'success',text: response.data.message});
                    that.comment = null;
                    that.$emit('update-comment-list');
                })
                .catch(e => {
                    if(e.response){
                        that.$store.commit('setErrors', e.response.data.errors);
                        that.$notify({group: 'app',type: 'error',text: e.response.data.message});
                    }
                });
            },
            formatDuration(date){
                return format(parseISO(date), 'yyyy-MM-dd HH:mm')
            }
        }  
    }
</script>
 