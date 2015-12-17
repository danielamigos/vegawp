<?php
/*
 *  Author: Daniel Valenzuela | Daniel Valenzuela
 *  URL: danielvalenzuela.com.mx | Daniel Valenzuela
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('vegapoolpros', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Vega Pool Pros navigation
function vegapoolpros_main()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'main-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<div class="row main-menu">%3$s</div>',
		'depth'           => 0,
		'walker'          => new MainMenu_Walker
		)
	);
}
function vegapoolpros_secondary()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'secondary-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="secondary-menu">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}
function vegapoolpros_footer()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu',
		'menu'            => '',
		'container'       => 'div',
		//'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="footer-menu">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load Vega Pool Pros scripts (header.php)
function vegapoolpros_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	//wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        //wp_enqueue_script('conditionizr'); // Enqueue it!

        //wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        //wp_enqueue_script('modernizr'); // Enqueue it!
        
        wp_register_script('bootstrap', get_template_directory_uri() . '/js/lib/bootstrap.min.js', array('jquery'), '3.3.6'); // Custom scripts
        wp_enqueue_script('bootstrap'); // Enqueue it!

        wp_register_script('vegapoolprosscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('vegapoolprosscripts'); // Enqueue it!
    }
}

// Load Vega Pool Pros conditional scripts
function vegapoolpros_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
    if (is_front_page()) {
        wp_register_script('frontpagescript', get_template_directory_uri() . '/js/frontpage.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('frontpagescript'); // Enqueue it!
    }
}

// Load Vega Pool Pros styles
function vegapoolpros_styles()
{
    //wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    //wp_enqueue_style('normalize'); // Enqueue it!
    
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all');
    wp_enqueue_style('bootstrap'); // Enqueue it!

    wp_register_style('vegapoolpros', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('vegapoolpros'); // Enqueue it!
}

// Register Vega Pool Pros Navigation
function register_vega_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'main-menu' => __('Main Menu', 'vegapoolpros'), // Main Navigation
        'secondary-menu' => __('Secondary Menu', 'vegapoolpros'), // Sidebar Navigation
        'footer-menu' => __('Footer Menu', 'vegapoolpros') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'vegapoolpros'),
        'description' => __('Description for this widget-area...', 'vegapoolpros'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'vegapoolpros'),
        'description' => __('Description for this widget-area...', 'vegapoolpros'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function vegawp_pagination()
{
    global $wp_query;
    $vega = 999999999;
    echo paginate_links(array(
        'base' => str_replace($vega, '%#%', get_pagenum_link($vega)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function vegawp_index($length) // Create 20 Word Callback for Index page Excerpts, call using vegawp_excerpt('vegawp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using vegawp_excerpt('vegawp_custom_post');
function vegawp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function vegawp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function vega_pool_pros_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'vegapoolpros') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
	if (!current_user_can('administrator') && !is_admin()) 
	{
		return false;	
	}
	return true;
}

// Remove 'text/css' from our enqueued stylesheet
function vega_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function vegapoolprosgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function vegapoolproscomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'vegapoolpros_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'vegapoolpros_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'vegapoolpros_styles'); // Add Theme Stylesheet
add_action('init', 'register_vega_menu'); // Add Vega Pool Pros Menu
//add_action('init', 'create_post_type_vega'); // Add our Vega Pool Pros Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'vegawp_pagination'); // Add our Vega Pool Pros Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'vegapoolprosgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'vega_pool_pros_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'vega_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('vega_shortcode_demo', 'vega_shortcode_demo'); // You can place [vega_shortcode_demo] in Pages, Posts now.
add_shortcode('vega_shortcode_demo_2', 'vega_shortcode_demo_2'); // Place [vega_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [vega_shortcode_demo] [vega_shortcode_demo_2] Here's the page title! [/vega_shortcode_demo_2] [/vega_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called vega-pool-pros
/*
function create_post_type_vega()
{
    register_taxonomy_for_object_type('category', 'vega-pool-pros'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'vega-pool-pros');
    register_post_type('vega-pool-pros', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Vega Pool Pros Custom Post', 'vegapoolpros'), // Rename these to suit
            'singular_name' => __('Vega Pool Pros Custom Post', 'vegapoolpros'),
            'add_new' => __('Add New', 'vegapoolpros'),
            'add_new_item' => __('Add New Vega Pool Pros Custom Post', 'vegapoolpros'),
            'edit' => __('Edit', 'vegapoolpros'),
            'edit_item' => __('Edit Vega Pool Pros Custom Post', 'vegapoolpros'),
            'new_item' => __('New Vega Pool Pros Custom Post', 'vegapoolpros'),
            'view' => __('View Vega Pool Pros Custom Post', 'vegapoolpros'),
            'view_item' => __('View Vega Pool Pros Custom Post', 'vegapoolpros'),
            'search_items' => __('Search Vega Pool Pros Custom Post', 'vegapoolpros'),
            'not_found' => __('No Vega Pool Pros Custom Posts found', 'vegapoolpros'),
            'not_found_in_trash' => __('No Vega Pool Pros Custom Posts found in Trash', 'vegapoolpros')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom Vega Pool Pros post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}
*/

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function vega_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function vega_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}


function vega_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'vega_logo_section' , array(
		'title'       => __( 'Logo', 'vega' ),
		'priority'    => 30,
		'description' => 'Upload a logo for the page headers.',
	) );
	
	$wp_customize->add_setting( 'vega_logo' );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'vega_logo', array(
		'label'    => __( 'Logo', 'vega' ),
		'section'  => 'vega_logo_section',
		'settings' => 'vega_logo',
	) ) );

}
add_action('customize_register', 'vega_theme_customizer');


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	/*
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Front Page Slideshow',
		'menu_title'	=> 'Front Page Slideshow',
		'parent_slug'	=> 'theme-general-settings',
	));	*/
}

require_once('main_menu_navwalker.php');
?>
