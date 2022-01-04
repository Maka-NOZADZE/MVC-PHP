<?php
abstract class Controller{
  public function LoadModel(string $model){
    require_once(ROOT.'models/'.$model.'.php');
    $this->$model = new $model();
  }

  public function render ( string $fichier, array $data=[]){
    extract($data);
   

    //on demarre le buffer
    ob_start();

    require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');
    $content =ob_get_clean();

    require_once(ROOT.'views/layouts/default.php');
  }
}