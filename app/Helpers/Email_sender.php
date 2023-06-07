<?php

namespace App\Helpers;

use Mail;
use Request;

class Email_sender {

 	public static function Signupverification($UserData) {

 	$to = $UserData['email'];
    $subject = 'Please verify your email';
    $varifyUrl = url('/varifyemail/'.$UserData['verifytokan'].'-'.$UserData['id']);
	$from = 'sales@lakouphoto.ca';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    //$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
    //$headers .= "CC: xxx@xxxxx.xxx\r\n";



    $message = "<html><body>";
    $message .= "<p><b> Hello ".$UserData['fullname']."</b></p>";
    $message .= "<p>Please verify your email click on below link</p>";
    $message .= "<p><a href='".$varifyUrl."' title='verify your email' target='_blank'>verify your email</a></p>";
    $message .= "</body></html>";

    $response=mail($to, $subject, $message, $headers);

	}

   public static function NewArtistRequest($UserData) {

    $to = 'sales@lakouphoto.ca';
    $subject = 'New Artist Request';
    $from = $UserData['email'];
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    //$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
    //$headers .= "CC: xxx@xxxxx.xxx\r\n";



    $message = "<html><body>";
    $message .= "<p><b> Hello Admin</b></p>";
    $message .= "<p>New Artist Request</p>";
    $message .= "<p><b>Artist Name: </b>".$UserData['firstname'].' '.$UserData['lastname'] ."</p>";
    $message .= "<p><b>Artist Email: </b>".$UserData['email']."</p>";
    $message .= "<p><b>Artist Phone: </b>".$UserData['phone']."</p>";
    $message .= "</body></html>";

    $response=mail($to, $subject, $message, $headers);

    return $response;

    }	


    public static function resetpasswordemail($tokan,$UserData,$id){
    $to = $UserData;
    $subject = 'Reset Your Password';
    $from = 'sales@lakouphoto.ca';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    //$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
    //$headers .= "CC: xxx@xxxxx.xxx\r\n";
    $url = url('/change-password/'.$tokan.'/'.$id);


    $message = "<html><body>";
    $message .= "<p>Your Reset Your Password Link is hear.<br>
    <a href='".$url."' title='Reset your password'>Reset your password</a></p>";
    $message .= "</body></html>";

    $response=mail($to, $subject, $message, $headers);
    return $response;
    }

    public static function newsletterSubscribe($Useremail,$id,$tokan){
    $to = $Useremail;
    $subject = 'Confirm your subscription';
    $from = 'sales@lakouphoto.ca';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    //$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
    //$headers .= "CC: xxx@xxxxx.xxx\r\n";
    $url = url('Newslette/subscribe/'.$tokan.'/'.$id);


    $message = "<html><body>";
    $message .= "<p>If you have not requested for the newsletter subscription, please ignore this email. You won't be subscribed if you don't click the above confirmation link.<br>
    <a href='".$url."' title='Subscribe'>Subscribe</a></p>";
    $message .= "</body></html>";

    $response=mail($to, $subject, $message, $headers);
    return $response;
    }


    public static function newsletterSubscribeconform($User){
    $to = $User->email;;
    $subject = 'Thank you for Confirm your subscription';
    $from = 'sales@lakouphoto.ca';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    //$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
    //$headers .= "CC: xxx@xxxxx.xxx\r\n";


    $message = "<html><body>";
    $message .= "<p>Thank you for Confirm your subscription. Your subscription has successfully Confirmed.</p>";
    $message .= "</body></html>";

    $response=mail($to, $subject, $message, $headers);

    $to = 'sales@lakouphoto.ca';
    $subject = 'New subscription Confirm';
    $from = $User->email;
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    //$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
    //$headers .= "CC: xxx@xxxxx.xxx\r\n";


    $message = "<html><body>";
    $message .= "<p>New user subscribe newsletter. User Detiles as per below.</p>";
    $message .= "<b>Email:</b>".$User->email;
    $message .= "</body></html>";

    $response=mail($to, $subject, $message, $headers);
    return $response;
    }
    

    public static function ContactUsMail($User){
        
    $to = $User['email'];
    $subject = 'Thank you for connecting with us';
    $from = 'sales@lakouphoto.ca';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    //$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
    //$headers .= "CC: xxx@xxxxx.xxx\r\n";


    $message = "<html><body>";
    $message .= "<p>Thank you for connecting with us. Your contact us has successfully submitted.</p>";
    $message .= "</body></html>";

    $response=mail($to, $subject, $message, $headers);

    $to = 'sales@lakouphoto.ca';
    $subject = 'New contact form';
    $from = $User['email'];
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    //$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
    //$headers .= "CC: xxx@xxxxx.xxx\r\n";


    $message = "<html><body>";
    $message .= "<p>New user submitted contact form. User Detiles as per below.</p>";
    $message .= "<b>Name:</b>".$User['name'];
    $message .= "<br><b>Email:</b>".$User['email'];
    $message .= "<br><b>Subject:</b>".$User['subject'];
    $message .= "<br><b>Message:</b>".$User['message'];
    $message .= "</body></html>";

    $response=mail($to, $subject, $message, $headers);
    return $response;
    }
    


    public static function ReturnRefundMail($User){

        
        
    $to = 'sales@lakouphoto.ca';
    $subject = 'LakouPhotos: Return order mail';
    $from = $User['r-email'];
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";


    $message = "<html><body>";
    $message .= "<p>New user submitted contact form. User Detiles as per below.</p>";
    $message .= "<b>Order Id </b>" .$User['num'];
    $message .= "<br><b>Name:</b>".$User['r-name'].' '.$User['l-name'];
    $message .= "<br><b>Email:</b>".$User['r-email'];
    $message .= "<br><b>Number:</b>".$User['r-num'];
    $message .= "<br><b>Address:</b>".$User['returnAddress'];
    $message .= "<br><b>City:</b>".$User['city'];
    $message .= "<br><b>State:</b>".$User['state'];
    $message .= "<br><b>Pincode:</b>".$User['pin'];
    $message .= "<br><b>OrderId:</b>".$User['num'];
    $message .= "<br><b>Request Type:</b>".$User['q11_requestType'];
    $message .= "<br><b>Reason:</b>".$User['q10_reasonFor10'];
    $message .= "<br><b>Message:</b>".$User['message'];
    $message .= "</body></html>";

    $response=mail($to, $subject, $message, $headers);
    return $response;
    }
}