<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
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
GLOBAL $USER;
?>

 
<div id='filters_container'>
<div class="hr"></div>
<h3 class='sz1'>Поиск запчастей:</h3>
<h3 class='sz2'>Поиск по модели техники:</h3>
<?//if (!empty($_GET)):?>
<?php
//__($_SERVER);

$action=str_replace("?".$_SERVER["QUERY_STRING"],"",$_SERVER["REQUEST_URI"]);


?>
	<form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="<?=$action?>" method="get" class="zapchasti-filter form1">
    <?
    foreach ($arResult["ITEMS"] as $arItem):
        if (array_key_exists("HIDDEN", $arItem)):
            echo $arItem["INPUT"];
        endif;
    endforeach;
    ?>

    <div class="zapblock">
        <label for="name-zapchasti"><b>Введите номер или название:</b></label><br />
        <input type="text" name="name-zapchasti" class="name-zapchasti" /> и/или 
    </div>
    <div class="zapblock zapbrand">
        <label for="brand-zapchasti"><b>Бренд:</b></label><br />
        <select name="brand-zapchasti" class="brand-zapchasti" >
            <option value="">все бренды</option>
            <? foreach ($arResult["BRANDES"] as $id => $arItem): ?>
                <? if ($_GET["arrFilter_pf"]['BRAND'] == $id and empty($_GET["arrFilter_pf"]['MODEL'])): ?>
                    <option  selected="selected" value="<?= $id ?>"><?= $arItem ?></option>
                <? else: ?>
                    <option value="<?= $id ?>"><?= $arItem ?></option>
                <? endif ?>
            <? endforeach; ?>
            </select>
    </div>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <? if (!array_key_exists("HIDDEN", $arItem) and $arItem["INPUT_NAME"]!="arrFilter_pf[MODEL]"): ?>
            <? $css = str_replace(array("[", "]"), "", $arItem["INPUT_NAME"]); ?>
            <div class="<?= $css ?>">
                <label for="<?= $arItem["INPUT_NAME"] ?>"><?= $arItem["NAME"] ?>:</label> 
                <?= $arItem["INPUT"] ?> 

            </div>
        <? endif ?>
    <? endforeach; ?>
    <div class="submit zapblock">
        <br /><input type="submit" name="set_filter" value="Найти<?//= GetMessage("IBLOCK_SET_FILTER") ?>" /><input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;<!--input type="submit" name="del_filter" value="<?= GetMessage("IBLOCK_DEL_FILTER") ?>" /-->
    </div>	 
</form>

<?
 

//   $APPLICATION->IncludeComponent(
// 	"bitrix:catalog.filter", 
// 	"zapchasti-right", 
// 	array(
// 		"IBLOCK_TYPE" => "zapchasti",
// 		"IBLOCK_ID" => "159",
// 		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
// 		"FILTER_NAME" => "arrFilter",
// 		"FIELD_CODE" => array(
// 			0 => "NAME",
// 			1 => "",
// 		),
// 		"PROPERTY_CODE" => array(
// 			0 => "BRAND",
// 			1 => "",
// 		),
// 		"PRICE_CODE" => array(
// 		),
// 		"CACHE_TYPE" => "A",
// 		"CACHE_TIME" => "36000000",
// 		"CACHE_GROUPS" => "N",
// 		"LIST_HEIGHT" => "5",
// 		"TEXT_WIDTH" => "20",
// 		"NUMBER_WIDTH" => "5",
// 		"SAVE_IN_SESSION" => "N"
// 	),
// 	false
// );

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
// foreach ($BrandModel as $oneBrand)
// {
//     $dbBrandsForModels = CIBlockElement::GetByID($oneBrand);
//     if ($obBrandsForModels = $dbBrandsForModels->Fetch())
//         $arBrandsForModels[] = $obBrandsForModels;
//}
$dbBrandsForModels = CIBlockElement::GetList(array("NAME" => "ASC"),array("ID" => $BrandModel),false,false,array('NAME',"ID"));
    while ($obBrandsForModels = $dbBrandsForModels->Fetch())
        $arBrandsForModels[] = $obBrandsForModels;
    ?>
<?//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ajax/testGet.txt', print_r($BrandModel,true))?>

