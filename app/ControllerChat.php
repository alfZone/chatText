<?php
namespace app;
//@session_start();
//use classes\Database;
use classes\chat\ChatText;
use classes\authentication\Authentication;




/**
 * @autores alf
 * @copyright 2022
 * @ver 2.0
 */


//require __DIR__ . '/../config.php';
//require __DIR__ . '/../bootstrap.php';


class ControllerChat{

  public function newsMsg(){
  // Finds out how many messages have not yet been read (noRead=1).  
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
  // Mark a message with id as noRead=0 (indicate the you read a message)
  
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
  //Add a new message.
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
  //Show all messages sent or received by a user. The considered user is the one who is logged into the system  
    $aut=new Authentication();
    if ($aut->isLoged()){
      $p['idS']=$aut->getIdUser();
      //echo $aut->getIdUser();
      $art=new ChatText("ListaMensagensTrocadas",$p);
      
      echo $art->webService();
    }else{
      
     echo header('Location: /404.shtml');
    }
    
  }
  
  
  public function LastMessageToRead(){
  //Show the last message to read. The considered user is the one who is logged into the system  
    $aut=new Authentication();
    if ($aut->isLoged()){
      $p['idS']=$aut->getIdUser();
      //echo $aut->getIdUser();
      $art=new ChatText("LastMessageToRead",$p);
      
      echo $art->webService();
    }else{
      
     echo header('Location: /404.shtml');; 
    }
    
  }
 
}

?>
