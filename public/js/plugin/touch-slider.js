$(document).ready(function(){
	$(".carousel").swiperight(function() {  
		$(this).carousel('prev');  
	});  
	$(".carousel").swipeleft(function() {  
		$(this).carousel('next');  
	});
});