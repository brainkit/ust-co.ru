<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
GLOBAL $USER;
$this->setFrameMode(true);?>
<?if (!$USER->IsAdmin()):?>
<div class="bu-top">
    <div class="left-side">        
        <?$APPLICATION->IncludeComponent("areal:seo_include", ".default", array(
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"]
            ),
            false,
            array(
            "ACTIVE_COMPONENT" => "Y"
            )
        );?>
        <?$APPLICATION->IncludeComponent("bitrix:main.include", "catalog", array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => SITE_DIR."include/arenda_advantages.php"
            ),
            false,
            array(
            "ACTIVE_COMPONENT" => "Y"
            )
        );?>
    </div>
    <?$APPLICATION->IncludeComponent("areal:form.order.new", ".default", array("THEME_TYPE" => "arenda"));?>
    <div class="clear"></div>
</div>
<?$APPLICATION->IncludeComponent(
    "areal:catalog.section.list",
    "",
    array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "DEFAULT_PAGE" => $arResult["FOLDER"]
    ),
    $component
);?>
<?$intSectionID = $APPLICATION->IncludeComponent(
    "areal:catalog.section",
    "",
    array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
        "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
        "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
        "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
        "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
        "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
        "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
        "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
        "BASKET_URL" => $arParams["BASKET_URL"],
        "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
        "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
        "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
        "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
        "FILTER_NAME" => $arParams["FILTER_NAME"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "ADD_SECTIONS_CHAIN" => "Y",
        "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
        "PAGE_ELEMENT_COUNT" => 10000,
        "LINE_ELEMENT_COUNT" => 1,
        "PRICE_CODE" => $arParams["PRICE_CODE"],
        "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
        "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

        "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
        "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
        "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

        "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
        "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
        "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
        "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],

        "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
        "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
        "OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
        "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
        "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
        "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
        "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
        "OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
        'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
        'CURRENCY_ID' => $arParams['CURRENCY_ID'],
        'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],

        'LABEL_PROP' => $arParams['LABEL_PROP'],
        'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
        'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],

        'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
        'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
        'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
        'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
        'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
        'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
        'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
        'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
        'MESS_BTN_DETAIL' => $arParams['MESS_BTN_DETAIL'],
        'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],
    ),
    $component
);
?>
<div class="clear"></div>
<?if(!empty($arResult["VARIABLES"]["SECTION_CODE"])):?>
    <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/arenda/".$arResult["VARIABLES"]["SECTION_CODE"].".php"));?>
<?endif;?>
<?if($arResult["VARIABLES"]["SECTION_CODE"] || $arResult["VARIABLES"]["SECTION_ID"]):?>
    <div class="catalog-hr"></div>
    <div class="catalog-information-left-col">
        <div class="help-plate">
            <div class="need-help">Сложности с выбором?</div>
            <div class="phone">Мы поможем&nbsp;&nbsp;&mdash;&nbsp;<span><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
    "AREA_FILE_SHOW" => "file",
    "PATH" => SITE_DIR."include/phone.php"
    ),
    false,
    array(
    "ACTIVE_COMPONENT" => "Y"
    )
);?></span></div>
        </div>
        <?$APPLICATION->IncludeComponent("areal:useful.information", ".default", array(
    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
    "IBLOCK_ID" => $arParams["IBLOCK_ID"]
    ),
    false,
    array(
    "ACTIVE_COMPONENT" => "Y"
    )
);?>        
        <?
        global $faq_filter;
        $faq_filter = array("PROPERTY_ARENDA_CATALOG" => $intSectionID);?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "faq",
            Array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "about_company",
                "IBLOCK_ID" => "17",
                "NEWS_COUNT" => "4",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "faq_filter",
                "FIELD_CODE" => array(),
                "PROPERTY_CODE" => array(),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "PAGER_TEMPLATE" => ".default",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N"
            ),
        false
        );?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "articles",
            Array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "about_company",
                "IBLOCK_ID" => "16",
                "NEWS_COUNT" => "4",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "faq_filter",
                "FIELD_CODE" => array(),
                "PROPERTY_CODE" => array(),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "PAGER_TEMPLATE" => ".default",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N"
            ),
        false
        );?>
    </div>
    <?$APPLICATION->IncludeComponent("areal:video.catalog", ".default", array(
    "IBLOCK_ID" => VIDEO,
    "FILTER" => array(
        "PROPERTY_ARENDA_CATALOG" => $intSectionID,
    )
    ),
    false,
    array(
    "ACTIVE_COMPONENT" => "Y"
    )
);?>
    <div class="clear"></div>
<?endif;?>
<div class="dialog" id="order_catalog">
    <? $APPLICATION->IncludeComponent("areal:form.order.new", "popup", array("THEME_TYPE" => "arenda")); ?>
</div>
<?else:?>




<div class="banner-arenda">
    <img src="/design/images/banner-arenda.png" alt="">
