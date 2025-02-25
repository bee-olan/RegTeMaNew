require('../css/app.scss');
require('../js/modal');
require('../js/mobileNav');
require('../js/textarea');

require('bootstrap');
require('@coreui/coreui');

const Centrifuge = require('centrifuge');
const toastr = require('toastr');

document.addEventListener('DOMContentLoaded', function () {

    let url = document.querySelector('meta[name=centrifugo-url]').getAttribute('content');

    // if (typeof url !== "undefined") {
    // }
    let user = document.querySelector('meta[name=centrifugo-user]').getAttribute('content');
    let token = document.querySelector('meta[name=centrifugo-token]').getAttribute('content');
    let centrifuge = new Centrifuge(url);
    centrifuge.setToken(token);
    centrifuge.subscribe('alerts#' + user, function (message) {
        toastr.info(message.data.message);
    });
    centrifuge.connect();
});