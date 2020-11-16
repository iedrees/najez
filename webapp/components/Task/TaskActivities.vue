<template>
    <div>
        <div v-if="activities && activities.length" class="mt-3 p-2">
            <div v-for="activity in activities" :key="activity.id" class="bg-blue-50 rounded p-2 mb-0.5 text-gray-600">
                <div class="flex justify-between">
                    <span v-if="activity.causer">
                        <img class="inline-block h-5 w-5 rounded-full" :src="activity.causer.image" alt="" />
                        <span class="text-sm">{{activity.causer.name}}</span>
                    </span>
                    <span class="p-1 inline-block px-1 text-sm text-gray-300 flex items-center">
                        <span dir="ltr" class="text-xs" title="activity.created_at">{{activity.created_at}}</span>
                    </span>
                </div>
                <div class="text-sm">
                    {{activity.description}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['activities']
    }
</script>
 