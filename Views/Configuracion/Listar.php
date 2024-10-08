<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Datos de la Empresa</h2>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6 ml-auto">
                        <?php if (isset($alert['mensaje'])) {
                            if ($alert['mensaje'] == "modificado") { ?>
                                <div class="alert alert-primary" role="alert">
                                    <strong>Datos Modificados</strong>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Error al Actualizar</strong>
                                </div>
                        <?php }
                        } ?>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            Datos de la Empresa
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>/Configuracion/actualizar" method="post" id="formEmpresa">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="ruc">Ruc</label>
                                            <input id="id" type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <input id="ruc" class="form-control" type="text" name="ruc" value="<?php echo $data['ruc']; ?>" required pattern="\d{11}" title="Debe contener 11 dígitos numéricos">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>" required minlength="3" maxlength="100" title="El nombre debe tener entre 3 y 100 caracteres">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input id="telefono" class="form-control" type="text" name="telefono" value="<?php echo $data['telefono']; ?>" required pattern="\d{7,15}" title="El teléfono debe contener entre 7 y 15 dígitos">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $data['direccion']; ?>" required minlength="5" maxlength="200" title="La dirección debe tener entre 5 y 200 caracteres">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="razon">Razón Social</label>
                                            <input id="razon" class="form-control" type="text" name="razon" value="<?php echo $data['razon']; ?>" required minlength="3" maxlength="150" title="La razón social debe tener entre 3 y 150 caracteres">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Actualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>
