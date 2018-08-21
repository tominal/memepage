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
      `email` varchar(50) not null unique,
      `scope` int(1) not null default 0,
      `la` int(11)
    );");
  }

  public function getPdo(){
    return new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
  }

  public function query($sql){
    $results = null;
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      $results = $pdo->query($sql)->fetchAll();
      $pdo = null;
    } catch(PDOException $e){
      print "Error: ".$e->getMessage();
      exit;
    }
    return $results;
  }

  public function select($cols, $table, $where){
    $results = null;
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      if(count($where)>0 && $w = key($where)){
        $sql = 'SELECT '.(is_array($cols)?impCols($cols):$cols).' FROM `'.$table.'` WHERE '.$w.' = :where';
        $sel = $pdo->prepare($sql);
        $sel->bindParam(':where', $where[$w]);
        $sel->execute();
        $results = $sel->fetch(PDO::FETCH_ASSOC);
      } else {
        $sql = 'SELECT '.(is_array($cols)?impCols($cols):$cols).' FROM '.$table;
        $results = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
      }
    } catch(PDOException $e){
      print "Error: ".$e->getMessage();
      exit;
    }
    return $results;
  }

  public function insert($table, $cols, $vals){
    $status = false;
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      $insert = $pdo->prepare('INSERT INTO `'.$table.'` ('.impCols($cols).') VALUES ('.qs($vals).')');
      $insert->execute($vals);
      $status = true;
      $pdo = null;
    } catch(PDOException $e){
      print "Error: ".$e->getMessage();
      exit;
    }
    return $status;
  }

  public function update($table, $set, $where, $vals){
    $status = false;
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      $upd = $pdo->prepare('UPDATE `'.$table.'` SET '.umpCols($set).' WHERE '.umpCols($where));
      $upd->execute($vals);
      $status = true;
      $pdo = null;
    } catch (PDOException $e){
      print "Error: ".$e->getMessage();
      exit;
    }
    return $status;
  }
}

$conn = new conn();
