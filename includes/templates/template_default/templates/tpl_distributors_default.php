<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=recomendation.<br />
 * Displays contact us page form.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2009 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_recomendation_default.php 16307 2010-05-21 21:50:06Z wilt $
 */
?>
<div class="centerColumn" id="contactUsDefault">

<?php echo zen_draw_form('distributors', zen_href_link('distributors', 'action=send')); ?>

<?php /*if (CONTACT_US_STORE_NAME_ADDRESS== '1') { ?>
<address><?php echo nl2br(STORE_NAME_ADDRESS); ?></address>
<?php } */?>

<?php
  if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>

<div class="mainContent success"><?php echo TEXT_SUCCESS; ?></div>

<div class="buttonRow"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

<?php
  } else {
?>

<?php if (DEFINE_CONTACT_US_STATUS >= '1' and DEFINE_CONTACT_US_STATUS <= '2') { ?>
<div id="contactUsNoticeContent" class="content">
<?php
/**
 * require html_define for the distributors page
 */
 
 echo '<table width="700px" cellspacing="0" cellpadding="0" border="0">
		<tr align="left" valign="top">
			<td height="25" class="text_menu" colspan="2">Distributors</td>
		</tr>
		<tr align="left" valign="top" class="text">
			<td colspan="2" class="text1"><div align="justify">We would be highly privileged if you wish to be our distributor. To know more about being our distributor kindly fill in the below form…..</div></td>
		</tr>
	</table>';

?>
</div>
<?php } ?>

<?php if ($messageStack->size('contact') > 0) echo $messageStack->output('contact'); ?>

<fieldset id="contactUsForm">
<legend><?php echo "Recommendation"; ?></legend>
<div class="alert forward"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Full name :"; ?></label>
<?php echo zen_draw_input_field('fname', $name, ' size="40" id="fname"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Date of birth :"; ?></label>
<?php echo zen_draw_input_field('bod', '', ' size="40" id="bod"'); ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Country :"; ?></label>
<?php echo zen_draw_input_field('country', '', ' size="40" id="country"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "City :"; ?></label>
<?php echo zen_draw_input_field('city', '', ' size="40" id="city"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Post code :"; ?></label>
<?php echo zen_draw_input_field('postcode', '', ' size="40" id="postcode"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Phone :"; ?></label>
<?php echo zen_draw_input_field('phone', '', ' size="40" id="phone"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Mobile :"; ?></label>
<?php echo zen_draw_input_field('mobile', '', ' size="40" id="mobile"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Fax :"; ?></label>
<?php echo zen_draw_input_field('fax', '', ' size="40" id="fax"'); ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Email address :"; ?></label>
<?php echo zen_draw_input_field('email', '', ' size="40" id="email"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "URL :"; ?></label>
<?php echo zen_draw_input_field('url', '', ' size="40" id="url"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label for="enquiry"><?php echo "Current profession / business :"; ?></label>
<br class="clearBoth" />
<label class="inputLabel" for="contactname"><?php echo ''; ?></label>
<?php echo zen_draw_input_field('current', '', ' size="40" id="current"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Qualifications :"; ?></label>
<?php echo zen_draw_input_field('qualifications', '', ' size="40" id="qualifications"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label for="enquiry"><?php echo "Why do you want to be our distributor & how could you be beneficial to our firm :"; ?></label>
<br class="clearBoth" />
<label class="inputLabel" for="contactname"><?php echo ''; ?></label>
<?php echo zen_draw_textarea_field('distributor1', '62', '4', $enquiry, 'id="distributor1"'); ?>
<br class="clearBoth" />

<label for="enquiry"><?php echo "Are you currently a distributor of any other firm :"; ?></label>
<br class="clearBoth" />
<label class="inputLabel" for="contactname"><?php echo ''; ?></label>
<?php echo zen_draw_textarea_field('distributor2', '62', '4', $enquiry, 'id="distributor2"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

</fieldset>

<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?></div>
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
<?php
  }
?>
</form>
</div>