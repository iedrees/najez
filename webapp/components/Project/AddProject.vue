<template >
    <div>
        <Modal 
            :open="open"
            @close="$emit('close')"
            @save="save"
            title="+ أضف  خدمة جديدة"
        >
            <div>
              <TextField v-model="item.name" model="name" label="اسم المشروع" placeholder=""  />
            </div>  
        </Modal>
    </div>  
</template>

<script>
    export default {
        props: ['open'],
        data(){
            return {
                item: {},
            }
        },
        methods: {
            save() {
                var that = this;
                axios.post('projects', {
                    name : that.item.name,
                })
                .then(function (response) {
                    that.$emit('close');
                    that.$notify({group: 'app',type: 'success',text: response.data.message});
                    that.name = null;
                    that.$router.push({ name: 'projectIndex', params: { id: response.data.data.id } })
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

 