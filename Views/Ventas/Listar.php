<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Nueva Venta</h2>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="" method="post" id="frmCompras" class="row" autocomplete="off">
                <!-- Código de Barras -->
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="buscar_codigo">Código de barras</label>
                        <input type="hidden" id="id" name="id">
                        <input id="buscar_codigo" onkeyup="BuscarCodigo(event);" class="form-control" type="text" name="codigo" placeholder="Código de barras" pattern="[A-Za-z0-9]{8,12}" required title="Debe ser un código alfanumérico de entre 8 y 12 caracteres">
                        <span class="text-danger d-none" id="error">No hay producto</span>
                    </div>
                </div>

                <!-- Producto -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="nombre">Producto</label>
                        <input id="nombre" class="form-control" type="hidden" name="nombre">
                        <br />
                        <strong id="nombreP"></strong>
                    </div>
                </div>

                <!-- Cantidad -->
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input id="stockD" type="hidden">
                        <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="IngresarCantidad(event);" min="1" required title="Ingrese un número válido mayor a 0">
                    </div>
                </div>

                <!-- Precio -->
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input id="precio" class="form-control" type="hidden" name="precio">
                        <br />
                        <strong id="precioP"></strong>
                    </div>
                </div>
            </form>

            <!-- Tabla de Compras -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-light mt-4" id="tablaCompras">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody id="ListaCompras">
                                <!-- Aquí se mostrará la lista de productos añadidos -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Datos del Cliente -->
            <div class="row">
                <div class="col-lg-4 mt-1">
                    <div class="form-group">
                        <strong class="text-primary">Datos del Cliente</strong>
                        <input type="hidden" id="id_cliente" name="id_cliente">
                        <input type="text" id="ruc_cliente" onkeyup="BuscarCliente(event);" name="ruc_cliente" class="form-control" placeholder="RUC/DNI del cliente" pattern="[0-9]{8,11}" required title="Debe ingresar un RUC o DNI válido (8 o 11 dígitos)">
                        <strong id="nom_cli" class="form-control border-0 text-success"></strong>
                        <strong id="dir_cli" class="form-control border-0 text-success"></strong>
                        <strong id="tel_cli" class="form-control border-0 text-success"></strong>
                    </div>
                </div>

                <!-- Total a Pagar -->
                <div class="col-lg-4 mt-1">
                    <div class="form-group">
                        <strong class="text-primary">Total a pagar</strong>
                        <input type="hidden" id="total" name="total" class="form-control mb-2">
                        <strong id="tVenta" class="form-control border-0 text-success"></strong>
                        <button class="btn btn-danger" type="button" id="AnularCompra">Anular Venta</button>
                        <button class="btn btn-success" type="button" id="procesarVenta"><i class="fas fa-money-check-alt"></i> Procesar Venta</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>

<script>
    // Validaciones adicionales en tiempo real y feedback visual
    document.getElementById('frmCompras').addEventListener('submit', function(event) {
        const codigo = document.getElementById('buscar_codigo');
        const cantidad = document.getElementById('cantidad');
        const rucCliente = document.getElementById('ruc_cliente');
        let valid = true;

        // Validación de código de barras (alfanumérico de 8-12 caracteres)
        const codigoRegex = /^[A-Za-z0-9]{8,12}$/;
        if (!codigoRegex.test(codigo.value)) {
            valid = false;
            codigo.classList.add('is-invalid');
        } else {
            codigo.classList.remove('is-invalid');
        }

        // Validación de cantidad (número mayor a 0)
        if (cantidad.value <= 0) {
            valid = false;
            cantidad.classList.add('is-invalid');
        } else {
            cantidad.classList.remove('is-invalid');
        }

        // Validación de RUC/DNI (8 o 11 dígitos)
        const rucRegex = /^[0-9]{8,11}$/;
        if (!rucRegex.test(rucCliente.value)) {
            valid = false;
            rucCliente.classList.add('is-invalid');
        } else {
            rucCliente.classList.remove('is-invalid');
        }

        // Si alguna validación falla, evitar el envío del formulario
        if (!valid) {
            event.preventDefault();
        }
    });
</script>
