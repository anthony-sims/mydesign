<?php get_header(); ?>
<div class="row">
  <div class="small-12 columns ">
    <h1><?php the_title(); ?></h1>
  </div>
</div>
<div class="row">
  <div class="small-12 medium-12 medium-centered columns">
    <div class="row">
      <div class="small-12 medium-5 large-4 columns text-center">
        <?php the_post_thumbnail('medium'); ?>
      </div>
      <div class="small-12 medium-7 large-8 columns">
        <?php while ( have_posts() ) {
                the_post();
                the_content();
              }
              the_tags(' ');
        ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>