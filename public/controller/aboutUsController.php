<?php

class AboutController extends Controller
{
  function indexAction()
  {
    $dbh = DatabaseConnection::getInstance();
    $dbc = $dbh->getConnection();

    $pageObj = new Page($dbc);
    $pageObj->findById(2);
    $variables['pageObj'] = $pageObj;

    $template = new Template('default');
    $template->view('static-page', $variables);
  }
}
