<?php
// Connect to Infusionsoft

if(isset($_POST['pti_simple_nonce'])){  
		 if(wp_verify_nonce($_POST['pti_simple_nonce'], 'pti_simple_nonce')){
			 
			if(!@require_once('api_data/isdk.php')) {
    require_once("api_data/isdk.php");
			}
	  if (class_exists('iSDK')) {
$app = new iSDK;
			
if ($app->cfgCon("if491")) {
$currentDate = date_format(date_create(), 'YmdTH:i:s');
// Check for the method
 if ($_SERVER[REQUEST_METHOD] == 'POST') {
if (isset($_POST['FirstName'])) {
$fname = sanitize_text_field($_POST['FirstName']);
}
if (isset($_POST['LastName'])) {
$lname = sanitize_text_field($_POST['LastName']);
} 
 
if (isset($_POST['Email'])) {
$email = sanitize_email($_POST['Email']);
}
if (isset($_POST['Phone1'])) {
$Phone1 = intval(sanitize_text_field($_POST['Phone1']));
}
if (isset($_POST['Fax1'])) {
$Fax1 = intval(sanitize_text_field($_POST['Fax1']));
}
if (isset($_POST['JobTitle'])) {
$JobTitle = sanitize_text_field($_POST['JobTitle']);
}
if (isset($_POST['Company'])) {
$Company = sanitize_text_field($_POST['Company']);
}
if (isset($_POST['StreetAddress1'])) {
$StreetAddress1 = sanitize_text_field($_POST['StreetAddress1']);
}
if (isset($_POST['StreetAddress2'])) {
$StreetAddress2 = sanitize_text_field($_POST['StreetAddress2']);
}
if (isset($_POST['City'])) {
$City = sanitize_text_field($_POST['City']);
}
if (isset($_POST['State'])) {
$State = sanitize_text_field($_POST['State']);
}
if (isset($_POST['PostalCode'])) {
$PostalCode = intval(sanitize_text_field($_POST['PostalCode']));
}
if (isset($_POST['Country'])) {
$Country = sanitize_text_field($_POST['Country']);
}
if (isset($_POST['Website'])) {
$Website = $_POST['Website'];
$Website = filter_var($Website, FILTER_VALIDATE_URL);
}} 
// Update contact record using AddWithDupCheck method
$data = array('FirstName' => $fname,    
'LastName' => $lname,       
'Email' => $email,
'Phone1' => $Phone1,
'Fax1' => $Fax1,
'JobTitle' => $JobTitle,
'Company' => $Company,
'StreetAddress1' => $StreetAddress1,
'StreetAddress2' => $StreetAddress2,
'City' => $City,
'State' => $State,
'PostalCode' => $PostalCode,
'Country' => $Country,
'Website' => $Website
);        
$update = $app->addWithDupCheck($data, 'Email'); 
if($update){
 echo "Your message successfully sent Thank you!";
} else{
	echo "Something went wrong form not submitted";
	}
} else {
 echo "Sorry you are not Connected";
}
		 } else{
			 
			echo "Sorry Something going wrong with security issue!";
			 
			 }
		 
		 }}