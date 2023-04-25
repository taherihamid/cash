$(document).ready(function(){
	var widthwin = $(window).width();
	if(widthwin<=767){
		$("[flickity]").attr('data-flickity','{ "contain": true, "pageDots": false, "rightToLeft": true, "prevNextButtons": false, "freeScroll": true, "cellAlign": "left", "groupCells": 1 }');
		$(".mobileSlider").attr('data-flickity','{ "contain": true, "pageDots": false, "rightToLeft": true, "prevNextButtons": false, "freeScroll": true, "cellAlign": "left", "groupCells": 1 }');
		//$("#wrraper #article ul").attr('data-flickity','{ "contain": true, "pageDots": false, "rightToLeft": true, "prevNextButtons": false, "freeScroll": true, "cellAlign": "left", "groupCells": 1 }');
		var parentproduct = ("#wrraper #product #content .indent .rightSide img");
	}
	if(widthwin>=767){
		var height = $(window).height();
		$("#wrraper #banner .item").css({"height":height+"px"});
		$("#wrraper #banner img").addClass("center");
	}

	$("#wrraper #webService #content ul li").each(function(){
		var color = $(this).attr("color");
		$(this).closest("li").find(".icons i").css({"border-color":color});
		$(this).closest("li").find(".icons i").css({"color":color});
		$(this).closest("li").find("a").css({"background":color});
	});

	$("#wrraper #webService #content ul li").hover(function(){
		var color = $(this).attr("color");
		$(this).closest("li").css({"background":color});
	}).mouseleave(function(){
		$(this).closest("li").css({"background":"#FFF"});
	});

});
