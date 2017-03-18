"use strict";

function flexity_ajax_cart (el_qty) {
	var form = el_qty.closest('form');

	jQuery("<input type='hidden' name='update_cart' id='update_cart' value='1'>").appendTo(form);
	jQuery("<input type='hidden' name='is_cart_ajax' id='is_cart_ajax' value='1'>").appendTo(form);

	var matches = el_qty.attr('name').match(/cart\[(\w+)\]/);
	var cart_item_key = matches[1];
	form.append( jQuery("<input type='hidden' name='cart_item_key' id='cart_item_key'>").val(cart_item_key) );

	var formData = form.serialize();

	jQuery("a.checkout-button.wc-forward").addClass('disabled').html('Updating…');

	jQuery.post( form.attr('action'), formData, function(resp) {
			jQuery('.cart-collaterals').html(resp.html);

			el_qty.closest('.cart_item').find('.product-subtotal').html(resp.price);

			jQuery('#update_cart').remove();
			jQuery('#is_cart_ajax').remove();
			jQuery('#cart_item_key').remove();

			jQuery("a.checkout-button.wc-forward").removeClass('disabled').html(resp.checkout_label);
		},
		'json'
	);
}

function number_format (number, decimals, dec_point, thousands_sep) {
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? '' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

jQuery(document).ready(function ($) {

	// Modal Form
	$('.callback').fancybox({
		padding: 0,
		content: $('#modal-form'),
		helpers: {
			overlay: {
				locked: false
			}
		},
		tpl: {
			closeBtn: '<a title="Close" class="fancybox-item fancybox-close modal-form-close" href="javascript:;"></a>'
		}
	});


	// Fancybox Images
	$('.fancy-img').fancybox({
		padding: 0,
		margin: [60, 50, 20, 50],
		helpers: {
			overlay: {
				locked: false
			},
			thumbs: {
				width: 60,
				height: 60
			}
		},
		tpl: {
			closeBtn: '<a title="Close" class="fancybox-item fancybox-close modal-form-close2" href="javascript:;"></a>',
			prev: '<a title="Previous" class="fancybox-nav fancybox-prev modal-prev" href="javascript:;"><span></span></a>',
			next: '<a title="Next" class="fancybox-nav fancybox-next modal-next" href="javascript:;"><span></span></a>',
		}
	});

	// Modal Videos
	$(".flexity-gallery").on('click', ".flexity-gallery-video", function() {
		$.fancybox({
			'padding'       : 0,
			'autoScale'     : false,
			'transitionIn'  : 'none',
			'transitionOut' : 'none',
			'href'          : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
			'type'          : 'swf',
			'swf'           : {
				'wmode'             : 'transparent',
				'allowfullscreen'   : 'true'
			},
			tpl: {
				closeBtn: '<a title="Close" class="fancybox-item fancybox-close modal-form-close2" href="javascript:;"></a>'
			}
		});
		return false;
	});


	// BreadCrumbs
	if ($('#b-crumbs-menu').length > 0) {
		$('.b-crumbs-menu').on('click', '#b-crumbs-menu', function () {
			if ($(this).hasClass('opened')) {
				$(this).removeClass('opened');
				$(this).next('.b-crumbs-menulist').fadeOut(200);
			} else {
				$(this).addClass('opened');
				$(this).next('.b-crumbs-menulist').fadeIn(200);
			}
			return false;
		});
	}


	// Dropdown
	if ($('.dropdown-wrap').length > 0) {
		$('.dropdown-wrap').on('click', '.dropdown-title', function () {
			$('.dropdown-list').slideUp(200);
			if ($(this).hasClass('opened')) {
				$(this).removeClass('opened');
			} else {
				$('.dropdown-wrap .dropdown-title').removeClass('opened');
				$(this).addClass('opened');
				$(this).next('.dropdown-list').slideDown(200);
			}
			return false;
		});
		$('.cont').on('click', '.dropdown-wrap-range', function () {
			return false;
		});
		$('.dropdown-wrap .dropdown-list li').on('click', 'a', function () {
			$(this).closest('.dropdown-wrap').find('.dropdown-title').text($(this).text());
			if ($(this).attr('href') == '#') {
				$('.dropdown-list').slideUp(200);
				$('.dropdown-wrap .dropdown-title').removeClass('opened');
				return false;
			}
		});
	}

	if ($('.dropdown-wrap').length > 0 || $('#b-crumbs-menu').length > 0) {
		$('body').on('click', function () {
			if ($('#b-crumbs-menu').length > 0) {
				$('.b-crumbs-menulist').fadeOut(200);
				$('#b-crumbs-menu').removeClass('opened');
			}
			if ($('.dropdown-wrap').length > 0) {
				$('.dropdown-list').slideUp(200);
				$('.dropdown-wrap .dropdown-title').removeClass('opened');
			}
		});
	}

	// Top Menu Seacrh
	$('.header').on('click', '#header-searchbtn', function () {
		if ($(this).hasClass('opened')) {
			$(this).removeClass('opened');
			$('#header-search').fadeOut();
		} else {
			$(this).addClass('opened');
			$('#header-search').fadeIn();
		}
		return false;
	});


	// Top Menu
	$('.header').on('click', '#header-menutoggle', function () {
		if ($(this).hasClass('opened')) {
			$(this).removeClass('opened');
			$('#top-menu').fadeOut();
		} else {
			$(this).addClass('opened');
			$('#top-menu').fadeIn();
		}
		return false;
	});
	// Top SubMenu
	$('#top-menu').on('click', '.menu-item-has-children > a', function () {
		if ($(this).hasClass('opened')) {
			$(this).removeClass('opened');
			$(this).next('ul').slideUp();
		} else {
			$(this).addClass('opened');
			$(this).next('ul').slideDown();
		}
		return false;
	});


	// Section Menu
	if ($('#section-menu-btn').length > 0) {
		$('.section-top').on('click', '#section-menu-btn', function () {
			if ($(this).hasClass('opened')) {
				$(this).removeClass('opened').text('Catalog');
				$('#section-menu-wrap').fadeOut(200);
				$('.section-menu-overlay').fadeOut(200).remove();
			} else {
				$(this).addClass('opened').width($(this).width()).text('Close');
				$('#section-menu-wrap').fadeIn(200);
				$('body').append('<div class="section-menu-overlay"></div>');
				$('.section-menu-overlay').fadeIn(200);

				$('body').on('click', '.section-menu-overlay', function () {
					$('#section-menu-btn').removeClass('opened').text('Catalog');
					$('#section-menu-wrap').fadeOut(200);
					$('.section-menu-overlay').fadeOut(200).remove();
					return false;
				});
			}
			return false;
		});
	}


	// Filter Button
	if ($('#section-filter-toggle-btn').length > 0 && $('#section-filter .woof_redraw_zone').length > 0) {
		$('.section-filter-toggle').on('click', '#section-filter-toggle-btn', function () {
			if ($(this).parent().hasClass('filter_hidden')) {
				$(this).text($(this).data('hidetext')).parent().removeClass('filter_hidden');
				//$('#section-filter .woof_redraw_zone').slideDown();
				document.cookie = "filter_toggle=filter_opened; expires=Thu, 31 Dec 2020 23:59:59 GMT; path=/;";
			} else {
				$(this).text($(this).data('showtext')).parent().addClass('filter_hidden');
				//$('#section-filter .woof_redraw_zone').slideUp();
				document.cookie = "filter_toggle=filter_hidden; expires=Thu, 31 Dec 2020 23:59:59 GMT; path=/;";
			}

			return false;
		});
	}

	// Sticky sidebar
	if ($('#section-sb').length > 0 && $('#section-list-withsb').length > 0) {
		$('#section-sb, #section-list-withsb').theiaStickySidebar({
			additionalMarginTop: 30
		});
	}


	// Product Tabs
	$('.prod-tabs li').on('click', 'a', function () {
		if ($(this).parent().hasClass('prod-tabs-addreview') || $(this).parent().hasClass('active') || $(this).attr('data-prodtab') == '')
			return false;
		$('.prod-tabs li').removeClass('active');
		$(this).parent().addClass('active');

		// mobile
		$('.prod-tab-mob').removeClass('active');
		$('.prod-tab-mob[data-prodtab-num=' + $(this).parent().data('prodtab-num') + ']').addClass('active');

		$('.prod-tab-cont .prod-tab').hide();
		$($(this).attr('data-prodtab')).fadeIn();

		return false;
	});

	// Product Tabs (mobile)
	$('.prod-tab-cont').on('click', '.prod-tab-mob', function () {
		if ($(this).hasClass('active') || $(this).attr('data-prodtab') == '')
			return false;
		$('.prod-tab-cont .prod-tab-mob').removeClass('active');
		$(this).addClass('active');

		// main
		$('.prod-tabs li').removeClass('active');
		$('.prod-tabs li[data-prodtab-num=' + $(this).data('prodtab-num') + ']').addClass('active');

		$('.prod-tab-cont .prod-tab').slideUp();
		$($(this).attr('data-prodtab')).slideDown();
		return false;
	});

	$('.prod-tabs').on('click', '.prod-tabs-addreview', function () {
		if ($('.prod-tabs li.active a').attr('data-prodtab') == '#prod-tab-3') {
			$('html, body').animate({scrollTop: ($('.prod-tabs-wrap').offset().top - 10)}, 700);
		} else {
			$('.prod-tabs li').removeClass('active');
			$('#prod-reviews').addClass('active');
			$('.prod-tab-cont .prod-tab').hide();
			$('.prod-tab-cont .prod-tab.prod-reviews').fadeIn();
			$('html, body').animate({scrollTop: ($('.prod-tabs-wrap').offset().top - 10)}, 700);
		}

		$('#review_form_wrapper').fadeIn();

		return false;
	});

	if ($('.prod-tab #commentform #submit').length > 0) {
		var filterEmail  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,6})+$/;
		$('.prod-tab #commentform').on('click', '#submit', function () {
			var errors = false;
			if (!$(this).parents('#commentform').find('#rating').val()) {
				$('.prod-tab-addreview').addClass('error');
				errors = true;
			}
			$(this).parents('#commentform').find('input[type=text], input[type=email], textarea').each(function () {
				if ($(this).attr('id') == 'email'){
					if (!filterEmail.test($(this).val())) {
						$(this).addClass("redborder");
						errors++;
					}
					else {
						$(this).removeClass("redborder");
					}
					return;
				}
				if ($(this).val() == '') {
					$(this).addClass('redborder');
					errors++;
				} else {
					$(this).removeClass('redborder');
				}
			});

			if (errors)
				return false;
		});
	}

	// Show Properties
	$('.prod-cont').on('click', '#prod-showprops', function () {
		if ($('.prod-tabs li.active a').attr('data-prodtab') == '#prod-tab-2') {
			$('html, body').animate({scrollTop: ($('.prod-tabs-wrap').offset().top - 10)}, 700);
		} else {
			$('.prod-tabs li').removeClass('active');
			$('#prod-props').addClass('active');
			$('.prod-tab-cont .prod-tab').hide();
			$('#prod-tab-2').fadeIn();
			$('html, body').animate({scrollTop: ($('.prod-tabs-wrap').offset().top - 10)}, 700);
		}
		return false;
	});

	// Show Description
	$('.prod-cont').on('click', '#prod-showdesc', function () {
		if ($('.prod-tabs li.active a').attr('data-prodtab') == '#prod-tab-1') {
			$('html, body').animate({scrollTop: ($('.prod-tabs-wrap').offset().top - 10)}, 700);
		} else {
			$('.prod-tabs li').removeClass('active');
			$('#prod-desc').addClass('active');
			$('.prod-tab-cont .prod-tab').hide();
			$('#prod-tab-1').fadeIn();
			$('html, body').animate({scrollTop: ($('.prod-tabs-wrap').offset().top - 10)}, 700);
		}
		return false;
	});



	// Colors
	$('.prodv-colors ul').on('click', 'li', function () {
		if (!$(this).hasClass('active')) {
			$('.prodv-colors ul li').removeClass('active');
			$(this).addClass('active');
		}
		return false;
	});


	// Post Add Comment Form
	$('.post-comments').on('click', '#post-comments-add', function () {
		$('#post-addcomment-form').slideDown();
		return false;
	});


	// Events
	if ($("#blog-calendar").length > 0) {
		if (typeof eventData !== "undefined") {
			$("#blog-calendar").zabuto_calendar({
				action: function () {
					return myDateFunction(this.id);
				},
				today: true,
				nav_icon: {
					prev: '<i class="fa fa-caret-left"></i>',
					next: '<i class="fa fa-caret-right"></i>'
				},
				data: eventData,
			});
		}
	}


	// Select Styler
	/*if ($('.shipping-calculator-form select').length > 0) {
		$('.shipping-calculator-form select').styler({
			selectPlaceholder: 'Select'
		});
	}
	if ($('.prod-info .variations select').length > 0) {
		$('.prod-info .variations select').styler({
			selectPlaceholder: 'Select'
		});
	}
	if ($('.blog-sb-widget:not(.WOOF_Widget) select').length > 0) {
		$('.blog-sb-widget:not(.WOOF_Widget) select').styler({
			selectPlaceholder: 'Select'
		});
	}*/
	if ($('.prod-info .variations select').length > 0) {
		$('.prod-info .variations select').chosen({
			disable_search_threshold: 10
		});
	}
	if ($('.blog-sb-widget:not(.WOOF_Widget) select').length > 0) {
		$('.blog-sb-widget:not(.WOOF_Widget) select').chosen({
			disable_search_threshold: 10
		});
	}
	if ($('.shipping-calculator-form select').length > 0) {
		$('.shipping-calculator-form select').chosen({
			disable_search_threshold: 10
		});
	}


	// AJAX pagination scroll
	$('body.archive.woocommerce').on('click', 'ul.page-numbers a.page-numbers', function () {
		if ($('#woof_results_by_ajax').length > 0) {
			$('html, body').animate({scrollTop: $('#woof_results_by_ajax').offset().top - 30}, 800);
		}
	});

});


