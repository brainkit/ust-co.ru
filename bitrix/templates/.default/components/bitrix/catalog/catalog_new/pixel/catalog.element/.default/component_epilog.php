<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<?if(count($arResult["ITEMS"]) == 1 && $arResult["ID"] > 0):?>
	<script type="text/javascript">
		var id = "<?=$arResult["ID"]?>";
		<?if(in_array($arResult["ID"], $_SESSION["CATALOG_COMPARE_LIST"][$arParams["IBLOCK_ID"]]["ITEMS"][$arItem["IBLOCK_SECTION_ID"]])):?>
			$(".catalog-detail div.comparison").html('<a class="compare del" href="#" id="item_'+id+'" title="Сравнение">Убрать из сравнения</a>');
		<?else:?>
			$(".catalog-detail div.comparison").html('<a class="compare add" href="#" id="item_'+id+'" title="Сравнение">Сравнить</a>');
		<?endif;?>		
	</script>
<?elseif(count($arResult["ITEMS"]) > 1):?>
	<?foreach($arResult["ITEMS"] as $item):?>
		<?$arID[] = $item["ID"];?>
	<?endforeach;?>
	<script type="text/javascript">
		<?foreach($arID as $id):?>
			<?if(in_array($id, $_SESSION["CATALOG_COMPARE_LIST"][$arParams["IBLOCK_ID"]]["ITEMS"])):?>
				$("label.checkbox input[name='compare_<?=$id?>']").attr("checked", "checked");
			<?endif;?>
		<?endforeach;?>
		<?if(count(array_intersect($_SESSION["CATALOG_COMPARE_LIST"][$arParams["IBLOCK_ID"]]["ITEMS"], $arID)) > 0):?>
			$(".catalog-detail div.comparison").html('<a class="compare" href="/catalog/compare/" title="Перейти в список сравнения">Перейти в список сравнения</a>');
		<?else:?>
			$(".catalog-detail div.comparison").html('');
		<?endif;?>
	</script>
<?endif;?>
<?
if(!in_array($arResult["ITEMS"][0]["ID"], $_SESSION["LOOKED"]))
	$_SESSION["LOOKED"][] = $arResult["ITEMS"][0]["ID"];
	
if(!empty($_SESSION["LOOKED"]) && COption::GetOptionInt("ust", "catalog_detail_you_looked") == 1):
	$looks = CIBlockElement::GetList(array("SORT" => "ASC", "ID" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y", "ID" => $_SESSION["LOOKED"]), false, false, array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "IBLOCK_SECTION_ID", "PROPERTY_PRICE", "DETAIL_PAGE_URL", "PROPERTY_GROUP_PAGE", "PROPERTY_DISPLAY_AS_SERIES"));
	while($look = $looks->GetNext()) {
		if($look["ID"] != $arResult["ITEMS"][0]["ID"]) {
			unset($url);
			if(!empty($look["PROPERTY_GROUP_PAGE_VALUE"]) && !empty($look["PROPERTY_DISPLAY_AS_SERIES_VALUE"])) {	
				unset($sections);
				unset($section);
				$sections = CIBlockSection::GetList(array(), array("IBLOCK_ID" => $look["IBLOCK_ID"], "ID" => $look["IBLOCK_SECTION_ID"]), false);
				if($section = $sections->GetNext())
					$url = $section["SECTION_PAGE_URL"].$look["PROPERTY_GROUP_PAGE_VALUE"]."/";
			}
			else $url = $look["DETAIL_PAGE_URL"];
			
			$looked_items[] = array(
				"NAME" => $look["NAME"],
				"URL" => $url,
				"PRICE" => ($look["PROPERTY_PRICE_VALUE"] > 0) ? FormatCurrency($look["PROPERTY_PRICE_VALUE"], "RUB") : "",
				"PREVIEW_PICTURE" => CFile::ResizeImageGet(
					$look["PREVIEW_PICTURE"], 
					array("width" => 119, "height" => 100), 
					BX_RESIZE_IMAGE_PROPORTIONAL,
					true 
				)
			);
		}
	}?>
	<?if(!empty($looked_items) && count($looked_items) > 0):?>
		<div id="looked_items">
			<span class="title">Вы смотрели:</span>
			<?if(count($looked_items) > 6):?>
				<button class="looked-propducts-button prev"></button>
			<?endif;?>
			<div id="looked-propducts">
				<ul>
				<?foreach($looked_items as $product):?>
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
			<?if(count($looked_items) > 6):?>
				<button class="looked-propducts-button next"></button>
			<?endif?>
			<div class="clear"></div>
		</div>
		<script type="text/javascript">	
$(document).ready(function() {
			var content = $("#looked_items").html();
			$("#looked_items").remove();
			$(".catalog-detail .looked.interested-propducts").empty().html(content);
			$(".catalog-detail #looked-propducts").jCarouselLite({
				btnNext: ".looked-propducts-button.next",
				btnPrev: ".looked-propducts-button.prev",
				mouseWheel: true,
				visible: 6,
				circular: false
			});
});
		</script>
	<?endif;?>
<?endif;?>