
require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify';
import VModal from 'vue-js-modal';

Vue.use(Vuetify);
Vue.use(VModal);

Vue.component('post-create-view', require('./pages/PostCreateView.vue').default);
Vue.component('post-edit-view', require('./pages/PostEditView.vue').default);

Vue.component('user-create-view', require('./pages/UserCreateView.vue').default);
Vue.component('user-edit-view', require('./pages/UserEditView.vue').default);

Vue.component('post-delete-modal', require('./components/PostDeleteModal.vue').default);
Vue.component('user-delete-modal', require('./components/UserDeleteModal.vue').default);

const app = new Vue({
    el: '#app',

    data: {
        drawer: true
    }
});
