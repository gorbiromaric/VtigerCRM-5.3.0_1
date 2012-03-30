<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * 
 ********************************************************************************/
 

require_once('Smarty_setup.php');
require_once('include/utils/utils.php');

global $app_strings;
global $mod_strings;
global $app_list_strings;
global $adb;
global $upload_maxsize;
global $theme,$default_charset;
global $current_language, $default_language, $current_user;
    
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";

$smarty = new vtigerCRM_Smarty;
  
if(isset($_REQUEST['templateid']) && $_REQUEST['templateid']!='')
{
  	$templateid = $_REQUEST['templateid'];
  	
  	$sql = "SELECT vtiger_pdfmaker.*, vtiger_pdfmaker_settings.*
              FROM vtiger_pdfmaker 
              LEFT JOIN vtiger_pdfmaker_settings
                ON vtiger_pdfmaker_settings.templateid = vtiger_pdfmaker.templateid
             WHERE vtiger_pdfmaker.templateid=?";
             
  	$result = $adb->pquery($sql, array($templateid));
  	$pdftemplateResult = $adb->fetch_array($result);

  	$select_module = $pdftemplateResult["module"];
  	// $pdf_language = $pdftemplateResult["pdf_language"];
  	$select_format = $pdftemplateResult["format"];
  	$select_orientation = $pdftemplateResult["orientation"];
  	//$select_encoding = $pdftemplateResult["encoding"];
}
else
{
    $templateid = "";
    
    if (isset($_REQUEST["return_module"]) && $_REQUEST["return_module"] != "") 
       $select_module = $_REQUEST["return_module"]; 
    else 
       $select_module = "";
       
    $pdf_language = $current_language;
    $select_format = "A4";
    $select_orientation = "portrait";
}

if(isset($_REQUEST["isDuplicate"]) && $_REQUEST["isDuplicate"]=="true")
{
  $smarty->assign("FILENAME", "");
  $smarty->assign("DUPLICATE_FILENAME", $pdftemplateResult["filename"]);
}
else
  $smarty->assign("FILENAME", $pdftemplateResult["filename"]);
  
$smarty->assign("DESCRIPTION", $pdftemplateResult["description"]);

if (!isset($_REQUEST["isDuplicate"]) OR (isset($_REQUEST["isDuplicate"]) && $_REQUEST["isDuplicate"] != "true")) $smarty->assign("SAVETEMPLATEID", $templateid);
if ($templateid!="")
  $smarty->assign("EMODE", "edit");  

$smarty->assign("TEMPLATEID", $templateid);
$smarty->assign("MODULENAME", getTranslatedString($select_module));
$smarty->assign("SELECTMODULE", $select_module);

$smarty->assign("BODY", $pdftemplateResult["body"]);
  
$smarty->assign("MOD",$mod_strings);
$smarty->assign("THEME", $theme);
$smarty->assign("IMAGE_PATH",$image_path);
$smarty->assign("APP", $app_strings);
$smarty->assign("PARENTTAB", getParentTab());


$Modulenames = Array(''=>$mod_strings["LBL_PLS_SELECT"]);
$sql = "SELECT tabid, name FROM vtiger_tab WHERE isentitytype=1 AND presence=0 AND tabid NOT IN (10, 9, 16, 28) ORDER BY name ASC";
$result = $adb->query($sql);
while($row = $adb->fetchByAssoc($result)){
  if(file_exists("modules/".$row['name'])){
    $Modulenames[$row['name']] = getTranslatedString($row['name']);
    $ModuleIDS[$row['name']] = $row['tabid'];
  }
} 
 
$smarty->assign("MODULENAMES",$Modulenames);

$sql="SELECT * FROM vtiger_organizationdetails";
$result = $adb->pquery($sql, array());

$organization_logoname = decode_html($adb->query_result($result,0,'logoname'));
$organization_header = decode_html($adb->query_result($result,0,'headername'));
$organization_stamp_signature = $adb->query_result($result,0,'stamp_signature');

global $site_URL, $db_prefix_name;	
$path = $site_URL."/test/".$db_prefix_name."/logo/";

