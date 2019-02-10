window.Popper = require('popper.js');
global.$ = global.jQuery = require('jquery');
global.AOS = require('aos');
global.Rellax = require('rellax/rellax.js');

// ADD PARALLAX EFFECT TO HEADER IMAGES
if(document.body.contains(document.querySelector('.rellax'))){
    var rellax = new Rellax('.rellax');
}


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
let cartWrapper = document.querySelector('.shopping-cart-wrapper');

function triggerBasket() {
    basket.addEventListener('click', function () {
        if (cartWrapper.classList.contains('shopping-cart-show')){
            cartWrapper.classList.remove('shopping-cart-show');
        }else{
            cartWrapper.classList.add('shopping-cart-show');
        }

    });
    basketM.addEventListener('click', function () {
        if (cartWrapper.classList.contains('shopping-cart-show')){
            cartWrapper.classList.remove('shopping-cart-show');
        }else{
            cartWrapper.classList.add('shopping-cart-show');
        }

    });

}
triggerBasket();


// MENU CATEGORIES


// MENU PAGE GET SLUG FROM CATEGORY
let link = document.querySelectorAll('.menu-category-link' );
let productsContainer = document.getElementById('products-container');


link.forEach(function (link) {
    link.addEventListener('click',function () {

        let catSlug = link.dataset.slug;
        let catRoute = link.dataset.url;
        let menuUrl = link.dataset.menu;

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
                    window.history.pushState({},"", menuUrl + '/' +catSlug);
                    $(".load-container").delay(500).hide();
                    productsContainer.innerHTML = result.new_blade;
                }
            }
        });
    });
});

let modal = document.querySelector('#my-modal');

if (document.body.contains(modal)){
    window.addEventListener('click', outsideClick);

    // Close If Outside Click
    function outsideClick(e) {
        if (e.target == modal) {
            modal.style.display = 'none';
        }
    }
}

// HOME PAGE ADD SPECIAL MEALS TO BASKET

// MENU PAGE GET SELECTED OPTION


// BACK TO TOP

$(document).ready(function(){
    // scroll body to 0px on click
    $('.back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
    });
});

