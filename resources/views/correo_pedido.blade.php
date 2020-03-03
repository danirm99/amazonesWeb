<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{public_path('css/bootstrap4/bootstrap.min.css')}}">
    <style>
        .customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        .customers td, .customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        .customers tr:nth-child(even){background-color: #f2f2f2;}

        .customers tr:hover {background-color: #ddd;}

        .customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
        }
    </style>
</head>
<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'contactoamazones@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'contactoamazones1899181299';

//Set who the message is to be sent from
$mail->setFrom('contactoamazones@gmail.com', 'Amazones');

//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', '');

//Set who the message is to be sent to
$mail->addAddress($sql[0]->correo, $sql[0]->nombre);

//Set the subject line
$mail->Subject = 'Informacion del pedido';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

$body = '<table style="  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%;">
         
                <tr>
                    <th style="    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: center;
                    background-color: #4CAF50;
                    color: white;">Producto</th>

                    <th style="   padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: center;
                    background-color: #4CAF50;
                    color: white;">Cantidad</th>

                    <th style="    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: center;
                    background-color: #4CAF50;
                    color: white;">Precio</th>

                </tr>';

        foreach ($items as $key => $value) {
            $body .= '<tr style = tr:nth-child(even){background-color: #f2f2f2;}; text-aling:center  ">';
                            $body .= '<td>'. $value->name .'</td>';
                            $body .= '<td>'. $value->quantity .'</td>';
                            $body .= '<td>'. $value->price * $value->quantity . '€</td>';

            $body .= '</tr>';
            }
        
$mail->Body = $body.'</table>';

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
$mail->addStringAttachment($pdf->output(), 'Pedido.pdf');

//send the message, check for errors
if (!$mail->send()) {

    return redirect("/");
    
} else {
    
    Cart::clear();

    ?>
    <script>

        location.href='../public/';

    </script>

    <?php

}

