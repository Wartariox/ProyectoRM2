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
                    <!-- Contenedor para el gráfico -->
                    <canvas id="ventasChart" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <h3>Historial de Ventas</h3>
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
                                <?php foreach ($data as $venta) { ?>
                                    <tr>
                                        <td><?php echo $venta['id']; ?></td>
                                        <td><?php echo $venta['id_cliente']; ?></td>
                                        <td><?php echo $venta['total']; ?></td>
                                        <td><?php echo $venta['fecha']; ?></td>
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
<!-- Cargar Chart.js desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Datos de ejemplo para el gráfico
    const labels = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Ventas realizadas',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            data: [12, 19, 3, 5, 2, 3], // Puedes cambiar estos datos con datos reales
        }]
    };

    // Configuración del gráfico
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Renderizar el gráfico
    const ventasChart = new Chart(
        document.getElementById('ventasChart'),
        config
    );
</script>
<?php pie() ?>
