<?php

class PageController extends Controller
{
  function indexAction()
  {
    $dbh = DatabaseConnection::getInstance();
    $dbc = $dbh->getConnection();

    $pageObj = new Page($dbc);
    $pageObj->findBy('id', $this->entityId);
    $variables['pageObj'] = $pageObj;

    $template = new Template('default');
    $template->view('static-page', $variables);
  }
}
