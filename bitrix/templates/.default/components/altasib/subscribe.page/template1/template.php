<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?ShowMessage(Array("TYPE"=>$arResult["MESSAGE_TYPE"], "MESSAGE"=>$arResult["MESSAGE"]));?>

<?if(($arResult["ACTION"] == "SUBSCRIBE") || ($arResult["ACTION"] == "EDIT")){?>

	<?if($arResult["ACTION"] == "EDIT"){?><b><?=GetMessage("subscr_user_edit")?></b><?}?>

	<div class="alx_subscribe_form">
	<form action="">
	<input name="ACTION" type="hidden" value="<?=$arResult["ACTION"]?>">

	<?foreach($arResult["RUBRICS"] as $itemID => $itemValue){?>
		<label for="RUB_ID_<?=$itemValue["ID"]?>">
		<input type="checkbox" name="RUB_ID[]" id="RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo "checked='checked'"?> /> <?=$itemValue["NAME"]?>
		</label><br />
	<?}?>

		<table border="0" cellspacing="0" cellpadding="0" class="alx_subscribe_tbl">
			<tr>
				<td><input type="text" name="EMAIL" size="20" value="<?=$arResult["EMAIL"]?>" title="<?=GetMessage("subscr_form_email_title")?>" /></td>
			</tr>
			<tr>
				<td align="left"><input type="submit" name="OK" value="<?=GetMessage($arResult["ACTION"]."_form_button")?>" /></td>
			</tr>
		</table>
	</form>
	</div>


<?}elseif($arResult["ACTION"] == "UNSUBSCRIBE"){?>

	<?if(!$arResult["MESSAGE"]){?>

		<form action="">
		<input name="ACTION" type="hidden" value="<?=$arResult["ACTION"]?>">
		<input name="CODE" type="hidden" value="<?=$_REQUEST["CODE"]?>">
		<input name="TCODE" type="hidden" value="<?=$_REQUEST["TCODE"]?>">
		<input name="EMAIL" type="hidden" value="<?=$_REQUEST["EMAIL"]?>">
		<input name="SID" type="hidden" value="<?=$_REQUEST["SID"]?>">

		<?=GetMessage("unsubscr_user_text1")?>

		<ul>
			<?foreach($arResult["RUB"] as $rub){?>
				<li>
					<input type="hidden" name="RUB_ID[]" id="RUB_ID_<?=$rub?>" value="<?=$rub?>" />
					<?=$arResult["RUBRICS"][$rub]["NAME"]?>
				</li>
			<?}?>
		</ul>

		<?=GetMessage("unsubscr_user_text2")?> "<?=GetMessage("confirm_form_button")?>"
		<br />
		<input type="submit" name="OK" value="<?=GetMessage("confirm_form_button")?>" />
		</form>
	<?}?>

	<?if($arResult["EDIT_LINK"]){?><a href="<?=$arResult["EDIT_LINK"]?>"><i><?=GetMessage("subscr_user_edit")?> &raquo;</i></a><?}?>

<?}else{?>

	<?if($arResult["MESSAGE_TYPE"] != "ERROR"){?>

		<?if(count($arResult["SUBSCR_RUB"]) > 0){?>

			<?=GetMessage("subscr_user_subscr_list")?>
			<ul>
				<?foreach($arResult["RUBRICS"] as $rub){?>

					<?if($rub["CHECKED"] == "1") echo "<li>".$rub["NAME"]."</li>"?>

				<?}?>
			</ul>
		<?}?>

		<?if($arResult["EDIT_LINK"]){?><a href="<?=$arResult["EDIT_LINK"]?>"><i><?=GetMessage("subscr_user_edit")?> &raquo;</i></a><?}?>

	<?}?>

<?}?>
