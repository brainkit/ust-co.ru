<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<? $naves = FALSE; if($arResult['SECTION']['PATH'][0]['ID']=='243') {$naves = TRUE;} ?>
<div class="catalog-detail catalog <?if($naves){echo 'naves';}?> hproduct">
<? $i=0;
foreach ($_SESSION["CATALOG_COMPARE_LIST"][CATALOG]["ITEMS"] as $sections) {
	foreach ($sections as $items) {
		$item[$i] = $items;	
		$i++;
	}
}

?>
<? //print_r($item);["NATURE"] ?>
	<div class="ppic detail">
		<div class="image-main image">
			<?if(count($arResult["PHOTOS"])>0):?>
<?
include($_SERVER['DOCUMENT_ROOT'].'/watermark.php');
$image_path=watermark_function($arResult["PHOTOS"][0]["NATURE"]);
?>
				<a rel="gal1" class="fancybox" href="<?=$image_path;?>" >
			<?endif;?>
					<table><tr><td>
						<?if(!empty($arResult["PHOTOS"][0]["STANDART"]["src"])):?>
							<img class="photo" src="<?=$image_path;?>" width="<?=$arResult["PHOTOS"][0]["STANDART"]["width"]?>" height="<?=$arResult["PHOTOS"][0]["STANDART"]["height"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
						<?else:?>
							<img class="photo" src="<?=getImageNoPhoto(338, 278)?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
						<?endif;?>
					</td></tr></table>
			<?if(count($arResult["PHOTOS"])>0):?>
					<span class="full"></span>
					<?if(!empty($arResult["PROPERTIES"]["ACTIONS"]["VALUE"])):?>
						<span class="action popup"><?=$arResult["PROPERTIES"]["ACTIONS"]["NAME"]?></span>
					<?endif;?>
					<?if(!empty($arResult["PROPERTIES"]["NEW"]["VALUE"])):?>
						<span class="new popup"><?=$arResult["PROPERTIES"]["NEW"]["NAME"]?></span>
					<?endif;?>
					<?if(!empty($arResult["PROPERTIES"]["SEASONAL"]["VALUE"])):?>
						<span class="season popup"><?=$arResult["PROPERTIES"]["SEASONAL"]["NAME"]?></span>
					<?endif;?>	
					<?if(!empty($arResult["PROPERTIES"]["SALE"]["VALUE"])):?>
						<span class="sale popup"><?=$arResult["PROPERTIES"]["SALE"]["NAME"]?></span>
					<?endif;?>	
					<?if(!empty($arResult["PROPERTIES"]["CREDIT"]["VALUE"])):?>
						<span class="credit popup"><?=$arResult["PROPERTIES"]["CREDIT"]["NAME"]?></span>
					<?endif;?>		
				</a>
			<?endif;?>
		</div>
		<?if(count($arResult["PHOTOS"])>1):?>
			<div class="jcarousel" id="carousel-detail">
				<ul>
					<?foreach($arResult["PHOTOS"] as $key => $arPhoto):?>
                    <?if($key>0):?>
						<li>
							<a rel="gal1" href="<?=$arPhoto["NATURE"]?>" width-pic="<?=$arPhoto["STANDART"]["width"]?>" height-pic="<?=$arPhoto["STANDART"]["height"]?>" class="image <?if($key==0):?>active<?endif;?> fancybox-thumb">
								<table><tr><td>
									<img big-pic="<?=$arPhoto["NATURE"]?>" src="<?=$arPhoto["STANDART"]["src"]?>" width="<?=$arPhoto["SMALL"]["width"]?>" height="<?=$arPhoto["SMALL"]["height"]?>" />
								</td></tr></table>
							</a>
						</li>
                        <?endif;?>
					<?endforeach;?>
					<?if(count($arResult["PHOTOS"]) < 3):?>
						<?for($i = 0; $i < (3-count($arResult["PHOTOS"])); $i++) {?>
							<li class="image">
								<table><tr><td>
									<img src="<?=getImageNoPhoto(125, 90)?>" />
								</td></tr></table>
							</li>
						<?}?>
					<?endif;?>
				</ul>
				<?if(count($arResult["PHOTOS"]) > 4):?>
					<button class="jcarousel-prev"></button>
					<button class="jcarousel-next"></button>
				<?endif;?>
			</div>
		<?endif;?>
		<div class="cl"></div>
	</div>
	<div class="properties">
		<div class="characteristics<?if($arParams["TYPE"] == "ELEMENT" && !empty($arResult["PROPERTIES"]["PRICE"]["VALUE"])):?> with-price<?endif;?>">
			<div class="title"><?if(count($arResult["ITEMS"]) > 1 or $arParams["TYPE"]=="SERIES"):?>Описание<?else:?>Общие характеристики<?endif;?></div>
			<div class="chars">
                                <? //print $arParams["TYPE"]; //SERIES
                                ?>
				<?if(count($arResult["ITEMS"]) > 1 or $arParams["TYPE"]=="SERIES"):?>
					<?if(isset($arResult["CHARACTERISTICS"]["TEXT"]) && isset($arResult["CHARACTERISTICS"]["TYPE"])):?>
						<?if($arResult["CHARACTERISTICS"]["TYPE"] == "text"):?>
							<p><?=$arResult["CHARACTERISTICS"]["TEXT"]?></p>
						<?else:?>
							<?=$arResult["CHARACTERISTICS"]["TEXT"]?>
						<?endif;?>
					<?else:?>
						<p>К сожалению, общие характеристики не указаны.</p>
					<?endif;?>
				<?else:?>
					<?$char = 0; $i=0?>
					<?foreach($arResult["ITEMS"][0]["PROPERTIES"] as $val):?>
						<?if(!empty($val["VALUE"])):?>
							<?$char = 1;?>
							<div class="identifier">
								<span class="name type"><?=$val["NAME"]?></span>
								<span class="value"><?=$val["VALUE"]?></span>
								<div class="clear"></div>
							</div>
                            <?$i++;?>
                            <?if($i>=6) break;?>
						<?endif;?>
                        
					<?endforeach;?>
					<?if($char == 0):?>
						<p>К сожалению, общие характеристики не указаны</p>
					<?endif;?>
				<?endif;?>
			</div>
			<div class="cost">
				<?if($arParams["TYPE"] == "ELEMENT" && !empty($arResult["PROPERTIES"]["PRICE"]["VALUE"])):?>
					<?if($arResult["PROPERTIES"]["PRICE"]["VALUE"] > 0):?>
						<span class="name">Цена:</span>
						<span class="value"><?=CurrencyFormat($arResult["PROPERTIES"]["PRICE"]["VALUE"], "RUB");?></span>
						<div class="clear"></div>
					<?endif;?>
				<?endif;?>
			</div>
		</div>
		<input type="hidden" name="iblock_id" value="<?=$arResult["ITEMS"][0]["IBLOCK_ID"]?>" />
		<?if($arParams["TYPE"] == "ELEMENT"):?>
			<input type="hidden" name="type_element" value="model" />
		<?else:?>
			<input type="hidden" name="type_element" value="seriya" />
		<?endif;?>
		<?foreach($arResult["ITEMS"] as $val):?>
			<input type="hidden" class="element" name="element_<?=$val["ID"]?>" value="<?=$val["NAME"]?>">
		<?endforeach;?>
		
		<?
                $CATALOG_order = COption::GetOptionInt("ust", "CATALOG_order");
		$CATALOG_question = COption::GetOptionInt("ust", "CATALOG_question");
		$CATALOG_kredit = COption::GetOptionInt("ust", "CATALOG_kredit");
		$CATALOG_arenda = COption::GetOptionInt("ust", "CATALOG_arenda");
		$CATALOG_used = COption::GetOptionInt("ust", "CATALOG_used");
		$CATALOG_where_buy = COption::GetOptionInt("ust", "CATALOG_where_buy");
		$CATALOG_service_centers = COption::GetOptionInt("ust", "CATALOG_service_centers");?>
		<?if($CATALOG_order == 1 || $CATALOG_question == 1):?>
			<div class="price">
				<?if($CATALOG_question == 1):?>
					<button class="question silver left">Задать вопрос</button>
				<?endif;?>
				
				<?if($CATALOG_order == 1):?>
					<button class="order right">Заказать</button>
				<?endif;?>
			</div>
		<?endif;?>
		<div class="action">
			<?if($CATALOG_kredit == 1):?>
				<button class="left credit">Купить в кредит</button>
			<?endif;?>
			<?if($CATALOG_where_buy == 1):?>
				<a class="right where_buy" href="/filialy/" title="Филиалы">Где купить</a>
			<?endif;?>
			<div class="clear"></div>
			
			<?if($CATALOG_used == 1):?>
				<button class="left used">Купить Б/У</button>
			<?endif;?>
			<?if($CATALOG_service_centers == 1):?>
				<a class="right service_centers" href="#">Сервисные центры</a>
			<?endif;?>
			<div class="clear"></div>
			
			<?if($CATALOG_arenda == 1):?>
				<button class="left arenda">Взять в аренду</button>
			<?endif;?>
			<?if($arParams["TYPE"] == "ELEMENT" && count($arResult["ITEMS"])):?>
				<div class="comparison"></div>
			<?endif;?>
			<div class="clear"></div>
		</div>
	</div>
	
	<?if(!empty($arResult["RELATED_PRODUCTS"]) && !$naves):?>
		<div class="related-propducts">
        
			<span class="title<?if(count($arResult["RELATED_PRODUCTS"]) <= 2):?> marginBot<?endif;?>">Сопутствующие товары</span>
			<?if(count($arResult["RELATED_PRODUCTS"]) > 2):?>
				<button class="related-propducts-button prev"></button>
			<?endif;?>
			<div id="related-propducts">
				<ul>
				<?foreach($arResult["RELATED_PRODUCTS"] as $product):?>
					<li class="image">
						<?if(!empty($product["URL"])):?>
							<a href="<?=$product["URL"]?>" title="<?=$product["NAME"]?>"> 
						<?endif;?>
								<table><tr><td>
									<?if(!empty($product["PREVIEW_PICTURE"]["src"])):?>
										<img src="<?=$product["PREVIEW_PICTURE"]["src"]?>" width="<?=$product["PREVIEW_PICTURE"]["width"]?>" height="<?=$product["PREVIEW_PICTURE"]["height"]?>" alt="<?=$product["NAME"]?>" title="<?=$product["NAME"]?>">
									<?else:?>
										<img src="<?=getImageNoPhoto(120, 90)?>" alt="<?=$product["NAME"]?>" title="<?=$product["NAME"]?>">
									<?endif;?>
								</td></tr></table>
								<span class="name"><?=$product["NAME"]?></span>
								<?if(!empty($product["PRICE"])):?>
									<span class="price"><?=$product["PRICE"]?></span>
								<?endif;?>
						<?if(!empty($product["URL"])):?>
							</a> 
						<?endif;?>
					</li>
				<?endforeach;?>
				</ul>
			</div>
			<?if(count($arResult["RELATED_PRODUCTS"]) > 2):?>
				<button class="related-propducts-button next"></button>
			<?endif?>
		</div>
	<?endif?>
	
	<div class="clear"></div>
    <pre>
    <? //print_r($arResult); 
