<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true); 
$arViewModeList = array('LINE', 'TEXT', 'TILE');
$arViewStyles = array(
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$boolShowDepth = (1 < $arParams['TOP_DEPTH']);
$strDepthSym = '>';

?><div class="<? echo $arCurView['CONT']; ?>"><?
if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID'])
{
	$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], CIBlock::GetArrayByID($arResult['SECTION']["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], CIBlock::GetArrayByID($arResult['SECTION']["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));

	?><h1 class="<? echo $arCurView['TITLE']; ?>" id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"><a href="<? echo $arResult['SECTION']['SECTION_PAGE_URL']; ?>"><? echo $arResult['SECTION']['NAME']; ?></a></h1><?
}
if (0 < $arResult["SECTIONS_COUNT"])
{
	?><ul class="section-list"><?
 
                
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));

				if (false === $arSection['PICTURE'])
					$arSection['PICTURE'] = array(
						'SRC' => $arCurView['EMPTY_IMG']
					);
				?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				 <h2 class="bx_catalog_line_title"><? echo str_repeat($strDepthSym, $arSection['RELATIVE_DEPTH']);
				?><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?>(<? echo $arSection['ELEMENT_CNT']; ?>)<?
				}
				?></h2><?
				if ('' != $arSection['DESCRIPTION'])
				{
					?><p class="bx_catalog_line_description"><? echo $arSection['DESCRIPTION']; ?></p><?
				}
				?><div style="clear: both;"></div>
				</li><?
			}
			unset($arSection);
                
	 
	?></ul><? echo ('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
}
?></div>