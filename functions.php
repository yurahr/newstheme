<?php 
// убираем мусор из шапки	
function removeHeadLinks() {
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');
add_theme_support( 'automatic-feed-links' );

// подключаем стили

function hr_newstheme_style() {
	wp_enqueue_style( 'style-css', get_stylesheet_uri() );
	wp_enqueue_style('fonts-css', get_template_directory_uri() . '/css/fonts.css');
	wp_enqueue_style('media-css', get_template_directory_uri() . '/css/media.css');	
	wp_enqueue_script('lipmenu', get_template_directory_uri() . '/js/lipmenu.js');
	wp_enqueue_script('button_top', get_template_directory_uri() . '/js/button_top.js', true, '3.9.1');
	// wp_enqueue_script('common-js', get_template_directory_uri() . '/js/common.js');
	// wp_enqueue_script('mCustomScrollbar', get_template_directory_uri() . '/jquery.mCustomScrollbar.css', array(''));
}
add_action( 'wp_enqueue_scripts', 'hr_newstheme_style' );
//
// подключаем bfi_thumb
require_once( 'includes/bfi_thumb.php' );

/*
  добавление сайдбара.*/

function hr_newstheme_my_widgets(){
	register_sidebar( array(
		'name' => "Правая боковая панель сайта",
		'id' => 'right-sidebar',
		'description' => 'Эти виджеты будут показаны в правой колонке сайта',
        'before_widget' => '<div class="category">',
		'before_title' => '<div class="title_category">',
		'after_title' => '</div><div class="cat_item">',
        'after_widget' => '</div></div><div class="clearfix">'
	) );
}
add_action( 'widgets_init', 'hr_newstheme_my_widgets' ); 
//

// подключаем миниатюры	
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-thumbnails' );
the_post_thumbnail('medium');
the_post_thumbnail('large');           
the_post_thumbnail('full');  
//
// подключаем шрифт awesome	
function hr_newstheme_load_font_awesome() {
	if ( !is_admin() ) { 
       wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', false, '4.2.0' );
	}
}	
add_action( 'wp_enqueue_scripts', 'hr_newstheme_load_font_awesome', 99 );
//

//подключаем меню
function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => 'Основное меню',
				'secondary-menu' => 'Мобильное меню'
		)
	);
}
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );
add_theme_support( 'post-formats', array( 'aside',  'audio',  'status', 'video', 'image' ) );

//произвольное меню
if ( function_exists( 'register_nav_menus' ) )
{
	register_nav_menus(
		array(
			'custom-menu'=>__('Мое меню'),
		)
	);
}

function custom_menu(){
	echo '<ul>';
	wp_list_pages('title_li=&');
	echo '</ul>';
}
//подключаем пагинацию страниц
function hr_newstheme_pagination( $args = array() ) {
    
    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => __( 'Предыдущая', 'text-domain' ),
        'next_string'     => __( 'Следующая', 'text-domain' ),
        'before_output'   => '<div class="next_page"><ul class="page_numbers">',
        'after_output'    => '</ul></div>'
    );
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'hr_newstheme_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );
    
    if ( $count <= 1 )
        return FALSE;
    
    if ( !$page )
        $page = 1;
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );
    
    // $firstpage = esc_attr( get_pagenum_link(1) );
    // if ( $firstpage && (1 != $page) )
    //     $echo .= '<li class="previous"><a href="' . $firstpage . '" class="page_numbers">' . __( 'First', 'text-domain' ) . '</a></li>';
    if ( $previous && (1 != $page) )
        $echo .= '<li><a href="' . $previous . '" class="page_numbers" title="' . __( 'previous', 'text-domain') . '">' . $args['previous_string'] . '</a></li>';
    
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<li class="active"><span class="page_numbers current">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</span></li>';
            } else {
                $echo .= sprintf( '<li><a href="%s" class="page_numbers">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<li><a href="' . $next . '" class="page_numbers" title="' . __( 'next', 'text-domain') . '">' . $args['next_string'] . '</a></li>';
    
    // $lastpage = esc_attr( get_pagenum_link($count) );
    // if ( $lastpage ) {
    //     $echo .= '<li class="next"><a href="' . $lastpage . '" class="page_numbers">' . __( 'Last', 'text-domain' ) . '</a></li>';
    // }
    if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
}
?>
