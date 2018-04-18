<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php if ( is_front_page() ) { ?><?php bloginfo('name'); ?> <?php } ?><?php wp_title(''); ?></title>
	<meta name="description" content="Блог любителя"/>
    <meta name="keywords" content="Полезные статьи"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="fonts.css">-->
    <!--<link rel="stylesheet" href="media.css">-->
    <!--<link rel="stylesheet" href="jquery.mCustomScrollbar.css">-->    
    <!--<script src="js/jquery.mCustomScrollbar.concat.min.js">-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>   
    <header>
    <div id="header">
        <div class="header_container" >
            <div class="title_text"><a href="http://mysite"><?php echo get_bloginfo('name'); ?></a></div>
            <p><?php echo get_bloginfo('description'); ?></p>
        </div>
        <div class="clear"></div>
        </div>
        <!-- меню навигации сайта -->
    <div class="menunav">
    <!-- <button class="mob-menu-button"><i class="fa fa-bars"></i><span>Навигация</span></button> -->
<?php
                if ( function_exists( 'wp_nav_menu' ) )
                    wp_nav_menu( 
                        array( 
                        'theme_location' => 'custom-menu',
                        'fallback_cb'=> 'custom_menu',
                        'container' => 'ul',
                        'menu_id' => 'inner',
                        'menu_class' => 'inner') 
                    );
                else custom_menu();
                ?></div> 
    </header>
    

