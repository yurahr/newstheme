<?php get_header(); ?>
    <section class="main-content">
        <div class="wrap clearfix">
            <div class="content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	<!--Код для вывода постов-->	
                <div class="post clearfix">
                    <h2 class="title_post"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2><!--Код для вывода заголовка к статьям-->
					<!--Подключаем код счетчика просмотров для плагина post_views и вывод категории-->
                    <div class="entry-info">
<i class="fa fa-user" aria-hidden="true"></i>
<?php the_author(); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em class="fa fa-folder" aria-hidden="true"></em>&nbsp;Категория: &nbsp;<?php the_category(', '); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<em class="fa fa-clock-o" aria-hidden="true"></em><?php the_time('j F Y'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em class="fa fa-eye"></em>&nbsp;Просмотров: &nbsp;<?php
if(function_exists('get_post_views')) { 
        echo get_post_total_views();
}
 ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em class="fa fa-comments-o"></em> <?php comments_popup_link('Нет комментариев', '1 комментарий ', ' % коммент.'); ?></div><!--Подключили код счетчика просмотров для плагина post_views и вывод категории-->
                    <div class="text_post"><!--Начало кода вывода анонсов-->
                        <a href="<?php the_permalink();?>"><?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail( array(250,250, true), array('class' => 'img_post') ); ?></a>
                        <?php the_excerpt( ); ?><!--Код для вывода анонса к статьям-->
                        <p><a  class="read_more" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">Узнать подробнее</a></p>
                    </div><!--Конец text_post-->
                </div><!--Конец post-->
<?php endwhile;  ?>
<?php hr_newstheme_pagination ();?><!--пагинация-->
<?php else : ?>
<?php endif; ?> 
<!-- код кнопки на верх-->
    <div id="back-top"><i class="fa fa-arrow-circle-o-up"></i>
</div><!-- конец кода кнопки на верх-->               
            </div><!--Конец content-->
<?php get_sidebar(); ?> 
<?php get_footer(); ?>