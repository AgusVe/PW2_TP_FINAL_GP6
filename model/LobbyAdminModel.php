<?php

class LobbyAdminModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function cantidadDeJugadoresTotales($fecha)
    {
        $sql = "SELECT MONTHNAME(fecha_registro) AS mes, count(*) AS cantidad  FROM usuario WHERE fecha_registro <='$fecha' AND idRol=3 GROUP BY MONTH(fecha_registro)";

        return $this->database->query($sql);


    }

    public function cantidadDePartidasJugadas($fecha)
    {
        $sql = "SELECT MONTHNAME(fecha) AS mes, count(*) AS cantidad  FROM partida WHERE terminada=1 AND fecha <='$fecha' GROUP BY MONTH(fecha)";
        return $this->database->query($sql);

    }

    public function cantidadDePreguntasEnJuego($fecha)
    {

        $sql = "SELECT MONTHNAME(fecha) AS mes, count(*) AS cantidad  FROM preguntas WHERE fecha <='$fecha' GROUP BY MONTH(fecha)";
        return $this->database->query($sql);
    }

    public function cantidadDePreguntasDadasDeAlta($fecha)
    {
        $sql="SELECT MONTHNAME(fecha) AS mes, count(*) AS cantidad FROM preguntas WHERE preguntaSugerida=1 AND fecha <='$fecha' GROUP BY MONTH(fecha)";

        return $this->database->query($sql);

    }

    public function cantidadDeUsuariosNuevos($fecha)
    {

        $sql = "SELECT WEEK(fecha_registro) AS semana,count(*) AS cantidad FROM usuario WHERE MONTH(fecha_registro) = MONTH('$fecha') GROUP BY semana ORDER BY semana;";
        return $this->database->query($sql);

    }

    /*ESTA MAL*/
    public function porcentajeDePreguntasRespondidasCorrectamentePorElUsuario($idUsuario)
    {
        $sql = "SELECT puntosTotales FROM usuario WHERE idUsuario ='$idUsuario'";
        $cantidadDePuntosTotales= $this->database->getOne($sql);

        $sql = "SELECT count(*) FROM usuario U FROM partida P ON P.idUsuario= P.idUsuario WHERE terminada =1";
        $cantidaDePartidasJugadas= $this->database->getOne($sql);

        return ($cantidadDePuntosTotales/$cantidaDePartidasJugadas)*100;



    }

    public function cantidadDeUsuariosPorPais($fecha)
    {

        $sql = "SELECT pais, count(*) AS cantidad FROM usuario WHERE fecha_registro <='$fecha' AND idRol=3 GROUP BY pais";
        return $this->database->query($sql);


    }

    /*REVISAR*/
    public function cantidadDeUsuariosPorSexo($fecha)
    {

        $sql = "SELECT genero,count(*) AS cantidad FROM usuario WHERE fecha_registro <='$fecha' AND idRol=3 GROUP BY genero";
        return $this->database->query($sql);


    }

    public function cantidadDeUsuariosPorGrupoDeEdad($fecha)
    {
        $sql = "SELECT grupoEdad,count(*) AS cantidad FROM usuario WHERE fecha_registro <='$fecha' AND idRol=3 GROUP BY grupoEdad";
                return $this->database->query($sql);

        }

}