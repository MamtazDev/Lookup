<?php

namespace App\Helpers;

use Mail;
use Request;

class AdminApproveUser {

 	public static function Signupverification($UserData) {


 	$to = $UserData['email'];
    $subject = 'Please verify your email';
    $varifyUrl = "sdxa";
    // $from = 'jim7garry@gmail.com';
	$from = 'sales@lakouphoto.ca';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    //$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
    //$headers .= "CC: xxx@xxxxx.xxx\r\n";
    // $UserData['link']= 'https://maquinistas.in/LakouPhotosArtist/';
    $UserData['link']= 'https://lakouphoto.ca/Artist/';


    $message  = "<html><body>";
    $message .= "<p><b> Hello ".$UserData['firstname']."</b> <h4>Welcome to LakouPhotos</h4></br></br></p>";
    $message .= "<p><b>Your Account is now ready to use please login using below link</p>";
    $message .= "<b>Your Login link :- </b>".$UserData['link']."<br>";
    $message .= "<b>Your Email :- </b>".$UserData['email']."<br>";
    $message .= "<b>Your Password:- </b>".$UserData['password']."<br>";
    $message .= "<p>Welcome to LakouPhotos Registration Successful</p>";
    $message .= "</body></html>";

    $response=mail($to, $subject, $message, $headers);



	}	


    public static function AcceptedWithdraw($UserData) {


    $to = $UserData['email'];
    $subject = 'Please verify your email';
    $varifyUrl = "sdxa";
    // $from = 'jim7garry@gmail.com';
    $from = 'sales@lakouphoto.ca';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    //$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
    //$headers .= "CC: xxx@xxxxx.xxx\r\n";



    $message = "<html><body>";
    $message .= "<p><b> Hello ".$UserData['firstname']."</b> <h4>Welcome to LakouPhotos</h4></br></br></p>";
    $message .= "<p><b>Your Account is now ready to use please login using below link</p>";
    $message .= "<b>Your Email :- </b>".$UserData['email']."<br>";
    $message .= "<b>Your Password:- </b>".$UserData['password']."<br>";
    $message .= "<p><a href='#' title='Registration Successful' target='_blank'>Registration Successful</a></p>";
    $message .= "</body></html>";

    $response=mail($to, $subject, $message, $headers);



    }   
}