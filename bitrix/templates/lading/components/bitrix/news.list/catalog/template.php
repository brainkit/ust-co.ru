<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
 <div class="element_catalog">
    <div class="element_catalog_wrap">
        <table>
            <tbody>
            	<tr>
                    <td class="selection_name"><?echo $arItem['PROPERTIES']['ATT_TYPE']['VALUE'];?></td>
                    <td></td>
                </tr>
				<tr>
                    <td class="name" colspan="2"><?echo $arItem["NAME"]?></td>
                </tr>
                <tr>
                    <td colspan="2">
                    	<a class="all_bred fancybox" href="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" title="">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""> 
                        </a>
                    </td>                                
                </tr>
				<?echo $arItem["PREVIEW_TEXT"];?>
		
		
				<tr>
					<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
						<td class="cena">
						<?echo $arItem['PROPERTIES']['ATT_PRISE']['VALUE'];?>
						</td>
					<?endforeach;?>
					<td class="buy_p"><a class="byu_img btn_red" val="<?echo $arItem["NAME"]?>" href="#formbuy">Купить</a></td>
				</tr>


			</tbody>
        </table>
    </div>
<div class="element_catalog_bg1"></div>	
<div class="element_catalog_bg"></div>
</div>
<?endforeach;?>

