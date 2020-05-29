'use strict';

let basket = new Basket();

$('.addToBasket').on('click', function (event) {
  event.preventDefault();
  let id = $(this).data('id');
  // console.log(id);
  let name = $(this).data('name');
  // console.log(name);
  let price = $(this).data('price');
  // console.log(price);
  let quantity = $('#product-' + id).val();
  // console.log(quantity);
  if (isNaN(quantity) || quantity == '' || quantity <= 0) {
    $('#errorPopUp').removeClass('hide');
    $('#product-' + id).val('');
  } else {
    basket.addBasket(id, name, quantity, price);
    $('#productPopUp').removeClass('hide');
    $('#productNumber').text(quantity);
    $('#product-' + id).val('');
  }
});

$('.closePopUp').on('click', function () {
  $('#productPopUp').addClass('hide');
  $('#errorPopUp').addClass('hide'); 
  $('#infoPopUp').addClass('hiden');
});

$('.empty').on('click', function () {
  basket.clearBasket();
  // console.log('ok');
});

if (window.location.href.indexOf('/basket') != -1) {

  basket.displayBasketAll();
  $(document).on('click', '.trash', function (event) {
    event.preventDefault();
    let id = $(this).data('index');
    console.log(id);
    basket.removeBasket(id);
  });
}

if (window.location.href.indexOf('/payment') != -1) {

  basket.loadBasketInput('#orders');
}

if (window.location.href.indexOf('/sucess') != -1) {

  basket.clearBasket();
}

if (window.location.href.indexOf('/products?product') != -1) {
  console.log('ok');
}

$('#list1').on('click', ()=>{
  $('#product').addClass('display');
  $('#stream').addClass('display');
  $('#userInfo').addClass('display');
  $('#artworks').toggleClass('display');
  //console.log('ok');
});

$('#products').on('click', ()=>{
  $('#artworks').addClass('display');
  $('#stream').addClass('display');
  $('#userInfo').addClass('display');
  $('#product').toggleClass('display');
});

$('#streaming').on('click', ()=>{
  $('#product').addClass('display');
  $('#artworks').addClass('display');
  $('#userInfo').addClass('display');
  $('#stream').toggleClass('display');
});

$('#users').on('click', ()=>{
  $('#product').addClass('display');
  $('#stream').addClass('display');
  $('#artworks').addClass('display');
  $('#userInfo').toggleClass('display');
});

//PERMET DE TROUVER LES PARAMETRE DE URL
let url_string = window.location.href;
let url = new URL(url_string);
let params = url.searchParams.get("artworkId");
//console.log(params);
//let urlpara = window.location.search;
//const urlParams = new URLSearchParams(urlpara);
//let artwork = urlParams.get('artworkId');
//console.log(artwork);
//PERMET DE CHANGER LE BG EN FONCTION DE URL
let currentBg = $('#haut').css('background');
let j = 1;
for (let i = 0; i <= variable.length; i++) {
  console.log(j);
  if (params == j) {
    let newurl = currentBg.replace('images/tanjiro_nezu.png', 'images/bg/' + j + '/bg.jpg');
    $('#haut').css('background', newurl);
  }
  j++;
}
if (params == 3) {
  $('#haut').css('background-position-y', '30px');
} else if (params == 4) {
  $('#haut').css('background-position-y', '60px');
} else if (params == 6) {
  $('#haut').css('background-position-y', '50px');
} else if (params == 4 || params == 8 || params == 9) {
  $('#haut').css('background-position', 'top');
} else if (params == 10) {
  $('#haut').css('background-position-y', '105px');
}



if (window.location.href.indexOf('/index') != -1 || window.location.href.indexOf('/Streaming-World') != 1) {
  $('.menu__item--current').removeClass('menu__item--current');
  $('#home').addClass('menu__item--current');
} 

if (window.location.href.indexOf('/products') != -1) {
  $('.menu__item--current').removeClass('menu__item--current');
  $('#products').addClass('menu__item--current');
  console.log('product');
}

if (window.location.href.indexOf('/streaming') != -1) {
  $('.menu__item--current').removeClass('menu__item--current');
  $('#streaming').addClass('menu__item--current');
} 

if (window.location.href.indexOf('/users') != -1) {
  $('.menu__item--current').removeClass('menu__item--current');
  $('#user').addClass('menu__item--current'); 
  $('#users').addClass('menu__item--current');
}


//console.log(currentMenu);

