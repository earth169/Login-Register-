<?php
session_start();  // Pornește sesiunea pentru a verifica dacă utilizatorul este autentificat
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Login/Register</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="container">  
        <?php
        // Verifică dacă utilizatorul este autentificat
        if (isset($_SESSION['username'])) {
            // Dacă utilizatorul este autentificat, afișează un mesaj de bun venit
            echo "<h1>Bine ai venit, " . $_SESSION['username'] . "!</h1>";
        } else {
            // Dacă nu este autentificat, afișează un mesaj standard și opțiunile de login și înregistrare
            echo "<h1>Bun venit pe site!</h1>";
            echo "<p><a href='login.php'>Autentificare</a> | <a href='register.php'>Înregistrare</a></p>";
        }
        ?>
    </div>
</body>
</html>
