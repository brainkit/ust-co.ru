<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $SUBSCRIBE_TEMPLATE_RUBRIC;
$SUBSCRIBE_TEMPLATE_RUBRIC=$arRubric;
global $APPLICATION;
$SUBSCRIBE_TEMPLATE_RESULT = $APPLICATION->IncludeComponent("bitrix:news.list","main_actions",array(
        	"DISPLAY_DATE" => "Y",
        	"DISPLAY_NAME" => "Y",
        	"DISPLAY_PICTURE" => "Y",
        	"DISPLAY_PREVIEW_TEXT" => "Y",
        	"AJAX_MODE" => "Y",
        	"IBLOCK_TYPE" => "information",
        	"IBLOCK_ID" => "5",
        	"NEWS_COUNT" => "20",
        	"SORT_BY1" => "ACTIVE_FROM",
        	"SORT_ORDER1" => "DESC",
        	"SORT_BY2" => "SORT",
        	"SORT_ORDER2" => "ASC",
        	"FILTER_NAME" => "",
        	"FIELD_CODE" => array("ID"),
        	"PROPERTY_CODE" => array("DESCRIPTION"),
        	"CHECK_DATES" => "Y",
        	"DETAIL_URL" => "",
        	"PREVIEW_TRUNCATE_LEN" => "",
        	"ACTIVE_DATE_FORMAT" => "d.m.Y",
        	"SET_TITLE" => "Y",
        	"SET_BROWSER_TITLE" => "Y",
        	"SET_META_KEYWORDS" => "Y",
        	"SET_META_DESCRIPTION" => "Y",
        	"SET_STATUS_404" => "Y",
        	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        	"ADD_SECTIONS_CHAIN" => "Y",
        	"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
        	"PARENT_SECTION" => "",
        	"PARENT_SECTION_CODE" => "",
        	"INCLUDE_SUBSECTIONS" => "Y",
        	"CACHE_TYPE" => "A",
        	"CACHE_TIME" => "3600",
        	"CACHE_FILTER" => "Y",
        	"CACHE_GROUPS" => "Y",
        	"DISPLAY_TOP_PAGER" => "Y",
        	"DISPLAY_BOTTOM_PAGER" => "Y",
        	"PAGER_TITLE" => "Новости",
        	"PAGER_SHOW_ALWAYS" => "Y",
        	"PAGER_TEMPLATE" => "",
        	"PAGER_DESC_NUMBERING" => "Y",
        	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        	"PAGER_SHOW_ALL" => "Y",
        	"AJAX_OPTION_JUMP" => "N",
        	"AJAX_OPTION_STYLE" => "Y",
        	"AJAX_OPTION_HISTORY" => "N",
        	"AJAX_OPTION_ADDITIONAL" => ""
    	)	
	);
?>
<?
if($SUBSCRIBE_TEMPLATE_RESULT)
	return array(
		"SUBJECT"=>$SUBSCRIBE_TEMPLATE_RUBRIC["NAME"],
		"BODY_TYPE"=>"html",
		"CHARSET"=>"Windows-1251",
		"DIRECT_SEND"=>"Y",
		"FROM_FIELD"=>$SUBSCRIBE_TEMPLATE_RUBRIC["FROM_FIELD"],
	);
else
	return false;
?>