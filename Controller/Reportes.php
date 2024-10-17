<?php
class Reportes extends Controllers {
    public function __construct() {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
        require_once "Models/VentasModel.php";
        $this->ventasModel = new VentasModel(); // Asignar correctamente el modelo
    }

    // Método para mostrar el historial de ventas
    public function HistorialVentas() {
        $data = $this->ventasModel->selectVentas();
        $this->views->getView($this, "HistorialVentas", $data);
    }

    // Método para mostrar las estadísticas de ventas
    public function Estadisticas() {
        // Obtener todas las ventas
        $data['ventas'] = $this->ventasModel->selectVentas(); // Asignamos correctamente el array de ventas

        // Obtener datos para gráficos
        $data['ventas_semanales'] = $this->ventasModel->getVentasPorSemana();
        $data['ventas_mensuales'] = $this->ventasModel->getVentasPorMes();
        $data['productos_mas_adquiridos'] = $this->ventasModel->getProductosMasAdquiridos();

        // Pasar todos los datos a la vista
        $this->views->getView($this, "EstadisticasVentas", $data);
    }
}
