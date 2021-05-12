<?php

class ContactController extends Controller

{
  function runBeforeAction()
  {

    if ($_SESSION['has_submitted_the_form'] ?? 0 == 1) {

      $dbh = DatabaseConnection::getInstance();
      $dbc = $dbh->getConnection();

      $pageObj = new Page($dbc);
      $pageObj->findBy('id', $this->entityId);
      $variables['pageObj'] = $pageObj;

      $template = new Template('default');
      $template->view('contact-us-contacted', $variables);
      return false;
    }
    return true;
  }
  function indexAction()
  {
    $dbh = DatabaseConnection::getInstance();
    $dbc = $dbh->getConnection();

    $pageObj = new Page($dbc);
    $pageObj->findBy('id', $this->entityId);
    $variables['pageObj'] = $pageObj;

    $template = new Template('default');
    $template->view('contact-us', $variables);
  }
  function submitAction()
  {
    //store data
    //send email
    $_SESSION['has_submitted_the_form'] = 1;

    $dbh = DatabaseConnection::getInstance();
    $dbc = $dbh->getConnection();

    $pageObj = new Page($dbc);
    $pageObj->findBy('id', $this->entityId);

    $variables['pageObj'] = $pageObj;

    $template = new Template('default');
    $template->view('contact-us-thank-you', $variables);
  }
}
