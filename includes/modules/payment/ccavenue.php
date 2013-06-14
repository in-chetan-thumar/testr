<?php

 class ccavenue {
   var $code, $title, $description, $enabled;

////////////////////////////////////////////////////
// Class constructor -> initialize class variables.
// Sets the class code, description, and status.
////////////////////////////////////////////////////


   function ccavenue() {
     global $order;

     $this->code = 'ccavenue';
     $this->title = MODULE_PAYMENT_CCAVENUE_TEXT_TITLE;
     $this->description = MODULE_PAYMENT_CCAVENUE_TEXT_DESCRIPTION;
     $this->sort_order = MODULE_PAYMENT_CCAVENUE_SORT_ORDER;
     $this->enabled = ((MODULE_PAYMENT_CCAVENUE_STATUS == 'True') ? true : false);
  $this->check_hash = false;
  $this->secret_word = '';
  $this->login_id = MODULE_PAYMENT_CCAVENUE_LOGIN;
  
     if ((int)MODULE_PAYMENT_CCAVENUE_ORDER_STATUS_ID > 0) {
       $this->order_status = MODULE_PAYMENT_CCAVENUE_ORDER_STATUS_ID;
     }



// class methods
   function update_status() {
      global $order, $db;

      if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_CCAVENUE_ZONE > 0) ) {
        $check_flag = false;
        $check =  $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_CCAVENUE_ZONE . "' and zone_country_id = '" . $order->billing['country']['id'] . "' order by zone_id");
        while (!$check->EOF) {
          if ($check->fields['zone_id'] < 1) {
            $check_flag = true;
            break;
          } elseif ($check->fields['zone_id'] == $order->billing['zone_id']) {
            $check_flag = true;
            break;
          }
          $check->MoveNext();
        }

       if ($check_flag == false) {
         $this->enabled = false;
       }
     }
   }

// Which Form Action are we going to use?
// If we are in 'Testmode' we use the 'Test Server'

 if (MODULE_PAYMENT_CCAVENUE_LOGIN > '199999') {
                $this->form_action_url = 'https://www.ccavenue.com/shopzone/cc_details.jsp';
        } else {
                $this->form_action_url = 'https://www.ccavenue.com/shopzone/cc_details.jsp';
                }
}
////////////////////////////////////////////////////
// Javascript form validation
// Check the user input submited on checkout_payment.php with javascript (client-side).
// Examples: validate credit card number, make sure required fields are filled in
////////////////////////////////////////////////////

    function javascript_validation() {
     return false;
    }


////////////////////////////////////////////////////
// !Form fields for user input
// Output any required information in form fields
// Examples: ask for extra fields (credit card number), display extra information
////////////////////////////////////////////////////


    function selection() {
      global $order;

      $selection = array('id' => $this->code,
                         'module' => $this->title
                        );

      return $selection;
    }


////////////////////////////////////////////////////
// Pre confirmation checks (ie, check if credit card
// information is right before sending the info to
// the payment server
////////////////////////////////////////////////////

    function pre_confirmation_check() {
     return false;
    }


////////////////////////////////////////////////////
// Functions to execute before displaying the checkout
// confirmation page
////////////////////////////////////////////////////

    function confirmation() {
      global $_POST;
      /* if (MODULE_PAYMENT_CCAVENUE_CONVERSION == 'Enabled'){
         if (DEFAULT_CURRENCY <> 'USD'){
            $title = $this->title . MODULE_PAYMENT_CCAVENUE_CURRENCY_CONVERSITION;
         }  
      }else { */
        // $title = $this->title; 
         $confirmation = array('title' => $title);
         return $confirmation;
     //}
   }

