<?php
  class DB
  {
    private $pdo;
    public function Pdo()
    {
      return $this->pdo;
    }
    public function __construct()
    {
      $dbHost='localhost';
      $dbName='empresa1';
      $dbUser='root';
      $dbPass='';
      try {
      $this->pdo=new \PDO("mysql:host=$dbHost; dbname=$dbName; charset=utf8", $dbUser, $dbPass);
      $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
    }
  }
?>
