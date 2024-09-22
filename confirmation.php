<?php
require 'vendor/autoload.php'; // Assure-toi que PHPMailer est autoloadé
require 'mail_function.php'; // Inclure le fichier avec la fonction smtpmailer
include 'conn.php'; // Connexion à la base de données

// Vérification si les paramètres 'email' et 'cle' sont présents dans l'URL
if (isset($_GET['email']) && isset($_GET['cle'])) {
    $email = $conn->real_escape_string($_GET['email']);
    $cle = $conn->real_escape_string($_GET['cle']);

    // Rechercher l'utilisateur avec l'email et la clé fournis
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND cle = ? AND confirmation = 0");
    $stmt->bind_param("ss", $email, $cle);
    $stmt->execute();
    $result = $stmt->get_result();

    // Si un utilisateur est trouvé et n'est pas encore confirmé
    if ($result->num_rows > 0) {
        // Mise à jour de la confirmation de l'utilisateur
        $updateStmt = $conn->prepare("UPDATE users SET confirmation = 1 WHERE email = ? AND cle = ?");
        $updateStmt->bind_param("ss", $email, $cle);

        if ($updateStmt->execute()) {
            // Confirmation réussie, envoi d'un e-mail de confirmation
            $to = $email;
            $from = 'kmassoudi03@gmail.com'; // Ton adresse e-mail
            $from_name = 'KHALIL';       // Ton nom
            $subject = 'Confirmation de votre inscription';
            $body = "Bonjour,<br><br>Votre compte a été confirmé avec succès. Vous pouvez maintenant vous connecter.<br><br>Cordialement,<br>L'équipe du site.";

            $email_status = smtpmailer($to, $from, $from_name, $subject, $body);
            echo $email_status;

            // Préparation pour la redirection après confirmation
            $redirect_message = "Votre compte a été confirmé avec succès ! Vous pouvez maintenant vous connecter.";
        } else {
            $redirect_message = "Erreur lors de la confirmation de votre compte. Veuillez réessayer.";
        }
    } else {
        // Si aucun utilisateur correspondant n'est trouvé ou s'il est déjà confirmé
        $redirect_message = "Ce lien de confirmation est invalide ou le compte a déjà été confirmé.";
    }
} else {
    // Si les paramètres 'email' et 'cle' ne sont pas dans l'URL
    $redirect_message = "Paramètres de confirmation manquants.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #4caf50;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 30px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmation de Compte</h1>
        <p><?php echo isset($redirect_message) ? $redirect_message : ''; ?></p>
        <button id="redirectButton">Retour à la page de connexion</button>
    </div>
    <script>
        document.getElementById('redirectButton').addEventListener('click', function() {
            window.location.href = 'Login.php'; // Redirection vers la page de connexion
        });
    </script>
</body>
</html>
