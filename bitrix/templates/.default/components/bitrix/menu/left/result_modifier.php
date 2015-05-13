<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
//pr($arResult);
/**/
 $domains=  get_domains();




//------------
 $sections_UF=get_sections_url_on_name();
 
 //pr($sections_UF);
//----------------
//--------

foreach ($arResult as $key => $arItem)
{
    if ($sections_UF[$arItem["TEXT"]] != "")
    {
        $arResult[$key]["LINK_DOMAIN"] = $domains[$sections_UF[$arItem["TEXT"]]];
    }
}


/**/
?>