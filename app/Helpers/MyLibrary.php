<?php



namespace App\Helpers;

use Request;

use Cookie;

use DB;



class MyLibrary {

  public static function currencyconverter($currency,$amount){
    if($currency == 'USD'){
        return $amount;
       }else{
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        return $rates->currency_rate * $amount;
 
        // $fromCurrency = 'USD';
        // $toCurrency = $currency;
        // // $amount = 1;
        // $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
        // $get = file_get_contents($url);
        // $data = preg_split('/\D\s(.*?)\s=\s/',$get);
        // $exhangeRate = (float) substr($data[1],0,7);
        // $convertedAmount = $amount*$exhangeRate;
        // return $convertedAmount;
       }


  }

    public static function currencyconverterallprice($amount){

        if(isset($_COOKIE['selectCurrancy']) && !empty($_COOKIE['selectCurrancy'])){
          $currency = $_COOKIE['selectCurrancy'];
        }else{
          $currency = 'USD';
        }
        if($currency == 'USD'){
        // $sign = '$';
        $sign = 'USD ';
        $response = $amount;
       }elseif($currency =='EUR'){
        // $sign = '€';
        $sign = 'EUR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
        
        // $fromCurrency = 'USD';
        // $toCurrency = $currency;
        // // $amount = 1;
        // $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
        // $get = file_get_contents($url);
        // $data = preg_split('/\D\s(.*?)\s=\s/',$get);
        // $exhangeRate = (float) substr($data[1],0,7);
        // $convertedAmount = $amount*$exhangeRate;
        // $response =  $convertedAmount;
       }
       elseif($currency =='AED'){
        // $sign = '€';
        $sign = 'AED ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='ARS'){
        // $sign = '€';
        $sign = 'ARS ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='AUD'){
        // $sign = '€';
        $sign = 'AUD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='BDT'){
        // $sign = '€';
        $sign = 'BDT ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='BGN'){
        // $sign = '€';
        $sign = 'BGN ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='BHD'){
        // $sign = '€';
        $sign = 'BHD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='BND'){
        // $sign = '€';
        $sign = 'BND ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='BOB'){
        // $sign = '€';
        $sign = 'BOB ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='BRL'){
        // $sign = '€';
        $sign = 'BRL ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='BWP'){
        // $sign = '€';
        $sign = 'BWP ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='BYN'){
        // $sign = '€';
        $sign = 'BYN ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='CAD'){
        // $sign = '€';
        $sign = 'CAD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='CHF'){
        // $sign = '€';
        $sign = 'CHF ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='CLP'){
        // $sign = '€';
        $sign = 'CLP ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='CNY'){
        // $sign = '€';
        $sign = 'CNY ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
      elseif($currency =='COP'){
        // $sign = '€';
        $sign = 'COP ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='CRC'){
        // $sign = '€';
        $sign = 'CRC ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='CZK'){
        // $sign = '€';
        $sign = 'CZK ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='DKK'){
        // $sign = '€';
        $sign = 'DKK ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='DOP'){
        // $sign = '€';
        $sign = 'DOP ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='DZD'){
        // $sign = '€';
        $sign = 'DZD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='EGP'){
        // $sign = '€';
        $sign = 'EGP ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='EUR'){
        // $sign = '€';
        $sign = 'EUR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='FJD'){
        // $sign = '€';
        $sign = 'FJD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='GBP'){
        // $sign = '€';
        $sign = 'GBP ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='GEL'){
        // $sign = '€';
        $sign = 'GEL ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='GHS'){
        // $sign = '€';
        $sign = 'GHS ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='HKD'){
        // $sign = '€';
        $sign = 'HKD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='HRK'){
        // $sign = '€';
        $sign = 'HRK ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='HUF'){
        // $sign = '€';
        $sign = 'HUF ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='IDR'){
        // $sign = '€';
        $sign = 'IDR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='ILS'){
        // $sign = '€';
        $sign = 'ILS ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='INR'){
        // $sign = '€';
        $sign = 'INR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='IQD'){
        // $sign = '€';
        $sign = 'IQD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='JOD'){
        // $sign = '€';
        $sign = 'JOD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='JPY'){
        // $sign = '€';
        $sign = 'JPY ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='KES'){
        // $sign = '€';
        $sign = 'KES ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
        elseif($currency =='KRW'){
        // $sign = '€';
        $sign = 'KRW ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='KWD'){
        // $sign = '€';
        $sign = 'KWD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
        elseif($currency =='KZT'){
        // $sign = '€';
        $sign = 'KZT ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='LBP'){
        // $sign = '€';
        $sign = 'LBP ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
        elseif($currency =='LKR'){
        // $sign = '€';
        $sign = 'LKR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='LTL'){
        // $sign = '€';
        $sign = 'LTL ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='MAD'){
        // $sign = '€';
        $sign = 'MAD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='MMK'){
        // $sign = '€';
        $sign = 'MMK ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='MOP'){
        // $sign = '€';
        $sign = 'MOP ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='MUR'){
        // $sign = '€';
        $sign = 'MUR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='MXN'){
        // $sign = '€';
        $sign = 'MXN ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='MYR'){
        // $sign = '€';
        $sign = 'MYR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='NAD'){
        // $sign = '€';
        $sign = 'NAD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='NGN'){
        // $sign = '€';
        $sign = 'NGN ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='NIO'){
        // $sign = '€';
        $sign = 'NIO ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='NOK'){
        // $sign = '€';
        $sign = 'NOK ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='NPR'){
        // $sign = '€';
        $sign = 'NPR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='NZD'){
        // $sign = '€';
        $sign = 'NZD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
        elseif($currency =='OMR'){
        // $sign = '€';
        $sign = 'OMR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
        elseif($currency =='PEN'){
        // $sign = '€';
        $sign = 'PEN ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
        elseif($currency =='PHP'){
        // $sign = '€';
        $sign = 'PHP ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='PKR'){
        // $sign = '€';
        $sign = 'PKR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='PLN'){
        // $sign = '€';
        $sign = 'PLN ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='PYG'){
        // $sign = '€';
        $sign = 'PYG ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
        elseif($currency =='QAR'){
        // $sign = '€';
        $sign = 'QAR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
        elseif($currency =='RON'){
        // $sign = '€';
        $sign = 'RON ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='RSD'){
        // $sign = '€';
        $sign = 'RSD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='RUB'){
        // $sign = '€';
        $sign = 'RUB ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
        elseif($currency =='SAR'){
        // $sign = '€';
        $sign = 'SAR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='SEK'){
        // $sign = '€';
        $sign = 'SEK ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='SGD'){
        // $sign = '€';
        $sign = 'SGD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='SVC'){
        // $sign = '€';
        $sign = 'SVC ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='THB'){
        // $sign = '€';
        $sign = 'THB ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='TND'){
        // $sign = '€';
        $sign = 'TND ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='TRY'){
        // $sign = '€';
        $sign = 'TRY ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='TWD'){
        // $sign = '€';
        $sign = 'TWD ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='TZS'){
        // $sign = '€';
        $sign = 'TZS ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='UAH'){
        // $sign = '€';
        $sign = 'UAH ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='UGX'){
        // $sign = '€';
        $sign = 'UGX ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='UYU'){
        // $sign = '€';
        $sign = 'UYU ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='UZS'){
        // $sign = '€';
        $sign = 'UZS ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='VEF'){
        // $sign = '€';
        $sign = 'VEF ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='VES'){
        // $sign = '€';
        $sign = 'VES ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='VND'){
        // $sign = '€';
        $sign = 'VND ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='XOF'){
        // $sign = '€';
        $sign = 'XOF ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }
       elseif($currency =='ZAR'){
        // $sign = '€';
        $sign = 'ZAR ';
        $rates = '';
        $rates = DB::table('currencyrate')
            ->select('currency_rate')
            ->where('Currency_code',$currency)
            ->first();
        $response = $rates->currency_rate * $amount;
       }


  //      elseif($currency =='GBP'){
  //       // $sign = '£';
  //       $sign = 'GBP ';
  //       $rates = '';
  //       // $rates = DB::table('currencyrate')
  //       //     ->select('currency_rate')
  //       //     ->where('Currency_code',$currency)
  //       //     ->first();
  //       // $response = $rates->currency_rate * $amount;
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response =  $convertedAmount;

  //      }
  //      elseif($currency =='INR'){
  //       // $sign = '£';
  //       $sign = 'INR ';
  //       $rates = '';
  //       // $rates = DB::table('currencyrate')
  //       //     ->select('currency_rate')
  //       //     ->where('Currency_code',$currency)
  //       //     ->first();
  //       // $response = $rates->currency_rate * $amount;
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response =  $convertedAmount;

  //      }
  //       elseif($currency =='CAD'){

  //       // $sign = '£';
  //       $sign = 'CAD ';
  //       $rates = '';
  //       // $rates = DB::table('currencyrate')
  //       //     ->select('currency_rate')
  //       //     ->where('Currency_code',$currency)
  //       //     ->first();
  //       // $response = $rates->currency_rate * $amount;
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;

  //      }
  //      // United Arab Emirates Dirham
  //      elseif($currency =='AED'){
  //       // $sign = '£';
  //       $sign = 'AED ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       // Argentine Peso
  //       elseif($currency =='ARS'){
  //       $sign = 'ARS ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Australian Dollar
  //      elseif($currency =='AUD'){
  //       $sign = 'AUD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Bangladeshi Taka
  //      elseif($currency =='BDT'){
  //       $sign = 'BDT ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Bulgarian Lev
  //      elseif($currency =='BGN'){
  //       $sign = 'BGN ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Bahraini Dinar
  //      elseif($currency =='BHD'){
  //       $sign = 'BHD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Brunei Dollar
  //      elseif($currency =='BND'){
  //       $sign = 'BND ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Bolivian Boliviano
  //      elseif($currency =='BOB'){
  //       $sign = 'BOB ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Bolivian Boliviano
  //      elseif($currency =='BRL'){
  //       $sign = 'BRL ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Botswanan Pula
  //      elseif($currency =='BWP'){
  //       $sign = 'BWP ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Belarusian Ruble
  //      elseif($currency =='BYN'){
  //       $sign = 'BYN ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Swiss Franc
  //      elseif($currency =='CHF'){
  //       $sign = 'CHF ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Chilean Peso
  //      elseif($currency =='CLP'){
  //       $sign = 'CLP ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Chinese Yuan
  //      elseif($currency =='CNY'){
  //       $sign = 'CNY ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Colombian Peso
  //      elseif($currency =='COP'){
  //       $sign = 'COP ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Costa Rican Colón
  //      elseif($currency =='CRC'){
  //       $sign = 'CRC ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Czech Koruna
  //      elseif($currency =='CZK'){
  //       $sign = 'CZK ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Danish Krone
  //      elseif($currency =='DKK'){
  //       $sign = 'DKK ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Dominican Peso
  //      elseif($currency =='DOP'){
  //       $sign = 'DOP ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Algerian Dinar
  //      elseif($currency =='DZD'){
  //       $sign = 'DZD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //   Egyptian Pound
  //      elseif($currency =='EGP'){
  //       $sign = 'EGP ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Fijian Dollar
  //      elseif($currency =='FJD'){
  //       $sign = 'FJD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Georgian Lari
  //      elseif($currency =='GEL'){
  //       $sign = 'GEL ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Ghanaian Cedi
  //      elseif($currency =='GHS'){
  //       $sign = 'GHS ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Hong Kong Dollar
  //      elseif($currency =='HKD'){
  //       $sign = 'HKD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Croatian Kuna
  //      elseif($currency =='HRK'){
  //       $sign = 'HRK ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //   Hungarian Forint
  //      elseif($currency =='HUF'){
  //       $sign = 'HUF ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Indonesian Rupiah
  //      elseif($currency =='IDR'){
  //       $sign = 'IDR ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Israeli New Sheqel
  //      elseif($currency =='ILS'){
  //       $sign = 'ILS ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Iraqi Dinar
  //      elseif($currency =='IQD'){
  //       $sign = 'IQD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //   Jordanian Dinar
  //      elseif($currency =='JOD'){
  //       $sign = 'JOD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Japanese Yen
  //      elseif($currency =='JPY'){
  //       $sign = 'JPY ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //   Kenyan Shilling
  //      elseif($currency =='KES'){
  //       $sign = 'KES ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //   South Korean Won
  //      elseif($currency =='KRW'){
  //       $sign = 'KRW ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Kuwaiti Dinar
  //      elseif($currency =='KWD'){
  //       $sign = 'KWD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //   Kazakhstani Tenge
  //      elseif($currency =='KZT'){
  //       $sign = 'KZT ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Lebanese Pound
  //      elseif($currency =='LBP'){
  //       $sign = 'LBP ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Sri Lankan Rupee
  //      elseif($currency =='LKR'){
  //       $sign = 'LKR ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Lithuanian Litas
  //      elseif($currency =='LTL'){
  //       $sign = 'LTL ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Moroccan Dirham
  //      elseif($currency =='MAD'){
  //       $sign = 'MAD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Myanma Kyat
  //      elseif($currency =='MMK'){
  //       $sign = 'MMK ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Macanese Pataca
  //      elseif($currency =='MOP'){
  //       $sign = 'MOP ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Mauritian Rupee
  //      elseif($currency =='MUR'){
  //       $sign = 'MUR ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Mexican Peso
  //      elseif($currency =='MXN'){
  //       $sign = 'MXN ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //   Malaysian Ringgit
  //      elseif($currency =='MYR'){
  //       $sign = 'MYR ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Namibian Dollar
  //      elseif($currency =='NAD'){
  //       $sign = 'NAD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Nigerian Naira
  //      elseif($currency =='NGN'){
  //       $sign = 'NGN ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Nicaraguan Córdoba
  //      elseif($currency =='NIO'){
  //       $sign = 'NIO ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Norwegian Krone
  //      elseif($currency =='NOK'){
  //       $sign = 'NOK ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Nepalese Rupee
  //      elseif($currency =='NPR'){
  //       $sign = 'NPR ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  New Zealand Dollar
  //      elseif($currency =='NZD'){
  //       $sign = 'NZD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Omani Rial
  //      elseif($currency =='OMR'){
  //       $sign = 'OMR ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Peruvian Nuevo Sol
  //      elseif($currency =='PEN'){
  //       $sign = 'PEN ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Philippine Peso
  //      elseif($currency =='PHP'){
  //       $sign = 'PHP ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Pakistani Rupee
  //      elseif($currency =='PKR'){
  //       $sign = 'PKR ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Polish Zloty
  //      elseif($currency =='PLN'){
  //       $sign = 'PLN ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Paraguayan Guarani
  //      elseif($currency =='PYG'){
  //       $sign = 'PYG ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Qatari Rial
  //      elseif($currency =='QAR'){
  //       $sign = 'QAR ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Romanian Leu
  //      elseif($currency =='RON'){
  //       $sign = 'RON ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Serbian Dinar
  //      elseif($currency =='RSD'){
  //       $sign = 'RSD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Russian Ruble
  //      elseif($currency =='RUB'){
  //       $sign = 'RUB ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Saudi Riyal
  //      elseif($currency =='SAR'){
  //       $sign = 'SAR ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Swedish Krona
  //      elseif($currency =='SEK'){
  //       $sign = 'SEK ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Singapore Dollar
  //      elseif($currency =='SGD'){
  //       $sign = 'SGD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Salvadoran Colón
  //      elseif($currency =='SVC'){
  //       $sign = 'SVC ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Thai Baht
  //      elseif($currency =='THB'){
  //       $sign = 'THB ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Tunisian Dinar
  //      elseif($currency =='TND'){
  //       $sign = 'TND ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Turkish Lira
  //      elseif($currency =='TRY'){
  //       $sign = 'TRY ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  New Taiwan Dollar
  //      elseif($currency =='TWD'){
  //       $sign = 'TWD ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Tanzanian Shilling
  //      elseif($currency =='TZS'){
  //       $sign = 'TZS ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Ukrainian Hryvnia
  //      elseif($currency =='UAH'){
  //       $sign = 'UAH ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Ugandan Shilling
  //      elseif($currency =='UGX'){
  //       $sign = 'UGX ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Uruguayan Peso
  //      elseif($currency =='UYU'){
  //       $sign = 'UYU ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Uruguayan Peso
  //      elseif($currency =='UZS'){
  //       $sign = 'UZS ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Uzbekistan Som
  //      elseif($currency =='UZS'){
  //       $sign = 'UZS ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Venezuelan Bolívar (2008-2018)
  //      elseif($currency =='VEF'){
  //       $sign = 'VEF ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Venezuelan Bolívar
  //      elseif($currency =='VES'){
  //       $sign = 'VES ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Vietnamese Dong
  //      elseif($currency =='VND'){
  //       $sign = 'VND ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  CFA Franc BCEAO
  //      elseif($currency =='XOF'){
  //       $sign = 'XOF ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //        //  South African Rand
  //      elseif($currency =='ZAR'){
  //       $sign = 'ZAR ';
  //       $rates = '';
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }


  //       /*$url = 'https://api.exchangerate-api.com/v4/latest/USD';
  //       $json = file_get_contents($url);
  //       $exp = json_decode($json);
  //       $convert = $exp->rates->$currency;*/

  //       $response = number_format((float)$response, 2, '.', '');
  //       $response = $sign.$response;
  //       return $response;

  // }



  //    public static function currencyconverterwithoutsymbol($amount){

  //       if(isset($_COOKIE['selectCurrancy']) && !empty($_COOKIE['selectCurrancy'])){
  //         $currency = $_COOKIE['selectCurrancy'];
  //       }else{
  //         $currency = 'USD';
  //       }
  //       if($currency == 'USD'){
  //       $response = $amount;
  //      }elseif($currency =='EUR'){

  //       // $rates = DB::table('currencyrate')
  //       //     ->select('currency_rate')
  //       //     ->where('Currency_code',$currency)
  //       //     ->first();
  //       // $response = $rates->currency_rate * $amount;
        
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;

  //      }elseif($currency =='GBP'){

  //       // $rates = DB::table('currencyrate')
  //       //     ->select('currency_rate')
  //       //     ->where('Currency_code',$currency)
  //       //     ->first();
  //       // $response = $rates->currency_rate * $amount;
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;

  //      }elseif($currency =='INR'){

  //       // $rates = DB::table('currencyrate')
  //       //     ->select('currency_rate')
  //       //     ->where('Currency_code',$currency)
  //       //     ->first();
  //       // $response = $rates->currency_rate * $amount;
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;

  //      }
  //      elseif($currency =='CAD'){

  //       // $rates = DB::table('currencyrate')
  //       //     ->select('currency_rate')
  //       //     ->where('Currency_code',$currency)
  //       //     ->first();
  //       // $response = $rates->currency_rate * $amount;
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;

  //      }
  //      // United Arab Emirates Dirham
  //      elseif($currency =='AED'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Argentine Peso
  //      elseif($currency =='ARS'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Australian Dollar
  //      elseif($currency =='AUD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Bangladeshi Taka
  //      elseif($currency =='BDT'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Bulgarian Lev
  //      elseif($currency =='BGN'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Bahraini Dinar
  //      elseif($currency =='BHD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       // Brunei Dollar
  //      elseif($currency =='BND'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Bolivian Boliviano
  //      elseif($currency =='BOB'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       // Brazilian Real
  //      elseif($currency =='BRL'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Botswanan Pula
  //      elseif($currency =='BWP'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Belarusian Ruble
  //      elseif($currency =='BYN'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Swiss Franc
  //      elseif($currency =='CHF'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Chilean Peso
  //      elseif($currency =='CLP'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Chinese Yuan
  //      elseif($currency =='CNY'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Colombian Peso
  //      elseif($currency =='COP'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Costa Rican Colón
  //      elseif($currency =='CRC'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Czech Koruna
  //      elseif($currency =='CZK'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Danish Krone
  //      elseif($currency =='DKK'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Dominican Peso
  //      elseif($currency =='DOP'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Algerian Dinar
  //      elseif($currency =='DZD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Egyptian Pound
  //      elseif($currency =='EGP'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Fijian Dollar
  //      elseif($currency =='FJD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       // Georgian Lari
  //      elseif($currency =='GEL'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Ghanaian Cedi
  //      elseif($currency =='GHS'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Hong Kong Dollar
  //      elseif($currency =='HKD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Croatian Kuna
  //      elseif($currency =='HRK'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Hungarian Forint
  //      elseif($currency =='HUF'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Indonesian Rupiah
  //      elseif($currency =='IDR'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Israeli New Sheqel
  //      elseif($currency =='ILS'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Iraqi Dinar
  //      elseif($currency =='IQD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Jordanian Dinar
  //      elseif($currency =='JOD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Japanese Yen
  //      elseif($currency =='JPY'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Kenyan Shilling
  //      elseif($currency =='KES'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // South Korean Won
  //      elseif($currency =='KRW'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Kuwaiti Dinar
  //      elseif($currency =='KWD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Kazakhstani Tenge
  //      elseif($currency =='KZT'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Lebanese Pound
  //      elseif($currency =='LBP'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       // Sri Lankan Rupee
  //      elseif($currency =='LKR'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Lithuanian Litas
  //      elseif($currency =='LTL'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       // Moroccan Dirham
  //      elseif($currency =='MAD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Myanma Kyat
  //      elseif($currency =='MMK'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Macanese Pataca
  //      elseif($currency =='MOP'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Mauritian Rupee
  //      elseif($currency =='MUR'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       // Mexican Peso
  //      elseif($currency =='MXN'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Malaysian Ringgit
  //      elseif($currency =='MYR'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Namibian Dollar
  //      elseif($currency =='NAD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Nigerian Naira
  //      elseif($currency =='NGN'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       // Nicaraguan Córdoba
  //      elseif($currency =='NIO'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       // Norwegian Krone
  //      elseif($currency =='NOK'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Nepalese Rupee
  //      elseif($currency =='NPR'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // New Zealand Dollar
  //      elseif($currency =='NZD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      // Omani Rial
  //      elseif($currency =='OMR'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Peruvian Nuevo Sol
  //      elseif($currency =='PEN'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Philippine Peso
  //      elseif($currency =='PHP'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Pakistani Rupee
  //      elseif($currency =='PKR'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Polish Zloty
  //      elseif($currency =='PLN'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Paraguayan Guarani
  //      elseif($currency =='PYG'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //   Qatari Rial
  //      elseif($currency =='QAR'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Romanian Leu
  //      elseif($currency =='RON'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Serbian Dinar
  //      elseif($currency =='RSD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Russian Ruble
  //      elseif($currency =='RUB'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //   Saudi Riyal
  //      elseif($currency =='SAR'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //   Swedish Krona
  //      elseif($currency =='SEK'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //   Singapore Dollar
  //      elseif($currency =='SGD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Salvadoran Colón
  //      elseif($currency =='SVC'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Thai Baht
  //      elseif($currency =='THB'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Tunisian Dinar
  //      elseif($currency =='TND'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Turkish Lira
  //      elseif($currency =='TRY'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  New Taiwan Dollar
  //      elseif($currency =='TWD'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Tanzanian Shilling
  //      elseif($currency =='TZS'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Ukrainian Hryvnia
  //      elseif($currency =='UAH'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Ugandan Shilling
  //      elseif($currency =='UGX'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Uruguayan Peso
  //      elseif($currency =='UYU'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Uzbekistan Som
  //      elseif($currency =='UZS'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Venezuelan Bolívar (2008-2018)
  //      elseif($currency =='VEF'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //       //  Venezuelan Bolívar
  //      elseif($currency =='VES'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  Vietnamese Dong
  //      elseif($currency =='VND'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  CFA Franc BCEAO
  //      elseif($currency =='XOF'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
  //      //  South African Rand
  //      elseif($currency =='ZAR'){
  //       $fromCurrency = 'USD';
  //       $toCurrency = $currency;
  //       // $amount = 1;
  //       $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
  //       $get = file_get_contents($url);
  //       $data = preg_split('/\D\s(.*?)\s=\s/',$get);
  //       $exhangeRate = (float) substr($data[1],0,7);
  //       $convertedAmount = $amount*$exhangeRate;
  //       $response= $convertedAmount;
  //      }
   else{
    $sign = 'USD ';
    $rates = '';
    $response =500;
   }
       $response = number_format((float)$response, 2, '.', '');
       $response = $response;
        return $response ;

  } 





  public static function getprodectreview($prodectid){

    $ProdectsReview = DB::table('reviewsmaster')

            ->select('*')

            ->where('productid',$prodectid)

            ->get();

    $ratingCount = '';

    $ReviewCount = 0;

    foreach($ProdectsReview as $Review){

            $ratingCount = (int)$Review->rating + (int)$ratingCount;

            $ReviewCount++;

        }

        if((int)$ratingCount != 0 && (int)$ReviewCount != 0){

            $RatingData = (int)$ratingCount/(int)$ReviewCount;

        }else{

            $RatingData = 0;

        }



      return $RatingData;  

  }

  public static function currencyconverterallpriceChange($amount){

    if(isset($_COOKIE['selectCurrancy']) && !empty($_COOKIE['selectCurrancy'])){
      $currency = $_COOKIE['selectCurrancy'];
    }else{
      $currency = 'USD';
    }
    if($currency == 'USD'){
        $response = $amount;
   }else{
    $rates = '';
    $rates = DB::table('currencyrate')
        ->select('currency_rate')
        ->where('Currency_code',$currency)
        ->first();
    $response = $rates->currency_rate * $amount;
   }
   $response = number_format((float)$response, 2, '.', '');
   $response = $response;
    return $response ;
}


}