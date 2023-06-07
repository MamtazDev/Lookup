<?php

## CONFIG ##

# LIST EMAIL ADDRESS
$recipient = "nupurrana@maquinistas.in";

# SUBJECT (Subscribe/Remove)
$subject = "Subscribe";

# RESULT PAGE
$location = "https://maquinistas.in/lakouphoto-design/home.html";

## FORM VALUES ##

# SENDER - WE ALSO USE THE RECIPIENT AS SENDER IN THIS SAMPLE
# DON'T INCLUDE UNFILTERED USER INPUT IN THE MAIL HEADER!
$sender = $recipient;

# MAIL BODY

$body .= "Name: ".$_REQUEST['name']." \n";
$body .= "Email: ".$_REQUEST['email']." \n";
$body .= "Text: ".$_REQUEST['subject']." \n";
$body .= "Msg: ".$_REQUEST['message']." \n";
# add more fields here if required

## SEND MESSGAE ##

mail( $recipient, $subject, $body, "From: $sender" ) or die ("Mail could not be sent.");

## SHOW RESULT PAGE ##

header( "Location: $location" );
?>