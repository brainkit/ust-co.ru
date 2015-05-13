<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<?  include_once($_SERVER['DOCUMENT_ROOT'] . '/watermark.php'); ?> 
<div class="catalog-detail used zapchasti detail">
    <div class="ppic detail">

<?
if (CModule::IncludeModule('alexkova.megametatags'))
{
    $arKeys[] = array("KEY"=>"ELEMENT_NAME","VALUE"=>$arResult['NAME'],"WHERE_SET"=>"");   
    $arKeys[] = array("KEY"=>"ELEMENT_BRAND","VALUE"=>$arResult['PROPERTIES']['BRAND']['VALUE'],"WHERE_SET"=>"");   
    $arKeys[] = array("KEY"=>"DETAIL_SECTION_NAME","VALUE"=>$arResult['SECTION']['NAME'],"WHERE_SET"=>"");   
    if ($arKeys){
       CMegaMetaKeys::setKeys($arKeys);      
    } 
    // file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ajax/testbrand.txt', print_r($arResult,true));
}

//SEO CODE
//закрываем картинки по ряду брендов
$flagshowfoto=true;
if (preg_match("/ammann|manitou|PARKER PLANT|SCREEN MACHINE|SANDVIK|TESAB/i",$arResult["PROPERTIES"]["BRAND"]["VALUE"])) {
   $flagshowfoto=false;
}

?>


        <div class="image-main image">		
            <? if (count($arResult["PICTURES"]) > 0): ?>
                <a rel="gal1" class="fancybox" href="<?= watermark_function($arResult["PICTURES"][0]["NATURE"]) ?>" >
                <? endif; ?>
                <table><tr><td>
                            <? if ($flagshowfoto and !empty($arResult["PICTURES"][0]["STANDART"]["src"])): ?>
                                <?php
                              
                                $image_path = watermark_function($arResult["PICTURES"][0]["STANDART"]["src"]);
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
                <div class="title">Общие характеристики</div>
                <div class="chars">
                    <? foreach ($arResult["PROPERTIES"] as $arProp): 
                    //echo "<!-- xxxxxx";
                    //print_r($arProp);
                    //echo " -->";
                    ?>
                        <? if (!empty($arProp["VALUE"]) && !is_array($arProp["VALUE"]) && $arProp["CODE"] != "PHOTOS" && $arProp["CODE"] != "LOT" && $arProp["CODE"] != "NUMBERORIGINALEN" && $arProp["CODE"] != "ENABLE_DETAIL_PAGE" /*&& $arProp["CODE"] != "PRICE"*/): ?>
                            <?
                            if ($arProp["CODE"]!="PRICE") {
                            ?>
                            <div>
                                <span class="name"><?= $arProp["NAME"] ?></span>
                                <span class="value"><b><?= $arProp["VALUE"] ?></b></span>
                                <div class="clear"></div>
                            </div>
                           
                            <?
                            }
                            //SEO CODE
                            if ($arProp["CODE"]=="PRICE") $priceprop=$arProp["VALUE"];
                            ?>
                        <? endif; ?>
                        

                        
                    <? endforeach; ?>
                
                
                <div class="zap-nal">
                  <br />
                  Наличие: есть<br />
                  Доставка: по всей России<br />
                                <div class="clear"></div>
                </div>
                
                </div>
            </div>
        <? endif; ?>
        
        <br clear="all" /><div class="price">
        Цена: 
        <?if($priceprop > 0) {
				echo number_format($priceprop,0,"."," ")." руб.";
 		  }
 		  else {
            echo "по запросу"; 
 		  }
 		  ?>
 		 
        </div>
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


            </div>
        <? endif; ?>
            <? if ($CATALOG_order == 1 || $CATALOG_arenda == 1): ?>
            <div class="right">
                <? if ($CATALOG_order == 1): ?>
                    <button class="order"><?echo (($priceprop > 0)?("Купить"):("Запросить цену"));?></button>
                <? endif; ?>

            </div>
