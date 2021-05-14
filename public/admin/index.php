<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

define('MODULE_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once MODULE_PATH . 'page/model/Page.php';

DatabaseConnection::connect('localhost', 'php-cms-oop', 'samir', 'Samir123@');

// $section = $_GET['section'] ?? $_POST['section'] ?? 'home';
// $action = $_GET['action'] ?? $_POST['action'] ?? 'index';
$action = $_GET['seo_name'] ?? 'home';

$dbh = DatabaseConnection::getInstance();

$dbc = $dbh->getConnection();

$router = new Router($dbc);
$router->findBy('pretty_url', $action);

$action = $router->action ?? 'index';


$moduleName = ucfirst($router->module) . 'Controller';
$controllerFile = MODULE_PATH . $router->module . '/controller/' . $moduleName . '.php';

define('VIEW_PATH', ROOT_PATH . 'modules' . DIRECTORY_SEPARATOR . $router->module . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

if (file_exists($controllerFile)) {
  include_once $controllerFile;
  $controller = new $moduleName();
  $controller->setEntitiyId($router->entity_id);
  $controller->runAction($action);
}