if (isset($organization_logoname))
{
	$organization_logo_img = "<img src=\"".$path.$organization_logoname."\">";
  $smarty->assign("COMPANYLOGO",$organization_logo_img);
}
if (isset($organization_stamp_signature))
{
  $organization_stamp_signature_img = "<img src=\"".$path.$organization_stamp_signature."\">";
	$smarty->assign("COMPANY_STAMP_SIGNATURE",$organization_stamp_signature_img);
}	
if (isset($organization_header))
{
	$organization_header_img = "<img src=\"".$path.$organization_header."\">";
  $smarty->assign("COMPANY_HEADER_SIGNATURE",$organization_header_img);
}

$Acc_Info = array(''=>$mod_strings["LBL_PLS_SELECT"],
                  "COMPANY_NAME"=>$mod_strings["LBL_COMPANY_NAME"],
                  "COMPANY_LOGO"=>$mod_strings["LBL_COMPANY_LOGO"],
                  "COMPANY_ADDRESS"=>$mod_strings["LBL_COMPANY_ADDRESS"],
                  "COMPANY_CITY"=>$mod_strings["LBL_COMPANY_CITY"],
                  "COMPANY_STATE"=>$mod_strings["LBL_COMPANY_STATE"],
                  "COMPANY_ZIP"=>$mod_strings["LBL_COMPANY_ZIP"],
                  "COMPANY_COUNTRY"=>$mod_strings["LBL_COMPANY_COUNTRY"],
                  "COMPANY_PHONE"=>$mod_strings["LBL_COMPANY_PHONE"],
                  "COMPANY_FAX"=>$mod_strings["LBL_COMPANY_FAX"],
                  "COMPANY_WEBSITE"=>$mod_strings["LBL_COMPANY_WEBSITE"]
                 );
                 
$smarty->assign("ACCOUNTINFORMATIONS",$Acc_Info);

if(file_exists("modules/Users/language/$default_language.lang.php")){ 
  $user_mod_strings = return_specified_module_language($current_language, "Users");
} else {
  $user_mod_strings = return_specified_module_language("en_us", "Users");
}

$User_Info = array("USER_USERNAME"=>$user_mod_strings["User Name"],
                   "USER_FIRSTNAME"=>$user_mod_strings["First Name"],
                   "USER_LASTNAME"=>$user_mod_strings["Last Name"],
                   "USER_EMAIL"=>$user_mod_strings["Email"],
                   
                   "USER_TITLE"=>$user_mod_strings["Title"],
                   "USER_FAX"=>$user_mod_strings["Fax"],
                   "USER_DEPARTMENT"=>$user_mod_strings["Department"],
                   "USER_OTHER_EMAIL"=>$user_mod_strings["Other Email"],
                   "USER_PHONE"=>$user_mod_strings["Office Phone"],
                   "USER_YAHOOID"=>$user_mod_strings["Yahoo id"],
                   "USER_MOBILE"=>$user_mod_strings["Mobile"], 
                   "USER_HOME_PHONE"=>$user_mod_strings["Home Phone"], 
                   "USER_OTHER_PHONE"=>$user_mod_strings["Other Phone"],
                   "USER_SIGHNATURE"=>$user_mod_strings["Signature"],      
                   "USER_NOTES"=>$user_mod_strings["Documents"],      
      
                   "USER_ADDRESS"=>$user_mod_strings["Street Address"],
                   "USER_CITY"=>$user_mod_strings["City"],
                   "USER_STATE"=>$user_mod_strings["State"],
                   "USER_ZIP"=>$user_mod_strings["Postal Code"],
                   "USER_COUNTRY"=>$user_mod_strings["Country"]
                 );                             

$smarty->assign("USERINFORMATIONS",$User_Info);
    
