<div class="home-text-boxes-wrap">

<?php 
$featured_cat = get_option('gpress_feat_cat');
$category_id = get_cat_ID($featured_cat);

$the_query = new WP_Query( "cat='$category_id'&showposts=$gpress_feat_count");
if ( $the_query->have_posts() ) : ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


<div class="home-text-box">

<h2 class="home-text-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

<?php if(has_post_thumbnail()): ?>

<div class="index-thumb">
  <a href="<?php echo get_permalink(); ?>">
 <?php $params = array( 'width' => 170, 'height' => 170,'crop' => true);
$base = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
echo "<img alt='' src='" . bfi_thumb( $base[0], $params ) . "'/>"; ?>
  </a>
     </div>
 <?php  endif; ?>

<p><?php truncate_post($gpress_feat_word_count); ?></p>
<div class="clear"></div>


    </div>
     
 <?php endwhile; ?>
   <?php wp_reset_postdata(); ?>
   <?php endif; ?>


 
  <div class="clear"></div>
 
 </div><!-- end // icon-boxes-wrap -->
 