<?php
include_once("helpers/Configuration.php");

session_start();
$configuration = new Configuration();

$urlHelper = $configuration->getUrlHelper();
$module = $urlHelper->getModuleFromRequestOr("home");
$action = $urlHelper->getActionFromRequestOr("execute");


$router = $configuration->getRouter();
$router->executeActionFromModule($action, $module);