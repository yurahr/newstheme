<?php 
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
<div class="social-bar">
<div class="home-bottom-title">Социальные связи</div>
<?php if (get_option('gpress_fb') == 'Включить') { ?>
<a class="fb social-button" rel="nofollow" href="<?php echo stripslashes($gpress_fb_link); ?>" title="Facebook" target="_blank">Facebook</a>
<?php } ?>
<?php if (get_option('gpress_vk') == 'Включить') { ?>
<a class="vk social-button" rel="nofollow" href="<?php echo stripslashes($gpress_vk_link); ?>" title="Вконтакте" target="_blank">Вконтакте</a>
<?php } ?>
<?php if (get_option('gpress_tw') == 'Включить') { ?>
<a class="twi social-button" rel="nofollow" href="<?php echo stripslashes($gpress_tw_link); ?>" title="Twitter" target="_blank">Twitter</a>
<?php } ?>
<?php if (get_option('gpress_gp') == 'Включить') { ?>
<a class="gp social-button" rel="nofollow" href="<?php echo stripslashes($gpress_gp_link); ?>" title="Google +" target="_blank">Google +</a>
<?php } ?>
<?php if (get_option('gpress_in') == 'Включить') { ?>
<a class="in social-button" rel="nofollow" href="<?php echo stripslashes($gpress_in_link); ?>" title="Instagram" target="_blank">Instagram</a>
<?php } ?>
<?php if (get_option('gpress_yt') == 'Включить') { ?>
<a class="yt social-button" rel="nofollow" href="<?php echo stripslashes($gpress_yt_link); ?>" title="Youtube" target="_blank">Youtube</a>
<?php } ?>
<?php if (get_option('gpress_ok') == 'Включить') { ?>
<a class="ok social-button" rel="nofollow" href="<?php echo stripslashes($gpress_ok_link); ?>" title="Одноклассники" target="_blank">Одноклассники</a>
<?php } ?>
<?php if (get_option('gpress_rss_kind') == 'feedburner') { ?>
<a class="rss social-button" rel="nofollow" href="<?php echo stripslashes($gpress_rss_feed); ?>" title="Подпишись на RSS" target="_blank">RSS</a>
<?php } else { ?>
<a class="rss social-button" rel="nofollow" href="<?php bloginfo('rss_url');?>" title="Подпишись на RSS" target="_blank">RSS</a>
<?php } ?>
<div class="clear"></div></div><!--// social-bar -->