<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#nuevo_cliente"><i class="fas fa-plus-circle"></i> Nuevo</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Clientes/eliminados"><i class="fas fa-user-slash"></i> Inactivos</a>
                        </div>
                        <div class="col-lg-6">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "existe") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>El cliente ya existe</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar</strong>
                                    </div>
                                <?php } else if ($alert == "registrado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Cliente registrado</strong>
                                    </div>
                                <?php } else if ($alert == "modificado") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Cliente Modificado</strong>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
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
                                            <a href="<?php echo base_url() ?>Clientes/editar?id=<?php echo $cl['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo base_url() ?>Clientes/eliminar?id=<?php echo $cl['id']; ?>" method="post" class="d-inline elim" onsubmit="return validarEliminar();">
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="my-modal-title"><i class="fas fa-user-plus"></i> Nuevo Cliente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Clientes/insertar" autocomplete="off" onsubmit="return validarFormulario();">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ruc">Ruc/Dni</label>
                        <input id="ruc" class="form-control" type="text" name="ruc" placeholder="Ruc/Dni">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Dirección">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php pie() ?>

<script>
// Validaciones de JavaScript
function validarEliminar() {
    return confirm("¿Estás seguro de que quieres eliminar este cliente?");
}

function validarFormulario() {
    let ruc = document.getElementById('ruc').value.trim();
    let nombre = document.getElementById('nombre').value.trim();
    let direccion = document.getElementById('direccion').value.trim();
    let telefono = document.getElementById('telefono').value.trim();
    
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
        alert(errores.join("\n"));
        return false;
    }

    return true;
}
</script>
