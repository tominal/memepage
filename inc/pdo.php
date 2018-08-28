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
    ); CREATE TABLE IF NOT EXISTS `images` (
      `id` int(11) auto_increment primary key not null,
      `name` varchar(50) not null,
      `type` varchar(50) not null,
      `link` varchar(255) not null,
      `tags` json,
      `ratings` json
    ); CREATE TABLE IF NOT EXISTS `tags` (
      `id` int(11) auto_increment primary key not null,
      `name` varchar(32) not null,
      `desc` varchar(32)
    );");/* CREATE TABLE IF NOT EXISTS `memepage_settings` (
	  `tables_written` tinyint(1) primary key not null,
	  `auto_sfw` tinyint(1) not null,
	  `auto_copy` tinyint(1) not null,
	);"); INSERT INTO `memepage_settings` (tables_written, auto_sfw, auto_copy) VALUES (1,0,1);*/
  }

  public function getPdo(){
    return new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
  }

  public function query($sql){
    $results = null;
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      $query = $pdo->query($sql);
      $results = $query ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
      $pdo = null;
    } catch(PDOException $e){
      print "Error: ".$e->getMessage();
      exit;
    }
    return $results;
  }

  public function select($cols, $table, $where = []){
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
        $results = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      }
    } catch(PDOException $e){
      print "Error: ".$e->getMessage();
      exit;
    }
    return $results;
  }

  public function raw($sql, $vals = []){
    $results = null;
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      if(count($vals) > 0){
        $raw = $pdo->prepare($sql);
        $results = $raw->execute($vals)->fetchAll(PDO::FETCH_ASSOC);
      } else
        $results = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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
