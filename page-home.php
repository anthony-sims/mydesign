<?php get_header(); ?>
  
    
     <!-- Headline -->
    <div class="row">
      <div class="small-12 columns ">
        <h1>Welcome to MyDesign Central - this is page-home.php</h1>
      </div>
    </div>
    
    <!-- Orbit -->
    <div class="row">
      <div class="large-8 medium-10 small-12 medium-centered columns">
        <ul class="home-orbit" data-orbit>
          <li>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/placeholderbanner.png">
            <div class="orbit-caption">
              Student Name 1
            </div>
          </li>
          <li>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/placeholderbanner.png">
            <div class="orbit-caption">
              Student Name 2
            </div>
          </li>
        </ul>
      </div>
      <!-- Navigation Arrows -->
      <a href="#" class="orbit-prev"><span></span></a>
      <a href="#" class="orbit-next"><span></span></a>
    </div>  
        
    <!-- Widget Boxes -->
    <div class="row" data-equalizer>
      <div class="large-4 medium-4 small-12 columns custom-panel">
        <h2 class="text-center" data-equalizer-watch>New to Central?</h2>
        <div class="text-center">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/placeholdersmall.png" />
        </div>
        <div class="row">
          <div class="small-12 medium-9 small-centered columns">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis non odio at mattis.</p>
            <a class="my-button" href="#">Course Information</a>
          </div>
        </div>
      </div>
      <div class="large-4 medium-4 small-12 columns custom-panel">
        <h2 class="text-center" data-equalizer-watch>Let us create your next project</h2>
        <div class="text-center">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/placeholdersmall.png" />
        </div>
        <div class="row">
          <div class="small-12 medium-9 small-centered columns">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis non odio at mattis.</p>
            <a class="my-button" href="#">Request a Job</a>
          </div>
        </div>
      </div>
      <div class="large-4 medium-4 small-12 columns custom-panel">
        <h2 class="text-center" data-equalizer-watch>Industry Representatives</h2>
        <div class="text-center">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/placeholdersmall.png" />
        </div>
        <div class="row">
          <div class="small-12 medium-9 small-centered columns">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis non odio at mattis.</p>
            <a class="my-button" href="#">Registration</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Latest Projects -->
    <div class="row">
      <div class="small-12 medium-10 medium-centered columns sub-banner">
        <h2 class="text-center">Latest Projects</h2>
      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-10 small-centered columns">
        <ul class="small-block-grid-2 medium-block-grid-4">
    
    
    <?php
      if ( is_user_logged_in() ) {
        include 'pri-proj.php';
      } else {
        include 'pub-proj.php';
      }
    ?>
        </ul>
      </div>
    </div>
    
    <div class="row">
      <div class="small-12 medium-6 columns medium-centered">
        <a class="my-button" href="#">See more Projects</a>
      </div>
    </div>
    <?php get_footer(); ?>