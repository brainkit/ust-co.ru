<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?/*
<table cellpadding="0" cellspacing="10" border="0">
<?
foreach($arResult["IBLOCKS"] as $arIBlock):
	if(count($arIBlock["ITEMS"]) > 0):
?>
	<tr><td><h1><?=$arIBlock['NAME']?></h1></td></tr>
<?
	foreach($arIBlock["ITEMS"] as $arItem):

		if($arItem["PREVIEW_PICTURE"])
		{
			if(COption::GetOptionString("subscribe", "attach_images")==="Y")
			{
				$sImagePath = $arItem["PREVIEW_PICTURE"]["SRC"];
			}
			elseif(strpos($arItem["PREVIEW_PICTURE"]["SRC"], "http") !== 0)
			{
				$sImagePath = "http://".$arResult["SERVER_NAME"].$arItem["PREVIEW_PICTURE"]["SRC"];
			}
			else
			{
				$sImagePath = $arItem["PREVIEW_PICTURE"]["SRC"];
			}

			$width = 100;
			$height = 100;

			$width_orig = $arItem["PREVIEW_PICTURE"]["WIDTH"];
			$height_orig = $arItem["PREVIEW_PICTURE"]["HEIGHT"];

			if(($width_orig > $width) || ($height_orig > $height))
			{
				if($width_orig > $width)
					$height_new = ($width / $width_orig) * $height_orig;
				else
					$height_new = $height_orig;

				if($height_new > $height)
					$width = ($height / $height_orig) * $width_orig;
				else
					$height = $height_new;
			}
		}
?>
	<tr><td>
		<font class="text">
		<?if($arItem["PREVIEW_PICTURE"]):?>
		<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><img hspace='5' vspace='5' align='left' border='0' src="<?echo $sImagePath?>" width="<?echo $width?>" height="<?echo $height?>" alt="<?echo $arItem["PREVIEW_PICTURE"]["ALT"]?>"  title="<?echo $arItem["NAME"]?>"></a>
		<?endif;?>
		<?if(strlen($arItem["DATE_ACTIVE_FROM"])>0):?>
			<font class="newsdata"><?echo $arItem["DATE_ACTIVE_FROM"]?></font><br>
		<?endif;?>
		<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br>
		<?echo $arItem["PREVIEW_TEXT"];?>
		</font>
	</td></tr>
<?
	endforeach;
	endif;
?>
<?endforeach?>
</table> 
*/?>

