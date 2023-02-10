<template>
  <q-page class="flex flex-center bg">
    <q-card class="r35 bg-glass scale">
      <transition-group name="fade">
        <q-card-section key="form" v-if="!done" class="text-center scale">
          <img style="height: 60px; margin-top: -5px" src="~assets/logo.svg" />
          <q-separator inset />
          <h1 class="text-h6 text-weight-light morabba text-white text-center">
            ثبت نام مهمان فول استک
            <span class="text-h4 text-orange text-weight-bold iransans"
              >11</span
            >
          </h1>
          <q-list>
            <q-item>
              <q-item-section class="q-gutter-y-sm">
                <q-input
                  autofocus
                  v-model="fullName"
                  input-class="text-black"
                  color="grey-10"
                  rounded
                  outlined
                  dense
                  label="نام و نام خانوادگی"
                  :rules="[
                    (val) => !!val || 'این فیلد ضروری است',
                    (val) =>
                      val.length > 3 || 'نام شما باید حد اقل 3 کاراکتر باشد',
                  ]"
                  lazy-rules
                  @blur="nameResetValidation"
                  ref="nameRef"
                  @keyup.enter="$refs.phoneRef.focus()"
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
                  color="grey-10"
                  rounded
                  dense
                  outlined
                  label="شماره همراه"
                  @keypress.enter="sendRequest"
                  @blur="phoneResetValidation"
                  ref="phoneRef"
                />
                <q-btn
                  unelevated
                  color="light-blue-9"
                  label="ثبت نام"
                  rounded
                  icon="how_to_reg"
                  :disable="loading"
                  :loading="loading"
                  @click="sendRequest"
                >
                  <lottie-player
                    src="click.json"
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
        <q-card-section
          key="success"
          v-else
          class="flex flex-center text-center scale"
        >
          <q-list>
            <q-item>
              <q-item-section class="q-gutter-y-sm">
                <lottie-player
                  src="done.json"
                  background="transparent"
                  speed="0.9"
                  style="width: 300px; height: 300px; margin-top: -90px"
                  autoplay
                ></lottie-player>
                <h2 class="text-body2 text-white" style="margin-top: -90px">
                  ثبت نام شما با موفقیت انجام شد!<br />
                  اطلاعات ورود برایتان ارسال خواهد شد.
                </h2>
                <q-btn
                  @click="goUrl"
                  label="اطلاعات بیشتر"
                  color="pink-7"
                  class="full-width"
                  rounded
                  unelevated
                />
              </q-item-section>
            </q-item>
          </q-list>
        </q-card-section>
      </transition-group>
    </q-card>
    <div class="full-width text-body1 text-center absolute-bottom q-pb-lg">
      <a class="text-white" href="https://devcasts.org/?p=3698" target="_blank"
        >ثبت نام در دوره برنامه نویس فول استک 11</a
      >
    </div>
  </q-page>
</template>

<script>
import axios from "axios";
import { defineComponent, ref } from "vue";
import { useQuasar } from "quasar";

export default defineComponent({
  name: "IndexPage",
  setup() {
    const $q = useQuasar();
    const fullName = ref("");
    const phone = ref("");
    const phoneRef = ref(null);
    const nameRef = ref(null);
    const loading = ref(false);
    const done = ref(false);
    const doneWait = ref(false);
    return {
      fullName,
      phone,
      phoneRef,
      nameRef,
      loading,
      done,
      doneWait,
      goUrl () {
        window.location.href='https://devcasts.org/?p=3698'
      },
      sendRequest() {
        loading.value = true;
        phoneRef.value.validate();
        nameRef.value.validate();
        if (phoneRef.value.hasError || nameRef.value.hasError) {
          loading.value = false;
          $q.notify({
            classes: "r35 red-glass",
            message: "لطفا اطلاعات ورودیو چک کنید",
            position: "top",
            progress: true,
            actions: [
              {
                icon: "close",
                color: "white",
                handler: () => {},
              },
            ],
          });
        } else {
          axios
            .post("https://api.ay7.ir/api/reg", {
              phone: phone.value,
              fullName: fullName.value,
            })
            .then((r) => {
              loading.value = false;
              if (r.data === 1) {
                done.value = true;
                setTimeout(() => {
                  doneWait.value = true;
                }, 600);
              } else {
                r.data.forEach((element) => {
                  $q.notify({
                    classes: "r35 red-glass",
                    message: element.error,
                    position: "top",
                    progress: true,
                    actions: [
                      {
                        icon: "close",
                        color: "white",
                        handler: () => {},
                      },
                    ],
                  });
                });
              }
            });
        }
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
