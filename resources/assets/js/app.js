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

// BASKET TRIGGER
let basket = document.getElementById('basket');
let basketM = document.getElementById('basket-m');
let shoppingCart = document.querySelector('.shopping-cart-wrapper');
let opened = false;

function triggerBasket() {
    basket.addEventListener('click', function () {
        if (opened == false){
            shoppingCart.classList.add('shopping-cart-show');
            opened = true;
        }else{
            shoppingCart.classList.remove('shopping-cart-show');
            opened = false;
        }

    });
    basketM.addEventListener('click', function () {
        if (opened == false){
            shoppingCart.classList.add('shopping-cart-show');
            opened = true;
        }else{
            shoppingCart.classList.remove('shopping-cart-show');
            opened = false;
        }

    });
}
triggerBasket();

// MENU CATEGORIES


// MENU PAGE GET SLUG FROM CATEGORY
let links = document.getElementsByClassName('menu-category-link' );

links = Array.from(links);

links.forEach(function (link) {
    link.addEventListener('click',function () {
        // gets slug on pressed tab
        console.log(link.dataset.slug);
    });
});

