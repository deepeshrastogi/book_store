import { createApp } from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store/store'
import '../public/frontend/css/styles.css'
import '../public/frontend/js/all.min.js'
import '../public/frontend/js/bootstrap.bundle.min.js'
import '../public/frontend/js/scripts.js'

const app = createApp(App);
app.use(store);
app.use(router)
app.mount("#app");
