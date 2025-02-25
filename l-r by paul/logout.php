<?php
session_start();  // Pornește sesiunea pentru a putea manipula datele acesteia

// Verifică dacă utilizatorul este autentificat (dacă există variabila 'username' în sesiune)
if (isset($_SESSION['username'])) {
    // Distruge toate variabilele de sesiune
    session_unset();  

    // Distruge sesiunea
    session_destroy();

    // Redirecționează utilizatorul către pagina principală (sau pagina de login)
    header("Location: login.php");
    exit();  // Oprește execuția scriptului
} else {
    // Dacă utilizatorul nu este autentificat, redirecționează la pagina de login
    header("Location: login.php");
    exit();  // Oprește execuția scriptului
}
?>
