<template>
  <div class="overview">
  <hero-component></hero-component>
<products-component></products-component>
    
  </div>
</template>

<script>
export default {
  name: "Overview",
  props: {
    msg: String
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
</style>