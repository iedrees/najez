<template>
 
        <button type="button"
            
            @click="save"
            class="inline-flex items-center justify-center py-2 px-4 text-sm leading-5 rounded-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none transition duration-150 ease-in-out"
            v-bind="$attrs"
            >
            <i class="ti-save me-2 inline-block"></i>
            <slot>حفظ</slot>
        </button>
   
</template>

<script>
export default {
    inheritAttrs: false,
    props: ['btn'],
    methods: {
        save() {
            this.$emit('save');
        },
    }
}
</script>