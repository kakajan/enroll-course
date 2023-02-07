<template>
  <q-page class="flex flex-center bg">
    <q-card class="r35 bg-glass">
      <q-card-section>
        <q-list>
          <q-item>
            <q-item-section avatar>
              <img src="signup.png" />
            </q-item-section>
            <q-item-label class="text-h5 text-weight-bold morabba text-indigo-10 q-pt-sm">
              ثبت نام مهمان فول استک <span class="text-h4 text-black text-weight-bolder">11</span>
            </q-item-label>
          </q-item>
        </q-list>
      </q-card-section>
      <q-card-section>
        <q-input label="نام و نام خانوادگی" />
      </q-card-section>
    </q-card>
  </q-page>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "IndexPage",
});
</script>
