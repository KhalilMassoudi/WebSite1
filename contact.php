<?php
    include 'conn.php';

    if (isset($_POST['submit'])) {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $societe = $_POST['societe'];
        $codepostal = $_POST['codepostal'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];
        $marketing = $_POST['marketing'];



        

        $sql = "INSERT INTO contact (prenom,nom,email,telephone,societe,codepostal,sujet,message,marketing ) VALUES ('$prenom','$nom','$email','$telephone' ,'$societe','$codepostal','$sujet','$message','$marketing')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
                            echo'<li><a class="dropdown-item" href="login.php">Formulaire 1</a></li>';

                        }
                    ?>
                    <?php 
                        if (isset($_SESSION['identifiant'])) {
                            echo '<li><a class="dropdown-item" href="FORM2.php">Formulaire 2</a></li>';
                                
                        } else {
                            echo'<li><a class="dropdown-item" href="login.php">Formulaire 2</a></li>';
                        }
                    ?>
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
            <a class="btn btn-primary rounded-pill " href="Login.php">
                <i class="fa-regular fa-user"></i> Login
            </a>
        </div>
    </nav>
    <!-- start introduction -->
    <section class="services-section">
        <div class="container">
        <h1>Contact</h1>
        <p>Nous sommes ravis de vous proposer cet espace dédié afin qu’on puisse répondre à vos questions, ou tout simplement pour échanger avec nous. N’hésitez pas à nous contacter pour toute demande d’information ou de proposition commerciale.
        </p>
        </div>
    </section>
    <!-- End introduction -->
  
  <div class="container"></div>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <h2 class="text-center mb-4">Formulaire de contact</h2>
            <form class="contact-form" action="" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom*</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom*</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telephone" class="form-label">Téléphone*</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="societe" class="form-label">Société</label>
                        <input type="text" class="form-control" id="societe" name="societe">
                    </div>
                    <div class="col-md-6">
                        <label for="code-postal" class="form-label">Code Postal*</label>
                        <input type="number" class="form-control" id="code-postal" name="codepostal" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="objet" class="form-label">Objet*</label>
                    <input type="text" class="form-control" id="objet" name="sujet" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message*</label>
                    <textarea class="form-control" id="message" rows="4" name="message" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="source" class="form-label">Comment avez-vous connu notre solution ?</label>
                    <select class="form-select" id="source" name="marketing">
                        <option value="">Choisir</option>
                        <option value="siteweb">Site Web</option>
                        <option value="ami">Un ami</option>
                        <option value="pub">Publicité</option>
                    </select>
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>
    </div>
</div>


  <!-- footer -->
  <footer class="footer bg-dark text-white pt-5">
        <div class="container">
            <div class="row">
                <!-- Logo and Contact -->
                <div class="col-md-3">
                    <img src="logo.png" alt="Logo" class="mb-4">
                    <p class="mb-0">
                        <i class="bi bi-telephone"></i> +216 70000000
                    </p>
                    <p>Localisation</p>
                </div>
                <!-- Services -->
                <div class="col-md-3">
                    <h5>Nos Services :</h5>
                    <ul class="list-unstyled">
                        <li>Audit De Réseau</li>
                        <li>Câblage Informatique</li>
                        <li>Réseau Wifi D'entreprise</li>
                        <li>Vidéosurveillance</li>
                        <li>Déménagement Salle Informatique</li>
                    </ul>
                </div>
                <!-- Secteurs -->
                <div class="col-md-3">
                    <h5>Nos Secteurs :</h5>
                    <ul class="list-unstyled">
                        <li>WiFi Hôtel</li>
                        <li>WiFi Collectivités</li>
                        <li>WiFi Entreprise</li>
                        <li>WiFi Entrepôt</li>
                        <li>WiFi Location Et Gîte</li>
                        <li>WiFi Restaurant, Bar Et Café</li>
                        <li>WiFi Campus</li>
                        <li>WiFi Tourisme</li>
                        <li>WiFi Santé</li>
                        <li>WiFi Patient</li>
                    </ul>
                </div>
                <!-- À PROPOS -->
                <div class="col-md-3">
                    <h5>À PROPOS :</h5>
                    <ul class="list-unstyled">
                        <li>Nous Rejoindre</li>
                        <li>Nos Clients</li>
                        <li>Qui Sommes-Nous ?</li>
                        <li>Partenaire Ruckus</li>
                        <li>Blog</li>
                    </ul>
                    <h5>Retrouvez-Nous Sur Les Réseaux Sociaux :</h5>
                    <a href="#" ><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" ><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <div class="d-flex">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <p>&copy; 2024. Expert Cablage Reseaux. All Rights Reserved</p>
                    <a href="#" class="btn btn-warning text-dark">Demander une intervention</a>
                </div>
            </div>
        </div>
  </footer>
      
</body>
</html>