$Logged_User_Info = array("L_USER_USERNAME"=>$user_mod_strings["User Name"],
                   "L_USER_FIRSTNAME"=>$user_mod_strings["First Name"],
                   "L_USER_LASTNAME"=>$user_mod_strings["Last Name"],
                   "L_USER_EMAIL"=>$user_mod_strings["Email"],
                   
                   "L_USER_TITLE"=>$user_mod_strings["Title"],
                   "L_USER_FAX"=>$user_mod_strings["Fax"],
                   "L_USER_DEPARTMENT"=>$user_mod_strings["Department"],
                   "L_USER_OTHER_EMAIL"=>$user_mod_strings["Other Email"],
                   "L_USER_PHONE"=>$user_mod_strings["Office Phone"],
                   "L_USER_YAHOOID"=>$user_mod_strings["Yahoo id"],
                   "L_USER_MOBILE"=>$user_mod_strings["Mobile"], 
                   "L_USER_HOME_PHONE"=>$user_mod_strings["Home Phone"], 
                   "L_USER_OTHER_PHONE"=>$user_mod_strings["Other Phone"],
                   "L_USER_SIGHNATURE"=>$user_mod_strings["Signature"],      
                   "L_USER_NOTES"=>$user_mod_strings["Documents"],      
      
                   "L_USER_ADDRESS"=>$user_mod_strings["Street Address"],
                   "L_USER_CITY"=>$user_mod_strings["City"],
                   "L_USER_STATE"=>$user_mod_strings["State"],
                   "L_USER_ZIP"=>$user_mod_strings["Postal Code"],
                   "L_USER_COUNTRY"=>$user_mod_strings["Country"]
                );

$smarty->assign("LOGGEDUSERINFORMATION",$Logged_User_Info);


$Invterandcon = array(""=>$mod_strings["LBL_PLS_SELECT"],
                      "TERMS_AND_CONDITIONS"=>$mod_strings["LBL_TERMS_AND_CONDITIONS"]);

$smarty->assign("INVENTORYTERMSANDCONDITIONS",$Invterandcon); 

//labels
$global_lang_labels = array_flip($app_strings);
$global_lang_labels = array_flip($global_lang_labels);
asort($global_lang_labels);
$smarty->assign("GLOBAL_LANG_LABELS",$global_lang_labels);
    
$module_lang_labels=array();
if($select_module!="")
{ 
  if(file_exists("modules/$select_module/language/$default_language.lang.php"))  //kontrola na $default_language pretoze vo funkcii return_specified_module_language sa kontroluje $current_language a ak neexistuje tak sa pouzije $default_language  
    $mod_lang=return_specified_module_language($current_language,$select_module);    
  else 
    $mod_lang=return_specified_module_language("en_us",$select_module); 
  
  $module_lang_labels = array_flip($mod_lang);
  $module_lang_labels = array_flip($module_lang_labels);
  asort($module_lang_labels);  
}
else
  $module_lang_labels[""]=$mod_strings["LBL_SELECT_MODULE_FIELD"];

$smarty->assign("MODULE_LANG_LABELS",$module_lang_labels);

$Header_Footer_Strings = array(""=>$mod_strings["LBL_PLS_SELECT"],
                               "PAGE"=>$app_strings["Page"],
                               "PAGES"=>$app_strings["Pages"],
                              );

$smarty->assign("HEADER_FOOTER_STRINGS",$Header_Footer_Strings);

$Article_Strings = array(""=>$mod_strings["LBL_PLS_SELECT"],
                         "PRODUCTBLOC_START"=>$mod_strings["LBL_ARTICLE_START"],
                         "PRODUCTBLOC_END"=>$mod_strings["LBL_ARTICLE_END"]
                        );

$smarty->assign("ARTICLE_STRINGS",$Article_Strings);
       

//PDF FORMAT SETTINGS

$Formats = array("A3"=>"A3",
                 "A4"=>"A4",
                 "A5"=>"A5",
                 "A6"=>"A6",
                 "Letter"=>"Letter",
                 "Legal"=>"Legal");

$smarty->assign("FORMATS",$Formats);

$smarty->assign("SELECT_FORMAT",$select_format);


//PDF ORIENTATION SETTINGS

$Orientations = array("portrait"=>$mod_strings["portrait"],
                      "landscape"=>$mod_strings["landscape"]);

$smarty->assign("ORIENTATIONS",$Orientations);

$smarty->assign("SELECT_ORIENTATION",$select_orientation);
    

//PDF MARGIN SETTINGS
 
