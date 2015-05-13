<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?if(!empty($arResult["ITEMS"])):?>
	<div class="clients-page">
		<?foreach($arResult["ITEMS"] as $key => $arItem):?>	
			<?if($key >= 0 && $key < $arParams["NEWS_COUNT"]):?>
				<div class="image clients <?if(($key+1)%5 == 0):?>last<?endif;?>">
					<?if(!empty($arItem["PREVIEW_PICTURE"]["src"])):?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" rel="" class="fancybox" title="<?=$arItem["NAME"]?>">
					<?endif;?> 
							<table><tr><td>
								<?if(!empty($arItem["PREVIEW_PICTURE"]["src"])):?>
									<img src="<?=$arItem["PREVIEW_PICTURE"]["src"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["width"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["height"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
								<?else:?>
									<img src="<?=getImageNoPhoto($arParams["PREVIEW_PICTURE_WIDTH"], $arParams["PREVIEW_PICTURE_HEIGHT"])?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
								<?endif;?>
							</td></tr></table>
					<?if(!empty($arItem["PREVIEW_PICTURE"]["src"])):?>
						</a>
					<?endif;?> 
				</div>
			<?endif;?>
		<?endforeach;?>
		<div class="clear"></div>
		<?if($arParams["NEWS_COUNT"] < count($arResult["ITEMS"])):?>
			<div class="more">
				<?foreach($arResult["ITEMS"] as $key => $arItem):?>	
					<?if($key >= $arParams["NEWS_COUNT"]):?>
						<div class="image clients border_gray <?if(($key+1)%5 == 0):?>last<?endif;?>">
							<?if(!empty($arItem["PREVIEW_PICTURE"]["src"])):?>
								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" rel="" class="fancybox">
							<?endif;?> 
									<table><tr><td>
										<?if(!empty($arItem["PREVIEW_PICTURE"]["src"])):?>
											<img src="<?=$arItem["PREVIEW_PICTURE"]["src"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["width"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["height"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
										<?else:?>
											<img src="<?=getImageNoPhoto($arParams["PREVIEW_PICTURE_WIDTH"], $arParams["PREVIEW_PICTURE_HEIGHT"])?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
										<?endif;?>
									</td></tr></table>
							<?if(!empty($arItem["PREVIEW_PICTURE"]["src"])):?>
								</a>
							<?endif;?> 
						</div>
					<?endif;?>
				<?endforeach;?>
				<div class="clear"></div>
			</div>
			<a href="#" class="show-more" title="Показать все">Показать все <span></span></a>
			<div class="clear"></div>
		<?endif;?>
	</div>
<?else:?>
	<p class="errortext">К сожалению, в данном разделе нет доступной информации.</p>
<?endif;?>