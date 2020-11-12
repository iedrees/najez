<template>
  <div>
        <div class="relative block mb-3" v-click-outside="hideMe">
            <div class="relative rounded">
                <input @focus="open = true" @keyup="getData" v-model="search" type="text" placeholder="أضف عضو للفريق .." class="p-3 pr-10 block w-full rounded-none rounded-t transition ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none"  />
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
            </div>
 
            <div v-show="open" class="origin-top-right absolute right-0 w-56 rounded-b-md w-full bg-indigo-300 p-0.5 pt-0">
                <div class="rounded-b-md bg-cool-gray-100">
                    <div class="" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                       
                        <div v-if="!users.length" class="p-2 px-3 text-gray-600 text-sm">
                            لا توجد نتائج ..
                        </div>
                    
                      <div v-else v-for="user in users" :key="user.id">
                            <div v-if="user.id != $store.state.user.id"  class="flex items-center text-gray-700 p-3 border-t border-cool-gray-200">
                                <img class="h-8 w-8 rounded-sm" :src="user.image" alt="" />
                                <div class="mx-2 flex-grow">
                                    <h4 class="text-sm">{{ user.name }}</h4>
                                    <div class="text-xs text-gray-600">{{ user.email }}</div>
                                </div>
                                <div>
                                    <button v-if="!checkTeamMember(user.id)" @click="addMember(user)"  type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                        <svg class="-mr-0.5 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                                        أضف للمشروع
                                    </button>
                                    <span v-else class="bg-green-100 rounded p-0.5 px-1 italic text-sm text-green-400">عضو</span>
                                </div>
                            </div>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>

<script>
import ClickOutside from 'vue-click-outside'
export default {
    directives: {ClickOutside},
    props: ['teamMembers'],
    data() {
        return {
            open:false,
            users: [],
            search: null,
        }
    },
    mounted(){
        this.getData();  
    },
    methods: {
        getData(){
            var that = this;
            that.loading = true;
            axios.get('users', {params: {search: that.search}})
            .then(function (response) {
                that.loading = false;

                that.users = response.data.data;
            });
        },
        addMember(user){
            var that = this;
            // that.loading = true;
            axios.post('projects/'+that.$route.params.id+'/team', {
                projectId : that.$route.params.id,
                userId : user.id,
            })
            .then(function (response) {
                // that.open = false;
                that.$notify({group: 'app',type: 'success',text: response.data.message});
                that.$emit('update-list');
            })
            .catch(e => {
                if(e.response){
                    that.$store.commit('setErrors', e.response.data.errors);
                    that.$notify({group: 'app',type: 'error',text: e.response.data.message});
                }
            });
        },
        hideMe(){
            this.open = false;
        },
        checkTeamMember(id){
            var result = _.keyBy(this.teamMembers, 'user_id')
            return _.has(result, id)
        },
    }
}
</script>
 