import "./bootstrap";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import PrimeVue from "primevue/config";
import Aura from "@primevue/themes/aura";
import ToastService from 'primevue/toastservice';
import "primeicons/primeicons.css";

createInertiaApp({
    title: (title) => `myNotes | ${title}`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(ToastService)
            .use(PrimeVue, {
                theme: {
                    preset: Aura,
                    options: {
                        prefix: "p",
                        darkModeSelector: ".my-app-dark",
                        cssLayer: false
                    },
                },
                options: {
                    cssLayer: {
                        name: "primevue",
                        order: "tailwind-base, primevue, tailwind-utilities",
                    },
                },
            })
            .mount(el);
    },
});