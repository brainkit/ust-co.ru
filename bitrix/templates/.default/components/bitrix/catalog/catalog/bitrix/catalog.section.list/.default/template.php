<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode( true );
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

?>
<?GLOBAL $USER;?>
<?/*
<div class="<? echo $arCurView['CONT']; ?>"><?
if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID'])
{
	$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], CIBlock::GetArrayByID($arResult['SECTION']["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], CIBlock::GetArrayByID($arResult['SECTION']["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));

	?><h1 class="<? echo $arCurView['TITLE']; ?>" id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"><a href="<? echo $arResult['SECTION']['SECTION_PAGE_URL']; ?>"><? echo $arResult['SECTION']['NAME']; ?></a></h1><?
}
if (0 < $arResult["SECTIONS_COUNT"])
{
	?><ul class="<? echo $arCurView['LIST']; ?>"><?
	switch ($arParams['VIEW_MODE'])
	{
		case 'LINE':
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));

				if (false === $arSection['PICTURE'])
					$arSection['PICTURE'] = array(
						'SRC' => $arCurView['EMPTY_IMG']
					);
				?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="bx_catalog_line_img" style="background-image: url(<? echo $arSection['PICTURE']['SRC']; ?>);"></a>
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
			break;
		case 'TEXT':
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));

				?><li id="<?  echo $this->GetEditAreaId($arSection['ID']); ?>"><h2 class="bx_catalog_text_title"><? echo str_repeat($strDepthSym, $arSection['RELATIVE_DEPTH']);
				?><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?>(<? echo $arSection['ELEMENT_CNT']; ?>)<?
				}
				?></h2></li><?
			}
			unset($arSection);
			break;
		case 'TILE':
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));

				if (false === $arSection['PICTURE'])
					$arSection['PICTURE'] = array(
						'SRC' => $arCurView['EMPTY_IMG']
					);

				?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="bx_catalog_tile_img">
				<span><img src="<? echo $arSection['PICTURE']['SRC']; ?>" alt=""></span>
				</a>
				<h2 class="bx_catalog_tile_title"><? echo str_repeat($strDepthSym, $arSection['RELATIVE_DEPTH']);
				?><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?>(<? echo $arSection['ELEMENT_CNT']; ?>)<?
				}
				?></h2>
				</li><?
			}
			unset($arSection);
			break;
	}
	?></ul><? echo ('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
}
?></div>*/?>
<?
$dbSection = CIBlockSection::GetList(array("LEFT_MARGIN" => "ASC"),array("IBLOCK_ID" => 7),false,array(),false);
$dbIBlock7 = CIBlock::GetByID(7);
if ($obIBlock7 = $dbIBlock7->Fetch())
{
	$arIBlock7 = $obIBlock7;
}
$curIndex = count($arResult['SECTIONS']);
$arResult['SECTIONS'][$curIndex]['DEPTH_LEVEL'] = 1;
$arResult['SECTIONS'][$curIndex]['SECTION_PAGE_URL'] = str_replace('#SITE_DIR#/catalog/', '', $arIBlock7['LIST_PAGE_URL']);
$arResult['SECTIONS'][$curIndex]['SECTION_PAGE_URL'] = 'http://u-st.ru/catalog/'.$arResult['SECTIONS'][$curIndex]['SECTION_PAGE_URL'];
$arResult['SECTIONS'][$curIndex]['NAME'] = $arIBlock7['NAME'];
	while ($obSection = $dbSection->Fetch())
	{
		$arTmp = $obSection;
		$arTmp['DEPTH_LEVEL'] = 2;
		$arTmp['SECTION_PAGE_URL'] = str_replace('#SITE_DIR#', '', $arTmp['SECTION_PAGE_URL']);
		if ($arTmp['ACTIVE'] == "Y")
			$arTmp['SECTION_PAGE_URL'] = str_replace('#SECTION_CODE#', $arTmp['CODE'], $arTmp['SECTION_PAGE_URL']);
		elseif ($arTmp['ACTIVE'] == 'N')
			$arTmp['SECTION_PAGE_URL'] = str_replace('#SECTION_CODE#/', '', $arTmp['SECTION_PAGE_URL']);
		if ($arTmp['ACTIVE'] == 'Y')
		{
			$arTmp['SECTION_PAGE_URL'] = 'http://u-st.ru'.$arTmp['SECTION_PAGE_URL'];
			$arResult['SECTIONS'][] = $arTmp;
		}
	}
