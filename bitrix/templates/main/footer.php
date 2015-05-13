<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
IncludeTemplateLangFile(__FILE__);
?>
<? if ($_SERVER["REQUEST_URI"] != "/" && $_SERVER["SCRIPT_NAME"] != "/index.php"): ?>
    <? if ($APPLICATION->GetProperty("HIDE_MENU") != "Y"): ?>
        <? $APPLICATION->IncludeComponent("areal:tabs", ".default"); ?>
        </div>
    <? endif; ?>
	<? if ($_SERVER["REQUEST_URI"] == "/happy-new-year/" || $_SERVER["REQUEST_URI"] == "/happy-new-year-en/"): ?></div><? endif; ?>
        <? 
        if ($APPLICATION->GetProperty("HIDE_MENU") != "Y" and http_response_code() != "404") {
          echo '<div class="a-side">';
        echo '<div class="side-nav">';
        echo '<ul>';
        $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"left", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "child",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "Y"
	),
	false
);
        
        
        $APPLICATION->IncludeComponent(
                "bitrix:menu", "catalog", array(
            "ROOT_MENU_TYPE" => "catalog",
            "MENU_CACHE_TYPE" => "A",
            "MENU_CACHE_TIME" => "360000",
            "MENU_CACHE_USE_GROUPS" => "N",
            "MENU_CACHE_GET_VARS" => array(
            ),
            "MAX_LEVEL" => "3",
            "CHILD_MENU_TYPE" => "child",
            "USE_EXT" => "Y",
            "DELAY" => "N",
            "ALLOW_MULTI_SELECT" => "N"
                ), false
        );
        echo '</ul>';
        echo '</div>';
        $APPLICATION->IncludeComponent("areal:banner.flash", "template1", Array(
                ), false
        );
        //24904661
        echo '<div class="shares">';
        echo '<a onclick="yaCounter24904661.reachGoal(\'osen\'); return true;" href="/files/2014Sm.pdf" download="/files/2014Sm.pdf">';
        echo '<img src="http://ust-co.ru/design/images/spec_p.png" width="290" height="117" alt="Скачать прайс" title="Скачать прайс"></a>';
        echo '</div>';
        echo '<div class="print-catalog">';
        echo '<a  onclick="yaCounter24904661.reachGoal(\'print_catalog_online\'); return true;"  class="open_catalog" href="/files/catalogue_2014-2.pdf" target="_blank" rel="nofollow" title="Смотреть печатный каталог">ПЕЧАТНЫЙ КАТАЛОГ<span class="open_catalog">смотреть онлайн версию</span></a><a class="save_catalog"  onclick="yaCounter24904661.reachGoal(\'print_catalog_download\'); return true;"  href="/files/catalogue_2014-2.pdf" download="/files/catalogue_2014-2.pdf" title="Скачать печатный каталог"> <span class="save_catalog">скачать (PDF)</span></a>';
        echo '</div>';
        echo '<div class="zapchasti_catalog">';
        echo '<a href="http://ust-co.ru/catalog/zapchasti/" id="zapchasti_catalog" title="Перейти в каталог запасных частей">ЗАПАСНЫЕ ЧАСТИ<span>КОМПЛЕКТУЮЩИЕ, РАСХОДНЫЕ МАТЕРИАЛЫ</span></a>';
        
        echo '</div>';
         if ($APPLICATION->GetProperty("NEWS_LEFT") != "N") {
            $APPLICATION->IncludeComponent("bitrix:news.list", "news_left", array(
                "IBLOCK_TYPE" => "about_company",
                "IBLOCK_ID" => "18",
                "NEWS_COUNT" => "3",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "CHECK_DATES" => "Y",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "j F Y",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N"
                    ), false
            );
        }
        echo '</div>';
        }
        
        ?>
    <div class="clear"></div>
    </div>
<? endif; ?>
</div>
<? if ($APPLICATION->GetProperty("SHOW_BANNERS_BOTTOM") != "N"): ?>
    <? $APPLICATION->IncludeComponent("areal:brands.bottom", "bottom", array("CATALOG" => "N")); ?>
