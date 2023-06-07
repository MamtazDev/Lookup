<?php
namespace App\Helpers;



use Mail;
use Request;
use App\Models\ProductModel; 

class OrderMails {

 	public static function OrderProcessing($data) {
    
    $to = $data['customerdata']['email'];
    $subject = 'LakouPhotos: Order Update';
    $varifyUrl = "sdxa";
	$from = 'jim7garry@gmail.com';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    $orderid = $data['orderdata']['order_id'];
    $address = $data['orderdata']['shipping_address'];
    $orderamount = $data['orderdata']['order_amount'];
    $originalDate = $data['orderdata']['created_at'];
    $orderitemData = $data['orderitemData'];
    $newDate = date("d F Y", strtotime($originalDate)); 
    $UserData['link']= 'https://maquinistas.in/LakouPhotosArtist/';
    $message  = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
        <tbody>
        <tr>
            <td align="center" valign="top">
                <div id="m_594855277690241005template_header_image">
                </div>
                  <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_594855277690241005template_container" style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px">
                      <tbody>
                      <tr>
                          <td align="center" valign="top">
                             <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_594855277690241005template_header" style="background-color:#96588a;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0">
                        <tbody>
                        <tr>
                        <td id="m_594855277690241005header_wrapper" style="padding:36px 48px;display:block">
                        <h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff;background-color:inherit">Your order is now been processing</h1>
                            </td>
                           </tr>
                           </tbody>
                           </table>
                        </td>
                    </tr>
                   <tr>
                <td align="center" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_594855277690241005template_body"><tbody><tr>
            <td valign="top" id="m_594855277690241005body_content" style="background-color:#ffffff">
          <table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr>
          <td valign="top" style="padding:48px 48px 32px">
     <div id="m_594855277690241005body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
<p style="margin:0 0 16px">Hi ,</p>
<p style="margin:0 0 16px">Thank you for the purchase.</p>
<h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
    [<span class="il">Order</span> #'.$orderid.'] ('.$newDate.')</h2>

<div style="margin-bottom:40px">
    <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
<thead><tr>
<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Product</th>
                
  <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"> Quantity</th>
   <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"> Amount</th>
            </tr></thead>
<tbody>';
foreach($orderitemData as $iteam){

            $ProductData =  ProductModel::getProdectsbyIdfororder($iteam->productid);
               
                

              
$message .= '<tr>
<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
       '.$ProductData->title.'    </td>
        <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
            '.$iteam->quantity.'       </td>
        <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
            <span>$'.$iteam->product_price.'</span>      </td>
    </tr>';

     }

   $message .= '</tbody>
<tfoot>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Subtotal:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span>$'.$orderamount.'</span></td>
                    </tr>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Payment method:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Paypal</td>
                    </tr>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Total:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"><span>$'.$orderamount.'</span></td>
                    </tr>
</tfoot>
</table>
</div>
<table id="m_594855277690241005addresses" cellspacing="0" cellpadding="0" border="0" style="width:100%;vertical-align:top;margin-bottom:40px;padding:0"><tbody><tr>
<td valign="top" width="50%" style="text-align:left;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;border:0;padding:0">
            <h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">Billing address</h2>

            <address style="padding:12px;color:#636363;border:1px solid #e5e5e5">
               '.$address.'                                               <br><a href="mailto:jim7garry@gmail.com" target="_blank">jim7garry@gmail.com</a>                            </address>
        </td>
            </tr></tbody></table>
<p style="margin:0 0 16px"></p>
                                                            </div>
                                                        </td>
                                                    </tr></tbody></table>

</td>
                                        </tr></tbody></table>

</td>
                            </tr>
</tbody></table>
</td>
                </tr>
<tr>
<td align="center" valign="top">
                        
                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="m_594855277690241005template_footer"><tbody><tr>
<td valign="top" style="padding:0;border-radius:6px">
                                    <table border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr>
<td colspan="2" valign="middle" id="m_594855277690241005credit" style="border-radius:6px;border:0;color:#8a8a8a;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:24px 0">
                                                <p style="margin:0 0 16px">LakouPhotos </p>
                                            </td>
                                        </tr></tbody></table>
</td>
                            </tr></tbody></table>

</td>
                </tr>
</tbody></table>';

    $response=mail($to, $subject, $message, $headers);



	}	

    public static function OrderCancelled($data) {


    $to = $data['customerdata']['email'];
    $subject = 'LakouPhotos: Order Update';
    $varifyUrl = "sdxa";
    $from = 'jim7garry@gmail.com';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    $orderid = $data['orderdata']['order_id'];
    $address = $data['orderdata']['shipping_address'];
    $orderamount = $data['orderdata']['order_amount'];
    $originalDate = $data['orderdata']['created_at'];
    $orderitemData = $data['orderitemData'];
    $newDate = date("d F Y", strtotime($originalDate)); 
    $UserData['link']= 'https://maquinistas.in/LakouPhotosArtist/';
    $message  = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
        <tbody>
        <tr>
            <td align="center" valign="top">
                <div id="m_594855277690241005template_header_image">
                </div>
                  <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_594855277690241005template_container" style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px">
                      <tbody>
                      <tr>
                          <td align="center" valign="top">
                             <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_594855277690241005template_header" style="background-color:#96588a;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0">
                        <tbody>
                        <tr>
                        <td id="m_594855277690241005header_wrapper" style="padding:36px 48px;display:block">
                        <h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff;background-color:inherit">Your order is now been Cancelled</h1>
                            </td>
                           </tr>
                           </tbody>
                           </table>
                        </td>
                    </tr>
                   <tr>
                <td align="center" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_594855277690241005template_body"><tbody><tr>
            <td valign="top" id="m_594855277690241005body_content" style="background-color:#ffffff">
          <table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr>
          <td valign="top" style="padding:48px 48px 32px">
     <div id="m_594855277690241005body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
<p style="margin:0 0 16px">Hi ,</p>
<p style="margin:0 0 16px">Thank you for the purchase.</p>
<h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
    [<span class="il">Order</span> #'.$orderid.'] ('.$newDate.')</h2>

<div style="margin-bottom:40px">
    <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
<thead><tr>
<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Product</th>
                
  <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"> Quantity</th>
   <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"> Amount</th>
            </tr></thead>
<tbody>';
foreach($orderitemData as $iteam){

            $ProductData =  ProductModel::getProdectsbyIdfororder($iteam->productid);
               
                

              
$message .= '<tr>
<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
       '.$ProductData->title.'    </td>
        <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
            '.$iteam->quantity.'       </td>
        <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
            <span>$'.$iteam->product_price.'</span>      </td>
    </tr>';

     }

   $message .= '</tbody>
<tfoot>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Subtotal:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span>$'.$orderamount.'</span></td>
                    </tr>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Payment method:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Paypal</td>
                    </tr>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Total:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"><span>$'.$orderamount.'</span></td>
                    </tr>
</tfoot>
</table>
</div>
<table id="m_594855277690241005addresses" cellspacing="0" cellpadding="0" border="0" style="width:100%;vertical-align:top;margin-bottom:40px;padding:0"><tbody><tr>
<td valign="top" width="50%" style="text-align:left;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;border:0;padding:0">
            <h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">Billing address</h2>

            <address style="padding:12px;color:#636363;border:1px solid #e5e5e5">
               '.$address.'                                               <br><a href="mailto:jim7garry@gmail.com" target="_blank">jim7garry@gmail.com</a>                            </address>
        </td>
            </tr></tbody></table>
<p style="margin:0 0 16px"></p>
                                                            </div>
                                                        </td>
                                                    </tr></tbody></table>

</td>
                                        </tr></tbody></table>

</td>
                            </tr>
</tbody></table>
</td>
                </tr>
<tr>
<td align="center" valign="top">
                        
                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="m_594855277690241005template_footer"><tbody><tr>
<td valign="top" style="padding:0;border-radius:6px">
                                    <table border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr>
<td colspan="2" valign="middle" id="m_594855277690241005credit" style="border-radius:6px;border:0;color:#8a8a8a;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:24px 0">
                                                <p style="margin:0 0 16px">LakouPhotos </p>
                                            </td>
                                        </tr></tbody></table>
</td>
                            </tr></tbody></table>

</td>
                </tr>
</tbody></table>';

    $response=mail($to, $subject, $message, $headers);



    }   


    public static function OrderRefunded($data) {


      $to = $data['customerdata']['email'];
    $subject = 'LakouPhotos: Order Update';
    $varifyUrl = "sdxa";
    $from = 'jim7garry@gmail.com';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    $orderid = $data['orderdata']['order_id'];
    $address = $data['orderdata']['shipping_address'];
    $orderamount = $data['orderdata']['order_amount'];
    $originalDate = $data['orderdata']['created_at'];
    $orderitemData = $data['orderitemData'];
    $newDate = date("d F Y", strtotime($originalDate)); 
    $UserData['link']= 'https://maquinistas.in/LakouPhotosArtist/';
    $message  = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
        <tbody>
        <tr>
            <td align="center" valign="top">
                <div id="m_594855277690241005template_header_image">
                </div>
                  <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_594855277690241005template_container" style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px">
                      <tbody>
                      <tr>
                          <td align="center" valign="top">
                             <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_594855277690241005template_header" style="background-color:#96588a;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0">
                        <tbody>
                        <tr>
                        <td id="m_594855277690241005header_wrapper" style="padding:36px 48px;display:block">
                        <h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff;background-color:inherit">Your order is now been Refunded</h1>
                            </td>
                           </tr>
                           </tbody>
                           </table>
                        </td>
                    </tr>
                   <tr>
                <td align="center" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_594855277690241005template_body"><tbody><tr>
            <td valign="top" id="m_594855277690241005body_content" style="background-color:#ffffff">
          <table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr>
          <td valign="top" style="padding:48px 48px 32px">
     <div id="m_594855277690241005body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
<p style="margin:0 0 16px">Hi ,</p>
<p style="margin:0 0 16px">Thank you for the purchase.</p>
<h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
    [<span class="il">Order</span> #'.$orderid.'] ('.$newDate.')</h2>

<div style="margin-bottom:40px">
    <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
<thead><tr>
<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Product</th>
                
  <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"> Quantity</th>
   <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"> Amount</th>
            </tr></thead>
<tbody>';
foreach($orderitemData as $iteam){

            $ProductData =  ProductModel::getProdectsbyIdfororder($iteam->productid);
               
                

              
$message .= '<tr>
<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
       '.$ProductData->title.'    </td>
        <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
            '.$iteam->quantity.'       </td>
        <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
            <span>$'.$iteam->product_price.'</span>      </td>
    </tr>';

     }

   $message .= '</tbody>
<tfoot>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Subtotal:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span>$'.$orderamount.'</span></td>
                    </tr>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Payment method:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Paypal</td>
                    </tr>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Total:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"><span>$'.$orderamount.'</span></td>
                    </tr>
</tfoot>
</table>
</div>
<table id="m_594855277690241005addresses" cellspacing="0" cellpadding="0" border="0" style="width:100%;vertical-align:top;margin-bottom:40px;padding:0"><tbody><tr>
<td valign="top" width="50%" style="text-align:left;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;border:0;padding:0">
            <h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">Billing address</h2>

            <address style="padding:12px;color:#636363;border:1px solid #e5e5e5">
               '.$address.'                                               <br><a href="mailto:jim7garry@gmail.com" target="_blank">jim7garry@gmail.com</a>                            </address>
        </td>
            </tr></tbody></table>
<p style="margin:0 0 16px"></p>
                                                            </div>
                                                        </td>
                                                    </tr></tbody></table>

</td>
                                        </tr></tbody></table>

</td>
                            </tr>
</tbody></table>
</td>
                </tr>
<tr>
<td align="center" valign="top">
                        
                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="m_594855277690241005template_footer"><tbody><tr>
<td valign="top" style="padding:0;border-radius:6px">
                                    <table border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr>
<td colspan="2" valign="middle" id="m_594855277690241005credit" style="border-radius:6px;border:0;color:#8a8a8a;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:24px 0">
                                                <p style="margin:0 0 16px">LakouPhotos </p>
                                            </td>
                                        </tr></tbody></table>
</td>
                            </tr></tbody></table>

</td>
                </tr>
</tbody></table>';

    $response=mail($to, $subject, $message, $headers);


    }   

    public static function OrderCompleted($data) {


    $to = 'jim7garry@gmail.com';
    $subject = 'LakouPhotos: Order Update';
    $varifyUrl = "sdxa";
    $from = $data['customerdata']['email'];
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    $orderid = $data['orderdata']['order_id'];
    $address = $data['orderdata']['shipping_address'];
    $orderamount = $data['orderdata']['order_amount'];
    $originalDate = $data['orderdata']['created_at'];
    $orderitemData = $data['orderitemData'];
    $newDate = date("d F Y", strtotime($originalDate)); 
    $UserData['link']= 'https://maquinistas.in/LakouPhotosArtist/';
    $message  = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
        <tbody>
        <tr>
            <td align="center" valign="top">
                <div id="m_594855277690241005template_header_image">
                </div>
                  <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_594855277690241005template_container" style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px">
                      <tbody>
                      <tr>
                          <td align="center" valign="top">
                             <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_594855277690241005template_header" style="background-color:#96588a;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0">
                        <tbody>
                        <tr>
                        <td id="m_594855277690241005header_wrapper" style="padding:36px 48px;display:block">
                        <h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff;background-color:inherit">Your order is now been Completed</h1>
                            </td>
                           </tr>
                           </tbody>
                           </table>
                        </td>
                    </tr>
                   <tr>
                <td align="center" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_594855277690241005template_body"><tbody><tr>
            <td valign="top" id="m_594855277690241005body_content" style="background-color:#ffffff">
          <table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr>
          <td valign="top" style="padding:48px 48px 32px">
     <div id="m_594855277690241005body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
<p style="margin:0 0 16px">Hi ,</p>
<p style="margin:0 0 16px">Thank you for the purchase.</p>
<h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
    [<span class="il">Order</span> #'.$orderid.'] ('.$newDate.')</h2>

<div style="margin-bottom:40px">
    <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
<thead><tr>
<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Product</th>
                
  <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"> Quantity</th>
   <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"> Amount</th>
            </tr></thead>
<tbody>';
foreach($orderitemData as $iteam){

            $ProductData =  ProductModel::getProdectsbyIdfororder($iteam->productid);
               
                

              
$message .= '<tr>
<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
       '.$ProductData->title.'    </td>
        <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
            '.$iteam->quantity.'       </td>
        <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif">
            <span>$'.$iteam->product_price.'</span>      </td>
    </tr>';

     }

   $message .= '</tbody>
<tfoot>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Subtotal:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span>$'.$orderamount.'</span></td>
                    </tr>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Payment method:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Paypal</td>
                    </tr>
<tr>
<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Total:</th>
                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"><span>$'.$orderamount.'</span></td>
                    </tr>
</tfoot>
</table>
</div>
<table id="m_594855277690241005addresses" cellspacing="0" cellpadding="0" border="0" style="width:100%;vertical-align:top;margin-bottom:40px;padding:0"><tbody><tr>
<td valign="top" width="50%" style="text-align:left;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;border:0;padding:0">
            <h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">Billing address</h2>

            <address style="padding:12px;color:#636363;border:1px solid #e5e5e5">
               '.$address.'                                               <br><a href="mailto:jim7garry@gmail.com" target="_blank">jim7garry@gmail.com</a>                            </address>
        </td>
            </tr></tbody></table>
<p style="margin:0 0 16px"></p>
                                                            </div>
                                                        </td>
                                                    </tr></tbody></table>

</td>
                                        </tr></tbody></table>

</td>
                            </tr>
</tbody></table>
</td>
                </tr>
<tr>
<td align="center" valign="top">
                        
                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="m_594855277690241005template_footer"><tbody><tr>
<td valign="top" style="padding:0;border-radius:6px">
                                    <table border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr>
<td colspan="2" valign="middle" id="m_594855277690241005credit" style="border-radius:6px;border:0;color:#8a8a8a;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:24px 0">
                                                <p style="margin:0 0 16px">LakouPhotos </p>
                                            </td>
                                        </tr></tbody></table>
</td>
                            </tr></tbody></table>

</td>
                </tr>
</tbody></table>';

    $response=mail($to, $subject, $message, $headers);



    }   


    
}