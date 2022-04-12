<?php

/**
 * @autores Alf
 * @copyright 2021
 * @ver 1.0
 */

namespace classes\authentication;
use classes\db\Database;
use classes\db\LayerDB;
//require __DIR__ . '/../config.php';
//require __DIR__ . '/../bootstrap.php';

ini_set("error_reporting", E_ALL);

//include_once $_SERVER['DOCUMENT_ROOT'] . "/forum/config.php";
//include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/ClassDatabase.php";


class Users extends LayerDB{
 
  public $instrucaoSQL = array ("loginGoogle"=>'SELECT `email`, `usertype`, `usertype` as tipo, name as nome, name,`username`, id  FROM `jos_users` WHERE `email`=:email and block=0',
                                "numberUserAtivos" => 'SELECT count(`id`) as numero FROM `jos_users` where `block`=0',
                                "numberUserAtivosPorTipo" => 'SELECT jos_usersType.tipo, usertype,  count(`id`) as numero 
                                                              FROM `jos_users` 
                                                              inner join jos_usersType on jos_users.usertype=jos_usersType.tipoUser 
                                                              where `block`=0 GROUP by usertype',
                                "numberAdmin" => 'SELECT count(`id`) as numero FROM `jos_users` where `block`=0 and usertype=200',
                                "listOfUsers" => 'SELECT `id`, `name` FROM `jos_users` WHERE `block`=0 order by `name`'
                                );
  
   
 
  

 public function doAction($accao, $parameters=""){
 
   //echo "<br><br>aqui $accao ffff  "; 
     //print_r($parameters);
  
    switch ($accao){

      case "updUsers":
            $this->execQuery($accao, $parameters);
            break;
      case "loginGoogle":
            $this->getQuery($accao, $parameters);
            break;
      default:
          $this->autoQuery($accao, $parameters);
          break;
    }

  }
 
 
}

?>
