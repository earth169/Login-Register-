<?php
session_start();  // Pornește sesiunea pentru a putea salva utilizatorul după autentificare
include('db.php');  // Include fișierul care conține conexiunea la baza de date

// Verifică dacă formularul de login a fost trimis
if (isset($_POST['login'])) {
    $username = $_POST['username'];  // Preia username-ul din formular
    $password = $_POST['password'];  // Preia parola din formular

    // Pregătește interogarea pentru a verifica dacă utilizatorul există în baza de date
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);  // Preia interogarea
    $stmt->bind_param("s", $username);  // Leagă parametrii (username-ul în acest caz) la interogare
    $stmt->execute();  // Execută interogarea
    $result = $stmt->get_result();  // Preia rezultatul interogării

    // Verifică dacă utilizatorul există în baza de date
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();  // Preia datele utilizatorului
        // Verifică dacă parola introdusă corespunde cu parola criptată din baza de date
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;  // Salvează username-ul în sesiune
            header("Location: index.php");  // Redirecționează utilizatorul pe pagina principală
        } else {
            $error = "Parola incorectă!";  // Mesaj de eroare pentru parola incorectă
        }
    } else {
        $error = "Utilizatorul nu a fost găsit!";  // Mesaj de eroare dacă utilizatorul nu există
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificare</title>
    <link rel="stylesheet" href="styles.css">  
</head>
<body>
    <div class="form-container"> 
        <h2>Autentificare</h2>
        <form action="login.php" method="post">  
            <input type="text" name="username" placeholder="Username" required>  
            <input type="password" name="password" placeholder="Parola" required>  
            <button type="submit" name="login">Login</button>  
        </form>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>  
        <p>Nu ai cont? <a href="register.php">Înregistrează-te</a></p> 
    </div>
</body>
</html>
