require('./bootstrap');

import store from './store'
import router from './router';
import VueMeta from 'vue-meta'
import Multiselect from 'vue-multiselect'
import Notifications from 'vue-notification'

window.Vue = require('vue');

Vue.use(VueMeta, {
    keyName: 'metaInfo',
    attribute: 'data-vue-meta',
    ssrAttribute: 'data-vue-meta-server-rendered',
    tagIDKeyName: 'vmid',
    refreshOnceOnNavigation: true
  })
 Vue.component('Spinner', require('vue-simple-spinner'));
 Vue.component('multiselect', Multiselect)
 Vue.use(Notifications)

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const app = new Vue({
    el: '#app',
    store,
    router,
    mounted() {
      this.getUser();
    },
    methods: {
      getUser(){
          var that = this;
          axios.get('user/getCurrentUser').then(function (response) {
            that.$store.commit('updateUser', response.data);
          });
      },
    }
});
