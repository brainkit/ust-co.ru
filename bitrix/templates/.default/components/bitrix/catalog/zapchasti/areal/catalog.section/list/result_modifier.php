<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
if (!empty($arResult["ITEMS"])) {
    foreach ($arResult["ITEMS"] as $key => $arItem) {

        if (!empty($arItem["PROPERTIES"]["PHOTOS"]["VALUE"])) {
            $photo = $arItem["PROPERTIES"]["PHOTOS"]["VALUE"][0];

            $photos["NATURE"] = CFile::GetPath($photo);
            /* $photos["STANDART"] = CFile::ResizeImageGet(
              $photo, array("width" => 160, "height" => 120), BX_RESIZE_IMAGE_PROPORTIONAL, true
              ); */
            $photos["SMALL"] = CFile::ResizeImageGet(
                            $photo, array("width" => 66, "height" => 50), BX_RESIZE_IMAGE_PROPORTIONAL, true
            );
            $arResult["ITEMS"][$key]["PICTURE"] = $photos["SMALL"];
            // }
            //__( $photos["STANDART"]);
        }
        if (!empty($arItem["PROPERTIES"]["BRAND"]["VALUE"])) {
            $brands = CIBlockElement::GetList(array(), array("IBLOCK_ID" => BRANDES, "ID" => $arItem["PROPERTIES"]["BRAND"]["VALUE"]), false, false, array("ID", "NAME"));
            if ($brand = $brands->GetNext()) {
                $arResult["ITEMS"][$key]["BRAND"] = $brand["NAME"];
            }
        }

        $res = CIBlockElement::GetByID($arItem["ID"]);
        if ($ar_res = $res->GetNext())
            $arResult["ITEMS"][$key]["DETAIL_PAGE_URL"] = $ar_res["DETAIL_PAGE_URL"];

        unset($arResult["ITEMS"][$key]["PROPERTIES"]["NEW"]);
        unset($arResult["ITEMS"][$key]["PROPERTIES"]["BRAND"]);
        unset($arResult["ITEMS"][$key]["PROPERTIES"]["OPTIONS"]);
        unset($arResult["ITEMS"][$key]["PROPERTIES"]["VIDEO"]);
        unset($arResult["ITEMS"][$key]["PROPERTIES"]["PHOTOS"]);
        // unset($arResult["ITEMS"][$key]["PROPERTIES"]["PRICE"]);
        unset($arResult["ITEMS"][$key]["PROPERTIES"]["SERIES"]);
        unset($arResult["ITEMS"][$key]["PROPERTIES"]["INTERESTED_PRODUCTS"]);
        unset($arResult["ITEMS"][$key]["PROPERTIES"]["SHORT_NAME"]);
        unset($arResult["ITEMS"][$key]["PROPERTIES"]["GROUP_PAGE"]);
        unset($arResult["ITEMS"][$key]["PROPERTIES"]["RELATED_PRODUCTS"]);
        unset($arResult["ITEMS"][$key]["PROPERTIES"]["DISPLAY_AS_SERIES"]);
        unset($arResult["ITEMS"][$key]["PROPERTIES"]["ATTACHMENTS"]);
    }
}

?>