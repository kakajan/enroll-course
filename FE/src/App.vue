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
html,
body {
  overscroll-behavior-y: contain !important;
}
.bg {
  background:#28123b url("bg.webp") no-repeat center top;
  background-size: cover;
}
body {
  background: #28123b
}
.morabba {
  font-family: "Morabba" !important;
}
.iransans {
  font-family: "IRANSansXFaNum" !important;
}
.r35 {
  border-radius: 35px;
  overflow: hidden!important;
}
.r56 {
  border-radius: 56px;
  overflow: hidden!important;
}
.bg-glass,.q-field__inner{
  background: rgba(255, 255, 255, 0.21);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(5.1px);
  -webkit-backdrop-filter: blur(5.1px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}
.q-field__inner{
  border-radius: 56px;
}
.q-field__label, .q-field--float .q-field__label{
  color: rgb(43, 47, 87)
}
.q-field__messages div {
  color: black!important;
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity .5s
}

.fade-enter,
.fade-leave-to {
    opacity: 0
}
.scale{
  width: 420px;
  height: 450px;
}
.noScrollBody {
  overflow-y: hidden;
}
</style>
