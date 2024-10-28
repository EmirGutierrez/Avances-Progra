<?php
    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO Usuarios(nombre_completo, correo, usuario, contrasena) 
    VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM Usuarios WHERE correo = '$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '<script>
                alert("Este correo ya fue registrado, intente con otro");
                window.location = "../registroUsuario.html";
            </script>';
        exit();
    }

    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM Usuarios WHERE usuario = '$usuario'");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '<script>
                alert("Este usuario ya fue registrado, intente con otro");
                window.location = "../registroUsuario.html";
            </script>';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '<script>
                alert("Usuario almacenado exitosamente");
                window.location = "../registroUsuario.html";
            </script>';
    } else {
        echo '<script>
                alert("Intentelo de nuevo, usuario no almacenado");
                window.location = "../registroUsuario.html";
            </script>';
    }

    mysqli_close($conexion);
?>
