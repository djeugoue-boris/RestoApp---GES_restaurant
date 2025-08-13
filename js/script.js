
$(window).on('resize', function() {
	if(window.innerWidth > 600) {
		$('#menu_tool').trigger('click');
	}
});

$('#menu_close').on('click', function() {
	$('#app_menu').slideUp();
});

$('#menu_tool').on('click', function() {
	$('#app_menu').slideDown();
});

