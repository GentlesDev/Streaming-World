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
