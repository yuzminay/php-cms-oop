<?php

class Template
{
  private   $layout;
  protected $insideChildren;
  public    $accessFromEveryWhere;

  public function __construct($layout)
  {
    $this->layout = $layout;
  }
  function view($template, $variables)
  {
    extract($variables);

    include ROOT_PATH . 'view/layout/' . $this->layout . '.php';
  }
}
