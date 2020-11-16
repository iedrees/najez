<template>
  <div>

      <TaskList :projectId="project.id"  />

  </div>
</template>

<script>
export default {
    props: ['project'],
    metaInfo () {
        return { title: 'المهام - ' + this.project.name}
    },
}
</script>
