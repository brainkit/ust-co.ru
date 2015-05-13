<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?/*(!empty($arResult["ITEMS"])):?>
	<div class="articles">
		<div class="icon-title">Статьи<span></span></div>
		<div class="list">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
				<div class="item">
					<div class="name"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><span></span><?=$arItem["NAME"]?></a></div>
					<div class="announce"><?=$arItem["PREVIEW_TEXT"]?>&nbsp;<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a> &raquo;</div>
				</div>
			<?endforeach;?>
		</div>
	</div>
<?endif;*/?>
<col style="width:18px;">
<col style="width:200px;">
<?foreach ($arResult['ITEMS'] as $item):?>
	<tr>
		<td></td>
		<td>
		<img style="display:block;" src="ust-co.ru<?=$item['PREVIEW_PICTURE']['SRC'];?>" width="200" alt="">
		<p style="font-family:Verdana; font-size:15px; color:#000000; font-weight:bold; position:relative; margin-top:4px;"><?=$item['NAME'];?></p>
		<p style="font-family:Verdana; font-size:13px; color:#8c8e92; font-style:italic; position:relative; margin-top:-10px;"><?=$item['PREVIEW_TEXT'];?></p>
		<p style="position:relative; margin-top:-10px;"><a href="<?=$item['DETAIL_PAGE_URL'];?>" style="font-size:13px;  color:#000000;font-weight:bold;">подробнее>></a></p>
		<img style="display:block;" src="http://ust-co.ru/podpiska/images/main-shapka_15.jpg" width="28" height="9" alt=""></td>
	</tr>
<?endforeach;?>