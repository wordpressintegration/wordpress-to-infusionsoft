<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 function register_pti_settings() {
    $settingsArray = array (
        'pti_account_name', 
        'pti_api_key',
		'pti_field_value'
    );
    foreach ($settingsArray as $setting) {
        register_setting( 'pti-group', $setting);
    }
}
add_action( 'admin_init', 'register_pti_settings' );
 function register_pti_style() {
    $settingsArray = array (
		'form_heading',
		'form_bgcolor',
		'submitbtn_text',
		'submitbtn_color',
		'submitbtn_bgcolor',
		'submitbtn_bghovercolor'  
		 );
    foreach ($settingsArray as $setting) {
        register_setting( 'pti-group1', $setting);
		
    }
}
add_action( 'admin_init', 'register_pti_style' );
function PTI_forms_shortcode(){
?>
<div id="wrap">
<div class="container_pti">
	<ul class="tabs">
		<li class="tab-link current" data-tab="tab-1">Settings</li>
		<li class="tab-link" data-tab="tab-2">Styles</li>
        <li class="tab-link" data-tab="tab-3">Other</li>
		
	</ul>
<hr />
<div id="tab-1" class="tab-content current">
  <h3>Settings</h3>
  <strong>Enter Infusionsoft details.</strong>
 <?php  ?>
 
 
 
 
 <form method="post" action="options.php">
  <?php settings_fields( 'pti-group' );
        do_settings_sections( 'pti-group' );
		
  ?>
    <table class="form-table"><tbody>
    <tr><th scope="row">Account Name:</th><td>
    <input name="pti_account_name" value="<?php echo esc_attr( get_option('pti_account_name') ); ?>" required="required" size="80"  type="text">
    </td></tr>
    
    <tr><th scope="row">Encrypted Key (API key)</th><td>    
    <input name="pti_api_key" value="<?php echo esc_attr( get_option('pti_api_key') ); ?>" required="required" size="80"  type="text">
    </td></tr>
    
    <tr><th scope="row">Select fields to show in form</th><td>  
    <?php $val = get_option('pti_field_value'); ?>  
    <select name="pti_field_value[]" multiple="multiple" class="2colactive" id="pti_multiselect">
        <option <?php if(@in_array('fName', $val)) { echo "selected='selected'"; }?> value="fName">First Name</option>
        <option value="lName" <?php if(@in_array('lName', $val)){ echo "selected='selected'"; }?>>Last name</option>
        <option value="email" <?php if(@in_array('email', $val)){ echo "selected='selected'"; }?>>Email</option>
        <option value="phone" <?php if(@in_array('phone', $val)){ echo "selected='selected'"; }?>>Phone</option>
        <option value="fax" <?php if(@in_array('fax', $val)){ echo "selected='selected'"; }?>>Fax</option>
        <option value="company" <?php if(@in_array('company', $val)){ echo "selected='selected'"; }?>>Company</option>
        <option value="job-title" <?php if(@in_array('job-title', $val)){ echo "selected='selected'"; }?>>Job Title</option>        <option value="streetaddress1" <?php if(@in_array('streetaddress1', $val)){ echo "selected='selected'"; }?>>Street Address 1</option>
        <option value="streetaddress2" <?php if(@in_array('streetaddress2', $val)){ echo "selected='selected'"; }?>>Street Address 2</option>
        <option value="city" <?php if(@in_array('city', $val)){ echo "selected='selected'"; }?>>City</option>
        <option value="state" <?php if(@in_array('state', $val)){ echo "selected='selected'"; }?>>State</option>
        <option value="PostalCode" <?php if(@in_array('pc', $val)){ echo "selected='selected'"; }?>>Postal Code</option>
        <option value="country" <?php if(@in_array('country', $val)){ echo "selected='selected'"; }?>>Country</option>
        <option value="website" <?php if(@in_array('website', $val)){ echo "selected='selected'"; }?>>Website</option>
    </select>
    </td></tr>
    <tr> <th scope="row"><?php submit_button(); ?></td></tr>
    </tbody></table>
 </form>
</div>
<div id="tab-2" class="tab-content">
  <h3>Style</h3>
 
<form method="post" action="options.php"  id="pti_setting_form">
  <?php settings_fields( 'pti-group1' );
  do_settings_sections( 'pti-group1' );
   $form_bgcolor =  get_option('form_bgcolor');
   $submitbtn_text =  get_option('submitbtn_text');
   $submitbtn_color =  get_option('submitbtn_color');
   $submitbtn_bgcolor =  get_option('submitbtn_bgcolor');
   $submitbtn_bghovercolor =  get_option('submitbtn_bghovercolor');
  
   $logo_option = get_option( 'logo-option' );
  ?>
   <table class="form-table"><tbody>
   <?php wp_nonce_field( 'pti_checkdata', 'pti_option_nonce' ); ?>  
    <tr><th scope="row">Enter form heading</th><td>
    <input id="form_heading" name="form_heading"   type="text" size="80" value="<?php echo trim(get_option('form_heading')); ?>">
    
    
    <tr><th scope="row">Select Form Background Color</th><td>
    <input class="pti_style" name="form_bgcolor" value="<?php if($form_bgcolor){ echo trim($form_bgcolor);} else{ echo "#f1f1f1";} ?>" type="text">
    
       
      <tr><th scope="row">Submit button text</th><td>
    <input id="form_heading" name="submitbtn_text"   type="text" size="80" value="<?php echo trim(get_option('submitbtn_text')); ?>">
    
   
   <tr><th scope="row">Submit button text color</th><td>
    <input class="pti_style" name="submitbtn_color" value="<?php if($submitbtn_color){ echo trim($submitbtn_color);} else{ echo "#ffffff";} ?>" type="text">
   
    
    <tr><th scope="row">Submit button background color</th><td>
    <input class="pti_style" name="submitbtn_bgcolor" value="<?php if($submitbtn_bgcolor){ echo trim($submitbtn_bgcolor);} else{ echo "#333333";} ?>" type="text">
    
    
    <tr><th scope="row">Submit button background hover color</th><td>
    <input class="pti_style" name="submitbtn_bghovercolor" value="<?php if($submitbtn_bghovercolor){ echo trim($submitbtn_bghovercolor);} else{ echo "#333333";} ?>" type="text">
    
   
   
     <tr> <th scope="row"><?php submit_button(); ?></th></tr>
    </tbody></table>
    </form>
   
  </div>
<div id="tab-3" class="tab-content">
<div>
<div style="padding-left:12px">
<h3>Shortcode</h3>
<input type="text" size="74" value="[PTI_FORM_DATA]" readonly="readonly" style="height:45px" onfocus="this.select();" />
</div>
<?php echo '<img src="' . plugins_url( '/images/screenshot_form.jpg', __FILE__ ) . '" style="width:500px; height:400px" >  '; ?>
</div>
</div>
</div>
</div>
<?php }
