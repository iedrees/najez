<template>
  <div>
      {{project.name}} قائمة المهام .. 
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
 