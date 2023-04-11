<?php

$stripeSecretKey = 'sk_test_51MuBJCC7KqWda1zXmcPChygGUZItPN5I4TW8b9h65OxkavjkRHQ1Q3ae5qwgL3kVg5imk2SXPw1WdpnTlBlnGfsi00QtE9Ngdz';
$stripe = \Stripe\Stripe::setApiKey($stripeSecretKey);
?>