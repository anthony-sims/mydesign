    <!-- footer -->
    <div class="footer">
        <div class="row">
            <div class="large-3 columns">
                <img src="<?php echo get_theme_mod('mydesign_footer_image'); ?>" />
            </div>
            <div class="large-6 columns">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-nav' ) ); ?>
            </div>
            <div class="large-3 columns">
            </div>
        </div>
    </div>
    
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/foundation/js/foundation.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/foundation/js/foundation/foundation.orbit.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/foundation/js/foundation/foundation.accordion.js"></script>
    <script>
        $(document).foundation({
            accordion: {
                // specify the class used for accordion panels
                content_class: 'content',
                // specify the class used for active (or open) accordion panels
                active_class: 'active',
                // allow multiple accordion panels to be active at the same time
                multi_expand: true,
                // allow accordion panels to be closed by clicking on their headers
                // setting to false only closes accordion panels when another is opened
                toggleable: true
            }
        });
    </script>
    <?php wp_footer(); ?>
  </body>
</html>