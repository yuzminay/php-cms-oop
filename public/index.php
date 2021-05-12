<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('VIEW_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'model/Page.php';

DatabaseConnection::connect('localhost', 'php-cms-oop', 'samir', 'Samir123@');

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'index';



if ($section == 'about-us') {

  include_once ROOT_PATH . 'controller/aboutUsController.php';
  $aboutContoller = new AboutController();
  $aboutContoller->runAction($action);
} else if ($section == 'contact-us') {

  include_once ROOT_PATH . 'controller/contactUsController.php';
  $contactController = new ContactController();
  $contactController->runAction($action);
} else {
  include_once ROOT_PATH . 'controller/homeController.php';
  $homeController = new HomeController();
  $homeController->runAction($action);
}