if(isset($_REQUEST['templateid']) && $_REQUEST['templateid']!='')
{
    $Margins = array("top" => $pdftemplateResult["margin_top"], 
                     "bottom" => $pdftemplateResult["margin_bottom"], 
                     "left" => $pdftemplateResult["margin_left"], 
                     "right" => $pdftemplateResult["margin_right"]);
                    
    $Decimals = array("point"=>$pdftemplateResult["decimal_point"],
                      "decimals"=>$pdftemplateResult["decimals"],
                      "thousands"=>($pdftemplateResult["thousands_separator"]!="sp" ? $pdftemplateResult["thousands_separator"] : " ")    
                      );
}
else
{
    $Margins = array("top"=>"2", "bottom" => "2", "left" => "2", "right" => "2");
    $Decimals = array("point"=>",", "decimals" => "2", "thousands" => " ");
}
$smarty->assign("MARGINS",$Margins);
$smarty->assign("DECIMALS",$Decimals);

//PDF HEADER / FOOTER
$header="";
$footer="";
if(isset($_REQUEST['templateid']) && $_REQUEST['templateid']!="") {
  $header=$pdftemplateResult["header"];
  $footer=$pdftemplateResult["footer"];
}
$smarty->assign("HEADER",$header);
$smarty->assign("FOOTER",$footer);

$hfVariables = array("##PAGE##"=>$mod_strings["LBL_CURRENT_PAGE"],
                     "##PAGES##"=>$mod_strings["LBL_ALL_PAGES"],
                     "##PAGE##/##PAGES##"=>$mod_strings["LBL_PAGE_PAGES"]);
                     //"##FILENAME##"=>$mod_strings["LBL_FILENAME"],
                     //"##FILESIZE##"=>$mod_strings["LBL_FILESIZE"]);
                     
$smarty->assign("HEAD_FOOT_VARS",$hfVariables);

$dateVariables = array("##DD.MM.YYYY##"=>$mod_strings["LBL_DATE_DD.MM.YYYY"],
                       "##DD-MM-YYYY##"=>$mod_strings["LBL_DATE_DD-MM-YYYY"],
                       "##MM-DD-YYYY##"=>$mod_strings["LBL_DATE_MM-DD-YYYY"],
                       "##YYYY-MM-DD##"=>$mod_strings["LBL_DATE_YYYY-MM-DD"]);
                       
$smarty->assign("DATE_VARS",$dateVariables);
                       
//PDF FILENAME FIELDS
$filenameFields = array("#TEMPLATE_NAME#"=>$mod_strings["LBL_PDF_NAME"],                        
                        "#DD-MM-YYYY#"=>$mod_strings["LBL_CURDATE_DD-MM-YYYY"],
                        "#MM-DD-YYYY#"=>$mod_strings["LBL_CURDATE_MM-DD-YYYY"],
                        "#YYYY-MM-DD#"=>$mod_strings["LBL_CURDATE_YYYY-MM-DD"]                        
                        );
$smarty->assign("FILENAME_FIELDS",$filenameFields);
 
//Ignored picklist values
$pvsql="SELECT value FROM vtiger_pdfmaker_ignorepicklistvalues";
$pvresult = $adb->query($pvsql);
$pvvalues="";
while($pvrow=$adb->fetchByAssoc($pvresult))
  $pvvalues.=$pvrow["value"].", ";
$smarty->assign("IGNORE_PICKLIST_VALUES",rtrim($pvvalues, ", "));

$Product_Fields = array("PS_CRMID"=>$mod_strings["LBL_RECORD_ID"],
						"PS_NO"=>$mod_strings["LBL_PS_NO"],
						"PRODUCTPOSITION"=>$mod_strings["LBL_PRODUCT_POSITION"],
                        "CURRENCYNAME"=>$mod_strings["LBL_CURRENCY_NAME"],
                        "CURRENCYCODE"=>$mod_strings["LBL_CURRENCY_CODE"],
                        "CURRENCYSYMBOL"=>$mod_strings["LBL_CURRENCY_SYMBOL"],
                        "PRODUCTNAME"=>$mod_strings["LBL_VARIABLE_PRODUCTNAME"],
                        "PRODUCTTITLE"=>$mod_strings["LBL_VARIABLE_PRODUCTTITLE"],
                        "PRODUCTDESCRIPTION"=>$mod_strings["LBL_VARIABLE_PRODUCTDESCRIPTION"],
                        "PRODUCTEDITDESCRIPTION"=>$mod_strings["LBL_VARIABLE_PRODUCTEDITDESCRIPTION"]);

if($adb->num_rows($adb->query("SELECT tabid FROM vtiger_tab WHERE name='Pdfsettings'"))>0)
  $Product_Fields["CRMNOWPRODUCTDESCRIPTION"]=$mod_strings["LBL_CRMNOW_DESCRIPTION"];
                                                                                   
