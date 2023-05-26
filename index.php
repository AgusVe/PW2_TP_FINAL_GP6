<?php
include_once("helpers/Configuration.php");


$configuration = new Configuration();
$router = $configuration->getRouter();

$module = $_GET['module'] ?? 'home';
$action = $_GET['action'] ?? 'execute';


$router->executeActionFromModule($action, $module);