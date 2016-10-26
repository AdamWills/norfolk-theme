<?php

namespace Roots\Sage\CustomPostTypes;


function cptui_register_my_cpts() {
	$labels = array(
		"name" => __( 'Service Disruptions', 'sage' ),
		"singular_name" => __( 'Service Disruption', 'sage' ),
		);

	$args = array(
		"label" => __( 'Service Disruptions', 'sage' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "service-disruptions", "with_front" => false ),
		"query_var" => true,
		"supports" => array( "title", "editor", "excerpt", "revisions", "author", "page-attributes" )
  );

  register_post_type( "service-disruptions", $args );

	$labels = array(
		"name" => __( 'Public Notices', 'sage' ),
		"singular_name" => __( 'Public Notice', 'sage' ),
		);

	$args = array(
		"label" => __( 'Public Notices', 'sage' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "public-notices", "with_front" => true ),
		"query_var" => true,

		"supports" => array( "title", "editor", "excerpt", "revisions", "author", "page-attributes" ),					);
	register_post_type( "public-notices", $args );

	$labels = array(
		"name" => __( 'Media Releases', 'sage' ),
		"singular_name" => __( 'Media Release', 'sage' ),
		);

	$args = array(
		"label" => __( 'Media Releases', 'sage' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "media-releases", "with_front" => true ),
		"query_var" => true,

		"supports" => array( "title", "editor", "excerpt", "revisions", "author", "page-attributes" ),					);
	register_post_type( "media-releases", $args );

	$labels = array(
		"name" => __( 'Bidding Opportunties', 'sage' ),
		"singular_name" => __( 'Bidding Opportunity', 'sage' ),
		);

	$args = array(
		"label" => __( 'Bidding Opportunties', 'sage' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "bids", "with_front" => true ),
		"query_var" => true,

		"supports" => array( "title", "editor" ),					);
	register_post_type( "bidding", $args );

	$labels = array(
		"name" => __( 'Surplus Properties', 'sage' ),
		"singular_name" => __( 'Surplus Property', 'sage' ),
		);

	$args = array(
		"label" => __( 'Surplus Properties', 'sage' ),
		"labels" => $labels,
		"description" => "Surplus Property for sale from Norfolk County",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "surplus-properties", "with_front" => true ),
		"query_var" => true,
							);
	register_post_type( "surplus-properties", $args );

// End of cptui_register_my_cpts()
}
add_action( 'init',  __NAMESPACE__ . '\\cptui_register_my_cpts' );
