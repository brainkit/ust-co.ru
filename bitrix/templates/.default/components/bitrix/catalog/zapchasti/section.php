<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$this->setFrameMode(true);

//global $USER;
//if ($USER->IsAdmin())
//{
$arFilter = array('CODE' => $arResult["VARIABLES"]["SECTION_CODE"], 'IBLOCK_ID' => CATALOG, 'IBLOCK_TYPE' => 'catalog');
$arGroupBy = false;
$arNavStartParams = false;
$arSelectFields = array('ID', 'IBLOCK_ID', 'CODE', 'NAME');

$rcs = CIBlockSection::GetList($arOrder, $arFilter, $arGroupBy, $arNavStartParams, $arSelectFields);
while ($arSect = $rcs->GetNext())
{
    $arResult["VARIABLES"]["SECTION_ID"] = $arSect["ID"];
}
//print_r($arResult["VARIABLES"]["SECTION_ID"]) ;
$_SESSION["CATALOG_FILTER_NAME"] = $arParams["FILTER_NAME"];
$_SESSION["CATALOG_IBLOCK_TYPE"] = $arParams["IBLOCK_TYPE"];
$_SESSION["CATALOG_IBLOCK_ID"] = $arParams["IBLOCK_ID"];

$arFilter = array('IBLOCK_ID' => $arParams["IBLOCK_ID"], "ID" => $arResult["VARIABLES"]["SECTION_ID"]);
$db_list = CIBlockSection::GetList(Array("SORT" => "ASC"), $arFilter, false, array("UF_TEMPLATE"));
if ($ar_result_uf = $db_list->GetNext())
{
    $_REQUEST["UF_TEMPLATE"] = $ar_result_uf["UF_TEMPLATE"];
}

?>

<?
//SEO CODE ! Caution!)
//читаем существующие вложенные разделы 

//если главный раздел то выводим баннер
$flag_main_zap=false;

if ($_SERVER['REQUEST_URI']=="/catalog/zapchasti/" or preg_match("/catalog\/zapchasti\/(\?from=\w+)$/",$_SERVER['REQUEST_URI'])) {
   $flag_main_zap=true;   
}

if ($flag_main_zap) echo '<img src="/images/ban_zch.jpg" alt="каталог запчастей спецтехники"><br /><br />
';