<? endif; ?>
        <input type="hidden" name="lot" value="<?= $arResult["NAME"] ?>" />
        <input type="hidden" name="section_name" value="<?= $arResult["IBLOCK_SECTION_NAME"] ?>" />
        <input type="hidden" name="element_code" value="<?= $arResult["PROPERTIES"]["ELCODE"]["VALUE"] ?>" />
    </div>
    <div class="clear"></div>
    
    

          
                    <? foreach ($arResult["PROPERTIES"] as $arProp): 
                    //echo "<!-- xxxxxx";
                    //print_r($arProp);
                    //echo " -->";
                    ?>

                        
                        <?
                         //SEO CODE
                         //применение к технике 
                            if(is_array($arProp["VALUE"]) && $arProp["CODE"] == "MODEL" && count($arProp["VALUE"])>0) {
                              echo '
                              <div style="margin:20px;"><br />
                                <span class="name"><b>Применение к технике:</b><br /> </span>
                                <span class="value">
                              ';
                              
                              
                              $dbElemList = CIBlockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => 159, "ID" => $arProp["VALUE"]));

                                 while ($arElemList = $dbElemList->Fetch())
                                 {
                                     if (!empty($arElemList))
                                     {
                                         $db_props1 = CIBlockElement::GetProperty(159, $arElemList["ID"], array("sort" => "asc"), Array("CODE"=>"BRAND"));
                                          if($ar_props1 = $db_props1->Fetch()) {
                                              //echo $ar_props1["VALUE"]." ";
                                              
                                              //берем название бренда
                                              if ($ar_props1["VALUE"]>0) {
                                                 $dbElemList1 = CIBlockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => 9, "ID" => $ar_props1["VALUE"]));
                                                 $arElemList1 = $dbElemList1->Fetch();
                                                 echo " ".$arElemList1["NAME"]."  ";
                                              }
                                              
                                              
                                          }
                                          
                                          echo $arElemList["NAME"]."";
                                          echo "<br />";
    
                                     }
                                 }

                              echo '
                               </span>
                                <div class="clear"></div>
                               </div>
                               ';
                            }
                            
                            
                            
                            
                            
                            
                             if($arProp["VALUE"] && $arProp["CODE"] == "NUMBERORIGINALEN") {
                              
                              //спасение от длинных строк без пробелов
                              $arProp["VALUE"]=preg_replace("/,/",", ",$arProp["VALUE"]);
                              $arProp["VALUE"]=preg_replace("/\//","/ ",$arProp["VALUE"]);
                              $arProp["VALUE"]=preg_replace("/\\\/","\ ",$arProp["VALUE"]);
                              
                              echo '
                              <div style="margin:20px;">
                                <span class="name"><b>Аналоги:</b><br /> </span>
                                <span class="value">
                              ';
                              
                              echo $arProp["VALUE"];
                              
               
                              echo '
                               </span>
                                <div class="clear"></div>
                               </div>
                               ';
                            }
                            
                            
                            
                            
                            
                            
                        ?>
                        
                    <? endforeach; ?>
               
<?
//echo "<!-- xxxxxx";
//print_r($arResult);
//echo " -->";
?>


<?
//if ($USER->IsAdmin()) {
?>
<br /><br />
<div class="preimusshestva zdetails">
<br />

            
            <div class="zap ordering_zapchasti"><span>Заявка на запчасти</span></div>
            
            <div class="serv ordering_service"><span>Заявка в сервис</span></div>
            
            <div class="dost"><span><a href="http://ust-co.ru/dostavka/">Доставка</a> по всей России</span></div>

            <div class="fil"><span><a href="http://ust-co.ru/filialy/">Филиалы</a> и <a href="http://ust-co.ru/servis/">сервис</a> по всей России</span></div>

</div>

<?
//}
?>
               
<br /><br />
<div class="help-plate">
            <div class="need-help">Хотите купить? Сложности с выбором? </div>
            <div class="phone">Мы поможем&nbsp;&nbsp;&mdash;&nbsp;<span><? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/phone.php"), false); ?></span></div>
        </div>

    
    
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


<div class="dialog" id="order_service">
   <div align="justify"> 
  <p><?$APPLICATION->IncludeComponent("areal:form.service", ".default");?> 	 
  </p>
  </div>
</div> 


<script>
    $(".ordering_service").on("click", function (e) {
        e.preventDefault();
        $('#order_service').dialog({
            dialogClass: 'dialog',
            autoOpen: false,
            width: 450,
            resizable: false,
            draggable: false,
            position: "center",
            modal: true,
            closeText: "закрыть"
        });
        var name = $(this).closest(".items").find("input[name='item_name']").val();

        $('form[name=order_catalog] input[name=form_theme]').val($(this).text());


        $('input.phone').mask("+7(999) 999-99-99");
        $('#order_service').dialog("open");

    });
    
    $(".ordering_zapchasti").on("click", function (e) {
        e.preventDefault();
        $('#order_catalog').dialog({
            dialogClass: 'dialog',
            autoOpen: false,
            width: 450,
            resizable: false,
            draggable: false,
            position: "center",
            modal: true,
            closeText: "закрыть"
        });
        //var name = 'заявка на запчасти';
        var name = 'Заявка на запчасти: ' + $('body').find('h1').text();

        $('form[name=order_catalog] input[name=form_theme]').val($(this).text());
        $('#order_catalog').find('input[name="DESCRIPTION"]').attr("value", name);
        $('#order_catalog').find('input[name="ELCODE"]').attr("value", "");

        $('input.phone').mask("+7(999) 999-99-99");
        $('#order_catalog').dialog("open");

    });

    
    
</script>  