//  if(!empty($arResult["PREVIEW_TEXT"]))print "|".trim($arResult["PREVIEW_TEXT"])."|";
    
        
    
    ?>
    <? //if($arResult["PREVIEW_TEXT"] == "") {echo 1;} elseif (empty($arResult["PREVIEW_TEXT"])) {echo 2;} else {echo $arResult["PREVIEW_TEXT"];} ?>
    </pre>
	<?if(true):?>
        
	<div class="tabs-detail border_gray" id="tabs-detail">
		<ul>
			<?if(!empty($arResult["PREVIEW_TEXT"])):?>
				<li><a href="#description">Описание</a><span></span></li>
			<?endif;?>
            
			<li><a href="#characteristics">Характеристики</a><span></span></li>
			<?if(!empty($arResult["ATTACHMENTS"])):?>
				<li><a href="#attachments">Навесное оборудование</a><span></span></li>
			<?endif;?>
			<?if(!empty($arResult["OPTIONS"])):?>
				<li><a href="#options">Опции</a><span></span></li>
			<?endif;?>
			<?if(!empty($arResult["VIDEO"])):?>
				<li><a href="#video">Видео</a><span></span></li>
			<?endif;?>
			<div class="clear"></div>
		</ul>
		<?if(!empty($arResult["PREVIEW_TEXT"])):?>
			<div class="page" id="description">
				<?if(!empty($arResult["PREVIEW_TEXT"])):?>
					<?if($arResult["PREVIEW_TEXT_TYPE"] == "text"):?>
						<p><?=$arResult["PREVIEW_TEXT"]?></p>
					<?else:?>
						<?=$arResult["PREVIEW_TEXT"]?>
					<?endif;?>
				<?endif;?>
			</div>
		<?endif;?>
		<?if(!empty($arResult["OPTIONS"])):?>
			<div class="page" id="options">
				<?if(!empty($arResult["OPTIONS"])):?>
					<?if($arResult["OPTIONS"]["TYPE"] == "text"):?>
						<p><?=$arResult["OPTIONS"]["TEXT"]?></p>
					<?else:?>
						<?=$arResult["OPTIONS"]["TEXT"]?>
					<?endif;?>
				<?endif;?>
			</div>
		<?endif;?>
		<div class="page" id="characteristics">
			<?if(count($arResult["ITEMS"]) <= COption::GetOptionInt("ust", "catalog_detail_count_chars")):?>
				<?/* Модели - строки */?>
				<?if(!empty($arResult["GROUPING_CHARS"])):?>
					<?if(count($arResult["GROUPING_CHARS"]) > 1):?>
						<?foreach($arResult["GROUPING_CHARS"] as $key => $group_type):?>
							<a class="group_name<?if($key == 0):?> active<?endif;?>" href="#" id="group_<?=$key?>" title="<?=$group_type["NAME"]?>"><?=$group_type["NAME"]?></a>
						<?endforeach;?>
						<div class="clear"></div>
					<?endif;?>
                     <?if($arParams["TYPE"] != "ELEMENT"):?>
                                         <div class="compare header right"></div>
                     <?endif;?> 
					<div class="scroll-pane horizontal-only">
                                            
                                            
						<?foreach($arResult["GROUPING_CHARS"] as $key => $group_type):?>
							<div class="group group_<?=$key?><?if($key == 0):?> active<?endif;?>">
								<table>
									<thead>
										<tr>
											<?if(count($arResult["ITEMS"]) > 1):?>
												<th class="name">Модель</th>
											<?endif;?>
											<?foreach($group_type["ITEMS"] as $key_char => $char):?>											
												<th class="name"><?=$char?></th>
											<?endforeach;?>
											<?if(count($arResult["ITEMS"]) > 1):?>
												<th></th>
											<?endif;?>
										</tr>
									</thead>
									<tbody>
										<?foreach($arResult["ITEMS"] as $arItem):?>
											<tr>
												<?if(count($arResult["ITEMS"]) > 1):?>
													<td><?=$arItem["SHORT_NAME"]?></td>
												<?endif;?>
												<?foreach($group_type["ITEMS"] as $key_char => $char):?>												
													<td><?=($arItem["PROPERTIES"][$key_char]["VALUE"] ? $arItem["PROPERTIES"][$key_char]["VALUE"] : "&mdash;");?></td>
												<?endforeach;?>
												<?if(count($arResult["ITEMS"]) > 1):?>
													<td>
														<label class="checkbox label_check">
															<input class="compare add" type="checkbox" name="compare_<?=$arItem["ID"]?>" id="item_<?=$arItem["ID"]?>" value="<?=$arItem["ID"]?>">
														</label>
                                                        
													</td>
												<?endif;?>
											</tr>
										<?endforeach;?>
									</tbody>
								</table>
							</div>
						<?endforeach;?>
					</div>
					<?if(count($arResult["ITEMS"]) > 1):?>
						<div class="comparison"></div>
					<?endif;?>
					<div class="clear"></div>
				<?endif;?>
			<?else:?>
				<?/* Модели - столбцы */?>		
				<?if(!empty($arResult["GROUPING_CHARS"])):?>
					<?if(count($arResult["ITEMS"]) > 1):?>
						<div class="comparison"></div>
						<div class="clear"></div>
					<?endif;?>
					<?if(count($arResult["GROUPING_CHARS"]) > 1):?>
						<?foreach($arResult["GROUPING_CHARS"] as $key => $group_type):?>
							<a class="group_name<?if($key == 0):?> active<?endif;?>" href="#" id="group_<?=$key?>" title="<?=$group_type["NAME"]?>"><?=$group_type["NAME"]?></a>
						<?endforeach;?>
						<div class="clear"></div>
					<?endif;?>
                                         <div class="compare header right"></div> 
					<div class="scroll-pane horizontal-only">
						<?foreach($arResult["GROUPING_CHARS"] as $key => $group_type):?>
							<div class="group group_<?=$key?><?if($key == 0):?> active<?endif;?>">
								<table class="vertical">
									<thead>
										<tr>
											<th class="name model chars"><div class="fixedgorizontal">Модель</div></th>
											<?foreach($arResult["ITEMS"] as $arItem):?>				
												<th class="name">
                                               
													<label class="checkbox label_check">
														<input class="compare add" type="checkbox" name="compare_<?=$arItem["ID"]?>" id="item_<?=$arItem["ID"]?>" value="<?=$arItem["ID"]?>"><?=$arItem["SHORT_NAME"]?>
													</label>
                                                    
												</th>
											<?endforeach;?>
										</tr>
									</thead>
									<tbody>
										<?foreach($group_type["ITEMS"] as $key_char => $char):?>
											<tr>
												<td class="name chars"><div class="fixedgorizontal"><?=$char?></div></td>
												<?foreach($arResult["ITEMS"] as $arItem):?>
													<td><?=($arItem["PROPERTIES"][$key_char]["VALUE"] ? $arItem["PROPERTIES"][$key_char]["VALUE"] : "&mdash;");?></td>
												<?endforeach;?>
											</tr>
										<?endforeach;?>
									</tbody>
								</table>
							</div>
						<?endforeach;?>
					</div>
				<?endif;?>
			<?endif;?>
			<div class="clear"></div>
		</div>
		<?if(!empty($arResult["ATTACHMENTS"])):?>
			<div class="page" id="attachments">
				<?foreach($arResult["ATTACHMENTS"] as $key => $attachment):?>
					<?if(!empty($attachment["URL"])):?>
						<a class="attachment image<?if(($key+1)%6 == 0):?> last<?endif;?>" title="<?=$attachment["NAME"]?>" href="<?=$attachment["URL"]?>" >
					<?else:?>
						<div class="attachment image<?if(($key+1)%6 == 0):?> last<?endif;?>">
					<?endif;?>
							<table><tr><td>
							<?if(!empty($attachment["PREVIEW_PICTURE"]["src"])):?>
								<img src="<?=$attachment["PREVIEW_PICTURE"]["src"]?>" width="<?=$attachment["PREVIEW_PICTURE"]["width"]?>" height="<?=$attachment["PREVIEW_PICTURE"]["height"]?>" alt="<?=$attachment["NAME"]?>" title="<?=$attachment["NAME"]?>" />
							<?else:?>
								<img src="<?=getImageNoPhoto(100, 100)?>" alt="<?=$attachment["NAME"]?>" title="<?=$attachment["NAME"]?>" />
							<?endif;?>
							</td></tr></table>
							<span><?=$attachment["NAME"]?></span>
					<?if(!empty($attachment["URL"])):?>
						</a>
					<?else:?>
						</div>
					<?endif;?>
				<?endforeach;?>
				<div class="clear"></div>
			</div>
		<?endif;?>
		<?if(!empty($arResult["VIDEO"])):?>
			<div class="page" id="video">
				<?foreach($arResult["VIDEO"] as $key => $arVideo):?>
					<div class="item-video <?if(($key+1)%3 == 0):?> last <?endif;?>">
						<div class="video">
							<a class="video_show image" href="#" id="video_<?=$arVideo["ID"]?>" title="Посмотреть видео">
								<table><tr><td>
								<?if(!empty($arVideo["PREVIEW_PICTURE"]["src"])):?>
									<img src="<?=$arVideo["PREVIEW_PICTURE"]["src"]?>" width="<?=$arVideo["PREVIEW_PICTURE"]["width"]?>" height="<?=$arVideo["PREVIEW_PICTURE"]["height"]?>" alt="<?=$arVideo["NAME"]?>" title="<?=$arVideo["NAME"]?>" />
								<?endif;?>
								</td></tr></table>
								<span class="frame"></span>
								<span class="icon"></span>
								<span class="video-overlay"></span>
							</a>
						</div>
						<div class="name"><a class="video_show" href="#" id="video_<?=$arVideo["ID"]?>" title="Посмотреть видео"><?=$arVideo["NAME"]?></a></div>
					</div>
				<?endforeach;?>
			</div>
		<?endif;?>
		<div class="clear"></div>
	</div> 
    <?endif;?>
	<div class="clear"></div>	
	<div class="looked interested-propducts"></div>
	<?if(COption::GetOptionInt("ust", "catalog_detail_spare_parts") > 0 && strlen(COption::GetOptionString("ust", "CATALOG_DETAIL_SPARE_PARTS_CONTENT")) > 0):?>
		<div class="text-banner"><?=COption::GetOptionString("ust", "CATALOG_DETAIL_SPARE_PARTS_CONTENT");?></div>
	<?endif;?>
	<?if(COption::GetOptionInt("ust", "catalog_detail_you_interested") == 1 && !empty($arResult["INTERESTED_PRODUCTS"])):?>
		<div class="interested-propducts">
			<span class="title">Вам могут быть интересны:</span>
			<?if(count($arResult["INTERESTED_PRODUCTS"]) > 6):?>
				<button class="interested-propducts-button prev"></button>
			<?endif;?>
			<div id="interested-propducts">
				<ul>
				<?foreach($arResult["INTERESTED_PRODUCTS"] as $product):?>
					<li class="image">
						<?if(!empty($product["URL"])):?>
							<a href="<?=$product["URL"]?>" title="<?=$product["NAME"]?>"> 
						<?endif;?>
								<table><tr><td>
									<?if(!empty($product["PREVIEW_PICTURE"]["src"])):?>
										<img src="<?=$product["PREVIEW_PICTURE"]["src"]?>" width="<?=$product["PREVIEW_PICTURE"]["width"]?>" height="<?=$product["PREVIEW_PICTURE"]["height"]?>" alt="<?=$product["NAME"]?>" title="<?=$product["NAME"]?>">
									<?else:?>
										<img src="<?=getImageNoPhoto(120, 90)?>" alt="<?=$product["NAME"]?>" title="<?=$product["NAME"]?>">
									<?endif;?>
								</td></tr></table>
								<span class="name"><?=$product["NAME"]?></span>
								<?if(!empty($product["PRICE"])):?>
									<span class="price"><?=$product["PRICE"]?></span>
								<?endif;?>
						<?if(!empty($product["URL"])):?>
							</a> 
						<?endif;?>
					</li>
				<?endforeach;?>
				</ul>
			</div>
			<?if(count($arResult["INTERESTED_PRODUCTS"]) > 6):?>
				<button class="interested-propducts-button next"></button>
			<?endif?>
			<div class="clear"></div>
		</div>
	<?endif;?>
</div>
<div class="dialog" id="video_player"></div>