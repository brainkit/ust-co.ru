<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
global $USER;
//if ($USER->IsAdmin()) echo "Вы администратор!";

//__($arResult);
?>
<?/*if (!$USER->IsAdmin()):?>
<? if (!empty($arResult)): ?>
    <? foreach ($arResult as $key => $arItem): ?>


        <? //-----------1-----------?>
        <? if ($arItem["DEPTH_LEVEL"] == 1 && $arItem["SELECTED"] == 1 && $arItem["LINK"] != "/catalog/"): ?>
            <?
            if (isset($arItem["LINK_DOMAIN"]))
            {
                $arItem["LINK"] = "http://" . $arItem["LINK_DOMAIN"] . $arItem["LINK"];
                $link_domain = $arItem["LINK_DOMAIN"];
            }
            else
            {
                $arItem["LINK"] = "http://" . DEFAULT_DOMAIN . $arItem["LINK"];
                $link_domain = DEFAULT_DOMAIN;
            }


            if ($_SERVER["HTTP_HOST"] != $link_domain)
            {
                $rel = 'rel="nofollow"';
                $noindex = true;
            }
            else
            {
                $rel = "";
                $noindex = false;
            }
            
            $page = $APPLICATION->GetCurPage();
           // pr($page);
            if ($page == "/index.php")
            {
                $rel = "";
                $noindex = false;
            }
            //pr($link_domain);
            ?>
            <li <? if ($arItem["SELECTED"] == 1): ?> class="active" <? endif; ?>>
                <? if ($rel != ''): ?><!--noindex--><? endif; ?><a  <?= $rel ?> href="<?= $arItem["LINK"] ?>">
                    <span class="link"><?= $arItem["TEXT"] ?></span>
                    <span class="bg"></span>
                </a> <? if ($rel != ''): ?><!--/noindex--><? endif; ?>
                <?
                if ($arItem["SELECTED"] == 1)
                {
                    $flag = 1;
                }
                else
                    $flag = 0;
                ?>
            <? elseif ($arItem["DEPTH_LEVEL"] == 1 && $arItem["LINK"] != "/catalog/"): ?>
                <? $flag = 0; ?>
            <? endif; ?>
            <? //-----------2-----------?>
            <? if ($arItem["DEPTH_LEVEL"] == 2 && $flag == 1): ?>
                <?
                if (isset($arItem["LINK_DOMAIN"]))
                {
                    $arItem["LINK"] = "http://" . $arItem["LINK_DOMAIN"] . $arItem["LINK"];
                    $link_domain = $arItem["LINK_DOMAIN"];
                }
                else
                {
                    $arItem["LINK"] = "http://" . DEFAULT_DOMAIN . $arItem["LINK"];
                    $link_domain = DEFAULT_DOMAIN;
                }


                if ($_SERVER["HTTP_HOST"] != $link_domain)
                {
                    $rel = 'rel="nofollow"';
                    $noindex = true;
                }
                else
                {
                    $rel = "";
                    $noindex = false;
                }

                if ($page == "/index.php" and $_SERVER["HTTP_HOST"] != DEFAULT_DOMAIN)
                {
                    $rel = "";
                    $noindex = false;
                }
                ?>
                <? if ($arResult[$key - 1]["DEPTH_LEVEL"] < $arItem["DEPTH_LEVEL"] && $arResult[$key - 1]["SELECTED"] == 1): ?>
                    <ul <? if ($arResult[$key - 1]["SELECTED"] == 1): ?> class="active" <? endif; ?> >
                    <? endif; ?>
                    <li <? if ($arItem["SELECTED"] == 1 && $arItem['UNSELECTED'] == false): ?> class="active" <? endif; ?> >
                        <? if ($noindex): ?><!--noindex--><? endif; ?> <a <?= $rel ?> href="<?= $arItem["LINK"] ?>">
                            <span class="link"><?= $arItem["TEXT"] ?></span>
                            <span class="bg"></span>
                        </a> <? if ($noindex): ?><!--/noindex--><? endif; ?>
                        <?
                        if ($arItem["SELECTED"] == 1)
                        {
                            $flag1 = 1;
                        }
                        else
                            $flag1 = 0;
                        ?>
                    <? elseif ($arItem["DEPTH_LEVEL"] == 2): ?>
                        <? $flag1 = 0; ?>
                    <? endif; ?>
                    <? //-----------3-----------?>
                    <? if ($arItem["DEPTH_LEVEL"] == 3 && $flag1 == 1): ?>
                        <?
                        if (isset($arItem["LINK_DOMAIN"]))
                        {
                            $arItem["LINK"] = "http://" . $arItem["LINK_DOMAIN"] . $arItem["LINK"];
                            $link_domain = $arItem["LINK_DOMAIN"];
                        }
                        else
                        {
                            $arItem["LINK"] = "http://" . DEFAULT_DOMAIN . $arItem["LINK"];
                            $link_domain = DEFAULT_DOMAIN;
                        }
                        if ($_SERVER["HTTP_HOST"] != $link_domain)
                        {
                            $rel = 'rel="nofollow"';
                            $noindex = true;
                        }
                        else
                        {
                            $rel = "";
                            $noindex = false;
                        }

                        if ($page == "/index.php" and $_SERVER["HTTP_HOST"] != DEFAULT_DOMAIN)
                        {
                            $rel = "";
                            $noindex = false;
                        }
                        ?>
                        <? if ($arResult[$key - 1]["DEPTH_LEVEL"] < $arItem["DEPTH_LEVEL"] && $arResult[$key - 1]["SELECTED"] == 1): ?>
                            <ul <? if ($arResult[$key - 1]["SELECTED"] == 1): ?> class="active" <? endif; ?> >
                            <? endif; ?>

                            <li <? if ($arItem["SELECTED"] == 1): ?> class="active" <? endif; ?> >
                                <? if ($noindex): ?><!--noindex--><? endif; ?><a <?= $rel ?> href="<?= $arItem["LINK"] ?>">
                                    <span class="link"><?= $arItem["TEXT"] ?></span>
                                    <span class="bg"></span>
                                </a> <? if ($noindex): ?><!--/noindex--><? endif; ?>
                                <? if ($arResult[($key + 1)]["DEPTH_LEVEL"] <= $arItem["DEPTH_LEVEL"]): ?>
                                </li>
                            <? endif; ?>
                            <? if ($arResult[$key + 1]["DEPTH_LEVEL"] < $arItem["DEPTH_LEVEL"]): ?>
                            </ul>
                        <? endif; ?>
                    <? endif; ?>
                    <? //-----------2-----------?>
                    <? if ($arItem["DEPTH_LEVEL"] == 2 && $flag == 1): ?>
                        <?
                        if (isset($arItem["LINK_DOMAIN"]))
                        {
                            $arItem["LINK"] = "http://" . $arItem["LINK_DOMAIN"] . $arItem["LINK"];
                            $link_domain = $arItem["LINK_DOMAIN"];
                        }
                        else
                        {
                            $arItem["LINK"] = "http://" . DEFAULT_DOMAIN . $arItem["LINK"];
                            $link_domain = DEFAULT_DOMAIN;
                        }


                        if ($_SERVER["HTTP_HOST"] != $link_domain)
                        {
                            $rel = 'rel="nofollow"';
                            $noindex = true;
                        }
                        else
                        {
                            $rel = "";
                            $noindex = false;
                        }

                        if ($page == "/index.php" and $_SERVER["HTTP_HOST"] != DEFAULT_DOMAIN)
                        {
                            $rel = "";
                            $noindex = false;
                        }
                        ?>
                        <? if ($arItem["DEPTH_LEVEL"] == 2 && $arResult[($key + 1)]["DEPTH_LEVEL"] <= $arItem["DEPTH_LEVEL"] || ($arResult[$key + 1]["DEPTH_LEVEL"] < $arItem["DEPTH_LEVEL"]) || !isset($arResult[$key + 1])): ?>
                         </li>  
                    <? endif; ?>
                    <?
                    if ($arResult[$key + 1]["DEPTH_LEVEL"] < $arItem["DEPTH_LEVEL"]
                    ):
                        ?>
                    </ul>
                <? endif; ?>
            <? endif; ?>
            <? //-----------1----------- ?>
            <? if (($arItem["DEPTH_LEVEL"] == 1 && ($arResult[$key + 1]["DEPTH_LEVEL"] <= $arItem["DEPTH_LEVEL"] && $arItem["SELECTED"] == 1)) || ($arResult[$key + 1]["DEPTH_LEVEL"] < $arItem["DEPTH_LEVEL"]) || !isset($arResult[$key + 1])): ?>
           <?if (!$USER->IsAdmin()):?> </li><? endif; ?>
        <? endif; ?>	
    <? endforeach; ?>
<? endif; ?>
<?else:*/?>
<?
$startPoint = 0;
// file_put_contents($_SERVER['DOCUMENT_ROOT'].'/sections-test-file.txt', print_r($arResult,true));

