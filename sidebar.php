<aside class="sidebar">
<form id="search" action="<?php echo home_url( '/' ); ?>">
<input type="text" value="Поиск по сайту" name="s" id="sfor" onfocus="if (this.value == 'Поиск по сайту') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Поиск по сайту';}"  />
<em class="fa fa-search"></em>
</form>
<?php dynamic_sidebar( 'right-sidebar' ); ?>
</aside><!-- #secondary -->

