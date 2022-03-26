import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import App from "./components/app.vue";
import { routes } from "./routes";


import axios from "axios";
import VueAxios from "vue-axios";

import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

require('./bootstrap');
const app = createApp(App);

app.use(router);
app.use(VueAxios, axios);

app.config.globalProperties.$axios = axios;

router.isReady().then(() => app.mount("#work"));


