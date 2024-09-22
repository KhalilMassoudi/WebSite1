<?php
// Start the session
session_start();
?>

<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $access_type = htmlspecialchars($_POST['access_type']);
    $mounting = htmlspecialchars($_POST['mounting']);
    $coverage_area = htmlspecialchars($_POST['coverage_area']);
    $environment_interference = htmlspecialchars($_POST['environment_interference']);
    $security = htmlspecialchars($_POST['security_features']);
    $management_option = htmlspecialchars($_POST['management_option']);
    $fonctionnalités_supplémentaires = htmlspecialchars($_POST['fonctionnalités_supplémentaires']); 

    $stmt = $conn->prepare("INSERT INTO access_point_selection 
            (access_type, mounting, coverage_area, environment_interference, security_features, management_option, fonctionnalités_supplémentaires) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssss", $access_type, $mounting, $coverage_area, $environment_interference, $security, $management_option, $fonctionnalités_supplémentaires);

    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
        .btn-next, .btn-prev {
            margin-top: 20px;
        }
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            margin-top: auto;
            width: 100%;
            text-align: center;
        }

        .footer-logo {
            max-height: 50px;
            margin-right: 10px;
        }

        .footer p {
            margin: 0;
            font-size: 0.875rem;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            color: #f0ad4e;
        }

        .back-to-top {
            position: absolute;
            right: 20px;
            bottom: 20px;
            font-size: 2rem;
            color: #f0ad4e;
            display: none;
        }

        .back-to-top:hover {
            color: #fff;
        }

        @media (max-width: 768px) {
            .footer .row {
                text-align: center;
            }

            .footer .text-end {
                text-align: center;
                margin-top: 15px;
            }

            .back-to-top {
                right: 10px;
                bottom: 10px;
            }
        }

        .footer .container {
            flex: 1;
            position:relative ;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; 
            top: 0;
        }

        .bg-img {
            width: 100%;
            object-fit: cover;
            filter: brightness(0.6);
            z-index: -1;
            position: relative;

        }
        .content-over-img {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            padding: 20px;
            margin: 0;
        }
        .form-section {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            box-sizing: border-box;
        }


    </style>
