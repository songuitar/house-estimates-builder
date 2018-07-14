<template>
  <div id="app">
   <router-view></router-view>
  </div>
</template>

<script>

export default {
  name: 'app'
}
</script>

<style lang="scss">
  html, .app-container, .app-container-row, #app { height:100%; }
  body { position:absolute; top:0; bottom:0; right:0; left:0; }
.sidebar {
  background-color: #CCCCCC;
}

</style>
