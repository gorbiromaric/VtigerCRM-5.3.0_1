<?php
/*+********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ********************************************************************************/
// ITS4YOU TT0093 VlMe N

require_once('Smarty_setup.php');
require_once('include/database/PearDatabase.php');

global $adb, $current_user;

$smarty = new vtigerCRM_Smarty;

$sql = "SELECT templateid, description, filename, module 
        FROM vtiger_pdfmaker 
        ORDER BY templateid ASC";
$result = $adb->pquery($sql, array());

$return_data = Array();
$num_rows = $adb->num_rows($result);

for($i=0;$i < $num_rows; $i++)
{	
	$pdftemplatearray=array();
	$templateid = $adb->query_result($result,$i,'templateid');
	
	$pdftemplatearray['templateid'] = $templateid;
	
	if(isPermitted($currentModule,"EditView") == 'yes')
		$link = "index.php?action=EditPDFTemplate&module=PDFMaker&templateid=".$templateid."&parenttab=Tools";
	else
		$link = "index.php?action=DetailViewPDFTemplate&module=PDFMaker&templateid=".$templateid."&parenttab=Tools";
  
	$pdftemplatearray['module'] = "<a href=\"".$link."\">".getTranslatedString($adb->query_result($result,$i,'module'))."</a>";
	
	$return_data []= $pdftemplatearray;	
}

require_once('include/utils/UserInfoUtil.php');
global $app_strings;
global $mod_strings;
global $theme,$default_charset;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";

global $current_language;

$smarty->assign("MOD", $mod_strings);
$smarty->assign("APP", $app_strings);
$smarty->assign("THEME", $theme);
$smarty->assign("PARENTTAB", getParentTab());
$smarty->assign("IMAGE_PATH",$image_path);

$smarty->assign("ORDERBY",$orderby);
$smarty->assign("DIR",$dir);

include_once("version.php");
$smarty->assign("VERSION",$version);

$smarty->assign("PDFTEMPLATES",$return_data);
$category = getParentTab();
$smarty->assign("CATEGORY",$category);
$smarty->display("modules/PDFMaker/ListPDFTemplates.tpl");

?>