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
  
  $fname = zen_db_prepare_input($_POST['fname']);
  $bod = zen_db_prepare_input($_POST['bod']);
  $country = zen_db_prepare_input($_POST['country']);
  $city = zen_db_prepare_input($_POST['city']);
  $postcode = zen_db_prepare_input($_POST['postcode']);
  $phone = zen_db_prepare_input($_POST['phone']);
  $mobile = zen_db_prepare_input($_POST['mobile']);
  $fax = zen_db_prepare_input($_POST['fax']);
  $url = zen_db_prepare_input($_POST['url']);
  $current = zen_db_prepare_input($_POST['current']);
  $qualifications = zen_db_prepare_input($_POST['qualifications']);
  $distributor1 = zen_db_prepare_input(strip_tags($_POST['distributor1']));
  $distributor2 = zen_db_prepare_input(strip_tags($_POST['distributor2']));
  
  $email_address = zen_db_prepare_input($_POST['email']);

  $zc_validate_email = zen_validate_email($email_address);

  if ($zc_validate_email and !empty($fname) and !empty($country) and !empty($city) and !empty($postcode) and !empty($phone) and !empty($mobile) and !empty($url) and !empty($current) and !empty($qualifications) and !empty($distributor2)) {
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
    "Full name :" . $fname .  "\n\n" .
	"Date of Birth :" . $bod .  "\n\n" .
	"Country :" . $country . "\n\n" .
	"City :" . $city .  "\n\n" .
	"Post code :" . $postcode .  "\n\n" .
	"Phone :" . $phone .  "\n\n" .
	"Mobile :" . $mobile .  "\n\n" .
	"Fax :" . $fax .  "\n\n" .
	"Email address :" . $email_address .  "\n\n" .
	"URL :" . $url .  "\n\n" .
	"Current profession / business :" . $current .  "\n\n" .
	"Qualifications :" . $qualifications .  "\n\n" .
	"Why do you want to be our distributor & how could you be beneficial to our firm :" . $distributor1 .  "\n\n" .
	"Are you currently a distributor of any other firm :" . $distributor2 .  "\n\n" .
    '------------------------------------------------------' . "\n\n" .
    $extra_info['TEXT'];
    // Prepare HTML-portion of message
    $html_msg['EMAIL_MESSAGE_HTML'] = strip_tags($_POST['enquiry']);
    $html_msg['CONTACT_US_OFFICE_FROM'] = OFFICE_FROM . ' ' . $name . '<br />' . OFFICE_EMAIL . '(' . $email_address . ')';
    $html_msg['EXTRA_INFO'] = $extra_info['HTML'];
    // Send message
	
    zen_mail($send_to_name, $send_to_email, 'Distributors', $text_message, $name, $email_address, $html_msg,'distributors');

    zen_redirect(zen_href_link(FILENAME_DISTRIBUTORS, 'action=success'));
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
