<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Productos/actualizar" autocomplete="off" id="frmProducto">
                        <div class="card-header bg-dark">
                            <h6 class="title text-white text-center">Modificar Producto</h6>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="codigo">Código de barras</label>
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input id="codigo" class="form-control" type="text" name="codigo" value="<?php echo $data['codigo']; ?>" required pattern="[0-9]{6,13}" title="El código de barras debe tener entre 6 y 13 dígitos numéricos">
                                <span class="text-danger" id="codigoError"></span>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>" required minlength="3" title="El nombre debe tener al menos 3 caracteres">
                                <span class="text-danger" id="nombreError"></span>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="cantidad">Stock</label>
                                        <input id="cantidad" class="form-control" type="text" name="cantidad" value="<?php echo $data['cantidad']; ?>" required pattern="[0-9]+" title="El stock debe ser un número entero positivo">
                                        <span class="text-danger" id="cantidadError"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input id="precio" class="form-control" type="text" name="precio" value="<?php echo $data['precio']; ?>" required pattern="\d+(\.\d{1,2})?" title="El precio debe ser un número con hasta dos decimales">
                                        <span class="text-danger" id="precioError"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit">Modificar</button>
                            <a href="<?php echo base_url(); ?>Productos/Listar" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>
