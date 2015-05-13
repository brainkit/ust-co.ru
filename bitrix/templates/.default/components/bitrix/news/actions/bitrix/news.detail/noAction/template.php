<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
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
<?$pic=CFile::GetFileArray($arRes["PREVIEW_PICTURE"]);
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ajax/pic1.txt', print_r($arResult, true));
?>

 <div class="subscribe-plate share">
   <span class="share">Поделиться</span> <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script><div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
    </div>
<div class="action-top">
	<?if(!empty($arRes["DETAIL_PICTURE"])):?>
		<div class="border_gray carousel">
			<ul id="action_banner">
					<li>
						<a href="<?=$photo["NATURE"]?>" rel="group_actions" class="fancybox image">
							<table><tr><td>
								<img src="<?=$photo["IMAGE"]["src"]?>" width="<?=$photo["IMAGE"]["width"]?>" height="<?=$photo["IMAGE"]["height"]?>" alt="<?=$photo["DESCRIPTION"]?>" title="<?=$photo["DESCRIPTION"]?>">
							</td></tr></table>
						</a>						
						<div class="description"><span><?=$photo["DESCRIPTION"]?></span></div>
					</li>
			</ul>
		</div>
	<?else:?>
		<div class="actions border_gray image carousel">
			<table><tr><td>
				<img src="<?=getImageNoPhoto(520, 254)?>" alt="Нет изображения" title="Нет изображения" />
			</td></tr></table>
		</div>
	<?endif;?>
	<div class="action-timer">
		<div class="title">К сожалению, акция заершена</div>
		<div class="time-left">
			<div class="icon"></div>
		</div>
		<div class="date">Акция действительна <span><?=getDateWithTimeText($arResult["ACTIVE_FROM"], $arResult["ACTIVE_TO"], false);?></span></div>
		<input type="hidden" name="action_name" value="<?=$arResult["NAME"]?>" />
		<?if($arResult["PROPERTIES"]["PROP_LINK"]["VALUE"]!=""):?>
			<a href="<?=$arResult["PROPERTIES"]["PROP_LINK"]["VALUE"]?>" class="to_section">Перейти в раздел</a>
		<?endif;?>
	</div>
	<div class="clear"></div>
</div>