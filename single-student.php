<?php get_header(); ?>
<div class="row">
    <div class="small-12 columns ">
        <h1><?php the_title(); ?></h1>
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        <?php
            echo get_field('bio');
            echo '<p>' . get_field('email') . '</p>';
            $image = get_field('pic');
            echo '<img src="' . $image['url'] . '" />';
        ?>
    </div>
</div>
<?php get_footer(); ?>