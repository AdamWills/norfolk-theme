<?php

namespace Roots\Sage\A11y;

function set_contrast_cookie() {
  setcookie( 'high-contrast', true, 7 * DAYS_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
}

function delete_contrast_cookie() {
  unset( $_COOKIE['high-contrast'] );
  setcookie( 'high-contrast', false, time() - ( 15 * 60 ) );
}

function is_high_contrast_mode() {
  return isset($_COOKIE['high-contrast']);
}

/**
 * Determines actions for setting a11y options
 */
function get_a11y_options() {
  if ( isset( $_GET['ss'] ) ):
    switch ($_GET['ss']) {
      case 'high-contrast':
        set_contrast_cookie();
        break;
      case 'default':
        delete_contrast_cookie();
        break;
    }
  endif;
}
add_action( 'init', __NAMESPACE__ . '\\get_a11y_options' );
