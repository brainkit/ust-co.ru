<?php
//__($arResult);
$items = GetIBlockElementList(BRANDES); 
while($arItem = $items->GetNext())
{
    $arr_brandes[$arItem["ID"]]=$arItem["NAME"];
}

$code = "BRAND";
$dbRes = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $arParams["IBLOCK_ID"],"IBLOCK_SECTION_ID"=>$arParams["SECTION_ID"],"!PROPERTY_" . $code => false), array("PROPERTY_" . $code));
 
while ($prop_field = $dbRes->GetNext()) {
    
    if($arr_brandes[$prop_field["PROPERTY_BRAND_VALUE"]])$arr_brands_zapchacti[$prop_field["PROPERTY_BRAND_VALUE"]] = $arr_brandes[$prop_field["PROPERTY_BRAND_VALUE"]];

}