$Product_Fields["PRODUCTQUANTITY"]=$mod_strings["LBL_VARIABLE_QUANTITY"];
$Product_Fields["PRODUCTUSAGEUNIT"]=$mod_strings["LBL_VARIABLE_USAGEUNIT"];
$Product_Fields["PRODUCTLISTPRICE"]=$mod_strings["LBL_VARIABLE_LISTPRICE"];
$Product_Fields["PRODUCTTOTAL"]=$mod_strings["LBL_PRODUCT_TOTAL"];
$Product_Fields["PRODUCTDISCOUNT"]=$mod_strings["LBL_VARIABLE_DISCOUNT"];
$Product_Fields["PRODUCTDISCOUNTPERCENT"]=$mod_strings["LBL_VARIABLE_DISCOUNT_PERCENT"];
$Product_Fields["PRODUCTSTOTALAFTERDISCOUNT"]=$mod_strings["LBL_VARIABLE_PRODUCTTOTALAFTERDISCOUNT"];
$Product_Fields["PRODUCTVATPERCENT"]=$mod_strings["LBL_PROCUCT_VAT_PERCENT"];
$Product_Fields["PRODUCTVATSUM"]=$mod_strings["LBL_PRODUCT_VAT_SUM"];
$Product_Fields["PRODUCTTOTALSUM"]=$mod_strings["LBL_PRODUCT_TOTAL_VAT"];
                        
$smarty->assign("SELECT_PRODUCT_FIELD",$Product_Fields);

$More_Fields = array(/*"SUBTOTAL"=>$mod_strings["LBL_VARIABLE_SUM"],*/
                     "CURRENCYNAME"=>$mod_strings["LBL_CURRENCY_NAME"],
                     "CURRENCYSYMBOL"=>$mod_strings["LBL_CURRENCY_SYMBOL"],
                     "CURRENCYCODE"=>$mod_strings["LBL_CURRENCY_CODE"],
                     "TOTALWITHOUTVAT"=>$mod_strings["LBL_VARIABLE_SUMWITHOUTVAT"],
                     "TOTALDISCOUNT"=>$mod_strings["LBL_VARIABLE_TOTALDISCOUNT"],
                     "TOTALDISCOUNTPERCENT"=>$mod_strings["LBL_VARIABLE_TOTALDISCOUNT_PERCENT"],
                     "TOTALAFTERDISCOUNT"=>$mod_strings["LBL_VARIABLE_TOTALAFTERDISCOUNT"],
                     "VAT"=>$mod_strings["LBL_VARIABLE_VAT"],
                     "VATPERCENT"=>$mod_strings["LBL_VARIABLE_VAT_PERCENT"],
                     "VATBLOCK"=>$mod_strings["LBL_VARIABLE_VAT_BLOCK"],
                     "TOTALWITHVAT"=>$mod_strings["LBL_VARIABLE_SUMWITHVAT"],
                     "SHTAXTOTAL"=>$mod_strings["LBL_SHTAXTOTAL"],
                     "SHTAXAMOUNT"=>$mod_strings["LBL_SHTAXAMOUNT"],
                     "ADJUSTMENT"=>$mod_strings["LBL_ADJUSTMENT"],
                     "TOTAL"=>$mod_strings["LBL_VARIABLE_TOTALSUM"]                     
                     );


if ($select_module == "Quotes" || $select_module == "SalesOrder" || $select_module == "Invoice" || $select_module == "PurchaseOrder" || $select_module == "Issuecards" || $select_module == "Receiptcards" || $select_module == "Creditnote" || $select_module == "StornoInvoice")
   $display_product_div = "block";
else
   $display_product_div = "none";

$smarty->assign("DISPLAY_PRODUCT_DIV",$display_product_div);
                               
