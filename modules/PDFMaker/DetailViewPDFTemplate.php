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

$log->info("Inside Email Template Detail View");

$smarty = new vtigerCRM_smarty;

$smarty->assign("APP", $app_strings);
$smarty->assign("THEME", $theme);
$smarty->assign("MOD", $mod_strings);

$smarty->assign("MODULE", 'Tools');
$smarty->assign("IMAGE_PATH", $image_path);

if(isset($_REQUEST['templateid']) && $_REQUEST['templateid']!='')
{
  	$log->info("The templateid is set");
  	$tempid = $_REQUEST['templateid'];

  	$sql = "SELECT vtiger_pdfmaker.*, vtiger_pdfmaker_settings.*
              FROM vtiger_pdfmaker 
              LEFT JOIN vtiger_pdfmaker_settings
                ON vtiger_pdfmaker_settings.templateid = vtiger_pdfmaker.templateid
             WHERE vtiger_pdfmaker.templateid=?";
        
  	$result = $adb->pquery($sql, array($tempid));
  	$pdftemplateResult = $adb->fetch_array($result);

    $smarty->assign("FILENAME", $pdftemplateResult["filename"]);
    $smarty->assign("DESCRIPTION", $pdftemplateResult["description"]);
    $smarty->assign("TEMPLATEID", $pdftemplateResult["templateid"]);
    $smarty->assign("MODULENAME", getTranslatedString($pdftemplateResult["module"]));
    $smarty->assign("BODY", decode_html($pdftemplateResult["body"]));
    $smarty->assign("HEADER", decode_html($pdftemplateResult["header"]));
    $smarty->assign("FOOTER", decode_html($pdftemplateResult["footer"]));
    
    $smarty->assign("SELECT_FORMAT", $pdftemplateResult["format"]);
    $smarty->assign("SELECT_ORIENTATION", $mod_strings[$pdftemplateResult["orientation"]]);
    
    $sql = "SELECT is_active, is_default FROM vtiger_pdfmaker_userstatus WHERE templateid=? AND userid=?";
    $result = $adb->pquery($sql,array($_REQUEST['templateid'],$current_user->id));
    if($adb->num_rows($result)>0)
    {
      $status_row = $adb->fetchByAssoc($result);      
      if($status_row["is_active"]=="1")
      {
        $is_active = $app_strings["Active"];
        $activateButton = $mod_strings["LBL_SETASINACTIVE"];  
      }
      else
      {
        $is_active = $app_strings["Inactive"];
        $activateButton = $mod_strings["LBL_SETASACTIVE"];
      }
      
      if($status_row["is_default"]=="1")
      {
        $is_default = '<img src="themes/images/yes.gif" alt="yes" />';
        $defaultButton = $mod_strings["LBL_UNSETASDEFAULT"];
      }
      else
      {
        $is_default = '<img src="themes/images/no.gif" alt="no" />';
        $defaultButton = $mod_strings["LBL_SETASDEFAULT"];
      }
    }
    else
    {
      $is_active = $app_strings["Active"];
      $is_default = '<img src="themes/images/no.gif" alt="no" />';
      $activateButton = $mod_strings["LBL_SETASINACTIVE"];
      $defaultButton = $mod_strings["LBL_SETASDEFAULT"];
    }
    
    $smarty->assign("IS_ACTIVE", $is_active);
    $smarty->assign("IS_DEFAULT", $is_default);  
    $smarty->assign("ACTIVATE_BUTTON", $activateButton);
    $smarty->assign("DEFAULT_BUTTON", $defaultButton);
}

//PDF MARGIN SETTINGS
$Margins = array("top" => $pdftemplateResult["margin_top"], 
                 "bottom" => $pdftemplateResult["margin_bottom"], 
                 "left" => $pdftemplateResult["margin_left"], 
                 "right" => $pdftemplateResult["margin_right"]);


$smarty->assign("MARGINS",$Margins);
include_once("version.php");
$smarty->assign("VERSION",$version);

if(isPermitted($currentModule,"EditView") == 'yes')
{
  $smarty->assign("EDIT","permitted");
	
  $smarty->assign("EXPORT","yes");
  $smarty->assign("IMPORT","yes");
}

$category = getParentTab();
$smarty->assign("CATEGORY",$category);
$smarty->display("modules/PDFMaker/DetailViewPDFTemplate.tpl");

?>
