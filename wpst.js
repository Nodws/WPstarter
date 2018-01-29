(function ($) {

	console.log('WPstarter Loaded \n Newemage.com');
	
	var nav = $('.nav-container');
	var pos = nav.innerHeight() + 100;
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > pos) {
			nav.addClass("f-nav");
		} else {
			nav.removeClass("f-nav");
		}
	});

	 var wid = $(window).width();
 	$(".dropdown-item").on('click', function (e) {
		if (wid > 768 || $(this).next().hasClass('show')) {
				top.location = $(this).attr('href');
		}
		e.preventDefault();
		$(this).next('.dropdown-menu').addClass('show')
		return false;
 	});
}(jQuery));
