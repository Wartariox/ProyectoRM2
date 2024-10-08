<?php
// Validaciones PHP del lado del servidor
$errores = [];

// Validar RUC/DNI (se espera un número de longitud 8 o 11)
if (!isset($data['ruc']) || !preg_match('/^\d{8,11}$/', $data['ruc'])) {
    $errores[] = "El RUC/DNI debe tener 8 o 11 dígitos.";
}

// Validar Nombre (solo letras y no vacío)
if (!isset($data['nombre']) || empty(trim($data['nombre'])) || !preg_match('/^[a-zA-Z\s]+$/', $data['nombre'])) {
    $errores[] = "El nombre no puede estar vacío y debe contener solo letras.";
}

// Validar Dirección (no vacío)
if (!isset($data['direccion']) || empty(trim($data['direccion']))) {
    $errores[] = "La dirección no puede estar vacía.";
}

// Validar Teléfono (se espera un número de longitud entre 7 y 15)
if (!isset($data['telefono']) || !preg_match('/^\d{7,15}$/', $data['telefono'])) {
    $errores[] = "El teléfono debe tener entre 7 y 15 dígitos.";
}

// Si hay errores, mostrar mensaje (esto es solo un ejemplo)
if (!empty($errores)) {
    foreach ($errores as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
    exit;
}
?>

<!-- Formulario HTML con validaciones en el lado del cliente -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Clientes/actualizar" autocomplete="off" id="clienteForm">
                        <div class="card-header bg-dark">
                            <h6 class="title text-white text-center"><i class="fas fa-user-edit"></i> Modificar Cliente</h6>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="ruc">Ruc/Dni</label>
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input id="ruc" class="form-control" type="text" name="ruc" value="<?php echo $data['ruc']; ?>" required pattern="\d{8,11}" title="El RUC/DNI debe tener 8 o 11 dígitos">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>" required pattern="[a-zA-Z\s]+" title="El nombre solo puede contener letras y espacios">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $data['direccion']; ?>" required title="La dirección no puede estar vacía">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input id="telefono" class="form-control" type="text" name="telefono" value="<?php echo $data['telefono']; ?>" required pattern="\d{7,15}" title="El teléfono debe tener entre 7 y 15 dígitos">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Clientes/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Validación en JavaScript para asegurar que los datos sean correctos antes de enviar -->
<script>
    document.getElementById('clienteForm').addEventListener('submit', function(e) {
        let ruc = document.getElementById('ruc').value;
        let nombre = document.getElementById('nombre').value;
        let direccion = document.getElementById('direccion').value;
        let telefono = document.getElementById('telefono').value;
        let errores = [];

        // Validar RUC/DNI (8 o 11 dígitos)
        if (!/^\d{8,11}$/.test(ruc)) {
            errores.push("El RUC/DNI debe tener 8 o 11 dígitos.");
        }

        // Validar Nombre (solo letras y no vacío)
        if (!/^[a-zA-Z\s]+$/.test(nombre) || nombre.trim() === '') {
            errores.push("El nombre debe contener solo letras y no puede estar vacío.");
        }

        // Validar Dirección (no vacía)
        if (direccion.trim() === '') {
            errores.push("La dirección no puede estar vacía.");
        }

        // Validar Teléfono (7 a 15 dígitos)
        if (!/^\d{7,15}$/.test(telefono)) {
            errores.push("El teléfono debe tener entre 7 y 15 dígitos.");
        }

        // Si hay errores, prevenir el envío y mostrar los errores
        if (errores.length > 0) {
            e.preventDefault();
            alert(errores.join("\n"));
        }
    });
</script>
