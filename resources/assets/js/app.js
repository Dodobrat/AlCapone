window.Popper = require('popper.js');
global.$ = global.jQuery = require('jquery');
global.AOS = require('aos');

// ADD STYLE TO NAVBAR AFTER SCROLL

window.onscroll = function() {scrollFunction()};

let navigation = document.querySelector('.navigation');

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navigation.classList.add('shrunk');
    } else {
        navigation.classList.remove('shrunk');
    }
}

// PARALLAX EFFECT
