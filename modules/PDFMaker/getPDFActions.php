<?php
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
*
 ********************************************************************************/
// ITS4YOU TT0093 VlMe N
 
require_once('Smarty_setup.php');
require_once('data/Tracker.php');
require_once('include/utils/UserInfoUtil.php');
require_once('include/database/PearDatabase.php');
global $adb;
global $log;
global $mod_strings;
global $app_strings;
global $current_language, $current_user;
global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";

$record = $_REQUEST["record"];

$sql = "SELECT setype FROM vtiger_crmentity WHERE crmid = '".$record."'";
$relmodule = $adb->getOne($sql,0,"setype");

$log->info("Inside Email Template Detail View");

$smarty = new vtigerCRM_smarty;

$smarty->assign("APP", $app_strings);
$smarty->assign("THEME", $theme);
$smarty->assign("MOD", $mod_strings);

$smarty->assign("MODULE", $relmodule);
$smarty->assign("IMAGE_PATH", $image_path);

$smarty->assign("ID", $_REQUEST["record"]);

require('user_privileges/user_privileges_'.$current_user->id.'.php');

if(is_dir("modules/PDFMaker/mpdf"))
{
	if($is_admin == true || $profileGlobalPermission[2]==0 || $profileGlobalPermission[1]==0 || $profileTabsPermission[getTabId("PDFMaker")]==0)
		$smarty->assign("ENABLE_PDFMAKER",'true');
}

$smarty->assign('PDFMAKER_MOD',return_module_language($current_language,"PDFMaker"));
      
if(!isset($_SESSION["template_languages"]) || $_SESSION["template_languages"]=="") {
	$temp_res = $adb->query("SELECT label, prefix FROM vtiger_language WHERE active=1");
	while($temp_row = $adb->fetchByAssoc($temp_res)) {
	  $template_languages[$temp_row["prefix"]]=$temp_row["label"];
	}
	$_SESSION["template_languages"]=$template_languages;
}     
      
$smarty->assign('TEMPLATE_LANGUAGES',$_SESSION["template_languages"]);
$smarty->assign('CURRENT_LANGUAGE',$current_language);

$category = getParentTab();
$smarty->assign("CATEGORY",$category);
$smarty->display("modules/PDFMaker/InventoryPdfActions.tpl");

?>
