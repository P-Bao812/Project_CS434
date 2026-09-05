<template >
  <component :is="layout">
    <router-view></router-view>
  </component>
</template>
<script>
const layout_default = 'Guest'
export default {
  computed:{
    layout(){
      return(this.$route.meta.layout || layout_default) + '-layout'
    }
  }
}
</script>
<style >

</style>
