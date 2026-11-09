(function($) {

	"use strict";

//Update Header Style and Scroll to Top
function headerStyle() {
	if($('.header-style-four').length){
		var windowpos = $(window).scrollTop();
		var siteHeader = $('.header-style-four');
		var scrollLink = $('.scroll-to-top');

		var HeaderHight = $('.header-style-four').height();
		if (windowpos >= HeaderHight) {
			siteHeader.addClass('fixed-header');
			scrollLink.fadeIn(300);
		} else {
			siteHeader.removeClass('fixed-header');
			scrollLink.fadeOut(300);
		}

	}
}

headerStyle();


//Submenu Dropdown Toggle
if($('.header-style-four li.dropdown ul').length){
	$('.header-style-four li.dropdown').append('<div class="dropdown-btn"><span class="fas fa-angle-down fa-fw"></span></div>');

	//Dropdown Button
	$('.header-style-four li.dropdown .dropdown-btn').on('click', function() {
		$(this).prev('ul').slideToggle(500);
	});

	//Disable dropdown parent link
	$('.navigation li.dropdown > a').on('click', function(e) {
		e.preventDefault();
	});

}


// Add Current Class Auto
function dynamicCurrentMenuClass(selector) {
	let FileName = window.location.href.split("/").reverse()[0];

	selector.find("li").each(function () {
		let anchor = $(this).find("a");
		if ($(anchor).attr("href") == FileName) {
			$(this).addClass("current");
		}
	});
	// if any li has .current elmnt add class
	selector.children("li").each(function () {
		if ($(this).find(".current").length) {
			$(this).addClass("current");
		}
	});
	// if no file name return
	if ("" == FileName) {
		selector.find("li").eq(0).addClass("current");
	}
}

if ($('.header-style-four .header-lower .main-menu .navigation').length) {
	dynamicCurrentMenuClass($('.header-style-four .header-lower .main-menu .navigation'));
}


//Header Search
if($('.search-box-outer').length) {
	$('.search-box-outer').on('click', function() {
		$('body').addClass('search-active');
	});
	$('.close-search').on('click', function() {
		$('body').removeClass('search-active');
	});

	$('.search-popup .color-layer').on('click', function() {
		$('body').removeClass('search-active');
	});
}



// Mobile Nav Hide Show
if($('.mobile-menu').length){

	//$('.mobile-menu .menu-box').mCustomScrollbar();

	var mobileMenuContent = $('.header-style-four .nav-outer .main-menu').html();
	$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
	$('.sticky-header .main-menu').append(mobileMenuContent);

	//Hide / Show Submenu
	$('.mobile-menu .navigation > li.dropdown > .dropdown-btn').on('click', function(e) {
		e.preventDefault();
		var target = $(this).parent('li').children('ul');

		if ($(target).is(':visible')){
			$(this).parent('li').removeClass('open');
			$(target).slideUp(500);
			$(this).parents('.navigation').children('li.dropdown').removeClass('open');
			$(this).parents('.navigation').children('li.dropdown > ul').slideUp(500);
			return false;
		}else{
			$(this).parents('.navigation').children('li.dropdown').removeClass('open');
			$(this).parents('.navigation').children('li.dropdown').children('ul').slideUp(500);
			$(this).parent('li').toggleClass('open');
			$(this).parent('li').children('ul').slideToggle(500);
		}
	});

	//3rd Level Nav
	$('.mobile-menu .navigation > li.dropdown > ul  > li.dropdown > .dropdown-btn').on('click', function(e) {
		e.preventDefault();
		var targetInner = $(this).parent('li').children('ul');

		if ($(targetInner).is(':visible')){
			$(this).parent('li').removeClass('open');
			$(targetInner).slideUp(500);
			$(this).parents('.navigation > ul').find('li.dropdown').removeClass('open');
			$(this).parents('.navigation > ul').find('li.dropdown > ul').slideUp(500);
			return false;
		}else{
			$(this).parents('.navigation > ul').find('li.dropdown').removeClass('open');
			$(this).parents('.navigation > ul').find('li.dropdown > ul').slideUp(500);
			$(this).parent('li').toggleClass('open');
			$(this).parent('li').children('ul').slideToggle(500);
		}
	});

	//Menu Toggle Btn
	$('.mobile-nav-toggler').on('click', function() {
		$('body').addClass('mobile-menu-visible');
	});

	//Menu Toggle Btn
	$('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
		$('body').removeClass('mobile-menu-visible');
		$('.mobile-menu .navigation > li').removeClass('open');
		$('.mobile-menu .navigation li ul').slideUp(0);
	});

	$(document).keydown(function(e){
		if(e.keyCode == 27) {
			$('body').removeClass('mobile-menu-visible');
		$('.mobile-menu .navigation > li').removeClass('open');
		$('.mobile-menu .navigation li ul').slideUp(0);
		}
	});
}


	//Accordion Box
	if($('.accordion-box').length){
		$(".accordion-box").on('click', '.acc-btn', function() {

			var outerBox = $(this).parents('.accordion-box');
			var target = $(this).parents('.accordion');

			if($(this).hasClass('active')!==true){
				$(outerBox).find('.accordion .acc-btn').removeClass('active');
			}

			if ($(this).next('.acc-content').is(':visible')){
				return false;
			}else{
				$(this).addClass('active');
				$(outerBox).children('.accordion').removeClass('active-block');
				$(outerBox).find('.accordion').children('.acc-content').slideUp(300);
				target.addClass('active-block');
				$(this).next('.acc-content').slideDown(300);
			}
		});
	}



	//Tabs Box
	if($('.tabs-box').length){
		$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));

			if ($(target).is(':visible')){
				return false;
			}else{
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				$(target).fadeIn(300);
				$(target).addClass('active-tab');
			}
		});
	}



	//Progress Bar
	if($('.progress-line').length){
		$('.progress-line').appear(function(){
			var el = $(this);
			var percent = el.data('width');
			$(el).css('width',percent+'%');
		},{accY: 0});
	}




/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */

   $(window).on('scroll', function() {
		headerStyle();
	});

	/* ==========================================================================
	When document is loading, do
	========================================================================== */

	$(window).on('load', function() {

	});

})(window.jQuery);