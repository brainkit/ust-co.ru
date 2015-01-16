<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

global $APPLICATION;
global $USER;

if (!function_exists("GetTreeRecursive")) {
//каталог
    $arMenuLinks = $APPLICATION->IncludeComponent(
            "bitrix:menu.sections", "", Array(
        "ID" => $_REQUEST["ID"],
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => CATALOG,
        "SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
        "DEPTH_LEVEL" => "4",
        "CACHE_TYPE" => "Y",
        "CACHE_TIME" => "36000000",
        "TOP_MENU" => "Y"
            )
    );
    // запчасти - главный пункт
    $arMenuLinks05[0][0] = "Запчасти";
    $arMenuLinks05[0][1] = "/catalog/zapchasti/";
    $arMenuLinks05[0][2][0] = "/catalog/zapchasti/";
    $arMenuLinks05[0][3]["FROM_IBLOCK"] = 1;
    $arMenuLinks05[0][3]["IS_PARENT"] = 1;
    $arMenuLinks05[0][3]["DEPTH_LEVEL"] = 1; /**/

  $arMenuLinks06 = $APPLICATION->IncludeComponent(
        "bitrix:menu.sections", "", Array(
        "ID" => $_REQUEST["ID"],
        "IBLOCK_TYPE" => "zapchasti",
        "IBLOCK_ID" => "158",
        "SECTION_URL" => "#SITE_DIR#/catalog/zapchasti/#SECTION_CODE_PATH#/",
        "DEPTH_LEVEL" => "4",
        "CACHE_TYPE" => "Y",
        "CACHE_TIME" => "36000000",
        "TOP_MENU" => "Y"
            )
    );

  
    if ($USER->IsAdmin()) {
       // $aMenuLinks = array_merge($arMenuLinks, $arMenuLinks05);
        $aMenuLinks = array_merge($arMenuLinks, $arMenuLinks06); 
        
    }


  

//бу строительная-главный пункт меню
    $arMenuLinks01[0][0] = "Б/У строительная техника";
    $arMenuLinks01[0][1] = "/catalog/bu-stroitelnaya-tehnika/";
    $arMenuLinks01[0][2][0] = "/catalog/bu-stroitelnaya-tehnika/";
    $arMenuLinks01[0][3]["FROM_IBLOCK"] = 1;
    $arMenuLinks01[0][3]["IS_PARENT"] = 1;
    $arMenuLinks01[0][3]["DEPTH_LEVEL"] = 1;

    /*
      $arMenuLinks01[1][0] = "Б/У Лесозаготовительная техника";
      $arMenuLinks01[1][1] = "/catalog/bu-stroitelnaya-tehnika/";
      //$arMenuLinks01[1][2][0] = "/catalog/bu-stroitelnaya-tehnika/";
      $arMenuLinks01[1][3]["FROM_IBLOCK"]=1;
      $arMenuLinks01[1][3]["IS_PARENT"]=1;
      $arMenuLinks01[1][3]["DEPTH_LEVEL"]=1; */


//бу строительная-вложенные пункты
    $arMenuLinks02 = $APPLICATION->IncludeComponent(
            "bitrix:menu.sections", "", Array(
        "ID" => $_REQUEST["ID"],
        "IBLOCK_TYPE" => "used",
        "IBLOCK_ID" => "7",
        "SECTION_URL" => "#SITE_DIR#/catalog/bu-stroitelnaya-tehnika/#SECTION_CODE#/",
        "DEPTH_LEVEL" => "4",
        "CACHE_TYPE" => "Y",
        "CACHE_TIME" => "36000000",
        "TOP_MENU" => "Y"
            )
    );


//меняем глубину вложенных пунктов
    $i = 0;
    while ($i < count($arMenuLinks02)) {
        $arMenuLinks02[$i][3]["FROM_IBLOCK"] = 1;
        $arMenuLinks02[$i][3]["IS_PARENT"] = '';
        $arMenuLinks02[$i][3]["DEPTH_LEVEL"] = 2;
        $i++;
    }
//добавляем бу строительную к меню каталога
    if ($USER->IsAdmin()) {
        $aMenuLinks = array_merge($aMenuLinks, $arMenuLinks01);
    } else {
        $aMenuLinks = array_merge($arMenuLinks, $arMenuLinks01);
    }
    $aMenuLinks = array_merge($aMenuLinks, $arMenuLinks02);

//бу складская-главный пункт меню
    $arMenuLinks03[0][0] = "Б/У складская техника";
    $arMenuLinks03[0][1] = "/catalog/bu-skladskaya-tehnika/";
    $arMenuLinks03[0][2][0] = "/catalog/bu-skladskaya-tehnika/";
    $arMenuLinks03[0][3]["FROM_IBLOCK"] = 1;
    $arMenuLinks03[0][3]["IS_PARENT"] = 1;
    $arMenuLinks03[0][3]["DEPTH_LEVEL"] = 1;

//бу складская-вложенные пункты
    $arMenuLinks04 = $APPLICATION->IncludeComponent(
            "bitrix:menu.sections", "", Array(
        "ID" => $_REQUEST["ID"],
        "IBLOCK_TYPE" => "used",
        "IBLOCK_ID" => "54",
        "SECTION_URL" => "#SITE_DIR#/catalog/bu-skladskaya-tehnika/#SECTION_CODE#/",
        "DEPTH_LEVEL" => "4",
        "CACHE_TYPE" => "Y",
        "CACHE_TIME" => "36000000",
        "TOP_MENU" => "Y"
            )
    );
//меняем глубину вложенных пунктов
    $i = 0;
//количество элементов массива
    $kolvo = count($arMenuLinks04);
//ставим флаг по строительной технике
    $flag = 'start';
//запускаем цикл
    while ($i < $kolvo) {
        $arMenuLinks04[$i][3]["FROM_IBLOCK"] = 1;
        $arMenuLinks04[$i][3]["IS_PARENT"] = '';
        $arMenuLinks04[$i][3]["DEPTH_LEVEL"] = 2;
        $i++;
        if ($flag == 'stop') {
            $i--;
            $kolvo--;
            $k = $i;
        }
        if ($arMenuLinks04[$i - 1][1] == "/catalog/bu-skladskaya-tehnika/bu-skladskaya-tehnika/") {
            unset($arMenuLinks04[$i - 1]);
            $i--;
            $kolvo--;
        }
        if ($arMenuLinks04[$i - 1][1] == "/catalog/bu-skladskaya-tehnika/bu_stroitelnaya_tekhnika/") {
            $flag = 'stop';
            unset($arMenuLinks04[$i - 1]);
            $i--;
            $kolvo--;
        }
    }

//удаляем лишние элементы
    $kolvo = count($arMenuLinks04);
    while ($k < $kolvo) {
        unset($arMenuLinks04[$k]);
        $k++;
    }


//добавляем бу складскую к меню каталога


    $aMenuLinks = array_merge($aMenuLinks, $arMenuLinks03);

    $aMenuLinks = array_merge($aMenuLinks, $arMenuLinks04);


    //pr($aMenuLinks);
}
?>