<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/*
 * Automatically add subpages to primary navigation
 */
function add_sub_pages($items, $args) {
  //if ('primary_navigation' === $args->theme_location) :
    global $post;
    $tmp = array();
    foreach ($items as $key => $i) {
      $tmp[] = $i;

      // only add subpages to nav items that have a class of 'has-children'
      // this is added through the WordPress admin area
      if (!in_array('has-children', $i->classes))
        break;

      //if not page move on
      if ($i->object != 'page'){
        continue;
      }
      $page = get_post($i->object_id);
      //if not parent page move on
      if (!isset($page->post_parent) || $page->post_parent != 0) {
        continue;
      }
      $children = get_pages( array('child_of' => $i->object_id, 'parent' => $i->object_id) );
      foreach ((array)$children as $c) {
        //set parent menu
        $c->menu_item_parent      = $i->ID;
        $c->object_id             = $c->ID;
        $c->object                = 'page';
        $c->type                  = 'post_type';
        $c->type_label            = 'Page';
        $c->url                   = get_permalink($c->ID);
        $c->title                 = $c->post_title;
        $c->target                = '';
        $c->attr_title            = '';
        $c->description           = '';
        $c->classes               = array();
        $c->xfn                   = '';
        $c->current               = ($post->ID == $c->ID)? true: false;
        $c->current_item_ancestor = ($post->ID == $c->post_parent)? true: false;
        $c->current_item_parent   = ($post->ID == $c->post_parent)? true: false;
        $tmp[] = $c;
      }
    }
    return $tmp;
  // else:
  //   return $items;
  // endif;
}
add_filter('wp_nav_menu_objects', __NAMESPACE__ . '\\add_sub_pages', 10, 2);

/*
 * Get news items to display in the ticker
 */
function show_notices() {
  $args = array ( 'post_type' => array( 'service-disruptions', ' public-notices', ' media-releases' ) );
  $query = new \WP_Query( $args );
  $notices = array();

  if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
      echo '<li><a href="'.get_permalink().'">' . get_the_title() . '</a></li>';
    endwhile;
  endif;

  // Restore original Post Data
  wp_reset_postdata();
}

/*
 * Randomly generate a background image on the home page
 */
function get_background_images() {
  if (is_front_page()) :
    $images = array();
    $dir = get_template_directory();

    foreach (glob($dir . '/dist/images/bg/*.jpg') as $filename) :
      $images[] = str_replace($dir, get_stylesheet_directory_uri(), $filename);
    endforeach;

    echo '<style>';
    echo '@media screen and (min-width: 62rem) {';
    echo 'body { background-image: url('.$images[rand(0,count($images)-1)] .')}';
    echo '}';
    echo '</style>';

  endif;
}
add_action('wp_head', __NAMESPACE__ . '\\get_background_images');
