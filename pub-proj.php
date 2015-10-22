<?php
    $args = array (
        'category__in' => 2,
        'showposts' => 4
        );
    $query = new WP_Query( $args );
    while ($query->have_posts()) {
        $query->the_post();
        echo '<li class="text-center"><div>';
        echo '<a href="#">';
        the_post_thumbnail('thumbnail');
        echo '</a>';
        echo '<div class="text-left">';
        echo '<p>' . the_title() . '</p>';
        echo '<p>Name of Student</p></div></div></li>';
    };
?>