<?php
if ($_POST) {
// Para validar el login
    if (isset($_POST['username'])) {
        // Verificamos login y password
        $user = $_POST['username'];
        $pass = $_POST['pass'];
        include 'modelo/usuarios.model.php';
        $ingreso = new Usuario();
        $flag    = $ingreso->valida_user_pass($user, $pass);
        if ($flag) {
            if ($flag) {
                //session_destroy();

                $tipouser = $ingreso->valida_tipo_user($user);
                if (isset($tipouser) && ($tipouser == 1)) {
                    $_SESSION['tipouser'] = 1;
                    $control              = "mantipouser"; //página de administración principal (puede ser mantipouser)
                } else if (isset($tipouser) && ($tipouser == 2)) {
                    $_SESSION['tipouser'] = 2;
                    $control              = "principal"; //página de administración principal (puede ser mantipouser)
                }
                //echo '<h1>'.$tipouser.'</h1>';
                //echo 'POST username: <p>'.$_POST['username'].'</p>';//saber lo que tiene POST username

                //session_start();
                $_SESSION['usuario'] = $user;
            } else {
                //session_destroy();
                //echo "<script>alert('Nombre de usuario y contraseña incorrecto')</script>";
                $control = "login";
            }
        }

    } elseif (isset($_POST['accionmatipouser'])) {
        //si viene del mantenedor tipo usuario
        $control = "mantipouser";
    } elseif (isset($_POST['accionmanuser'])) {
        //si viene del mantenedor usuario
        $control = "manuser";
    } elseif (isset($_POST['formser'])) {
        //si viene de los productos
        $control = "principal";
    }
}
