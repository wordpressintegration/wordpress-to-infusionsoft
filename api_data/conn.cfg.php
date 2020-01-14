<?php
 $accountName = trim(get_option('pti_account_name'));
 $encryptKey = trim(get_option('pti_api_key'));
 $connInfo = array(
   "$accountName:$accountName:i:$encryptKey:This is for $accountName.infusionsoft.com"
);