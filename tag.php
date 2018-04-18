<?php get_header(); ?>
    <section class="main-content">
        <div class="wrap clearfix">
            <div class="content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	<!--Код для вывода постов-->	
                <div class="post clearfix">
                    <h2 class="title_post"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2><!--Код для вывода заголовка к статьям-->
                    <div class="entry-info">&nbsp;&nbsp;<em class="fa fa-folder"></em>&nbsp;Категория: &nbsp;<?php the_category(', '); ?>&nbsp;&nbsp;&nbsp;&nbsp;<em class="fa fa-eye"></em>&nbsp;Просмотров: &nbsp;<?php
if(function_exists('get_post_views')) { 
        echo get_post_total_views();
}
 ?></div><!--Подключили код счетчика просмотров для плагина post_views и вывод категории-->
                    <div class="text_post"><!--Начало кода вывода анонсов-->
                        <a href="<?php the_permalink();?>"><?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail( array(250,250, true), array('class' => 'img_post') ); ?></a>
                        <?php the_excerpt( ); ?><!--Код для вывода анонса к статьям-->
                    </div><!--Конец text_post-->
                </div><!--Конец post-->
<?php endwhile;  ?>
<?php else : ?>
<?php endif; ?>

                
            </div><!--Конец content-->
<?php get_sidebar(); get_footer(); ?>