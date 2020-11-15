<template>
<div>
    <div class="bg-white overflow-hidden shadow-sm rounded-2xl hover:bg-cool-gray-50">
        <div class="px-4 py-5 sm:p-6">
          <router-link :to="{ name: 'tasks'}" class="flex items-center">
            <div class="flex-shrink-0 bg-teal-400 rounded-full p-2">
              <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            </div>
            <div class="mr-5 w-0 flex-1 ">
              <dl>
                <dt class="text-sm leading-5 font-medium text-gray-400 truncate mb-3">
                  مهامي 
                </dt>
                <dd class="flex items-baseline">
                  <div class="text-3xl leading-8 font-semibold text-gray-700">
                    <div class="flex items-center overflow-hidden text-2xl text-gray-700">
                        <p class="text-cool-gray-400 mx-1">  {{allMyTasksCount}} </p>
                        <span class="text-gray-200 mx-1">/</span>
                        <b class="text-teal-400"> {{allMyDoneTasks}}   </b>
                        <i class="ti-check-box text-sm text-green-300 inline-block -mt-1.5 mr-2"></i>
                    </div>
                  </div>
                </dd>
              </dl>
            </div>
          </router-link>
        </div>
        <div class="bg-gray-50 px-4 py-4 sm:px-6">
            <div class="text-sm leading-5">
                <router-link :to="{ name: 'tasks'}" class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                     المهام المسندة إلي
                     <span class="bg-red-500 px-1.5 mx-1 py-1 rounded-sm text-white">
                        {{allMyNotDoneTasks}}
                    </span>
                </router-link>
            </div>
        </div>
    </div> 
</div>

</template>

<script>
    export default {
        data () {
            return {
                allMyTasksCount: 0,
                allMyDoneTasks: 0,
                allMyNotDoneTasks: 0,
            }
        },
        mounted () {
            this.getMediaCountCount()
        },
        methods: {
            getMediaCountCount(){
                var that = this;
                axios.get('analyses/get-current-user-tasks-state')
                .then(function (response) {
                    that.allMyTasksCount = response.data.data.allMyTasksCount
                    that.allMyDoneTasks = response.data.data.allMyDoneTasks
                    that.allMyNotDoneTasks = response.data.data.allMyNotDoneTasks
                });
            },
        }
    }
</script>

 