<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true); 
// echo "<pre>";
// print_r($arResult);
// echo "</pre>";
if(count($arResult['ELEMENTS']) > 0 && $arResult["ITEMS_COUNT_SHOW"]): 
$arParams['MESSAGE_ALIGN'] = isset($arParams['MESSAGE_ALIGN']) ? $arParams['MESSAGE_ALIGN'] : 'LEFT';
$arParams['MESSAGE_TIME'] = intval($arParams['MESSAGE_TIME']) >= 0 ? intval($arParams['MESSAGE_TIME']) : 5;


      // seo code
      $arr_filter_brand=array();
      $arr_filter_ispoln=array();
      // seo code end


CJSCore::Init(array("popup"));
//$APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/ion.rangeSlider.js");
//$APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/jquery.cookie.js");
$cntClosedProperty = 0;
?>
<?
/*global $USER;
if ($USER->GetID() == 10){
echo "<pre>";
echo COption::GetOptionInt("ust", "catalog_filter_count_brand");
echo "</pre>";    
}*/
?>
<?//$arResult["FORM_ACTION"] = $_REQUEST["THIS_SECTION"];?> 
<?//echo "<pre>";
//print_r($arResult["parent_section_id"]);
//echo "</pre>";?>


<!--?//unset($_POST);
pr($arResult["ITEMS"]);
?-->