<form name="" class="form2" action="/catalog/zapchasti/" method="get" style='float:right;border-left: 1px solid #e0e0e0;border-right: 1px solid #e0e0e0;padding: 0 7px'>
    <table class="data-table">
    <tbody style='display:none'>
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?if(!array_key_exists("HIDDEN", $arItem)):?>
                <tr>
                    <td style='vertical-align:top'><?=$arItem["NAME"]?>:</td>
                    <td style='vertical-align:top'><?=$arItem["INPUT"]?></td>
                </tr>
            <?endif?>
        <?endforeach;?>
    </tbody>
    <tbody>
    <div class="zapblock zapbrand-model">
        <label for="brand-zapchasti-model" style='margin-right:50px'><b style='display: block;float: left;margin-top: 5px;'>Бренд:</b></label>
        <select name="brand-zapchasti-model" class="brand-zapchasti-model" >
            <option value="">выбрать</option>
            <? foreach ($arBrandsForModels as $arItem): ?>
               
                    <option value="<?= $arItem['ID'] ?>"><?= $arItem['NAME'] ?></option>
               
            <? endforeach; ?>
        </select>
    </div>
    </tbody>
    <br clear="all"/>
    <?if (isset($_GET) && (!empty($_GET["arrFilter_pf"]['MODEL']))):?>
    <?
    if (CModule::IncludeModule('iblock'))
        {
            $dbModels = CIBlockElement::GetList(array(),array("IBLOCK_ID" => 159, "PROPERTY_BRAND" => $_GET["arrFilter_pf"]['BRAND']),false,false,array("NAME","ID"));
            while ($obModels = $dbModels->Fetch())
            {
                $arModels[] = $obModels;
            }
        }
        foreach ($arModels as $key => $arItem)
            if (isset($arItem['PROPERTY_BRAND_VALUE']))
                unset($arModels[$key]);
        ?>
        <div class="zapblock zapmodel">
            <label for="model-zapchasti" style='margin-right:38px'><b style='display: block;float: left;margin-top: 5px;'>Модель:</b></label>
            <select name="model-zapchasti" class="model-zapchasti" >
                <option value="">не выбрано</option>
            <? foreach ($arModels as $arItem): ?>
                <? if ( ($_GET["arrFilter_pf"]['MODEL'] == $arItem['ID']) && isset($_GET["arrFilter_pf"]['BRAND'])): ?>
                    <option  selected="selected" value="<?= $arItem['ID'] ?>"><?= $arItem['NAME'] ?></option>
                <? else: ?>
                    <option value="<?= $arItem['ID'] ?>"><?= $arItem['NAME'] ?></option>
                <? endif ?>
            <? endforeach; ?>
            </select>
        </div>
    <?else:?>
    <div class="zapblock zapmodel" style='display:none'>
        <label for="model-zapchasti" style='margin-right:38px'><b style='display: block;float: left;margin-top: 5px;'>Модель:</b></label>
        <select name="model-zapchasti" class="model-zapchasti" >
        </select>
    </div>
    <?endif;?>
    <tfoot style='display:none'>
        <tr>
            <td colspan="2">
                <input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" /><input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;<input type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" /></td>
        </tr>
    </tfoot>
    </table>
</form>
<?$model = $_GET["arrFilter_pf"]['MODEL']?>
 
<?//endif;
?>
</div>

<br clear="all"/>
<?
//if ($_SERVER['REQUEST_URI']!="/catalog/zapchasti/") {
?>
<br />
<b>Кол-во товаров: <?=$arResult["COUNT_ITEMS"]?></b>
<br clear="all"/>
<?
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ajax/FilterArResZap.txt', print_r($arResult,true));
//}
?>

<script>
    $(document).ready(function(){
        $('.zapbrand-model li').on('click',function(){
            $.ajax({
                url: '/ajax/filterModel.php',
                type: 'POST',
                data: {ID:parseInt($(".zapbrand-model option:selected").val()), choosen:<?=json_encode($model)?>},
                success: function(html){
                    $('.zapmodel model-zapchasti').html(html);
                }
            });
            $.ajax({
                url: '/ajax/filterModelFinally.php',
                type: 'POST',
                data: {ID:parseInt($(".zapbrand-model option:selected").val())},
                success: function(html){
                    $('.zapmodel ul.sbOptions').html(html);
                    $('.zapmodel a.sbSelector').html('не выбрано');
                    $('.zapmodel').show();
                }
            }); 
           $('.form2 input[name="arrFilter_pf[BRAND]"]').val("");
        });
        $(document).on('click', '.zapmodel li', function (e){
            e.preventDefault();
            currModelName = $(this).find('a').text();
            currModelID = $(this).find('a').attr('rel');
            $(this).parent().css('display','none');
            $('.zapmodel a.sbSelector').html(currModelName);
            $('#filters_container .form2 input[name="arrFilter_pf[MODEL]"]').val(currModelID);
            $('#filters_container .form2').attr("action","/catalog/zapchasti/");
            $('#filters_container .form2').submit(); 
        });
    });
</script>
