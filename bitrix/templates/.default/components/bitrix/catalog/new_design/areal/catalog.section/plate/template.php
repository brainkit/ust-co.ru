<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); 
$this->setFrameMode(true); 
?>
<?
//pr($arResult["ITEMS"], false);
?>
<? if (count($arResult["ITEMS"]) > 0): ?>
    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
    <div class="clear"></div>
    <div class="catalog-plate catalog">
        <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
            <div class="items <? if (($key + 1) % 2 == 0): ?>last<? endif; ?>" id="item_<?= $arItem["ID"] ?>">
                <? if (!empty($arItem["PROPERTIES"]["ACTIONS"]["VALUE"])): ?>
                    <span class="action popup"><?= $arItem["PROPERTIES"]["ACTIONS"]["NAME"] ?></span>
                <? endif; ?>
                <? if (!empty($arItem["PROPERTIES"]["NEW"]["VALUE"])): ?>
                    <span class="new popup"><?= $arItem["PROPERTIES"]["NEW"]["NAME"] ?></span>
                <? endif; ?>
                <? if (!empty($arItem["PROPERTIES"]["SEASONAL"]["VALUE"])): ?>
                    <span class="season popup"><?= $arItem["PROPERTIES"]["SEASONAL"]["NAME"] ?></span>
                <? endif; ?>	
                <? if (!empty($arItem["PROPERTIES"]["SALE"]["VALUE"])): ?>
                    <span class="sale popup"><?= $arItem["PROPERTIES"]["SALE"]["NAME"] ?></span>
                <? endif; ?>	
                <? if (!empty($arItem["PROPERTIES"]["CREDIT"]["VALUE"])): ?>
                    <span class="credit popup"><?= $arItem["PROPERTIES"]["CREDIT"]["NAME"] ?></span>
                <? endif; ?>
                <a class="image" href="<?= $arItem["DETAIL_PAGE_URL"] ?>" title="<?= $arItem["NAME"] ?>"><table><tr><td>
                                <? if (!empty($arItem["PICTURE"]["src"])): ?>
                                    <img src="<?= $arItem["PICTURE"]["src"] ?>" width="<?= $arItem["PICTURE"]["width"] ?>" height="<?= $arItem["PICTURE"]["height"] ?>" alt="<?= $arItem["NAME"] ?>" title="<?= $arItem["NAME"] ?>" />
                                <? else: ?>
                                    <img src="<?= getImageNoPhoto(160, 224) ?>" alt="<?= $arItem["NAME"] ?>" title="<?= $arItem["NAME"] ?>" />
                                <? endif; ?>
                            </td></tr></table></a>
                <?
                $base_price_arr = GetCatalogProductPriceList($arItem["ID"], "ID", "ASC");
                //$file = $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/.default/components/bitrix/catalog/new_design/areal/catalog.section/list/test.txt";

                $normal_price = $arItem["PROPERTIES"]["PRICE"]["VALUE"];
                $base_price = $base_price_arr[0]["PRICE"];
                $old_price = $arItem["PROPERTIES"]["OLD_PRICE"]["VALUE"];

                $price_to_show = "";
                if ($base_price != "")
                    $price_to_show = $base_price;
                else
                    $price_to_show = $normal_price;
                //file_put_contents($file, print_r(, true), FILE_APPEND);
                ?>
                <div class="info">
                    <div class="description">
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="title" title="<?= $arItem["NAME"] ?>"><span><?= $arItem["PROPERTIES"]["SHORT_NAME"]["VALUE"] ? $arItem["PROPERTIES"]["SHORT_NAME"]["VALUE"] : $arItem["NAME"] ?></span></a>
                        <span class="brand"><?= $arItem["BRAND"] ?></span>

                        <?
                        //вывод старой цены
                        //$base_price = GetCatalogProductPriceList($arItem["ID"],"ID","ASC");	
                        $file = $_SERVER['DOCUMENT_ROOT'] . "/bitrix/templates/.default/components/bitrix/catalog/new_design/areal/catalog.section/list/test.txt";


                        if ($old_price != "" && $base_price != "") {
                            echo '<span class="old_price" style="text-decoration: line-through;">' . CurrencyFormat($old_price, $base_price_arr[0]["CURRENCY"]) . '</span>';
                        } else if ($old_price != "" && $base_price == "") {
                            echo '<span class="old_price" style="font-size: 14px; text-decoration: line-through;">' . CurrencyFormat($old_price, "RUB") . '</span>';
                        }
                        ?>
                        <?
                        if ($price_to_show != "" && $base_price_arr[0]["CURRENCY"] != "") {
                            //вывод цены
                            echo '<span class="price">' . CurrencyFormat($price_to_show, $base_price_arr[0]["CURRENCY"]) . '</span>';
                        } else if ($price_to_show != "" && $base_price_arr[0]["CURRENCY"] !== "") {
                            echo '<span class="price">' . CurrencyFormat($price_to_show, "RUB") . '</span>';
                        }
                        ?>


                        <div class="characteristics">
                            <? foreach ($arItem["PROPERTIES"] as $prop_key => $arProp): ?>
                                <? if (!in_array($prop_key, $arParams["PERMANENT_PROPERTY"]) && !empty($arProp["VALUE"])): ?>
                                    <? if (!is_array($arProp["VALUE"]) and $arProp["NAME"] != "Видео" and $arProp["NAME"] != "Фотографии" and $arProp["NAME"] != "Короткое название" and $arProp["NAME"] != "Вам могут быть интересны"): ?>
                                        <p><?= $arProp["NAME"] ?> <span><?= $arProp["VALUE"] ?></span></p>
                                    <? endif; ?>
            <? endif; ?>
        <? endforeach; ?>
                        </div>
                    </div>
                    <input type="hidden" name="item_name" value="<?= $arItem["NAME"] ?>" />
                    <button name="ordering">Запрос цены</button>
                </div>
                <div class="clear"></div>
                <div class="comparison"></div>
            </div>
    <? endforeach; ?>	
    </div>
    <div class="hr"></div>
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
<? else: ?>
    <div class="clear"></div>
    <p class="errortext">К сожалению, в данном разделе нет доступных товаров.</p>
    <div class="clear"></div>
<? endif; ?>