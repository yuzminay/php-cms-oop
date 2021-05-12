<?php

final class DatabaseConnection
{
  private static $instance    = null;
  private static $connection  = 0;

  public static function getInstance()
  {
    if (is_null(self::$instance)) {
      self::$instance = new DatabaseConnection();
    }

    return self::$instance;
  }

  private function __construct()
  {
  }

  private function __clone()
  {
  }

  private function __wakeup()
  {
  }

  public static function connect($host, $db_name, $user, $password)
  {
    self::$connection = new PDO("mysql:dbname=$db_name;host=$host", $user, $password);
  }

  public static function getConnection()
  {
    return self::$connection;
  }
}