<html>
<head>
<title>Акции</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="font-family:Verdana; font-size:13px;">
<!-- шапка письма-->
<table id="shapka-letter" width="801" height="470" border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
	<tr>
		<td colspan="16">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_01.jpg" width="800" height="20" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="20" alt=""></td>
	</tr>
	<tr>
		<td rowspan="9">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_02.jpg" width="200" height="53" alt=""></td>
		<td colspan="4">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_03.jpg" width="266" height="7" alt=""></td>
		<td rowspan="9">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_04.jpg" width="1" height="53" alt=""></td>
		<td colspan="10" rowspan="2">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_05.jpg" width="333" height="10" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="7" alt=""></td>
	</tr>
	<tr>
		<td rowspan="9">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_06.jpg" width="13" height="68" alt=""></td>
		<td rowspan="6">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_07.jpg" width="37" height="38" alt=""></td>
		<td rowspan="9">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_08.jpg" width="10" height="68" alt=""></td>
		<td rowspan="3" style="font-family:Verdana; font-size:18px; color:#8c8e92; font-weight:bold;">
			8 (800) 700-88-33</td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td rowspan="8">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_10.jpg" width="14" height="65" alt=""></td>
		<td colspan="4" style="font-family:Verdana; font-size:13px; color:#000000;"></td>
		<td colspan="5" style="font-family:Verdana; font-size:9px; color:#000000; height:15px;"></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="15" alt=""></td>
	</tr>
	<tr>
		<td colspan="9" rowspan="2">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_13.jpg" width="319" height="4" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_14.jpg" width="206" height="4" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="9" rowspan="3" style="font-family:Verdana; font-size:18px; font-weight:bold; color:#000000;"></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2" style="font-family:Verdana; font-size:13px; color:#8c8e92;">
			Звонки по России бесплатно</td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="14" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_17.jpg" width="37" height="30" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_18.jpg" width="206" height="28" alt=""></td>
		<td colspan="9" rowspan="2">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_19.jpg" width="319" height="28" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="6" alt=""></td>
	</tr>
	<tr>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_20.jpg" width="200" height="22" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_21.jpg" width="1" height="22" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="22" alt=""></td>
	</tr>
	<tr>
		<td colspan="16">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_22.jpg" width="800" height="11" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="11" alt=""></td>
	</tr>
	<tr>
		<td colspan="16">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_23.jpg" width="800" height="6" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="6" alt=""></td>
	</tr>
	<tr>
		<td colspan="8">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_24.jpg" width="674" height="23" alt=""></td>
		<td>
			<a href="#" title="Youtube"><img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_25.jpg" width="25" height="23" alt=""></a></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_26.jpg" width="9" height="23" alt=""></td>
		<td colspan="2">
			<a href="#" title="Facebook"><img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_27.jpg" width="24" height="23" alt=""></a></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_28.jpg" width="10" height="23" alt=""></td>
		<td>
			<a href="#" title="Twitter"><img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_29.jpg" width="24" height="23" alt=""></a></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_30.jpg" width="10" height="23" alt=""></td>
		<td>
			<a href="#" title=""><img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_31.jpg" width="24" height="23" alt=""></a></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="23" alt=""></td>
	</tr>
	<tr>
		<td colspan="16" style="font-family:Verdana; font-size:20px; color:#8c8e92; font-weight:bold;">
			УНИВЕРСАЛ-СПЕЦТЕХНИКА ФИКСИРУЕТ ЦЕНЫ</td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="19" alt=""></td>
	</tr>
	<tr>
		<td colspan="16">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_33.jpg" width="800" height="14" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="14" alt=""></td>
	</tr>
	<tr>
		<td colspan="16">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_34.jpg" width="800" height="237" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="237" alt=""></td>
	</tr>
	<tr>
		<td colspan="16">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_35.jpg" width="800" height="14" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="14" alt=""></td>
	</tr>
	<tr>
		<td colspan="16" style="font-family:Verdana; font-size:13px; color:#8c8e92;">
			Акция действительна 22 октября - 21 ноября 2014 г.</td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="14" alt=""></td>
	</tr>
	<tr>
		<td colspan="16">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_37.jpg" width="800" height="21" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="21" alt=""></td>
	</tr>
	<tr>
		<td colspan="16">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/shapka_38.jpg" width="800" height="15" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="15" alt=""></td>
	</tr>
	<tr>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="200" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="13" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="37" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="10" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="206" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="14" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="193" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="25" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="9" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="18" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="6" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="10" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="24" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="10" height="1" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="24" height="1" alt=""></td>
		<td></td>
	</tr>
</table>
<!-- шапка основной таблицы-->
<table id="shapka-main" width="801" height="46" border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
	<tr>
		<td colspan="9">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_01.jpg" width="800" height="9" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="9" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_02.jpg" width="28" height="28" alt=""></td>
		<td colspan="5">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_03.jpg" width="572" height="3" alt=""></td>
		<td rowspan="3">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_04.jpg" width="27" height="28" alt=""></td>
		<td colspan="2">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_05.jpg" width="173" height="3" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_06.jpg" width="14" height="34" alt=""></td>
		<td style="font-family:Verdana; font-size:20px; color:#8c8e92; font-weight:bold;">
			АКЦИИ</td>
		<td rowspan="3">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_08.jpg" width="432" height="34" alt=""></td>
		<td rowspan="3">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_09.jpg" width="1" height="34" alt=""></td>
		<td rowspan="3">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_10.jpg" width="18" height="34" alt=""></td>
		<td rowspan="3">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_11.jpg" width="11" height="34" alt=""></td>
		<td style="font-family:Verdana; font-size:20px; color:#8c8e92; font-weight:bold;">
			НОВОСТИ</td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="21" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_13.jpg" width="107" height="13" alt=""></td>
		<td rowspan="2">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_14.jpg" width="162" height="13" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="4" alt=""></td>
	</tr>
	<tr>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_15.jpg" width="28" height="9" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_16.jpg" width="27" height="9" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/spacer.gif" width="1" height="9" alt=""></td>
	</tr>