//главная страница каталога ЗЧ
if ($flag_main_zap) {
   
   $arrmaincats1=array(
   "dlya-stroitelnoy-tekhniki",
   "dlya-drobilok",
   "dlya-skladskoy-tekhniki",
   "zapchasti-dlya-kranov",
   "zapchasti-dlya-generatorov-sdmo",
   "zapchasti-burovoe",
   "masla-i-gsm",
   "kolesa-shiny-diski",
   "pto-6cd888e6-b42e-11e0-9a6d-001517469093",
   "filters"
   );

   $arrmaincats2=array(
   "zapchasti-john-deere",
   "zapchasti-ammann",
   "zapchasti-manitou",
   "zapchasti-sdmo",
   "zapchasti-yale",
   "zapchasti-unilift",
   "zapchasti-combilift",
   "modeli-tekhniki"
   );



   $arrarez1=array();
   $arrarez2=array();

   //берем только нужные разделы с кол-вом 
   $dbSectList1 = CIBlockSection::GetList(array("sort" => "ASC"), array("IBLOCK_ID" => "158", "ACTIVE"=>"Y"), false, array("UF_PRODCNT"));
   while ($arSectList1 = $dbSectList1->GetNext()) {
      if (in_array($arSectList1["XML_ID"],$arrmaincats1)) $arrarez1[$arSectList1["XML_ID"]]=$arSectList1;
      if (in_array($arSectList1["XML_ID"],$arrmaincats2)) $arrarez2[$arSectList1["XML_ID"]]=$arSectList1;
   }

   echo '<div class="zapmaincateg">';
   foreach($arrmaincats1 as $xmlid) {
      echo "<div><a href=\"".($arrarez1[$xmlid]["SECTION_PAGE_URL"])."\">".($arrarez1[$xmlid]["NAME"])."</a>".(($arrarez1[$xmlid]["UF_PRODCNT"])?(" [".($arrarez1[$xmlid]["UF_PRODCNT"])."]"):(""))."</div>";
   }
   echo '</div>';

   echo '<div class="zapmaincateg">';
   foreach($arrmaincats2 as $xmlid) {
      echo "<div><a href=\"".$arrarez2[$xmlid]["SECTION_PAGE_URL"]."\">".$arrarez2[$xmlid]["NAME"]."</a>".(($arrarez2[$xmlid]["UF_PRODCNT"])?(" [".$arrarez2[$xmlid]["UF_PRODCNT"]."]"):(""))."</div>";
   }
   echo '</div><br /><br />';


}
else
{
   
//внутр. развороты каталога ЗЧ

   if ($arResult["VARIABLES"]["SECTION_ID"] and $arResult["VARIABLES"]["SECTION_ID"]>0) {

           
          // if ($USER->IsAdmin()) {
            
            ?>
            
<div class="preimusshestva">

<div class="redtext">
<?
if (preg_match("/\/catalog\/zapchasti\/modeli-tekhniki\/na-[\w\-]+\/[\w\-]+/", $_SERVER['REQUEST_URI'])) {
    echo "Уважаемые клиенты! На данной странице представлен не полный перечень запчастей. Оставьте заявку на подбор запчастей, и наши специалисты  свяжутся с Вами в ближайшее время:";
}
else {
   echo "Оставьте заявку на подбор запчастей, и наши специалисты  свяжутся с Вами в ближайшее время:";
}
?>
</div>     

<div class="zap ordering_zapchasti"><span>Заявка на запчасти</span></div>
<div class="serv ordering_service"><span>Заявка в сервис</span></div>
<div class="dost"><span><a href="http://ust-co.ru/dostavka/">Доставка</a> по всей России</span></div>
<div class="fil"><span><a href="http://ust-co.ru/filialy/">Филиалы</a> и <a href="http://ust-co.ru/servis/">сервис</a> по всей России</span></div>

</div>            
            
            <?
            
            
            
            //echo '<div class="ordering_zapchasti">заявка на запчасти</div> ';
            //echo '<div class="ordering_service">заявка на сервис</div>';
           
           //}
                      
           $sectcount = CIBlockSection::GetCount(array("IBLOCK_ID" => "158", "ACTIVE"=>"Y", "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"]));
           $dbSectList1 = CIBlockSection::GetList(array("sort" => "ASC","name" => "ASC"), array("IBLOCK_ID" => "158", "ACTIVE"=>"Y", "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"]),false,array("UF_PRODCNT"));
           if ($sectcount>0) echo '<div class="hr"></div>';
           echo '<div class="zapcateg">';
           $i=0;
           while ($arSectList1 = $dbSectList1->GetNext()) {
               echo "<div><a href=\"".$arSectList1["SECTION_PAGE_URL"]."\">".$arSectList1["NAME"]."</a>".(($arSectList1["UF_PRODCNT"])?(" [".$arSectList1["UF_PRODCNT"]."]"):(""));
               

               
               //считаем кол-во в каждом - неудачное решение! т.к. долго работает.
               /*
               $elemcount=0;
               $arElem1=array();
               $dbElemList1 = CIBlockElement::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => "158", "SECTION_ID" => $arSectList1["ID"], "INCLUDE_SUBSECTIONS" => "Y"));
               while ($arElem1 = $dbElemList1->GetNext()) {
                 if ($arElem1["ID"]) $elemcount++;
               }
               echo "(".$elemcount.")";
               */
               echo "</div>";
               $i++;
               if ($i==(ceil($sectcount/2))) echo '</div><div class="'.(($flag_main_zap)?("zapmaincateg"):("zapcateg")).'">';
           }
           echo "</div>";
   }
}        

/*
if ($flag_main_zap) {
  
   
   echo '<div class="zapcateg1">';
   echo '<div><b><a href="/catalog/zapchasti/dlya-stroitelnoy-tekhniki/kolesa-shiny-diski/">Шины, диски для стройтехники</a></b></div>';
   $dbSectList1 = CIBlockSection::GetList(array("sort" => "ASC"), array("IBLOCK_ID" => "158", "SECTION_ID" => "1146"), false, array("UF_PRODCNT"));
        while ($arSectList1 = $dbSectList1->GetNext()) {
            echo "&nbsp;&nbsp;<a href=\"".$arSectList1["SECTION_PAGE_URL"]."\">".$arSectList1["NAME"]."</a>".(($arSectList1["UF_PRODCNT"])?(" [".$arSectList1["UF_PRODCNT"]."]"):(""));
            echo "<br />";
        }
   echo "</div>"; 
   
   echo '<div class="zapcateg1">';
   echo '<div><b><a href="/catalog/zapchasti/dlya-skladskoy-tekhniki/kolesa-shiny-diski/">Шины, диски для складской техники</a></b></div>';
   $dbSectList1 = CIBlockSection::GetList(array("sort" => "ASC"), array("IBLOCK_ID" => "158", "SECTION_ID" => "1094"), false, array("UF_PRODCNT"));
        while ($arSectList1 = $dbSectList1->GetNext()) {
            echo "&nbsp;&nbsp;<a href=\"".$arSectList1["SECTION_PAGE_URL"]."\">".$arSectList1["NAME"]."</a>".(($arSectList1["UF_PRODCNT"])?(" [".$arSectList1["UF_PRODCNT"]."]"):(""));
            echo "<br />";
        }
   echo "</div>"; 
   echo '<br clear="all"/><br />';
}
*/

