<?php

abstract class Entity
{
  protected $tableName;
  protected $fields;
  protected $dbc;

  abstract protected function initFields();

  protected function __construct($dbc, $tableName)
  {
    $this->dbc       = $dbc;
    $this->tableName = $tableName;
    $this->initFields();
  }

  public function findBy($fieldName, $fieldValue)
  {


    $sql = "SELECT * FROM " . $this->tableName . " WHERE " . $fieldName . "=:value";
    $stmt = $this->dbc->prepare($sql);
    $stmt->execute(['value' => $fieldValue]);
    $dbPageData = $stmt->fetch();

    $this->setValues($dbPageData);
  }

  public function setValues($values)
  {
    foreach ($this->fields as $fieldName) {
      $this->$fieldName = $values[$fieldName];
    }
  }
}
