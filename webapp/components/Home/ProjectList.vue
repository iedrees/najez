<template>
  <div>
      <Loading v-if="loading" />
      <div v-else>
        <div v-for="project in items" :key="project.id" class="bg-white hover:bg-cool-gray-50 shadow-smx overflow-hidden sm:rounded-lg mb-2 p-px">
                <router-link :to="{name:'projectIndex', params: {id:project.id}}"
                    class="block  focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="flex items-center">
                        <div
                            class="flex-shrink-0 py-5 rounded-r-lg group-hover:bg-indigo-100  p-2 bg-gray-50  border-l-2  border-cool-gray-100">
                            <img class="w-20 h-20 p-2 rounded-r"
                                    :src="project.image" />
                        </div>
                        <div class="min-w-0 px-5 py-5 flex-1 sm:flex sm:items-center sm:justify-between ">
                            <div>
                                <div class="font-medium text-gray-700 truncate">
                                    <b class="text-2xl"> {{project.name}} </b>

                                </div>
                                <div class="mt-3 flex flex-shrink">
                                    <div class="flex overflow-hidden">
                                        <img v-if="project.user" class="inline-block h-8 w-8 rounded-full text-white shadow-solid"
                                                :src="project.user.image" :title="project.user.name"
                                                alt="project.user.name"/>
                                        <div v-for="member in project.members" :key="member.id">
                                            <img v-if="member.user.image" class="-mr-0.5 inline-block h-8 w-8 rounded-full text-white shadow-solid" :src="member.user.image" :title="member.user.name" :alt="member.user.name" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pl-5 flex-shrink-0 sm:mt-0">
                                <div class="flex items-center overflow-hidden text-2xl text-cool-gray-700">
                                    <p class="text-cool-gray-500 mx-1">  {{project.tasks_count}}</p>
                                    <span class="text-cool-gray-200 mx-1">/</span>
                                    <b class="text-green-300"> {{project.done_tasks_count}}  </b>
                                    <i class="ti-check-box text-sm text-green-300 inline-block -mt-1.5 mr-2"></i>

                                    <span class="text-xs ms-2 text-cool-gray-300 block text-end">{{parseFloat(((project.done_tasks_count * 100) / project.tasks_count||0).toFixed(0))}}%</span>
                                </div>

                            </div>

                        </div>
                    </div>
                </router-link>

                <div class="relative p-0.5 pb-0">
                    <div class="overflow-hidden h-1 text-xs flex rounded bg-indigo-100 rounded">
                        <div :style="'width:'+parseFloat(((project.done_tasks_count * 100) / project.tasks_count).toFixed(0))+'%'" class="bg-indigo-400 rounded-s shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center "></div>
                    </div>
                </div>
            </div>
        </div>
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
            axios.get('projects')
            .then(function (response) {
                that.loading = false;
                that.items = response.data.data;
            });
        },
    }
}
</script>
