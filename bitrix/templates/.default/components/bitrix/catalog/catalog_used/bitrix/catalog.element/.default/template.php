<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?$this->setFrameMode(true);?>
<?  include_once($_SERVER['DOCUMENT_ROOT'] . '/watermark.php');//print_r($arResult) ?> 
<div class="catalog-detail used">
    <div class="ppic detail">
        <div class="image-main image">		
            <? if (count($arResult["PICTURES"]) > 0): ?>
                <a rel="gal1" class="fancybox" href="<?= watermark_function($arResult["PICTURES"][0]["NATURE"]) ?>"  title="<?= $arResult["NAME"] ?>">
                <? endif; ?>
                <table><tr><td>
                            <? if (!empty($arResult["PICTURES"][0]["STANDART"]["src"])): ?>
                                <?php
                              
                                $image_path = watermark_function($arResult["PICTURES"][0]["STANDART"]["src"]);
                                
                               // __($arResult["PICTURES"][0]["STANDART"]["src"]);
                                ?>

                                <img src="<?= $image_path?>" width="<?= $arResult["PICTURES"][0]["STANDART"]["width"] ?>" height="<?= $arResult["PICTURES"][0]["STANDART"]["height"] ?>" alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>" />
                            <? else: ?>
                                <img src="<?= getImageNoPhoto(338, 278) ?>" alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>" />
                            <? endif; ?>
                        </td></tr></table>
                <? if (count($arResult["PICTURES"]) > 0): ?>
                    <span class="full"></span>
                </a>
            <? endif; ?>
        </div>
        <? if (count($arResult["PICTURES"]) > 1): ?>
            <div class="jcarousel" id="carousel-detail">
                <ul>
                    <? foreach ($arResult["PICTURES"] as $key => $arPhoto): ?>
                        <? if ($key > 0): ?>
                            <li>
                                <a rel="gal1" href="<?= watermark_function($arPhoto["NATURE"]) ?>" width-pic="<?= $arPhoto["STANDART"]["width"] ?>" height-pic="<?= $arPhoto["STANDART"]["height"] ?>" class="image <? if ($key == 0): ?>active<? endif; ?> fancybox-thumb">
                                    <table><tr><td>
                                                <img big-pic="<?= watermark_function($arPhoto["NATURE"]) ?>" src="<?= $arPhoto["SMALL"]["src"] ?>" width="<?= $arPhoto["SMALL"]["width"] ?>" height="<?= $arPhoto["SMALL"]["height"] ?>" />
                                            </td></tr></table>
                                </a>
                            </li>
                        <? endif; ?>
                    <? endforeach; ?>
                </ul>
                <? if (count($arResult["PICTURES"]) > 4): ?>
                    <button class="jcarousel-prev"></button>
                    <button class="jcarousel-next"></button>
                <? endif; ?>
            </div>
        <? endif; ?>
        <div class="cl"></div>
    </div>
    <div class="properties">	
        <?
       // pr($arResult["PROPERTIES"]);
        ?>
        <? if (!empty($arResult["PROPERTIES"])): ?>
            <div class="characteristics <? if ($arResult["PRICES"]["BASE"]["VALUE"] > 0): ?> with-price<? endif; ?> <? if (count($arResult["PICTURES"]) <= 1): ?> short<? endif; ?>">
                <div class="title">Основные характеристики</div>
                <div class="chars">
                    <? foreach ($arResult["PROPERTIES"] as $arProp): ?>
                        <? if (!empty($arProp["VALUE"]) && !is_array($arProp["VALUE"]) && $arProp["CODE"] != "PHOTOS" && $arProp["CODE"] != "LOT" && $arProp["CODE"] != "ENABLE_DETAIL_PAGE" /*&& $arProp["CODE"] != "PRICE"*/): ?>
                            <div>
                                <span class="name"><?= $arProp["NAME"] ?></span>
                                <span class="value"><b><?= $arProp["VALUE"] ?></b></span>
                                <div class="clear"></div>
                            </div>
                            <?
                            //SEO CODE
                            if ($arProp["NAME"]=="Цена") $priceprop=$arProp["VALUE"];
                            ?>
                        <? endif; ?>
                    <? endforeach; ?>
                </div>
            </div>
        <? endif; ?>
        
        
        <?if($priceprop > 0):?>
			<br clear="all" /><div class="price">Цена: 
				<?echo number_format($priceprop,0,"."," ");?> руб.
			</div>
 		  <?endif;?>
        
        <!--? if ($arResult["PROPERTIES"]["PRICE"]["VALUE"] != ""): ?>
            <div class="price">
                <-?= CurrencyFormat($arResult["PROPERTIES"]["PRICE"]["VALUE"], $arResult["PRICES"]["BASE"]["CURRENCY"]); ?>
            </div>
        <-? endif; ?-->

        <?
        $CATALOG_order = COption::GetOptionInt("ust", "CATALOG_order");
        $CATALOG_question = COption::GetOptionInt("ust", "CATALOG_question");
        $CATALOG_kredit = COption::GetOptionInt("ust", "CATALOG_kredit");
        $CATALOG_arenda = COption::GetOptionInt("ust", "CATALOG_arenda");
        ?>

            <? if ($CATALOG_kredit == 1 || $CATALOG_question == 1): ?>
            <div class="left">
                <? if ($CATALOG_question == 1): ?>
                    <button class="question silver">Задать вопрос</button>
                <? endif; ?>

                <? if ($CATALOG_kredit == 1): ?>
                    <a href="#" class="rassrochka">Заказать в лизинг</a>
            <? endif; ?>
            </div>
        <? endif; ?>
            <? if ($CATALOG_order == 1 || $CATALOG_arenda == 1): ?>
            <div class="right">
                <? if ($CATALOG_order == 1): ?>
                    <button class="order">Купить</button>
                <? endif; ?>
                <? if ($CATALOG_arenda == 1): ?>
                    <a href="#" class="arenda">Взять в аренду</a>
            <? endif; ?>
            </div>
