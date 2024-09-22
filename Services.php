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
            <h1>Nos Services</h1>
            <p>Découvrez comment notre gamme de services peut répondre à vos besoins en matière de <strong>connectivité</strong> et de <strong>divertissement</strong>. Nos solutions peuvent <strong>transformer votre expérience de connectivité</strong>.</p>
        </div>
    </section>
 <!-- Nos Services Section -->
    <div class="container my-5">
        <div class="row">
            <!-- First Column -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="\Stage\images\serv1.png" alt="icon" class="service-icon">
                    <div class="service-title">Étude et conception de réseaux informatiques</div>
                    <div class="service-description">Nous analysons vos besoins et vos exigences pour concevoir un réseau informatique personnalisé et adapté à vos besoins spécifiques.</div>
                </div>
            </div>
            <!-- Second Column -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="\Stage\images\serv2.png" alt="icon" class="service-icon">
                    <div class="service-title">Câblage structuré</div>
                    <div class="service-description">Nous installons des systèmes de câblage structuré de haute qualité, confirmés aux normes internationales.</div>
                </div>
            </div>
            <!-- Third Column -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="\Stage\images\serv3.png" alt="icon" class="service-icon">
                    <div class="service-title">Installation de matériel réseau</div>
                    <div class="service-description">Nous installons et configurons tous les équipements réseau nécessaires, y compris les commutateurs, routeurs, et serveurs.</div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <!-- Fourth Column -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="\Stage\images\serv4.png" alt="icon" class="service-icon">
                    <div class="service-title">Configuration et gestion de réseau</div>
                    <div class="service-description">Nous configurons et gérons votre réseau pour garantir son bon fonctionnement et sa sécurité.</div>
                </div>
            </div>
            <!-- Fifth Column -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="\Stage\images\serv5.png" alt="icon" class="service-icon">
                    <div class="service-title">Maintenance et support technique</div>
                    <div class="service-description">Nous offrons un service de maintenance et de support technique 24/7 pour vous aider à résoudre rapidement les problèmes.</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-card">
                    <img src="\Stage\images\audit (1).png" alt="icon" class="service-icon">
                    <div class="service-title">AUDIT DE CÂBLAGE INFORMATIQUE </div>
                    <div class="service-description"> Cela dans le but notamment de détecter d’éventuelles défaillances qui seraient être la cause de problèmes de performances du réseau local LAN et pourrait mettre à mal toute l’infrastructure du système d’information..</div>
                </div>
            </div>
        </div>
    </div>
 <!-- Devis Section --> 
 <section class="services-section">
    <div class="row">
        <div class="col-md-6">
            <div>
                <p>Contactez-nous dès aujourd’hui pour discuter de vos besoins en matière de câblage et d’installation de réseaux informatiques.
                    <br>
                    Ingenius IT : Votre partenaire de confiance pour une infrastructure réseau performante et sécurisée.
                </p>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center position-relative">
            <div class="mt-2 text-center d-flex flex-column position-relative">
                <a href="#" class="btn btn-warning  position-relative pt-3"><i class="fa-brands fa-shopify"></i> Devis Gratuit</a>
                <img src="\Stage\images\Animation - 1725527391185.gif" alt="None" class="mx-auto gif-overlay">
            </div>
        </div>
    </div>
</section>


<!-- start Section 8 -->
<div class="certifications-section ">
    <div class="container text-center">
      <h3 class="mb-4">CERTIFICATIONS</h3>
      <div class="row align-items-center justify-content-center">
        <div class="col-md-4 col-sm-6 ">
          <img src="\Stage\images\certf1.png" alt="Cisco Certified DevNet Associate" class="img-fluid certification-logo">
        </div>
        <div class="col-md-4 col-sm-6 ">
          <img src="\Stage\images\certf2.jpg" alt="Cisco Certified DevNet Associate" class="img-fluid certification-logo">
        </div>
        <div class="col-md-4 col-sm-6 ">
          <img src="\Stage\images\crtf3.png" alt="Cisco Certified CCNA" class="img-fluid certification-logo">
        </div>
      </div>
    </div>
  </div>
  <!-- End Section 8 -->
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
  