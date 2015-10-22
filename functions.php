<?php
    include_once('advanced-custom-fields/acf.php');
    add_action( 'after_setup_theme', 'register_my_nav' );
    add_action( 'after_setup_theme', 'custom_theme_setup' );
    function register_my_nav() {
        register_nav_menus( array(
        	'main-nav' => 'Main Navigation',
        	'footer-nav' => 'Footer Navigation',
        ) );
    };

    function get_name() {
        $current_user = wp_get_current_user();
        if ( !$current_user->user_firstname ) {
            return $current_user->user_login;
        } else {
            return $current_user->user_firstname;
        }
    } 
    
    function custom_theme_setup() {
        $args = array(
            'flex-height' => true,
            'height' => 70,
            'flex-width' => true,
            'width' => 350,
            'default-image' => get_template_directory_uri() . '/images/header.jpg',
            'uploads' => true );
            
	    add_theme_support( 'custom-header', $args );
	    add_theme_support( 'post-thumbnails' );
    }
    function mobile_nav() {
        $menu_name = 'main-nav';

        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
        	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        	$menu_items = wp_get_nav_menu_items($menu->term_id);
	        $menu_list = '<div class="icon-bar four-up hide-for-large-up my-icon-bar small-12 columns">';
	        
        	foreach ( (array) $menu_items as $key => $menu_item ) {
                $title = $menu_item->title;
	            $url = $menu_item->url;
	            $menu_list .= '<a href="' . $url . '">' . '<i class="fi-' . nav_img_switch($title) . '"></i><label>' . $title . '</label></a>';
	        }
	        
	        $menu_list .= '</div>';
            } else {
	            $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
            }
            // $menu_list now ready to output
            echo $menu_list;
    }
    function nav_img_switch($title) {
        switch ($title) {
            case 'Home':
                return 'home';
                break;
            case 'Courses':
                return 'info';
                break;
            case 'Login':
                return 'torso';
                break;
            case 'Projects':
                return 'laptop';
                break;
            default:
                return 'page';
        }
    }
    add_action( 'customize_register', 'mydesign_customize_register' );
    function mydesign_customize_register($wp_customize) {
        // Add Section called Advanced Options
        $wp_customize->add_section(
            'mydesign_advanced_options',
            array(
                'title'     => 'Advanced Options',
                'priority'  => 201
            )
        );
        // Add Setting for Footer Image
        $wp_customize->add_setting(
            'mydesign_footer_image',
            array(
                'default'      => '',
                'transport'    => 'refresh'
            )
        );
        $wp_customize->add_setting(
            'mydesign_left_box',
            array(
                'default'      => '',
                'transport'    => 'refresh'
            )
        );
        // Add Control for Footer Image
        $wp_customize->add_control(
            new WP_Customize_Upload_Control(
                $wp_customize,
                'mydesign_footer_image',
                array(
                    'label'    => 'Footer Image',
                    'settings' => 'mydesign_footer_image',
                    'section'  => 'mydesign_advanced_options'
                )
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'mydesign_left_box',
                array(
                    'label'    => 'Left Box',
                    'settings' => 'mydesign_left_box',
                    'section'  => 'static_front_page'
                )
            )
        );
        
    }
    function the_title_trim($title) {
      $pattern[0] = '/Protected:/';
      $pattern[1] = '/Private:/';
      $replacement[0] = ''; // Enter some text to put in place of Protected:
      $replacement[1] = ''; // Enter some text to put in place of Private:
    
      return preg_replace($pattern, $replacement, $title);
    }
    add_filter('the_title', 'the_title_trim');
    
    function child_page_content($parentID) {
        $i = 1;
        $my_wp_query = new WP_Query();
        $all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'post_parent' => $parentID));
        
        // Get the page as an Object
        $thePage =  get_page($parentID);
        
        // Filter through all pages and find Portfolio's children
        $pageChildren = get_page_children( $thePage->ID, $all_wp_pages );
        
        // echo what we get back from WP to the browser
        //echo '<pre>' . print_r( $pageChildren, true ) . '</pre>';
        echo '<h2>Course Information</h2><ul class="accordion" data-accordion>';
        foreach ($pageChildren as $pageChild) {
            echo '<li class="accordion-navigation"><a href="#panel' . $i . '">' . $pageChild->post_title . '</a>';
            if ($i == 1) {
                echo '<div id="panel' . $i . '" class="content active">';
                grandchild_page_content($pageChild->ID, $i);
                echo '</div></li>';
            } else {
                echo '<div id="panel' . $i . '" class="content">';
                grandchild_page_content($pageChild->ID, $i);
                echo '</div></li>';
            }
            $i++;
        }
        echo '</ul>';
    }
    
    function grandchild_page_content($parentID, $i) {
        $x = 'a';
        $my_wp_query = new WP_Query();
        $all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'post_parent' => $parentID));
        
        // Get the page as an Object
        $thePage =  get_page($parentID);
        
        // Filter through all pages and find Portfolio's children
        $pageChildren = get_page_children( $thePage->ID, $all_wp_pages );
        
        // echo what we get back from WP to the browser
        //echo '<pre>' . print_r( $pageChildren, true ) . '</pre>';
        echo '<ul class="accordion" data-accordion>';
        foreach ($pageChildren as $pageChild) {
            echo '<li class="accordion-navigation"><a href="#panel' . $i . $x . '">' . $pageChild->post_title . '</a>';
            echo '<div id="panel' . $i . $x . '" class="content">' . $pageChild->post_content . '</div></li>';
            $x++;
        }
        echo '</ul>';
    }
    
    function codex_custom_init() {
	$labels = array(
		'name'               => _x( 'Students', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Student', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Students', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Student', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'student', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Student', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Student', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Student', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Student', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Students', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Students', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Students:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Students found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Students found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'student' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'student', $args );
}
    add_action( 'init', 'codex_custom_init' );
?>