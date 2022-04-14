<?php 
namespace classes\chat;
use classes\db\LayerDB;

/**
 * @author alf
 * @copyright 2022
 * @version 2.0
 * @updated 2022/04/05 
 *
 */

/* system for sending messages between registered users on a website */
/*Requeriments:
    ---*/
/*Methods:
 
 */
//news: show last message for read.
/*
*Github
* https://github.com/alfZone/graphics
*/


// https://developers.google.com/chart/interactive/docs/gallery

//include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";




class ChatText extends LayerDB{
    
    public $instrucaoSQL = array("ListaMensagensTrocadas"=> "SELECT `idSender`, `idDestination`,`msg`, s.name as sender, s.foto as senderFoto, d.name as destination, d.foto as destinationFoto, 
                                                                  chatText.dateTime, :idS as idLog, noRead , chatText.id   
                                                                  FROM `chatText` INNER JOIN jos_users as s on s.id=chatText.idSender  
                                                                  inner join jos_users as d on d.id=chatText.idDestination 
                                                                  WHERE `idSender`=:idS or `idDestination`=:idS 
                                                                  ORDER BY chatText.dateTime DESC;",
                                 "LastMessageToRead"=> "SELECT `idSender`, `idDestination`,`msg`, s.name as sender, s.foto as senderFoto, d.name as destination, d.foto as destinationFoto, 
                                                                  chatText.dateTime, :idS as idLog, noRead , chatText.id   
                                                                  FROM `chatText` INNER JOIN jos_users as s on s.id=chatText.idSender  
                                                                  inner join jos_users as d on d.id=chatText.idDestination 
                                                                  WHERE `idDestination`=:idS and noRead=1 
                                                                  ORDER BY chatText.dateTime DESC;",
                                 "addMsg"=>"INSERT INTO `chatText`(`idSender`, `idDestination`, `msg`) VALUES (:idS,:idD,:msg)",
                                 "read" => "UPDATE `chatText` SET `noRead`=0 WHERE `id`=:id",
                                 "newsMsg" => "SELECT count(`id`) as news FROM `chatText` WHERE idDestination=:id and noRead=1"

                              );


    public function doAction($accao, $parameters=""){
      
      switch ($accao){
          case "ActionName":
                $this->execQuery($accao, $parameters);
                break;
          case "ActionName2":
                $this->getQuery($accao, $parameters);
                break;
          case "ActionName3":
          case "listUsAct":
                //Other functions
                break;  
          default:
              //echo "auto";
              $this->autoQuery($accao, $parameters);
              break;
        }
    }
  
}

?>
