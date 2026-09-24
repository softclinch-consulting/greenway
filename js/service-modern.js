/**
 * Green Way Industries - 2026 Modern Interactive Engine
 * Features:
 *  1. Lightweight Industrial Particle Canvas (Floating Droplets & Circular Rings)
 *  2. Mouse Parallax (Spanning Depth Layers: Background, Midground, Foreground)
 *  3. Subtle 3D Card Tilt with Brand Glow
 *  4. IntersectionObserver Viewport Number Counter Animation
 *  5. Cinematic Scroll Reveal System
 *  6. Interactive FAQ Accordion
 * Performance:
 *  - 60 FPS target via requestAnimationFrame & GPU transforms
 *  - IntersectionObserver pauses canvas when offscreen
 *  - Full prefers-reduced-motion compliance
 */

(function($) {
  'use strict';

  // Check if reduced motion is requested by user
  var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ==========================================================================
     1. Lightweight Industrial Particle Canvas
     ========================================================================== */
  function initParticleCanvas() {
    var canvas = document.getElementById('gw-hero-particles');
    if (!canvas || prefersReducedMotion) return;

    var ctx = canvas.getContext('2d');
    var particles = [];
    var animationFrameId = null;
    var isHeroVisible = true;
    var mouse = { x: -1000, y: -1000 };

    function resizeCanvas() {
      var rect = canvas.parentElement.getBoundingClientRect();
      canvas.width = rect.width;
      canvas.height = rect.height;
    }

    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    // Particle constructor: simulates subtle waste oil droplets & circular recovery rings
    function Particle() {
      this.reset();
    }

    Particle.prototype.reset = function() {
      this.x = Math.random() * canvas.width;
      this.y = Math.random() * canvas.height;
      this.size = Math.random() * 4 + 2; // small droplets
      this.type = Math.random() > 0.75 ? 'ring' : 'droplet';
      this.vx = (Math.random() - 0.5) * 0.4;
      this.vy = -(Math.random() * 0.35 + 0.15); // gentle upward drift
      this.baseAlpha = Math.random() * 0.25 + 0.1;
      this.alpha = this.baseAlpha;
      this.pulseSpeed = Math.random() * 0.02 + 0.01;
      this.angle = Math.random() * Math.PI * 2;
    };

    Particle.prototype.update = function() {
      this.x += this.vx;
      this.y += this.vy;
      this.angle += this.pulseSpeed;

      // Subtle mouse interaction (soft repulsion within 90px)
      var dx = this.x - mouse.x;
      var dy = this.y - mouse.y;
      var dist = Math.sqrt(dx * dx + dy * dy);
      if (dist < 90) {
        var force = (90 - dist) / 90;
        this.x += (dx / dist) * force * 1.5;
        this.y += (dy / dist) * force * 1.5;
      }

      // Loop boundaries
      if (this.y < -10) this.y = canvas.height + 10;
      if (this.x < -10) this.x = canvas.width + 10;
      if (this.x > canvas.width + 10) this.x = -10;

      // Alpha breathing
      this.alpha = this.baseAlpha + Math.sin(this.angle) * 0.08;
    };

    Particle.prototype.draw = function() {
      ctx.save();
      if (this.type === 'ring') {
        // Circular recovery process ring
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size * 2, 0, Math.PI * 2);
        ctx.strokeStyle = 'rgba(181, 232, 95, ' + this.alpha + ')';
        ctx.lineWidth = 1.2;
        ctx.stroke();
      } else {
        // Translucent oil droplet (brand lime / amber hue)
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(181, 232, 95, ' + this.alpha + ')';
        ctx.fill();
      }
      ctx.restore();
    };

    // Initialize low density (24 particles desktop, 12 mobile)
    var particleCount = window.innerWidth < 768 ? 12 : 24;
    for (var i = 0; i < particleCount; i++) {
      particles.push(new Particle());
    }

    // Track mouse position over hero
    var heroEl = canvas.parentElement;
    heroEl.addEventListener('mousemove', function(e) {
      var rect = heroEl.getBoundingClientRect();
      mouse.x = e.clientX - rect.left;
      mouse.y = e.clientY - rect.top;
    });

    heroEl.addEventListener('mouseleave', function() {
      mouse.x = -1000;
      mouse.y = -1000;
    });

    function loop() {
      if (isHeroVisible) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        for (var i = 0; i < particles.length; i++) {
          particles[i].update();
          particles[i].draw();
        }
      }
      animationFrameId = requestAnimationFrame(loop);
    }

    // Pause canvas when hero is offscreen to guarantee 60 FPS
    if ('IntersectionObserver' in window) {
      var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          isHeroVisible = entry.isIntersecting;
        });
      }, { threshold: 0.05 });
      observer.observe(heroEl);
    }

    loop();
  }

  /* ==========================================================================
     2. Mouse Parallax on Depth Layers
     ========================================================================== */
  function initMouseParallax() {
    if (prefersReducedMotion || window.innerWidth < 992) return;

    var $hero = $('.gw-hero-2026, .gw-parallax-section');
    if (!$hero.length) return;

    $hero.each(function() {
      var $container = $(this);
      var $bgLayers = $container.find('.gw-depth-bg');
      var $midLayers = $container.find('.gw-depth-mid');
      var $fgLayers = $container.find('.gw-depth-fg');

      var targetX = 0, targetY = 0;
      var currentX = 0, currentY = 0;
      var isHovered = false;

      $container.on('mousemove', function(e) {
        var rect = this.getBoundingClientRect();
        var x = e.clientX - rect.left - rect.width / 2;
        var y = e.clientY - rect.top - rect.height / 2;
        targetX = x / (rect.width / 2);
        targetY = y / (rect.height / 2);
        isHovered = true;
      });

      $container.on('mouseleave', function() {
        targetX = 0;
        targetY = 0;
        isHovered = false;
      });

      function animate() {
        // Smooth lerp interpolation
        currentX += (targetX - currentX) * 0.06;
        currentY += (targetY - currentY) * 0.06;

        // Background: 2-4px
        if ($bgLayers.length) {
          $bgLayers.css('transform', 'translate3d(' + (currentX * 3.5) + 'px, ' + (currentY * 3.5) + 'px, 0)');
        }
        // Midground: 5-8px
        if ($midLayers.length) {
          $midLayers.css('transform', 'translate3d(' + (currentX * 7) + 'px, ' + (currentY * 7) + 'px, 0)');
        }
        // Foreground: 8-14px
        if ($fgLayers.length) {
          $fgLayers.css('transform', 'translate3d(' + (currentX * 12) + 'px, ' + (currentY * 12) + 'px, 0)');
        }

        requestAnimationFrame(animate);
      }
      animate();
    });
  }

  /* ==========================================================================
     3. Subtle 3D Card Tilt (Max 2.5 - 3.5 Degrees)
     ========================================================================== */
  function initCardTilt() {
    if (prefersReducedMotion || window.innerWidth < 992) return;

    var $cards = $('.gw-tilt-card');
    if (!$cards.length) return;

    $cards.each(function() {
      var $card = $(this);

      $card.on('mousemove', function(e) {
        var rect = this.getBoundingClientRect();
        var x = e.clientX - rect.left;
        var y = e.clientY - rect.top;

        var centerX = rect.width / 2;
        var centerY = rect.height / 2;

        // Max tilt 3 degrees
        var rotateX = ((y - centerY) / centerY) * -3;
        var rotateY = ((x - centerX) / centerX) * 3;

        this.style.transform = 'perspective(1000px) rotateX(' + rotateX.toFixed(2) + 'deg) rotateY(' + rotateY.toFixed(2) + 'deg) translateY(-6px)';
      });

      $card.on('mouseleave', function() {
        this.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0)';
      });
    });
  }

  /* ==========================================================================
     4. Viewport Number Counter Animation
     ========================================================================== */
  function initCounters() {
    var $counters = $('.gw-counter-value');
    if (!$counters.length) return;

    function countUp(el) {
      var $el = $(el);
      if ($el.data('counted')) return;
      $el.data('counted', true);

      var target = parseInt($el.attr('data-target'), 10) || 0;
      var duration = 1600; // ms
      var startTime = null;

      function step(timestamp) {
        if (!startTime) startTime = timestamp;
        var progress = Math.min((timestamp - startTime) / duration, 1);
        // easeOutQuad
        var eased = 1 - (1 - progress) * (1 - progress);
        var current = Math.floor(eased * target);
        $el.text(current);

        if (progress < 1) {
          requestAnimationFrame(step);
        } else {
          $el.text(target);
        }
      }

      requestAnimationFrame(step);
    }

    if ('IntersectionObserver' in window) {
      var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            countUp(entry.target);
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.3 });

      $counters.each(function() {
        observer.observe(this);
      });
    } else {
      // Fallback
      $counters.each(function() {
        countUp(this);
      });
    }
  }

  /* ==========================================================================
     5. Cinematic Scroll Reveal System
     ========================================================================== */
  function initScrollReveal() {
    var $reveals = $('.gw-reveal');
    if (!$reveals.length) return;

    if (prefersReducedMotion) {
      $reveals.addClass('is-visible');
      return;
    }

    if ('IntersectionObserver' in window) {
      var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

      $reveals.each(function() {
        observer.observe(this);
      });
    } else {
      $reveals.addClass('is-visible');
    }
  }

  /* ==========================================================================
     6. Interactive FAQ Accordion
     ========================================================================== */
  function initFaqAccordion() {
    var $faqItems = $('.gw-faq-item');
    if (!$faqItems.length) return;

    $('.gw-faq-header').off('click').on('click', function(e) {
      e.preventDefault();
      var $parent = $(this).closest('.gw-faq-item');
      var $body = $parent.find('.gw-faq-body');
      var isActive = $parent.hasClass('is-active');

      if (isActive) {
        $body.slideUp(250, function() {
          $parent.removeClass('is-active');
        });
      } else {
        $parent.siblings('.gw-faq-item.is-active').each(function() {
          var $sibling = $(this);
          $sibling.find('.gw-faq-body').slideUp(200, function() {
            $sibling.removeClass('is-active');
          });
        });

        $body.slideDown(250, function() {
          $parent.addClass('is-active');
        });
      }
    });

    // Auto-expand first item if none active
    if (!$faqItems.filter('.is-active').length) {
      var $firstItem = $faqItems.first();
      $firstItem.addClass('is-active');
      $firstItem.find('.gw-faq-body').show();
    }
  }

  /* ==========================================================================
     7. Cinematic Gallery View Switcher
     ========================================================================== */
  function initGallerySwitcher() {
    var $switcher = $('.gw-view-switcher');
    if (!$switcher.length) return;

    $('.gw-view-btn').off('click').on('click', function(e) {
      e.preventDefault();
      var view = $(this).data('view');
      $('.gw-view-btn').removeClass('is-active');
      $(this).addClass('is-active');

      if (view === 'reel') {
        $('.gw-gallery-mosaic-wrap').stop(true, true).fadeOut(220, function() {
          $('.gw-gallery-reel-wrap').stop(true, true).fadeIn(280);
        });
      } else {
        $('.gw-gallery-reel-wrap').stop(true, true).fadeOut(220, function() {
          $('.gw-gallery-mosaic-wrap').stop(true, true).fadeIn(280);
        });
      }
    });
  }

  /* ==========================================================================
     8. Services Category Filter
     ========================================================================== */
  function initServiceFilters() {
    var $filterBtns = $('.gw-service-filter-btn');
    if (!$filterBtns.length) return;

    $filterBtns.off('click').on('click', function(e) {
      e.preventDefault();
      var filter = $(this).data('filter');
      $filterBtns.removeClass('is-active');
      $(this).addClass('is-active');

      if (filter === 'all') {
        $('.gw-service-card-2026, .gw-service-spotlight-card').stop(true, true).fadeIn(280);
      } else {
        $('.gw-service-card-2026, .gw-service-spotlight-card').each(function() {
          var category = $(this).data('category');
          if (category && category.indexOf(filter) !== -1) {
            $(this).stop(true, true).fadeIn(280);
          } else {
            $(this).stop(true, true).fadeOut(200);
          }
        });
      }
    });
  }

  /* ==========================================================================
     Document Ready Initialization
     ========================================================================== */
  $(document).ready(function() {
    initParticleCanvas();
    initMouseParallax();
    initCardTilt();
    initCounters();
    initScrollReveal();
    initFaqAccordion();
    initGallerySwitcher();
    initServiceFilters();
  });

})(jQuery);


