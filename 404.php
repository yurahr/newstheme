<?php get_header(); ?>

    <section>
        <div class="wrap clearfix">
           <!-- <div class="content">-->
           <div class="error_img"><img src="http://inf/wp-content/uploads/2016/12/404.jpg" alt=""></div>
           <div class="error_text">
<p>Дорогой посетитель, Вы находитесь на сайте: <strong>"<?php bloginfo('name'); ?>"</strong>,
но раз Вы видите эту страницу, значит ссылка, по который Вы пришли, неправильная, или информация, которыя раньше была доступна этой ссылке, перемещена в другой раздел сайта. </p><p>Не спешите уходить, скорее всего то, что вы искали, до сих пор здесь. Используйте поиск, чтобы найти нужную вам информацию или посмотрите ее в других категориях сайта.</p>
 </div>          
<form id="search2" action="<?php echo home_url( '/' ); ?>">
<input type="text" value="Поиск по сайту: запрос + enter" name="s" id="sfor" onfocus="if (this.value == 'Поиск по сайту: запрос + enter') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Поиск по сайту: запрос + enter';}"  />
</form>
 <p>&nbsp;</p>
<!-- <div class="clear"></div> -->
<ul class="nice-cats">
<p style="text-align:center">Все категории сайта</p>

        <?php wp_list_categories("sort_column=name&title_li=&hierarchical=0&show_count=1"); ?>
    </ul>
     <!--</div>Конец content-->
<?php get_footer(); ?>