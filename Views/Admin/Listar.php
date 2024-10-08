<?php
// Validaciones PHP (del lado del servidor)

// Validación para la variable $alert (usuarios)
if (!isset($alert) || !is_numeric($alert) || $alert < 0) {
    $alert = 0; // Si no es válido, se asigna un valor por defecto
}

// Validación para la variable $data (productos)
if (!isset($data) || !is_numeric($data) || $data < 0) {
    $data = 0; // Si no es válido, se asigna un valor por defecto
}

// Validación para la variable $cliente (clientes)
if (!isset($cliente) || !is_numeric($cliente) || $cliente < 0) {
    $cliente = 0; // Si no es válido, se asigna un valor por defecto
}

// Validación para la variable $config (ventas)
if (!isset($config) || !is_numeric($config) || $config < 0) {
    $config = 0.00; // Si no es válido, se asigna un valor por defecto
}
?>

<!-- Sidebar Navigation end-->
<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Panel de Administración</h2>
        </div>
    </div>
    <section class="no-padding-bottom">
        <div class="container-fluid">
            <div class="row">

                <!-- Usuarios Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Usuarios</div>
                                    <div class="h5 mb-0 font-weight-bold text-white">
                                        <?php echo htmlspecialchars($alert, ENT_QUOTES, 'UTF-8'); ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Productos Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-secondary border-0 shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Productos</div>
                                    <div class="h5 mb-0 font-weight-bold text-white">
                                        <?php echo htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fab fa-product-hunt fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Clientes Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Clientes</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-white">
                                                <?php echo htmlspecialchars($cliente, ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ventas Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Ventas</div>
                                    <div class="h5 mb-0 font-weight-bold text-white">
                                        <?php echo htmlspecialchars($config, ENT_QUOTES, 'UTF-8'); ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cart-arrow-down fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Reportes Gráficos -->
            <h4 class="mt-2">Reportes Gráficos</h4>
            <div class="row">
                <d