</table>
<!-- основная таблица-->
<table id="main-table" width="800" border="0" cellpadding="0" cellspacing="0" style="table-layout: fixed; margin:0 auto;">
<col style="width:581px;">
<col style="width:1px; background-color:#dedce0;">
<col style="width:218px;">
		<tr>
		<td style="vertical-align:top;">
		<table width="581" border="0" cellpadding="0" cellspacing="0" style="table-layout: fixed;">
		<col style="width:160px;">
		<col style="width:20px;">
		<col style="width:383px;">
		<col style="width:18px;">
		
		<?foreach ($arResult['ITEMS'] as $item):?>
			<tr>
			<td style="vertical-align:top;"><img style="display:block;" src="ust-co.ru<?=$item['PREVIEW_PICTURE']['SRC'];?>" width="160" alt=""></td>
			<td></td>
			<td style="vertical-align:top; padding-top:20px;">
			<p style="font-family:Verdana; font-size:15px; color:#000000; font-weight:bold; position:relative; margin-top:-25px;"><?=$item['NAME'];?></p>
			<p style="font-family:Verdana; font-size:13px; color:#8c8e92; font-style:italic; position:relative; margin-top:-10px;">7 Ноября 2014 | Складская техника</p>
			<p style="font-family:Verdana; font-size:13px; color:#000000;position:relative; margin-top:-10px;"><?=$item['PREVIEW_TEXT'];?></p>
			<p style="position:relative; margin-top:-10px;"><a href="<?=$item['DETAIL_PAGE_URL'];?>" style="font-size:13px;  color:#000000;font-weight:bold;">подробнее>></a></p>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_15.jpg" width="28" height="9" alt=""></td>
			
			<td></td>
			</tr>
		<?endforeach;?>
		</table>
			</td>
		<td></td>
		<td style="vertical-align:top;">
		<table width="218" border="0" cellpadding="0" cellspacing="0" style="table-layout: fixed;">
			<?$APPLICATION->IncludeComponent("bitrix:news.list","sidebar_news",array(
        	"DISPLAY_DATE" => "Y",
        	"DISPLAY_NAME" => "Y",
        	"DISPLAY_PICTURE" => "Y",
        	"DISPLAY_PREVIEW_TEXT" => "Y",
        	"AJAX_MODE" => "Y",
        	"IBLOCK_TYPE" => "information",
        	"IBLOCK_ID" => "18",
        	"NEWS_COUNT" => "5",
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
		<!--<col style="width:18px;">
		<col style="width:200px;">
		<tr>
		<td></td>
		<td>
		<img style="display:block;" src="http://ust-co.ru/podpiska/images/akzii-primer.jpg" width="200" alt="">
		<p style="font-family:Verdana; font-size:15px; color:#000000; font-weight:bold; position:relative; margin-top:4px;">Универсал-Спецтехника фиксирует цены</p>
		<p style="font-family:Verdana; font-size:13px; color:#8c8e92; font-style:italic; position:relative; margin-top:-10px;">Акция действительна 22 октября - 21 ноября 2014 г.</p>
		<p style="position:relative; margin-top:-10px;"><a href="#" style="font-size:13px;  color:#000000;font-weight:bold;">подробнее>></a></p>
		<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_15.jpg" width="28" height="9" alt=""></td>
		</td>
		</tr>
		<tr>
		<td></td>
		<td>
		<img style="display:block;" src="http://ust-co.ru/podpiska/images/akzii-primer.jpg" width="200" alt="">
		<p style="font-family:Verdana; font-size:15px; color:#000000; font-weight:bold; position:relative; margin-top:4px;">Универсал-Спецтехника фиксирует цены</p>
		<p style="font-family:Verdana; font-size:13px; color:#8c8e92; font-style:italic; position:relative; margin-top:-10px;">Акция действительна 22 октября - 21 ноября 2014 г.</p>
		<p style="position:relative; margin-top:-10px;"><a href="#" style="font-size:13px;  color:#000000;font-weight:bold;">подробнее>></a></p>
		<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_15.jpg" width="28" height="9" alt=""></td>
		</td>
		</tr>
		<tr>
		<td></td>
		<td>
		<img style="display:block;" src="http://ust-co.ru/podpiska/images/akzii-primer.jpg" width="200" alt="">
		<p style="font-family:Verdana; font-size:15px; color:#000000; font-weight:bold; position:relative; margin-top:4px;">Универсал-Спецтехника фиксирует цены</p>
		<p style="font-family:Verdana; font-size:13px; color:#8c8e92; font-style:italic; position:relative; margin-top:-10px;">Акция действительна 22 октября - 21 ноября 2014 г.</p>
		<p style="position:relative; margin-top:-10px;"><a href="#" style="font-size:13px;  color:#000000;font-weight:bold;">подробнее>></a></p>
		<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_15.jpg" width="28" height="9" alt=""></td>
		</td>
		</tr>
		<tr>
		<td></td>
		<td>
		<img style="display:block;" src="http://ust-co.ru/podpiska/images/akzii-primer.jpg" width="200" alt="">
		<p style="font-family:Verdana; font-size:15px; color:#000000; font-weight:bold; position:relative; margin-top:4px;">Универсал-Спецтехника фиксирует цены</p>
		<p style="font-family:Verdana; font-size:13px; color:#8c8e92; font-style:italic; position:relative; margin-top:-10px;">Акция действительна 22 октября - 21 ноября 2014 г.</p>
		<p style="position:relative; margin-top:-10px;"><a href="#" style="font-size:13px;  color:#000000;font-weight:bold;">подробнее>></a></p>
		<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_15.jpg" width="28" height="9" alt=""></td>
		</td>
		</tr>-->
		</table>
			</td>
	</tr>
</table>
<!-- конец таблицы-->
<table id="end-of-main" width="800" border="0" cellpadding="0" cellspacing="0" style="table-layout: fixed; margin:0 auto;">
<col style="width:581px;">
<col style="width:1px; background-color:#dedce0;">
<col style="width:218px;">
	<tr>
		<td>
			<a href="/akcii/" style="font-size:13px; color:#8c8e92;">Посмотреть все Акции</a></td>
		<td></td>
		<td style="padding-left:18px;">
			<a href="/o-kompanii/novosti/" style="font-size:13px; color:#8c8e92;">Посмотреть все Новости</a></td>
	</tr>
	</table>
	<table width="800" border="0" cellpadding="0" cellspacing="0" style="table-layout: fixed; margin:0 auto; margin-top:10px;">
	<tr>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-podval_04.jpg" width="800" height="37" alt=""></td>
	</tr>
</table>
<!-- шапка 2 минуты позитива-->
<table id="two-shapka" width="800" height="45" border="0" cellpadding="0" cellspacing="0" style="margin:0 auto; margin-top:-10px;">
	<tr>
		<td colspan="3">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/2-shapka_01.jpg" width="800" height="10" alt=""></td>
	</tr>
	<tr>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/2-shapka_02.jpg" width="27" height="28" alt=""></td>
		<td>
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/2-shapka_03.jpg" width="469" height="28" alt=""></td>
		<td rowspan="2">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/2-shapka_04.jpg" width="304" height="35" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img style="display:block;" src="http://ust-co.ru/podpiska/images/2-shapka_05.jpg" width="496" height="7" alt=""></td>
	</tr>
</table>
<!-- блок 2 минуты позитива-->
<table id="two-shapka" width="800" border="0" cellpadding="0" cellspacing="0" style="table-layout: fixed; margin:20px auto;">
<col style="width:800px; padding-top:10px; padding-bottom:10px;">
	<tr>
		<td style="font-family:Georgia; font-style:italic; font-size:15px; padding:5px;">Анекдоты и картинки</td>
	</tr>
</table>
<!-- футер-->
<table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:64px; background-color:#dedce0;">
<tr>
<td>
<table id="end-of-main" width="800" border="0" height="64" cellpadding="0" cellspacing="0" style="margin:0 auto; border-bottom:2px solid #d5171e;table-layout: fixed;">
<col style="width:660px;">
<col style="width:25px;">
<col style="width:115px;">
<tr>
<td style="font-size:15px; color:#6d6b71;">Есть вопросы? Звони бесплатно на <span style="font-weight:bold;">8 (800) 700-88-33</span></td>
<td><img style="display:block;" src="http://ust-co.ru/podpiska/images/email.jpg" alt=""></td>
<td><a href="#" style="font-size:15px; color:#6d6b71; position:relative; margin-top:-4px;">Info@ust.co.ru</a></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:60px; background-color:#eb2a33;">
<tr>
<td>
<table id="end-of-main" width="800" border="0" height="64" cellpadding="0" cellspacing="0" style="margin:0 auto; border-top:3px solid #d5171e;border-bottom:1px solid #d5171e;">
<tr>
<td style="font-size:13px; color:#ffffff;">Если вы больше не хотите получать письма с новостями и акциями нашей компании, перейдите <a href="#" style="color:#ffffff; font-weight:bold;">по этой ссылке</a></td>
</tr>
</table>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:60px; background-color:#eb2a33;">
<tr>
<td>
<table id="end-of-main" width="800" border="0" height="64" cellpadding="0" cellspacing="0" style="margin:0 auto; ">
<tr>
<td style="font-size:13px; color:#ffffff;">&copy; 2005-2014, ООО «Универсал-Спецтехника» — все права защищены.</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
