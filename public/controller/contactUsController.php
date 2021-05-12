<?php

class ContactController extends Controller
{
  function runBeforeAction()
  {
    if ($_SESSION['has_submitted_the_form'] ?? 0 == 1) {
      $variables['title']   = 'Contact Page Title';
      $variables['content'] = 'Contact Page Content';

      $template = new Template('default');
      $template->view('contact/contact-us-contacted', $variables);
      return false;
    }
    return true;
  }
  function indexAction()
  {

    $variables['title']   = 'Contact Page Title';
    $variables['content'] = 'Contact Page Content';

    $template = new Template('default');
    $template->view('contact/contact-us', $variables);
  }
  function submitAction()
  {
    //store data
    //send email
    $_SESSION['has_submitted_the_form'] = 1;
    $variables['title']   = 'Contact Page Title';
    $variables['content'] = 'Contact Page Content';

    $template = new Template('default');
    $template->view('contact/contact-us-thank-you', $variables);
  }
}
