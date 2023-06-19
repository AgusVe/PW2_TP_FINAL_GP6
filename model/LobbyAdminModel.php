<?php

class LobbyAdminModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function cantidadDeJugadoresTotales()
    {
        $sql = "SELECT count(*)  FROM usuario";
        return $this->database->getOne($sql);


    }

    public function cantidadDePartidasJugadas()
    {
        $sql = "SELECT count(*)  FROM partida WHERE terminada=1";
        return $this->database->getOne($sql);

    }

    public function cantidadDePreguntasEnJuego()
    {

        $sql = "SELECT count(*)  FROM preguntas";
        return $this->database->getOne($sql);
    }

    public function cantidadDePreguntasDadasDeAlta()
    {


    }

    public function cantidadDeUsuariosNuevos()
    {
        $fechaActual = date("Y/m/d");
        $fechaDeUnMesAtras = date("Y-m-d", strtotime($fechaActual . "- 1 month"));

        $sql = "SELECT count(*) FROM usuario WHERE fecha_registro BETWEEN '.$fechaDeUnMesAtras.' AND '.$fechaActual.'";

        return $this->database->getOne($sql);


    }

    public function porcentajeDePreguntasRespondidasCorrectamentePorElUsuario()
    {

    }

    public function cantidadDeUsuariosPorPais($idPais)
    {

        $sql = "SELECT count(*) FROM usuario WHERE pais='.$idPais.'";
        return $this->database->getOne($sql);


    }

    public function cantidadDeUsuariosPorSexo($sexo)
    {

        $sql = "SELECT count(*) FROM usuario WHERE genero='.$sexo.'";
        return $this->database->getOne($sql);


    }

    public function cantidadDeUsuariosPorGrupoDeEdad($grupoDeEdad)
    {
        $fechaActual = date("Y/m/d");
        switch ($grupoDeEdad) {
            case "menor":
                $sql = "SELECT count(*) FROM usuario WHERE TIMESTAMPDIFF(YEAR,nacimiento,'.$fechaActual.' ) < 18";
                return $this->database->getOne($sql);
                break;

            case "medio":
                $sql = "SELECT count(*) FROM usuario WHERE TIMESTAMPDIFF(YEAR,nacimiento,'.$fechaActual.' ) BETWEEN 18 AND 60";
                return $this->database->getOne($sql);
                break;


            case "jubilado":
                $sql = "SELECT count(*) FROM usuario WHERE TIMESTAMPDIFF(YEAR,nacimiento,'.$fechaActual.' ) > 60";
                return $this->database->getOne($sql);
                break;

        }

    }


}