$(document).ready(function(){
	var widthwin = $(window).width();

	// Tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Persia lang
	$("[lang='fa']").not("[lang='en']").persiaNumber('ar');
	$("input[type=text]").persiaNumber('ar');


	$('#notificationModal .material-icons').click(function(){
		$('#notificationModal').addClass('closed');
	});

	const navigate = $('header .navigate').html();
	$('#nav-mobile .content .content-body').html(navigate);
	$('#nav-mobile .content .content-body .home').remove();
	$('#nav-mobile .content .content-body .fa-angle-left').removeClass().addClass('fa fa-caret-down');

	$('#nav-mobile .content .content-body ul li .labels').click(function (e) {
		e.preventDefault();
		$(this).closest('li').find('#dropDown').first().toggle();
		if($(this).attr('href')){
			let href = $(this).attr('href');
			let txt = $(this).text();
			$(this).closest('li').find('.more').remove();
			$($(this).closest('li').find('#dropDown').first()).prepend(`<a class="more" href="${href}"><li>${txt}</li></a>`);
		}
	});

	$('#topbar #nav ul li').hover(function(){
		var menu = $(this).find("#dropDown:first");
		if(menu.is(":visible")){
			menu.hide();
		} else {
            menu.show();
		}
	});

	$("#nav-mobile .content .content-body ul li .title").click(function(){
		$(this).toggleClass('show');
		var target = $(this).parent("li").find(".dropmenu:first");
		if(target.is(":visible")){
			target.slideUp();
		} else {
			target.slideDown();
		}
	});

	$("header #mobile button").click(function(){
		$("#modalNavigate").show();
		$("#nav-mobile").removeClass().addClass('showed');
	});

	$("#modalNavigate").click(function(e){
		var container = $("#nav-mobile");
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			$("#nav-mobile").removeClass().addClass('hiddenn');
			$("#modalNavigate").delay(400).fadeOut(10);
		}
	});

	$("#nav-mobile").swipe( {
		swipe:function(event, direction) {
			if(direction=="right"){
				$("#nav-mobile").removeClass().addClass('hiddenn');
				$("#modalNavigate").delay(400).fadeOut(10);
			}
		}
	});

	String.prototype.replaceAll = function(search, replacement) {
		var target = this;
		return target.replace(new RegExp(search, 'g'), replacement);
	};
	String.prototype.toPersianCharacter =  function () {
		var string = this;
		var obj = {
			'ك' :'ک',
			'دِ': 'د',
			'بِ': 'ب',
			'زِ': 'ز',
			'ذِ': 'ذ',
			'شِ': 'ش',
			'سِ': 'س',
			'ى' :'ی',
			'ي' :'ی'
		};

		Object.keys(obj).forEach(function(key) {
			string = string.replaceAll(key, obj[key]);
		});
		return string
	};
	// $("#wrraper").find("p, h3, span, h1, h2, b").each(function(){
	// 	var test = $(this).text().toPersianCharacter();
	// 	$(this).text(test)
	// });

	$(document).mouseleave(function (e){
		var container = $("header #topbar #nav ul li #dropDown");
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			if(container.is(":visible")){
				container.hide();
			}
		}
	});

});

// نوتیفیکیشن
function notiModal(texts, x, links){
	var myModal = $('#notificationModal');
	myModal.removeClass('closed');
	myModal.show(0,function(){
		myModal.find("span").text(texts);
		var style;

		if(x){ style="success";
		} else { style="alert"; }

		if(links){
			myModal.find('a').remove();
			myModal.append('<a href="'+links['url']+'" title="'+links['caption']+'">'+links['caption']+'</a>');
		}

		myModal.addClass(style);

		clearTimeout(myModal.data('hideInterval'));
		myModal.data('hideInterval', setTimeout(function(){
			myModal.addClass('closed');
		}, 7000));
	});

}

$(window).scroll(function(){
	var widthwin = $(window).width();
	if(widthwin>767){
		var scrolls = $(window).scrollTop();
		if(scrolls>1){
			$("header #topbar").addClass("fixed");
		} else {
			$("header #topbar").removeClass("fixed");
		}
	}

	var height = $(window).height();
	var scroll = $(document).scrollTop()+height;

	$("[lazy]").each(function(){
		var section = $(this).offset().top;
		if(scroll>=section){
			$(this).addClass("effect");
		} else {
			$(this).removeClass("effect");
		}
	});

});

$(document).on('keyup',function(evt) {
	if (evt.keyCode == 27) {
		$("#contactModal").modal("hide");
	}
});
