'use strict';

let basket = new Basket();

$('.addToBasket').on('click', function(event){
  event.preventDefault();
  let id = $(this).data('id');
  // console.log(id);
  let name = $(this).data('name');
  // console.log(name);
  let price = $(this).data('price');
  // console.log(price);
  let quantity = $('#product-'+id).val();
  // console.log(quantity);
  if(isNaN(quantity) || quantity == '' || quantity <= 0) {
    $('#errorPopUp').removeClass('hide');
    $('#product-'+id).val('');
  } else {
    basket.addBasket(id, name, quantity, price);
    $('#productPopUp').removeClass('hide');
    $('#productNumber').text(quantity);
    $('#product-'+id).val('');
  }
});

$('.closePopUp').on('click', function() {
  $('#productPopUp').addClass('hide');
  $('#errorPopUp').addClass('hide');
});

$('.empty').on('click', function() {
  basket.clearBasket();
  // console.log('ok');
});

if (window.location.href.indexOf('/basket') != -1) {

  basket.displayBasketAll();
  $(document).on('click','.trash', function(event) {
    event.preventDefault();
    let id = $(this).data('index');
    console.log(id);
    basket.removeBasket(id);
  });
}

if(window.location.href.indexOf('/payment') != -1) {

  basket.loadBasketInput('#orders');
}

if(window.location.href.indexOf('/sucess') != -1) {

  basket.clearBasket();
}

if(window.location.href.indexOf('/products?product') != -1) {
  console.log('ok');
}

//PERMET DE TROUVER LES PARAMETRE DE URL
let url_string = window.location.href;
let url = new URL(url_string);
let params = url.searchParams.get("artworkId");
console.log(params);
//let urlpara = window.location.search;
//const urlParams = new URLSearchParams(urlpara);
//let artwork = urlParams.get('artworkId');
//console.log(artwork);
if (params == 2) {
  $('#haut').css('background', 'url(../ressources/images/bg/' + params + '/bg.jpg)');
} else {
  console.log('nope');

}
