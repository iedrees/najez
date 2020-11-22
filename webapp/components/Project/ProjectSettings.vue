<template>
 <div>
     <h4 class="border-b-2 border-cool-gray-300 p-2 mb-2 text-cool-gray-500 font-bold flex items-center">
         <svg fill="currentColor" viewBox="0 0 20 20" class="ml-2 h-5 w-5 group-hover:text-indigo-800"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
         <span class="mx-2"> اعدادات المشروع  </span>
     </h4>
        <TextField v-model="item.name" model="name" label="اسم المشروع" placeholder="اسم المشروع"/>
        <TextField v-model="item.status" model="status" label="حاله المشروع" placeholder="حاله المشروع"/>
        <TextField v-model="item.details" model="details" label="تفاصيل المشروع" placeholder="تفاصيل المشروع"/>
        <TextField v-model="item.deadline" model="deadline" label="موعد تسليم المشروع" placeholder="موعد تسليم المشروع"/>

        <div class="flex justify-between mt-3">
            <PrimaryButton @save="save"> حفظ</PrimaryButton>
            <SecondaryButton v-if="item.user_id == $store.state.user.id" @save="deleteRecord()"> أرشفة المشروع  </SecondaryButton>
        </div>
    </div>
</template>

<script>
import FieldWrapper from "../Fields/FieldWrapper";

export default {
    components: {FieldWrapper},
    props: ['project'],
    metaInfo() {
        return {title: 'الإعدادات - ' + this.project.name}
    },
    data() {
        return {
            loading: false,
            logo: null,
        }
    },
    computed: {
        item: function () {
            return this.project
        }
    },
    methods: {
        save() {
            var that = this;
            // that.loading = true;
            axios.patch('projects/' + that.$route.params.id, {
                name: that.item.name,
                status: that.item.status,
                details: that.item.details,
                deadline: that.item.deadline,
                // image: that.item.image,
            })
            .then(function (response) {
                that.$notify({group: 'app', type: 'success', text: response.data.message});
            })
            .catch(e => {
                if (e.response) {
                    that.$store.commit('setErrors', e.response.data.errors);
                    that.$notify({group: 'app', type: 'error', text: e.response.data.message});
                }
            });
        },
        deleteRecord() {
            if(confirm("هل تريد بالتأكيد أرشفة هذا المشروع ؟")){
                this.deleteIte()
            }
        },
        deleteIte(){
            var that = this;
            axios.delete('projects/'+that.project.id, { params:{
                id : that.project.id
            }})
            .then(function (response) {
                that.$notify({group: 'app',type: 'success',text: response.data.message});
                that.$router.push({ name: 'home'})
            });
        },
    }
}
</script>



