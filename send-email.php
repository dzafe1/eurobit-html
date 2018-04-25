<?php

if(empty($_POST['name'])      ||
    empty($_POST['email'])     ||
    empty($_POST['phone'])     ||
    empty($_POST['message'])   ||
    !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
    echo "Nisu unešena sva obavezna polja!";
    return false;
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = 'haris.dzafic@eurobit.ba';
$email_subject = "Kontakt forma - $name";
$email_body = "Ime: $name\n\nEmail: $email_address\n\nTelefon: $phone\n\nPoruka:\n$message";
$headers = "From: noreply@eurobit.ba\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
