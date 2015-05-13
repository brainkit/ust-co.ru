<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<?
CModule::IncludeModule("iblock");
$file = $_SERVER['DOCUMENT_ROOT'] . "/bitrix/templates/.default/components/bitrix/catalog/new_design/test_t.txt";
//file_put_contents($file, print_r($_POST, true)); 

if ($_POST["obshivka"] == "Y")
{
    $obshivka_id = intval($_POST["obshivka_id"]);
}
else
{
    $obshivka_id = intval($_POST["obshivka_id"]);
    $obshivka_id++;
}
if ($_POST["obogrev"] == "Y")
{
    $obogrev_id = intval($_POST["obogrev_id"]);
}
else
{
    $obogrev_id = intval($_POST["obogrev_id"]);
    $obogrev_id++;
}
if ($_POST["generator"] == "Y")
{
    $generator_id = intval($_POST["generator_id"]);
}
else
{
    $generator_id = intval($_POST["generator_id"]);
    $generator_id++;
}

/*  file_put_contents($file, print_r($obshivka_id, true), FILE_APPEND);
  file_put_contents($file, print_r($obogrev_id, true), FILE_APPEND);
  file_put_contents($file, print_r($generator_id, true), FILE_APPEND); */
$nameElem = array();
$arSelect = Array("NAME", "IBLOCK_ID", "ID");
$arFilter = Array("IBLOCK_ID" => 155, 
    //"PROPERTY_APPOINT" => $_POST["naznachenie_id"], 
    "PROPERTY_PROD" => $_POST["proizvod_id"],
    //"PROPERTY_BULK" => $_POST["sumarob_id"], "PROPERTY_CHEM_ADD" => $_POST["himdob_id"],
   // "PROPERTY_SKIN" => $obshivka_id, "PROPERTY_WARM" => $obogrev_id,
   // "PROPERTY_DIESEL" => $generator_id
   );
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while ($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $nameElem[] = $arFields["NAME"];
    file_put_contents($file, print_r($nameElem, true), FILE_APPEND);
    /* file_put_contents($file, print_r($arFields, true), FILE_APPEND); */
}
if ($nameElem != "")
    echo json_encode($nameElem);
/*     $db_props = CIBlockElement::GetProperty(155, 124538, array("sort" => "asc"), Array());
  while ($ar_props = $db_props->Fetch())
  file_put_contents($file, print_r($ar_props, true), FILE_APPEND); */
?>