$dbSection = CIBlockSection::GetList(array("LEFT_MARGIN" => "ASC"),array("IBLOCK_ID" => 54),false,array(),false);
$dbIBlock54 = CIBlock::GetByID(54);
if ($obIBlock54 = $dbIBlock54->Fetch())
{
	$arIBlock54 = $obIBlock54;
}
$curIndex = count($arResult['SECTIONS']);
$arResult['SECTIONS'][$curIndex]['DEPTH_LEVEL'] = 1;
$arResult['SECTIONS'][$curIndex]['SECTION_PAGE_URL'] = str_replace('#SITE_DIR#/catalog/', '', $arIBlock54['LIST_PAGE_URL']);
$arResult['SECTIONS'][$curIndex]['SECTION_PAGE_URL'] = 'http://ust-co.ru/catalog/'.$arResult['SECTIONS'][$curIndex]['SECTION_PAGE_URL'];
$arResult['SECTIONS'][$curIndex]['NAME'] = $arIBlock54['NAME'];
	while ($obSection = $dbSection->Fetch())
	{
		$arTmp = $obSection;
		$arTmp['DEPTH_LEVEL'] = 2;
		$arTmp['SECTION_PAGE_URL'] = str_replace('#SITE_DIR#', '', $arTmp['SECTION_PAGE_URL']);
		if ($arTmp['ACTIVE'] == "Y")
			$arTmp['SECTION_PAGE_URL'] = str_replace('#SECTION_CODE#', $arTmp['CODE'], $arTmp['SECTION_PAGE_URL']);
		elseif ($arTmp['ACTIVE'] == 'N')
			$arTmp['SECTION_PAGE_URL'] = str_replace('#SECTION_CODE#/', '', $arTmp['SECTION_PAGE_URL']);
		if ($arTmp['ACTIVE'] == 'Y' && $arTmp['IBLOCK_SECTION_ID'] == 926)
		{
			$arTmp['SECTION_PAGE_URL'] = 'http://ust-co.ru'.$arTmp['SECTION_PAGE_URL'];
			$arResult['SECTIONS'][] = $arTmp;
		}
	}
$dbSection = CIBlockSection::GetList(array("LEFT_MARGIN" => "ASC"),array("IBLOCK_ID" => 10),false,array(),false);
	while ($obSection = $dbSection->Fetch())
	{
		$arTmp = $obSection;
		if ($arTmp['DEPTH_LEVEL'] == 1)
			$curSect = $arTmp['CODE'];
		$arTmp['SECTION_PAGE_URL'] = str_replace('#SITE_DIR#', '', $arTmp['SECTION_PAGE_URL']);
		if ($arTmp['ACTIVE'] == "Y")
		{
			$arTmp['SECTION_PAGE_URL'] = str_replace('#SECTION_CODE_PATH#/', $curSect, $arTmp['SECTION_PAGE_URL']);
			$arTmp['SECTION_PAGE_URL'] .='/';
			if ($arTmp['DEPTH_LEVEL'] != 1)
				$arTmp['SECTION_PAGE_URL'] .= '/'.$arTmp['CODE'].'/';
		}
		elseif ($arTmp['ACTIVE'] == 'N')
			$arTmp['SECTION_PAGE_URL'] = str_replace('#SECTION_CODE_PATH#/', '', $arTmp['SECTION_PAGE_URL']);
		if ($arTmp['ACTIVE'] == 'Y')
			$arResult['SECTIONS'][] = $arTmp;
	}
$dbSection = CIBlockSection::GetList(array("LEFT_MARGIN" => "ASC"),array("IBLOCK_ID" => 158),false,array(),false);
	while ($obSection = $dbSection->Fetch())
	{
		$arTmp = $obSection;
		$arTmp['SECTION_PAGE_URL'] = str_replace('#SITE_DIR#', '', $arTmp['SECTION_PAGE_URL']);
		if ($arTmp['IBLOCK_CODE'] != $arTmp['CODE'])
		{
			if ($arTmp['ACTIVE'] == "Y")
				$arTmp['SECTION_PAGE_URL'] = str_replace('#SECTION_CODE_PATH#', $arTmp['IBLOCK_CODE'].'/'.$arTmp['CODE'], $arTmp['SECTION_PAGE_URL']);
			elseif ($arTmp['ACTIVE'] == 'N')
				$arTmp['SECTION_PAGE_URL'] = str_replace('#SECTION_CODE_PATH#/', '', $arTmp['SECTION_PAGE_URL']);
		}
		else
		{
			if ($arTmp['ACTIVE'] == "Y")
				$arTmp['SECTION_PAGE_URL'] = str_replace('#SECTION_CODE_PATH#', $arTmp['IBLOCK_CODE'], $arTmp['SECTION_PAGE_URL']);
			elseif ($arTmp['ACTIVE'] == 'N')
				$arTmp['SECTION_PAGE_URL'] = str_replace('#SECTION_CODE_PATH#/', '', $arTmp['SECTION_PAGE_URL']);
		}
		$arTmp['SECTION_PAGE_URL'] = 'http://ust-co.ru' . $arTmp['SECTION_PAGE_URL'];
		if ($arTmp['ACTIVE'] == 'Y')
			$arResult['SECTIONS'][] = $arTmp;
	}
	foreach ($arResult['SECTIONS'] as $key => &$arSection)
	{
		if ($arSection['DEPTH_LEVEL'] > 2)
		{
			unset($arResult['SECTIONS'][$key]);
		}
	}
	unset($arSection);
