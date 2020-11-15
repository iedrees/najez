<template>
    <div class="bg-cool-gray-200 min-h-screen">
        <notifications group="app" position="top center" width="100%" />

        <AppNavbar />
       <router-view></router-view>
    </div>
</template>

<script>
    export default {
        metaInfo () {
            return {
                titleTemplate: '%s | '+ this.$store.state.info.title
            }
        }
    }
</script>

<style lang="scss">
    // body{
    //     font-family: 'Cairo', sans-serif;
    // }
    .icon-field {
        font-size: 18px;
    }
    .vue-notification {
        padding: 15px;
        margin: 2px;
        right: auto;
        left:0px;
        cursor: pointer;
        font-size: 14px;
        opacity: 0.95;
        color: #ffffff;
        background: #44A4FC;
        border-left: 0px solid #187FE7;
        direction: rtl;
        text-align: right;
        width: 350px;
        border-radius: 5px;

        &.warn {
            background: #ffb648;
            border-left-color: #f48a06;
        }

        &.error {
            background: #E54D42;
            border-left-color: #B82E24;
        }

        &.success {
            background: #68CD86;
            border-left-color: #42A85F;
        }
    }

</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

