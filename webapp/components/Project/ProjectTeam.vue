<template>
  <div>
      {{project.name}}  فريق العمل .. 
  </div>
</template>

<script>
export default {
    props: ['project'],
    metaInfo () {
        return { title: 'فريق العمل - ' + this.project.name}
    },
}
</script>
 