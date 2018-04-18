<?php get_header(); ?>
    <section class="main-content">
        <div class="wrap clearfix">
            <div class="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
                <div class="full_post">
                    <h1 class="title_post"><?php the_title(); ?></h1>
                    <div class="entry-info">&nbsp;&nbsp;<em class="fa fa-folder"></em>&nbsp;Категория: &nbsp;<?php the_category(', '); ?>&nbsp;&nbsp;&nbsp;&nbsp;<em class="fa fa-eye"></em>&nbsp;Просмотров: &nbsp;<?php
if(function_exists('get_post_views')) { 
        echo get_post_total_views();
}
 ?></div><!--Подключили код счетчика просмотров для плагина post_views-->
                    <div class="text_post"><?php the_content( ); ?></div>
                </div><!--Конец full_post-->
                <!--вывод комментариев-->
<?php comments_template(); ?>
<!--конец вывода комментариев-->
<?php endwhile;  ?>
<?php else : ?>
<?php endif; ?>
            </div><!--Конец content-->
<?php get_sidebar(); ?>	
<?php get_footer(); ?>