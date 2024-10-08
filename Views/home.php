<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css">
</head>

<body class="bg-warning">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-4 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-center">
                        <strong class="text-white">Iniciar Sesión</strong><br>
                        <img class="img-thumbnail" src="<?php echo base_url(); ?>/Assets/img/avatar.png" width="100">
                    </div>
                    <div class="card-body">
                        <!-- Mostrar mensaje de error si el login falla -->
                        <?php if (isset($_GET['msg'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Usuario o contraseña incorrecta</strong>
                            </div>
                        <?php } ?>
                        
                        <!-- Formulario de login con validaciones mejoradas -->
                        <form action="<?php echo base_url(); ?>Usuarios/login" method="post" autocomplete="off" id="loginForm">
                            <div class="form-group">
                                <strong class="text-primary">Usuario</strong>
                                <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" required pattern="[A-Za-z0-9_]{4,20}" title="El usuario debe contener entre 4 y 20 caracteres alfanuméricos o guiones bajos">
                                <small class="text-danger" id="usuarioError"></small>
                            </div>
                            <div class="form-group">
                                <strong class="text-primary">Contraseña</strong>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña" required minlength="8" maxlength="20" title="La contraseña debe tener entre 8 y 20 caracteres">
                                <small class="text-danger" id="claveError"></small>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Iniciar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Validación adicional en el cliente (JS) para mejorar la experiencia del usuario
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const usuario = document.getElementById('usuario');
            const clave = document.getElementById('clave');
            let valid = true;

            // Validación de usuario (alfanumérico y longitud)
            const usuarioRegex = /^[A-Za-z0-9_]{4,20}$/;
            if (!usuarioRegex.test(usuario.value)) {
                valid = false;
                document.getElementById('usuarioError').textContent = "El usuario debe contener entre 4 y 20 caracteres alfanuméricos o guiones bajos";
            } else {
                document.getElementById('usuarioError').textContent = "";
            }

            // Validación de contraseña (longitud)
            if (clave.value.length < 8 || clave.value.length > 20) {
                valid = false;
                document.getElementById('claveError').textContent = "La contraseña debe tener entre 8 y 20 caracteres";
            } else {
                document.getElementById('claveError').textContent = "";
            }

            // Si alguna validación falla, prevenir el envío del formulario
            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>
