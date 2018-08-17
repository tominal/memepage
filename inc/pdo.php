<?php


class conn {

  private $host;
  private $db;
  private $user;
  private $pass;

  public function __construct(){
    require_once(__DIR__.'/config.php');

    $this->host = $host;
    $this->db = $db;
    $this->user = $user;
    $this->pass = $pass;

    // this is called every time :l i don't care.
    $this->query("CREATE TABLE IF NOT EXISTS `users` (
      `id` int(11) auto_increment primary key not null,
      `name` varchar(50) not null,
      `email` varchar(50) not null,
      `scope` int(1) not null default 0
    );");
  }

  public function query($sql){
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      return $pdo->query($sql);
    } catch(PDOException $e){
      print "Error: ".$e->getMessage();
      die();
    }
  }
}

$conn = new conn();
