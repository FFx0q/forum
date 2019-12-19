<template>
  <div id="app">
    <Header />
    <router-view></router-view>
  </div>
</template>

<script>
import Header from "@/components/Header.vue";
export default {
  name: "App",
  components: {
    Header,
  }
}
</script>

<style lang="scss">
  body {
    color:#ddd;
    word-wrap: break-word;
    margin: 0;
    font: 16px/26px "Open Sans", sans-serif;
    background:#222;
  }
  .container {
    max-width: 1250px;
    width: 90%;
    margin: 0 auto;
  }
  a {
    color: #fff;
    & {
      text-decoration: none;

    }
  }
</style>
