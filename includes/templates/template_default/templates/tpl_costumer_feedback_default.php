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

<?php echo zen_draw_form('costumer_feedback', zen_href_link('costumer_feedback', 'action=send')); ?>

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
 * require html_define for the contact_us page
 */
 
 echo '<table width="700px" cellspacing="0" cellpadding="0" border="0">
		<tr align="left" valign="top">
			<td height="25" class="text_menu" colspan="2">Customer Feedback </td>
		</tr>
		<tr align="left" valign="top" class="text">
			<td colspan="2" class="text1"><div align="justify">
Welcome to RudraBlessings.com. Feel free to write about all your experiences with us be it good or not
so good,purchasing, quality, any of our section or links on the website not functioning, delay in replies
& so on; your feedback shall help us improve & serve you better.
			</div></td>
		</tr>
		<tr align="left" valign="top" class="text">
            <td colspan="2" class="text1">&nbsp;</td>
        </tr>
	</table>';

?>
</div>
<?php } ?>

<?php if ($messageStack->size('contact') > 0) echo $messageStack->output('contact'); ?>

<fieldset id="contactUsForm">
<legend><?php echo "Customer Feedback"; ?></legend>
<div class="alert forward"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Title: "; ?></label>
<?php echo zen_draw_input_field('fname', $name, ' size="40" id="fname"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Full Name :"; ?></label>
<?php echo zen_draw_input_field('lname', $name, ' size="40" id="lname"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Country :"; ?></label>
<?php echo zen_draw_input_field('country', $name, ' size="40" id="country"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Email Address :"; ?></label>
<?php echo zen_draw_input_field('email', $name, ' size="40" id="email"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Phone :"; ?></label>
<?php echo zen_draw_input_field('telephone', $name, ' size="40" id="telephone"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label for="enquiry"><?php echo "Comments:"; ?></label>
<br class="clearBoth" />
<label class="inputLabel" for="contactname"><?php echo ''; ?></label>
<?php echo zen_draw_textarea_field('additionalInfo', '50', '5', $enquiry, 'id="additionalInfo"'); ?>

</fieldset>



<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?></div>
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
<?php
  }
?>
</form>
</div>