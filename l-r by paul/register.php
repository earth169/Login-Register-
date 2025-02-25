<?php
include('db.php');  // Include fișierul de conexiune la baza de date

// Verifică dacă formularul de înregistrare a fost trimis
if (isset($_POST['register'])) {
    $username = $_POST['username'];  // Preia username-ul din formular
    $password = $_POST['password'];  // Preia parola din formular
    $password_hash = password_hash($password, PASSWORD_DEFAULT);  // Criptează parola folosind algoritmul `PASSWORD_DEFAULT`

    // Pregătește interogarea pentru a adăuga un utilizator în baza de date
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);  // Preia interogarea
    $stmt->bind_param("ss", $username, $password_hash);  // Leagă parametrii la interogare

    // Execută interogarea și adaugă utilizatorul în baza de date
    if ($stmt->execute()) {
        header("Location: login.php");  // Dacă înregistrarea este reușită, redirecționează către pagina de login
    } else {
        $error = "A apărut o eroare!";  // Mesaj de eroare în caz de eșec
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Înregistrare</title>
    <link rel="stylesheet" href="styles.css">  
</head>
<body>
    <div class="form-container"> 
        <h2>Înregistrare</h2>
        <form action="register.php" method="post">  
            <input type="text" name="username" placeholder="Username" required> 
            <input type="password" name="password" placeholder="Parola" required> 
            <button type="submit" name="register">Înregistrează-te</button>  
        </form>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>  
        <p>Ai deja un cont? <a href="login.php">Autentifică-te</a></p> 
    </div>
</body>
</html>
