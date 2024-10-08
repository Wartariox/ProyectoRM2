<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Ventas Generadas</h2>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $lista) { ?>
                                    <tr>
                                        <!-- Validación del ID de la venta: numérico y positivo -->
                                        <td><?php echo (is_numeric($lista['id']) && $lista['id'] > 0) ? $lista['id'] : 'ID Inválido'; ?></td>
                                        
                                        <!-- Validación del ID del cliente: numérico, entre 8-11 dígitos (RUC/DNI) -->
                                        <td><?php echo (preg_match('/^[0-9]{8,11}$/', $lista['id_cliente'])) ? $lista['id_cliente'] : 'Cliente Inválido'; ?></td>
                                        
                                        <!-- Validación del total: numérico, mayor o igual a 0 -->
                                        <td><?php echo (is_numeric($lista['total']) && $lista['total'] >= 0) ? number_format($lista['total'], 2) : 'Total Inválido'; ?></td>
                                        
                                        <!-- Validación de fecha: formato correcto (YYYY-MM-DD) -->
                                        <td><?php echo (preg_match('/^\d{4}-\d{2}-\d{2}$/', $lista['fecha'])) ? $lista['fecha'] : 'Fecha Inválida'; ?></td>
                                        
                                        <!-- Botón de acción: ver detalle de la venta -->
                                        <td>
                                            <a href="<?php echo base_url(); ?>Ventas/ver?id=<?php echo $lista['id']; ?>&cliente=<?php echo $lista['id_cliente']; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Ver</a>
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