//SEO CODE END






//__($arResult["VARIABLES"]["SECTION_ID"]); 

$APPLICATION->IncludeComponent(
	"unispec:catalog.filter", 
	"zapchasti", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "158",
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"FILTER_NAME" => "arrFilter",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "BRAND",
			1 => "UNIQUENUM",
			2 => "MODEL",
			3 => "",
		),
		"PRICE_CODE" => array(
		),
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"LIST_HEIGHT" => "5",
		"TEXT_WIDTH" => "20",
		"NUMBER_WIDTH" => "5",
		"SAVE_IN_SESSION" => "N"
	),
	false
); 





//} 
include($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/meta_tags.php');
//print_r ($s_meta_array[$_SERVER['REQUEST_URI']][seosmall]);
//echo $_SERVER['REQUEST_URI'];
?> 

<? 

//выводим форму и информацию на главную по З.Ч.
if ($flag_main_zap) {
  
     ?>
<div class="hr"></div><br />
<div align="justify"> 
  <p><?$APPLICATION->IncludeComponent("areal:form.service", ".default");?> 	 
  </p>
</div>
   
   <? 

   $res1 = CIBlockSection::GetByID(1054);
   if($ar_res1 = $res1->GetNext()) {
     echo '';
     echo $ar_res1['DESCRIPTION'];
     echo '';
   } 
   

}   

?>



<?
?>

<?
if ($arResult["VARIABLES"]["SECTION_CODE"] || $arResult["VARIABLES"]["SECTION_ID"])
{
    if ($arResult["VARIABLES"]["SECTION_CODE"])
        $filter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "CODE" => $arResult["VARIABLES"]["SECTION_CODE"]);
    elseif ($arResult["VARIABLES"]["SECTION_ID"])
        $filter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ID" => $arResult["VARIABLES"]["SECTION_ID"]);

    $sect = CIBlockSection::GetList(array(), $filter, false, array("UF_IBLOCK_158_SECTIO", "UF_UF_SHORT_SEO_TEXT"));
    if ($sec = $sect->GetNext())
    {
        $SECTION_ID = $sec["ID"];
        //$DEPTH_LEVEL = $sec["DEPTH_LEVEL"];
        //seo code
        //добавлено условие, чтобы сео-тексты отображались только на главной странице раздела
        if (!empty($sec["~UF_UF_SHORT_SEO_TEXT"]) and !preg_match("/PAGEN|filter/",$_SERVER['REQUEST_URI']))
            $SHORT_SEO_TEXT = $sec["~UF_UF_SHORT_SEO_TEXT"];
        if (!empty($sec["~UF_IBLOCK_158_SECTIO"]) and !preg_match("/PAGEN|filter/",$_SERVER['REQUEST_URI']))
            $LONG_SEO_TEXT = $sec["~UF_IBLOCK_158_SECTIO"];
        //seo code end
    }
}
?>
    <? if (!empty($SHORT_SEO_TEXT)): ?>
    <div class="catalog_description">
   
    <?= $SHORT_SEO_TEXT ?>
        <p><a href="#" class="to_useful">Подробнее &raquo;</a></p>
    </div>
<? endif; ?>







<?
if (!empty($_REQUEST["quantity"]))
{
    $_SESSION["quantity"] = $_REQUEST["quantity"];
    $quantity = $_REQUEST["quantity"];
}
if (isset($_SESSION["quantity"]) && $_SESSION["quantity"] > 0)
    $quantity = $_SESSION["quantity"];
else
    $quantity = LIST_COUNT_DEFAULT;
?>
<div class="hr"></div>

