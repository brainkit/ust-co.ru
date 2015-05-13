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

//__($arResult);
?>
<form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="<? echo $arResult["FORM_ACTION"] ?>" method="get" class="zapchasti-filter">
    <?
    foreach ($arResult["ITEMS"] as $arItem):
        if (array_key_exists("HIDDEN", $arItem)):
            echo $arItem["INPUT"];
        endif;
    endforeach;
    ?>
    
    <div>
        <label for="name-zapchasti">Название или оригинальный  номер</label>
        <input type="text" name="name-zapchasti" class="name-zapchasti" />
    </div>
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <? if (!array_key_exists("HIDDEN", $arItem)): ?>
                <? $css = str_replace(array("[", "]"), "", $arItem["INPUT_NAME"]); ?>
            <div class="<?= $css ?>">
                <label for="<?=$arItem["INPUT_NAME"]?>"><?= $arItem["NAME"] ?>:</label> 
            <?= $arItem["INPUT"] ?> 
            </div>
            <? endif ?>
        <? endforeach; ?>
    <div class="submit">
        <input type="submit" name="set_filter" value="<?= GetMessage("IBLOCK_SET_FILTER") ?>" /><input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;<!--input type="submit" name="del_filter" value="<?= GetMessage("IBLOCK_DEL_FILTER") ?>" /-->
    </div>	 
</form>
