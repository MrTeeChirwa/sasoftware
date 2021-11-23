<template>
  <div id="app">
    <Navigation />
    <EmployerList />
  </div>
</template>

<script>
import Navigation from "./components/Navigation.vue";
import EmployerList from "./components/EmployeeList.vue";

export default {
  created() {},
  name: "App",
  components: {
    Navigation,
    EmployerList,
  },
};
</script>