<? 
//скрываем каталог на главной
if (!$flag_main_zap) {

ShowPagging($quantity); 

$res = CIBlockSection::GetByID($arResult["VARIABLES"]["SECTION_ID"]); //получаем глубину раздела
if($ar_res = $res->GetNext()) $depth = $ar_res['DEPTH_LEVEL'];

if (!empty($_REQUEST["view_page"]))
{
    $_SESSION["view"] = $_REQUEST["view_page"];
    $view = $_REQUEST["view_page"];
}
if (isset($_SESSION["view"]) && strlen($_SESSION["view"]) > 0)
    $view = $_SESSION["view"];
else if ($depth == 1) $view = "list";
else if ($depth >= 2) $view = "list";
//else
//    $view = "list";
?>
<div class="paging">
    <div class="page-view">
        <span>Вид страницы:</span>
        <ul>
            <li>
                <a class="<? if ($view == "plate"): ?>active <? endif ?>plate-view"><span></span></a>
                <div class="tooltip">Плиткой</div>
            </li>
            <li>
                <a class="<? if ($view == "list"): ?>active <? endif ?> list-view"><span></span></a>
                <div class="tooltip">Списком</div>
            </li>
        </ul>
    </div>
</div>
<?//SEO CODE  - убрала лишние ссылки nbgf a href=?view_page=plate - для сео оптимизации ?>
<script>
$('.plate-view').click(function(){
  window.location = '<?= $APPLICATION->GetCurPageParam("view_page=plate", array("view_page"), false) ?>';
});
$('.list-view').click(function(){
  window.location = '<?= $APPLICATION->GetCurPageParam("view_page=list", array("view_page"), false) ?>';
});
</script>
<?
  

$intSectionID = 0;
$intSectionID = $APPLICATION->IncludeComponent(
        "areal:catalog.section", $view, array(
    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
    "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
    "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
    "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
    "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
    "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
    "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
    "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
    "INCLUDE_SUBSECTIONS" => "Y",
    "BASKET_URL" => $arParams["BASKET_URL"],
    "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
    "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
    "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
    "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
    "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
    "FILTER_NAME" => $arParams["FILTER_NAME"],
    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
    "CACHE_TIME" => $arParams["CACHE_TIME"],
    "CACHE_FILTER" => $arParams["CACHE_FILTER"],
    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    "SET_TITLE" => "Y",
    "ADD_SECTIONS_CHAIN" => "Y",
    "SET_STATUS_404" => $arParams["SET_STATUS_404"],
    "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
    "PAGE_ELEMENT_COUNT" => $quantity,
    "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
    "PRICE_CODE" => $arParams["PRICE_CODE"],
    "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
    "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
    "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
    "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
    "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
    "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
    "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
    "PAGER_TITLE" => $arParams["PAGER_TITLE"],
    "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
    "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
    "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
    "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
    "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
    "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
    "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
    'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
    'LABEL_PROP' => $arParams['LABEL_PROP'],
    'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
    'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
    'PERMANENT_PROPERTY' => $arParams['PERMANENT_PROPERTY']
        ), $component
);
ShowPagging($quantity);

}
?>

<div class="clear"></div>
<? if ($arResult["VARIABLES"]["SECTION_CODE"] || $arResult["VARIABLES"]["SECTION_ID"]): ?>
    <div class="catalog-hr"></div>
<? if ($_SERVER["REQUEST_URI"] != "/catalog/zapchasti/"): ?>
	
    <div class="catalog-information-left-col">
        <div class="help-plate zch">
            <div class="need-help">Хотите купить, но не нашли нужную запчасть? Подберем, <br />привезем под заказ. Звоните - <span><b><? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/phone.php"), false); ?></b></span></div>
           <?/* <div class="phone">&nbsp;&nbsp;&mdash;&nbsp;<span><? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/phone.php"), false); ?></span></div>*/?>
        </div>
        

        
        <? if (!empty($LONG_SEO_TEXT)): ?>
            <div class="useful-info">
                <div class="icon-title">Полезная информация<span></span></div>
                <?= $LONG_SEO_TEXT; ?>
            </div>
        <? endif; ?>
        
<div class="zapch-sm">
<br />      
<b>Продажа запасных частей, расходных материалов и ГСМ по всей территории РФ: </b>

<ul> 
  <li> 
    <div align="justify"><a href="/filialy/">более 35 филиалов и складов запасных частей</a> по всей территории РФ </div>
   </li>
 
  <li> 
    <div align="justify">Запасные части на технику <u><a href="/catalog/zapchasti/modeli-tekhniki/">любых</a></u> производителей </div>
   </li>
   
   <li> 
    <div align="justify">Доставка запчастей по всей России</div>
   </li>
 </ul>
 
