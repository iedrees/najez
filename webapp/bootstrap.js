window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;
axios.defaults.withCredentials = true;
window.axios.defaults.baseURL = '/api';
