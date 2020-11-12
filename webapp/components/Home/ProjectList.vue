<template>
  <div>
 
      <div v-for="project in items" :key="project.id" class="bg-white hover:bg-indigo-50 shadow-smx overflow-hidden sm:rounded-sm mb-2 p-px">
            <router-link :to="{name:'projectIndex', params: {id:project.id}}"
                class="block  focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                <div class="flex items-center">
                    <div
                        class="flex-shrink-0 py-5 rounded-r-sm  p-2 bg-gray-50  border-l-2  border-cool-gray-100">
                        <img class="w-20 h-20 p-2 rounded-r opacity-75"
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
                            <div class="flex items-center overflow-hidden text-2xl text-gray-700">
                                <p class="text-gray-500 mx-1">  {{project.tasks_count}}</p>
                                <span class="text-gray-200 mx-1">/</span>
                                <b class="text-green-300"> {{project.done_tasks_count}}  </b>
                                <i class="ti-check-box text-sm text-green-300 inline-block -mt-1.5 mr-2"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </router-link>
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
 