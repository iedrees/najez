<template>
        <div class="bg-cool-gray-100 p-2 py-1 rounded mb-1 last:mb-0 sm:flex sm:items-center">
            <label for="name" class="block text-sm font-bold leading-5 text-gray-500 p-2 sm:w-48"> {{label}} </label>
            <div class="bg-gray-100 p-1 w-full rounded mt-1">
                <input
                    autocomplete="off"
                    :value="value"
                    @input="$emit('input', $event.target.value)"
                    :placeholder="placeholder"
                    :dir="ltr ? 'ltr' : 'rtl'"
                    :class="{'border-red-500 bg-red-50': $store.state.errors[model]}"
                    @keyup="$store.commit('clearErrorKey', model)"
                    :type="type"
                    class="block w-full py-3 px-3  text-gray-800 font-boldborder-gray-300 focus:bg-blue-50 rounded shadow-sm focus:outline-none border focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">

                <div class="text-xs text-gray-400 leading-2 p-1" v-if="help">{{help}}</div>
                <show-form-error :field="model" />
            </div>
        </div>
</template>

<script>
export default {
    props: ['value', 'model', 'name',  'label', 'placeholder','type', 'validationErrors', 'help', 'ltr'],
}
</script>
