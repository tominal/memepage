<?php


class conn {

  private $host;
  private $db;
  private $user;
  private $pass;

  public function __construct(){
    require(__DIR__.'/config.php');

    $this->host = $host;
    $this->db = $db;
    $this->user = $user;
    $this->pass = $pass;

    // this is called every time :l i don't care.
    $this->query("CREATE TABLE IF NOT EXISTS `users` (
      `id` int(11) auto_increment primary key not null,
      `name` varchar(50) not null,
      `avi` varchar(255),
      `email` varchar(50) not null,
      `scope` int(1) not null default 0
    );");
  }

  public function query($sql){
    $results = null;
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      $results = $pdo->query($sql)->fetchAll();
      $pdo = null;
    } catch(PDOException $e){
      print "Error: ".$e->getMessage();
      die();
    }
    return $results;
  }

  public function insert($table, $cols, $vals){
    $results = null;
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      var_dump(impCols($cols)." Qs: ".qs($vals));die();
      $insert = $pdo->prepare('INSERT INTO `$table` ('.impCols($cols).') VALUES ('.qs($vals).')');
      $insert->exec($vals);
      $results = $insert->fetch(PDO::FETCH_ASSOC);
      $pdo = null;
    } catch(PDOException $e){
      print "Error: ".$e->getMessage();
      die();
    }
    return $results;
  }
}

$conn = new conn();
