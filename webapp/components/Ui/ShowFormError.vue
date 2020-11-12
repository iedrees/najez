<template>
    <form-error v-if="$store.state.errors[field]" :error-key="field" :errors="$store.state.errors">
        {{ $store.state.errors[field][0] }}
    </form-error>  
</template>

<script>
    export default {
        props: ['field']
    }
</script>

 