?>
<?
$domains=  get_domains();
	//-------------
	$sections_UF=get_sections_url_on_name();
	//--------
	    foreach ($arResult['SECTIONS'] as $key => &$arItem)
	    {
	
	        if ($sections_UF[$arItem["NAME"]] != "")
	        {
	            $arResult['SECTIONS'][$key]["LINK_DOMAIN"] = $domains[$sections_UF[$arItem["NAME"]]];
	            $arResult['SECTIONS'][$key]['SECTION_PAGE_URL'] = 'http://' . $arResult['SECTIONS'][$key]['LINK_DOMAIN'] . $arResult['SECTIONS'][$key]['SECTION_PAGE_URL'];
	        }
	        elseif ( ($sections_UF[$arItem["NAME"]] == "") && ( strpos($arItem["NAME"], 'Аренда')===0 ) )
	        {
	        	$arResult['SECTIONS'][$key]['SECTION_PAGE_URL'] = 'http://ust-co.ru' . $arResult['SECTIONS'][$key]['SECTION_PAGE_URL'];
	        }
	    }
		unset($arItem);
	$index = 0;
	$block = 0;
	$fullCount = count($arResult['SECTIONS']);
	$halfCount = round($fullCount/2);
	$rightBlock = array();
	$leftBlock = array();
	foreach($arResult['SECTIONS'] as $arSection)
	{
		// $arSection['SECTION_PAGE_URL'] = 'http://'. $arSection['LINK_DOMAIN'] . $arSection['SECTION_PAGE_URL'];
		if ( (($index < $halfCount) ||  ($arSection['DEPTH_LEVEL'] == 2)) && ($block == 0) )
			$leftBlock[] = $arSection;
		elseif ( ($block == 2) || ($index >= $halfCount && $arSection['DEPTH_LEVEL'] == 1))
		{
			$block = 2;
			$rightBlock[] = $arSection;
		}
		$index++;
	}
?>
<?
	$brandSample = array();
	$dbBrands = CIBlockElement::GetList(array(),array("IBLOCK_ID"=> 6, "SECTION_ID"=> 190, "INCLUDE_SUBSECTIONS"=> "Y"),false,false,array("PROPERTY_212"));
	while ($obBrands = $dbBrands->Fetch())
	{
		$arElements[] = $obBrands;
	}
	foreach ($arElements as $oneElement)
	{
		if (!in_array($oneElement['PROPERTY_212_VALUE'], $brandSample))
		{
			$brandSample[] = $oneElement['PROPERTY_212_VALUE'];
		}
	}
	$dbBrandsHref = CIBlockElement::GetList(array(),array("IBLOCK_ID"=> 9, "ID" => $brandSample),false,false,array("PROPERTY_2274", "PROPERTY_2278", "NAME", "CODE"));
	while ($arBrandsHref = $dbBrandsHref->Fetch())
	{
		$buildBrands[] = $arBrandsHref;
	}
	foreach ($buildBrands as $key => &$value)
	{
		if (empty($value['PROPERTY_2278_VALUE']))
		{		
			$value['PROPERTY_2278_VALUE'] = 'http://u-st.ru/catalog/stroitelnaya-tekhnika/filter/brand-'.$value['CODE'].'/';
		}

	}
	unset($value);

	// unset($value);
	// $brandSample = array();
	$brandSample1 = array();
	$dbBrands = CIBlockElement::GetList(array(),array("IBLOCK_ID"=> 6, "SECTION_ID"=> 206, "INCLUDE_SUBSECTIONS"=> "Y"),false,false,array("PROPERTY_212"));
	while ($obBrands = $dbBrands->Fetch())
	{
		$arElements[] = $obBrands;
	}
	foreach ($arElements as $oneElement)
	{
		if ((!in_array($oneElement['PROPERTY_212_VALUE'], $brandSample1)) && (!in_array($oneElement['PROPERTY_212_VALUE'], $brandSample)))
		{
			$brandSample1[] = $oneElement['PROPERTY_212_VALUE'];
		}
	}
	$dbBrandsHref = CIBlockElement::GetList(array(),array("IBLOCK_ID"=> 9, "ID" => $brandSample1),false,false,array("PROPERTY_2274", "PROPERTY_2278", "NAME", "CODE"));
	while ($arBrandsHref = $dbBrandsHref->Fetch())
	{
		$StoreBrands[] = $arBrandsHref;
	}
	foreach ($StoreBrands as $key => &$value)
	{
		if (empty($value['PROPERTY_2278_VALUE']))
		{		
			$value['PROPERTY_2278_VALUE'] = 'http://u-st.ru/catalog/skladskaya-tekhnika/filter/brand-'.$value['CODE'].'/';
		}

	}
	unset($value);

