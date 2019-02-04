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
let productsContainer = document.getElementById('products-container');

links = Array.from(links);

links.forEach(function (link) {
    link.addEventListener('click',function () {

        let catSlug = link.dataset.slug;
        let catRoute = link.dataset.url;

        $.ajaxSetup({
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: catRoute,
            method: 'post',
            data: {
                category_slug: catSlug,
            },
            beforeSend: function() {
                $(".load-container").show();
            },

            success: function(result) {
                if (result.errors.length != 0) {
                    $('.alert-danger').html('');

                    $.each(result.errors, function (key, value) {

                    });
                } else {
                    window.history.pushState('obj', 'newtitle', catSlug);
                    $(".load-container").hide();
                    productsContainer.innerHTML = result.new_blade;
                }
            }
        });
    });
});



// Get DOM Elements
let imgTriggers = document.getElementsByClassName('card-img-top menu-list-item-card-img');
let btnTriggers = document.getElementsByClassName('menu-list-item-card-add-btn');
let modal = document.querySelector('#my-modal');
let closeBtns = document.getElementsByClassName('menu-modal-close');

imgTriggers = Array.from(imgTriggers);
btnTriggers = Array.from(btnTriggers);
closeBtns = Array.from(closeBtns);

// Events

function openedModal(){
    modal.style.display = 'flex';
}

imgTriggers.forEach(function (imgTrigger) {
    imgTrigger.addEventListener('click',function () {

        let productId = imgTrigger.dataset.modal;
        let productUrl = imgTrigger.dataset.murl;

        $.ajaxSetup({
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: productUrl,
            method: 'post',
            data: {
                product_id: productId,
            },

            success: function(result) {
                if (result.errors.length != 0) {
                    $('.alert-danger').html('');

                    $.each(result.errors, function (key, value) {

                    });
                } else {
                    // window.history.pushState('obj', 'newtitle', catSlug);
                    window.innerHTML = result.new_blade;
                }
            }
        });
    });
});

btnTriggers.forEach(function (btnTrigger) {
    btnTrigger.addEventListener('click',function () {

        let productId = btnTrigger.dataset.modal;
        let productUrl = btnTrigger.dataset.murl;

        $.ajaxSetup({
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: productUrl,
            method: 'post',
            data: {
                product_id: productId,
            },

            success: function(result) {
                if (result.errors.length != 0) {
                    $('.alert-danger').html('');

                    $.each(result.errors, function (key, value) {

                    });
                } else {
                    // window.history.pushState('obj', 'newtitle', catSlug);
                    window.innerHTML = result.new_blade;
                }
            }
        });

    });
});


closeBtns.forEach(function (closeBtn) {
    closeBtn.addEventListener('click',function () {
        modal.style.display = 'none';
    });
});

window.addEventListener('click', outsideClick);

// Close If Outside Click
function outsideClick(e) {
    if (e.target == modal) {
        modal.style.display = 'none';
    }
}

// BACK TO TOP
$(document).ready(function(){
    // scroll body to 0px on click
    $('.back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
    });
});