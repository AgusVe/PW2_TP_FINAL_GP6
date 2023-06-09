<?php
include_once("helpers/Configuration.php");

session_start();
$configuration = new Configuration();
$router = $configuration->getRouter();

$module = $_GET['module'] ?? 'login';
$action = $_GET['action'] ?? 'execute';

$router->executeActionFromModule($action, $module);