<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?

//$file = $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/.default/components/bitrix/catalog/new_design/areal/catalog.element/.default/test.txt";
//file_put_contents($file, print_r($arResult, true));
  $file = $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/.default/components/bitrix/catalog/used_items/bitrix/catalog.element/.default/test.txt";
file_put_contents($file, print_r("zzzzzzzzzzz", true));
  if(CModule::IncludeModule("alexkova.megametatags")){
  $file = $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/.default/components/bitrix/catalog/used_items/bitrix/catalog.element/.default/test.txt";
file_put_contents($file, print_r("asd", true));
    $arKeys = array();
	
	if (strlen($arResult["PREVIEW_TEXT"])>180)
				  {
						$cleared = strip_tags($arResult["PREVIEW_TEXT"]);
						$detail_text = substr($cleared, 0,strpos ($cleared, " ", 180)); // удалили лишнее
						$detail_text = substr($detail_text, 0, strrpos($detail_text, " ")); // удалили лишнее слово
						$detail_text=preg_replace('/\s+/',' ',$detail_text);
				  }  
      $arKeys[] = array("KEY"=>"ELEMENT_DETAIL_TEXT","VALUE"=>$detail_text,"WHERE_SET"=>"");   
   if ($arKeys){
      CMegaMetaKeys::setKeys($arKeys);      
   } 
}  

?>