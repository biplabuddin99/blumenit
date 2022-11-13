(function ($) {
  'use strict';

  /*--------------------------------------------------------------
    Scripts initialization
  --------------------------------------------------------------*/
  $.exists = function (selector) {
    return $(selector).length > 0;
  };

  $(document).on('ready', function () {
    slickInit();
    mainNav();
    stickyHeader();
    scrollUp();
    tabs();
    review();
    new WOW().init();
    parallaxEffect();
    // Search Toggle Botton
    $('.cs-search_toggle_btn').on('click', function () {
      $(this)
        .toggleClass('active')
        .siblings('.cs-search_toggle_body')
        .slideToggle();
    });
    //
    $('.cs-header_info_toggle').on('click', function () {
      $(this).siblings('.cs-header_info_list').slideToggle();
    });
    //
    $('.cs-search_mobile_toggle').on('click', function () {
      $(this).siblings('.cs-search_out').slideToggle();
    });
    //
    $('.cs-widget_toggle').on('click', function () {
      $(this).toggleClass('active').siblings('.cs-checkbox_list').slideToggle();
    });
    //
    $('.cs-mobile_filter_btn').on('click', function () {
      $('.cs-filter_sidebar').toggleClass('active');
    });
    $('.cs-mobile_filter_cross').on('click', function () {
      $('.cs-filter_sidebar').removeClass('active');
    });

  });
  $(window).on('scroll', function () {
    stickyHeader();
    parallaxEffect();
  });

  /*--------------------------------------------------------------
    2. Mobile Menu
  --------------------------------------------------------------*/
  function mainNav() {
    $('.cs-nav').append('<span class="cs-munu_toggle"><span></span></span>');
    $('.cs-munu_toggle').on('click', function () {
      $(this)
        .toggleClass('cs-toggle_active')
        .siblings('.cs-nav_list')
        .slideToggle();
    });
    $('.cs-burger_btn, .cs-close').on('click', function () {
      $('.cs-nav').toggleClass('active');
    });
  }

  /*--------------------------------------------------------------
    3. Sticky Header
  --------------------------------------------------------------*/
  function stickyHeader() {
    var scroll = $(window).scrollTop();
    if (scroll >= 10) {
      $('.cs-sticky-header').addClass('cs-sticky-active');
    } else {
      $('.cs-sticky-header').removeClass('cs-sticky-active');
    }
    // Scroll Up
    if (scroll >= 350) {
      $('#cs-scrollup').addClass('scrollup-show');
    } else {
      $('#cs-scrollup').removeClass('scrollup-show');
    }
  }

  /*--------------------------------------------------------------
    3. Slick Slider
  --------------------------------------------------------------*/
  function slickInit() {
    if ($.exists('.cs-slider')) {
      $('.cs-slider').each(function () {
        // Slick Variable
        var $ts = $(this).find('.cs-slider_container');
        var $slickActive = $(this).find('.cs-slider_wrapper');
        // var $sliderNumber = $(this).siblings('.slider-number');

        // Auto Play
        var autoPlayVar = parseInt($ts.attr('data-autoplay'), 10);
        // Auto Play Time Out
        var autoplaySpdVar = 3000;
        if (autoPlayVar > 1) {
          autoplaySpdVar = autoPlayVar;
          autoPlayVar = 1;
        }
        // Slide Change Speed
        var speedVar = parseInt($ts.attr('data-speed'), 10);
        // Slider Loop
        var loopVar = Boolean(parseInt($ts.attr('data-loop'), 10));
        // Slider Center
        var centerVar = Boolean(parseInt($ts.attr('data-center'), 10));
        // Slider Vertical
        var verticalVar = Boolean(parseInt($ts.attr('data-vertical'), 10));
        // Pagination
        var paginaiton = $(this)
          .find('.cs-pagination')
          .hasClass('cs-pagination');
        // Slide Per View
        var slidesPerView = $ts.attr('data-slides-per-view');
        if (slidesPerView == 1) {
          slidesPerView = 1;
        }
        if (slidesPerView == 'responsive') {
          var slidesPerView = parseInt($ts.attr('data-add-slides'), 10);
          var lgPoint = parseInt($ts.attr('data-lg-slides'), 10);
          var mdPoint = parseInt($ts.attr('data-md-slides'), 10);
          var smPoint = parseInt($ts.attr('data-sm-slides'), 10);
          var xsPoing = parseInt($ts.attr('data-xs-slides'), 10);
        }
        // Fade Slider
        var fadeVar = parseInt($($ts).attr('data-fade-slide'));
        fadeVar === 1 ? (fadeVar = true) : (fadeVar = false);

        // Slick Active Code
        $slickActive.slick({
          autoplay: autoPlayVar,
          dots: paginaiton,
          centerPadding: '0',
          speed: speedVar,
          infinite: loopVar,
          autoplaySpeed: autoplaySpdVar,
          centerMode: centerVar,
          fade: fadeVar,
          vertical: verticalVar,
          prevArrow: $(this).find('.cs-left_arrow'),
          nextArrow: $(this).find('.cs-right_arrow'),
          appendDots: $(this).find('.cs-pagination'),
          slidesToShow: slidesPerView,
          responsive: [
            {
              breakpoint: 1600,
              settings: {
                slidesToShow: lgPoint,
              },
            },
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: mdPoint,
              },
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: smPoint,
              },
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: xsPoing,
              },
            },
          ],
        });
      });
    }
    // Product view slider
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      asNavFor: '.slider-nav',
    });
    $('.slider-nav').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: true,
      focusOnSelect: true,
    });
  }
  /*--------------------------------------------------------------
    3. Slick Slider
  --------------------------------------------------------------*/
  function scrollUp() {
    $('.cs-scroll_up').on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, '300');
    });
  }

  /*--------------------------------------------------------------
    4. Tabs
  --------------------------------------------------------------*/
  function tabs() {
    $('.cs-tabs.cs-fade_tabs .cs-tab_links a').on('click', function (e) {
      slickInit();
      var currentAttrValue = $(this).attr('href');
      $('.cs-tabs ' + currentAttrValue)
        .fadeIn(400)
        .siblings()
        .hide();
      $('.cs-tabs ' + currentAttrValue)
        .addClass('active')
        .siblings()
        .removeClass('active');
      $(this).parents('li').addClass('active').siblings().removeClass('active');

      e.preventDefault();
    });
  }

  /*--------------------------------------------------------------
    5. Review
  --------------------------------------------------------------*/
  function review() {
    $('.cs-review').each(function () {
      var review = $(this).data('review');
      var reviewVal = review * 20 + '%';
      $(this).find('.cs-review_in').css('width', reviewVal);
    });
  }
  /*--------------------------------------------------------------
    6. parallaxEffect
  --------------------------------------------------------------*/
  function parallaxEffect() {
    $('.cs-parallax').each(function () {
      var windowScroll = $(document).scrollTop(),
        windowHeight = $(window).height(),
        barOffset = $(this).offset().top,
        barHeight = $(this).height(),
        barHeightWindowHeight = windowScroll + windowHeight,
        barScrollUp = barOffset <= windowScroll + windowHeight,
        barSctollDown = barOffset + barHeight >= windowScroll;

      if (barSctollDown && barScrollUp) {
        var calculadedHeight = barHeightWindowHeight - barOffset;
        var largeEffectPixel = calculadedHeight / 5;
        var mediumEffectPixel = calculadedHeight / 20;
        var miniEffectPixel = calculadedHeight / 10;

        $(this)
          .find('.cs-to_left')
          .css('transform', `translateX(-${miniEffectPixel}px)`);
        $(this)
          .find('.cs-to_right')
          .css('transform', `translateX(${miniEffectPixel}px)`);
        $(this)
          .find('.cs-to_up')
          .css('transform', `translateY(-${miniEffectPixel}px)`);
        $(this)
          .find('.cs-to_down')
          .css('transform', `translateY(${miniEffectPixel}px)`);
        $(this)
          .find('.cs-to_right_up')
          .css(
            'transform',
            `translate(${miniEffectPixel}px, -${miniEffectPixel}px)`
          );
        $(this)
          .find('.cs-to_left_up')
          .css(
            'transform',
            `translate(-${miniEffectPixel}px, -${miniEffectPixel}px)`
          );
        $(this)
          .find('.cs-to_rotate')
          .css('transform', `rotate(${miniEffectPixel}deg)`);
        $(this)
          .find('.cs-to_rotate_up')
          .css({
            transform: `rotate(-${mediumEffectPixel}deg)`,
            'margin-top': `-${largeEffectPixel}px`,
          });
      }
    });
  }
})(jQuery); // End of use strict
