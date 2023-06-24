<?php

class LobbyAdminController
{
    private $renderer;
    private $lobbyAdminModel;

    private $perfilModel;


    public function __construct($renderer, $lobbyAdminModel, $perfilModel)
    {
        $this->renderer = $renderer;
        $this->lobbyAdminModel = $lobbyAdminModel;
        $this->perfilModel = $perfilModel;

    }

    public function execute()
    {
        if (!isset($_SESSION['email'])) {
            header("location: /");
            exit();
        }

        $datos['datosUsur'] = $this->perfilModel->obtenerDatos($_SESSION["id"]);

        echo $this->renderer->render("lobbyAdmin", $datos);
    }

    public function datosParaGraficos()
    {
        if (isset($_POST['fecha'])) {
            $fecha = $_POST['fecha'];
        } else {
            $fecha = date("Y/m/d");
        }

        $cantidadDeJugadoresTotales = $this->lobbyAdminModel->cantidadDeJugadoresTotales($fecha);
        $cantidadDePartidasJugadas = $this->lobbyAdminModel->cantidadDePartidasJugadas($fecha);
        $cantidadDePreguntasEnJuego = $this->lobbyAdminModel->cantidadDePreguntasEnJuego($fecha);
        $cantidadDePreguntasDadasDeAlta = $this->lobbyAdminModel->cantidadDePreguntasDadasDeAlta($fecha);
        $cantidadDeUsuariosNuevos = $this->lobbyAdminModel->cantidadDeUsuariosNuevos($fecha);
        $cantidadDeUsuariosPorPais = $this->lobbyAdminModel->cantidadDeUsuariosPorPais($fecha);
        $cantidadDeUsuariosPorSexo = $this->lobbyAdminModel->cantidadDeUsuariosPorSexo($fecha);
        $cantidadDeUsuariosPorGrupoDeEdad = $this->lobbyAdminModel->cantidadDeUsuariosPorGrupoDeEdad($fecha);


        $datos['cantidadDeJugadoresTotales'] = array();
// Recorrer los resultados y guardar los datos en el array
        foreach ($cantidadDeJugadoresTotales as $row) {
            $datos['cantidadDeJugadoresTotales'][$row['mes']] = $row['cantidad'];
        }
        $datos['cantidadDePartidasJugadas'] = array();
// Recorrer los resultados y guardar los datos en el array
        foreach ($cantidadDePartidasJugadas as $row) {
            $datos['cantidadDePartidasJugadas'][$row['mes']] = $row['cantidad'];
        }
        $datos['cantidadDePreguntasEnJuego'] = array();
// Recorrer los resultados y guardar los datos en el array
        foreach ($cantidadDePreguntasEnJuego as $row) {
            $datos['cantidadDePreguntasEnJuego'][$row['mes']] = $row['cantidad'];
        }
        $datos['cantidadDePreguntasDadasDeAlta'] = array();
// Recorrer los resultados y guardar los datos en el array
        foreach ($cantidadDePreguntasDadasDeAlta as $row) {
            $datos['cantidadDePreguntasDadasDeAlta'][$row['mes']] = $row['cantidad'];
        }
        $datos['cantidadDeUsuariosNuevos'] = array();
// Recorrer los resultados y guardar los datos en el array
        foreach ($cantidadDeUsuariosNuevos as $row) {
            $datos['cantidadDeUsuariosNuevos'][$row['semana']] = $row['cantidad'];
        }
        $datos['cantidadDeUsuariosPorPais'] = array();
// Recorrer los resultados y guardar los datos en el array
        foreach ($cantidadDeUsuariosPorPais as $row) {
            $datos['cantidadDeUsuariosPorPais'][$row['pais']] = $row['cantidad'];
        }
        $datos['cantidadDeUsuariosPorSexo'] = array();
// Recorrer los resultados y guardar los datos en el array
        foreach ($cantidadDeUsuariosPorSexo as $row) {
            $datos['cantidadDeUsuariosPorSexo'][$row['genero']] = $row['cantidad'];
        }
        $datos['cantidadDeUsuariosPorGrupoDeEdad'] = array();
// Recorrer los resultados y guardar los datos en el array
        foreach ($cantidadDeUsuariosPorGrupoDeEdad as $row) {
            $datos['cantidadDeUsuariosPorGrupoDeEdad'][$row['grupoEdad']] = $row['cantidad'];
        }

        header('Content-Type: application/json');
        echo json_encode($datos);
        exit();


    }


}

