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

<?php echo zen_draw_form('recomendation', zen_href_link('recomendation', 'action=send')); ?>

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
			<td height="25" class="text_menu" colspan="2">Recommendation</td>
		</tr>
		<tr align="left" valign="top" class="text">
			<td colspan="2" class="text1"><div align="justify" class="text1">We design Rudraksha &amp; Gems combinations for you, specific to your problems or specific purpose and your birth details. Fill in the form below, for FREE recommendations to be sent to you.</div></td>
		</tr>
		<tr align="left" valign="top" class="text">
            <td colspan="2" class="text1">&nbsp;</td>
        </tr>
		<tr align="left" valign="top" class="text">
            <td colspan="2" class="text1"><div align="justify">Rudraksha combinations are designed using birth details and your specified purpose. You could read the properties of the different Rudraksha in the Rudraksha section and also decide the most suitable Rudraksha for yourself or combine the Rudraksha of your Zodiac sign (see Zodiac collection) with the Rudraksha of your specific purpose. One bead maybe worn or multiple number of the same bead maybe worn for enhanced and synergistic effects. Rudraksha maybe worn in Gold / Silver / Panchadhatu / Thread.</div></td>
        </tr>
		<tr align="left" valign="top" class="text">
            <td colspan="2" class="text_normal">&nbsp;</td>
        </tr>
		<tr align="left" valign="top" class="text">
            <td align="justify" colspan="2" class="orenge">Welcome to the free recommendation panel of Rudrablessings.com </td>
        </tr>
		<tr align="left" valign="top" class="text">
			<td align="justify" colspan="2" class="text_normal"><img width="5" height="5" src="image/spacer.gif"></td>
		</tr>
		<tr align="left" valign="top" class="text">
			<td align="justify" colspan="2" class="text1">
			For your convenience this section is strictly designed to provide expert Rudraksha, Astro gemstones &amp; other necessary recommendations against your problems / concerns &amp; interests, so kindly excuse us for not answering to any personal questions.                      </td>
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

<label class="inputLabel" for="contactname"><?php echo "Your Name :"; ?></label>
<?php echo zen_draw_input_field('yname', $name, ' size="40" id="yname"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Date of Birth :"; ?></label>
<?php //echo zen_draw_input_field('bod', $name, ' size="40" id="bod"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<select id="dd" name="dd">
	<option value="DD">DD</option>
<?php	for($i=1; $i<=31;$i++)
			echo '<option>'.$i.'</option>';	?>
</select>
<select id="mm" name="mm">
	<option value="MM">MM</option>
<?php	for($i=1; $i<=12;$i++)
			echo '<option>'.$i.'</option>';	?>
</select>
<select id="yy" name="yy">
	<option value="YY">YY</option>
<?php	$cyear = date('Y');
		for($i=1940; $i<=$cyear;$i++)
			echo '<option>'.$i.'</option>';	?>
</select><?php echo '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Time of Birth :"; ?></label>
<?php //echo zen_draw_input_field('tob', $name, ' size="40" id="tob"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<select id="hrs" name="hrs">
	<option value="HRS">HRS</option>
<?php	for($i=1; $i<=12;$i++)
			echo '<option>'.$i.'</option>';	?>
</select>
<select id="min" name="min">
	<option value="MIN">MIN</option>
<?php	for($i=1; $i<=60;$i++)
			echo '<option>'.$i.'</option>';	?>
</select>
<select id="timeType" name="timeType">
	<option value="SELECT">Select</option>
	<option value="AM">AM</option>
	<option value="PM">PM</option>
</select> <?php echo '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Place of Birth (city) :"; ?></label>
<?php echo zen_draw_input_field('pob', '', ' size="40" id="pob"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "State :"; ?></label>
<?php echo zen_draw_input_field('rstate', '', ' size="40" id="rstate"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Country of birth :"; ?></label>
<?php echo zen_draw_input_field('cob', '', ' size="40" id="cob"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Marital Status :"; ?></label>
<?php echo zen_draw_input_field('marital_status', '', ' size="40" id="marital_status"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Children (if any) :"; ?></label>
<?php echo zen_draw_input_field('children', '', ' size="40" id="children"'); ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Lagna (if known) :"; ?></label>
<?php echo zen_draw_input_field('lagna', '', ' size="40" id="lagna"'); ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Current Profession :"; ?></label>
<?php echo zen_draw_input_field('current_profession', '', ' size="40" id="current_profession"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Designation :"; ?></label>
<?php echo zen_draw_input_field('designation', '', ' size="40" id="designation"'); ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Purpose / nature of problem :"; ?></label>
<?php echo zen_draw_textarea_field('purpose', '62', '1', $enquiry, 'id="purpose"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Email Address :"; ?></label>
<?php echo zen_draw_input_field('email', '', ' size="40" id="email"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Telephone Number :"; ?></label>
<?php echo zen_draw_input_field('tnumber', '', ' size="40" id="tnumber"'); ?>
<br class="clearBoth" />

<label class="inputLabel" for="contactname"><?php echo "Mobile number :"; ?></label>
<?php echo zen_draw_input_field('mnumber', '', ' size="40" id="mnumber"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label for="enquiry"><?php echo 'Currently using which rudrakshas / gemstones?'; ?></label>
<br class="clearBoth" />
<label class="inputLabel" for="contactname"><?php echo ''; ?></label>
<?php echo zen_draw_textarea_field('currently_using', '62', '3', $enquiry, 'id="currently_using"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>

</fieldset>

<div class="buttonRow forward"><?php 
//echo BUTTON_IMAGE_SEND.BUTTON_SEND_ALT;
echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?></div>
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
<?php
  }
?>
</form>
</div>