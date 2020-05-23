<?php

function send_registration_mail($to_email,$firstname){
$subject = "Thank you for registernig";
$body ="Hi $firstname,"."\n\n"."        This is from Karapitiya Dental unit. We would like to thank you for registering in our web application. Looking forward to provide you every support we can offer."."\n\n"."Dental Unit,"."\n"."Karapitiya Teaching Hospital.";
$headers = "From: KARAPITIYA DENTAL";

mail($to_email, $subject, $body, $headers);

}


?>