////////////////////////////////////////////////////
// Functions to execute before finishing the form
// Examples: add extra hidden fields to the form
////////////////////////////////////////////////////

   function process_button() {
      global $_POST, $order, $currency, $currencies;
 if (MODULE_PAYMENT_CCAVENUE_CONVERSION == 'Enabled'){
    if (DEFAULT_CURRENCY <> 'INR'){
       $cOrderTotal = $currencies->get_value("INR") * $order->info['total'];
    }
 } else {
  $cOrderTotal = $order->info['total'];
 }

 $MerchantId = MODULE_PAYMENT_CCAVENUE_LOGIN;
  $Amount =$cOrderTotal;
   $OrderId = date('Ymdhis');
  //  $Url = zen_href_link(FILENAME_CHECKOUT_PROCESS,'','SSL',true,false);  
  $Url = zen_href_link(FILENAME_CHECKOUT_PROCESS,'','SSL',true,false);  
  $pattern='http://www\.';

    if(!(Eregi($pattern,$Url,$reg)))
        eregi_replace('http://', $pattern, $Url);
  $WorkingKey = MODULE_PAYMENT_CCAVENUE_KEY;
  $str ="$MerchantId|$OrderId|$Amount|$Url|$WorkingKey"; 
$adler = 1;
    $BASE =  65521 ;

	$s1 = $adler & 0xffff ;
	$s2 = ($adler >> 16) & 0xffff;
	for($i = 0 ; $i < strlen($str) ; $i++)
	{
		$s1 = ($s1 + Ord($str[$i])) % $BASE ;
		$s2 = ($s2 + $s1) % $BASE ;
			//echo "s1 : $s1 <BR> s2 : $s2 <BR>";

	}
$str = $s2;
$num = 16;

	$str = DecBin($str);

	for( $i = 0 ; $i < (64 - strlen($str)) ; $i++)
		$str = "0".$str ;

	for($i = 0 ; $i < $num ; $i++) 
	{
		$str = $str."0";
		$str = substr($str , 1 ) ;
		//echo "str : $str <BR>";	
	}
$num=$str;
for ($n = 0 ; $n < strlen($num) ; $n++)
	{
	   $temp = $num[$n] ;
	   $dec =  $dec + $temp*pow(2 , strlen($num) - $n - 1);
	}
	$Checksum = $dec + $s1;

  $process_button_string = zen_draw_hidden_field('Merchant_Id', $MerchantId) .
                              zen_draw_hidden_field('Amount', $Amount ) .
                              zen_draw_hidden_field('Order_Id',$OrderId) .
							   zen_draw_hidden_field('Checksum',$Checksum) .
                              zen_draw_hidden_field('billing_cust_name', $order->customer['firstname'] . ' ' . $order->customer['lastname']) .
                              zen_draw_hidden_field('billing_cust_address', $order->customer['street_address'] . ', ' . $order->customer['city'] . ', ' .$order->customer['state']) .
                              zen_draw_hidden_field('billing_cust_country', $order->customer['country']['title']) .
                              zen_draw_hidden_field('billing_cust_email', $order->customer['email_address']) .
                              zen_draw_hidden_field('billing_cust_tel', $order->customer['telephone']) .
                              zen_draw_hidden_field('billing_zip_code', $order->customer['postcode']) .                            
                              
                              zen_draw_hidden_field('delivery_cust_name', $order->customer['firstname'] . ' ' . $order->customer['lastname']) .
                              zen_draw_hidden_field('delivery_cust_address', $order->customer['street_address'] . ', ' . $order->customer['city'] . ', ' .$order->customer['state'] . ', ' . $order->customer['postcode'] . ', ' . $order->customer['country']['title']) .
                              zen_draw_hidden_field('delivery_cust_tel', $order->customer['telephone']) .
								   zen_draw_hidden_field('Redirect_Url',$Url).
                              
      $process_button_string .= zen_draw_hidden_field(zen_session_name(), zen_session_id());
     return $process_button_string;
   }
