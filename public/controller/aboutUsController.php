<?php

class AboutController extends Controller
{
  function indexAction()
  {
    $variables['title']   = 'About Page Title';
    $variables['content'] = 'About Page Content';

    $template = new Template('default');
    $template->view('static-page', $variables);
  }
}
