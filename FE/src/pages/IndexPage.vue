<template>
  <q-page class="flex flex-center bg">
    <q-card class="r35 bg-glass">
      <q-card-section>
        <q-list>
          <q-item>
            <q-item-section avatar>
              <img src="signup.png" />
            </q-item-section>
            <q-item-label class="text-h5 text-weight-bold morabba text-white q-pt-sm">
              ثبت نام مهمان فول استک <span class="text-h4 text-black text-weight-bolder">11</span>
            </q-item-label>
          </q-item>
          <q-item>
            <q-item-section class="q-gutter-y-md">
              <q-input v-model="fullName" input-class="text-black" color="indigo-10" class="bg-glass r56" rounded outlined label="نام و نام خانوادگی" />
              <q-input maxlength="10" input-class="text-black" dir="ltr" suffix="98+" type="tel" color="indigo-10" class="bg-glass r56" rounded outlined label="شماره همراه" />
              <q-btn unelevated color="purple-8" label="ثبت نام" icon-right="rocket_launch" rounded size="lg" />
            </q-item-section>
          </q-item>
        </q-list>
      </q-card-section>
    </q-card>
  </q-page>
</template>

<script>
import { defineComponent, ref } from "vue";

export default defineComponent({
  name: "IndexPage",
  setup () {
    const fullName = ref(null)
    return {
      fullName
    }
  }
});
</script>
