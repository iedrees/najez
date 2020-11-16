<template>
    <div>

        <TextField v-model="item.name" model="name" label="الاسم " placeholder="الاسم"/>
        <TextField v-model="item.username" model="username" label="اسم المستخدم " placeholder="اسم المستخد"/>
        <TextField v-model="item.employee_num" model="employee_num" label="الرقم الوظيفي" placeholder="الرقم الوظيفي"/>
        <TextField v-model="item.employee_ext" model="employee_ext" label="رقم التحويله " placeholder="رقم التحويله"/>
        <TextField v-model="item.email" model="email" label="البريد الالكتروني" placeholder="البريد الالكتروني"
                   type="date"/>
        <PrimaryButton @save="save" class="mt-3"> حفظ</PrimaryButton>
    </div>
</template>

<script>
import FieldWrapper from "../Fields/FieldWrapper";
import TextField from "../Fields/TextField";

export default {
    components: {FieldWrapper, TextField},
    props: ['user'],
    metaInfo() {
        return {title: 'الإعدادات - ' + this.user.name}
    },
    data() {
        return {
            loading: false,
            logo: null,
        }
    },
    computed: {
        item: function () {
            return this.user
        }
    },
    methods: {
        getData() {
            var that = this;
            that.loading = true;
            // users: [],
            //     axios.get('my-profile')
            //         .then(function (response) {
            //             that.loading = false;
            //             that.users = response.data.data;
            //         });
        },
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