<? endif; ?>
<footer>

    <div class="wrapper">
        <div class="foot-top">
            <div class="wrapper">
                <div class="top-line">
                    <div class="phones">
                        <div class="phone">
                            <span><? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/phone.php"), false); ?></span>
                            <div class="hint">Единый номер по России</div>
                        </div>
                        <div class="phone">
                            <span><?= GetPhoneFromTown() ?></span>
							<div class="hint">Региональный номер</div>
                        </div>
                        
                    </div>

                    <div class="mail-link">
                        <span>&nbsp;</span>
                        <a class="e-mail" title="info" href="#ust-co.ru" ></a>
                    </div>
					<div class="take-survey">
        <a href="#" id="take-survey" title="Пройти опрос">Пройдите опрос</a>
        <?$APPLICATION->IncludeComponent("areal:survey.new", ".default");?>
        </div>
					
                    <div class="social">
                        <a href="http://www.youtube.com/user/universalspec/" class="soc soc-yt" title="Универсал Спецтехника на YouTube" target="_blank" rel="nofollow"></a>
						<a href="https://vk.com/club29467603" class="soc soc-vk" title="Универсал Спецтехника в VK" target="_blank" rel="nofollow"></a>
                        <a href="https://www.facebook.com/pages/%D0%A3%D0%BD%D0%B8%D0%B2%D0%B5%D1%80%D1%81%D0%B0%D0%BB-%D0%A1%D0%BF%D0%B5%D1%86%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B0/168428986565663?sk=timeline&ref=page_internal" class="soc soc-fb" title="Универсал Спецтехника на Facebook" target="_blank" rel="nofollow"></a>
                        <a href="https://twitter.com/Universalspec" class="soc soc-tw" title="Универсал Спецтехника в Twitter" target="_blank" rel="nofollow"></a>
                        <a href="http://instagram.com/universalspetstehnika#" class="soc soc-ins" title="Универсал Спецтехника в Instagram" target="_blank" rel="nofollow"></a>
                    </div>
                </div>
                <div class="navs">
<div class="sitemap nav-collapsed">
	<div class="title"><a href="/map/" class="main-link" title="Посмотреть карту сайта">Карта сайта</a></div>
                        <div class="collapsed active">
                            <?
                            $APPLICATION->IncludeComponent("bitrix:menu", "bottom", array(
                                "ROOT_MENU_TYPE" => "bottom",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_TIME" => "36000000",
                                "MENU_CACHE_USE_GROUPS" => "N",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "child",
                                "USE_EXT" => "Y",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N"
                                    ), false
                            );
                            ?>

                        </div>
                </div>
                    <?
                    $APPLICATION->IncludeComponent("areal:filials.bottom", "template1", Array(
                            ), false
                    );
                    ?>
                </div>
            </div>
        </div>
        <div class="foot-bot">
            <div class="wrapper">
                <div class="copy">
<? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/copyright.php"), false); ?>
                </div>
                <div class="links">
                    <a href="/o-kompanii/kontakty/Rekvizity-Kompanii-Universal-Spectehnika.doc" rel="nofollow">Юридическая информация</a>
                    <a href="/o-kompanii/kontakty/" rel="nofollow">Обратная связь</a>
                </div>
                <div class="author">
                        <!--<a href="http://www.arealidea.ru" target="_blank" title="Arealidea" <? if ($_SERVER["REQUEST_URI"] != "/" && $_SERVER["SCRIPT_NAME"] != "/index.php"): ?> rel="nofollow" <? endif; ?>><span>Разработка сайта</span><img src="/verstka/01/img/arealidea-logo.png" width="107" height="17" alt=""></a>-->
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<div class="dialog" id="badie">Вы используете устаревший браузер, для корректной работы сайта рекомендуем Вам установить один из следующих браузеров: <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" target="_blank" rel="nofollow" title="Internet Explorer">Internet Explorer 10</a>, <a href="http://www.mozilla.org/en-US/" title="Firefox" rel="nofollow" target="_blank">Firefox</a>, <a href="http://www.opera.com/ru" title="Opera" rel="nofollow" target="_blank">Opera</a>, <a href="https://www.google.com/intl/ru/chrome/browser/" title="Chrome" rel="nofollow" target="_blank">Chrome</a></div>
<div class="dialog" id="change_town"><? $APPLICATION->IncludeComponent("areal:select.town", ".default") ?></div>
<div class="dialog" id="callback"><? $APPLICATION->IncludeComponent("areal:form.callback.new", "template1", Array(
	
	),
	false
);?></div>		
<input type="hidden" name="ust_banners_speed" value="<?= COption::GetOptionInt("ust", "ust_banners_speed"); ?>" />
<input type="hidden" name="ust_banners_timeout" value="<?= COption::GetOptionInt("ust", "ust_banners_timeout"); ?>" />
<?//if($USER->IsAdmin()):?>
    <div class="dialog" id="file_popup"><? $APPLICATION->IncludeComponent("areal:form.file", ".default") ?></div>