<? endif; ?>
        <input type="hidden" name="lot" value="<?= $arResult["NAME"] ?>" />
        <input type="hidden" name="section_name" value="<?= $arResult["IBLOCK_SECTION_NAME"] ?>" />
    
    
    <div class="clear"></div><br /><div align="right">
    <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script><div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="link" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,lj,gplus"></div>
    </div>
    
    
    
    </div>
    <div class="clear"></div>
    <!--div class="tabs-detail border_gray" id="tabs-used-detail">
            <ul>				
                    <li><a href="#description">Описание</a><span></span></li>
                    <div class="clear"></div>
            </ul>
            <div class="page" id="description">
    <? if (!empty($arResult["PREVIEW_TEXT"])): ?>
        <? if ($arResult["PREVIEW_TEXT_TYPE"] == "text"): ?>
                                            <p><?= $arResult["PREVIEW_TEXT"] ?></p>
        <? else: ?>
            <?= $arResult["PREVIEW_TEXT"] ?>
        <? endif; ?>
    <? endif; ?>
    <? if (!empty($arResult["DETAIL_TEXT"])): ?>
        <? if ($arResult["DETAIL_TEXT_TYPE"] == "text"): ?>
                                            <p><?= $arResult["DETAIL_TEXT"] ?></p>
        <? else: ?>
            <?= $arResult["DETAIL_TEXT"] ?>
        <? endif; ?>
    <? endif; ?>
    <? if (empty($arResult["PREVIEW_TEXT"]) && empty($arResult["DETAIL_TEXT"])): ?>
                                <p>Описание отсутствует.</p>
<? endif; ?>
                    </div>
            <div class="clear"></div>
    </div-->
    <div class="clear"></div>
    
    

</div>
<div class="dialog" id="order_catalog">
<? $APPLICATION->IncludeComponent("areal:form.order.new", "popup", array("THEME_TYPE" => "b-u-tekhnika")); ?>
</div>