?>
<?
$buildCount = count($buildBrands);
$storeCount = count($StoreBrands);
$bIndex = 1;
$sIndex = 1;
	?>
	<div style='float:left;width:50%'>
	<?
	foreach($leftBlock as $arSection):
            if (isset($arSection["LINK_DOMAIN"])) {
                // $arItem["LINK"] = "http://" . $arItem["LINK_DOMAIN"] . $arItem["LINK"];
                $link_domain = $arSection["LINK_DOMAIN"];
            } else {
                // $arSection["LINK"] = "http://" . DEFAULT_DOMAIN . $arSection["LINK"];
                $link_domain = DEFAULT_DOMAIN;
            }


            if ($_SERVER["HTTP_HOST"] != $link_domain) {
                $rel = 'rel="nofollow"';
                $noindex = true;
            } else {
                $rel = "";
                $noindex = false;
            }
            $page = $APPLICATION->GetCurPage();
            if ($page == "/index.php") {
                $rel = "";
                $noindex = false;
            }
				if ($arSection['DEPTH_LEVEL'] == '1'):
					if ($index != 0):
						?></ul><?
						if ($lastID == 190)
						{
							echo '<div class="brands"> По брендам';
							foreach ($buildBrands as $brand)
							{?>
							<a href="<? echo $brand['PROPERTY_2278_VALUE']; ?>">
								<? echo $brand['NAME']; ?>
							</a>	
							<?if ($bIndex != $buildCount){ echo ', ';}?>
							<?
							$bIndex++;
							}
							echo '</div>';
						}
						if ($lastID == 206)
						{
							echo '<div class="brands"> По брендам';
							foreach ($StoreBrands as $brand)
							{?>
							<a href="<? echo $brand['PROPERTY_2278_VALUE']; ?>">
								<? echo $brand['NAME']; ?>
							</a>
							<?if ($sIndex != $storeCount){ echo ', ';}?>	
							<?
							$sIndex++;
							}
							echo '</div>';	
						}
					endif;
					?>
					<?$lastID = $arSection['ID'];?>
					<? if ($noindex): ?><!--noindex--><? endif; ?>
					<a class='parent_section' href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
						<? echo $arSection['NAME']; ?>
					</a>
					<? if ($noindex): ?><!--/noindex--><? endif; ?>
					<ul class='main_list'>
					<?
				elseif($arSection['DEPTH_LEVEL'] == '2'):
					?>
					<li>
						<? if ($noindex): ?><!--noindex--><? endif; ?>
						<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
							<? echo $arSection['NAME']; ?>
						</a>
						<? if ($noindex): ?><!--/noindex--><? endif; ?>
					</li>
					<?
				endif;
				?>
		<?endforeach;?>
	</ul>
	</div>
	<div style='float:right;width:50%'>
		<?foreach($rightBlock as $arSection):?>
				<?
				if (isset($arSection["LINK_DOMAIN"])) {
                // $arItem["LINK"] = "http://" . $arItem["LINK_DOMAIN"] . $arItem["LINK"];
                $link_domain = $arSection["LINK_DOMAIN"];
            	} else {
            	    // $arSection["LINK"] = "http://" . DEFAULT_DOMAIN . $arSection["LINK"];
            	    $link_domain = DEFAULT_DOMAIN;
            	}
	
	
            	if ($_SERVER["HTTP_HOST"] != $link_domain) {
            	    $rel = 'rel="nofollow"';
            	    $noindex = true;
            	} else {
            	    $rel = "";
            	    $noindex = false;
            	}
            	$page = $APPLICATION->GetCurPage();
            	if ($page == "/index.php") {
            	    $rel = "";
            	    $noindex = false;
            	}
				if ($arSection['DEPTH_LEVEL'] == '1'):
					if ($index != 0):
						?></ul><?
					endif;
					?>
					<? if ($noindex): ?><!--noindex--><? endif; ?>
					<a class='parent_section' href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
						<? echo $arSection['NAME']; ?>
					</a>
					<? if ($noindex): ?><!--/noindex--><? endif; ?>
					<ul class='main_list'>
					<?
				elseif($arSection['DEPTH_LEVEL'] == '2'):
					?>
					<li>
						<? if ($noindex): ?><!--noindex--><? endif; ?>
						<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
							<? echo $arSection['NAME']; ?>
						</a>
						<? if ($noindex): ?><!--/noindex--><? endif; ?>
					</li>
					<?
				endif;
				?>
	<?endforeach;?>
	</ul>
	</div>