foreach ($ModuleIDS as $module => $IDS) {
	$sql1 = "SELECT blockid, blocklabel FROM vtiger_blocks WHERE tabid=".$IDS." ORDER BY sequence ASC";
	$res1 = $adb->query($sql1);
  $block_info_arr = array();
  while($row = $adb->fetch_array($res1))
  {
 	    $sql2 = "SELECT fieldid, uitype FROM vtiger_field WHERE block=".$row['blockid']." and (displaytype != 3 OR uitype = 55) ORDER BY sequence ASC";
 	    $res2 = $adb->query($sql2);
 	    $num_rows2 = $adb->num_rows($res2);  
 	    
 	    if ($num_rows2 > 0)
 	    {
    	    $field_id_array = array();
          
          while($row2 = $adb->fetch_array($res2))
          {
             $field_id_array[] = $row2['fieldid'];
             
             switch ($row2['uitype'])
             {
                 case "51": $All_Related_Modules[$module][] = "Accounts"; break;
                 case "57": $All_Related_Modules[$module][] = "Contacts"; break;
                 case "58": $All_Related_Modules[$module][] = "Campaigns"; break;
                 case "59": $All_Related_Modules[$module][] = "Products"; break;
                 case "73": $All_Related_Modules[$module][] = "Accounts"; break;
                 case "75": $All_Related_Modules[$module][] = "Vendors"; break;
                 case "81": $All_Related_Modules[$module][] = "Vendors"; break;
                 case "76": $All_Related_Modules[$module][] = "Potentials"; break;
                 case "78": $All_Related_Modules[$module][] = "Quotes"; break;
                 case "80": $All_Related_Modules[$module][] = "SalesOrder"; break;
                 case "68": $All_Related_Modules[$module][] = "Accounts"; $All_Related_Modules[$module][] = "Contacts"; break;
                 case "10": $fmrs=$adb->query('select relmodule from vtiger_fieldmodulerel where fieldid='.$row2['fieldid']);
                            while ($rm=$adb->fetch_array($fmrs)) { 
                              $All_Related_Modules[$module][] = $rm['relmodule'];
                            }                  
                 break;
             }
          }
          
          $block_info_arr[$row['blocklabel']] = $field_id_array;
      }
  }
  
  
  if ($module == "Quotes" || $module == "Invoice" || $module == "SalesOrder" || $module=="PurchaseOrder" || $module=="Issuecards" || $module=="Receiptcards" || $module=="Creditnote" || $module=="StornoInvoice")
      $block_info_arr["LBL_DETAILS_BLOCK"] = array();
  
  $ModuleFields[$module] = $block_info_arr;
}
 
// ITS4YOU-CR VlZa
//Oprava prazdneho selectboxu v pripade ze zvoleny modul nemal ziadne related moduly
foreach($Modulenames as $key=>$value)
{
  if(!isset($All_Related_Modules[$key]))
    $All_Related_Modules[$key]=array();
}
// ITS4YOU-END
$smarty->assign("ALL_RELATED_MODULES",$All_Related_Modules);
 
if ($select_module != "")
{			                  
    foreach ($All_Related_Modules[$select_module] AS $rel_module)
    {		                  
    	 $Related_Modules[$rel_module] = getTranslatedString($rel_module);
    }
}

