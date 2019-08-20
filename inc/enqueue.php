<?php
/**
 * Enqueue scripts and styles
 * 
 * @package Folio
 */

function folio_load_scripts() {
  /**
   * Main CSS file
   */
   wp_enqueue_style( 'folio-style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
   
}

add_action( 'wp_enqueue_scripts', 'folio_load_scripts' );