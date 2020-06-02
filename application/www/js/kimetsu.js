/*VARIABLES*/


/*FONCTIONS*/
jQuery(function()
{
	$(function ()
	{
		$(window).scroll(function ()
		{
			if ($(this).scrollTop() > 1000 )
			{
				$('#up').css('right','10px');
			} else
			{
				$('#up').removeAttr( 'style' );
			}
		});
	});
});



$('.hchar').on('mouseover', function(){
	$('.hchars').removeClass('hide');
});

$('.hchars').on('mouseout', function(){
	$('.hchars').addClass('hide');
});

$('.user').on('mouseover', function(){
	$('.users').removeClass('hide');
});

$('.users').on('mouseout', function(){
	$('.users').addClass('hide');
});

if (window.location.href.indexOf('/oeuvres') != -1) {
	$('.menu__item--current').removeClass('menu__item--current');
	$('#home').addClass('menu__item--current');
}

if (window.location.href.indexOf('/persos') != -1) {
	$('.menu__item--current').removeClass('menu__item--current');
	$('.persos').addClass('menu__item--current');
	console.log('persos');
}

$('.persos').on('click', () => {
	$('.produit').addClass('display');
	$('.video').addClass('display');
	$('.userInfos').addClass('display');
	$('.perso').toggleClass('display');
	console.log('ok');
});

$('.produits').on('click', () => {
	$('.perso').addClass('display');
	$('.video').addClass('display');
	$('.userInfos').addClass('display');
	$('.produit').toggleClass('display');
	console.log('ok2');
});

$('.videos').on('click', () => {
	$('.produit').addClass('display');
	$('.perso').addClass('display');
	$('.userInfos').addClass('display');
	$('.video').toggleClass('display');
	console.log('ok3');
});

$('.usersInfos').on('click', () => {
	$('.produit').addClass('display');
	$('.video').addClass('display');
	$('.perso').addClass('display');
	$('.userInfos').toggleClass('display');
	console.log('ok4');
});