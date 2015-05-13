<?php
//изменяем логику фильтра
global $arrFilter;

//__($arrFilter);
$change_filter = array(
    array(
        "LOGIC" => "OR",
        array("?NAME" => $arrFilter["?NAME"]),
        array("?PROPERTY_UNIQUENUM" => $arrFilter["PROPERTY"]["?UNIQUENUM"])
    )
);/**/


unset($arrFilter["?NAME"]);
unset($arrFilter["PROPERTY"]["?UNIQUENUM"]);
//unset($arrFilter["PROPERTY"]);

$arrFilter = array_merge($change_filter, $arrFilter);



// получаем бренды для фильтра
$items = CIBlockElement::GetList(array("NAME"=>"ASC"), array("IBLOCK_ID" => BRANDES,"ACTIVE"=>""));
while ($arItem = $items->GetNext()) {
    $arr_brandes[$arItem["ID"]] = $arItem["NAME"];
}

$code = "BRAND";
$dbRes = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "SECTION_ID" => $arParams["SECTION_ID"], "INCLUDE_SUBSECTIONS" => "Y", "!PROPERTY_" . $code => false), array("PROPERTY_" . $code));
while ($prop_field = $dbRes->GetNext()) {
    if ($arr_brandes[$prop_field["PROPERTY_BRAND_VALUE"]])
        $arr_brands_zapchacti[$prop_field["PROPERTY_BRAND_VALUE"]] = $arr_brandes[$prop_field["PROPERTY_BRAND_VALUE"]];
}
// сортировка
asort($arr_brands_zapchacti);
$arResult["BRANDES"] =$arr_brands_zapchacti;


//
$filter_iblock_sections=array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "SECTION_ID" => $arParams["SECTION_ID"], "INCLUDE_SUBSECTIONS" => "Y");
$filter_items= array_merge($filter_iblock_sections, $arrFilter, array("ACTIVE"=>"Y"));
$count = CIBlockElement::GetList(false, $filter_items, array()); 


$arResult["COUNT_ITEMS"] =$count;

