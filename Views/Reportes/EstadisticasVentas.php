<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Estadísticas de Ventas</h2>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="h6">Ventas Totales: <?php echo isset($ventas) ? count($ventas) : 0; ?></h4>
                    <h4 class="h6">Ventas Semanales: <?php echo isset($ventas_semanales) ? count($ventas_semanales) : 0; ?></h4>
                    <h4 class="h6">Ventas Mensuales: <?php echo isset($ventas_mensuales) ? count($ventas_mensuales) : 0; ?></h4>
                    <h4 class="h6">Productos Más Adquiridos: <?php echo isset($productos_mas_adquiridos) ? count($productos_mas_adquiridos) : 0; ?></h4>
                    
                    <!-- Gráficos -->
                    <div>
                        <canvas id="ventasBarras" width="400" height="200"></canvas>
                    </div>
                    <div>
                        <canvas id="ventasTorta" width="400" height="200"></canvas>
                    </div>
                    <div>
                        <canvas id="ventasLineas" width="400" height="200"></canvas>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="Table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($ventas) && is_array($ventas)) { ?>
                                    <?php foreach ($ventas as $venta) { ?>
                                        <tr>
                                            <td><?php echo $venta['id']; ?></td>
                                            <td><?php echo $venta['id_cliente']; ?></td>
                                            <td><?php echo $venta['total']; ?></td>
                                            <td><?php echo $venta['fecha']; ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="4">No hay ventas disponibles.</td>
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

<!-- Scripts para Chart.js y alertas -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mostrar alertas para hacer seguimiento
        alert("Datos de ventas cargados correctamente.");

        // Gráfico de Barras
        var ctxBarras = document.getElementById('ventasBarras').getContext('2d');
        var ventasBarras = new Chart(ctxBarras, {
            type: 'bar',
            data: {
                labels: ['Ventas Semanales', 'Ventas Mensuales', 'Productos Más Adquiridos'],
                datasets: [{
                    label: 'Estadísticas de Ventas (Barras)',
                    data: [
                        <?php echo isset($ventas_semanales) ? count($ventas_semanales) : 0; ?>,
                        <?php echo isset($ventas_mensuales) ? count($ventas_mensuales) : 0; ?>,
                        <?php echo isset($productos_mas_adquiridos) ? count($productos_mas_adquiridos) : 0; ?>
                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        alert("Gráfico de barras creado.");

        // Gráfico de Torta
        var ctxTorta = document.getElementById('ventasTorta').getContext('2d');
        var ventasTorta = new Chart(ctxTorta, {
            type: 'pie',
            data: {
                labels: ['Ventas Semanales', 'Ventas Mensuales', 'Productos Más Adquiridos'],
                datasets: [{
                    label: 'Estadísticas de Ventas (Torta)',
                    data: [
                        <?php echo isset($ventas_semanales) ? count($ventas_semanales) : 0; ?>,
                        <?php echo isset($ventas_mensuales) ? count($ventas_mensuales) : 0; ?>,
                        <?php echo isset($productos_mas_adquiridos) ? count($productos_mas_adquiridos) : 0; ?>
                    ],
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });

        alert("Gráfico de torta creado.");

        // Gráfico de Líneas
        var ctxLineas = document.getElementById('ventasLineas').getContext('2d');
        var ventasLineas = new Chart(ctxLineas, {
            type: 'line',
            data: {
                labels: ['Ventas Semanales', 'Ventas Mensuales', 'Productos Más Adquiridos'],
                datasets: [{
                    label: 'Estadísticas de Ventas (Líneas)',
                    data: [
                        <?php echo isset($ventas_semanales) ? count($ventas_semanales) : 0; ?>,
                        <?php echo isset($ventas_mensuales) ? count($ventas_mensuales) : 0; ?>,
                        <?php echo isset($productos_mas_adquiridos) ? count($productos_mas_adquiridos) : 0; ?>
                    ],
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        alert("Gráfico de líneas creado.");
    });
</script>

<?php pie() ?>
