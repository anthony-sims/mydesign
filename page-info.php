<?php get_header(); ?>
<div class="row">
<?php if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            the_content();
        }
}
    $page = get_page($id);
    child_page_content($page->ID);
?>
</div>
<?php get_footer(); ?>