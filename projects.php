<?php
    $args = array (
        'showposts' => 4
        );
    $query = new WP_Query( $args );
    while ($query->have_posts()) {
        $query->the_post();
        $fields = get_field('link');
        //print_r($fields);
        echo '<li class="text-center"><div>';
        echo '<a href="' . get_permalink() . '">';
        the_post_thumbnail('thumbnail');
        echo '</a>';
        echo '<div class="text-left"><p>';
        echo the_title() . '</p>';
        echo '<a href="' . get_permalink($fields->ID) . '">' . $fields->post_title . '</a></div></div></li>';
    };
?>