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
            <?php if (isset($_SESSION['identifiant'])) { ?>

            <li><a class="dropdown-item" href="FORM1.php">Formulaire 1</a></li>
            <li><a class="dropdown-item" href="FORM2.php">Formulaire 2</a></li>

            <?php } else { ?>

            <!-- If the user is not logged in, show links that trigger the modal -->
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Formulaire 1</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Formulaire 2</a></li>

            <?php } ?>
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
  <!-- when the user is not logged in -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Connexion requise</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Vous devez être connecté pour accéder à ce formulaire. Veuillez vous connecter ou créer un compte pour continuer.      </div>
      <div class="modal-footer">
        <a href="login.php" class="btn btn-primary">Connexion</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

  <!-- End Navbar -->

  <!-- Start Landing -->
  <div class="landing" style="background-image: url('./res.jpeg');">
    <div class="color-overlay d-flex justify-content-center align-items-center">
        <div class="text-center ms-auto me-auto">
            <h1 class="display-4 fw-bold text-white">Configurer le Wi-Fi n'a jamais été aussi simple...</h1>
            <p class="par fs-5 text-white mb-4">cablage-informatique.net, la solution à toutes vos problématiques de câblage IT</p>
        </div>
    </div>
  </div>
  <!-- End Landing -->

  <!-- Start Section1 -->
  <div class="container p-3 mb-3">
    <div class="text-center">
        <div class="par text-black fs-8 fw-bold">Bienvenue sur notre site Web</div>
        <p class="par2 fs-5 text-black mb-4">
            Découvrez nos événements, services et outils pour vous aider à concevoir et à déployer votre prochaine solution réseau. Relevez le prochain défi et concevez l'expérience client de demain !
        </p>
    </div>
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
                  <div class="mt-4">
                    <a href="aprops.php" class="btn btn-warning">Voir plus</a>
                  </div>
                </div>
            </div>
        </div>
        <!-- image Section -->
        <div class="col-md-6">
          <img src="\Stage\images\ty-01-removebg-preview.png" alt="None">
        </div>
    </div>
  </div>
  <!-- End Section1 -->


  <!-- Start Counter -->
   <div class="counter1">
    <div class="container">
    
      <div class="row">
  
    <div class="four col-md-3">
      <div class="counter-box">
        <i class="fa-solid fa-thumbs-up"></i>
        <span class="counter">2147</span>
        <p>Happy Customers</p>
      </div>
    </div>
    <div class="four col-md-3">
      <div class="counter-box">
        <i class="fa-solid fa-user-group"></i>
        <span class="counter">3275</span>
        <p>Registered Members</p>
      </div>
    </div>
    <div class="four col-md-3">
      <div class="counter-box">
        <i class="fa  fa-shopping-cart"></i>
        <span class="counter">289</span>
        <p>Available Products</p>
      </div>
    </div>
    <div class="four col-md-3">
      <div class="counter-box">
        <i class="fa  fa-user"></i>
        <span class="counter">1563</span>
        <p>Saved Trees</p>
      </div>
    </div>
    </div>	
  </div>
   </div>
  <!-- End Counter -->

  <!-- Start Section2 -->
  <div class="features pt-2 pb-5">
    <div class="container">
      <div class="main-title mt-5 mb-5 position-relative text-center">
        <h2>Vous avez un projet de câblage informatique et/ou réseaux ? C’est très simple…</h2>
      </div>
      <div class="row pt-5">
        <div class="col-md-6 col-lg-3">
          <div class="feat">
            <div class="icon-holder text-center">
              <i class="fa-solid fa-1 number"></i>
            </div>
            <h5 class="mb-3 mt-3 text-uppercase text-center">Briefing du projet</h5>
            <p class="text-black-50 lh-lg mt-4 text-center">Vous nous présentez votre projet de câblage informatique ou de réseau. Nous vous contactons dans la journée pour planifier une visite sur site.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feat">
            <div class="icon-holder text-center">
              <i class="fa-solid fa-2 number"></i>
            </div>
            <h5 class="mb-3 mt-3 text-uppercase text-center">Visite sur site</h5>
            <p class="text-black-50 lh-lg mt-3 text-center">Lors de notre visite, notre expert évalue la situation et confirme la faisabilité. Il vous conseille sur les meilleures pratiques pour une mise en œuvre efficace.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feat">
            <div class="icon-holder text-center">
              <i class="fa-solid fa-3 number"></i>
            </div>
            <h5 class="mb-3 mt-3 text-uppercase text-center">Envoi du devis</h5>
            <p class="text-black-50 lh-lg mt-3 text-center">Sous 48 heures, vous recevrez un devis détaillé incluant le coût total du projet, les équipements recommandés et un planning précis d'exécution.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feat">
            <div class="icon-holder text-center">
              <i class="fa-solid fa-4 number"></i>
            </div>
            <h5 class="mb-3 mt-3 text-uppercase text-center">Intervention sur site</h5>
            <p class="text-black-50 lh-lg mt-4 text-center">Nos techniciens déploient la solution validée avec soin, en respectant les normes de sécurité, pour garantir un service de qualité.</p>
          </div>
        </div>
      </div>              
    </div>
  </div>
  <!-- End Section2 -->


  <!-- Start Section3 -->
  <div class="section3 bg-light pt-2 pb-5">
    <div class="container">
      <div class="main-title3 mt- mb-5 position-relative text-center">
        <h2>Bénéficiez D’un Réseau Informatique Stable, Fiable Et Sécurisé</h2>
        <p>Nous Vous Assurons Un Réseau Performant Grâce À Des Solutions Clé En Main Et Des Services De Qualité :</p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="service-box text-center p-4">
            <div class="icon-holder mb-3">
              <i class="fa-solid fa-clipboard-check icon"></i>
            </div>
            <h5 class="text-uppercase">Audit de l'infrastructure de câblage réseau</h5>
            <p class="text-black-50 mt-3">Audit du câblage et réseau LAN</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box text-center p-4">
            <div class="icon-holder mb-3">
              <i class="fa-solid fa-network-wired icon"></i>
            </div>
            <h5 class="text-uppercase">Câblage réseau informatique</h5>
            <p class="text-black-50 mt-3">Création, Extension De Prises RJ45</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box text-center p-4">
            <div class="icon-holder mb-3">
              <i class="fa-solid fa-wifi icon"></i>
            </div>
            <h5 class="text-uppercase">Réseau sans fil professionnel</h5>
            <p class="text-black-50 mt-3">Installation De Bornes Wifi</p>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="services.php" class="btn btn-warning">Savoir Plus</a>
      </div>
    </div>
  </div>
  <!-- End Section3 -->


  <!-- Start Section 4-->
  <div class="complete-service-section pt-5 pb-5">
    <div class="container">
      <div class="main-title4 mb-5 text-center">
        <h2>Un Service Complet Et De Qualité</h2>
      </div>
      <div class="row">
        <div class="col-md-4">
          <ul class="service-list">
            <li><i class="fa-solid fa-check-circle"></i> Une architecture réseau et une étude personnalisée</li>
            <li><i class="fa-solid fa-check-circle"></i> Une couverture totale ou partielle de votre établissement, selon vos besoins</li>
            <li><i class="fa-solid fa-check-circle"></i> Une solution simple et intuitive</li>
            <li><i class="fa-solid fa-check-circle"></i> Une solution clé en main</li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="service-list">
            <li><i class="fa-solid fa-check-circle"></i> Une équipe d'experts passionnés</li>
            <li><i class="fa-solid fa-check-circle"></i> Une solution connue et reconnue sur le marché avec plus de 6000 clients</li>
            <li><i class="fa-solid fa-check-circle"></i> Une solution 100% SaaS avec une mise à jour en continue</li>
            <li><i class="fa-solid fa-check-circle"></i> Une solution technique à la pointe de la technologie</li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="service-list">
            <li><i class="fa-solid fa-check-circle"></i> Une supervision de votre installation 7j/7j</li>
            <li><i class="fa-solid fa-check-circle"></i> Un accès à nos IA garantie pour une solution toujours disponible</li>
            <li><i class="fa-solid fa-check-circle"></i> Un accès à notre hotline 5j/7 de 8h00 à 18h00, numéro non surtaxé basé en France</li>
            <li><i class="fa-solid fa-check-circle"></i> Une garantie du service pendant toute la durée du contrat</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Section 4-->

  <!-- start Section 5 -->
  <div class="section5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="pb-4">Des prestations adaptées à vos besoins :</h2>
          <p>- Création de prises Ethernet RJ45</p>
          <p>- Installation de bornes wifi</p>
          <p>- Déménagement de salles informatique</p>
          <p>- Installation de coffret ou baie informatique</p>
          <p>- Brassage informatique des baies</p>
          <p>- Installation de caméra de vidéosurveillance</p>
          <div class="mt-4">
            <a href="contact.php" class="btn btn-warning"><i class="fa-brands fa-shopify"></i> Devis Gratuit</a>
          </div>
        </div>
        <div class="col-md-6 full-width-image">
          <img src="\Stage\images\scott-rodgerson-PSpf_XgOM5w-unsplash.jpg" alt="Image Description" class="img-fluid w-100 overlap-image">
        </div>
      </div>
    </div>
  </div>
  <!-- End Section 5 -->

