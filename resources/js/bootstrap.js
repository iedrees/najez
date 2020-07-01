import 'alpinejs';

var Turbolinks = require("turbolinks")
Turbolinks.start()

document.addEventListener("turbolinks:click", function(event) {
    NProgress.start();
});
document.addEventListener("turbolinks:load", function(event) {
    NProgress.done();
    NProgress.remove();
});
 