<template>
    <div v-if="open">
        <div class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center z-50" style="z-index:9999999 !important">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <header class="px-3 bg-whitex bg-cool-gray-100 py-3">
                    <div class="flex items-start justify-between">
                        <slot name="header"> 
                            <h2 class="text-md px-2 leading-7 font-bold text-cool-gray-700">
                                <slot name="title"> {{title}} </slot>
                            </h2>
                        
                            <div class="h-7 flex items-center">
                                <button @click="close"  aria-label="Close panel" class="text-cool-gray-500 hover:text-gray-600 transition ease-in-out duration-150 focus:outline-none">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </slot>
                    </div>
                </header>
                <div class="w-full mx-auto text-center px-2 sm:p-1 sm:pb-4">
                    
                        <slot>
                            ..
                        </slot> 
                    
                </div>
                <div v-if="!hideFooter" class="bg-whitex px-4 py-4 sm:flex  justify-between">
                    <slot name="footer">
                        <span class=" flex w-full rounded-md shadow-sm  sm:w-auto">
                            <button @click="close" type="button" class="inline-flex justify-center w-full rounded-sm border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                إلغاء 
                            </button>
                        </span>
                        <span class="flex w-full rounded-md shadow-sm sm:ms-2 sm:w-auto mt-3 sm:mt-0">
                            <button type="button" @click="save"  class="inline-flex justify-center w-full rounded-sm border border-transparent px-5 py-2 bg-blue-600 hover:bg-blue-500 text-base leading-6 font-medium text-white shadow-sm  focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                حفظ
                            </button>
                        </span>
                    </slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'modal',
        props: ['open', 'title', 'hideFooter'],
        methods: {
            close() {
                this.$emit('close');
            },
            save() {
                this.$emit('save');
            },
        }
    }
</script>