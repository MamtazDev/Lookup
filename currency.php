<?php 

$fromCurrency = 'USD';
	$toCurrency = 'INR';
	$amount = 1;
	$url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;

	$get = file_get_contents($url,false);
	$data = preg_split('/\D\s(.*?)\s=\s/',$get);
	$exhangeRate = (float) substr($data[1],0,7);
	echo $convertedAmount = $amount*$exhangeRate;
	
?>	

