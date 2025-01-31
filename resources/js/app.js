import "./bootstrap";
// import "../css/app.css";/
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { createBootstrap } from "bootstrap-vue-next";

import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue-next/dist/bootstrap-vue-next.css";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./vue/Pages/**/*.vue", { eager: true });

        return pages[`./vue/Pages/${name}.vue`];
    },
    title: (title) => (title ? `${title} - App` : "App"),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(createBootstrap())
            .mount(el);
    },
});
