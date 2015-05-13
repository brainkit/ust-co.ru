

<div class="header">
    <?
    $APPLICATION->IncludeComponent(
            "bitrix:main.include", "", Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "../promo/include/header.php",
        "EDIT_TEMPLATE" => ""
            ), false
    );
    ?> 

    <div class="clear"></div>
</div>

<div class="baner">
    <?
    $APPLICATION->IncludeComponent(
            "bitrix:main.include", "", Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "../promo/include/baner.php",
        "EDIT_TEMPLATE" => ""
            ), false
    );
    ?> 

</div>
<?/*
<div class="our_advantages">
<?
$APPLICATION->IncludeComponent(
        "bitrix:main.include", "", Array(
    "AREA_FILE_SHOW" => "file",
    "PATH" => "../promo/include/advantages.php",
    "EDIT_TEMPLATE" => ""
        ), false
);
?> 

</div>*/?>

<div class="catalog_button">
<div class="catalog_buttos">
<div class="open_catalog"><p><a href="http://generatory.ust-co.ru/upload/iblock/a13/a13a196bf01a8b34dcf2495494e13ffc.pdf" target="_blank">Посмотреть все модели</a></p></div>
<div class="save_catalog"><?/*<p><a href="http://generatory.ust-co.ru/upload/iblock/a13/a13a196bf01a8b34dcf2495494e13ffc.pdf" target="_blank">Скачать каталог</p>*/?></div>
</div>
</div>
<div class="catalog_tovar_generator">
    <div class="title">
        <h2>Популярные модели генераторов</h2>
        <div class="line_title"></div>
        <div class="catalog_tovar-logo">
            <img src="<?= SITE_TEMPLATE_PATH ?>/img/catalog_tovar-logo1.png" alt="">
            <img src="<?= SITE_TEMPLATE_PATH ?>/img/catalog_tovar-logo.png" alt="">
        </div>
    </div>
    <div class="catalog_tovar-wrap">
<?
$APPLICATION->IncludeComponent(
        "bitrix:news.list", "catalog", array(
    "DISPLAY_DATE" => "N",
    "DISPLAY_NAME" => "Y",
    "DISPLAY_PICTURE" => "Y",
    "DISPLAY_PREVIEW_TEXT" => "Y",
    "AJAX_MODE" => "N",
    "IBLOCK_TYPE" => "generator",
    "IBLOCK_ID" => "157",
    "NEWS_COUNT" => "9",
    "SORT_BY1" => "ACTIVE_FROM",
    "SORT_ORDER1" => "DESC",
    "SORT_BY2" => "SORT",
    "SORT_ORDER2" => "ASC",
    "FILTER_NAME" => "",
    "FIELD_CODE" => array(
        0 => "",
        1 => "PREVIEW_PICTURE",
        2 => "DETAIL_PICTURE",
        3 => "",
    ),
    "PROPERTY_CODE" => array(
        0 => "ATT_PRISE",
        1 => "",
    ),
    "CHECK_DATES" => "Y",
    "DETAIL_URL" => "",
    "PREVIEW_TRUNCATE_LEN" => "",
    "ACTIVE_DATE_FORMAT" => "d.m.Y",
    "SET_TITLE" => "N",
    "SET_BROWSER_TITLE" => "N",
    "SET_META_KEYWORDS" => "N",
    "SET_META_DESCRIPTION" => "N",
    "SET_STATUS_404" => "N",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "ADD_SECTIONS_CHAIN" => "N",
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
    "PARENT_SECTION" => "",
    "PARENT_SECTION_CODE" => "",
    "INCLUDE_SUBSECTIONS" => "N",
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
    "AJAX_OPTION_HISTORY" => "N",
    "AJAX_OPTION_ADDITIONAL" => ""
        ), false
);
?> 

        <div class="clear"></div>
    </div>
</div>
<div class="buy" id="formbuy">
    <div class="title">
        <h2>Отправить запрос</h2>
        <div class="line_title"></div>
    </div>
    <div class="left">
<?
/* $APPLICATION->IncludeComponent("new_form:main.feedback", "", Array(
  "USE_CAPTCHA" => "Y", // Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
  "OK_TEXT" => "Спасибо, ваше сообщение принято.", // Сообщение, выводимое пользователю после отправки
  "EMAIL_TO" => "online@ust-co.ru, info@ust-co.ru, syrex88@gmail.com", // E-mail, на который будет отправлено письмо
  "REQUIRED_FIELDS" => array(// Обязательные поля для заполнения
  0 => "EMAIL",
  ),
  "EVENT_MESSAGE_ID" => array(// Почтовые шаблоны для отправки письма
  0 => "7",
  ),
  "AJAX_MODE" => "Y", // режим AJAX
  "AJAX_OPTION_SHADOW" => "N",
  "AJAX_OPTION_JUMP" => "N", // скроллинг страницы к компоненту
  "AJAX_OPTION_STYLE" => "Y", // подключить стили
  "AJAX_OPTION_HISTORY" => "N",
  ), false
  ); */
