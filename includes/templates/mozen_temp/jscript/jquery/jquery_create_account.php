<script language="javascript">
jQuery(document).ready(function(){
	jQuery('#new_customer').click(function (){
		if(jQuery(this).is(':checked')) {
			jQuery('#qc_create_account').fadeIn();
			jQuery('#qc_login').hide();
		}
	});
	
	jQuery('#back_login').click(function() {
		jQuery('#qc_create_account').fadeOut();
		jQuery('#qc_login').fadeIn();
		jQuery('#new_customer').removeAttr('checked');
	});
	
	jQuery('#shippingAddress-checkbox').click(function (){
		if(jQuery(this).is(':checked')) {
			jQuery('#shippingField').fadeOut();
		} else {
			jQuery('#shippingField').fadeIn();
		}
	});
<?php if (jQueryshippingAddress == true) { ?>
  jQuery('#shippingField').fadeOut();
<?php } ?>
});
</script>