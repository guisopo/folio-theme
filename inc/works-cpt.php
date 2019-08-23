<?php

function folio_register_cpt() {
  $supports = array(
    // 'editor',
    'title',
    'thumbnail',
    'revisions',
    'post-formats'
  );

  $labels = array(
    'name'               => 'Works',
    'singular_name'      => 'Work',
    'add_new'            => 'Add New Work',
    'add_new_item'       => 'Add New Work',
    'edit_item'          => 'Edit Work',
    'new_item'           => 'New Work',
    'view_item'          => 'View Work',
    'all_item'           => 'All Works',
    'search_items'       => 'Search Works',
    'not_found'          => 'No Works found',
    'not_found_in_trash' => 'No Works found in trash',
    'archives'           => 'Works Archives'
  );

  $args = array(
    'public'        => true,
    'supports'      => $supports,
    'labels'        => $labels,
    'hierarchical'  => true,
    'has_archive'   => true,
    'menu_position' => 5,
    'show_in_rest'  => true,
    'menu_icon'     => 'dashicons-admin-customizer'

  );

  register_post_type( 'works', $args);
}

add_action( 'init', 'folio_register_cpt' );

function custom_enter_title( $input ) {
    if ( 'works' === get_post_type() ) {
        return 'Add title of the new work';
    }

    return $input;
}

add_filter( 'enter_title_here', 'custom_enter_title' );