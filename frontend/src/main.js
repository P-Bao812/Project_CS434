import { createApp } from "vue";
import { createPinia } from "pinia";
import Guest from "@/layout/wraper/indexGuest.vue";

import App from "./App.vue";
import router from "./router";

const app = createApp(App);

app.use(createPinia());
app.use(router);
app.component("Guest-layout", Guest);
app.mount("#app");
