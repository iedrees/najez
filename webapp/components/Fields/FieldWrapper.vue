<template>
        <div class="bg-gray-100 p-2 py-1 rounded sm:max-w-3xl mb-1 last:mb-0 sm:flex sm:items-center">
            <label for="name" class="block text-sm font-bold leading-5 text-gray-500 p-2 sm:w-48"> {{label}} </label>
            <div class="bg-gray-400 p-1 w-full rounded mt-1">
                <slot />
                <div class="text-xs text-gray-400 leading-2 p-1" v-if="help">{{help}}</div>
 
            </div>            
        </div>
</template>

<script>
export default {
    props: ['label', 'help', 'ltr'],  
}
</script>
 