<br/>
 <b><a href="/servis/tekhnicheskoe-obsluzhivanie/">Сервисное обслуживание и ремонт спецтехники</a> во всех филиалах по всей России:</b> 
<br/>
 
<ul> 
  <li> 
   Сервисные центры и запчасти во всех <a href="/filialy/">филиалах</a>: <br /><span style="font-size:11px;">Москва, Санкт-Петербург, Барнаул, Белгород, Владимир, Воронеж, Екатеринбург, Иваново, Казань, Калуга, Кемерово, Климовск, Коломна, Люберцы, Н. Новгород, Новокузнецк, Новосибирск, Омск, Оренбург, Пенза, Пермь, Петрозаводск, Ростов-на-Дону, Рязань, Самара, Саратов, Смоленск, Тверь, Томск, Тула, Тюмень, Уфа, Челябинск, Ярославль. </span>
   </li>
 
  <li> 
    <a href="/servis/tekhnicheskoe-obsluzhivanie/">Техническое обслуживание техники</a>

   </li>
 
  <li> 
 <a href="/servis/remont-i-vosstanovlenie/">  Все виды ремонта и восстановление</a>
   </li>
 
  <li> 
   <a href="/servis/abonentskoe-obsluzhivanie/"> Абонентское обслуживание</a>
   </li>
    </ul>

  
</div>

        
        
        <?
        
        //seo code
        /*
        if ($SECTION_ID > 0 and !preg_match("/PAGEN|filter/",$_SERVER['REQUEST_URI'])):
            global $faq_filter;
            $faq_filter = array("PROPERTY_CATALOG_CATALOG" => $SECTION_ID);
            $APPLICATION->IncludeComponent(
                    "bitrix:news.list", "faq", Array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "about_company",
                "IBLOCK_ID" => "17",
                "NEWS_COUNT" => "4",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "faq_filter",
                "FIELD_CODE" => array(),
                "PROPERTY_CODE" => array(),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "PAGER_TEMPLATE" => ".default",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N"
                    ), false
            );
        endif;
        if ($SECTION_ID > 0 and !preg_match("/PAGEN|filter/",$_SERVER['REQUEST_URI'])):
            $APPLICATION->IncludeComponent(
                    "bitrix:news.list", "articles", Array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "about_company",
                "IBLOCK_ID" => "16",
                "NEWS_COUNT" => "4",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "faq_filter",
                "FIELD_CODE" => array(),
                "PROPERTY_CODE" => array(),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "PAGER_TEMPLATE" => ".default",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N"
                    ), false
            );
        endif;
        */
        ?>
    </div>
<? endif; ?>
        <? //if ($SECTION_ID > 0 and !preg_match("/PAGEN|filter/",$_SERVER['REQUEST_URI'])): ?>
            <?// $APPLICATION->IncludeComponent("areal:video.catalog", ".default", array("IBLOCK_ID" => VIDEO, "FILTER" => array("PROPERTY_CATALOG_CATALOG" => $SECTION_ID))); ?>
        <? //endif; ?>
    <div class="clear"></div>
<? endif; ?>
<div class="dialog" id="order_catalog">
    <? $APPLICATION->IncludeComponent("areal:form.zapchasti", "popup"); ?>
</div> 




<div class="dialog" id="order_service">
   <div align="justify"> 
  <p><?$APPLICATION->IncludeComponent("areal:form.service", ".default");?> 	 
  </p>
  </div>
</div> 

<?
$APPLICATION->IncludeComponent(
  "kuznica:metatags.keysautoset",
  "",
  Array(
    "COMPONENT_MODE" => "2",
    "IBLOCK_TYPE" => "zapchasti",
    "IBLOCK_ID" => 158,
    "CACHE_TYPE" => "N",
    "CACHE_TIME" => "36000000",
    "CACHE_NOTES" => "",
    "ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
    "SECTION_ID" => $_REQUEST["SECTION_ID"],
    "ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
    "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
    "COMPLEX_COMPONENT_PATH" => "/catalog/",
    "COMPLEX_SECTION_PATH" => "#SECTION_CODE#/",
    "COMPLEX_ELEMENT_PATH" => "#SECTION_CODE#/#ELEMENT_CODE#/"
  )
);
?>




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
        var name = 'Заявка на запчасти';

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


