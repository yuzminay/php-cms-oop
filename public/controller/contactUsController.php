<?php

class ContactController extends Controller
{
  function runBeforeAction()
  {
    if ($_SESSION['has_submitted_the_form'] ?? 0 == 1) {
      echo 's';
      include_once 'view/contact/contact-us-contacted.php';
      return false;
    }
    return true;
  }
  function indexAction()
  {
    include_once 'view/contact/contact-us.php';
  }
  function submitAction()
  {
    //store data
    //send email
    $_SESSION['has_submitted_the_form'] = 1;
    include_once 'view/contact/contact-us-thank-you.php';
  }
}
