<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
 
?>



<?

    $previousLevel = 0;
        foreach ($arResult as  $key => &$arItem):
            $css = str_replace("/", "-", $arItem["LINK"]);
            if ($arItem["LINK"] == "/catalog/bu-stroitelnaya-tehnika/")
                $arItem["LINK_DOMAIN"] = "u-st.ru";
            if (isset($arItem["LINK_DOMAIN"])) {
                //   print "<pre style='display:none'> "; print_r($arItem["LINK_DOMAIN"]); print "</pre>";
                $arItem["LINK"] = "http://" . $arItem["LINK_DOMAIN"] . $arItem["LINK"];
                $link_domain = $arItem["LINK_DOMAIN"];
            } else {
                $arItem["LINK"] = "http://" . DEFAULT_DOMAIN . $arItem["LINK"];
                $link_domain = DEFAULT_DOMAIN;
            }
            endforeach;
            unset($arItem);
        foreach ($arResult as  $key => &$arItem):
            if ($_SERVER["HTTP_HOST"] != $link_domain) {
                $rel = 'rel="nofollow"';
                $noindex = true;
            } else {
                $rel = "";
                $noindex = false;
            }
            $page = $APPLICATION->GetCurPage();
            if ($page == "/index.php") {
                $rel = "";
                $noindex = false;
            }
            ?>
            
        
            
              <?/* if ($arItem["TEXT"] == "Б/У складская техника" and $arItem["DEPTH_LEVEL"] == 1): ?>
                  <li>
                    <a href="http://u-st.ru/catalog/bu-stroitelnaya-tehnika/lesozagotovitelnaya-tekhnika/">
                        <span class="link">Б/У лесозаготовительная техника</span>  
                        <span class="bg"></span>
                    </a>
                 </li>
            <? endif; */?>
            <?if($arItem["DEPTH_LEVEL"]==1):?>
           
                 <li <? if ($arItem["SELECTED"]): ?> class="active <?= $css ?>" <? else: ?> class="<?= $css ?>" <? endif; ?>>
                       <? if ($noindex): ?><!--noindex--><? endif; ?>
                            <a href="<?= $arItem["LINK"] ?>">
                            <span class="link"><?= $arItem["TEXT"] ?></span>
                                <span class="bg"></span>
                            </a>
                            <? if ($noindex): ?><!--/noindex--><? endif; ?>

                           

                            <?if(($arItem["IS_PARENT"])&&($arItem["SELECTED"])):?>
                                <?$newKey=$key+1;?>
                              <ul class="sub <?=$css?>">
                                        <?for($newL=$newKey;$newL <= count($arResult);$newL++){?>
                                                
                                                   
                                                    <?if($arResult[$newL]["DEPTH_LEVEL"]==1):?>
                                                                 <?break;?>
                                                  
                                                    <?elseif ($arResult[$newL]["DEPTH_LEVEL"]==2):?>
                                                        
                                                                 <li <? if ($arResult[$newL]["SELECTED"]): ?> class="active <?= $css ?>" <? else: ?> class="<?= $css ?>" <? endif; ?>>
                                                                 <? if ($noindex): ?><!--noindex--><? endif; ?>
                                                                    <a href="<?= $arResult[$newL]["LINK"] ?>">
                                                                    <span class="link"><?= $arResult[$newL]["TEXT"] ?></span>
                                                                        <span class="bg"></span>
                                                                    </a>
                                                                <? if ($noindex): ?><!--/noindex--><? endif; ?> 

                                                                   
                                                                         <?if(($arResult[$newL]["IS_PARENT"])&&($arResult[$newL]["SELECTED"])):?>

                                                                            <?$newKeyVal=$newL+1;?>
                                                                            <ul class="sub <?=$css?>">

                                                                                <?for($newLL=$newKeyVal;$newLL <= count($arResult);$newLL++){?>
                                                                                     


                                                                                        <?if($arResult[$newLL]["DEPTH_LEVEL"]==1):?>
                                                                                             <?break;?>
                                                                                 <?elseif($arResult[$newLL]["DEPTH_LEVEL"]==2):?>
                                                                                             <?break;?>
                                                                                <?elseif($arResult[$newLL]["DEPTH_LEVEL"]==3):?>
                                                                                             
                                                                                    
                                                                                                <li <? if ($arResult[$newLL]["SELECTED"]): ?> class="active <?= $css ?>" <? else: ?> class="<?= $css ?>" <? endif; ?>>
                                                                                                     <? if ($noindex): ?><!--noindex--><? endif; ?>
                                                                                                        <a href="<?= $arResult[$newLL]["LINK"] ?>">
                                                                                                        <span class="link"><?=$arResult[$newLL]["TEXT"]; ?></span>
                                                                                                            <span class="bg"></span>
                                                                                                        </a>
                                                                                                    <? if ($noindex): ?><!--/noindex--><? endif; ?> 
     
                                                                                            
                                                                                             <?if(($arResult[$newLL]["IS_PARENT"])&&($arResult[$newLL]["SELECTED"])):?>

                                                                                                <?$newKeyValL=$newLL+1;?>
                                                                                                <ul class="sub <?=$css?>">

                                                                                        <?for($newLLL=$newKeyValL;$newLLL <= count($arResult);$newLLL++){?>
                                                                                         
                                                                                                         <?if($arResult[$newLL]["DEPTH_LEVEL"]==4):?>
                                                                                                                <li <? if ($arResult[$newLLL]["SELECTED"]): ?> class="active <?= $css ?>" <? else: ?> class="<?= $css ?>" <? endif; ?>>
                                                                                                                     <? if ($noindex): ?><!--noindex--><? endif; ?>
                                                                                                                        <a href="<?= $arResult[$newLLL]["LINK"] ?>">
                                                                                                                        <span class="link"><?= $arResult[$newLLL]["TEXT"] ?></span>
                                                                                                                            <span class="bg"></span>
                                                                                                                        </a>
                                                                                                                    <? if ($noindex): ?><!--/noindex--><? endif; ?> 
                                                                                                        <?else:?>
                                                                                                        <?break;?>
                                                                                                        <?endif;?>

                                                                                         <?}?>
                                                                                         </ul>
                                                                                        <?endif;?>
                                                                                   
                                                                                 <?endif;?>
                                                                 
                                                                                 <?}?>

                                                                            </ul>
                                                                         <?endif;?>
                                                                  

                                                    <?endif;?>

                                     <?}?>
                              </ul>
                            <?endif?>
                            
                     <?endif?>
            
        <? endforeach ?>