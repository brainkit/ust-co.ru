<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
if (!empty($arResult))
{
    foreach ($arResult as $key => $value)
    {
        if ($value["DEPTH_LEVEL"] == 1)
        {
            $depth_1[] = $key;
        }
    }
    foreach ($depth_1 as $key => $level)
    {
        $flag = 0;
        for ($i = $level + 1; $i < $depth_1[$key + 1]; $i++)
        {
            if ($arResult[$i]["SELECTED"])
                $flag = 1;
        }
        if ($flag == 1)
        {
            $arResult[$level]["SELECTED"] = 1;
            $arResult[$level]["SELECTED_THIS"] = 1;
        }
        else
            $arResult[$level]["SELECTED_THIS"] = 0;
    }


   
    $domains=  get_domains();



//-------------
 $sections_UF=get_sections_url_on_name();


//--------
    foreach ($arResult as $key => $arItem)
    {

        if ($sections_UF[$arItem["TEXT"]] != "")
        {
            $arResult[$key]["LINK_DOMAIN"] = $domains[$sections_UF[$arItem["TEXT"]]];
        }
    }
}
?>