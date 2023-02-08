<template>
  <q-layout view="lHh Lpr lFf">
    <q-page-container>
      <router-view v-slot="{ Component }">
        <transition
          @before-enter="beforeEnter"
          @after-enter="afterEnter"
          :appear="true"
          :enter-active-class="enterAnimation"
          :leave-active-class="leaveAnimation"
          mode="out-in"
        >
          <component :is="Component" />
        </transition>
      </router-view>
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, toRefs, reactive } from "vue";

export default defineComponent({
  name: "MainLayout",

  setup() {
    const state = reactive({
      leaveAnimation: "animated zoomOut",
      enterAnimation: "animated zoomIn",
    });
    return {
      ...toRefs(state),
      beforeEnter() {
        document.getElementsByTagName("body")[0].classList.add("noScrollBody");
      },
      afterEnter() {
        document
          .getElementsByTagName("body")[0]
          .classList.remove("noScrollBody");
      },
    };
  },
});
</script>
