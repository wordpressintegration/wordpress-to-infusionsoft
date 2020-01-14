<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
include('functions.php');
function PTI_forms_call(){
ob_start();  
  $url = plugins_url(); 
  $val = get_option('pti_field_value');
  $submitbtn_text = get_option('submitbtn_text');
  $submitbtn_color = get_option('submitbtn_color');
  $submitbtn_bgcolor = get_option('submitbtn_bgcolor');
  $submitbtn_bghovercolor = get_option('submitbtn_bghovercolor');
  
  $form_heading =  get_option('form_heading'); 
  if(is_array($val) && !empty($val)):?>
  
  <div class="pti_form_style">
    <div class="pti_container">
      <div class="pti_wrapper">
 <h3><?php echo $form_heading; ?></h3>
 <form class="pti_inf_form" id="pti_inf_form">
 <?php if(in_array('fName', $val)){?>
 <div class="pti_row">
       <label>First Name</label>
        <input type='text' name='FirstName' onchange="return pti_trim(this)">
        </div>
 <?php } ?> 
 <input type="hidden" name="pti_simple_nonce" value="<?php echo wp_create_nonce('pti_simple_nonce');?>" />
  <?php if(in_array('lName', $val)){?>
  <div class="pti_row">
      <label>Last Name</label>
        <input type='text' name='LastName' onchange="return pti_trim(this)">
        </div>
         <?php } ?> 
        
         <?php if(in_array('email', $val)){?>
         <div class="pti_row">
     <label>Email</label>
        <input type='text' name='Email' onchange="return pti_trim(this)">
        </div>
         <?php } ?> 
        
         <?php if(in_array('phone', $val)){?>
         <div class="pti_row">
    <label>Phone</label>
        <input type='tel' name='Phone1' onchange="return pti_trim(this)" id="pti_phone">
        </div>
         <?php } ?> 
        
         <?php if(in_array('fax', $val)){?> 
         <div class="pti_row">
       <label>Fax</label>
        <input type='tel' name='Fax1'  onchange="return pti_trim(this)" id="pti_fax">
        </div>
         <?php } ?> 
        
         <?php if(in_array('job-title', $val)){?>
       <label>JobTitle</label> 
       <div class="pti_row">
       <input type='text' name='JobTitle'  onchange="return pti_trim(this)">
       </div>
        <?php } ?> 
       
        <?php if(in_array('company', $val)){?>
        <div class="pti_row">
      <label>Company</label>
        <input type='text' name='Company'  onchange="return pti_trim(this)">
        </div>
         <?php } ?> 
        
         <?php if(in_array('streetaddress1', $val)){?>
         <div class="pti_row">
       <label >StreetAddress1</label>
        <input type='text' name='StreetAddress1' onchange="return pti_trim(this)">
        </div>
         <?php } ?> 
        
         <?php if(in_array('streetaddress2', $val)){?>
      <label>StreetAddress2</label>
     <div class="pti_row">
        <input type='text' name='StreetAddress2' onchange="return pti_trim(this)">
        </div>
         <?php } ?> 
        
         <?php if(in_array('city', $val)){?>
         <div class="pti_row">
       <label>City</label>
        <input type='text' name='City' onchange="return pti_trim(this)">
        </div>
         <?php } ?> 
        
         <?php if(in_array('state', $val)){?>
         <div class="pti_row">
      <label>State</label>
        <input type='text' name='State' onchange="return pti_trim(this)">
        </div>
         <?php } ?> 
        
         <?php if(in_array('pc', $val)){?>
         <div class="pti_row">
     <label >PostalCode</label>
        <input type='text' name='PostalCode' onchange="return pti_trim(this)" id="pti_postal">
        </div>
         <?php } ?> 
        
         <?php if(in_array('country', $val)){?>
         <div class="pti_row">
       <label>Country</label>
        <input type='text' name='Country' onchange="return pti_trim(this)">
        </div>
         <?php } ?> 
        
         <?php if(in_array('website', $val)){?>
         <div class="pti_row">
    <label>Website</label> 
       <input type='text' name='Website' onchange="return pti_trim(this)">
       </div>
        <?php } ?> 
       <div class="pti_submit_box">
       <?php $color = $submitbtn_bgcolor;
$rgb = pti_getrgba($color);
$rgba = pti_getrgba($color, 0.5);?>
       <input type='submit' value="<?php if($submitbtn_text){echo $submitbtn_text;} else{ echo 'Submit'; } ?>" style="background:<?php echo $submitbtn_bgcolor; ?>; color:<?php echo $submitbtn_color; ?>; box-shadow:0 10px 30px 0px <?php echo $rgba;?>" onMouseOver="this.style.background='<?php echo $submitbtn_bghovercolor; ?>'"  onMouseOut="this.style.background='<?php echo $submitbtn_bgcolor; ?>'" />
       </div>
       
 </form>
 
 <div id="succmsg"></div>
 </div>
 </div>
 </div>
  <?php else:
  
  echo "<h3>Please select form field in plugin settings to show form</h3>";
  
  endif; ?>
 <script type="text/javascript">
 jQuery(function($){
	$("#pti_inf_form").validate({
		rules: {
				
				Email:{
					  required: true,
					  email:true
					}
				
				
		},
		submitHandler: function() {
		return formSubmit();
		}
	});
	function formSubmit()
	   {
		var data = $('#pti_inf_form').serialize();
		$.ajax({
		type : "post",
		url : "action.php",
		data :data,
		success : function(msg){
			if(msg)
			 {
			 $("div#succmsg").addClass('succ');
			 $("div#succmsg").append("Your message successfully sent Thank you!")
			}
		  }
	  });
	document.getElementById("pti_inf_form").reset();
	}
});

function pti_trim(el) {
    el.value = el.value.
    replace(/(^\s*)|(\s*$)/gi, ""). // removes leading and trailing spaces
    replace(/[ ]{2,}/gi, " "). // replaces multiple spaces with one space 
    replace(/\n +/, "\n"); // Removes spaces after newlines
    return;
}
 </script>
 
 <?php  }
add_shortcode('PTI_FORM_DATA', 'PTI_forms_call');