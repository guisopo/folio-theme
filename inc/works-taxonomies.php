<?php

function folio_work_taxonomies() {
  $labels = array(
    'name' => 'Types of Work',
    'singular_name' => 'Type of Work',
    'search_items' => 'Search Type of Work',
    'popular_items' => 'Popular Types',
    'all_items' => 'All Types',
    'edit_item' => 'Edit Type',
    'view_item' => 'View Type',
    'update_item' => 'Update Type',
    'add_new_item' => 'Add New Type',
    'new_item_name' => 'New Type Name',
    'separate_items_with_commas' => 'Separate Types with commas',
    'add_or_remove_items' => 'Add or romeve Types',
    'choose_from_most_used' => 'Choose from the most used Types',
    'not_found' => 'No Type found',
    'no_terms' => 'No Types'
  );

  $args = array(
    'labels' => $labels,
    'query_var' => true,
    'rewrite' => true,
    'slug' => 'work_type',
    'show_ui' => false,
    'show_admin_column' => true
  );

  register_taxonomy( 'work_type', 'works', $args);
}

add_action( 'init', 'folio_work_taxonomies' );

function folio_populate_terms() {
  $work_types = array( 'painting', 'sculpture', 'drawing', 'performance', 'photography', 'video', 'installation' );
  
  foreach ($work_types as $work_type) {
    wp_insert_term(
      ucfirst($work_type),
      'work_type',
      array(
        'slug' => $work_type,
      )
    );
  }
}

add_action( 'init', 'folio_populate_terms' );