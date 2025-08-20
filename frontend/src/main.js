import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from '@/router/router.js';
import PrimeVue from 'primevue/config';

const app = createApp(App); // ✅ store in variable
app.use(router);            // ✅ register router before mount
app.mount('#app');   
app.use(PrimeVue);