<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
        <script src="bower_components/modernizr/modernizr.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>
    <body>
    
    <!-- Banner -->
    <div class="row show-for-medium-up">
      <div class="small-12 columns">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt=""/>
      </div>
    </div>
    
    <!-- Two Navigation areas, one for large screens, one for anything smaller -->
    <div class="row">
      <!-- Top-Bar Navigation, Large Screens and up -->
      <nav class="top-bar large-12 columns show-for-large-up my-top-bar" data-topbar role="navigation">        
        <section class="top-bar-section">
            <?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_class' => 'left', 'container' => false ) ); ?>
          <ul class="right">
            <?php
              if ( is_user_logged_in() ) {
                get_template_part( 'login', 'yes' );
              } else {
                get_template_part( 'login', 'no' );
              }
            ?>
          </ul>
        </section>
      </nav>
      <!-- Icon-Bar Navigation, Small and Medium screens only -->
      <!-- <div class="icon-bar four-up hide-for-large-up my-icon-bar small-12 columns">
        <a href="#" class="item">
          <i class="fi-home"></i>
          <label>Home</label>
        </a>
        <a class="item">
          <i class="fi-info"></i>
          <label>Info</label>
        </a>
        <a class="item">
          <i class="fi-info"></i>
          <label>Portfolios</label>
        </a>
        <a class="item">
          <i class="fi-like"></i>
          <label>Login</label>
        </a> -->
        <?php mobile_nav() ?>
      </div>
    </div>
    