<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?$APPLICATION->SetPageProperty("SHARE", "Y");?>
<div class="actions-page">
<?
$page=$APPLICATION->GetCurPage();
$elCode=explode("/", $page);
?>
<?$dbElemList = CIBlockElement::GetList(array(), array("IBLOCK_ID" => "5","CODE"=>$elCode[3]));
    while ($arElemList = $dbElemList->Fetch()) 
    {
        $arRes=$arElemList;
    }
?>
<?$temp="bitrix:news.detail";?>
<?if($arRes["ACTIVE"]=="N"):?>
<?$temp="unispec:news.detail"?>
<?endif;?>
<?//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ajax/pic.txt', print_r($temp, true));?>


    <?$ElementID = $APPLICATION->IncludeComponent(
        $temp,
        '',
        Array(
            "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
            "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
            "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
            "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
            "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
            "DETAIL_URL"    =>    $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
            "SECTION_URL"    =>    $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
            "META_KEYWORDS" => $arParams["META_KEYWORDS"],
            "META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
            "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
            "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
            "SET_TITLE" => $arParams["SET_TITLE"],
            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
            "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
            "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
            "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
            "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
            "DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
            "DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
            "PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
            "PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
            "CHECK_DATES" => $arParams["CHECK_DATES"],
            "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
            "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
            "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
            "USE_SHARE"             => $arParams["USE_SHARE"],
            "SHARE_HIDE"             => $arParams["SHARE_HIDE"],
            "SHARE_TEMPLATE"         => $arParams["SHARE_TEMPLATE"],
            "SHARE_HANDLERS"         => $arParams["SHARE_HANDLERS"],
            "SHARE_SHORTEN_URL_LOGIN"    => $arParams["SHARE_SHORTEN_URL_LOGIN"],
            "SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
        ),
        $component
    );?>
    <?global $archive_filter;
    $archive_filter = array("!ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"], "ACTIVE_DATE" => "N", "!ID" => $ElementID);
    ?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "other",
        Array(
            "IBLOCK_TYPE"    =>    $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID"    =>    $arParams["IBLOCK_ID"],
            "NEWS_COUNT"    =>    6,
            "SORT_BY1"    =>    $arParams["SORT_BY1"],
            "SORT_ORDER1"    =>    $arParams["SORT_ORDER1"],
            "SORT_BY2"    =>    $arParams["SORT_BY2"],
            "SORT_ORDER2"    =>    $arParams["SORT_ORDER2"],
            "FIELD_CODE"    =>    $arParams["LIST_FIELD_CODE"],
            "PROPERTY_CODE"    =>    $arParams["LIST_PROPERTY_CODE"],
            "DETAIL_URL"    =>    $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
            "SECTION_URL"    =>    $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
            "IBLOCK_URL"    =>    $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
            "DISPLAY_PANEL"    =>    $arParams["DISPLAY_PANEL"],
            "SET_TITLE"    =>    "N",
            "SET_STATUS_404" => "N",
            "INCLUDE_IBLOCK_INTO_CHAIN"    => "N",
            "CACHE_TYPE"    =>    $arParams["CACHE_TYPE"],
            "CACHE_TIME"    =>    $arParams["CACHE_TIME"],
            "CACHE_FILTER"    =>    $arParams["CACHE_FILTER"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "DISPLAY_TOP_PAGER"    =>    "N",
            "DISPLAY_BOTTOM_PAGER"    =>    "N",
            "PAGER_TITLE"    =>    $arParams["PAGER_TITLE"],
            "PAGER_TEMPLATE"    =>    $arParams["PAGER_TEMPLATE"],
            "PAGER_SHOW_ALWAYS"    =>    $arParams["PAGER_SHOW_ALWAYS"],
            "PAGER_DESC_NUMBERING"    =>    $arParams["PAGER_DESC_NUMBERING"],
            "PAGER_DESC_NUMBERING_CACHE_TIME"    =>    $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
            "PAGER_SHOW_ALL" => "N",
            "DISPLAY_DATE"    =>    "Y",
            "DISPLAY_NAME"    =>    "Y",
            "DISPLAY_PICTURE"    =>    "Y",
            "DISPLAY_PREVIEW_TEXT"    =>    $arParams["DISPLAY_PREVIEW_TEXT"],
            "PREVIEW_TRUNCATE_LEN"    =>    $arParams["PREVIEW_TRUNCATE_LEN"],
            "ACTIVE_DATE_FORMAT"    =>    $arParams["LIST_ACTIVE_DATE_FORMAT"],
            "USE_PERMISSIONS"    =>    $arParams["USE_PERMISSIONS"],
            "GROUP_PERMISSIONS"    =>    $arParams["GROUP_PERMISSIONS"],
            "FILTER_NAME"    =>    "archive_filter",
            "HIDE_LINK_WHEN_NO_DETAIL"    =>    $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
            "CHECK_DATES"    =>    $arParams["CHECK_DATES"],
        ),
        $component
    );?>
</div>
<div class="dialog" id="order_catalog">
    <? $APPLICATION->IncludeComponent("areal:form.order.new", "popup", array("THEME_TYPE" => "aktsii")); ?>
</div>