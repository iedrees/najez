<template>
  <div>
        <div class="flex items-center mx-2">
            <div class="flex items-center -ml-px rounded-r-md border border-gray-300 px-2 py-3 h-9 bg-purple-100 text-purple-500 text-sm leading-5 h-8">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>    

            <select v-model="member.rule" @change="setRule" class="w-32 border focus:outline-none p-2 h-9 rounded-e bg-white text-cool-gray-500">
                <option value="" disabled> تعديل صلاحية العضو  : </option>
                <option value="member"> عضو  </option>
                <option value="leader"> قائد مشروع  </option>
            </select>                                      
        </div>
  </div>
</template>

<script>
export default {
    props: ['member'],
    methods: {
        setRule() {
            var that = this;
            axios.post('projects/'+that.$route.params.id+'/team/set-team-member-rule', {
                id : that.member.id,
                rule : that.member.rule,
            })
            .then(function (response) {
                that.$notify({group: 'app',type: 'success',text: response.data.message});
                // that.$emit('update-list');
            })
            .catch(e => {
                if(e.response){
                    that.$store.commit('setErrors', e.response.data.errors);
                    that.$notify({group: 'app',type: 'error',text: e.response.data.message});
                }
            });
        },
    }
}
</script>
 
