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



// Get DOM Elements
let imgTriggers = document.getElementsByClassName('card-img-top menu-list-item-card-img');
let btnTriggers = document.getElementsByClassName('menu-list-item-card-add-btn');
let modal = document.querySelector('#my-modal');
let closeBtn = document.querySelector('.menu-modal-close');

imgTriggers = Array.from(imgTriggers);
btnTriggers = Array.from(btnTriggers);

// Events

imgTriggers.forEach(function (imgTrigger) {
    imgTrigger.addEventListener('click',function () {
        modal.style.display = 'flex';
        console.log(imgTrigger.dataset.modal);
    });
});

btnTriggers.forEach(function (btnTrigger) {
    btnTrigger.addEventListener('click',function () {
        modal.style.display = 'flex';
        console.log(btnTrigger.dataset.modal);
    });
});

closeBtn.addEventListener('click', closeModal);
window.addEventListener('click', outsideClick);


// Close
function closeModal() {
    modal.style.display = 'none';
}

// Close If Outside Click
function outsideClick(e) {
    if (e.target == modal) {
        modal.style.display = 'none';
    }
}


