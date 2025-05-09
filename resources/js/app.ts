import './bootstrap';
import * as Vue from 'vue';
import type { DefineComponent, Plugin } from 'vue';
import { createInertiaApp, type InertiaAppProps, type InertiaApp } from '@inertiajs/inertia-vue3';

createInertiaApp({
  resolve: async (name: string): Promise<DefineComponent> => {
    const pages = import.meta.glob('./Pages/**/*.vue');
    const page = await pages[`./Pages/${name}.vue`]?.();

    const resolved = typeof page === 'function' ? await page() : page;
    return resolved.default as DefineComponent;
  },
  setup({ el, app, props, plugin }: { 
    el: Element; 
    app: InertiaApp; 
    props: InertiaAppProps; 
    plugin: Plugin 
  }) {
    Vue.createApp({ render: () => Vue.h(app, props) })
      .use(plugin)
      .mount(el);
  },
});