foreach ($arResult as $key => $value) {
    if ($value['SELECTED'] == '1' && $arItem["LINK"] != "/catalog/")
    {
        $startPoint = $key;
        break;
    }
}
    if (isset($startPoint) && $startPoint != 0):?>
    <li class="active">
        <?$domain = $arResult[$startPoint]["LINK_DOMAIN"]?>
        <?
            $page = $APPLICATION->GetCurPage();
            if ($_SERVER["HTTP_HOST"] != $domain)
            {
                $rel = 'rel="nofollow"';
                $noindex = true;
            }
            else
            {
                $rel = "";
            }
            if ($page == "/index.php" and $_SERVER["HTTP_HOST"] != DEFAULT_DOMAIN)
            {
                $rel = "";
            }
        ?>
        <? if ($noindex): ?><!--noindex--><? endif; ?>
        <?if (!empty($arResult[$startPoint]["LINK_DOMAIN"])):?>
            <a <?=$rel?> href="<?= 'http://' . $arResult[$startPoint]["LINK_DOMAIN"] . $arResult[$startPoint]["LINK"];?>">
        <?else:?>
            <a <?=$rel?> href="<?= 'http://' . DEFAULT_DOMAIN . $arResult[$startPoint]["LINK"];?>">
        <?endif;?>
        <? if ($noindex): ?><!--/noindex--><? endif; ?>
                <span class='link'><?=$arResult[$startPoint]['TEXT']?></span>
                <span class="bg"></span>
            </a>
        <ul class='active'>
            <?
            for ($index=$startPoint+1; $index < count($arResult); $index++) { 
                if ($arResult[$index]['DEPTH_LEVEL'] == 1)
                    break;
                if ($arResult[$index]['SELECTED'] == '1'):
                ?>
                    <li class="active">
                        <?if (isset($arResult[$index]["LINK_DOMAIN"])) {
                            $link_domain = $arResult[$index]["LINK_DOMAIN"];
                        } else {
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
                        }?>
                        <? if ($rel != ''): ?><!--noindex--><? endif; ?>
                        <?if (!empty($arResult[$index]["LINK_DOMAIN"])):?>
                            <a <?=$rel?> href="<?= 'http://' . $arResult[$index]["LINK_DOMAIN"] . $arResult[$index]["LINK"];?>">
                        <?else:?>
                            <a <?=$rel?> href="<?= 'http://' . DEFAULT_DOMAIN . $arResult[$index]["LINK"];?>">
                        <?endif;?>
                                <span class='link'><?=$arResult[$index]['TEXT']?></span>
                                <span class="bg"></span>
                            </a>
                        <? if ($rel != ''): ?><!--/noindex--><? endif; ?>
                        <?if ($arResult[$index+1]['DEPTH_LEVEL'] == 3):?>
                        <ul class="active">
                            <?for ($index3 = $index+1; $index3 < count($arResult); $index3++):?> 
                                <?if (isset($arResult[$index3]["LINK_DOMAIN"])) {
                                    $link_domain = $arResult[$index3]["LINK_DOMAIN"];
                                } else {
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
                                }?>
                                <?if ($arResult[$index3]['DEPTH_LEVEL'] == 2 || $arResult[$index3]['DEPTH_LEVEL'] == 1):?>
                                    <?
                                    $index = $index3 - 1;
                                    break;
                                    ?>
                                <?else:?>
                                    <?if ($arResult[$index3]['SELECTED'] == '1'):?>
                                        <li class="active">
                                            <? if ($rel != ''):?><!--noindex--><? endif; ?>
                                            <?if (!empty($arResult[$index3]["LINK_DOMAIN"])):?>
                                                <a <?=$rel?> href="<?= 'http://' . $arResult[$index3]["LINK_DOMAIN"] . $arResult[$index3]["LINK"];?>">
                                            <?else:?>
                                                <a <?=$rel?> href="<?= 'http://' . DEFAULT_DOMAIN . $arResult[$index3]["LINK"];?>">
                                            <?endif;?>
                                                    <span class='link'><?=$arResult[$index3]['TEXT']?></span>
                                                    <span class="bg"></span>
                                                </a>
                                            <? if ($rel != ''): ?><!--/noindex--><? endif; ?>
                                        </li>
                                    <?else:?>
                                        <li>
                                            <? if ($rel != ''): ?><!--noindex--><? endif; ?>
                                            <?if (!empty($arResult[$index3]["LINK_DOMAIN"])):?>
                                                <a <?=$rel?> href="<?= 'http://' . $arResult[$index3]["LINK_DOMAIN"] . $arResult[$index3]["LINK"];?>">
                                            <?else:?>
                                                <a <?=$rel?> href="<?= 'http://' . DEFAULT_DOMAIN . $arResult[$index3]["LINK"];?>">
                                            <?endif;?>
                                                    <span class='link'><?=$arResult[$index3]['TEXT']?></span>
                                                    <span class="bg"></span>
                                                </a>
                                            <? if ($rel != ''): ?><!--/noindex--><? endif; ?>
                                        </li>
                                    <?endif;?>
                                <?endif;?>  
                            <?endfor;?>
                        </ul>
                        <?endif;?>
                    </li>
                <?
                else:
                ?>
             <?if (isset($arResult[$index]["LINK_DOMAIN"])) {
                            $link_domain = $arResult[$index]["LINK_DOMAIN"];
                        } else {
                            $link_domain = DEFAULT_DOMAIN;
                            $noindex = true;
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
                        }?>
                    <li>
                        <? if ($rel != ''): ?><!--noindex--><? endif; ?>
                        <?if (!empty($arResult[$index]["LINK_DOMAIN"])):?>
                            <a <?=$rel?> href="<?= 'http://' . $arResult[$index]["LINK_DOMAIN"] . $arResult[$index]["LINK"];?>">
                        <?else:?>
                            <a <?=$rel?> href="<?= 'http://' . DEFAULT_DOMAIN . $arResult[$index]["LINK"];?>">
                        <?endif;?>
                                <span class='link'><?=$arResult[$index]['TEXT']?></span>
                                <span class="bg"></span>
                            </a>
                        <? if ($rel != ''): ?><!--/noindex--><? endif; ?>
                        <?if ($arResult[$index+1]['DEPTH_LEVEL'] == 3):?>
                            <?for ($index3 = $index+1; $index3 < count($arResult); $index3++):?> 
                                <?if ($arResult[$index3]['DEPTH_LEVEL'] == 2 || $arResult[$index3]['DEPTH_LEVEL'] == 1):?>
                                    <?
                                    $index = $index3 - 1;
                                    break;
                                endif;
                                ?>
                            <?endfor;?>
                        <?endif;?> 
                    </li>
                <?
                endif;   
            }
            ?>
        </ul>
    </li>
    <?endif;?>
<?//endif;?>