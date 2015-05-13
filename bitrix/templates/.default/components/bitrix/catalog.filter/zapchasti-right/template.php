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


$dbModels = CIBlockElement::GetList(array(),array("IBLOCK_ID" => 159),false,false,array("PROPERTY_BRAND"));
    while ($obModels = $dbModels->Fetch())
    {
        $arModels[] = $obModels;
    }
$BrandModel = array();
foreach ($arModels as $modelItem)
{
	if (!in_array($modelItem['PROPERTY_BRAND_VALUE'], $BrandModel))
	{
		$BrandModel[] = $modelItem['PROPERTY_BRAND_VALUE'];
	}
}
foreach ($BrandModel as $oneBrand)
{
	$dbBrandsForModels = CIBlockElement::GetByID($oneBrand);
	if ($obBrandsForModels = $dbBrandsForModels->Fetch())
		$arBrandsForModels[] = $obBrandsForModels;
}
// file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ajax/testFilterData23.txt', print_r($arBrandsForModels,true));
?>
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" style='float:right;border-left: 1px solid #e0e0e0;border-right: 1px solid #e0e0e0;padding: 0 7px'>
	<?foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;?>
	<table class="data-table" cellspacing="0" cellpadding="2">
	<thead>
		<tr>
			<!-- <td colspan="2" align="center"><?=GetMessage("IBLOCK_FILTER_TITLE")?></td> -->
		</tr>
	</thead>
	<tbody style='display:none'>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?if(!array_key_exists("HIDDEN", $arItem)):?>
				<tr>
					<td valign="top"><?=$arItem["NAME"]?>:</td>
					<td valign="top"><?=$arItem["INPUT"]?></td>
				</tr>
			<?endif?>
		<?endforeach;?>
	</tbody>
	<div class="zapblock zapbrand-model">
        <label for="brand-zapchasti-model" style='margin-right:50px'><b style='display: block;float: left;margin-top: 5px;'>Бренд:</b></label>
        <select name="brand-zapchasti-model" class="brand-zapchasti-model" >
            <option value="0">не выбрано</option>
            <? foreach ($arBrandsForModels as $arItem): ?>
                <? if ($_GET["brand-zapchasti"] == $arItem['ID']): ?>
                    <option  selected="selected" value="<?= $arItem['ID'] ?>"><?= $arItem['NAME'] ?></option>
                <? else: ?>
                    <option value="<?= $arItem['ID'] ?>"><?= $arItem['NAME'] ?></option>
                <? endif ?>
            <? endforeach; ?>
            <select/>
    </div>
    <br clear="all"/>
    <div class="zapblock zapmodel">
    </div>
	<tfoot style='display:none'>
		<tr>
			<td colspan="2">
				<input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" /><input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;<input type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" /></td>
		</tr>
	</tfoot>
	</table>
</form>
<script>
    $(document).ready(function(){
        $('.zapbrand-model li').on('click',function(){
            $.ajax({
                url: '/ajax/filterModel.php',
                type: 'POST',
                data: {ID:parseInt($(".zapbrand-model option:selected").val())},
                success: function(html){
                    $('.zapmodel').html(html);
                }
            });
            $(this).parents().find('form').children().find('input[name="arrFilter_pf[BRAND]"]').val($(this).find('a').attr('rel'));
        });
    	$(document).on('click', '.model-zapchasti option', function(){
            // $(this).parents().find('form').children().find('input[name="arrFilter_ff[NAME]"]').val($(this).text());
            // $(this).parents().find('form').children().find('input[name="set_filter"]').trigger('click');
            $('#filters_container form').first().find('input[name="arrFilter_pf[MODEL]"]').val($(this).attr('value'));
            $('#filters_container form').first().submit();
            console.log($('#filters_container form').first().find('input[name="arrFilter_pf[MODEL]"]').val());
    	});
    });
</script>


<style>
	
</style>