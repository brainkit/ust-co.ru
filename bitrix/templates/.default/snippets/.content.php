<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$SNIPPETS = Array();
$SNIPPETS['altasib_subscribe_01.snp'] = Array("title"=>'Отказаться от рассылки', "description"=>'Упрощенное управление рассылками: Ссылка на отказ от подписки');
$SNIPPETS['altasib_subscribe_02.snp'] = Array("title"=>'Имя', "description"=>'Упрощенное управление рассылками: подстановка имени');
$SNIPPETS['altasib_subscribe_03.snp'] = Array("title"=>'Фамилия', "description"=>'Упрощенное управление рассылками: подстановка фамилии');
$SNIPPETS['altasib_subscribe_log.snp'] = Array("title"=>'Логическое выражение', "description"=>'Упрощенное управление рассылками: сниппет с поддержкой логики 


Если в профиле прльзователя заполнено поле SNIPPET (использованное в ALTASIB_UNSUBSCRIBE_SNIPPET),
в шаблон письма будет подставлена левая часть выражения,
с заменой сниппета на значение соответствующего поля из профиля пользователя. 


Иначе в шаблон письма будет подставлена правая часть, без замены. 


Рассмотрим выражение [##Здравствуйте, [ALTASIB_UNSUBSCRIBE_NAME]!##Добрый вечер!##]\'.


Если в профиле пользователя заполнено имя (например, Василий), в его выпуске рассылки будет персональное обращение (Здавствуйте, Василий!)


Если имя не заполнено, будет использовано общее обращение (Добрый вечер!)');
?>