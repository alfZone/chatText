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

$tabela= new TableBD();
$tabela->setTemplate(_CAMINHO_TEMPLATE_ADMIN . "tables.html");
$tabela->setTitulo("Todas Mensagens");
$tabela->preparaTabela("chatText");
$tabela->setAtivaCampos("id, idSender, idDestination,msg", 'ver');

//$tabela->setCampoPass("password",0, "md5");
$tabela->setAtivaCampos("idSender, idDestination,msg, noRead", 'novo');
$tabela->setAtivaCampos("idSender, idDestination,msg, noRead", 'editar');
$tabela->setCampoLista("idSender",1,"SELECT `id`,`name` FROM `jos_users` order by `name`");
$tabela->setCampoLista("idDestination",1,"SELECT `id`,`name` FROM `jos_users` order by `name`");

//$tabela->setCampoLista("block",2,"1=>inativo,0=>ativo");
//$tabela->setPaginaVer("/public/artigo/ver/");
$tabela->setLabel('idSender',"Remetente");
$tabela->setLabel('idDestination',"Destinatário");
$tabela->setLabel('msg',"Mensagem");

//$tabela->setDefaultValue('created_by',$userId);
//$tabela->setDefaultValue('ordering',"1");
//$tabela->setDefaultValue("created_by", "$userId");
//$tabela->setJSAction('sectionid','onClick="FilterItems(this.value);"');
//$tabela->setCriterio('publish_up>"2019-01-01"');
//$tabela->preparaSQLparaAccao('novo');
//$tabela->fazlista();
//$tabela->includes(); 
//$tabela->formulario();
$tabela->fazHTML();

//}
?>
