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

require_once('include/utils/utils.php');
global $adb, $current_user;
// $adb->setDebug(TRUE);

$modulename = from_html($_REQUEST["modulename"]);
$templateid = vtlib_purify($_REQUEST["templateid"]);
$body = fck_from_html($_REQUEST["body"]);
$pdf_format = from_html($_REQUEST["pdf_format"]);
$pdf_orientation = from_html($_REQUEST["pdf_orientation"]);

if(isset($templateid) && $templateid !='')
{
	$sql = "update vtiger_pdfmaker set body =? where templateid =?";
	$params = array($body, $templateid);
	$adb->pquery($sql, $params);

	$sql2 = "DELETE FROM vtiger_pdfmaker_settings WHERE templateid =?";
	$params2 = array($templateid);
	$adb->pquery($sql2, $params2);
}
else
{
	header("Location:index.php?module=PDFMaker&action=ListPDFTemplates&parenttab=Tools");
	exit;
}

if ($_REQUEST["margin_top"] > 0) $margin_top = $_REQUEST["margin_top"]; else $margin_top = 0;
if ($_REQUEST["margin_bottom"] > 0) $margin_bottom = $_REQUEST["margin_bottom"]; else $margin_bottom = 0;
if ($_REQUEST["margin_left"] > 0) $margin_left = $_REQUEST["margin_left"]; else $margin_left = 0;
if ($_REQUEST["margin_right"] > 0) $margin_right = $_REQUEST["margin_right"]; else $margin_right = 0;

$dec_point = $_REQUEST["dec_point"];
$dec_decimals = $_REQUEST["dec_decimals"];
$dec_thousands = ($_REQUEST["dec_thousands"]!=" " ? $_REQUEST["dec_thousands"]:"sp");

$header=$_REQUEST["header_body"];
$footer=$_REQUEST["footer_body"];

$encoding = (isset($_REQUEST["encoding"]) ? $_REQUEST["encoding"] : "auto");

$sql4 = "INSERT INTO vtiger_pdfmaker_settings (templateid, margin_top, margin_bottom, margin_left, margin_right, format, orientation, decimals, decimal_point, thousands_separator, header, footer, encoding) 
         VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
$params4 = array($templateid, $margin_top, $margin_bottom, $margin_left, $margin_right, $pdf_format, $pdf_orientation, $dec_decimals, $dec_point, $dec_thousands, $header, $footer, $encoding);
$adb->pquery($sql4, $params4);

//ignored picklist values
$adb->query("DELETE FROM vtiger_pdfmaker_ignorepicklistvalues");
$pvvalues=explode(",", $_REQUEST["ignore_picklist_values"]);
foreach($pvvalues as $value)
  $adb->query("INSERT INTO vtiger_pdfmaker_ignorepicklistvalues(value) VALUES('".trim($value)."')");
// end ignored picklist values

if ($Header_Img["error"] == "true" || $Footer_Img["error"] == "true")
{
    header("Location:index.php?module=PDFMaker&action=EditPDFTemplate&parenttab=Tools&eheader=".$Header_Img["error"]."&efooter=".$Footer_Img["error"]."&templateid=".$templateid);
}
elseif(isset($_REQUEST["redirect"]) && $_REQUEST["redirect"]=="false" )
{
  header("Location:index.php?module=PDFMaker&action=EditPDFTemplate&parenttab=Tools&applied=true&templateid=".$templateid);
}
else
{
  header("Location:index.php?module=PDFMaker&action=DetailViewPDFTemplate&parenttab=Tools&templateid=".$templateid);
}

exit;
?>
