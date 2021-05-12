<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('VIEW_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once ROOT_PATH . 'model/Page.php';

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
echo (ROOT_PATH . 'controller/' . $moduleName . '.php');
if (file_exists(ROOT_PATH . 'controller/' . $moduleName . '.php')) {
  include ROOT_PATH . 'controller/' . $moduleName . '.php';
  $pageController = new PageController();
  $pageController->setEntitiyId($router->entity_id);

  $pageController->runAction($action);
}

  // if ($router->module == 'page') {

  //   include_once ROOT_PATH . 'controller/PageController.php';
  //   $pageController = new PageController();
  //   $pageController->setEntitiyId($router->entity_id);

  //   $pageController->runAction($action);
  // }
