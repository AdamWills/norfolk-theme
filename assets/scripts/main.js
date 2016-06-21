/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        function hideNavigation() {
          $('.banner__nav > li').removeClass('active');
        }

        function setUpNavigation() {
          $('.banner__nav > li.has-children > a').on('click', function(e) {
            if (!$(this).parent('li').hasClass('active')) {
            hideNavigation();
            }
            $(this).parent('li').toggleClass('active');
            e.preventDefault();
          });

          $('.banner__nav .close').on('click', function() {
            hideNavigation();
          });

          $(document).on('click',function(e) {
            hideNavigation();
          });

          $('.banner__nav li').on('click', function(e) {
            e.stopPropagation();
          });
        }

        function configureSearch() {
          $('input.gsc-input').attr('placeholder', 'Search Norfolk...');
        }

        function setupCustomSearch() {
          window.__gcse = { callback: configureSearch };
          var cx = '013261640645476133726:_5panafhwtu';
          var gcse = document.createElement('script');
          gcse.type = 'text/javascript';
          gcse.async = true;
          gcse.src = (document.location.protocol === 'https:' ? 'https:' : 'http:') +
              '//cse.google.com/cse.js?cx=' + cx;
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(gcse, s);
        }

        function setUpMobileNavButton() {
          $nav = $('.banner__nav');
          $('.btn-mobile-nav-toggle').on('click', function() {
            $nav.toggleClass('open');
          });
        }

        setUpNavigation();
        setupCustomSearch();
        setUpMobileNavButton();

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
        function setUpNewsFeed() {
          var $ticker = $('.news-ticker__feed .ticker'),
              $playButton = $('.news-ticker__pause'),
              $prevButton = $('.news-ticker__prev'),
              $nextButton = $('.news-ticker__next'),
              paused = false;

          $ticker.vTicker('init',{height: 32});

          // setup play/pause button
          $playButton.on('click', function() {
            paused = !paused;
            var state = paused ? 'play' : 'pause';
            $('#play-icon-selector').attr('xlink:href','#' + state + '-icon');
            $ticker.vTicker('pause',paused);
          });

          $prevButton.on('click', function() {
            $ticker.vTicker('pause',paused);
            $ticker.vTicker('prev',{animate: false});
          });

          $nextButton.on('click', function() {
            $ticker.vTicker('pause',paused);
            $ticker.vTicker('next',{animate: false});
          });
        }

        setUpNewsFeed();
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
