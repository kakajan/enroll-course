<template>
  <router-view />
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "App",
});
</script>
<style>
.bg {
  background: url("bg.webp") no-repeat center top;
  background-size: cover;
}
.morabba {
  font-family: "Morabba" !important;
}
.r35 {
  border-radius: 35px;
}
.bg-glass {
  background: rgba(255, 255, 255, 0.21);
  border-radius: 16px;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(5.1px);
  -webkit-backdrop-filter: blur(5.1px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}
</style>
