<template>
    <AppPage>
        <br>
        <br>
        <h4 class="border-b-2 border-cool-gray-300 p-2 mb-2 text-cool-gray-500 font-bold flex items-center">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ml-1 -mt-2 h-5 w-6 text-cool-gray-400"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span class="mx-2"> اعدادات الملف الشخصي  </span>
        </h4>
        <TextField v-model="item.name" model="name" label="الاسم " placeholder="الاسم"/>
        <TextField v-model="item.username" model="username" label="اسم المستخدم " placeholder="اسم المستخدم"/>
        <TextField v-model="item.employee_num" model="employee_num" label="الرقم الوظيفي" placeholder="الرقم الوظيفي"/>
        <TextField v-model="item.employee_ext" model="employee_ext" label="رقم التحويله " placeholder="رقم التحويله"/>
        <TextField v-model="item.email" model="email" label="البريد الالكتروني" :ltr="true" placeholder="البريد الالكتروني"/>
        <PrimaryButton @save="save" class="mt-3"> حفظ</PrimaryButton>
     </AppPage>
</template>

<script>

export default {

    metaInfo() {
        return {title: 'الإعدادات - ' + this.$store.state.user.name}
    },
    data() {
        return {
            loading: false,

        }
    },
    computed: {
        item: function () {
            return this.$store.state.user
        }
    },
    methods: {

        save() {
            var that = this;
            // that.loading = true;
            axios.patch('my-profile', {
                name: that.item.name,
                username: that.item.username,
                employee_num: that.item.employee_num,
                employee_ext: that.item.employee_ext,
                email: that.item.email,
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
    }
}
</script>



