<?php

$section = $_GET['section'] ?? 'home';

if ($section == 'about-us') {
  include_once 'controller/aboutUsController.php';
} else if ($section == 'contact-us') {
  include_once 'controller/contactUsController.php';
} else {
  include_once 'controller/homeController.php';
}
