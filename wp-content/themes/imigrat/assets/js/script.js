/* -----------------------------------------------------------------------------



File:           JS Core
Version:        1.0
Last change:    00/00/00
-------------------------------------------------------------------------------- */
(function ($) {
  "use strict";

	var Imigrat = {
		init: function() {
			this.Basic.init();
		},

		Basic: {
			init: function() {

				this.BackgroundImage();
				this.Animation();
				this.StickyHeader();
				this.MobileMenu();
				this.counterUp();
				this.scrollTop();
				this.TwinMax();
				this.searchPopUp();
				this.MainSlider_1();
				this.SkillProgress();
			},

			BackgroundImage: function (){
				$('[data-background]').each(function() {
					$(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
				});
			},
			Animation: function (){
				if($('.wow').length){
					var wow = new WOW(
					{
						boxClass:     'wow',
						animateClass: 'animated',
						offset:       0,
						mobile:       true,
						live:         true
					}
					);
					wow.init();
				}
			},
			StickyHeader: function (){
				jQuery(window).on('scroll', function() {
					if (jQuery(window).scrollTop() > 250) {
						jQuery('.imi-header-section').addClass('sticky-on')
					} else {
						jQuery('.imi-header-section').removeClass('sticky-on')
					}
				});
				jQuery(document).ready(function (o) {
					0 < o(".navSidebar-button").length &&
					o(".navSidebar-button").on("click", function (e) {
						e.preventDefault(), e.stopPropagation(), o(".info-group").addClass("isActive");
					}),
					0 < o(".close-side-widget").length &&
					o(".close-side-widget").on("click", function (e) {
						e.preventDefault(), o(".info-group").removeClass("isActive");
					}),
					o(".xs-sidebar-widget").on("click", function (e) {
						e.stopPropagation();
					})
				});
			},
			MobileMenu: function (){
				$('.open_mobile_menu').on("click", function() {
					$('.mobile_menu_wrap').toggleClass("mobile_menu_on");
				});
				$('.open_mobile_menu').on('click', function () {
					$('body').toggleClass('mobile_menu_overlay_on');
				});
				if($('.mobile_menu li.dropdown ul').length){
					$('.mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="far fa-arrow-right"></span></div>');
					$('.mobile_menu li.dropdown .dropdown-btn').on('click', function() {
						$(this).prev('ul').slideToggle(500);
					});
				}
				$(".dropdown-btn").on("click", function () {
					$(this).toggleClass("toggle-open");
				});
			},
			counterUp: function (){
				$(document).on('click', '.accordion-item', function(){
					$(this).addClass('faq_bg').siblings().removeClass('faq_bg')
				});
			},
			scrollTop: function (){
				$(window).on("scroll", function() {
					if ($(this).scrollTop() > 200) {
						$('.scrollup').fadeIn();
					} else {
						$('.scrollup').fadeOut();
					}
				});

				$('.scrollup').on("click", function()  {
					$("html, body").animate({
						scrollTop: 0
					}, 800);
					return false;
				});
				jQuery('.video_box').magnificPopup({
					disableOn: 200,
					type: 'iframe',
					mainClass: 'mfp-fade',
					removalDelay: 160,
					preloader: false,
					fixedContentPos: false,
				});
				$('.zoom-gallery').magnificPopup({
					delegate: 'a',
					type: 'image',
					closeOnContentClick: false,
					closeBtnInside: false,
					mainClass: 'mfp-with-zoom mfp-img-mobile',
					gallery: {
						enabled: true
					},
					zoom: {
						enabled: true,
						duration: 300,
						opener: function(element) {
							return element.find('img');
						}
					}
				});
			},
			TwinMax: function (){
				var $circleCursor = $(".cursor");

				function moveCursor(e) {
					var t = e.clientX + "px",
					a = e.clientY + "px";
					TweenMax.to($circleCursor, .2, {
						left: t,
						top: a,
						ease: "Power1.easeOut"
					})
				}

				function zoomCursor(e) {
					TweenMax.to($circleCursor, .1, {
						scale: 3,
						ease: "Power1.easeOut"
					}), $($circleCursor).removeClass("cursor-close")
				}

				function closeCursor(e) {
					TweenMax.to($circleCursor, .1, {
						scale: 3,
						ease: "Power1.easeOut"
					}), $($circleCursor).addClass("cursor-close")
				}

				function defaultCursor(e) {
					TweenLite.to($circleCursor, .1, {
						scale: 1,
						ease: "Power1.easeOut"
					}), $($circleCursor).removeClass("cursor-close")
				}
				$(window).on("mousemove", moveCursor),
				$("a, button, .zoom-cursor").on("mouseenter", zoomCursor),
				$(".trigger-close").on("mouseenter", closeCursor),
				$("a, button, .zoom-cursor, .trigger-close, .trigger-plus").on("mouseleave", defaultCursor);
			},
			searchPopUp: function (){
				$('.search-btn').on('click', function() {
					$('.search-body').toggleClass('search-open');
				});
			},
			MainSlider_1: function (){

				var	tpj = jQuery;
					if(window.RS_MODULES === undefined) window.RS_MODULES = {};
					if(RS_MODULES.modules === undefined) RS_MODULES.modules = {};
					RS_MODULES.modules["revslider321"] = {once: RS_MODULES.modules["revslider321"]!==undefined ? RS_MODULES.modules["revslider321"].once : undefined, init:function() {
						window.revapi32 = window.revapi32===undefined || window.revapi32===null || window.revapi32.length===0  ? document.getElementById("rev_slider_32_1") : window.revapi32;
						if(window.revapi32 === null || window.revapi32 === undefined || window.revapi32.length==0) { window.revapi32initTry = window.revapi32initTry ===undefined ? 0 : window.revapi32initTry+1; if (window.revapi32initTry<20) requestAnimationFrame(function() {RS_MODULES.modules["revslider321"].init()}); return;}
						window.revapi32 = jQuery(window.revapi32);
						if(window.revapi32.revolution==undefined){ revslider_showDoubleJqueryError("rev_slider_32_1"); return;}
						revapi32.revolutionInit({
								revapi:"revapi32",
								DPR:"dpr",
								sliderLayout:"fullwidth",
								visibilityLevels:"1240,1024,778,480",
								gridwidth:"1320,1024,778,480",
								gridheight:"790,768,560,500",
								perspective:600,
								perspectiveType:"global",
								editorheight:"790,768,560,500",
								responsiveLevels:"1240,1024,778,480",
								progressBar:{disableProgressBar:true},
								navigation: {
									wheelCallDelay:1000,
									onHoverStop:false,
									bullets: {
										enable:true,
										tmp:"",
										style:"persephone",
										v_offset:30
									}
								},
								viewPort: {
									global:false,
									globalDist:"-200px",
									enable:false
								},
								fallbacks: {
									allowHTML5AutoPlayOnAndroid:true
								},
						});

					}};
			},



			SkillProgress: function (){
				if ($(".progress-bar").length) {
					var $progress_bar = $('.progress-bar');
					$progress_bar.appear();
					$(document.body).on('appear', '.progress-bar', function() {
						var current_item = $(this);
						if (!current_item.hasClass('appeared')) {
							var percent = current_item.data('percent');
							current_item.css('width', percent + '%').addClass('appeared').parent().append('<span>' + percent + '%' + '</span>');
						}

					});
				}
			}

		}
	};

	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('#preloader').length){
			$('#preloader').delay(200).fadeOut(500);
		}
	}

	/* ==========================================================================
   When document is ready, do
   ========================================================================== */
	jQuery(document).ready(function (){
		Imigrat.init();
	});

	/* ==========================================================================
   When document is loaded, do
   ========================================================================== */
	$(window).on('load', function() {
		handlePreloader();
	});

})(jQuery);