<?//endif;?>
<!--<script>-->
<!--    -->
<!--  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){-->
<!--  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),-->
<!--  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)-->
<!--  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');-->
<!---->
<!--// ga('create', 'UA-50892414-1', 'ust-co.ru');-->
<!--//ga('send', 'pageview');-->
<!--    var dimensionValue='123';-->
<!--    ga('create', 'UA-50892414-1', {userId: '26003'});-->
<!--    ga('set', 'dimension1', '26003');-->
<!--    ga('set', 'dimension4', dimensionValue);-->
<!--    ga('send', 'pageview');-->
<!---->
<!--</script>-->




<!-- Yandex.Metrika counter --><script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript"></script><script type="text/javascript">try { var yaCounter24904661 = new Ya.Metrika({id:24904661, webvisor:true, clickmap:true, trackLinks:true}); } catch(e) { }</script><noscript><div><img src="//mc.yandex.ru/watch/24904661" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-50892414-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    //ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript">var _kmq = _kmq || [];
    var _kmk = _kmk || 'a7eda204cf7850f2fd68d9de39384af13334009d';
    function _kms(u) {
        setTimeout(function() {
            var d = document, f = d.getElementsByTagName('script')[0],
                    s = d.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = u;
            f.parentNode.insertBefore(s, f);
        }, 1);
    }
    _kms('//i.kissmetrics.com/i.js');
    _kms('//doug1izaerwt3.cloudfront.net/' + _kmk + '.1.js');
</script>
<? if ($_SERVER["HTTP_HOST"] == "u-st.ru"): ?> 

    <!-- begin of Top100 code -->
    <div class="no_metrik_code">
        <script id="top100Counter" type="text/javascript" src="http://counter.rambler.ru/top100.jcn?3037658"></script>
    </div>
    <!-- end of Top100 code -->
    <!-- Rating@Mail.ru counter -->
    <script type="text/javascript">
        var _tmr = _tmr || [];
        _tmr.push({id: "2547390", type: "pageView", start: (new Date()).getTime()});
        (function(d, w) {
            var ts = d.createElement("script");
            ts.type = "text/javascript";
            ts.async = true;
            ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
            var f = function() {
                var s = d.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(ts, s);
            };
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window);
    </script><noscript><div style="position:absolute;left:-10000px;">
        <img src="//top-fwz1.mail.ru/counter?id=2547390;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru" />
    </div></noscript>
    <!-- //Rating@Mail.ru counter -->

<? elseif ($_SERVER["HTTP_HOST"] == "ust-co.ru"): ?>

    <!-- begin of Top100 code -->
    <div class="no_metrik_code">
        <script id="top100Counter" type="text/javascript" src="http://counter.rambler.ru/top100.jcn?3037611"></script>
    </div>
    <!-- end of Top100 code -->
    <!-- Rating@Mail.ru counter -->
    <script type="text/javascript">
        var _tmr = _tmr || [];
        _tmr.push({id: "2547385", type: "pageView", start: (new Date()).getTime()});
        (function(d, w) {
            var ts = d.createElement("script");
            ts.type = "text/javascript";
            ts.async = true;
            ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
            var f = function() {
                var s = d.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(ts, s);
            };
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window);
    </script><noscript><div style="position:absolute;left:-10000px;">
        <img src="//top-fwz1.mail.ru/counter?id=2547385;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru" />
    </div></noscript>
    <!-- //Rating@Mail.ru counter -->
<? endif; ?>

<?php $APPLICATION->IncludeComponent('unispec:session', '.default', array()); ?>

<!--?php $APPLICATION->IncludeComponent('universal_analytics:base', '.default', array()); ?-->
  
<!--rtb start
<? //include 'rtb.php'; ?>
rtb end--> 

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'gvbVvabVb3';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->

</body>
</html>