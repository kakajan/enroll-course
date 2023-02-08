<template>
  <q-page class="flex flex-center bg">
    <q-card class="r35 bg-glass">
      <q-card-section v-if="!done" class="text-center">
        <img style="height: 65px; margin-top: 25px" src="~assets/logo.svg" />
        <q-list>
          <q-item>
            <q-item-section avatar>
              <img src="signup.png" />
            </q-item-section>
            <q-item-label class="text-h5 text-weight-light morabba text-white">
              ثبت نام مهمان فول استک
              <span class="text-h4 text-black text-weight-bold iransans"
                >11</span
              >
            </q-item-label>
          </q-item>
          <q-item>
            <q-item-section class="q-gutter-y-sm">
              <q-input
                autofocus
                v-model="fullName"
                input-class="text-black"
                color="indigo-10"
                rounded
                outlined
                label="نام و نام خانوادگی"
                :rules="[
                  (val) => !!val || 'این فیلد ضروری است',
                  (val) =>
                    val.length > 3 || 'نام شما باید حد اقل 3 کاراکتر باشد',
                ]"
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
                color="pink-7"
                label="ثبت نام"
                rounded
                size="lg"
                icon="how_to_reg"
                :disable="loading"
                :loading="loading"
                @click="sendRequest"
              >
                <lottie-player
                  src="https://assets2.lottiefiles.com/packages/lf20_HW7ZtQ.json"
                  background="transparent"
                  speed="0.7"
                  style="
                    position: absolute;
                    left: -35px;
                    bottom: -50px;
                    width: 150px;
                    height: 150px;
                  "
                  loop
                  autoplay
                ></lottie-player>
              </q-btn>
            </q-item-section>
          </q-item>
        </q-list>
      </q-card-section>
      <q-card-section v-else class="flex flex-center text-center">
        <lottie-player
          src="https://assets3.lottiefiles.com/packages/lf20_z4bjtbpj.json"
          background="transparent"
          speed="0.7"
          style="width: 300px; height: 300px"
          loop
          autoplay
        ></lottie-player>
      </q-card-section>
    </q-card>
  </q-page>
</template>

<script>
import axios from "axios";
import { defineComponent, ref } from "vue";

export default defineComponent({
  name: "IndexPage",
  setup() {
    const fullName = ref("");
    const phone = ref("");
    const phoneRef = ref(null);
    const nameRef = ref(null);
    const loading = ref(false);
    const done = ref(false);
    return {
      fullName,
      phone,
      phoneRef,
      nameRef,
      loading,
      done,
      sendRequest() {
        loading.value = true;
        axios
          .post("https://api.ay7.ir/api/reg", {
            phone: phone.value,
            fullName: fullName.value,
          })
          .then((r) => {
            loading.value = false;
            done.value = true;
          });
      },
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
