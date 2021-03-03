<?php

function gtmi_theme_support()
{
  //add dynamic title tag support
  add_theme_support('title-tag');

  //add dynamic logo to the site ( can be access from theme customize->site identity)
  add_theme_support('custom-logo');

  //add feature image in the blog post
  add_theme_support('post-thumbnails');
}


add_action('after_setup_theme', 'gtmi_theme_support');


function gtmi_menus()
{
  $locations = array(
    'primary' => 'Desktop Primary Left Sidebar',
    'footer' => 'Footer menu items'
  );

  register_nav_menus($locations);
}

add_action('init', 'gtmi_menus');


function gtmi_register_styles()
{
  // getting the version number from the style.css comment section Version parameter
  $version = wp_get_theme()->get('Version');
  // Theme CSS
  wp_enqueue_style('gtmi-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), "4.4.1", 'all');
  wp_enqueue_style('gtmi-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), "5.13.0", 'all');
  wp_enqueue_style('gtmi-style', get_template_directory_uri() . '/style.css', array('gtmi-bootstrap'), $version, 'all');
}


add_action('wp_enqueue_scripts', 'gtmi_register_styles');


function gtmi_register_scripts()
{
  // getting the version number from the style.css comment section Version parameter
  $version = wp_get_theme()->get('Version');
  // Theme CSS
  wp_enqueue_script('gtmi-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), "3.4.1", 'all');
  wp_enqueue_script('gtmi-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "1.16.0", 'all');
  wp_enqueue_script('gtmi-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), "4.4.1", 'all');
  wp_enqueue_script('gtmi-main', get_template_directory_uri() . "/assets/js/main.js", array(), $version, 'all', true);
}


add_action('wp_enqueue_scripts', 'gtmi_register_scripts');


function gtmi_widget_areas()
{
  register_sidebar(
    array(
      'name' => 'My Sidebar Area',
      'id' => 'sidebar-1',
      'description' => 'Sidebar widget area',
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
      'after_widget' => '</ul>',
    )
  );

  register_sidebar(
    array(
      'name' => 'My Footer Area',
      'id' => 'footer-1',
      'description' => 'Footer widget area',
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '',
      'after_widget' => '',
    )
  );
}

add_action('widgets_init', 'gtmi_widget_areas');
