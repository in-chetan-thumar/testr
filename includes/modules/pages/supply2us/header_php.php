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
  $email_address = zen_db_prepare_input($_POST['email']);
  $lname = zen_db_prepare_input($_POST['lname']);
  $scity = zen_db_prepare_input($_POST['scity']);
  $country = zen_db_prepare_input($_POST['country']);
  $country_code = zen_db_prepare_input($_POST['country_code']);
  $mnumber = zen_db_prepare_input($_POST['mnumber']);
  $telephone = zen_db_prepare_input($_POST['telephone']);
  $fax = zen_db_prepare_input($_POST['fax']);
  $company_name = zen_db_prepare_input($_POST['company_name']);
  $website = zen_db_prepare_input($_POST['website']);
  $address = zen_db_prepare_input(strip_tags($_POST['address']));
  $typeOfProduct = zen_db_prepare_input(strip_tags($_POST['typeOfProduct']));
  $additionalInfo = zen_db_prepare_input(strip_tags($_POST['additionalInfo']));

  $zc_validate_email = zen_validate_email($email_address);

  if ($zc_validate_email and !empty($fname) and !empty($lname) and !empty($scity) and !empty($country) and !empty($mnumber) and !empty($telephone) and !empty($address) and !empty($typeOfProduct)) {
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
    "First Name:" . $fname .  "\n\n" .
	"Last Name :" . $lname .  "\n\n" .
	"Email Address :" . $email .  "\n\n" .
	"City :" . $scity .  "\n\n" .
	"Country :" . $country .  "\n\n" .
	"Country Code : " . $country_code .  "\n\n" .
	"Mobile Number :" . $mnumber .  "\n\n" .
	"Telephone : " . $telephone .  "\n\n" .
	"Address :" . strip_tags($address) .  "\n\n" .
	"Fax : " . $fax .  "\n\n" .
	"Company Name :" . $company_name .  "\n\n" .
	"Website :" . $website .  "\n\n" .
	"Type of products you want to supply to us : " . strip_tags($typeOfProduct) .  "\n\n" .
	"Additional Information : " . strip_tags($additionalInfo) .  "\n\n" .
	
	
    '------------------------------------------------------' . "\n\n" .
    $extra_info['TEXT'];
    // Prepare HTML-portion of message
    $html_msg['EMAIL_MESSAGE_HTML'] = strip_tags($_POST['typeOfProduct']);
    $html_msg['CONTACT_US_OFFICE_FROM'] = OFFICE_FROM . ' ' . $name . '<br />' . OFFICE_EMAIL . '(' . $email_address . ')';
    $html_msg['EXTRA_INFO'] = $extra_info['HTML'];
    // Send message
    zen_mail($send_to_name, $send_to_email, "Supply to Us", $text_message, $name, $email_address, $html_msg,'supply2us');

    zen_redirect(zen_href_link(FILENAME_SUPPLY2US, 'action=success'));
  } else {
    $error = true;
    /*if (empty($fname)) {
      $messageStack->add('contact', ENTRY_EMAIL_NAME_CHECK_ERROR);
    }
    
    if (empty($enquiry)) {
      $messageStack->add('contact', ENTRY_EMAIL_CONTENT_CHECK_ERROR);
    }*/
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
  $firstname = $check_customer->fields['customers_firstname'];
  $lastname = $check_customer->fields['customers_lastname'];
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
