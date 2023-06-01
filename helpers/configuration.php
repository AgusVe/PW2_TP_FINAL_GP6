<?php

include_once('helpers/MySqlDatabase.php');
include_once('Router.php');

include_once('helpers/MustacheRender.php');
include_once('third-party/mustache/src/Mustache/Autoloader.php');

include_once('controller/SesionController.php');
include_once('controller/RegistroController.php');
include_once('controller/HomeController.php');
include_once('controller/LobbyUsuarioController.php');
include_once('controller/PartidaController.php');
include_once('controller/PreguntaController.php');

include_once('model/SesionModel.php');
include_once('model/RegistroModel.php');
include_once('model/PreguntaModel.php');
include_once('model/PartidaModel.php');


class configuration{

    private $configFile = 'config/config.ini';

    public function __construct() {
    }

    public function getRouter() {
        return new Router(
            $this,
            "getHomeController",
            "execute");
    }
    private function getArrayConfig(){
        return parse_ini_file($this->configFile);
    }
    public function getDataBase(){
        $config = $this->getArrayConfig();
        return new MySqlDatabase(
            $config['servername'],
            $config['username'],
            $config['password'],
            $config['database']);
    }


    private function getRenderer() {
        return new MustacheRender('view/partial');
    }

    public function getHomeController(){
        return new HomeController($this->getRenderer());
    }
    public function getLobbyUsuarioController(){
        return new LobbyUsuarioController($this->getRenderer());
    }

    public function getSesionController(){
        return new SesionController(new SesionModel($this->getDataBase()),$this->getRenderer());
    }

    public function getRegistroController(){
        return new RegistroController(new RegistroModel($this->getDataBase()),$this->getRenderer());
    }

    public function getPartidaController(){
        return new PartidaController(new PartidaModel($this->getDataBase()),$this->getRenderer());
    }

    public function getPreguntaController(){
        return new PreguntaController(new PreguntaModel($this->getDataBase()),$this->getRenderer());
    }

}