$smarty->assign("RELATED_MODULES",$Related_Modules);

                        
foreach ($ModuleFields AS $module => $Blocks)
{
    $Optgroupts = array();
    
    if(file_exists("modules/$module/language/$default_language.lang.php"))  //kontrola na $default_language pretoze vo funkcii return_specified_module_language sa kontroluje $current_language a ak neexistuje tak sa pouzije $default_language  
      $current_mod_strings = return_specified_module_language($current_language, $module);    
    else 
      $current_mod_strings = return_specified_module_language("en_us", $module);
    
		$b = 0;
		foreach ($Blocks AS $block_label => $block_fields)
		{
        $b++;
        
        $Options = array();
        

        if (isset($current_mod_strings[$block_label]) AND $current_mod_strings[$block_label] != "")
             $optgroup_value = $current_mod_strings[$block_label];
        elseif (isset($app_strings[$block_label]) AND $app_strings[$block_label] != "")
             $optgroup_value = $app_strings[$block_label];  
        elseif(isset($mod_strings[$block_label]) AND $mod_strings[$block_label]!="")
             $optgroup_value = $mod_strings[$block_label];
        else
             $optgroup_value = $block_label;  
            
        $Optgroupts[] = '"'.$optgroup_value.'","'.$b.'"';
        
        if (count($block_fields) > 0)
        {
             $field_ids = implode(",",$block_fields);
            
             $sql1 = "SELECT * FROM vtiger_field WHERE fieldid IN (".$field_ids.")";
             $result1 = $adb->query($sql1); 
            
             while($row1 = $adb->fetchByAssoc($result1))
             {
            	   $fieldname = $row1['fieldname'];
            	   $fieldlabel = $row1['fieldlabel'];
            	   
         	       $option_key = strtoupper($module."_".$fieldname);
            	   
                 if (isset($current_mod_strings[$fieldlabel]) AND $current_mod_strings[$fieldlabel] != "")
                     $option_value = $current_mod_strings[$fieldlabel];
                 elseif (isset($app_strings[$fieldlabel]) AND $app_strings[$fieldlabel] != "")
                     $option_value = $app_strings[$fieldlabel];  
                 else
                     $option_value = $fieldlabel;  
                     
            	   $Options[] = '"'.$option_value.'","'.$option_key.'"';
            	   $SelectModuleFields[$module][$optgroup_value][$option_key] = $option_value;
             }             
        }
        
        //variable RECORD ID added
        if($b==1)
        {
          $option_value = $mod_strings["LBL_RECORD_ID"]; //"Record ID";
          $option_key = strtoupper($module."_CRMID");
          $Options[] = '"'.$option_value.'","'.$option_key.'"';
          $SelectModuleFields[$module][$optgroup_value][$option_key] = $option_value;
        }        
       //end
        
        $Convert_RelatedModuleFields[$module."|".$b] = implode(",",$Options);
        
        
        if ($block_label == "LBL_DETAILS_BLOCK" && ($module == "Quotes" || $module == "Invoice" || $module == "SalesOrder" || $module == "PurchaseOrder" || $module == "Issuecards" || $module == "Receiptcards" || $module == "Creditnote" || $module == "StornoInvoice"))
        {
             foreach ($More_Fields AS $variable => $variable_name)
             {
                 $variable_key = strtoupper($variable);
                 
                 $Options[] = '"'.$variable_name.'","'.$variable_key.'"';
                 $SelectModuleFields[$module][$optgroup_value][$variable_key] = $variable_name;
             }
        }
        $Convert_ModuleFields[$module."|".$b] = implode(",",$Options);
    }
    
    $Convert_ModuleBlocks[$module] = implode(",",$Optgroupts);
    
}

if(isset($ModuleSorces))
  $smarty->assign("MODULESORCES",$ModuleSorces);
  
$smarty->assign("MODULE_BLOCKS",$Convert_ModuleBlocks);

$smarty->assign("RELATED_MODULE_FIELDS",$Convert_RelatedModuleFields);

$smarty->assign("MODULE_FIELDS",$Convert_ModuleFields);

// ITS4YOU-CR VlZa
// Product bloc templates
$sql="SELECT * FROM vtiger_pdfmaker_productbloc_tpl";
$result=$adb->query($sql);
$Productbloc_tpl[""]=$mod_strings["LBL_PLS_SELECT"];
while($row=$adb->fetchByAssoc($result))
{
  $Productbloc_tpl[$row["body"]]=$row["name"];  
}                 
$smarty->assign("PRODUCT_BLOC_TPL",$Productbloc_tpl);

$smarty->assign("PRODUCTS_FIELDS",$SelectModuleFields["Products"]);
$smarty->assign("SERVICES_FIELDS",$SelectModuleFields["Services"]);
// ITS4YOU-END

if ($templateid != "" || $select_module!="")
{
  $smarty->assign("SELECT_MODULE_FIELD",$SelectModuleFields[$select_module]);
  $smf_filename = $SelectModuleFields[$select_module];
  if($select_module=="Invoice" || $select_module=="Quotes" || $select_module=="SalesOrder" || $select_module=="PurchaseOrder" || $select_module=="Issuecards" || $select_module=="Receiptcards" || $select_module == "Creditnote" || $select_module == "StornoInvoice")  
    unset($smf_filename["Details"]);
  $smarty->assign("SELECT_MODULE_FIELD_FILENAME",$smf_filename);    
}

include_once("version.php");
$smarty->assign("VERSION",$version);

$category = getParentTab();
$smarty->assign("CATEGORY",$category);
$smarty->display('modules/PDFMaker/EditPDFTemplate.tpl');

?>
