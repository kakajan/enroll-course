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
  overflow: hidden!important;
}
.r56 {
  border-radius: 56px;
  overflow: hidden!important;
}
.bg-glass {
  background: rgba(255, 255, 255, 0.21);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(5.1px);
  -webkit-backdrop-filter: blur(5.1px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}
.q-field__label, .q-field--float .q-field__label{
  color: white
}
</style>
