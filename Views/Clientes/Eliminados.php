<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <a class="btn btn-primary" href="<?php echo base_url(); ?>Clientes/Listar"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Ruc/Dni</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $cl) { ?>
                                    <tr>
                                        <td><?php echo $cl['id']; ?></td>
                                        <td><?php echo htmlspecialchars($cl['ruc'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($cl['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($cl['direccion'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($cl['telefono'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <form action="<?php echo base_url() ?>Clientes/reingresar?id=<?php echo $cl['id']; ?>" method="post" class="d-inline confirmar" onsubmit="return validarReingreso();">
                                                <button type="submit" class="btn btn-success"><i class="fas fa-ad"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>

<script>
// Validaciones de JavaScript
function validarReingreso() {
    return confirm("¿Estás seguro de que quieres reingresar este cliente?");
}

window.addEventListener('load', function() {
    // Validar los datos de la tabla
    document.querySelectorAll('#Table tbody tr').forEach(function(row) {
        let ruc = row.cells[1].textContent.trim();
        let nombre = row.cells[2].textContent.trim();
        let direccion = row.cells[3].textContent.trim();
        let telefono = row.cells[4].textContent.trim();

        let errores = [];

        // Validar RUC/DNI (8 o 11 dígitos)
        if (!/^\d{8,11}$/.test(ruc)) {
            errores.push("El RUC/DNI debe tener 8 o 11 dígitos.");
        }

        // Validar Nombre (solo letras y no vacío)
        if (!/^[a-zA-Z\s]+$/.test(nombre) || nombre === '') {
            errores.push("El nombre debe contener solo letras y no puede estar vacío.");
        }

        // Validar Dirección (no vacía)
        if (direccion === '') {
            errores.push("La dirección no puede estar vacía.");
        }

        // Validar Teléfono (7 a 15 dígitos)
        if (!/^\d{7,15}$/.test(telefono)) {
            errores.push("El teléfono debe tener entre 7 y 15 dígitos.");
        }

        // Mostrar errores si los hay
        if (errores.length > 0) {
            alert("Errores en la fila con RUC/DNI " + ruc + ":\n" + errores.join("\n"));
        }
    });
});
</script>
