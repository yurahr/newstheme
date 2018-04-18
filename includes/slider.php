	<?php
global $options;
foreach ($options as $value) {
	if ( isset( $value['id'] ) ) {
	if (get_option( $value['id'] ) === FALSE) {
	$$value['id'] = $value['std'];
	} else {
		$$value['id'] = get_option( $value['id'] );
	}
  }
}
?>

<ul id="slippry-slides" class="clid">
    
    
     <?php 
     $params = array( 'width' => 1400, 'height' => 500,'crop' => true);
$base = array($gpress_pageslide_pic1);?>

<li title="<?php echo stripslashes($gpress_pageslide_title1); ?>">
<a href="<?php echo stripslashes($gpress_pageslide_link1); ?>" target="_blank">
<?php echo "<img alt='' src='" . bfi_thumb( $base[0], $params ) . "'/>"; ?>
   </a>
    </li>

    
        <?php  
        $params = array( 'width' => 1400, 'height' => 500,'crop' => true);
$base = array($gpress_pageslide_pic2);?>

<li title="<?php echo stripslashes($gpress_pageslide_title2); ?>">
<a href="<?php echo stripslashes($gpress_pageslide_link2); ?>" target="_blank">
<?php echo "<img alt='' src='" . bfi_thumb( $base[0], $params ) . "'/>"; ?>
    </a>
    </li>
    
    
    
        <?php  
       $params = array( 'width' => 1400, 'height' => 500,'crop' => true);
$base = array($gpress_pageslide_pic3);?>

<li title="<?php echo stripslashes($gpress_pageslide_title3); ?>">
<a href="<?php echo stripslashes($gpress_pageslide_link3); ?>" target="_blank">
<?php echo "<img alt=''  src='" . bfi_thumb( $base[0], $params ) . "'/>"; ?>
 </a>
    </li>
    
    
    
        <?php  
                $params = array( 'width' => 1400, 'height' => 500, 'crop' => true);
$base = array($gpress_pageslide_pic4);?>

<li title="<?php echo stripslashes($gpress_pageslide_title4); ?>">
<a href="<?php echo stripslashes($gpress_pageslide_link4); ?>" target="_blank">
<?php echo "<img alt=''  src='" . bfi_thumb( $base[0], $params ) . "'/>"; ?>
 </a>
    </li>
    

</ul>
 