</head>
<body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.querySelector('input#__VIEWSTATE');
        if (input) {
        } else {
            console.log('Input element not found.');
        }
    });

    let currentStep = 1;
    const totalSteps = 7;

    function showStep(step) {
        document.querySelectorAll('.form-section').forEach((section, index) => {
            section.classList.toggle('active', index + 1 === step);
        });
        if (step === totalSteps) {
            document.getElementById('submitButton').style.display = 'block';
            document.getElementById('nextButton').style.display = 'none';  // Hide "Next" on the last step
        } else {
            document.getElementById('submitButton').style.display = 'none';
            document.getElementById('nextButton').style.display = 'block';  // Show "Next" on other steps
        }
    }

    function nextStep() {
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

    function validateStep(step) {
        const currentStepElement = document.getElementById(`step-${step}`);
        const requiredInputs = currentStepElement.querySelectorAll('input[required]');
        
        let allValid = true;  
        requiredInputs.forEach((input) => {
            if (input.type === 'radio') {
                const groupName = input.name;
                const isChecked = currentStepElement.querySelector(`input[name="${groupName}"]:checked`);
                if (!isChecked) {
                    allValid = false;
                }
            } else {
                if (!input.value.trim()) {
                    allValid = false;
                }
            }
        });

        if (!allValid) {
            alert('Veuillez remplir tous les champs obligatoires avant de passer à l’étape suivante.');
            return false;
        }


        return true;
    }

    function handleNext() {
        if (validateStep(currentStep)) {
            nextStep();
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        showStep(currentStep);  // Show the current step initially
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="JS.js"></script>

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



    <img src="\Stage\images\for.jpg" class="bg-img" > 
    <!-- Form Container -->
    <form id="wifi-form" class="wifi-form content-over-img" action="#" method="post">
        <!-- Step 1: Choosing Access Point -->
        <div class="form-section " id="step-1">
            <h3>Étape 1 : Choisir un Point d’Accès <span class="text-danger">*</span></h3>
            <div class="mb-3">
                <label class="form-label">Quel type de point d’accès recherchez-vous ? </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="access_type" id="entry-level" value="Entrée de gamme" required>
                    <label class="form-check-label" for="entry-level">Entrée de gamme (petites entreprises, usage domestique)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="access_type" id="mid-level"  value="Milieu de gamme" required>
                    <label class="form-check-label" for="mid-level">Milieu de gamme (bureaux moyens, campus)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="access_type" id="high-end" value="Haut de gamme" required>
                    <label class="form-check-label" for="high-end">Haut de gamme (grandes entreprises, environnements exigeants)</label>
                </div>
            </div>
            <button  class="suiv" type="button" id="nextButton" onclick="handleNext()">Suivant</button>
        </div>
        <!-- Step 2: Mounting Access Point -->
        <div class="form-section" id="step-2">
            <h3>Étape 2 : Montage de Votre Point d’Accès <span class="text-danger">*</span> </h3>
            <div class="mb-3">
                <label class="form-label">Où allez-vous installer votre point d'accès ?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mounting" id="ceiling" value="Plafond" required>
                    <label class="form-check-label" for="ceiling">Plafond</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mounting" id="wall" value="Mur" required>
                    <label class="form-check-label" for="wall">Mur</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mounting" id="floor-stand" value="Support au sol" required>
                    <label class="form-check-label" for="floor-stand">Support au sol</label>
                </div>
            </div>
            <button class="suiv" type="button" id="nextButton" onclick="handleNext()">Suivant</button>
            <button class="prec" type="button" id="prevButton" onclick="prevStep()">Précedent</button>
        </div>
        <!-- Step 3: Coverage Area-->
        <div class="form-section" id="step-3">
            <h3>Étape 3 : Zone de Couverture <span class="text-danger">*</span> </h3>
            <div class="mb-3">
                <label class="form-label">Quelle est la taille de la zone à couvrir ?</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="coverage_area" id="small-area" value="Petite" required>
                    <label class="form-check-label" for="small-area">Petite (jusqu'à 100 m²)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="coverage_area" id="medium-area" value="Moyenne" required>
                    <label class="form-check-label" for="medium-area">Moyenne (jusqu'à 500 m²)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="coverage_area" id="large-area" value="Grande" required>
                    <label class="form-check-label" for="large-area">Grande (plus de 500 m²)</label>
                </div>
            </div>
            <button class="suiv" type="button" id="nextButton" onclick="handleNext()">Suivant</button>
            <button class="prec" type="button" id="prevButton" onclick="prevStep()">Précedent</button>
        </div>
        <!-- Step 4: Environment -->
        <div class="form-section" id="step-4">
            <h3>Étape 4 : Environnement d'Installation <span class="text-danger">*</span> </h3>
            <div class="mb-3">
                <label class="form-label">L'environnement est-il sujet à des interférences ?</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="environment_interference" id="interference-yes" value="Oui" required>
                    <label class="form-check-label" for="interference-yes">Oui</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="environment_interference" id="interference-no" value="Non" required>
                    <label class="form-check-label" for="interference-no">Non</label>
                </div>
            </div>
            <button class="suiv" type="button" id="nextButton" onclick="handleNext()">Suivant</button>
            <button class="prec" type="button" id="prevButton" onclick="prevStep()">Précedent</button>
        </div>
        <!-- Step 5: Security Features -->
        <div class="form-section" id="step-5">
            <h3>Étape 5 : Caractéristiques de Sécurité <span class="text-danger">*</span> </h3>
            <div class="mb-3">
                <label class="form-label">Quelles fonctionnalités de sécurité souhaitez-vous ?</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="security_features" id="wpa3" value="WPA3" required>
                    <label class="form-check-label" for="wpa3">WPA3</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="security_features" id="firewall" value="Pare-feu intégré" required>
                    <label class="form-check-label" for="firewall">Pare-feu intégré</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="security_features" id="vpn" value="VPN" required>
                    <label class="form-check-label" for="vpn">VPN</label>
                </div>
            </div>
            <button class="suiv" type="button" id="nextButton" onclick="handleNext()">Suivant</button>
            <button class="prec" type="button" id="prevButton" onclick="prevStep()">Précedent</button>
        </div>
        <!-- Step 6: Management Options -->
        <div class="form-section" id="step-6">
            <h3>Étape 6 : Options de Gestion <span class="text-danger">*</span> </h3>
            <div class="mb-3">
                <label class="form-label">Comment souhaitez-vous gérer votre point d'accès ?</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="management_option" id="local-management" value="Gestion locale" required>
                    <label class="form-check-label" for="local-management">Gestion locale</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="management_option" id="cloud-management" value="Gestion via le cloud" required>
                    <label class="form-check-label" for="cloud-management">Gestion via le cloud</label>
                </div>
            </div>
            <button class="suiv" type="button" id="nextButton" onclick="handleNext()">Suivant</button>
            <button class="prec" type="button" id="prevButton" onclick="prevStep()">Précedent</button>
        </div>  
        <!-- Step 7: Additional Features -->     
        <div class="form-section" id="step-7">
            <h3>Étape 7 : Fonctionnalités Supplémentaires <span class="text-danger">*</span></h3>
            <div class="mb-3">
                <label class="form-label">Avez-vous besoin de fonctionnalités supplémentaires ?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="mesh-networking" name="fonctionnalités_supplémentaires" value="Réseau maillé">
                    <label class="form-check-label" for="mesh-networking">Réseau maillé</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="guest-network" name="fonctionnalités_supplémentaires" value="Réseau invité">
                    <label class="form-check-label" for="guest-network">Réseau invité</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="poe-support" name="fonctionnalités_supplémentaires" value="Prise en charge PoE" >
                    <label class="form-check-label" for="poe-support">Prise en charge PoE (Power over Ethernet)</label>
                </div>
            </div>
            <button class="suiv"class="prec" type="button" id="prevButton" onclick="prevStep()">Précedent</button>
            <button type="submit" name="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>

    <!-- Start Footer -->
    <footer class="footer bg-dark text-white pt-3 ">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo Section -->
                <div class="col-md-4">
                    <img src="" alt="Logo" class="footer-logo">
                </div>
                <!-- Copyright and Privacy -->
                <div class="col-md-4 text-center">
                    <p class="mb-0">All original content © 2024. Expert Cablage Reseaux</p>
                    <p><a href="#" class="text-white">Privacy Policy</a></p>
                </div>
                <!-- Social Media Links -->
                <div class="col-md-4 text-end">
                    <a href="#" class="text-white me-3"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="text-white me-3"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
            <!-- Back to Top Button -->
            <a href="#" class="back-to-top"><i class="fa-solid fa-circle-up"></i></a>
        </div>
    </footer>


</body>
</html>
