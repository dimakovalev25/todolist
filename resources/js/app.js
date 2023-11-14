/*
import './bootstrap';
import('../css/app.css')
import {createApp} from 'vue'

import App from './App.vue'

createApp(App).mount("#app")
*/


import { createApp } from 'vue'
import App from './App.vue'
import('../css/app.css')
import './bootstrap';

import { library } from '@fortawesome/fontawesome-svg-core'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { faUserSecret } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faUserSecret)

createApp(App)
    .component('font-awesome-icon', FontAwesomeIcon)
    .mount('#app')