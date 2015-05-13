<!DOCTYPE html>
<html>
<head>
<?$APPLICATION->ShowHead()?>
<title><?$APPLICATION->ShowTitle()?></title>
<!--my css-->
<!--link href="<?=SITE_TEMPLATE_PATH?>/css/style.css" rel="stylesheet" type="text/css"-->
<?
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/style.css');
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/source/jquery.fancybox.css');
?>

<!--link href="<?=SITE_TEMPLATE_PATH?>/js/source/jquery.fancybox.css" rel="stylesheet" type="text/css"--> 

</head>
<body>
    <?$APPLICATION->ShowPanel();?>
    <div class="modal_order" id="ex1" style="display:none;">
        <div class="title">
            <h2>Заказать обратный звонок</h2>
            <div class="line_title"></div>
        </div> 
        
        <div class="form_fitbec">
            <p>Заполните, пожалуйста, форму, чтобы наш менеджер мог связаться с Вами:</p>
            <?
            
            
 $APPLICATION->IncludeComponent("bitrix:form", "form_gen_zvonok", Array(
	"AJAX_MODE" => "Y",	// Включить режим AJAX
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"WEB_FORM_ID" => "2",	// ID веб-формы
		"RESULT_ID" => $_REQUEST[RESULT_ID],	// ID результата
		"START_PAGE" => "new",	// Начальная страница
		"SHOW_LIST_PAGE" => "N",	// Показывать страницу со списком результатов
		"SHOW_EDIT_PAGE" => "N",	// Показывать страницу редактирования результата
		"SHOW_VIEW_PAGE" => "N",	// Показывать страницу просмотра результата
		"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
		"SHOW_ANSWER_VALUE" => "N",	// Показать значение параметра ANSWER_VALUE
		"SHOW_ADDITIONAL" => "N",	// Показать дополнительные поля веб-формы
		"SHOW_STATUS" => "N",	// Показать текущий статус результата
		"EDIT_ADDITIONAL" => "N",	// Выводить на редактирование дополнительные поля
		"EDIT_STATUS" => "N",	// Выводить форму смены статуса
		"NOT_SHOW_FILTER" => array(	// Коды полей, которые нельзя показывать в фильтре
			0 => "",
			1 => "",
		),
		"NOT_SHOW_TABLE" => array(	// Коды полей, которые нельзя показывать в таблице
			0 => "",
			1 => "",
		),
		"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
		"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
		"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
		"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"SEF_FOLDER" => "/promo/",	// Каталог ЧПУ (относительно корня сайта)
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
); 

            
            ?>



            
                <div class="clear"></div>
        </div>

    </div>

	<div id="page_wrap" class="page_wrap">
         