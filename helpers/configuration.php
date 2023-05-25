<?php

include_once('helpers/MySqlDatabase.php');

include_once('controller/SesionController.php');
include_once('controller/RegistroController.php');

include_once('model/SesionModel.php');
include_once('model/RegistroModel.php');


class configuration{

    private $configFile = 'config/config.ini';

    public function __construct() {
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





    public function getSesionController(){
        return new SesionController(new SesionModel($this->getDataBase()));
    }

    public function getRegistroController(){
        return new RegistroController(new RegistroModel($this->getDataBase()));
    }

}