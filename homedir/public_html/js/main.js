(function ($) {
 "use strict";

/*--------------------------
preloader
---------------------------- */	
	$(window).on('load',function(){
		var pre_loader = $('#preloader');
		pre_loader.fadeOut('slow',function(){$(this).remove();});
	});	

/*----------------------------
 2026 Advanced Mobile & Tablet Navigation
------------------------------ */
	function initAdvancedMobileNav() {
		if (window.__gwMobileNavInit) return;
		var $mobileArea = $('.mobile-menu-area');
		var $dropdown = $('nav#dropdown');
		if (!$mobileArea.length || !$dropdown.length) return;
		window.__gwMobileNavInit = true;

		// Clean up any legacy meanmenu artifacts if present
		$mobileArea.find('.mean-bar, .mean-push').remove();
		$mobileArea.find('.mean-container').removeClass('mean-container');
		$dropdown.hide();

		var $container = $mobileArea.find('.container').first();
		var $logoLink = $mobileArea.find('.logo a').first();
		var logoHref = $logoLink.attr('href') || './';
		var logoImgSrc = $mobileArea.find('.logo img').attr('src') || 'img/logo/logo.png';

		// Determine current page slug for active link state
		var currentPath = (window.location.pathname.split('/').pop() || '').replace(/\.(php|html)$/i, '');
		if (!currentPath || currentPath === 'index') currentPath = './';

		var iconMap = {
			'home': 'fa-home',
			'about': 'fa-building-o',
			'services': 'fa-recycle',
			'certifications': 'fa-certificate',
			'industries': 'fa-industry',
			'products': 'fa-cubes',
			'gallery': 'fa-picture-o',
			'contact': 'fa-envelope-o'
		};

		function getIconForText(txt) {
			var lower = (txt || '').toLowerCase();
			for (var key in iconMap) {
				if (lower.indexOf(key) !== -1) return iconMap[key];
			}
			return 'fa-angle-right';
		}

		// Build Drawer Navigation Items from existing #dropdown list
		var navItemsHtml = '';
		$dropdown.find('> ul > li').each(function () {
			var $li = $(this);
			var $a = $li.children('a').first();
			var text = $.trim($a.text());
			var href = $a.attr('href') || '#';
			var cleanHref = href.replace(/\.(php|html)$/i, '');
			var isCurrent = (cleanHref === currentPath) || (currentPath === './' && (cleanHref === './' || cleanHref === 'index'));
			var iconClass = getIconForText(text);
			var $subUl = $li.children('ul');

			if ($subUl.length && $subUl.children('li').length) {
				var subCount = $subUl.children('li').length;
				var subItemsHtml = '';
				if (href && href !== '#' && href !== 'javascript:void(0)') {
					subItemsHtml += '<li class="gw-drawer-subitem gw-drawer-subitem-all"><a href="' + href + '"><i class="fa fa-th-large"></i> All Services Overview</a></li>';
				}
				$subUl.children('li').each(function () {
					var $subA = $(this).children('a').first();
					var subText = $.trim($subA.text());
					var subHref = $subA.attr('href') || '#';
					var cleanSubHref = subHref.replace(/\.(php|html)$/i, '');
					var subCurrent = (cleanSubHref === currentPath);
					subItemsHtml += '<li class="gw-drawer-subitem' + (subCurrent ? ' is-current' : '') + '">' +
						'<a href="' + subHref + '"><span class="gw-sub-dot"></span>' + subText + '</a>' +
						'</li>';
				});

				navItemsHtml += '<li class="gw-drawer-item has-submenu' + (isCurrent ? ' is-current' : '') + '">' +
					'<div class="gw-drawer-item-row">' +
						'<a href="' + (href === '#' ? 'services' : href) + '" class="gw-drawer-link gw-submenu-trigger-link">' +
							'<span class="gw-drawer-icon"><i class="fa ' + iconClass + '"></i></span>' +
							'<span class="gw-drawer-text">' + text + '</span>' +
							'<span class="gw-drawer-count">' + subCount + '</span>' +
						'</a>' +
						'<button type="button" class="gw-drawer-expand" aria-label="Expand ' + text + '" aria-expanded="false">' +
							'<i class="fa fa-chevron-down"></i>' +
						'</button>' +
					'</div>' +
					'<ul class="gw-drawer-sublist">' + subItemsHtml + '</ul>' +
				'</li>';
			} else {
				navItemsHtml += '<li class="gw-drawer-item' + (isCurrent ? ' is-current' : '') + '">' +
					'<a href="' + href + '" class="gw-drawer-link">' +
						'<span class="gw-drawer-icon"><i class="fa ' + iconClass + '"></i></span>' +
						'<span class="gw-drawer-text">' + text + '</span>' +
						'<i class="fa fa-angle-right gw-drawer-arrow"></i>' +
					'</a>' +
				'</li>';
			}
		});

		var headerBarHtml =
			'<div class="gw-mobile-bar-inner">' +
				'<div class="gw-mobile-brand">' +
					'<a href="' + logoHref + '" class="gw-mobile-logo-link">' +
						'<img src="' + logoImgSrc + '" alt="Green Way Industries">' +
					'</a>' +
				'</div>' +
				'<div class="gw-mobile-header-actions">' +
					'<a href="tel:+919360036055" class="gw-mobile-quick-call" aria-label="Call Green Way Industries">' +
						'<i class="fa fa-phone"></i><span>Call</span>' +
					'</a>' +
					'<a href="contact-us" class="gw-mobile-quick-quote">' +
						'<i class="fa fa-file-text-o"></i><span>Get Quote</span>' +
					'</a>' +
					'<button type="button" class="gw-mobile-menu-btn" aria-label="Toggle Navigation Menu" aria-expanded="false">' +
						'<span class="gw-menu-btn-text">Menu</span>' +
						'<span class="gw-menu-btn-lines">' +
							'<span class="gw-line gw-line-1"></span>' +
							'<span class="gw-line gw-line-2"></span>' +
							'<span class="gw-line gw-line-3"></span>' +
						'</span>' +
					'</button>' +
				'</div>' +
			'</div>' +
			'<div class="gw-mobile-drawer" aria-hidden="true">' +
				'<div class="gw-drawer-status">' +
					'<span class="gw-status-dot"></span>' +
					'<span>CPCB &amp; TNPCB Authorized Waste Oil Recycler</span>' +
				'</div>' +
				'<ul class="gw-drawer-list">' + navItemsHtml + '</ul>' +
				'<div class="gw-drawer-cta-footer">' +
					'<a href="contact-us" class="gw-drawer-quote-btn">' +
						'<i class="fa fa-paper-plane"></i> Get a Free Quote / Schedule Pickup' +
					'</a>' +
					'<div class="gw-drawer-contact-row">' +
						'<a href="tel:+919360036055" class="gw-drawer-contact-chip"><i class="fa fa-phone"></i> +91 93600 36055</a>' +
						'<a href="mailto:info@wasteoil.in" class="gw-drawer-contact-chip"><i class="fa fa-envelope-o"></i> info@wasteoil.in</a>' +
					'</div>' +
				'</div>' +
			'</div>';

		$mobileArea.find('.mobile-menu .logo').hide();
		$container.prepend(headerBarHtml);

		if (!$('.gw-mobile-backdrop').length) {
			$('body').append('<div class="gw-mobile-backdrop"></div>');
		}

		var $menuBtn = $mobileArea.find('.gw-mobile-menu-btn');
		var $btnText = $menuBtn.find('.gw-menu-btn-text');
		var $drawer = $mobileArea.find('.gw-mobile-drawer');
		var $backdrop = $('.gw-mobile-backdrop');

		function closeMobileDrawer() {
			$menuBtn.removeClass('is-open').attr('aria-expanded', 'false');
			$btnText.text('Menu');
			$drawer.removeClass('is-open').attr('aria-hidden', 'true');
			$backdrop.removeClass('is-visible');
			$('body').removeClass('gw-mobile-nav-open');
		}

		function openMobileDrawer() {
			$menuBtn.addClass('is-open').attr('aria-expanded', 'true');
			$btnText.text('Close');
			$drawer.addClass('is-open').attr('aria-hidden', 'false');
			$backdrop.addClass('is-visible');
			$('body').addClass('gw-mobile-nav-open');
		}

		$menuBtn.on('click', function (e) {
			e.preventDefault();
			e.stopPropagation();
			if ($drawer.hasClass('is-open')) {
				closeMobileDrawer();
			} else {
				openMobileDrawer();
			}
		});

		$backdrop.on('click', function () {
			closeMobileDrawer();
		});

		// Expand/collapse Services submenu accordion
		$drawer.on('click', '.gw-drawer-expand', function (e) {
			e.preventDefault();
			e.stopPropagation();
			var $btn = $(this);
			var $item = $btn.closest('.gw-drawer-item');
			var $sublist = $item.find('.gw-drawer-sublist');
			var isOpen = $item.hasClass('is-expanded');

			if (isOpen) {
				$sublist.slideUp(220);
				$item.removeClass('is-expanded');
				$btn.attr('aria-expanded', 'false');
			} else {
				$sublist.slideDown(240);
				$item.addClass('is-expanded');
				$btn.attr('aria-expanded', 'true');
			}
		});

		// Also toggle submenu if parent link is clicked on mobile or has href="#"
		$drawer.on('click', '.gw-submenu-trigger-link', function (e) {
			var href = $(this).attr('href');
			var $item = $(this).closest('.gw-drawer-item');
			if (!href || href === '#' || !$item.hasClass('is-expanded')) {
				e.preventDefault();
				$item.find('.gw-drawer-expand').trigger('click');
			}
		});

		// Close on Escape key or resize to desktop
		$(document).on('keydown', function (e) {
			if (e.key === 'Escape' && $drawer.hasClass('is-open')) {
				closeMobileDrawer();
			}
		});

		$(window).on('resize', function () {
			if ((window.innerWidth || document.documentElement.clientWidth) > 991 && $drawer.hasClass('is-open')) {
				closeMobileDrawer();
			}
		});
	}

	initAdvancedMobileNav();
	$(document).ready(initAdvancedMobileNav);

/*---------------------
  venobox
--------------------- */
	var veno_box = $('.venobox');
	if ($.fn.venobox && veno_box.length) {
		veno_box.venobox();
	}

/*------------------------------------
 search option
------------------------------------- */ 
    $('.search-option').hide();
    $(".main-search").on('click', function(){
        $('.search-option').animate({
            height:'toggle',
        });
    });
/*---------------------
 TOP Menu Stick
--------------------- */
var windows = $(window);
var sticky = $('#sticker');

windows.on('scroll', function() {
    var scroll = windows.scrollTop();
    if (scroll < 100) {
        sticky.removeClass('stick');
    }else{
        sticky.addClass('stick');
    }
});
	
/*--------------------------
 scrollUp
---------------------------- */
	if (typeof $.scrollUp === 'function') {
		$.scrollUp({
			scrollText: '<i class="fa fa-angle-up"></i>',
			easingType: 'linear',
			scrollSpeed: 900,
			animation: 'fade'
		});
	}
    
/*----------------------------
 Counter js active
------------------------------ */
    var count = $('.counter');
    if ($.fn.counterUp && count.length) {
        count.counterUp({
			delay: 40,
			time: 3000
		});
    }
	
/*--------------------------
 collapse
---------------------------- */
	var panel_test = $('.panel-heading a');
	panel_test.on('click', function(){
		panel_test.removeClass('active');
		$(this).addClass('active');
	});
	
/*--------------------------
 Parallax
---------------------------- */	
    var parallaxeffect = $(window);
    if ($.fn.stellar) {
        parallaxeffect.stellar({
            responsive: true,
            positionProperty: 'position',
            horizontalScrolling: false
        });
    }
	
/*--------------------------
 MagnificPopup
---------------------------- */	
    if ($.fn.magnificPopup && $('.video-play').length) {
        $('.video-play').magnificPopup({
            type: 'iframe'
        });
    }

/*--------------------------
     slider carousel
---------------------------- */
    var intro_carousel = $('.intro-carousel');
    if ($.fn.owlCarousel && intro_carousel.length) {
        intro_carousel.owlCarousel({
            loop:true,
            nav:true,		
            autoplay:false,
            dots:false,
            navText: ["<i class='icon icon-chevron-left'></i>","<i class='icon icon-chevron-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    }

/*--------------------------
     Services carousel
---------------------------- */
	var services_carousel = $('.services-carousel');
	if ($.fn.owlCarousel && services_carousel.length) {
		services_carousel.owlCarousel({
	        loop:true,
	        nav:true,		
	        autoplay:false,
	        dots:false,
	        navText: ["<i class='icon icon-chevron-left'></i>","<i class='icon icon-chevron-right'></i>"],
	        responsive:{
	            0:{
	                items:1
	            },
	            700:{
	                items:2
	            },
	            1000:{
	                items:3
	            }
	        }
	    });
	}
/*--------------------------
     Project carousel
---------------------------- */
	var project_carousel = $('.project-carousel');
	if ($.fn.owlCarousel && project_carousel.length) {
		project_carousel.owlCarousel({
	        loop:true,
	        nav:true,		
	        autoplay:false,
	        dots:false,
	        navText: ["<i class='icon icon-chevron-left'></i>","<i class='icon icon-chevron-right'></i>"],
	        responsive:{
	            0:{
	                items:1
	            },
	            700:{
	                items:2
	            },
	            1000:{
	                items:4
	            }
	        }
	    });
	}
/*--------------------------
     Project carousel 2
---------------------------- */
    if ($.fn.owlCarousel && $('.project-carousel-2').length) {
        $('.project-carousel-2').owlCarousel({
            loop:true,
            nav:true,		
            autoplay:false,
            dots:false,
			margin:30,
            navText: ["<i class='icon icon-chevron-left'></i>","<i class='icon icon-chevron-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                700:{
                    items:2
                },
                1000:{
                    items:2
                }
            }
        });
    }
/*----------------------------
 isotope active
------------------------------ */
	// project start
    $(window).on("load",function() {
        var $container = $('.project-content');
        if ($.fn.isotope && $container.length) {
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            $('.project-menu li a').on("click", function() {
                $('.project-menu li a.active').removeClass('active');
                $(this).addClass('active');
                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });
        }
    });
    //portfolio end
/*---------------------
 Testimonial carousel
---------------------*/
    var review = $('.testimonial-carousel');
    if ($.fn.owlCarousel && review.length) {
        review.owlCarousel({
			loop:true,
			nav:false,
	        margin:15,
			dots:true,
			autoplay:false,
			responsive:{
				0:{
					items:1
				},
				768:{
					items:1
				},
				1000:{
					items:1
				}
			}
		});
    }
/*----------------------------
  brand-carousel-carousel
------------------------------ */  
    if ($.fn.owlCarousel && $('.brand-carousel').length) {
        $('.brand-carousel').owlCarousel({
            loop:true,
            margin:30,
            nav:false,		
            autoplay:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:6
                }
            }
        });
    }
	
/*----------------------------
    Contact form
------------------------------ */
	$("#contactForm").on("submit", function (event) {
		if (event.isDefaultPrevented()) {
			formError();
			submitMSG(false, "Did you fill in the form properly?");
		} else {
			event.preventDefault();
			submitForm();
		}
	});
	function submitForm(){
		var name = $("#name").val();
		var email = $("#email").val();
		var msg_subject = $("#msg_subject").val();
		var message = $("#message").val();


		$.ajax({
			type: "POST",
			url: "assets/contact.php",
			data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&message=" + message,
			success : function(text){
				if (text === "success"){
					formSuccess();
				} else {
					formError();
					submitMSG(false,text);
				}
			}
		});
	}

	function formSuccess(){
		$("#contactForm")[0].reset();
		submitMSG(true, "Message Submitted!")
	}

	function formError(){
		$("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$(this).removeClass();
		});
	}

	function submitMSG(valid, msg){
		if(valid){
			var msgClasses = "h3 text-center tada animated text-success";
		} else {
			var msgClasses = "h3 text-center text-danger";
		}
		$("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
	}
    
})(jQuery); 