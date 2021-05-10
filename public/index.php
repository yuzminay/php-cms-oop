<?php
require_once 'src/Controller.php';

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'index';



if ($section == 'about-us') {

  include_once 'controller/aboutUsController.php';
  $aboutContoller = new AboutController();
  $aboutContoller->runAction($action);
} else if ($section == 'contact-us') {

  include_once 'controller/contactUsController.php';
  $contactController = new ContactController();
  $contactController->runAction($action);
} else {
  include_once 'controller/homeController.php';
}
