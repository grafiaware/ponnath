<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "ponnath_web@localhost"; // Změňte na vaši e-mailovou adresu
    $subject = "Nová zpráva od $name";
    $body = "Jméno: $name\nE-mail: $email\nZpráva:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Zpráva byla úspěšně odeslána!";
    } else {
        echo "Nastala chyba při odesílání zprávy.";
    }
}

