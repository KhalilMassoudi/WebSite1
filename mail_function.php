<?php
require 'vendor/autoload.php'; // Assure-toi que ce chemin est correct

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function smtpmailer($to, $from, $from_name, $subject, $body)
{
    $mail = new PHPMailer(true);  // Instancier PHPMailer avec les exceptions activées

    try {
        $mail->isSMTP();             // Utiliser le SMTP
        $mail->SMTPAuth = true;      // Activer l'authentification SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Utiliser TLS pour sécuriser l'envoi (ou 'ssl' selon le serveur)
        $mail->Host = 'smtp.gmail.com'; // Serveur SMTP de Gmail
        $mail->Port = 587;           // Port SMTP de Gmail pour TLS (ou 465 pour SSL)
        $mail->Username = 'kmassoudi03@gmail.com'; // Ton adresse e-mail Gmail
        $mail->Password = 'Kadeux25//';  // Le mot de passe d'application généré si tu utilises Gmail

        // Expéditeur et contenu de l'e-mail
        $mail->isHTML(true);         // Envoyer l'e-mail en HTML
        $mail->setFrom($from, $from_name); // Adresse e-mail de l'expéditeur
        $mail->addReplyTo($from, $from_name); // Adresse e-mail pour les réponses
        $mail->addAddress($to);      // Ajouter l'adresse e-mail du destinataire
        $mail->Subject = $subject;   // Sujet de l'e-mail
        $mail->Body = $body;         // Contenu de l'e-mail

        // Activer le débogage pour obtenir plus de détails
        $mail->SMTPDebug = 2;  

        $mail->send();
        return "Merci ! Votre e-mail a été envoyé.";
    } catch (Exception $e) {
        return "Erreur : " . $mail->ErrorInfo;
    }
}