<!-- start Section 6 -->
<div class="row ms-2 me-2 pt-5 pb-5">
  <div class="col-md-5">
    <h2 class="tit2 mb-5 mt-5 ">Une expertise technique par secteur d’activité</h2>
    <p class="parr2">Quel que soit votre secteur d’activité (publique ou privé), nous aidons tous les professionnels à équiper leurs établissements avec une solution WiFi adaptée. Nous accompagnons les entreprises en apportant une analyse approfondie des besoins et une personnalisation des solutions.</p>
    <div class="text-center mt-4">
      <a href="#" class="btn btn-warning">Voir Nos Secteurs</a>
    </div>
  </div>
  <div class="col-md-7">
    <div id="customCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#customCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#customCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="\Stage\images\image (2).png" class="d-block w-100" alt="Slide 1">
          <div class="carousel-caption d-none d-md-block">
            <h5>Wifi Santé</h5>
            <p>Nous accompagnons les établissements de santé dans leurs transformations digitales</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="\Stage\images\image (4).png" class="d-block w-100" alt="Slide 2">
          <div class="carousel-caption d-none d-md-block">
            <h5>Wifi Patient</h5>
            <p>L’installation d’un WiFi pour vos patients et visiteurs</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="\Stage\images\image (1).png" class="d-block w-100" alt="Slide 3">
          <div class="carousel-caption d-none d-md-block">
            <h5>Wifi entrepôt</h5>
            <p>L’équipement d’un entrepôt logistique en WiFi n’est plus un luxe, mais une nécessité.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="\Stage\images\image (3).png" class="d-block w-100" alt="Slide 4">
          <div class="carousel-caption d-none d-md-block">
            <h5>Wifi Gîtes</h5>
            <p>Vos clients s’attendent à retrouver le même service qu’ils ont chez eux,...</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="\Stage\images\image (5).png" class="d-block w-100 full-width-image" alt="Slide 5">
          <div class="carousel-caption d-none d-md-block">
            <h5>Wifi Collectivités</h5>
            <p>Bénéficiez d'un réseau WiFi optimisé et efficace pour votre Mairie</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Section 6 -->

<!-- start Section 7 -->
<div class="section7">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h2 class="main-title7 pb-4 text-black-100 text-start">Un câblage informatique et réseaux de qualité constitue
          la base d’une infrastructure numérique performante et sécurisée</h2>
        <div class="mt-4 text-start">
          <a href="contact.php" class="btn btn-warning"><i class="fa-brands fa-shopify"></i> Devis Gratuit</a>
        </div>
      </div>
      <div class="col-md-6 align-items-center text-center">
        <img src="\Stage\images\femme-telephone-contact-projet-2isr.png" alt="Image Description" class="img7 img-fluid">
      </div>
    </div>
  </div>
</div>

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
              <a href="Login.php" class="btn btn-warning text-dark">Demander une intervention</a>
          </div>
      </div>
  </div>
</footer>

</body>
</html>