// Generate Front Filter Lines
/*function flexity_createLine(x1,y1, x2,y2, after_el){
	var length = Math.sqrt((x1-x2)*(x1-x2) + (y1-y2)*(y1-y2));
	var angle  = Math.atan2(y2 - y1, x2 - x1) * 180 / Math.PI;
	var transform = 'rotate('+angle+'deg)';

	var line = jQuery('<div>').insertAfter(after_el).addClass('line').css({
		'position': 'absolute',
		'transform': transform
	}).offset({left: x1, top: y1}).width(length);
	return line;
}*/

(function($) {
	jQuery(window).load(function(){

		// Front Filter
		/*if ($('#frontsearch-cont').length > 0) {
			for (var i = 1; i <= $('#frontsearch-cont').data('lines-count'); i++) {
				if ($('#frontsearch-cont .frontsearch-res' + i + ' span').length > 0) {
					flexity_createLine(
						($('#frontsearch-cont .frontsearch-res' + i + ' span').offset().left + 17),
						($('#frontsearch-cont .frontsearch-res' + i + ' span').offset().top + 9),
						($('#frontsearch-cont .frontsearch-point' + i).offset().left + 6),
						($('#frontsearch-cont .frontsearch-point' + i).offset().top + 6),
						('#frontsearch-cont .frontsearch-res' + i)
					);
				}
			}
			$(window).resize(function () {
				if ($('#frontsearch-cont .frontsearch-res' + i + ' span').length > 0) {
					$('#frontsearch-cont .line').remove();
					for (var i = 1; i <= $('#frontsearch-cont').data('lines-count'); i++) {
						flexity_createLine(
							($('#frontsearch-cont .frontsearch-res' + i + ' span').offset().left + 17),
							($('#frontsearch-cont .frontsearch-res' + i + ' span').offset().top + 9),
							($('#frontsearch-cont .frontsearch-point' + i).offset().left + 6),
							($('#frontsearch-cont .frontsearch-point' + i).offset().top + 6),
							('#frontsearch-cont .frontsearch-res' + i)
						);
					}
				}
			});
		}*/


		// Front Slider
		if ($('#front-slider').length > 0) {
			$('#front-slider').fractionSlider({
				'fullWidth': 			true,
				'controls': 			false,
				'pager': 				true,
				'responsive': 			true,
				'increase': 			false,
				'pauseOnHover': 		false,
				'dimensions': 			"1170,392",
			});
		}



		// Product Slider
		if ($('#prod-slider').length > 0) {
			$("#prod-thumbs").flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: false,
				slideshow: false,
				itemWidth: 97,
				itemMargin: 0,
				minItems: 4,
				maxItems: 4,
				asNavFor: '#prod-slider',
				start: function(slider){
					$("#prod-thumbs").resize();
				}
			});
			$('#prod-slider').flexslider({
				animation: "fade",
				animationSpeed: 500,
				slideshow: false,
				animationLoop: false,
				smoothHeight: false,
				controlNav: false,
				sync: "#prod-thumbs",
			});
		}

		// Slider "About Us"
		if ($('.content_carousel').length > 0) {
			$('.content_carousel').each(function () {
				if ($(this).data('slideshow_speed') != '') {
					var slideshow_speed =  $(this).data('slideshow_speed');
				} else {
					var slideshow_speed =  '7000';
				}
				if ($(this).data('animation_speed') != '') {
					var animation_speed =  $(this).data('animation_speed');
				} else {
					var animation_speed =  '600';
				}
				if ($(this).data('navigation') == true) {
					var navigation =  true;
				} else {
					var navigation =  false;
				}
				if ($(this).data('pagination') == true) {
					var pagination =  true;
				} else {
					var pagination =  false;
				}
				if ($(this).data('stop_on_hover') == true) {
					var stop_on_hover =  true;
				} else {
					var stop_on_hover =  false;
				}
				$('.content_carousel').flexslider({
					pauseOnHover: stop_on_hover,
					animationSpeed: animation_speed,
					slideshowSpeed: slideshow_speed,
					useCSS: false,
					directionNav: navigation,
					controlNav: pagination,
					animation: "fade",
					slideshow: false,
					animationLoop: true,
					smoothHeight: true
				});
			});
		}


		// Blog sliders
		if ($('.blog-slider').length > 0) {
			$('.blog-slider').flexslider({
				animation: "fade",
				animationSpeed: 500,
				slideshow: false,
				animationLoop: false,
				directionNav: false,
				smoothHeight: false,
				controlNav: true,
			});
		}
		if ($('.post-slider').length > 0) {
			$('.post-slider').flexslider({
				animation: "fade",
				animationSpeed: 500,
				slideshow: false,
				animationLoop: false,
				directionNav: false,
				smoothHeight: true,
				controlNav: true,
			});
		}

		// Slider "Testimonials"
		if ($('.testimonials-car').length > 0) {
			$('.testimonials-car').each(function () {
				var testimonials_slider;
				if ($(this).data('slideshow_speed') != '') {
					var slideshow_speed =  $(this).data('slideshow_speed');
				} else {
					var slideshow_speed =  '7000';
				}
				if ($(this).data('animation_speed') != '') {
					var animation_speed =  $(this).data('animation_speed');
				} else {
					var animation_speed =  '600';
				}
				if ($(this).data('navigation') == true) {
					var navigation =  true;
				} else {
					var navigation =  false;
				}
				if ($(this).data('pagination') == true) {
					var pagination =  true;
				} else {
					var pagination =  false;
				}
				if ($(this).data('stop_on_hover') == true) {
					var stop_on_hover =  true;
				} else {
					var stop_on_hover =  false;
				}
				if ($(this).hasClass('style-1')) {
					var items =  1;
					var item_margin =  0;
				} else {
					var items =  2;
					if ($(window).width() < 751) {
						items =  1;
					}
					var item_margin =  68;
				}
				$(this).flexslider({
					pauseOnHover: stop_on_hover,
					animationLoop: true,
					animation: 'slide',
					animationSpeed: animation_speed,
					slideshowSpeed: slideshow_speed,
					useCSS: false,
					directionNav: navigation,
					controlNav: pagination,
					slideshow: false,
					itemMargin: item_margin,
					itemWidth: 2000,
					maxItems: items,
					minItems: items,
					start: function(slider){
						testimonials_slider = slider;
					}
				});
				$(window).resize(function() {
					if ($(window).width() < 751) {
						testimonials_slider.vars.minItems = 1;
						testimonials_slider.vars.maxItems = 1;
					} else {
						testimonials_slider.vars.minItems = items;
						testimonials_slider.vars.maxItems = items;
					}
				});
			});
		}



		// Quantity
		if ($('.cart-list').length > 0) {
			$('input.qty').on('change', function(){
				flexity_ajax_cart($(this));
			});
		}
		$('body').on('click', '.qnt-wrap a', function () {
			var qnt = $(this).parent().find('input').val();
			if ($(this).hasClass('qnt-plus')) {
				qnt++;
			} else if ($(this).hasClass('qnt-minus')) {
				qnt--;
			}
			if (qnt > 0) {
				$(this).parent().find('input').attr('value', qnt);
				if ($(this).parents('.sectls').find('.button').length > 0) {
					$(this).parents('.sectls').find('.button').attr('data-quantity', qnt);
				}
				if ($(this).parents('.prod-cont').find('.button').length > 0) {
					$(this).parents('.prod-cont').find('.button').attr('data-quantity', qnt);
				}
			}

			if (qnt > 0) {
				
				// Change total price html
				var input = $(this).parent().find('input');
				var prod_price = input.attr('data-qnt-price');
				var prod_qntprice = number_format(qnt*prod_price, input.data('decimals'), input.data('decimal_separator'), input.data('thousand_separator'));
				var prod_qnthtmlprice = input.data('price_format').replace('%2$s', prod_qntprice).replace('%1$s', input.data('currency'));

				if ($(this).parents('.sectls').find('.prod-li-total').length > 0) {
					$(this).parents('.sectls').find('.prod-li-total').html(prod_qnthtmlprice);
				}
				if ($(this).parents('.prod-cont').find('.prod-total-wrap .prod-price').length > 0) {

					$(this).parents('.prod-cont').find('.prod-total-wrap .prod-price').html(prod_qnthtmlprice);

					if ($(this).parents('.prod-cont').find('.prod-add form.cart input.qty').length > 0) {
						$(this).parents('.prod-cont').find('.prod-add form.cart input.qty').val($(this).parent().find('input').attr('value'));
					}

				}
			}

			if ($('.cart-list').length > 0) {
				flexity_ajax_cart($(this).parent().find('.qty'));
			}

			return false;
		});



		// Section Product Title in Hover
		$('.special')
			.on( "mouseenter", function() {
				var ttl_height = $(this).find('h3').height();
				var inner_height = $(this).find('h3 span').height();
				$(this).find('h3 span').css('top', (-inner_height+ttl_height));
			})
			.on( "mouseleave", function() {
				$(this).find('h3 span').css('top', 0);
			});

		$('.popular')
			.on( "mouseenter", function() {
				var ttl_height = $(this).find('h3').height();
				var inner_height = $(this).find('h3 span').height();
				$(this).find('h3 span').css('top', (-inner_height+ttl_height));
			})
			.on( "mouseleave", function() {
				$(this).find('h3 span').css('top', 0);
			});

		$('.sectgl')
			.on( "mouseenter", function() {
				var ttl_height = $(this).find('h3').height();
				var inner_height = $(this).find('h3 span').height();
				$(this).find('h3 span').css('top', (-inner_height+ttl_height));
			})
			.on( "mouseleave", function() {
				$(this).find('h3 span').css('top', 0);
			});


		// Masonry Grids
		if ($('#blog-grid').length > 0) {
			$('#blog-grid').masonry({
				itemSelector: '.blog-grid-i',
			});
		}
		if ($('#gallery-grid').length > 0) {

			var $grid = $('#gallery-grid').isotope({
				itemSelector: '.gallery-grid-i',
			});
			$('#gallery-sections').on('click', 'a', function() {
				var filterValue = $( this ).attr('data-section');
				$grid.isotope({ filter: filterValue });
			});
			$('#gallery-sections').each( function( i, buttonGroup ) {
				var $buttonGroup = $( buttonGroup );
				$buttonGroup.on('click', 'a', function() {
					$buttonGroup.find('.active').removeClass('active');
					$( this ).addClass('active');
					return false;
				});
			});

		}
		if ($('.flexity-gallery').length > 0) {

			var $grid = $('.flexity-gallery').isotope({
				itemSelector: '.gallery-grid-i',
			});
			$('.flexity-gallery-sections').on('click', 'a', function() {
				var filterValue = $( this ).attr('data-section');
				$grid.isotope({ filter: filterValue });
			});
			$('.flexity-gallery-sections').each( function( i, buttonGroup ) {
				var $buttonGroup = $( buttonGroup );
				$buttonGroup.on('click', 'a', function() {
					$buttonGroup.find('.active').removeClass('active');
					$( this ).addClass('active');
					return false;
				});
			});

		}
		if ($('#about-gallery').length > 0) {
			$('#about-gallery').masonry({
				itemSelector: '.grid-item',
				columnWidth: '.grid-sizer',
				percentPosition: true
			});
		}





		// Ajaxify compare button
		$(document).on( 'click', '.prod-li-compare-btn', function(e){
			e.preventDefault();

			var button = $(this);

			if (button.hasClass('prod-li-compare-added'))
				return false;

			if (!button.hasClass('loading')) {

				button.parent().find('.prod-li-compare-loading').fadeIn();

				$.ajax({
					type: 'post',
					url: $(this).attr('href'),
					success: function(response){

						button.removeClass('loading').addClass('prod-li-compare-added');
						button.parent().find('.prod-li-compare-loading').fadeOut();

						var compare_list = $('.header-compare span').text();
						compare_list++;
						$('.header-compare span').text(compare_list);

						$( '#compare-popup-message' ).remove();
						$( 'body' ).append( '<div id="compare-popup-message">Product added!</div>' );
						$( '#compare-popup-message' ).css( 'margin-left', '-' + $( '#compare-popup-message' ).width() + 'px' ).fadeIn();
						window.setTimeout( function() {
							$( '#compare-popup-message' ).fadeOut();
						}, 2000 );
					}
				});
			}
		});



		$('body').on('click', '.add_to_wishlist', function () {
			var favorites_list = $('.header-favorites span').text();
			favorites_list++;
			$('.header-favorites span').text(favorites_list);
		});


		$('.special-more').on('click', '.special-more-btn', function () {
			var button = $(this);
			var max_num_pages = button.attr('data-max-num-pages');
			var page_num = button.attr('data-page-num');
			var posts_per_page = button.attr('data-posts_per_page');
			var container = button.parent().parent().find(button.attr('data-container'));
			var url = button.attr('data-url');
			var file = button.attr('data-file');
			var order = button.attr('data-order');
			var orderby = button.attr('data-orderby');
			var view_mode = button.attr('data-view-mode');
			var item = button.attr('data-item');
			var ids = button.attr('data-ids');

			if (!button.hasClass('loading')) {

				button.addClass('loading');

				$.ajax({
					type: "POST",
					data: {
						posts_per_page : posts_per_page,
						page_num: page_num,
						order: order,
						orderby: orderby,
						view_mode: view_mode,
						file: file,
						ids: ids,
						action: 'flexity_load_more'
					},
					url: url,
					success: function(data){
						$(button).removeClass('loading');
						if (max_num_pages <= page_num) {
							$(button).remove();
						}
						var btn_new = $(data).find('.' + button.attr('class'));
						var posts_list = $(data).find(item);
						container.append(posts_list);
						page_num++;
						button.attr('data-page-num', page_num);
						button.attr('data-max-num-pages', btn_new.attr('data-max-num-pages'));
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$(button).remove();
						alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
					}
				});
			}
			return false;
		});


		$('.cart-actions').on('click', '#cart-shipping-ttl', function () {
			if ($(this).hasClass('opened')) {
				$(this).removeClass('opened');
				$('.shipping_method').slideUp();
			} else {
				$(this).addClass('opened');
				$('.shipping_method').slideDown();
			}
			if ($('.shipping-calculator-form').css('display') == 'block') {
				$('.shipping-calculator-form').fadeOut();
			}
			return false;
		});



		// Gallery "Show More"
		$('.flexity-gallery-more').on('click', 'a', function () {
			var button = $(this);
			var max_num_pages = button.attr('data-max-num-pages');
			var page_num = button.attr('data-page-num');
			//var container = button.attr('data-container');
			var container = button.parent().parent().find(button.attr('data-container'));
			var url = button.attr('data-url');
			var file = button.attr('data-file');
			var orderby = button.attr('data-orderby');
			var order = button.attr('data-order');
			var posts_per_page = button.attr('data-posts_per_page');
			var item = button.attr('data-item');
			var category = button.attr('data-category');

			if (!button.hasClass('loading')) {

				button.addClass('loading');

				$.ajax({
					type: "POST",
					data: {
						page_num: page_num,
						file: file,
						orderby: orderby,
						order: order,
						posts_per_page: posts_per_page,
						category: category,
						action: 'flexity_gallery_load_more'
					},
					url: url,
					success: function(data){
						$(button).removeClass('loading');
						if (max_num_pages <= page_num) {
							$(button).remove();
						}
						var posts_list = $(data).find(item);

						container.append(posts_list).each(function(){
							container.isotope('reloadItems');
						});

						var $grid = container.isotope({
							itemSelector: item,
							layoutMode: 'masonry'
						});
						$grid.imagesLoaded().progress(function () {
							$grid.isotope('layout');
						});

						page_num++;
						button.attr('data-page-num', page_num);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$(button).remove();
						alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
					}
				});
			}
			return false;
		});


		if ($('.cont-sections').length > 0) {
			if ($(window).width() > 1203) {
				var menu_sections = $('.cont-sections');
				var menu_width = menu_sections.width();
				var menu_items_width = 0;
				menu_sections.find('> li').each(function () {
					if (!$(this).hasClass('cont-sections-more')) {
						menu_items_width = menu_items_width + ($(this).outerWidth(true) + 4);
						if (menu_width < menu_items_width) {
							$(this).addClass('cont-sections-other');
							$(this).appendTo('.cont-sections-sub');
						} else if ($(this).hasClass('cont-sections-other')) {
							$(this).removeClass('cont-sections-other');
							$(this).prependTo('.cont-sections-sub');
						}
					}
				});
				if (menu_width < menu_items_width) {
					$('.cont-sections-more').show();
				}
			}

			$('.cont-sections').addClass('sections-show');

			$(window).resize(function() {
				var menu_sections = $('.cont-sections');
				var menu_width = menu_sections.width();
				var menu_items_width = 0;
				if ($(window).width() > 1203) {
					menu_sections.find('> li').each(function () {
						menu_items_width = menu_items_width + ($(this).outerWidth(true) + 4);
						if (!$(this).hasClass('cont-sections-more')) {
							if (menu_width < menu_items_width) {
								$(this).addClass('cont-sections-other');
								$(this).appendTo('.cont-sections-sub');
							} else if ($(this).hasClass('cont-sections-other')) {
								$(this).removeClass('cont-sections-other');
								$(this).prependTo('.cont-sections-sub');
							}
						}
					});
					if (menu_width < menu_items_width) {
						$('.cont-sections-more').show();
					}
				} else {
					menu_sections.find('li.cont-sections-other').insertBefore('.cont-sections-more');
					menu_sections.find('li.cont-sections-other').removeClass('cont-sections-other');
				}
			});

		}




		// Quick View
		$('.maincont').on('click', '.quick-view', function () {
			var button = $(this);
			var product_id = $(this).data('id');
			var file = $(this).data('file');
			var url = $(this).data('url');
			if (!button.hasClass('loading')) {

				button.addClass('loading');

				$.ajax({
					type: "POST",
					data: {
						file: file,
						product_id: product_id,
						action: 'flexity_quick_view'
					},
					url: url,
					success: function(data){
						$(button).removeClass('loading');
						$.fancybox({
							content: data,
							padding: 0,
							helpers : {
								overlay : {
									locked  : false
								}
							}
						});

						$("#prod-thumbs").flexslider({
							animation: "slide",
							controlNav: false,
							animationLoop: false,
							slideshow: false,
							itemWidth: 97,
							itemMargin: 0,
							minItems: 4,
							maxItems: 4,
							asNavFor: '#prod-slider',
							start: function(slider){
								$("#prod-thumbs").resize();
							}
						});
						$('#prod-slider').flexslider({
							animation: "fade",
							animationSpeed: 500,
							slideshow: false,
							animationLoop: false,
							smoothHeight: false,
							controlNav: false,
							sync: "#prod-thumbs",
						});

					},
					error: function(jqXHR, textStatus, errorThrown) {
						$(button).remove();
						alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
					}
				});
			}
			return false;
		});


		// Sticky header
		if ($('.header-sticky').length > 0) {
			$(window).scroll(function () {
				var topbar = false;
				var topbar_ht = $('.topbar').height();
				if ($('.topbar').length > 0 && $('.topbar').css('display') !== 'none') {
					topbar = true;
				}
				if (topbar) {
					$('body').css('margin-top', '0px');
					if (topbar_ht < $(window).scrollTop()) {
						$('.header-sticky .header').addClass('header_sticky');
						$('.topbar').css('margin-bottom', $('.header-sticky .header').outerHeight());
					} else {
						$('.header-sticky .header').removeClass('header_sticky');
						$('.topbar').css('margin-bottom', '0px');
					}
				} else {
					$('.header-sticky .header').addClass('header_sticky');
					$('body').css('margin-top', $('.header-sticky .header').outerHeight());
				}
			});
		}


	});
})(jQuery);
