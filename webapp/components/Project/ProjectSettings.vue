<template>
    <div>
        <TextField v-model="item.name" model="name" label="اسم المشروع" placeholder="اسم المشروع"/>
        <TextField v-model="item.status" model="status" label="حاله المشروع" placeholder="حاله المشروع"/>
        <TextField v-model="item.details" model="details" label="تفاصيل المشروع" placeholder="تفاصيل المشروع"/>
        <TextField v-model="item.deadline" model="deadline" label="موعد تسليم المشروع" placeholder="موعد تسليم المشروع"
                   type="date"/>
        <div>
            <div class="bg-cool-gray-100 p-2 py-1 rounded mb-1 last:mb-0 sm:flex sm:items-center">
                <label for="name" class="block text-sm font-bold leading-5 text-gray-500 p-2 sm:w-48"> صوره المشروع </label>
                <div class=" cursor-pointer h-32 w-32 rounded">
                <img class="h-32 w-32 rounded-sm"
                     :src="item.image" alt=""/>
                </div>
            </div>
        </div>
        <br>
        <PrimaryButton @save="save" class="mt-3"> حفظ</PrimaryButton>
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
        loadimage() {
            var that = this;
            axios.patch('projects/' + that.$route.params.id, {
                image: that.item.image,
            })
        },
    }
}
</script>



