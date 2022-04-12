<?php
namespace app;
@session_start();
use classes\authentication\Authentication;
use classes\authentication\Users;



/**
 * @autores alf
 * @copyright 2020
 * @ver 1.0
 */


//require __DIR__ . '/../config.php';
//require __DIR__ . '/../bootstrap.php';


class ControllerUser{

  public function listOfUsers(){

   $pedidos=new Users("listOfUsers"); 
	 echo $pedidos->webService();

	}
  
 //.......
  
  public function getAutentication(){
    $aut=new Authentication();
    $aut->getAuthentication();
    echo $aut->webService();
 	}
  
  public function logout(){
    $aut=new Authentication();
    $aut->logout();
    
 	}
  
}


//$cl=new ControllerMember();
//$cl->index();message
//echo "ole";
?>
