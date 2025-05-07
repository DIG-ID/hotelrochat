<?php
/**
 * Setup theme
 */
function rochat_theme_setup() {

	register_nav_menus(
		array(
			'main-menu'      => __( 'Main Menu', 'hotelrochat' ),
			'main-mega-menu' => __( 'Main Mega Menu', 'hotelrochat' ),
			'secondary-menu' => __( 'Secondary Menu', 'hotelrochat' ),
			'copyright-menu' => __( 'Copyright Menu', 'hotelrochat' ),
		)
	);

	add_theme_support( 'menus' );

	add_theme_support( 'custom-logo' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	add_image_size( 'zimmer-image', 500, 334, array( 'center', 'center' ) );

	add_image_size( 'gallery-thumbs', 350, 200, array( 'center', 'center' ) );

}

add_action( 'after_setup_theme', 'rochat_theme_setup' );

/**
 * Register our sidebars and widgetized areas.
 */
function rochat_theme_footer_widgets_init() {

	register_sidebar(
		array(
			'name'          => 'Footer',
			'id'            => 'footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		),
	);

	register_sidebar(
		array(
			'name'          => 'Header Language Switcher',
			'id'            => 'header_ls',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

}

add_action( 'widgets_init', 'rochat_theme_footer_widgets_init' );

if ( ! function_exists( 'rochat_get_font_face_styles' ) ) :
	/**
	 * Get font face styles.
	 * This is used by the theme or editor to inject @import for Google Fonts.
	 */
	function rochat_get_font_face_styles() {
		return "
			@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Prata&display=swap');
		";
	}
endif;

if ( ! function_exists( 'rochat_preload_webfonts' ) ) :
	/**
	 * Preloads Google Fonts to improve performance.
	 */
	function rochat_preload_webfonts() {
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<?php
	}
endif;

add_action( 'wp_head', 'rochat_preload_webfonts' );


/**
 * Enqueue styles and scripts
 */
function rochat_theme_enqueue_styles() {

	//Get the theme data
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	// Register Theme main style.
	wp_register_style( 'theme-styles', get_template_directory_uri() . '/dist/css/main.css', array(), $theme_version );
	// Add styles inline.
	wp_add_inline_style( 'theme-styles', rochat_get_font_face_styles() );
	// Enqueue theme stylesheet.
	wp_enqueue_style( 'theme-styles' );
	//https://use.typekit.net/evg0ous.css first loaded fonts library backup
	//wp_enqueue_style( 'theme-fonts', 'https://use.typekit.net/buy6qwo.css', array(), $theme_version );

	wp_enqueue_script( 'jquery', false, array(), $theme_version, true );
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/dist/js/main.js', array( 'jquery' ), $theme_version, true );

	wp_enqueue_script( 'google-map-settings', get_stylesheet_directory_uri() . '/assets/js/google-maps.js', array( 'jquery' ), $theme_version, true );
	wp_enqueue_script( 'google-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBAZN5TfX1aWmjodZ4e_6sOcaJV4D59jfo&callback=initMap', array(), $theme_version, true );
}

add_action( 'wp_enqueue_scripts', 'rochat_theme_enqueue_styles' );

//Google Map Init
function aare_theme_google_map_init() {
	if ( is_admin() ) :
		acf_update_setting( 'google_api_key', 'AIzaSyBAZN5TfX1aWmjodZ4e_6sOcaJV4D59jfo' );
	endif;
}

add_action( 'acf/init', 'aare_theme_google_map_init' );

/**
 * Remove <p> Tag From Contact Form 7.
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Lowers the metabox priority to 'core' for Yoast SEO's metabox.
 *
 * @param string $priority The current priority.
 *
 * @return string $priority The potentially altered priority.
 */
function rochat_theme_lower_yoast_metabox_priority( $priority ) {
	return 'core';
}

add_filter( 'wpseo_metabox_prio', 'rochat_theme_lower_yoast_metabox_priority' );


/**
 * Search form
 */
add_action('rest_api_init', function () {
    register_rest_route('basel-erlebnis/v1', '/search', [
        'methods'             => 'GET',
        'callback'            => 'search_basel_erlebnis',
        'permission_callback' => '__return_true',
    ]);
});

function search_basel_erlebnis(WP_REST_Request $request) {
    $term = sanitize_text_field($request->get_param('s'));
    $results = [];

    $query = new WP_Query([
        'post_type'      => 'basel-erlebnis',
        'posts_per_page' => 20,
        'post_status'    => 'publish',
    ]);

    foreach ($query->posts as $post) {
        $match = false;
        $title = get_the_title($post);
        $excerpt = '';

		$intro = get_field('intro_description', $post->ID);
		if ($intro) {
			$excerpt = wp_trim_words(strip_tags($intro), 30, '...');
		} elseif ($content_rows = get_field('content', $post->ID)) {
			foreach ($content_rows as $row) {
				if (!empty($row['text'])) {
					$excerpt = wp_trim_words(strip_tags($row['text']), 30, '...');
					break;
				}
			}
		}

        $link = get_permalink($post);

        // Check ACF fields (add any that apply)
        $intro_description = get_field('intro_description', $post->ID);
        $content_rows = get_field('content', $post->ID); // repeater

        // Look for match in title, excerpt, or ACF fields
        if (
            stripos($title, $term) !== false ||
            stripos($excerpt, $term) !== false ||
            stripos($intro_description, $term) !== false
        ) {
            $match = true;
        }

        // Also check content repeater subfields
        if (!$match && is_array($content_rows)) {
            foreach ($content_rows as $row) {
                if (
                    !empty($row['main_title']) && stripos($row['main_title'], $term) !== false ||
                    !empty($row['title']) && stripos($row['title'], $term) !== false ||
                    !empty($row['text']) && stripos($row['text'], $term) !== false
                ) {
                    $match = true;
                    break;
                }
            }
        }

        if ($match) {
            $results[] = [
                'title'   => $title,
                'excerpt' => $excerpt,
                'link'    => $link,
            ];
        }
    }

    return rest_ensure_response($results);
}




// Theme custom template tags.
require get_template_directory() . '/inc/theme-template-tags.php';

// The theme admin settings.
require get_template_directory() . '/inc/theme-admin-settings.php';

// The theme custom menu walker settings.
require get_template_directory() . '/inc/theme-custom-menu-walker.php';

function my_console_log(...$data) {
	$json = json_encode($data);
	add_action('shutdown', function() use ($json) {
		 echo "<script>console.log({$json})</script>";
	});
}