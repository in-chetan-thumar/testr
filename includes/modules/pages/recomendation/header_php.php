<?php
/**
 * Contact Us Page
 *
 * @package page
 * @copyright Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: header_php.php 17608 2010-09-24 14:51:46Z drbyte $
 */
require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));

$error = false;
if (isset($_GET['action']) && ($_GET['action'] == 'send')) {
  
  $yname = zen_db_prepare_input($_POST['yname']);
  $dd = zen_db_prepare_input($_POST['dd']);
  $mm = zen_db_prepare_input($_POST['mm']);
  $yy = zen_db_prepare_input($_POST['yy']);
  $hrs = zen_db_prepare_input($_POST['hrs']);
  $min = zen_db_prepare_input($_POST['min']);
  $timeType = zen_db_prepare_input($_POST['timeType']);
  $pob = zen_db_prepare_input($_POST['pob']);
  $rstate = zen_db_prepare_input($_POST['rstate']);
  $cob = zen_db_prepare_input($_POST['cob']);
  $marital_status = zen_db_prepare_input($_POST['marital_status']);
  $children = zen_db_prepare_input($_POST['children']);
  $lagna = zen_db_prepare_input($_POST['lagna']);
  $current_profession = zen_db_prepare_input($_POST['current_profession']);
  $designation = zen_db_prepare_input($_POST['designation']);
  $purpose = zen_db_prepare_input($_POST['purpose']);
  $tnumber = zen_db_prepare_input($_POST['tnumber']);
  $mnumber = zen_db_prepare_input($_POST['mnumber']);
  
  $email_address = zen_db_prepare_input($_POST['email']);
  $currently_using = zen_db_prepare_input(strip_tags($_POST['currently_using']));

  $zc_validate_email = zen_validate_email($email_address);

  if ($zc_validate_email and !empty($yname) and !empty($dd) and !empty($mm) and !empty($yy) and !empty($hrs) and !empty($min) and !empty($timeType) and !empty($pob) and !empty($rstate) and !empty($cob) and !empty($marital_status) and !empty($current_profession) and !empty($designation) and !empty($purpose) and !empty($mnumber) and !empty($currently_using)) {
    // auto complete when logged in
    if($_SESSION['customer_id']) {
      $sql = "SELECT customers_id, customers_firstname, customers_lastname, customers_password, customers_email_address, customers_default_address_id
              FROM " . TABLE_CUSTOMERS . "
              WHERE customers_id = :customersID";

      $sql = $db->bindVars($sql, ':customersID', $_SESSION['customer_id'], 'integer');
      $check_customer = $db->Execute($sql);
      $customer_email= $check_customer->fields['customers_email_address'];
      $customer_name= $check_customer->fields['customers_firstname'] . ' ' . $check_customer->fields['customers_lastname'];
    } else {
      $customer_email = NOT_LOGGED_IN_TEXT;
      $customer_name = NOT_LOGGED_IN_TEXT;
    }

    // use contact us dropdown if defined
    if (CONTACT_US_LIST !=''){
      $send_to_array=explode("," ,CONTACT_US_LIST);
      preg_match('/\<[^>]+\>/', $send_to_array[$_POST['send_to']], $send_email_array);
      $send_to_email= preg_replace ("/>/", "", $send_email_array[0]);
      $send_to_email= trim(preg_replace("/</", "", $send_to_email));
      $send_to_name = trim(preg_replace('/\<[^*]*/', '', $send_to_array[$_POST['send_to']]));
    } else {  //otherwise default to EMAIL_FROM and store name
    $send_to_email = trim(EMAIL_FROM);
    $send_to_name =  trim(STORE_NAME);
    }

    // Prepare extra-info details
    $extra_info = email_collect_extra_info($name, $email_address, $customer_name, $customer_email);
    // Prepare Text-only portion of message
    $text_message = "\n\n" .
    '------------------------------------------------------' . "\n\n" .
    "Your Name :" . $yname .  "\n\n" .
	"Date of Birth :" . $dd .'-'. $mm .'-'. $yy .  "\n\n" .
	"Time of Birth :" . $hrs . ':'. $min .  ' ' . $timeType. "\n\n" .
	"Place of Birth (city) :" . $pob .  "\n\n" .
	"State :" . $rstate .  "\n\n" .
	"Country of birth :" . $cob .  "\n\n" .
	"Marital Status :" . $marital_status .  "\n\n" .
	"Children (if any) :" . $children .  "\n\n" .
	"Lagna (if known) :" . $lagna .  "\n\n" .
	"Current Profession :" . $current_profession .  "\n\n" .
	"Designation :" . $designation .  "\n\n" .
	"Purpose / nature of problem :" . strip_tags($purpose) .  "\n\n" .
	"Email Address :" . $email_address .  "\n\n" .
	"Telephone Number :" . $tnumber .  "\n\n" .	
	"Mobile number :" . $mnumber .  "\n\n" .	
	"Currently using which rudrakshas / gemstones? " . strip_tags($currently_using) .  "\n\n" .	
    '------------------------------------------------------' . "\n\n" .
    $extra_info['TEXT'];
    // Prepare HTML-portion of message
    $html_msg['EMAIL_MESSAGE_HTML'] = strip_tags($_POST['enquiry']);
    $html_msg['CONTACT_US_OFFICE_FROM'] = OFFICE_FROM . ' ' . $name . '<br />' . OFFICE_EMAIL . '(' . $email_address . ')';
    $html_msg['EXTRA_INFO'] = $extra_info['HTML'];
    // Send message
	
    zen_mail($send_to_name, $send_to_email, 'Recommendation', $text_message, $name, $email_address, $html_msg,'contact_us');

    zen_redirect(zen_href_link(FILENAME_CONTACT_US, 'action=success'));
  } else {
    $error = true;
    
      $messageStack->add('contact', 'Please fill required information');
    
    if ($zc_validate_email == false) {
      $messageStack->add('contact', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
    }
  }
} // end action==send

// default email and name if customer is logged in
if($_SESSION['customer_id']) {
  $sql = "SELECT customers_id, customers_firstname, customers_lastname, customers_password, customers_email_address, customers_default_address_id
          FROM " . TABLE_CUSTOMERS . "
          WHERE customers_id = :customersID";

  $sql = $db->bindVars($sql, ':customersID', $_SESSION['customer_id'], 'integer');
  $check_customer = $db->Execute($sql);
  $email_address = $check_customer->fields['customers_email_address'];
  $name= $check_customer->fields['customers_firstname'] . ' ' . $check_customer->fields['customers_lastname'];
}

$send_to_array = array();
if (CONTACT_US_LIST !=''){
  foreach(explode(",", CONTACT_US_LIST) as $k => $v) {
    $send_to_array[] = array('id' => $k, 'text' => preg_replace('/\<[^*]*/', '', $v));
  }
}

// include template specific file name defines
$define_page = zen_get_file_directory(DIR_WS_LANGUAGES . $_SESSION['language'] . '/html_includes/', FILENAME_DEFINE_CONTACT_US, 'false');

$breadcrumb->add(NAVBAR_TITLE);
