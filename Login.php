<?php
// Start the session at the top
session_start();

// Include the database connection file
include 'conn.php';

// Check if the request method is POST (form submitted)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];

    // Prepare the SQL query to check if the user exists (use prepared statements)
    $sql = "SELECT * FROM users WHERE identifiant = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $identifiant);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify the password (assumes password is hashed using password_hash())
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a session and log the user in
            $_SESSION['identifiant'] = $user['identifiant'];
            echo "<script>alert('Login successful! Welcome " . $_SESSION['identifiant'] . "');</script>";
            // Redirect to the index page (dashboard or homepage)
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            // Password is incorrect
            echo "<script>alert('Invalid password!'); window.history.back();</script>";
        }
    } else {
        // Identifiant does not exist
        echo "<script>alert('Invalid identifiant!'); window.history.back();</script>";
    }

    // Close the statement and connection
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
 <script src="JS.js"></script>
 <script>
        const users = [
            { identifiant: "user1", password: "password123" },
            { identifiant: "user2", password: "password456" }
        ];

        function validateLogin(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Get form values
            const identifiant = document.getElementById("identifiant").value;
            const password = document.getElementById("password").value;

            // Find the user by identifiant
            const user = users.find(u => u.identifiant === identifiant);

            // Check identifiant and password
            if (!user) {
                alert("Invalid identifiant!");
            } else if (user.password !== password) {
                alert("Invalid password!");
            } else {
                alert("Login successful! Welcome " + identifiant);
                // Redirect to another page (replace with your page)
                window.location.href = "index.html"; // Adjust the destination URL
            }
        }

        window.onload = function() {
            // Attach event listener to the form
            document.getElementById("loginForm").addEventListener("submit", validateLogin);
        };
 </script>
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
              <li><a class="dropdown-item" href="FORM1.php">Formulaire 1</a></li>
              <li><a class="dropdown-item" href="FORM2.php">Formulaire 2</a></li>
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
  <!-- End Navbar -->

  <img class="bg-img" src="\Stage\images\tel2.jpg" alt="none">

 <!-- Start Login -->
<div class="d-flex align-items-center justify-content-center vh-100">
  <div class="login-container text-white p-4 rounded shadow-lg">
    <h2>Connexion</h2>
    <!-- Updated form tag for proper action URL -->
    <form action="login.php<?php echo isset($_GET['redirect']) ? '?redirect=' . urlencode($_GET['redirect']) : ''; ?>" method="POST" id="loginForm">
      
      <div class="mb-3">
        <label for="identifiant" class="form-label"><i class="fa-solid fa-wifi"></i> Identifiant</label>
        <input type="text" class="form-control" id="identifiant" name="identifiant" required>
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label"><i class="fa-solid fa-lock"></i> Mot de Passe</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <div class="forgot-password">
        <a href="#">Mot de passe oublié ?</a>
      </div>

      <div class="mt-3">
        <button type="submit" name="submit" value="Submit" class="btn btn-primary w-100">Connexion</button>
      </div>
    </form>

    <div class="login-footer mt-3">
      <p>Pas encore inscrit ? <a href="sinscrire.php" class="text-warning">Créer un compte</a></p>
    </div>
  </div>
</div>



  <!-- Start footer -->
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