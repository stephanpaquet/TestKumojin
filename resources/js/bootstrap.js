window._ = require('lodash');
window.moment = require('moment');

try {
    require('bootstrap');
} catch (e) {
    console.log(e)
}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

