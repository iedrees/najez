<template>
    <div class="bg-white overflow-hidden shadow-sm rounded-2xl hover:bg-cool-gray-50">
        <div class="px-4 py-5 sm:p-6">
          <router-link :to="{ name: 'report'}" class="flex items-center">
            <div class="flex-shrink-0 bg-indigo-700 rounded-full p-2">
              <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="mr-5 w-0 flex-1">
              <dl>
                <dt class="text-sm leading-5 font-medium text-gray-400 truncate mb-3">
                  مهام الأسبوع المنجزة لمشاريعي 
                </dt>
                <dd class="flex items-baseline">
                  <div class="text-3xl leading-8 font-semibold text-gray-700">
                    {{total}}
                  </div>
                </dd>
              </dl>
            </div>
          </router-link>
        </div>
        <div class="bg-gray-50 px-4 py-4 sm:px-6">
            <div class="text-sm leading-5">
                <router-link :to="{ name: 'report'}" class="font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                    تقرير المهام المنجزة
                </router-link>
            </div>
        </div>
    </div> 
</template>

<script>
    export default {
        data () {
            return {
                total: 0,
            }
        },
        mounted () {
            this.getMediaCountCount()
        },
        methods: {
            getMediaCountCount(){
                var that = this;
                axios.get('analyses/get-weekly-done-tasks')
                .then(function (response) {
                    that.total = response.data.data
                });
            },
        }
    }
</script>