<div class="kombox-filter" id="kombox-filter">
    <form name="<?echo $arParams["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get"<?if($arResult['IS_SEF']):?> data-sef="yes"<?endif;?>>
        <script>
            var komboxSmartFilter = new KomboxSmartFilter('<?echo $arResult["FORM_ACTION"]?>', '<?echo $arParams['MESSAGE_ALIGN']?>', <?echo $arParams['MESSAGE_TIME']?>);
        </script>
        <?foreach($arResult["HIDDEN"] as $arItem):?>
            <input
                type="hidden"
                name="<?echo $arItem["CONTROL_NAME"]?>"
                id="<?echo $arItem["CONTROL_ID"]?>"
                value="<?echo $arItem["HTML_VALUE"]?>"
            />
        <?endforeach;?>
        <ul> 
        <?//echo "<pre>";
        //print_r($arResult["ITEMS"]);
        //echo "</pre>";?>
        <?if(!empty($arResult["section_filter"])):?> 
        <li class="lvl1 select_left">
                <div class="kombox-filter-property-head" style="width: 90px; padding: 1.8em 5px 5px;">
                    <span class="kombox-filter-property-name">Вид техники:</span>
                    <!--<span class="for_modef"></span>-->
                </div> 
         
                <div id="vil_vid" style="padding: 5px 0 0 15px;">
                    <select class="kombox-section" style="width: 324px; padding: 5px 0 0 15px;">
                        <?foreach($arResult["section_filter"] as $val => $ar):?>
                                <option class="kombox-section-option"  style="width: 324px;" id="<?="section"."_".$ar["ID"]?>" value="<?=$ar["SECTION_PAGE_URL"];?>" <?if(($ar["ID"] == $arParams["SECTION_ID"]) || ($ar["ID"] == $arResult["parent_section_id"])):?>selected="selected"<?endif?>><?=$ar["NAME"];?></option>
                        <?endforeach;?>
                    </select>
                    <div style="display: none; " >
                        <ul>
                            <?foreach($arItem["VALUES"] as $val => $ar):?>
                            <li class="li_checkbox <?echo $ar["DISABLED"]? 'kombox-disabled ': ''?><?echo $ar["CHECKED"]? 'kombox-checked': ''?>">
                                <input  
                                    type="checkbox"
                                    value="<?echo $ar["HTML_VALUE"]?>"
                                    name="<?echo $ar["CONTROL_NAME"]?>"
                                    id="<?echo $ar["CONTROL_ID"]?>"
                                    <?echo $ar["CHECKED"]? 'checked="checked"': ''?>
                                    onclick="komboxSmartFilter.click(this)" 
                                    data-value="<?echo $ar["CONTROL_NAME_ALT"]?>"
                                /> 
                            </li>
                            <?endforeach;?>
                        </ul>    
                    </div>
                </div>
        </li>
        <?endif?>
        <?if(!empty($arResult["section_filtered"])):?>
                <li class="lvl1 select_right" style="width:447px;">
                <div class="kombox-filter-property-head" style="padding: 1.8em 4px 5px; width:90px;">
                    <span class="kombox-filter-property-name">Тип техники:</span>
                    <!--<span class="for_modef"></span>-->
                </div> 
          
                <div id="vil_type" style="padding: 5px 0 0 15px;">
                    <select class="kombox-subsection" style="width: 324px; padding: 5px 0 0 15px;">
                        <option class="kombox-subsection-option"  style="width: 324px;" id="<?="section"."_".$arResult["parent_section_id"]?>" value="0" <?if($ar["ID"] == $arParams["SECTION_ID"]):?>selected="selected"<?endif?>>Все</option>
                        <?foreach($arResult["section_filtered"] as $val => $ar):?>
                        <?if($ar["CODE"] == "konteynery-dgu") continue;?>
                                <option class="kombox-subsection-option"  style="width: 324px;" id="<?="section"."_".$ar["ID"]?>" value="<?=$ar["SECTION_PAGE_URL"];?>" <?if($ar["ID"] == $arParams["SECTION_ID"]):?>selected="selected"<?endif?>><?=$ar["NAME"];?></option>
                        <?endforeach;?>
                    </select>
                    <div style="display: none; " >
                        <ul>
                            <?foreach($arItem["VALUES"] as $val => $ar):?>
                            <li class="li_checkbox <?echo $ar["DISABLED"]? 'kombox-disabled ': ''?><?echo $ar["CHECKED"]? 'kombox-checked': ''?>">
                                <input  
                                    type="checkbox"
                                    value="<?echo $ar["HTML_VALUE"]?>"
                                    name="<?echo $ar["CONTROL_NAME"]?>"
                                    id="<?echo $ar["CONTROL_ID"]?>"
                                    <?echo $ar["CHECKED"]? 'checked="checked"': ''?>
                                    onclick="komboxSmartFilter.click(this)" 
                                    data-value="<?echo $ar["CONTROL_NAME_ALT"]?>"
                                /> 
                            </li>
                            <?endforeach;?>
                        </ul>    
                    </div>
                </div>
        </li>
        <?endif?>
        <div class="kombox-clear"></div>
        <?$element_conter = 0;?> 
        <?//ksort($arResult["ITEMS"]);?>
        <?//echo '<pre>'; print_r($arResult["ITEMS"]); echo '</pre>';?> 
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <?if($arItem["CLOSED"])$cntClosedProperty++;?>
        <?if($arItem["PROPERTY_TYPE"] == "N"):?>
        <?elseif(($arItem["CODE_ALT"] == "pto_tip_privoda") && (!empty($arItem["VALUES"]))):?>
        <li class="lvl1<?if($arItem["CLOSED"]):?> closed<?endif;?> privod" data-id="<?echo $arItem["CODE_ALT"].'-'.$arItem["ID"]?>">
                <div class="kombox-filter-property-head kombox-middle" style="float: left; padding: 10px 10px 5px 5px;">
                    <?if(strlen($arItem['HINT'])):?>
                    <span class="kombox-filter-property-hint"></span>
                    <div class="kombox-filter-property-hint-text"><?echo $arItem['HINT']?></div>
                    <?endif;?>
                    <span class="kombox-filter-property-name"><?echo $arItem["NAME"]?>:</span>
                    <!--<span class="for_modef"></span>-->   
                </div>
                <div class="kombox-combo" data-name="<?=$arItem["CODE_ALT"]?>" style="float:right; width:760px; padding: 0;">                
                    <ul>
                        <?foreach($arItem["VALUES"] as $val => $ar):?>
                        <li class="li_checkbox <?echo $ar["DISABLED"]? 'kombox-disabled ': ''?><?echo $ar["CHECKED"]? 'kombox-checked': ''?>">                               
                            <input
                                class="kombox-hidden-input"     
                                type="checkbox"
                                value="<?echo $ar["HTML_VALUE"]?>"
                                name="<?echo $ar["CONTROL_NAME"]?>"
                                id="<?echo $ar["CONTROL_ID"]?>"
                                <?echo $ar["CHECKED"]? 'checked="checked"': ''?>
                                onclick="komboxSmartFilter.click(this)" 
                                data-value="<?echo $ar["CONTROL_NAME_ALT"]?>"
                            />
                            <?
                            
                            ?>
                            <?if(!$arItem["ID"]):?>
                            <label for="<?=$ar["CONTROL_ID"]?>" class="label_checked checkbox_off"><div style="padding-top: 8px;padding-left: 20px"><?echo $ar["VALUE"];?></div> <span style="padding-top: 8px; display: none;">(<?echo $arResult["section_filter"]["CNT"];?>)</span></label>
                            <?else:?>
                            <label for="<?=$ar["CONTROL_ID"]?>" class="label_checked checkbox_off"><div style="padding-top: 8px;padding-left: 20px"><?echo $ar["VALUE"];?></div> <span style="padding-top: 8px; display: none;">(<?echo $ar["CNT"];?>)</span></label>
                            <?endif?>
                            <?/*<label for="<?echo $ar["CONTROL_ID"]?>"><?echo $ar["VALUE"];?> <span>(<?echo $ar["CNT"];?>)</span></label>*/?>
                        </li>

                        <?endforeach;?>
                    </ul> 
                <div class="kombox-clear"></div>
                
               
        </li>  
        
  
        
        <?elseif(!empty($arItem["VALUES"]) && !isset($arItem["PRICE"])):?>
        <?
            if($arItem["CODE_ALT"] == "dvigatel_model_generatory") $left_right = "select_right";
            elseif($arItem["CODE_ALT"] == "brand" || $arItem["CODE_ALT"] == "isposlenenie_generatory") $left_right = "select_left";
        ?>
            <li class="lvl1<?if($arItem["CLOSED"]):?> closed<?endif;?> <?=$left_right?>" data-id="<?echo $arItem["CODE_ALT"].'-'.$arItem["ID"]?>" <?if($arItem["CODE_ALT"] == "dvigatel_model_generatory"):?>style="width:447px;"<?elseif($arItem["CODE_ALT"] == "isposlenenie_generatory"):?>style="margin-top:10px;"<?endif;?>>
                <div class="kombox-filter-property-head" <?if($arItem["CODE_ALT"] == "brand"):?>style="padding: 1.8em 52px 5px 5px;"<?elseif($arItem["CODE_ALT"] == "dvigatel_model_generatory"):?>style="padding: 1.8em 0 5px 5px; width:140px;"<?else:?>style="padding: 1.8em 0 5px 5px;"<?endif;?>>
                    <?if(strlen($arItem['HINT'])):?>
                    <span class="kombox-filter-property-hint"></span>
                    <div class="kombox-filter-property-hint-text"><?echo $arItem['HINT']?></div>
                    <?endif;?>
                    <span class="kombox-filter-property-name"><?echo $arItem["NAME"]?>:</span>
                    <!--<span class="for_modef"></span>-->
                </div>
                <?/*if(!$arItem["ID"]):?> 
                <div style="padding: 5px 0 0 15px;">
                    <select class="kombox-section" style="width: 324px; padding: 5px 0 0 15px;">
                        <option id="0" value="0" selected>Р’СЃРµ</option>
                    <ul>
                        <?foreach($arItem["VALUES"] as $val => $ar):?>
                        <li class="<?echo $ar["DISABLED"]? 'kombox-disabled ': ''?><?echo $ar["CHECKED"]? 'kombox-checked': ''?>">                               
                                <option class="kombox-section-option" for="<?=$ar["CONTROL_ID"]?>" style="width: 324px;" id="<?="section"."_".$ar["FILTER_SECTION_ID"]?>" value="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?></option>
                        </li>
                        <?endforeach;?>
                    </ul>
                    </select>
                    <div style="display: none; " >
                        <ul>
                            <?foreach($arItem["VALUES"] as $val => $ar):?>
                            <li class="li_checkbox <?echo $ar["DISABLED"]? 'kombox-disabled ': ''?><?echo $ar["CHECKED"]? 'kombox-checked': ''?>">
                                <input  
                                    type="checkbox"
                                    value="<?echo $ar["HTML_VALUE"]?>"
                                    name="<?echo $ar["CONTROL_NAME"]?>"
                                    id="<?echo $ar["CONTROL_ID"]?>"
                                    <?echo $ar["CHECKED"]? 'checked="checked"': ''?>
                                    onclick="komboxSmartFilter.click(this)" 
                                    data-value="<?echo $ar["CONTROL_NAME_ALT"]?>"
                                /> 
                            </li>
                            <?endforeach;?>
                        </ul>    
                    </div>
                </div>     */?>
                <?//echo '<pre>'; print_r($arItem); echo '</pre>';?>
                <?if((count($arItem["VALUES"]) == 1) && ($arItem["CODE_ALT"] == "brand")):?>  
                    <?foreach($arItem["VALUES"] as $val => $ar):?>    
                        <div class="solo_brand"><?=$ar["VALUE"];?></div>
                    <?endforeach;?>
                    
                <?elseif((count($arItem["VALUES"]) <= COption::GetOptionInt("ust", "catalog_filter_count_brand")) && ($arItem["CODE_ALT"] == "brand") && (count($arItem["VALUES"]) != 1)):?>
                <div class="kombox-combo" data-name="<?=$arItem["CODE_ALT"]?>" style="padding: 10px 0 0 15px;">                
                    <ul>
                        
                        <?foreach($arItem["VALUES"] as $val => $ar):?>
                        <li class="li_checkbox <?echo $ar["DISABLED"]? 'kombox-disabled ': ''?><?echo $ar["CHECKED"]? 'kombox-checked': ''?>">                               
                            <input
                                class="kombox-hidden-input"     
                                type="checkbox"
                                value="<?echo $ar["HTML_VALUE"]?>"
                                name="<?echo $ar["CONTROL_NAME"]?>"
                                id="<?echo $ar["CONTROL_ID"]?>"
                                <?echo $ar["CHECKED"]? 'checked="checked"': ''?>
                                onclick="komboxSmartFilter.click(this)" 
                                data-value="<?echo $ar["CONTROL_NAME_ALT"]?>"
                            />
                            <?if(!$arItem["ID"]):?>
                            <label for="<?=$ar["CONTROL_ID"]?>" class="label_checked checkbox_off"><div style="padding-top: 8px;padding-left: 20px"><?echo $ar["VALUE"];?></div> <span style="padding-top: 8px; display: none;">(<?echo $arResult["section_filter"]["CNT"];?>)</span></label>
                            <?else:?>
                            <label for="<?=$ar["CONTROL_ID"]?>" class="label_checked checkbox_off"><div style="padding-top: 8px;padding-left: 20px"><?echo $ar["VALUE"];?></div> <span style="padding-top: 8px; display: none;">(<?echo $ar["CNT"];?>)</span></label>
                            <?endif?>
                            <?/*<label for="<?echo $ar["CONTROL_ID"]?>"><?echo $ar["VALUE"];?> <span>(<?echo $ar["CNT"];?>)</span></label>*/?>
                        </li>
                        <?
                        
                        // seo code
                        if ($arItem["CODE_ALT"]=="brand") {
                               $arr_filter_brand[]=array("key"=>$ar["CONTROL_NAME_ALT"],"val"=>$ar["VALUE"]);
                        }
                        // seo code end
                        ?>
                        <?endforeach;?>
                    </ul>
                </div>     
                 
                <?elseif((count($arItem["VALUES"]) > COption::GetOptionInt("ust", "catalog_filter_count_brand"))):?>
                <div id="brand_holder" style="padding: 5px 0 0 15px;">
                    <select name="<?=$arItem["CODE_ALT"]?>" class="kombox-select" style="width: 324px; padding: 5px 0 0 15px;">      
                        <option id="0" class="kombox_option" value="0">Все</option>
                        <?foreach($arItem["VALUES"] as $val => $ar):?>
                            <option class="kombox_option"  style="width: 324px;" label="<?=$ar["CONTROL_ID"]?>" <?/*id="<?=$ar["CONTROL_NAME_ALT"];?>"*/?> value="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?></option>
                            <?/*
                            <input
                                class="kombox-hidden-input"     
                                type="checkbox"
                                value="<?echo $ar["HTML_VALUE"]?>"
                                name="<?echo $ar["CONTROL_NAME"]?>"
                                id="<?echo $ar["CONTROL_ID"]?>"
                                <?echo $ar["CHECKED"]? 'checked="checked"': ''?>
                                onclick="komboxSmartFilter.click(this)" 
                                data-value="<?echo $ar["CONTROL_NAME_ALT"]?>"
                            /> 
                            <label for="<?=$ar["CONTROL_ID"]?>" class="checkbox label_checked checkbox_off"><font><?echo $ar["VALUE"];?></font> <span>(<?echo $ar["CNT"];?>)</span></label> 		
                            */?>
                        <?endforeach;?>
                    </select>
                
                    <div style="display: none; " class="kombox-input-check">
                        <ul>
                            <?foreach($arItem["VALUES"] as $val => $ar):?>
                            <li class="<?echo $ar["DISABLED"]? 'kombox-disabled ': ''?><?echo $ar["CHECKED"]? 'kombox-checked': ''?>">
                                <input
                                    class="kombox-hidden-input"     
                                    type="checkbox"
                                    value="<?echo $ar["HTML_VALUE"]?>"
                                    name="<?echo $ar["CONTROL_NAME"]?>"
                                    id="<?echo $ar["CONTROL_ID"]?>"
                                    <?echo $ar["CHECKED"]? 'checked="checked"': ''?>
                                    onclick="komboxSmartFilter.click(this)" 
                                    data-value="<?echo $ar["CONTROL_NAME_ALT"]?>"
                                /> 
                            </li>
                            <?endforeach;?>
                        </ul>    
                    </div>
                </div>
                
                <?else:?>
                <?//echo '<pre>'; print_r($arItem["VALUES"]); echo '</pre>';?> 
                <div class="kombox-combo" data-name="<?=$arItem["CODE_ALT"]?>" style="padding: 10px 0 0 15px;">                
                    <ul>
                        <?$element_conter_li = 0;
                        foreach($arItem["VALUES"] as $val => $ar):?>
                        <li class="li_checkbox  <?if($element_conter_li%2):?>select_right<?else:?>select_left<?endif?><?echo $ar["DISABLED"]? 'kombox-disabled ': ''?> <?echo $ar["CHECKED"]? 'kombox-checked': ''?>" style="width:110px;">                               
                            <input
                                class="kombox-hidden-input"     
                                type="checkbox"
                                value="<?echo $ar["HTML_VALUE"]?>"
                                name="<?echo $ar["CONTROL_NAME"]?>"
                                id="<?echo $ar["CONTROL_ID"]?>"
                                <?echo $ar["CHECKED"]? 'checked="checked"': ''?>
                                onclick="komboxSmartFilter.click(this)" 
                                data-value="<?echo $ar["CONTROL_NAME_ALT"]?>"
                            />
                            <?if(!$arItem["ID"]):?>
                            <label for="<?=$ar["CONTROL_ID"]?>" class="label_checked checkbox_off"><div style="padding-top: 8px;padding-left: 20px"><?echo $ar["VALUE"];?></div> <span style="padding-top: 8px; display: none;">(<?echo $arResult["section_filter"]["CNT"];?>)</span></label>
                            <?else:?>
                            <label for="<?=$ar["CONTROL_ID"]?>" class="label_checked checkbox_off"><div style="padding-top: 8px;padding-left: 20px"><?echo $ar["VALUE"];?></div> <span style="padding-top: 8px; display: none;">(<?echo $ar["CNT"];?>)</span></label>
                            <?endif?>
                            <?/*<label for="<?echo $ar["CONTROL_ID"]?>"><?echo $ar["VALUE"];?> <span>(<?echo $ar["CNT"];?>)</span></label>*/?>
                        </li>
                        <?if($element_conter_li%2):?>
                            <div class="kombox-clear"></div>
                        <?endif?>
                        <?$element_conter_li++?>
                        <?
                        // seo code end
                        if ($arItem["CODE_ALT"]=="isposlenenie_generatory") {
                             $arr_filter_ispoln[]=array("key"=>$ar["CONTROL_NAME_ALT"],"val"=>$ar["VALUE"]);
                        }
                        // seo code end
                        ?>
                        <?endforeach;?>
                    </ul>
                </div> 
                <?endif?>    
            </li>
             
           <?endif?>
        <?if($element_conter%2):?>
            <!--<div class="kombox-clear"></div>-->
        <?endif?>
        <?$element_conter++?>
         <?if(($arItem["CODE_ALT"] == "osnovnaja_moshhnost_kvt_generatory") && (!empty($arItem["VALUES"]))):?>
         <li style="width:447px; padding-top: 6px;"  class="lvl1<?if($arItem["CLOSED"]):?> closed<?endif;?> select_right" data-id="<?echo $arItem["CODE_ALT"].'-'.$arItem["ID"]?>">
                <div class="kombox-filter-property-head kombox-middle" style="width: 162px; padding: 1.8em 10px 5px 5px;">
                    <?if(strlen($arItem['HINT'])):?>
                    <span class="kombox-filter-property-hint"></span>
                    <div class="kombox-filter-property-hint-text"><?echo $arItem['HINT']?></div>
                    <?endif;?>
                    <span class="kombox-filter-property-name"><?echo $arItem["NAME"]?>:</span>
                    <!--<span class="for_modef"></span>-->   
                </div>
                <div class="kombox-num" data-name="<?=$arItem["CODE_ALT"]?>">
                    <table style="width: 100%;">
                        <tr>
                            <?
                            $minValue = !empty($arItem["VALUES"]["MIN"]["HTML_VALUE"]) ? $arItem["VALUES"]["MIN"]["HTML_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"];
                            $maxValue = !empty($arItem["VALUES"]["MAX"]["HTML_VALUE"]) ? $arItem["VALUES"]["MAX"]["HTML_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"];
                            if ($arItem["VALUES"]["MIN"]["VALUE"] === $arItem["VALUES"]["MAX"]["VALUE"]) 
                            {
                                $arItem["VALUES"]["MIN"]["VALUE"] = 1; 
                                $minValue = 1;
                            }
                            ?>
                            <td class="kombox-from" style="display: none;">
                                <?echo GetMessage("KOMBOX_CMP_FILTER_FROM")?> 
                                <input 
                                    class="kombox-input kombox-num-from" 
                                    type="text" 
                                    name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" 
                                    id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" 
                                    value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>" 
                                    size="5" 
                                />
                            </td>
                            <td class="kombox-range"> 
                                <div  
                                    data-value="<?echo $minValue?>;<?=$maxValue?>" 
                                    data-min="<?echo $arItem["VALUES"]["MIN"]["VALUE"]?>" 
                                    data-max="<?echo $arItem["VALUES"]["MAX"]["VALUE"]?>" 
                                    data-range-from="<?echo $arItem["VALUES"]["MIN"]["RANGE_VALUE"]?>" 
                                    data-range-to="<?echo $arItem["VALUES"]["MAX"]["RANGE_VALUE"]?>" 
                                >
                                <?//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ajax/testKomboxGeneratory.txt', '1- '.$minValue.' 2- '.$maxValue.' 3- '.$arItem["VALUES"]["MIN"]["VALUE"].' 4- '.$arItem["VALUES"]["MAX"]["VALUE"].' 5- '.$arItem["VALUES"]["MIN"]["RANGE_VALUE"].' 6- '.$arItem["VALUES"]["MAX"]["RANGE_VALUE"]);?>
                                </div>
                            </td>
                            <td class="kombox-to" style="display: none">
                                <?echo GetMessage("KOMBOX_CMP_FILTER_TO")?>  
                                <input 
                                    class="kombox-input kombox-num-to" 
                                    type="text" 
                                    name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>" 
                                    id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" 
                                    value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>" 
                                    size="5" 
                                />
                                 <?=$arItem['UNITS']?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="kombox-clear"></div>
            </li>
        <?endif;?>
        <?endforeach;?>
        <li class="red_link top23">
            <a href="<?=$arResult["section_filtered"][1]["SECTION_PAGE_URL"]?>" style="padding-left: 5px;"><?=$arResult["section_filtered"][1]["NAME"]?></a>
        </li>
        <div class="kombox-clear"></div> 
        <div id="modef" class="elements_finded">
            <div style="float:left;">                
                <strong style="padding-top: 25px; display: inline-block; position: relative;"><?echo GetMessage("KOMBOX_CMP_FILTER_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?></strong>
            </div>
            <div style="float: right; width: 400px;">                
                <a href="<?echo $arResult["FILTER_URL"]?>" style="text-decoration: none;padding-top: 5px; position:reltive; display:flex; width: 150px; float: left;"><br><div id="sort_button_div"><?echo GetMessage("KOMBOX_CMP_FILTER_FILTER_SHOW")?></div></a>
                <span class="ecke"></span>
                <?if($arResult['SET_FILTER']):?>
                    <a href="<?=$arResult["DELETE_URL"]?>" class="kombox-del-filter"><?=GetMessage("KOMBOX_CMP_FILTER_DEL_FILTER")?></a> 
                <?endif;?>
            </div>
        </div> 
            <li>
                <div class="kombox-filter-show-properties kombox-show" style="display: none;">
                    <?if($cntClosedProperty):?>
                    <a href=""><span class="kombox-show"><?=GetMessage("KOMBOX_CMP_FILTER_SHOW_FILTER")?></span><span class="kombox-hide"><?=GetMessage("KOMBOX_CMP_FILTER_HIDE_FILTER")?></span></a>
                    <?endif;?>
                </div>
               <?/* <div id="sort_button_div">
                     <input type="button" id="sort_button" value="<?=GetMessage("KOMBOX_CMP_FILTER_SET_FILTER")?>"/>
                     <?if($arResult['SET_FILTER']):?>
                     <a href="<?=$arResult["DELETE_URL"]?>" class="kombox-del-filter"><?=GetMessage("KOMBOX_CMP_FILTER_DEL_FILTER")?></a> 
                     <?endif;?>
                </div>    */?>
                <div class="kombox-filter-submit" style="display: none;"> 
                    <input type="submit" id="set_filter" name="set_filter" value="<?=GetMessage("KOMBOX_CMP_FILTER_SET_FILTER")?>" />
                    <?if($arResult['SET_FILTER']):?>
                    <a href="<?=$arResult["DELETE_URL"]?>" class="kombox-del-filter"><?=GetMessage("KOMBOX_CMP_FILTER_DEL_FILTER")?></a> 
                    <?endif;?>
                </div>
                <div class="kombox-clear">&nbsp;</div>
            </li>
        </ul>

        <?/*<div class="modef" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?>>
            <div class="modef-wrap">
                <?echo GetMessage("KOMBOX_CMP_FILTER_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
                <a href="<?echo $arResult["FILTER_URL"]?>"><?echo GetMessage("KOMBOX_CMP_FILTER_FILTER_SHOW")?></a>
                <span class="ecke"></span>
            </div>
        </div>  */?>
    </form>
    <div class="kombox-loading"></div>
</div>

<?
//seo code
//brand links
echo '<div class="se_links">';
if (!empty($arr_filter_brand) and count($arr_filter_brand)>1) {

   foreach ($arr_filter_brand as $item_filter) {
      echo '<a href="http://generatory.ust-co.ru/catalog/generatory/filter/brand-'.$item_filter["key"].'/">генераторы '.$item_filter["val"].'</a>';
      echo ', ';
      
   }
    //echo  $APPLICATION->GetCurPage();
}
//type links
if (!empty($arr_filter_ispoln) and count($arr_filter_ispoln)>1) {
  
   $j=1;
   foreach ($arr_filter_ispoln as $item_filter) {
      echo '<a href="http://generatory.ust-co.ru/catalog/generatory/filter/isposlenenie_generatory-'.$item_filter["key"].'/">генератор '.$item_filter["val"].'</a>';
      if ($j < count($arr_filter_ispoln)) echo ', ';
      $j++;
   }
}
echo "</div>";
//seo code end
?>

<?endif;?>
<script>
$(document).ready(function(){
    $('#brand_holder .sbHolder').css('width','300px');
});
</script>
<!--<div id="chosen"></div>-->

