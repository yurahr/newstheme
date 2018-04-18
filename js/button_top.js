$(document).ready(function() {
	$("#back-top").hide();
	$(window).scroll(function() {
		if ($(this).scrollTop() > 200) {
			$('#back-top').fadeIn();
		} else {
			$('#back-top').fadeOut();
		}
	});

	$('#back-top').click(function() {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
});