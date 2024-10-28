<?php

session_start();

$usuarios = [
    'usuario1' => 'contraseña1',
    'usuario2' => 'contraseña2'
];

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($usuarios[$username]) && $usuarios[$username] === $password) {
    $_SESSION['username'] = $username;
    header("Location: pagina_principal.php"); // Redirige a la página principal
    exit;
} else {
    echo "<script>alert('Usuario o contraseña incorrectos');window.location.href='login.html';</script>";
}
?>
