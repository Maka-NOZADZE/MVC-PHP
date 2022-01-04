<?php

abstract class Model {
  // informations de base de donnees

  private $host ="localhost";
  private $bd_name = "mvc";
  private $username ="root";
  private $password = "";

  // propriete contenant la connextion

  protected $_connexion;

  //proprietés contenant les informations de requetes

  public $table;
  public $id;

  // funcion qui nous permet de se connecter

  public function getConnection(){
    $this->_connexion = null;

    try {
      $this->_connexion = new PDO('mysql:host='.$this ->host.';
      bdname='. $this->bd_name, $this->username, $this->password);
      $this->connextion->exec('set names utf8');
    }catch(PDOException $exception){
      echo 'erreur :'.$exception->getMessage();
    }
  }
  // on creer requete pour acceder a la liste des articles
    public function getAll(){
      $sql = "SELECT * FROM ". $this->table;
      $query = $this->_connexion->prepare($sql);
      $query->execute();
      return $query->fetchAll();

}
public function getOne(){
 $sql = "SELECT * FROM ". $this->table ."WHERE id=" .$this->id;
      $query = $this->_connexion->prepare($sql);
      $query->execute();
      return $query->fetch();

}

}