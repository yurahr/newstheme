<?php get_header(); ?>
    <section class="main-content">
        <div class="wrap clearfix">
            <div class="content">
			<!-- <div class="search_pg">Для вашего поискового запроса: "<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('"</span>'); _e(' найдено '); echo $count . ' '; _e('статьи. '); wp_reset_query(); ?></div> -->
			<div class="search_pg">Вы искали статьи со словом: <?php the_search_query(); ?></div>
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
<?php hr_newstheme_pagination ();?><!--пагинация-->
<?php else : ?>
<div class="search_pg">К сожалению, по вашему запросу на сайте нет статей, попробуйте изменить запрос.</div>
<?php endif; ?> 
<!-- код кнопки на верх-->
    <div id="back-top"><i class="fa fa-arrow-circle-o-up"></i>
</div><!-- конец кода кнопки на верх-->               
            </div><!--Конец content-->
<?php get_sidebar(); ?> 
<?php get_footer(); ?>
