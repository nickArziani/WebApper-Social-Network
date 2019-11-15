$(document).ready(function(){
	$('.img_ava').click(function(){
		$('.image').slideToggle();
	});
	$('.con_s').click(function(e){
		e.preventDefault();
		$('.cont_pop').css({
			display: 'block'
		});
		$(this).css({
			borderLeft: '7px solid red'
		});
	});
	$('#img').click(function(){
		$('.cont_pop').slideToggle();
	});
	$('.image img').click(function(){
		$('.image').slideToggle();
	});
	$('.but').click(function(){
		$('.load').delay( 1800 ).show();
	});
$(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('.up').slideDown();
        }
    });
    $('.up').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 600);
        $('.up').fadeToggle();
        return false;
    });
});
