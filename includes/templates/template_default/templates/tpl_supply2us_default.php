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

<?php echo zen_draw_form('supply2us', zen_href_link('supply2us', 'action=send')); ?>

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
			<td height="25" class="text_menu" colspan="2">Supply to Us</td>
		</tr>
		<tr align="left" valign="top" class="text">
			<td colspan="2" class="text1"><div align="justify">We hereby welcome supplier firms or individuals who wish to supply to us genuine high quality products on our website or any other related products. Kindly fill in your details below & submit the form. We request you to provide detailed information.</div></td>
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
<legend><?php echo "Supply to Us"; ?></legend>
<div class="alert forward"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "First Name: "; ?></label>
<?php echo zen_draw_input_field('fname', $firstname, ' size="40" id="fname"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Last Name :"; ?></label>
<?php echo zen_draw_input_field('lname', $lastname, ' size="40" id="lname"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Email Address :"; ?></label>
<?php echo zen_draw_input_field('email', '', ' size="40" id="email"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "City :"; ?></label>
<?php echo zen_draw_input_field('scity', '', ' size="40" id="scity"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Country :"; ?></label>
<?php echo zen_draw_input_field('country', '', ' size="40" id="country"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Country Code:"; ?></label>
<?php echo zen_draw_input_field('country_code', '', ' size="40" id="country_code"'); ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Mobile Number:"; ?></label>
<?php echo zen_draw_input_field('mnumber', '', ' size="40" id="mnumber"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Telephone :"; ?></label>
<?php echo zen_draw_input_field('telephone', '', ' size="40" id="telephone"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Address :"; ?></label>
<?php //echo zen_draw_input_field('address', $name, ' size="40" id="address"'); ?>
<?php echo zen_draw_textarea_field('address', '62', '3', $enquiry, 'id="address"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Fax :"; ?></label>
<?php echo zen_draw_input_field('fax', '', ' size="40" id="fax"'); ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Company Name :"; ?></label>
<?php echo zen_draw_input_field('company_name', '', ' size="40" id="company_name"'); ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Website :"; ?></label>
<?php /*echo zen_draw_textarea_field('website', '62', '1', $enquiry, 'id="website"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; */?>
<?php echo zen_draw_input_field('website', '', ' size="40" id="website"'); ?>
<br class="clearBoth" />

<label for="enquiry"><?php echo "Type of products you want to supply to us :"; ?></label>
<br class="clearBoth" />
<label class="inputLabel" for="contactname"><?php echo ''; ?></label>
<?php //echo zen_draw_input_field('typeOfProduct', $name, ' size="40" id="typeOfProduct"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<?php echo zen_draw_textarea_field('typeOfProduct', '62', '3', $enquiry, 'id="typeOfProduct"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label for="enquiry"><?php echo "Additional Information :"; ?></label>
<br class="clearBoth" />
<label class="inputLabel" for="contactname"><?php echo ''; ?></label>
<?php echo zen_draw_textarea_field('additionalInfo', '62', '3', $enquiry, 'id="additionalInfo"'); ?>

</fieldset>

<?php
 echo '<table width="700px" cellspacing="0" cellpadding="0" border="0">
		<tr align="left" valign="top" class="text">
			<td colspan="2" class="text1"><div align="justify" class="text">For faster interaction kindly email us the pricelists & the product details including images, sizes, quantity, quality & price of the products you wish to supply to us on rudrablessings@hotmail.com
			<br>You can also contact us directly on our contact numbers </div></td>
		</tr>
		<tr align="left" valign="top" class="text">
            <td colspan="2" class="text1">&nbsp;</td>
        </tr>
	</table>';
?>

<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?></div>
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
<?php
  }
?>
</form>
</div>