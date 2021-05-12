<?php

class HomeController extends Controller
{
  function indexAction()
  {
    $variables['title']   = 'Home Page Title';
    $variables['content'] = 'Home Page Content';

    $template = new Template('default');
    $template->view('static-page', $variables);
  }
}