////////////////////////////////////////////////////
// Test Credit Card# 4111111111111111
// Expiration any date after current date.
// Functions to execute before processing the order
// Examples: retreive result from online payment services
////////////////////////////////////////////////////

    function before_process() {
    global $HTTP_POST_VARS, $customer_id, $MerchantId, $Amount, $OrderId, $WorkingKey, $checksum, $sum, $AuthDesc;

	   $MerchantId =  $_REQUEST['Merchant_Id'];
 $Amount =  $_REQUEST['Amount'];
  $OrderId =  $_REQUEST['Order_Id'];
  $Checksum =  $_REQUEST['Checksum'];
  $AuthDesc =  $_REQUEST['AuthDesc'];
  $WorkingKey = MODULE_PAYMENT_CCAVENUE_KEY;

   $str ="$MerchantId|$OrderId|$Amount|$AuthDesc|$WorkingKey";


	$adler = 1;
    $BASE =  65521 ;

	$s1 = $adler & 0xffff ;
	$s2 = ($adler >> 16) & 0xffff;
	for($i = 0 ; $i < strlen($str) ; $i++)
	{
		$s1 = ($s1 + Ord($str[$i])) % $BASE ;
		$s2 = ($s2 + $s1) % $BASE ;
			//echo "s1 : $s1 <BR> s2 : $s2 <BR>";

	}

$str = $s2;
$num = 16;

	$str = DecBin($str);

	for( $i = 0 ; $i < (64 - strlen($str)) ; $i++)
		$str = "0".$str ;

	for($i = 0 ; $i < $num ; $i++) 
	{
		$str = $str."0";
		$str = substr($str , 1 ) ;
		//echo "str : $str <BR>";
	}
$num=$str;
for ($n = 0 ; $n < strlen($num) ; $n++)
	{
	   $temp = $num[$n] ;
	   $dec =  $dec + $temp*pow(2 , strlen($num) - $n - 1);
	}
	$sum = $dec +$s1 ;
	
	if($sum == $Checksum)
		$Checksum = 'true' ;	
	else
		$Checksum = 'false';

	if ($Checksum != "true") {

	    zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(MODULE_PAYMENT_CCAVENUE_ALERT_ERROR_MESSAGE), 'SSL', true, false));
      }   

	  if($Checksum =='true' && $AuthDesc == 'N'){

		  

		zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(MODULE_PAYMENT_CCAVENUE_TEXT_ERROR_MESSAGE), 'SSL', true, false));
	}

/*	we do not get any response_code from ccavenue so disabled this check
      if ($_POST['x_response_code'] != '1') {
        zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(MODULE_PAYMENT_CCAVENUE_TEXT_ERROR_MESSAGE), 'SSL', true, false));
      }   
*/      
    }
   
   function after_process() {
      return false;
    }
////////////////////////////////////////////////////
// If an error occurs with the process, output error messages here
////////////////////////////////////////////////////

    function get_error() {
      global $_GET;

      $error = array('title' => MODULE_PAYMENT_CCAVENUE_TEXT_ERROR,
                     'error' => stripslashes(urldecode($_GET['error'])));

      return $error;
    }

////////////////////////////////////////////////////
// Check if module is installed (Administration Tool)
// TABLES: configuration
////////////////////////////////////////////////////


    function check() {
	global $db;
      if (!isset($this->_check)) {
        $check_query =  $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_CCAVENUE_STATUS'");
        $this->_check = $check_query->RecordCount();
      }
      return $this->_check;
    }

////////////////////////////////////////////////////
// Install the module (Administration Tool)
// TABLES: configuration
////////////////////////////////////////////////////

    function install() {
  global $db;
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable CCAvenue Module', 'MODULE_PAYMENT_CCAVENUE_STATUS', 'True', 'Do you want to accept CCAvenue payments?', '6', '1', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Merchant_Id', 'MODULE_PAYMENT_CCAVENUE_LOGIN', 'Your_CCAVENUE_ID', 'Merchant ID used for the CCAvenue service', '6', '2', now())");
	 $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order of display.', 'MODULE_PAYMENT_CCAVENUE_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '5', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment Zone', 'MODULE_PAYMENT_CCAVENUE_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '6', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Order Status', 'MODULE_PAYMENT_CCAVENUE_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', '6', '7', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Currency Converter', 'MODULE_PAYMENT_CCAVENUE_CONVERSION', 'Enabled', 'Currency Conversion', '6', '10', 'zen_cfg_select_option(array(\'Enabled\', \'Disable\'), ', now())");     
	  $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Working_Key', 'MODULE_PAYMENT_CCAVENUE_KEY', 'Working_Key', 'put in the  alphanumeric key from MARS Panel', '6', '3', now())");
    }

////////////////////////////////////////////////////
// Remove the module (Administration Tool)
// TABLES: configuration
////////////////////////////////////////////////////

    function remove() {
	global $db;
       $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
   }

////////////////////////////////////////////////////
// Create our Key - > Value Arrays
////////////////////////////////////////////////////
    function keys() {
     return array('MODULE_PAYMENT_CCAVENUE_STATUS', 'MODULE_PAYMENT_CCAVENUE_LOGIN','MODULE_PAYMENT_CCAVENUE_KEY', 'MODULE_PAYMENT_CCAVENUE_ZONE', 'MODULE_PAYMENT_CCAVENUE_ORDER_STATUS_ID', 'MODULE_PAYMENT_CCAVENUE_SORT_ORDER', 'MODULE_PAYMENT_CCAVENUE_CONVERSION');
   }
 }
?>