<template>
  <q-page class="flex flex-center bg">
    <q-card class="r35 bg-glass">
      <q-card-section class="text-center">
        <img style="height: 65px; margin-top: 25px" src="~assets/logo.svg" />
        <q-list>
          <q-item>
            <q-item-section avatar>
              <img src="signup.png" />
            </q-item-section>
            <q-item-label class="text-h5 text-weight-bold morabba text-white">
              ثبت نام مهمان فول استک
              <span class="text-h4 text-black text-weight-bolder">11</span>
            </q-item-label>
          </q-item>
          <q-item>
            <q-item-section class="q-gutter-y-md">
              <q-input
                v-model="fullName"
                input-class="text-black"
                color="indigo-10"
                rounded
                outlined
                label="نام و نام خانوادگی"
                :rules="[(val) => !!val || 'این فیلد ضروری است', val => val.length > 3 || 'نام شما باید حد اقل 3 کاراکتر باشد']"
                lazy-rules
                @blur="nameResetValidation"
                ref="nameRef"
              />
              <q-input
                :rules="[
                  (v) =>
                    /^[9]{1}[0-9]{9}$/.test(v) || 'شماره موبایل اشتباه است',
                ]"
                v-model="phone"
                mask=" # # #  # # #  # # # #"
                unmasked-value
                lazy-rules
                input-class="text-black"
                dir="ltr"
                suffix="98+"
                type="tel"
                color="indigo-10"
                rounded
                outlined
                label="شماره همراه"
                @keypress.enter="sendRequest"
                @blur="phoneResetValidation"
                ref="phoneRef"
              />
              <q-btn
                unelevated
                color="purple-9"
                label="ثبت نام"
                icon-right="rocket_launch"
                rounded
                size="lg"
              />
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
  setup() {
    const fullName = ref("");
    const phone = ref("");
    const phoneRef = ref(null);
    const nameRef = ref(null);
    return {
      fullName,
      phone,
      phoneRef,
      nameRef,
      sendRequest() {},
      nameResetValidation() {
        if (fullName.value === "") {
          nameRef.value.resetValidation();
        } else {
          nameRef.value.validate();
        }
      },
      phoneResetValidation() {
        if (phone.value === "") {
          phoneRef.value.resetValidation();
        } else {
          phoneRef.value.validate();
        }
      },
    };
  },
});
</script>
