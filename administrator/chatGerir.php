<?php
//@session_start();

ini_set("error_reporting", E_ALL);

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../bootstrap.php';
use classes\authentication\Authentication;
use classes\db\Database;
use classes\db\TableBD;

$aut= new Authentication();
$userId=$aut->getIdUser();

//$outro["url"]="/erro401.php";
//$outro["nivel"]=10;
//$aut= new ClassAutentica("nar", $outro);
//$userId=$aut->getIdUser();
//$userId=$aut->getIdUser();
//echo "<br><br>ola:" . $userId;
//if (!(($userId==NULL) || ($userId=""))){

?>


<?php

  //echo "aqui";
  
  
  //		$sql="SELECT `jos_content`.`title`, `jos_sections`.`title`, `jos_categories`.`title`, `jos_content`.`created`, `jos_users`.`name`, `jos_content`.`id`, `jos_content`.`ordering` ";
	//						$sql=$sql . ",`jos_content`.`created`, `jos_content`.`created_by` ";
	//						$sql=$sql . "FROM `jos_users` INNER JOIN (`jos_categories` INNER JOIN (`jos_content` INNER JOIN `jos_sections` ON `jos_content`.`sectionid` = `jos_sections`.`id`) ";
	//						$sql=$sql . "ON `jos_content`.`catid` = `jos_categories`.`id`)ON `jos_content`.`created_by` = `jos_users`.`id` ORDER BY `jos_content`.`id`  ; ";

  //"SELECT id, `title` FROM `jos_sections` ORDER BY `title`";

$table= new TableBD();
$table->setTemplate(_CAMINHO_TEMPLATE_ADMIN . "tables.html");
$table->setTitle("Todas Mensagens");
$table->preparaTabela("chatText");
$table->setFieldsAtive("id, idSender, idDestination,msg", 'ver');

//$table->setFieldPass("password",0, "md5");
$table->setFieldsAtive("idSender, idDestination,msg, noRead", 'novo');
$table->setFieldsAtive("idSender, idDestination,msg, noRead", 'editar');
$table->setFieldList("idSender",1,"SELECT `id`,`name` FROM `jos_users` order by `name`");
$table->setFieldList("idDestination",1,"SELECT `id`,`name` FROM `jos_users` order by `name`");
$table->setFieldList("noRead",2,"0=>Already read, 1=>For Read");

//$table->setLinkPage("/public/artigo/ver/");
$table->setLabel('idSender',"Remetente");
$table->setLabel('idDestination',"Destinatário");
$table->setLabel('msg',"Mensagem");

//$table->setDefaultValue('created_by',$userId);
//$table->setDefaultValue('ordering',"1");
//$table->setDefaultValue("created_by", "$userId");
//$table->setJSAction('sectionid','onClick="FilterItems(this.value);"');
//$table->setCriterio('publish_up>"2019-01-01"');
//$table->preparaSQLparaAccao('novo');

$table->fazHTML();

//}
?>
