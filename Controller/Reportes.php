<?php
class Reportes extends Controllers{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
        require_once "Models/VentasModel.php";
        $this->ventasModel = new VentasModel();
    }

    // Método para mostrar el historial de ventas
    public function HistorialVentas()
    {
        $data = $this->ventasModel->selectVentas();
        $this->views->getView($this, "HistorialVentas", $data);
    }

    // Método para mostrar las estadísticas de ventas
    public function Estadisticas()
    {
        $this->views->getView($this, "EstadisticasVentas");
    }
}
