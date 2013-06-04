<?php
/**
 * Page Template
 *
 * Main index page<br />
 * Displays greetings, welcome text (define-page content), and various centerboxes depending on switch settings in Admin<br />
 * Centerboxes are called as necessary
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_index_default.php 3464 2006-04-19 00:07:26Z ajeh $
 */
?>
<?php  if ($this_is_home_page) { ?>


			<div id="mj-slideshow">
            	<div class="mj-subcontainer">
            		 <div class="flexslider">
                      <ul class="slides">
                      	
                        <!--Slide-1-->
                      	<li>
                             <div class="caption_text">
                                    <p class="flex-caption">Furniture </p>
                                            <div class="slide-description">
                                            	<p>Exclusive range of Furnitures to Decorate your Home and Office.</p>
                                            </div>
                                   
                                    <div class="content">
                                            <div class="button-wrapper">
                                            	<div class="a-btn">
                                                	<a href="index.php?main_page=product_info&cPath=66_76&products_id=208"<span class="a-btn-text">Shop now!</span></a> 
                                                    <a href="index.php?main_page=index&pg=store&cPath=66_75"><span class="a-btn-slide-text">View More</span></a>
													<span class="a-btn-icon-right"><span></span></span>
                                                </div>
                                            </div>
                                    </div>
                              </div>
                            <div class="slide_img">
                            	<div class="price-tag" style="background:#A52223;">
                                		<div style="color:#FFFFFF">
                                        		<span class="tag">Special</span>
                                                <span class="price">$428</span>
                                                <span class="discount">-25%</span>
                                       </div>
                                </div>
                              <img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/slideshow/bed-2.png'?>" alt="Slide-3" />
                            </div>
                        </li>
                        <!--Slide-1 ends-->
                        <!--Slide-2-->
                      	<li>
                            <div class="caption_text">
                                        <p class="flex-caption">Living room</p>
                                                <div class="slide-description">
                                                	<p>Fabulous fabric sofa collection - Jute, Leather or Silk.</p>
                                                </div>
                                        
                                        <div class="content">
                                            <div class="button-wrapper">
                                            	<div class="a-btn">
                                                	<a href="index.php?main_page=product_info&cPath=65_80&products_id=214"><span class="a-btn-text">Shop now!</span></a> 
                                                    <a href="index.php?main_page=index&cPath=65_80"><span class="a-btn-slide-text">View More</span></a>
													<span class="a-btn-icon-right"><span></span></span>
                                                </div>
                                            </div>
                                        </div>
                              </div>
                            <div class="slide_img">
                            	<div class="price-tag" style="background:#23054F">
                                			 <div style="color:#FFFFFF">
                                        		<span class="tag">Special</span>
                                                <span class="price">$428</span>
                                                <span class="discount">-25%</span>
                                            </div>
                                </div>
                                
                              <img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/slideshow/sofa-1.png'?>" alt="Slide-2" />
                            </div>
                        </li>
                        <!--Slide-2 ends-->
                        <!--Slide-3-->
                        <li>
                             <div class="caption_text">
                                <p class="flex-caption"> Bedroom Collection</p>
                                        <div class="slide-description">
                                        	<p>Range of beds, Pillows, bedsides, dressing tables and Mattresses.</p>
                                        </div>
                                
                                <div class="content">
                                            <div class="button-wrapper">
                                            	<div class="a-btn">
 													<a href="index.php?main_page=product_info&cPath=66_68&products_id=191"><span class="a-btn-text">Shop now!</span></a>
                                                    <a href="index.php?main_page=index&pg=store&cPath=66_76"><span class="a-btn-slide-text">View More</span></a>
													<span class="a-btn-icon-right"><span></span></span>
                                                </div>
                                            </div>
                                 </div>
                              </div>
                            <div class="slide_img">
                            	<div class="price-tag" style="background:#3692CA;">
                                		 <div style="color:#FFFFFF">
                                        		<span class="tag">Special</span>
                                                <span class="price">$428</span>
                                                <span class="discount">-25%</span>
                                        </div>
                                </div>
                              <img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/slideshow/bed-3.png'?>" alt="Slide-5" />
                            </div>
                        </li>
                        <!--Slide-3 ends-->
                        <!--Slide-4-->
                        <li>
                             <div class="caption_text">
                                <p class="flex-caption">Vintage Sofa</p>
                                        <div class="slide-description">
                                        	<p>Hand crafted vintage collection of sofas and chairs.</p>
                                        </div>
                                
                                <div class="content">
                                            <div class="button-wrapper">
                                            	<div class="a-btn">
                                                	<a href="index.php?main_page=product_info&cPath=65_81&products_id=215"><span class="a-btn-text">Shop now!</span></a>
                                                    <a href="index.php?main_page=index&pg=store&cPath=65_81"><span class="a-btn-slide-text">View More</span></a>
													<span class="a-btn-icon-right"><span></span></span>
                                                </div>
                                            </div>
                                 </div>
                              </div>
                            <div class="slide_img">
                            	<div class="price-tag" style="background:#322416;">
                                		 <div style="color:#FFFFFF">
                                        		<span class="tag">Special</span>
                                                <span class="price">$428</span>
                                                <span class="discount">-25%</span>
                                        </div>
                                </div>
                              <img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/slideshow/sofa-2.png'?>" alt="Slide-4" />
                            </div>
                        </li>
                        <!--Slide-4 ends-->
                        <!--Slide-5-->
                        <li>
                            <div class="caption_text">
                                  <p class="flex-caption">King and Queen Beds </p>
                                        <div class="slide-description">
                                             <p>We offer 30 months interest free credit and 24 X 7 helpline.</p>
                                        </div>
                                 
                                  <div class="content">
                                        <div class="button-wrapper">
                                        	<div class="a-btn">
                                            	<a href="index.php?main_page=product_info&cPath=66_68&products_id=188"><span class="a-btn-text">Shop now!</span></a> 
                                                <a href="index.php?main_page=index&pg=store&cPath=66_68"><span class="a-btn-slide-text">View More</span></a>
												<span class="a-btn-icon-right"><span></span></span>
                                            </div>
                                        </div>
                                  </div>
                             </div>
                            <div class="slide_img">
                            	<div class="price-tag" style="background:#FAD575;">
                                		 <div style="color:#6B5444">
                                        		<span class="tag">Special</span>
                                                <span class="price">$428</span>
                                                <span class="discount">-25%</span>
                                        </div>
                                </div>
                              <img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/slideshow/bed-1.png'?>" alt="Slide-1" />
                            </div>
                        </li>
                        <!--Slide-5 ends-->
                      </ul>
                    </div>
               </div> 
			</div>


			<div id="mj-featured1">
                <!--div class="mj-subcontainer">
                    <div class="mj-grid96">
                    		<div class="mj-grid16 mj-rspace mj-lspace">Free Shipping</div>
                            <div class="mj-grid80 mj-rspace mj-lspace">On Orders Over $599. This Offer is valid on all our Store Items.</div>
                     </div>
                </div-->	
            </div>
            
            
<div id="headerpic">
<?php
    if (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2)) {
                if ($banner->RecordCount() > 0) {
?>
      <div id="bannerTwo" class="banners"><?php echo zen_display_banner('static', $banner);?></div>
	  
	 <?php } } ?>
