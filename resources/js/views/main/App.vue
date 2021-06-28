<template>
  <div>
    <NavBar />
    <div class="container-md py-3">
      <router-view />
    </div>
  </div>
</template>
<script>
import NavBar from "./components/NavBar.vue";
export default {
  name: "App",
  components: { NavBar },
};
</script>
