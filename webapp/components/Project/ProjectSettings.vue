<template>
  <div>
       
        <TextField v-model="item.name" model="name" label="اسم المشروع" placeholder="اسم المشروع" />  
        <PrimaryButton @save="save" class="mt-3"> حفظ  </PrimaryButton>
  </div>
</template>
 
<script>
export default {
        props: ['project'],
        metaInfo () {
            return { title: 'الإعدادات - ' + this.project.name}
        },
        data() {
            return {
                    loading: false,
                    logo: null,
                }
        },
        computed: {
            item:  function () {
                return this.project
            }
        },
        methods: {
            save(){
                var that = this;
                // that.loading = true;
                axios.patch('projects/'+that.$route.params.id, {
                    name : that.item.name,
                })
                .then(function (response) {
                    that.$notify({group: 'app',type: 'success',text: response.data.message});
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
  

 