</div>
<?php }  ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('a.moduleBox').click(function() { // show selected module(s)
    // variables
      var popID = $(this).attr('rel');
      var popNAV = $(this).attr('class');
    // clear out menu styles and apply active
      $('a.moduleBox').css('background', '');
      $(this).css('background', '');
    // hide all wrappers and display the one selected
      $('.centerBoxWrapper').hide();
      // check if all or single selection
      if (popID != 'viewAll') {
        $('#' + popID).show();
      } else {
       $('.centerBoxWrapper').show();
      }
    });
	
	$('a.navOne').click(function() {
		$('a.navOne').addClass('active');
		$('a.navTwo').removeClass('active');
		$('a.navThree').removeClass('active');
	});
	
	$('a.navTwo').click(function() {
		$('a.navOne').removeClass('active');
		$('a.navTwo').addClass('active');
		$('a.navThree').removeClass('active');
	});
	
	$('a.navThree').click(function() {
		$('a.navOne').removeClass('active');
		$('a.navTwo').removeClass('active');
		$('a.navThree').addClass('active');
	});
	
  });
</script>

<div class="centerColumn" id="indexDefault">
<!--<h1 id="indexDefaultHeading"><?php //echo HEADING_TITLE; ?></h1>-->

<?php if (SHOW_CUSTOMER_GREETING == 1) { ?>
<h2 class="greeting"><?php //echo zen_customer_greeting(); ?></h2>
<?php } ?>

<!-- deprecated - to use uncomment this section
<?php if (TEXT_MAIN) { ?>
<div id="" class="content"><?php echo TEXT_MAIN; ?></div>
<?php } ?>-->

<!-- deprecated - to use uncomment this section
<?php if (TEXT_INFORMATION) { ?>
<div id="" class="content"><?php echo TEXT_INFORMATION; ?></div>
<?php } ?>-->

<?php if (DEFINE_MAIN_PAGE_STATUS >= 1 and DEFINE_MAIN_PAGE_STATUS <= 2) { ?>
<?php

/**
 * get the Define Main Page Text
 */
?>
<div id="indexDefaultMainContent" class="content"><?php //require($define_page); ?></div>
<?php } ?>
<div id="moduleMenu-wrapper">
<?php
// bof module navigation
$show_display_nav = $db->Execute(SQL_SHOW_PRODUCT_INFO_MAIN);
if ($this_is_home_page) {
  echo '';
}
//echo '<div id="moduleMenu">';
while (!$show_display_nav->EOF) {
  switch ($show_display_nav->fields['configuration_key']) {
    case 'SHOW_PRODUCT_INFO_MAIN_FEATURED_PRODUCTS':
      echo '<span class="navOne moduleSpan active_tab"><a href="javascript:void(0)" rel="featuredProducts" class="navOne moduleBox">Featured</a></span>';
    break;
    case 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS':
      echo '<span class="navThree moduleSpan"><a href="javascript:void(0)" rel="specialsDefault" class="navThree moduleBox">Specials</a></span>';
    break;
    case 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS':
      echo '<span class="navTwo moduleSpan"><a href="javascript:void(0)" rel="whatsNew" class="navTwo moduleBox active">New</a></span>';
    break;
  }
  $show_display_nav->MoveNext();
}
//echo '<span id="navFour" class="moduleSpan"><a href="javascript:void(0)" id="navFour" rel="viewAll" class="moduleBox">All</a></span>';
echo '<br class="clearBoth" />';
//echo '</div>';
// eof module navigation

  $show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_MAIN);
  while (!$show_display_category->EOF) {
?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_FEATURED_PRODUCTS') { ?>
<?php
/**
 * display the Featured Products Center Box
 */
?>

<?php require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_featured_products.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS') { ?>
<?php
/**
 * display the Special Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS') { ?>
<?php
/**
 * display the New Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_UPCOMING') 
{ ?>
<?php
/**
 * display the Upcoming Products Center Box
 */
?>
<?php include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS)); ?><?php } ?>


<?php
  $show_display_category->MoveNext();
} // !EOF
?>

</div>
</div>