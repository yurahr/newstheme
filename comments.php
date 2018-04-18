<!-- проверка страницы на пароль -->
<?php
if ( post_password_required() )
    return;
?>
<!--общий блок вывода и добавления комментариев-->
<div id="comments" class="comments-area">
<!--показывает, сколько комментариев уже написано-->
    <?php if ( have_comments() ) : ?>
<!--заголовок над комментариями-->
        <h2 class="comments-title">       
            <span class="comment-title"> Обсуждение: <?php comments_number(' пока нет комментариев', 'есть 1 комментарий', 'оставлено % коммент.' );?></span>
        </h2>
<!--показывает комментарии и аватары авторов-->
        <ol class="comment-list">
            <?php 
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                ) );
            ?>
        </ol>
<!--конец блока показа комментариев и аватаров авторов-->
<!--если комментариев много, выводится навигация по ним-->
        <?php
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'newstheme' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'newstheme' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'newstheme' ) ); ?></div>
        </nav>
<!-- конец навигации комментариев -->
        <?php endif; ?>
<!-- если комментарии закрыты, выводится сообщение -->
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.' , 'newstheme' ); ?></p>
<!--закрывается цикл комментариев и показывается форма их добавления-->
        <?php endif; ?>
    <?php endif; ?>
<!--конец блока вывода комментариев-->
<!--вывод формы добавления комментариев-->
    <?php comment_form(); ?>
 
</div>
<!--конец общего блока вывода и добавления комментариев-->