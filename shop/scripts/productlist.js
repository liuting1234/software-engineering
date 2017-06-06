/**
 * 
 */

$(function(){
	$('.product-list dd').mouseover(function(){
		$(this).children('.infor').slideDown('slow');
	}).mouseleave(function(){
		$(this).children('.infor').slideUp();
	});
});