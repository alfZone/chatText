<?php
namespace app;
//@session_start();
//use classes\Database;
use classes\chat\ChatText;
use classes\authentication\Authentication;




/**
 * @autores alf
 * @copyright 2020
 * @ver 1.0
 */


//require __DIR__ . '/../config.php';
//require __DIR__ . '/../bootstrap.php';


class ControllerChat{

  public function newsMsg(){
    
    $aut=new Authentication();
    if ($aut->isLoged()){
      $p['id']=$aut->getIdUser();
      //echo $aut->getIdUser();
      $art=new ChatText("newsMsg",$p);
      echo $art->webService();
    }else{
      
     echo header('Location: /404.shtml');; 
    }
    
  }
  
  public function read($id){
    
    $aut=new Authentication();
    if ($aut->isLoged()){
      $p['id']=$id;
      //echo $aut->getIdUser();
      $art=new ChatText("read",$p);
      echo $art->webService();
    }else{
      
     echo header('Location: /404.shtml');; 
    }
    
  }
  
  public function addMsg(){
    
    $aut=new Authentication();
    if ($aut->isLoged()){
      $p['idS']=$aut->getIdUser();
      $p['idD']=$_POST['idD'];
      $p['msg']=$_POST['msg'];
      //echo $aut->getIdUser();
      $art=new ChatText("addMsg",$p);
      echo $art->webService();
    }else{
      
     echo header('Location: /404.shtml');; 
    }
    
  }
  
  public function ListaMensagensTrocadas(){
    
    $aut=new Authentication();
    if ($aut->isLoged()){
      $p['idS']=$aut->getIdUser();
      //echo $aut->getIdUser();
      $art=new ChatText("ListaMensagensTrocadas",$p);
      
      echo $art->webService();
    }else{
      
     echo header('Location: /404.shtml');; 
    }
    
  }
  
 
}


//$cl=new ControllerMember();
//$cl->index();message
//echo "ole";
?>
