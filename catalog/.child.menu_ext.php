<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

global $APPLICATION;

if (!function_exists("GetTreeRecursive"))
{
    
// PRINT  $_REQUEST["ID"];
    $arMenuLinks = $APPLICATION->IncludeComponent(
            "bitrix:menu.sections", "", Array(
            "ID" => $_REQUEST["ID"],
            "IBLOCK_TYPE" => "catalog",
            "IBLOCK_ID" => CATALOG,
            "SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
            "DEPTH_LEVEL" => "2",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "TOP_MENU" => "Y",
            "CHILD_MENU_TYPE" => "child",
            )
    );
    
     // запчасти - главный пункт
    /* $arMenuLinks06 = $APPLICATION->IncludeComponent(
        "bitrix:menu.sections", "", Array(
        "ID" => $_REQUEST["ID"],
        "IBLOCK_TYPE" => "zapchasti",
        "IBLOCK_ID" => "158",
        "SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE_PATH#/",
        "DEPTH_LEVEL" => "4",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "TOP_MENU" => "Y"
            )
    );

  
    //if ($USER->IsAdmin()) {
      
        $arMenuLinks = array_merge($arMenuLinks, $arMenuLinks06);*/ 

    $aMenuLinks = array_merge($arMenuLinks, array(
         Array(
            "Запчасти",
            "/catalog/zapchasti/",
            Array(),
            Array("DOMENID" => array("22220")),
            ""
        ),
        Array(
            "Б/У строительная техника",
            "/catalog/bu-stroitelnaya-tehnika/",
            Array(),
            Array("DOMENID" => array("22220")),
            ""
        ),
        Array(
            "Б/У складская техника",
            "/catalog/bu-skladskaya-tehnika/",
            Array(),
            Array("DOMENID" => array("22224")),
            ""
        ),
        Array(
            "Б/У лесозаготовительная техника",
            "/catalog/bu-lesozagotovitelnaya-tekhnika/",
            Array(),
            Array("DOMENID" => array("22224")),
            ""
        )
    ));
//if ($USER->IsAdmin()){print_r($aMenuLinks);}  

    // print "<pre style='display:none'>";
    // print_R($arMenuLinks);
    //  print "</pre>";
}
?>