?> 

        <?php
        $APPLICATION->IncludeComponent(
                "bitrix:form", ".default", array(
            "AJAX_MODE" => "Y",
            "SEF_MODE" => "N",
            "WEB_FORM_ID" => "1",
            "RESULT_ID" => $_REQUEST[RESULT_ID],
            "START_PAGE" => "new",
            "SHOW_LIST_PAGE" => "N",
            "SHOW_EDIT_PAGE" => "N",
            "SHOW_VIEW_PAGE" => "N",
            "SUCCESS_URL" => "",
            "SHOW_ANSWER_VALUE" => "N",
            "SHOW_ADDITIONAL" => "N",
            "SHOW_STATUS" => "Y",
            "EDIT_ADDITIONAL" => "N",
            "EDIT_STATUS" => "Y",
            "NOT_SHOW_FILTER" => array(
                0 => "",
                1 => "",
            ),
            "NOT_SHOW_TABLE" => array(
                0 => "",
                1 => "",
            ),
            "CHAIN_ITEM_TEXT" => "",
            "CHAIN_ITEM_LINK" => "",
            "IGNORE_CUSTOM_TEMPLATE" => "N",
            "USE_EXTENDED_ERRORS" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "SEF_FOLDER" => "/promo/",
            "VARIABLE_ALIASES" => array(
                "action" => "action",
            )
                ), false
        );
        ?>

    </div>
    <div class="right">
        <?
        $APPLICATION->IncludeComponent(
                "bitrix:main.include", "", Array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => "../promo/include/manager.php",
            "EDIT_TEMPLATE" => ""
                ), false
        );
        ?>               

    </div>
    <div class="clear"></div>
</div>
<div class="reviews">
    <div class="title">
        <h2>Отзывы наших клиентов</h2>
        <div class="line_title"></div>
    </div>

<?
$APPLICATION->IncludeComponent(
        "bitrix:main.include", "", Array(
    "AREA_FILE_SHOW" => "file",
    "PATH" => "../promo/include/reviews.php",
    "EDIT_TEMPLATE" => ""
        ), false
);
?> 


</div>

<div class="video_block">

    <div class="title">
        <h2>Видео</h2>
        <div class="line_title"></div>
    </div>
    <div class="video_wrap">
        <div class="left">

            <div class="video_texte">
<?
$APPLICATION->IncludeComponent(
        "bitrix:main.include", "", Array(
    "AREA_FILE_SHOW" => "file",
    "PATH" => "../promo/include/video_texte.php",
    "EDIT_TEMPLATE" => ""
        ), false
);
?> 
            </div>

        </div>

        <div class="right">
                <?
                $APPLICATION->IncludeComponent(
                        "bitrix:main.include", "", Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => "../promo/include/YouFrameVestido.php",
                    "EDIT_TEMPLATE" => ""
                        ), false
                );
                ?>

            <div class="plaer_wrap">
                <a class="video_href-click" href="javascript:void(0);"></a>                        
            </div>

        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="fields_application">
<?
$APPLICATION->IncludeComponent(
        "bitrix:main.include", "", Array(
    "AREA_FILE_SHOW" => "file",
    "PATH" => "../promo/include/fields_application.php",
    "EDIT_TEMPLATE" => ""
        ), false
);
?>

      
  
</div>

</div>



<div id="footer">

    <div class="page_wrap">
        <div class="footer">
        <?
        $APPLICATION->IncludeComponent(
                "bitrix:main.include", "", Array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => "../promo/include/footer.php",
            "EDIT_TEMPLATE" => ""
                ), false
        );
        ?> 

        </div>

    </div>        
</div>

<div class="red_line_bot">
    <div class="page_wrap">

        <p>
            <?
            $APPLICATION->IncludeComponent(
                    "bitrix:main.include", "", Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => "../promo/include/red_line_bot.php",
                "EDIT_TEMPLATE" => ""
                    ), false
            );
            ?> </p>
    </div>
</div>




            <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery-1.9.1.min.js'); ?>
            <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.modal.js'); ?>
            <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/readmore.js'); ?>

<script>
    $('article').readmore({maxHeight: 100});
</script>

            <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/readmore-vedeo.js'); ?>
<script>
    $('.video_texte').video_texte({maxHeight: 198});
</script>

<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/main.js'); ?>

<script>
    $(function () {

        $("#OnBottom").click(function () {
            $("html,body").animate({scrollTop: ($(document).height() - 750)}, "slow")
        })

    });
</script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/source/jquery.fancybox.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>  

<script type="text/javascript">
    $(document).ready(function () {

        $('.fancybox').fancybox({
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
    });
</script>

<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter23768764 = new Ya.Metrika({id:23768764, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/23768764" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->

</body>

</html>