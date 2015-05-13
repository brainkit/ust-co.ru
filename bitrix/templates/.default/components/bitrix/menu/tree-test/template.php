<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
 
?>

<? if (!empty($arResult)):
    
      ?>
    <style>
        ul.sub ul.sub, li.sub li.sub {
            margin-left: 20px;
        }
        .side-nav ul ul ul {
            font-style: italic;
            margin-top: 0px!important;
            margin-bottom: 0px!important;
        }
        li.active ul:first
        {
            display: block;
        }
    </style>

   
        <?
        $previousLevel = 0;
        // print 1;
        foreach ($arResult as  $key => $arItem):
         
            ?>

            <?php
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



        <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
            <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
        <? endif ?>

        <? if ($arItem["IS_PARENT"]): ?>
                        <? if ($arItem["TEXT"] == "Б/У складская техника" and $arItem["DEPTH_LEVEL"] == 1): ?>
            <li>
                <a href="http://u-st.ru/catalog/bu-stroitelnaya-tehnika/lesozagotovitelnaya-tekhnika/">
                    <span class="link">Б/У лесозаготовительная техника</span>  
                    <span class="bg"></span>
                </a>

            </li>
        <? endif; ?>
            <li <? if ($arItem["SELECTED"] && $arItem["SELECTED_THIS"] == 0): ?> class="active <?= $css ?>" <? else: ?> class="<?= $css ?>" <? endif; ?>>
                <? if ($noindex): ?><!--noindex--><? endif; ?>
                    <a href="<?= $arItem["LINK"] ?>"><span class="link"><?= $arItem["TEXT"] ?></span>
                        <span class="bg"></span></a>
                    <? if ($noindex): ?><!--/noindex--><? endif; ?>
                    
                     <? if ($arItem["DEPTH_LEVEL"] >= 1): ?>
                      <ul class="sub <? if ($arResult[$key - 1]["SELECTED"]): ?>active<? endif; ?> <?=$css?>">
                     <?else:?>
                        <ul>
                    <? endif; ?>
                    <? else: ?>

                        <? if ($arItem["PERMISSION"] > "D"): ?>
                            <li>
                                 <? if ($noindex): ?><!--noindex--><? endif; ?><a <?= $rel ?> href="<?= $arItem["LINK"] ?>">
                                <a href="<?= $arItem["LINK"] ?>">
                                    <span class="link"><?= $arItem["TEXT"] ?></span>
                                    <span class="bg"></span>

                                </a> 
                                   <? if ($noindex): ?><!--/noindex--><? endif; ?>     
                            </li>
                        <? endif ?>

                    <? endif ?>

                    <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

                <? endforeach ?>

                <? if ($previousLevel > 1)://close last item tags?>
                    <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
                <? endif ?>

           
            <? endif?>