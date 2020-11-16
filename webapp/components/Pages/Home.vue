<template>
  <div class="bg-cool-gray-100 pb-20 min-h-screen">
  <AppPage>

    <div class="my-10 container mx-auto">
        <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 px-3 sm:px-0">
            <WeeklyDoneTasksWidget />

            <MyTasksWidget />
        </div>
    </div>

    <ProjectList />
  </AppPage>
  </div>
</template>

<script>
    export default {
        metaInfo: {
            title: 'لوحة التحكم'
        },
    }
</script>
