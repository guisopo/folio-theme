<?php

function folio_register_cpt() {
  $supports = array(
    'title',
    'thumbnail',
    'revisions',
    'post-formats'
  );

  $labels = array(
    'name' => 'Works',
    'singular_name' => 'Work',
    'add_new' => 'Add New Work',
    'add_new_item' => 'Add New Work',
    'edit_item' => 'Edit Work',
    'new_item' => 'New Work',
    'view_item' => 'View Work',
    'all_item' => 'All Works',
    'search_items' => 'Search Works',
    'not_found' => 'No Works found',
    'not_found_in_trash' => 'No Works found in trash',
    'archives' => 'Works Archives'
  );

  $taxonomies = array(
    'category'
  );

  $args = array(
    'public' => true,
    'supports' => $supports,
    'labels' => $labels,
    'hierarchical' => true,
    'has_archive' => true,
    'taxonomies' => $taxonomies,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-admin-customizer'

  );

  register_post_type( 'works', $args);
}

add_action( 'init', 'folio_register_cpt' );