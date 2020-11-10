<template>
  <div>
      {{project.name}} الإعددادادادات
  </div>
</template>

<script>
export default {
    props: ['project'],
    metaInfo () {
        return { title: 'الإعدادات - ' + this.project.name}
    },
}
</script>
 