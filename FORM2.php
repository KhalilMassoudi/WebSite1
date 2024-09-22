<?php
// Start the session
session_start();
?>
<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $entreprise_taille = $_POST['entreprise_taille'] ?? null;
    $nombre_sites = $_POST['nombre_sites'] ?? null;
    $applications = $_POST['applications'] ?? null;
    $appareils = $_POST['appareils'] ?? null;
    $wifi_visiteurs = $_POST['wifi_visiteurs'] ?? null;

    if ($entreprise_taille && $nombre_sites && $applications && $appareils && $wifi_visiteurs) {
        $sql = "INSERT INTO wifi_survey (entreprise_taille, nombre_sites, applications, appareils, wifi_visiteurs) 
                VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {

            $stmt->bind_param("sssss", $entreprise_taille, $nombre_sites, $applications, $appareils, $wifi_visiteurs);


            if ($stmt->execute()) {
                echo "Form data has been successfully submitted.";
            } else {
                echo "Error: " . $stmt->error;
            }


            $stmt->close();
        } else {
            echo "Error preparing the SQL statement.";
        }
    } else {
        echo "Please fill out all required fields.";
    }
}

$conn->close();
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

        .wifi-form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .form-step {
            display: none;
        }

        .form-step.active-step {
            display: block;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .wifi-form label {
            font-weight: bold;
        }

        .wifi-form button {
            margin-top: 10px;
        }

        .next-step,
        .prev-step,
        .submit-btn {
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        .prev-step {
            background-color: #6c757d;
            margin-right: 0;
        }
        .next-step{
            margin-left: 0;
        }
        .next-step:hover,
        .prev-step:hover {
            opacity: 0.9;
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

        .content-over-img {
            position: absolute;
            top: 50%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 600px; /* Adjust for form width */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .wifi-form {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            box-sizing: border-box;
        }

        .footer .container {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            top: 0;
        }

        .bg-img {
            width: 100%;
            object-fit: cover;
            filter: brightness(0.6);
            position: relative;
        }
    </style>
</head>

<body>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const steps = document.querySelectorAll(".form-step");
            const nextBtns = document.querySelectorAll(".next-step");
            const prevBtns = document.querySelectorAll(".prev-step");
            let currentStep = 0;

            steps[currentStep].classList.add("active-step");

            nextBtns.forEach((btn) => {
                btn.addEventListener("click", function () {
                    if (validateStep(currentStep)) {
                        steps[currentStep].classList.remove("active-step");
                        currentStep++;
                        steps[currentStep].classList.add("active-step");
                    }
                });
            });

            prevBtns.forEach((btn) => {
                btn.addEventListener("click", function () {
                    steps[currentStep].classList.remove("active-step");
                    currentStep--;
                    steps[currentStep].classList.add("active-step");
                });
            });

            function validateStep(stepIndex) {
                const step = steps[stepIndex];
                const inputs = step.querySelectorAll("input[type='radio'], input[type='checkbox']");
                let isValid = false;

                inputs.forEach(input => {
                    if (input.type === "radio") {
                        const group = input.name;
                        const checkedRadio = step.querySelector(`input[name="${group}"]:checked`);
                        if (checkedRadio) {
                            isValid = true;
                        }
                    } else if (input.type === "checkbox") {
                        if (input.checked) {
                            isValid = true;
                        }
                    }
                });

                if (!isValid) {
                    alert("Veuillez remplir ce champ avant de continuer.");
                }

                return isValid;
            }
        });
    </script>

    <!-- Navbar -->
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


    <!-- Background Image -->
    <img class="bg-img" src="\Stage\images\for.jpg" alt="none">

    <!-- Multi-step Form -->
    <form id="wifi-form" class="wifi-form content-over-img" action="#" method="post">
        <!-- Step 1 -->
        <div id="step-1" class="form-step active-step">
            <h3>Test Wifi</h3>
            <div class="form-group">
                <label>Quelle est la taille de votre entreprise ?</label><br>
                <input type="radio" name="entreprise_taille" value="tres-petite-entreprise" required> Très petite entreprise<br>
                <input type="radio" name="entreprise_taille" value="petite-entreprise"> Petite entreprise<br>
                <input type="radio" name="entreprise_taille" value="moyenne-entreprise"> Moyenne entreprise<br>
                <input type="radio" name="entreprise_taille" value="grande-entreprise"> Grande entreprise<br>
            </div>
            <button type="button" class="btn btn-primary next-step">Suivant</button>
        </div>
        <!-- Step 2 -->
        <div id="step-2" class="form-step">
            <div class="form-group">
                <label>Combien de sites votre entreprise possède-t-elle ?</label><br>
                <input type="radio" name="nombre_sites" value="1-site" required> 1 site<br>
                <input type="radio" name="nombre_sites" value="plus-dun-site"> Plus d'un site<br>
            </div>
            <button type="button" class="btn btn-secondary prev-step">Précédent</button>
            <button type="button" class="btn btn-primary next-step">Suivant</button>
        </div>
         <!-- Step 3 -->
         <div id="step-3" class="form-step">
            <div class="form-group">
                <label>Quels types d'applications professionnelles utilisez-vous généralement ?</label><br>
                <input type="radio" name="applications" value="audio-video"> Conférence audio et vidéo<br>
                <input type="radio" name="applications" value="navigation-internet"> Navigation internet et e-mails<br>
                <input type="radio" name="applications" value="partage-sauvegarde"> Partage et sauvegarde de fichiers<br>
                <input type="radio" name="applications" value="applications-cloud"> Applications professionnelles basées sur le cloud<br>
            </div>
            <button type="button" class="btn btn-secondary prev-step">Précédent</button>
            <button type="button" class="btn btn-primary next-step">Suivant</button>
        </div>
        <!-- Step 4 -->
        <div id="step-4" class="form-step">
            <div class="form-group">
                <label>Quels types d'appareils connectez-vous au réseau ?</label><br>
                <input type="radio" name="appareils" value="pos-scanners"> Systèmes de point de vente et scanners de codes-barres<br>
                <input type="radio" name="appareils" value="laptops-mobiles"> Ordinateurs portables, tablettes et téléphones mobiles<br>
                <input type="radio" name="appareils" value="securite-cameras"> Caméras de sécurité<br>
                <input type="radio" name="appareils" value="iot-appareils"> Appareils intelligents/Objets connectés (IoT)<br>
            </div>
            <button type="button" class="btn btn-secondary prev-step">Précédent</button>
            <button type="button" class="btn btn-primary next-step">Suivant</button>
        </div>
        <!-- Step 5 -->
        <div id="step-5" class="form-step">
            <div class="form-group">
                <label>Avez-vous besoin de fournir du Wi-Fi pour les visiteurs et les invités ?</label><br>
                <input type="radio" name="wifi_visiteurs" value="oui" required> Oui<br>
                <input type="radio" name="wifi_visiteurs" value="non"> Non<br>
            </div>
            <button type="button" class="btn btn-secondary prev-step">Précédent</button>
            <button type="submit" name="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>


    <!-- Footer -->
    <footer class="footer">
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
                <div class="col-md-4 text-end">
                    <a href="#" class="text-white me-3"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="text-white me-3"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
            <a href="#" class="back-to-top"><i class="fa-solid fa-circle-up"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
