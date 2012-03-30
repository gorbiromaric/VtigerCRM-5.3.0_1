<?php
global $theme_path,$mod_strings,$app_strings;

error_reporting(E_ERROR | E_PARSE);
require_once("Smarty_setup.php");
$smarty = new vtigerCRM_Smarty();

$theme_path="themes/".$theme_path."/";
$image_path=$theme_path."images/";

$smarty->assign("THEME", $theme_path);
$smarty->assign("IMAGE_PATH", $image_path);
$smarty->assign("MOD",$mod_strings);
$smarty->assign("APP",$app_strings);
 
if($_REQUEST["installtype"]=="download_src")
{ 
  $errTbl=array();
  $srcZip="http://www.crm4you.sk/PDFMaker/src/mpdf5.zip";
  $trgZip="modules/PDFMaker/mpdf.zip";
  if(copy($srcZip,$trgZip)) {
    require_once('vtlib/thirdparty/dUnzip2.inc.php');
    $unzip = new dUnzip2($trgZip);
    $unzip->unzipAll(getcwd()."/modules/PDFMaker/");
    if($unzip) $unzip->close();
    
    if(!is_dir("modules/PDFMaker/mpdf")){
      $errTbl[]=$mod_strings["UNZIP_ERROR"];
      $smarty->assign("STEP","error");
      $smarty->assign("ERROR_TBL",$errTbl);  
    }else {
      unlink($trgZip);
      $smarty->assign("STEP","2");
      $smarty->assign("CURRENT_STEP","3");
      $smarty->assign("TOTAL_STEPS","4");
      $smarty->assign("STEPNAME",$mod_strings["LBL_INSTALL_SELECTION"]);
      $smarty->assign("P_ERRORS",$p_errors);
    }    
  }else{
    $errTbl[]=$mod_strings["DOWNLOAD_ERROR"];
    $smarty->assign("STEP","error");
    $smarty->assign("ERROR_TBL",$errTbl);
  }
  $smarty->display("modules/PDFMaker/install.tpl");
}
elseif($_REQUEST["installtype"]=="redirect_recalculate")
{
  echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?module=Settings&action=OrgSharingDetailView&parenttab=Settings\" />";  
}
else
{
	$smarty->assign("STEP","1");
	$smarty->display("modules/PDFMaker/install.tpl");
}
exit;
?>