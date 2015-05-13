<? 
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<?
	$file = $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/.default/components/bitrix/catalog/new_design/test.txt";

		//file_put_contents($file, print_r($_POST, true));
		
 CEvent::SendImmediate(
         "WEB_FORM",
         array("s1", "s2"),
         array(
           "NAME"=>$_POST["name"],
           "EMAIL"=>$_POST["email"],
           "TELEPHONE"=>$_POST["telephone"],
           "REGION"=>$_POST["region"],
           "NUMBER"=>$_POST["number"],
         ),
         "N",
         "84"
       );

?>