</div>
<div class="bu-top arenda-block">
    <div class="left-side">        
        <?$APPLICATION->IncludeComponent("areal:seo_include", ".default", array(
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"]
            ),
            false,
            array(
            "ACTIVE_COMPONENT" => "Y"
            )
        );?>
        <div>
            <?$APPLICATION->IncludeComponent(
                "areal:catalog.section.list",
                "new_design",
                array(
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                    "DEFAULT_PAGE" => $arResult["FOLDER"]
                ),
                $component
            );?>
        </div>
    </div>
    <div class="right-side">
        <?$APPLICATION->IncludeComponent("areal:form.order.new", ".default", array("THEME_TYPE" => "arenda"));?>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<?if(!empty($arResult["VARIABLES"]["SECTION_CODE"])):?>
    <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/arenda/".$arResult["VARIABLES"]["SECTION_CODE"].".php"));?>
<?endif;?>
<?if($arResult["VARIABLES"]["SECTION_CODE"] || $arResult["VARIABLES"]["SECTION_ID"]):?>
    <div class="catalog-hr"></div>
    <div class="catalog-information-left-col">
        <div class="help-plate">
            <div class="need-help">Сложности с выбором?</div>
            <div class="phone">Мы поможем&nbsp;&nbsp;&mdash;&nbsp;<span><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
    "AREA_FILE_SHOW" => "file",
    "PATH" => SITE_DIR."include/phone.php"
    ),
    false,
    array(
    "ACTIVE_COMPONENT" => "Y"
    )
);?></span></div>
        </div>
        <?$APPLICATION->IncludeComponent("areal:useful.information", ".default", array(
    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
    "IBLOCK_ID" => $arParams["IBLOCK_ID"]
    ),
    false,
    array(
    "ACTIVE_COMPONENT" => "Y"
    )
);?>        
        <?
        global $faq_filter;
        $faq_filter = array("PROPERTY_ARENDA_CATALOG" => $intSectionID);?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "faq",
            Array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "about_company",
                "IBLOCK_ID" => "17",
                "NEWS_COUNT" => "4",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "faq_filter",
                "FIELD_CODE" => array(),
                "PROPERTY_CODE" => array(),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "PAGER_TEMPLATE" => ".default",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N"
            ),
        false
        );?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "articles",
            Array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "about_company",
                "IBLOCK_ID" => "16",
                "NEWS_COUNT" => "4",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "faq_filter",
                "FIELD_CODE" => array(),
                "PROPERTY_CODE" => array(),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "PAGER_TEMPLATE" => ".default",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N"
            ),
        false
        );?>
    </div>
    <?$APPLICATION->IncludeComponent("areal:video.catalog", ".default", array(
    "IBLOCK_ID" => VIDEO,
    "FILTER" => array(
        "PROPERTY_ARENDA_CATALOG" => $intSectionID,
    )
    ),
    false,
    array(
    "ACTIVE_COMPONENT" => "Y"
    )
);?>
    <div class="clear"></div>
<?endif;?>
<div class="dialog" id="order_catalog">
    <? $APPLICATION->IncludeComponent("areal:form.order.new", "popup", array("THEME_TYPE" => "arenda")); ?>
</div>
<style>
    .banner-arenda{
        margin-bottom: 10px;
    }
    .name-arenda{
        color: #6d6b71;
        font-weight: bold;
        font-size: 18px;
        line-height: 19px;
        text-transform: uppercase;
        margin-bottom: 10px;
        display: block;
    }
    .arenda-ul{
        display: inline-block;
    }
    .arenda-ul li a p{
        border-top: 2px solid #DBDBDB;
        margin-bottom: 0;
        color: #000;
        background: #ededee; /* Old browsers */
background: -moz-linear-gradient(top,  #ededee 0%, #ffffff 40%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ededee), color-stop(40%,#ffffff)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ededee 0%,#ffffff 40%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #ededee 0%,#ffffff 40%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #ededee 0%,#ffffff 40%); /* IE10+ */
background: linear-gradient(to bottom,  #ededee 0%,#ffffff 40%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ededee', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */

    }
    .arenda-ul li img{
          max-width: 100%;
          /*border-bottom: 2px solid #DBDBDB;*/
    }
    .arenda-ul li{
        background: none;
        padding:0;
        margin-right: 5px;
        border: 1px solid transparent;
    }
    .arenda-ul li:hover{
        border: 1px solid #DBDBDB;
        border-radius: 7px;
          overflow: hidden;
    }
    .arenda-ul li{
        margin-bottom: 10px;
    }
    .arenda-ul li:hover img{        
        border-radius: 7px 7px 0 0;
    }
    .arenda-ul li:hover p{
        background: #f6f6f6;
        
    }
    .arenda-ul li:nth-child(4n){
        margin-right: 0;
    }
    .arenda-ul li{
        width: 24%;
        float: left;
        text-align: center;
    }
    .arenda-block.bu-top .right-side{
        margin-top: 0;
    }
</style>
<?endif;?>