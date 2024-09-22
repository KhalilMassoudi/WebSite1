<?php
// Start the session
session_start();
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
      <?php
          if (isset($_SESSION['identifiant'])) {
              echo '<span class="navbar-text me-3">Bonjour, ' . htmlspecialchars($_SESSION['identifiant']) . '</span>';
              echo '<a class="btn rounded-pill logout-btn" href="logout.php">
                          <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>';
          } else {
              echo '<a class="btn btn-primary rounded-pill" href="Login.php">
                      <i class="fa-regular fa-user"></i> Login
                    </a>';
          }
      ?>
    </div>
  </nav>
 <!-- End Navbar -->
 <!-- introduction -->
    <section class="services-section">
        <div class="container">
            <h1>A propos</h1>
            <p>Depuis notre création, nous répondons aux exigences de nos clients et partenaires en matière de réseaux de pointe. Nous entretenons avec eux une relation de proximité, valorisant une approche personnalisée.
            </p>
        </div>
    </section>
    <div class="container p-3 mb-3">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="apropos">
                  <h2 class="section-title text-white p-3 rounded">Qui nous sommes ?</h2>
                    <div class="content-section bg-white text-black p-4 rounded">
                      <p class="section-content fw-bold">
                          Chez ****** Informatique, nous sommes intimement persuadés que la performance d’un réseau informatique dépend inévitablement de la qualité des installations.
                      </p>
                      <p class="section-content fw-bold">
                          C’est pourquoi nous basons l’essence de notre travail à améliorer le réseau local par des infrastructures de qualité.
                      </p>
                      <p class="section-content fw-bold">
                          Nos ingénieurs expertisent vos installations d’abord avant de planifier une intervention.
                      </p>
                      <p class="section-content fw-bold">
                          Spécialistes du réseau d’entreprise, nous intervenons depuis le câblage des points d’entrée jusqu’aux dessertes internes.
                      </p>
                      <p class="section-content fw-bold">
                          Plus de X clients nous ont déjà fait confiance, et vous ?
                      </p>
                    </div>
                </div>
                <div class="apropos">
                    <h2 class="section-title text-white p-3 rounded">Nos clients</h2>
                    <div class="content-section bg-white text-black p-4 rounded">
                        <p class="section-content fw-bold">
                            Nos clients sont au cœur de tout ce que nous faisons, nous leur offrons des solutions personnalisées pour répondre à leurs besoins. La relation avec nos clients est basée sur la confiance et la satisfaction.
                        </p>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="#" class="btn btn-warning">Voir plus</a>
                      </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="apropos">
                    <h2 class="section-title text-white p-3 rounded">Nous rejoindre</h2>
                    <div class="content-section bg-white text-black p-4 rounded">
                        <p class="section-content fw-bold">
                            Si tu veux rejoindre une équipe dynamique, où l’on travaille sérieusement sans se prendre au sérieux, c’est par ici que ça se passe ! 
                        </p>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="#" class="btn btn-warning">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- End Section1 -->

      <!-- start  Section2 -->
      <div class="section7">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <h2 class=" pb-4 text-white-100 text-start">Définissons ensemble votre projet</h2>
              <p>Transformons votre entreprise grâce à notre solution WiFi professionnelle sur-mesure. Boostez votre productivité et la satisfaction de vos clients ! Contactez-nous dès maintenant pour une consultation gratuite et découvrez comment nous pouvons améliorer votre infrastructure réseau. </p>
              <div class="mt-4 text-start">
                <a href="#" class="btn btn-warning"> Contactez-Nous</a>
              </div>
            </div>
            <div class="col-md-6 align-items-center text-center">
              <img src="\Stage\images\femme-telephone-contact-projet-2isr.png" alt="Image Description" class="img7 img-fluid">
            </div>
          </div>
        </div>
      </div>
      <!-- End Section2 -->

    <footer class="footer bg-dark text-white pt-5">
        <div class="container">
            <div class="row">
                <!-- Logo and Contact -->
                <div class="col-md-3">
                    logo
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