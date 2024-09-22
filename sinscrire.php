<?php
require 'vendor/autoload.php';
include 'conn.php';
include 'mail_function.php'; // Inclure le fichier contenant la fonction smtpmailer

if (isset($_POST['submit'])) {
    // Sécurisation des entrées utilisateur
    $identifiant = $conn->real_escape_string($_POST['identifiant']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm-password']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $cle = bin2hex(random_bytes(16));  // Générer une clé aléatoire sécurisée

    // Vérification des champs
    $errors = [];
    if (empty($identifiant)) {
        echo "<script>alert('L'identifiant est requis!'); window.history.back();</script>";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $identifiant)) {
        echo "<script>alert('L'identifiant est requis!'); window.history.back();</script>";
    }

    if (empty($password)) {
        echo "<script>alert('Le mot de passe est requis!'); window.history.back();</script>";
    } elseif ($password !== $confirm_password) {
        echo "<script>alert('Les mots de passe ne correspondent pas.'); window.history.back();</script>";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse email n'est pas valide.";
    }

    if (empty($mobile)) {
        echo "<script>alert('Le numéro de mobile est requis.'); window.history.back();</script>";
        exit; // Ensure the script stops after this
    } elseif (!preg_match("/^\d{10}$/", $mobile)) {
        echo "<script>alert('Le numéro de mobile doit contenir uniquement des chiffres et être de 10 chiffres.'); window.history.back();</script>";
        exit; // Ensure the script stops after this
    }
    

    // Si des erreurs sont détectées, les afficher
    if (!empty($errors)) {
        echo "<div style='color:red;'>";
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        echo "</div>";
        exit;
    }

    // Vérification si l'utilisateur existe déjà
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Un utilisateur avec cet email existe déjà.";
    } else {
        // Si les mots de passe correspondent, hacher le mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertion de l'utilisateur dans la base de données
        $stmt = $conn->prepare("INSERT INTO users (identifiant, email, password, mobile, cle, confirmation) 
                                 VALUES (?, ?, ?, ?, ?, 0)");
        $stmt->bind_param("ssssi", $identifiant, $email, $hashed_password, $mobile, $cle);

        if ($stmt->execute()) {
            // Envoi de l'email de confirmation avec PHPMailer
            $to = $email;
            $from = 'kmassoudi03@gmail.com';  // Ton adresse e-mail
            $from_name = 'khalil';        // Ton nom
            $subject = "Confirmation de votre inscription";
            $body = "Bonjour " . htmlspecialchars($identifiant) . ",<br><br>";
            $body .= "Merci de vous être inscrit. Veuillez confirmer votre adresse email en cliquant sur le lien suivant :<br>";
            $body .= "<a href='http://localhost/stage/confirmation.php?email=" . urlencode($email) . "&cle=" . $cle . "'>Confirmer votre adresse email</a><br><br>";
            $body .= "Cordialement,<br>L'équipe du site.";

            $error = smtpmailer($to, $from, $from_name, $subject, $body);
            echo $error;

            // Redirection après l'envoi du message
            if ($error == "Merci ! Votre e-mail a été envoyé.") {
                header("Location: confirmation.php");  // Page de confirmation
                exit();
            }
        } else {
            echo "Erreur lors de l'enregistrement de l'utilisateur : " . $stmt->error;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stage</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="sty.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="JS.js"></script>
    <!-- Start Navbar -->
    <nav class="navbar fw-bold navbar-expand-lg sticky-top navbar-light">
        <div class="container">
            <button class="navbar-toggler p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.php">LOGO</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link p-lg-3" href="aprops.php">À propos</a>
                    </li>
                    <li class="nav-item dropdown pt-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            CONFIGURAIDER
                        </a>
                        <ul class="dropdown-menu">
                            <?php if (isset($_SESSION['identifiant'])) {
                                echo '<li><a class="dropdown-item" href="FORM1.php">Formulaire 1</a></li>';
                            } else {
                                echo '<li><a class="dropdown-item" href="login.php">Formulaire 1</a></li>';
                            } ?>
                            <?php if (isset($_SESSION['identifiant'])) {
                                echo '<li><a class="dropdown-item" href="FORM2.php">Formulaire 2</a></li>';
                            } else {
                                echo '<li><a class="dropdown-item" href="login.php">Formulaire 2</a></li>';
                            } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-lg-3" href="Services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-lg-3" href="#">Nos Secteurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-lg-3" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-lg-3" href="contact.php">Contactez-nous</a>
                    </li>
                </ul>
                <div class="search ps-3 pe-3 d-none d-lg-block">
                    <button class="search-btn"> <i class="fa-solid fa-magnifying-glass"></i> </button>
                </div>
            </div>
            <a class="btn btn-primary rounded-pill" href="Login.php">
                <i class="fa-regular fa-user"></i> Login
            </a>
        </div>
    </nav>
    <!-- End Navbar -->
    <img class="bg-img" src="\Stage\images\tel2.jpg" alt="none">
        <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="signup-container text-white p-4 rounded shadow-lg">
            <h2 class="text-center mb-4">Inscription</h2>
            <form action="" method="POST" id="registrationForm">
                <div class="mb-3">
                    <label for="name" class="form-label">Identifiant</label>
                    <input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="Votre identifiant (lettres et espaces)" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de Passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Créer un mot de passe" required>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirmer le Mot de Passe</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirmez votre mot de passe" required>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Numéro de téléphone</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Votre numéro de téléphone">
                </div>
                <button type="submit" name="submit"  class="btn btn-primary w-100">S'inscrire</button>
            </form>
            <div class="signup-footer text-center mt-3">
                <p>Déjà inscrit ? <a href="Login.php" class="text-warning">Se connecter</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
