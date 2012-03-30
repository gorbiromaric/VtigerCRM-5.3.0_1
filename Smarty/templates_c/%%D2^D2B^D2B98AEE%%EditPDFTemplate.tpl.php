<?php /* Smarty version 2.6.18, created on 2012-03-29 17:47:43
         compiled from modules/PDFMaker/EditPDFTemplate.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'modules/PDFMaker/EditPDFTemplate.tpl', 67, false),array('modifier', 'escape', 'modules/PDFMaker/EditPDFTemplate.tpl', 615, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/PDFMaker/Buttons_List.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<form name="PDFMakerEdit" action="index.php?module=PDFMaker&action=SavePDFTemplate" method="post" enctype="multipart/form-data" onsubmit="VtigerJS_DialogBox.block();">
<input type="hidden" name="return_module" value="PDFMaker">
<input type="hidden" name="parenttab" value="<?php echo $this->_tpl_vars['PARENTTAB']; ?>
">
<input type="hidden" name="templateid" value="<?php echo $this->_tpl_vars['SAVETEMPLATEID']; ?>
">
<input type="hidden" name="action" value="SavePDFTemplate">
<input type="hidden" name="redirect" value="true">
<tr>        
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">

				<!-- DISPLAY -->
				<table border=0 cellspacing=0 cellpadding=5 width=100%>
				<tr>
                      <td class=heading2 valign=bottom>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['MOD']['LBL_EDIT']; ?>
 &quot;<?php echo $this->_tpl_vars['MODULENAME']; ?>
&quot; </b></td>
				</tr>
				</table>
				<table border=0 cellspacing=0 cellpadding=10 width=100% >
				<tr>
				<td> 
					<?php if ($this->_tpl_vars['DISPLAY_PRODUCT_DIV'] == 'none'): ?>
                      <?php $this->assign('DISPLAY_NO_PRODUCT_DIV', 'block'); ?>
                      <?php $this->assign('DISPLAY_PRODUCT_TPL_ROW', 'none'); ?>                      
                    <?php else: ?>
                      <?php $this->assign('DISPLAY_NO_PRODUCT_DIV', 'none'); ?>
                      <?php $this->assign('DISPLAY_PRODUCT_TPL_ROW', 'table-row'); ?>
                    <?php endif; ?>
                    
                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
          		    <tr><td>
                    
                      <table class="small" width="100%" border="0" cellpadding="3" cellspacing="0"><tr>
                          <td class="dvtTabCache" style="width: 10px;" nowrap="nowrap">&nbsp;</td>
                          <td style="width: 15%;" class="dvtSelectedCell" id="properties_tab" onclick="showHideTab('properties');" width="75" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_PROPERTIES_TAB']; ?>
</b></td>
                          <td class="dvtUnSelectedCell" id="company_tab" onclick="showHideTab('company');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_OTHER_INFO']; ?>
</b></td>
                          <td class="dvtUnSelectedCell" id="labels_tab" onclick="showHideTab('labels');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_LABELS']; ?>
</b></td>
                          <td class="dvtUnSelectedCell" id="products_tab" onclick="showHideTab('products');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_ARTICLE']; ?>
</b></td>
           				  <td class="dvtUnSelectedCell" id="settings_tab" onclick="showHideTab('settings');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS_TAB']; ?>
</b></td>           				  
                          <td class="dvtTabCache" style="width: 30%;" nowrap="nowrap">&nbsp;</td> 
                      </tr></table>
                    </td></tr>
					
                     <tr><td align="left" valign="top">
                                            <div style="diplay:block;" id="properties_div">       
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">                        
     				
            				             				 <tr>
            						<td width="20%" valign=top class="small cellLabel"><?php if ($this->_tpl_vars['TEMPLATEID'] == ""): ?><font color="red">*</font><?php endif; ?><strong><?php echo $this->_tpl_vars['MOD']['LBL_MODULENAMES']; ?>
:</strong></td>
            						<td class="cellText small" valign="top">
                                	<input type="hidden" name="modulename" id="modulename" value="<?php echo $this->_tpl_vars['SELECTMODULE']; ?>
" >
	                                <select name="modulefields" id="modulefields" class="classname">
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['SELECT_MODULE_FIELD']), $this);?>

                               		</select>
        					    	<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('modulefields');" />
                        			</td>      						
          					 </tr>    					
          				 	                 					
                        <tr id="body_variables">
                          	<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_RELATED_MODULES']; ?>
:</strong></td>
                          	<td class="cellText small" valign=top>
                          
                                <select name="relatedmodulesorce" id="relatedmodulesorce" class="classname" onChange="change_relatedmodule(this,'relatedmodulefields');">
                                        <option value="none"><?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE']; ?>
</option>
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['RELATED_MODULES']), $this);?>

                                </select>
                                &nbsp;&nbsp;
                          
                                <select name="relatedmodulefields" id="relatedmodulefields" class="classname">
                                    <option><?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE_FIELD']; ?>
</option>
                                </select>
                              	<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('relatedmodulefields');">
                          	</td>      						
                        </tr>
                                            <tr id="product_bloc_tpl_row" style="display:<?php echo $this->_tpl_vars['DISPLAY_PRODUCT_TPL_ROW']; ?>
;">                            
      					           	<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PRODUCT_BLOC_TPL']; ?>
:</strong></td>
      					          	<td class="cellText small" valign=top>
      					                 <select name="productbloctpl" id="productbloctpl" class="classname">
                              		   <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['PRODUCT_BLOC_TPL']), $this);?>

                                 </select>
                                 <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('productbloctpl');"/>
        				            </td>              					
                        </tr>
                                             <tr id="header_variables" style="display:none">
                            <td valign="top" width="200px" class="cellLabel small"><strong><?php echo $this->_tpl_vars['MOD']['LBL_HEADER_VARIABLE']; ?>
:</strong></td>
                            <td class="cellText small" valign=top>
                                <select name="header_var" id="header_var" class="classname">
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['HEAD_FOOT_VARS'],'selected' => ""), $this);?>

                                </select>
                                <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('header_var');">
      				          		</td>
                        </tr>
                                             <tr id="footer_variables" style="display:none">
                            <td valign="top" width="200px" class="cellLabel small"><strong><?php echo $this->_tpl_vars['MOD']['LBL_FOOTER_VARIABLE']; ?>
:</strong></td>
                            <td class="cellText small" valign=top>
                                <select name="footer_var" id="footer_var" class="classname">
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['HEAD_FOOT_VARS'],'selected' => ""), $this);?>

                                </select>
                                <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('footer_var');">
      						</td>
                        </tr>
                                                    					
                        </table>
                      </div>
                      
                                            <div style="display:none;" id="labels_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        <tr>
    						<td width="200px" valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_GLOBAL_LANG']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="global_lang" id="global_lang" class="classname" style="width:80%">
                                		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['GLOBAL_LANG_LABELS']), $this);?>

                                </select>
    					       	<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('global_lang');">
      						</td>
    					</tr>
    					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_MODULE_LANG']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="module_lang" id="module_lang" class="classname" style="width:80%">
                                		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['MODULE_LANG_LABELS']), $this);?>

                                </select>
        						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('module_lang');">
      						</td>
    					</tr>
                        </table>
                      </div>
                      
                                            <div style="display:none;" id="company_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        <tr>
    						<td width="200px" valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_COMPANY_USER_INFO']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="acc_info" id="acc_info" class="classname">
                                	<optGroup label="<?php echo $this->_tpl_vars['MOD']['LBL_COMPANY_INFO']; ?>
">
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ACCOUNTINFORMATIONS']), $this);?>

                                  </optGroup>
                                  <optGroup label="<?php echo $this->_tpl_vars['MOD']['LBL_USER_INFO']; ?>
">
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['USERINFORMATIONS']), $this);?>

                                  </optGroup>
                                  <optGroup label="<?php echo $this->_tpl_vars['MOD']['LBL_LOGGED_USER_INFO']; ?>
">
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['LOGGEDUSERINFORMATION']), $this);?>

                                  </optGroup>
                                </select>
    					       	<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('acc_info');">
      						</td>
    					</tr>
    					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['TERMS_AND_CONDITIONS']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="invterandcon" id="invterandcon" class="classname">
                                		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['INVENTORYTERMSANDCONDITIONS']), $this);?>

                                </select>
        						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('invterandcon');">
      						</td>
    					</tr>
    					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_CURRENT_DATE']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="dateval" id="dateval" class="classname">
                                		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['DATE_VARS']), $this);?>

                                </select>
        						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('dateval');">
      						</td>
    					</tr>
    					    					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_BARCODES']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="barcodeval" id="barcodeval" class="classname">
                                		<optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_BARCODES_TYPE1']; ?>
">
                                		     <option value="EAN13">EAN13</option>
                                		     <option value="ISBN">ISBN</option>
                                		     <option value="ISSN">ISSN</option>
                                		</optgroup>
                                		
                                		<optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_BARCODES_TYPE2']; ?>
">
                                		     <option value="UPCA">UPCA</option>
                                		     <option value="UPCE">UPCE</option>
                                		     <option value="EAN8">EAN8</option>
                                		</optgroup>
                                		
                                		<optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_BARCODES_TYPE3']; ?>
">
                                		     <option value="EAN2">EAN2</option>
                                		     <option value="EAN5">EAN5</option>
                                		     <option value="EAN13P2">EAN13P2</option>
                                		     <option value="ISBNP2">ISBNP2</option>
                                		     <option value="ISSNP2">ISSNP2</option>
                                		     <option value="UPCAP2">UPCAP2</option>
                                		     <option value="UPCEP2">UPCEP2</option>
                                		     <option value="EAN8P2">EAN8P2</option>
                                		     <option value="EAN13P5">EAN13P5</option>
                                		     <option value="ISBNP5">ISBNP5</option>
                                		     <option value="ISSNP5">ISSNP5</option>
                                		     <option value="UPCAP5">UPCAP5</option>
                                		     <option value="UPCEP5">UPCEP5</option>
                                		     <option value="EAN8P5">EAN8P5</option>
                                		</optgroup>
                                		
                                        <optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_BARCODES_TYPE4']; ?>
">     
                                		     <option value="IMB">IMB</option>
                                		     <option value="RM4SCC">RM4SCC</option>
                                		     <option value="KIX">KIX</option>
                                		     <option value="POSTNET">POSTNET</option>
                                		     <option value="PLANET">PLANET</option>
                                		</optgroup>
                                		
                                		<optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_BARCODES_TYPE5']; ?>
">    
                                		     <option value="C128A">C128A</option>
                                		     <option value="C128B">C128B</option>
                                		     <option value="C128C">C128C</option>
                                		     <option value="EAN128C">EAN128C</option>
                                		     <option value="C39">C39</option>
                                		     <option value="C39+">C39+</option>
                                		     <option value="C39E">C39E</option>
                                		     <option value="C39E+">C39E+</option>
                                		     <option value="S25">S25</option>
                                		     <option value="S25+">S25+</option>
                                		     <option value="I25">I25</option>
                                		     <option value="I25+">I25+</option>
                                		     <option value="I25B">I25B</option>
                                		     <option value="I25B+">I25B+</option>
                                		     <option value="C93">C93</option>
                                		     <option value="MSI">MSI</option>
                                		     <option value="MSI+">MSI+</option>
                                		     <option value="CODABAR">CODABAR</option>
                                		     <option value="CODE11">CODE11</option>
                                		</optgroup>
                                </select>
        						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_BARCODE_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('barcodeval');">&nbsp;&nbsp;<a href="modules/PDFMaker/Barcodes.php" target="_new"><img src="themes/images/help_icon.gif" border="0" align="absmiddle"></a>
      						</td>
    					</tr>
                        </table>
                      </div>
                                            <div style="display:none;" id="products_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        <tr><td>
                          
                          <div id="product_div" style="display:<?php echo $this->_tpl_vars['DISPLAY_PRODUCT_DIV']; ?>
;">
                          <table width="100%"  border="0" cellspacing="0" cellpadding="5" >
            					<tr>
            						<td valign=top class="small cellLabel" width="200px"><strong><?php echo $this->_tpl_vars['MOD']['LBL_ARTICLE']; ?>
:</strong></td>
            						<td class="cellText small" valign=top>
            						<select name="articelvar" id="articelvar" class="classname">
                                    		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ARTICLE_STRINGS']), $this);?>

                                    </select>
                                    <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('articelvar');">
              						</td>
            					</tr>
            			                                        <tr>
            						<td valign=top class="small cellLabel"><strong>*<?php echo $this->_tpl_vars['MOD']['LBL_PRODUCTS_AVLBL']; ?>
:</strong></td>
            						<td class="cellText small" valign=top>
                                    <select name="psfields" id="psfields" class="classname">
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['SELECT_PRODUCT_FIELD']), $this);?>

                                    </select>
            						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('psfields');">            						
              						</td>
            					</tr>
            					                                
                                <tr>
            						<td valign=top class="small cellLabel"><strong>*<?php echo $this->_tpl_vars['MOD']['LBL_PRODUCTS_FIELDS']; ?>
:</strong></td>
            						<td class="cellText small" valign=top>
                                    <select name="productfields" id="productfields" class="classname">
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['PRODUCTS_FIELDS']), $this);?>

                                    </select>
            						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('productfields');">            						
              						</td>
            					</tr>
                                                                
                                <tr>
            						<td valign=top class="small cellLabel"><strong>*<?php echo $this->_tpl_vars['MOD']['LBL_SERVICES_FIELDS']; ?>
:</strong></td>
            						<td class="cellText small" valign=top>
                                    <select name="servicesfields" id="servicesfields" class="classname">
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['SERVICES_FIELDS']), $this);?>

                                    </select>
            						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('servicesfields');">            						
              						</td>
            					</tr>            					
            					            					<tr>                            
            						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PRODUCT_BLOC_TPL']; ?>
:</strong></td>
            						<td class="cellText small" valign=top>
            						<select name="productbloctpl2" id="productbloctpl2" class="classname">
                                    		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['PRODUCT_BLOC_TPL']), $this);?>

                                   </select>
                                   <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('productbloctpl2');"/>
              		               </td>              					
                               </tr>
                               <tr>
                                <td colspan="2"><small><?php echo $this->_tpl_vars['MOD']['LBL_PRODUCT_FIELD_INFO']; ?>
</small></td>
                               </tr>
            			  </table>
                          </div>                          
                          
                          <div id="no_product_div" style="padding:15px;text-align:center;display:<?php echo $this->_tpl_vars['DISPLAY_NO_PRODUCT_DIV']; ?>
;">
                          <b><?php echo $this->_tpl_vars['MOD']['LBL_NOPRODUCT_BLOC']; ?>
</b>
                          </div>
                          
                        </td></tr>
                        </table>
                      </div>
                      
                      
                                            <div style="display:none;" id="settings_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                            					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PDF_FORMAT']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
                                <select name="pdf_format" id="pdf_format" class="classname">
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['FORMATS'],'selected' => $this->_tpl_vars['SELECT_FORMAT']), $this);?>

                                </select>
      						</td>
    					</tr>
    					                        <tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PDF_ORIENTATION']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
                                <select name="pdf_orientation" id="pdf_orientation" class="classname">
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ORIENTATIONS'],'selected' => $this->_tpl_vars['SELECT_ORIENTATION']), $this);?>

                                </select>
      						</td>
    					</tr>
    					    					    					    					<tr>
    					   <td valign=top class="small cellLabel" title="<?php echo $this->_tpl_vars['MOD']['LBL_IGNORE_PICKLIST_VALUES_DESC']; ?>
"><strong><?php echo $this->_tpl_vars['MOD']['LBL_IGNORE_PICKLIST_VALUES']; ?>
:</strong></td>
    					   <td class="cellText small" valign="top" title="<?php echo $this->_tpl_vars['MOD']['LBL_IGNORE_PICKLIST_VALUES_DESC']; ?>
"><input type="text" name="ignore_picklist_values" value="<?php echo $this->_tpl_vars['IGNORE_PICKLIST_VALUES']; ?>
" class="detailedViewTextBox"/></td>
    					</tr>
                                                <?php $this->assign('margin_input_width', '50px'); ?>
                        <?php $this->assign('margin_label_width', '50px'); ?>
                        <tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_MARGINS']; ?>
:</strong></td>
    						<td class="cellText small" valign="top">
                                <table>
                                   <tr>
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_TOP']; ?>
</b></td>
                                       <td>
                                           <input type="text" name="margin_top" id="margin_top" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['MARGINS']['top']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
" onKeyUp="ControlNumber('margin_top',false);">
                                       </td>
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_BOTTOM']; ?>
</b></td>
                                       <td>
                                           <input type="text" name="margin_bottom" id="margin_bottom" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['MARGINS']['bottom']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
" onKeyUp="ControlNumber('margin_bottom',false);">
                                       </td>
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_LEFT']; ?>
</b></td>
                                       <td>
                                           <input type="text" name="margin_left"  id="margin_left" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['MARGINS']['left']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
" onKeyUp="ControlNumber('margin_left',false);">
                                       </td>
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_RIGHT']; ?>
</b></td>
                                       <td>
                                           <input type="text" name="margin_right" id="margin_right" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['MARGINS']['right']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
" onKeyUp="ControlNumber('margin_right',false);">
                                       </td>
                                   </tr>
                                </table>
                          	</td>
    					</tr>
                            					
    					<tr>
    					   <td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_DECIMALS']; ?>
:</strong></td>
    						<td class="cellText small" valign="top">
                                <table>
                                   <tr>
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_DEC_POINT']; ?>
</b></td>
                                       <td><input type="text" maxlength="2" name="dec_point" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['DECIMALS']['point']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
"/></td>
                                       
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_DEC_DECIMALS']; ?>
</b></td>
                                       <td><input type="text" maxlength="2" name="dec_decimals" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['DECIMALS']['decimals']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
"/></td>
                                       
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_DEC_THOUSANDS']; ?>
</b></td>
                                       <td><input type="text" maxlength="2" name="dec_thousands"  class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['DECIMALS']['thousands']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
"/></td>                                       
                                   </tr>
                                </table>
                          	</td>
    					</tr>    					
                        </table>
                      </div>
                      
                                              
                    </td></tr>
                    <tr><td class="small" style="text-align:center;padding:15px 0px 10px 0px;">
					   <input type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_APPLY_BUTTON_LABEL']; ?>
" class="crmButton small create" onclick="document.PDFMakerEdit.redirect.value='false'; return savePDF();" >&nbsp;&nbsp;
                       <input type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" class="crmButton small save" onclick="return savePDF();" >&nbsp;&nbsp;            			
            		   <?php if ($_REQUEST['applied'] == 'true'): ?>
            		     <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmButton small cancel" onclick="window.location.href='index.php?action=DetailViewPDFTemplate&module=PDFMaker&templateid=<?php echo $this->_tpl_vars['SAVETEMPLATEID']; ?>
&parenttab=Tools';" />
            		   <?php else: ?>
                         <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmButton small cancel" onclick="window.history.back()" />
                       <?php endif; ?>            			
					</td></tr>
                    </table>
                    
                   
                    
                    <table class="small" width="100%" border="0" cellpadding="3" cellspacing="0"><tr>
                          <td style="width: 10px;" nowrap="nowrap">&nbsp;</td>
                          <td style="width: 15%;" class="dvtSelectedCell" id="body_tab2" onclick="showHideTab2('body');" width="75" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_BODY']; ?>
</b></td>
           				  <td class="dvtUnSelectedCell" id="header_tab2" onclick="showHideTab2('header');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_HEADER_TAB']; ?>
</b></td>
           				  <td class="dvtUnSelectedCell" id="footer_tab2" onclick="showHideTab2('footer');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_FOOTER_TAB']; ?>
</b></td>
                          <td style="width: 50%;" nowrap="nowrap">&nbsp;</td> 
                    </tr></table>
 
                    <?php echo '   
                        <script type="text/javascript" src="include/ckeditor/ckeditor.js"></script>
                    '; ?>
 

                                        <div style="diplay:block;" id="body_div2"> 
                        <textarea name="body" id="body" style="width:90%;height:700px" class=small tabindex="5"><?php echo $this->_tpl_vars['BODY']; ?>
</textarea>
                    </div>
                    
                    <?php echo '   
                        <script type="text/javascript">
                        	CKEDITOR.replace( \'body\',{customConfig:\'../../../modules/PDFMaker/fck_config.js\'} );
                        </script>
                    '; ?>
 
                    
                                        <div style="display:none;" id="header_div2">
                        <textarea name="header_body" id="header_body" style="width:90%;height:200px" class="small"><?php echo $this->_tpl_vars['HEADER']; ?>
</textarea>
                    </div>
                    
                    <?php echo '   
                        <script type="text/javascript">
                        	CKEDITOR.replace( \'header_body\',{customConfig:\'../../../modules/PDFMaker/fck_config.js\'} );
                        </script>
                    '; ?>

                    
                                        <div style="display:none;" id="footer_div2">
                        <textarea name="footer_body" id="footer_body" style="width:90%;height:200px" class="small"><?php echo $this->_tpl_vars['FOOTER']; ?>
</textarea>
                    </div>

                    <?php echo '   
                        <script type="text/javascript">
                        	CKEDITOR.replace( \'footer_body\',{customConfig:\'../../../modules/PDFMaker/fck_config.js\'} );		
                        </script>
                        <script type="text/javascript" src="modules/PDFMaker/fck_config.js"></script>
                    '; ?>


                    <table width="100%"  border="0" cellspacing="0" cellpadding="5" >
                        <tr><td class="small" style="text-align:center;padding:10px 0px 10px 0px;" colspan="3">
    					   <input type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_APPLY_BUTTON_LABEL']; ?>
" class="crmButton small create" onclick="document.PDFMakerEdit.redirect.value='false'; return savePDF();" >&nbsp;&nbsp;
                           <input type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" class="crmButton small save" onclick="return savePDF();" >&nbsp;&nbsp;            			
                		   <?php if ($_REQUEST['applied'] == 'true'): ?>
                		     <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmButton small cancel" onclick="window.location.href='index.php?action=DetailViewPDFTemplate&module=PDFMaker&templateid=<?php echo $this->_tpl_vars['SAVETEMPLATEID']; ?>
&parenttab=Tools';" />
                		   <?php else: ?>
                             <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmButton small cancel" onclick="window.history.back()" />
                           <?php endif; ?>            			
    		   	        </td></tr>
                    </table>                                  
                    
				</td>
				</tr><tr><td align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo $this->_tpl_vars['MOD']['PDF_MAKER']; ?>
 <?php echo $this->_tpl_vars['VERSION']; ?>
 <?php echo $this->_tpl_vars['MOD']['COPYRIGHT']; ?>
</td></tr>
				</table>
			</td>
			</tr>
                        </form>
			</table>
 
<script>

var selectedTab='properties';
var selectedTab2='body';

function check4null(form)
{

        var isError = false;
        var errorMessage = "";
        // Here we decide whether to submit the form.
        if (trim(form.templatename.value) =='') {
                isError = true;
                errorMessage += "\n template name";
                form.templatename.focus();
        }
        if (trim(form.foldername.value) =='') {
                isError = true;
                errorMessage += "\n folder name";
                form.foldername.focus();
        }
        if (trim(form.subject.value) =='') {
                isError = true;
                errorMessage += "\n subject";
                form.subject.focus();
        }

        // Here we decide whether to submit the form.
        if (isError == true) {
                alert("<?php echo $this->_tpl_vars['MOD']['LBL_MISSING_FIELDS']; ?>
" + errorMessage);
                return false;
        }
 return true;

}

var module_blocks = new Array();

<?php $_from = $this->_tpl_vars['MODULE_BLOCKS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blockname'] => $this->_tpl_vars['moduleblocks']):
?>
    module_blocks["<?php echo $this->_tpl_vars['blockname']; ?>
"] = new Array(<?php echo $this->_tpl_vars['moduleblocks']; ?>
);
<?php endforeach; endif; unset($_from); ?>

var module_fields = new Array();

<?php $_from = $this->_tpl_vars['MODULE_FIELDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['modulename'] => $this->_tpl_vars['modulefields']):
?>
    module_fields["<?php echo $this->_tpl_vars['modulename']; ?>
"] = new Array(<?php echo $this->_tpl_vars['modulefields']; ?>
);
<?php endforeach; endif; unset($_from); ?>

var selected_module='<?php echo $this->_tpl_vars['SELECTMODULE']; ?>
';

function fillModuleFields(first,second_name)
{
    second = document.getElementById(second_name);    
    optionTest = true;
    lgth = second.options.length - 1;

    second.options[lgth] = null;
    if (second.options[lgth]) optionTest = false;
    if (!optionTest) return;
    var box = first;
    var module = box.options[box.selectedIndex].value;
    if (!module) return;

    var box2 = second;

    //box2.options.length = 0;

    var optgroups = box2.childNodes;
    for(i = optgroups.length - 1 ; i >= 0 ; i--)
    {
            box2.removeChild(optgroups[i]);
    }

    var blocks = module_blocks[module];
    var blocks_length = blocks.length;
    if(second_name=='filename_fields')
    {
        objOption=document.createElement("option");
        objOption.innerHTML = '<?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE_FIELD']; ?>
';
        objOption.value = '';
        box2.appendChild(objOption);
        
        optGroup = document.createElement('optgroup');
        optGroup.label = '<?php echo $this->_tpl_vars['MOD']['LBL_COMMON_FILEINFO']; ?>
';
        box2.appendChild(optGroup); 
        
        <?php $_from = $this->_tpl_vars['FILENAME_FIELDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field_val'] => $this->_tpl_vars['field']):
?>
            objOption=document.createElement("option");
            objOption.innerHTML = '<?php echo $this->_tpl_vars['field']; ?>
';
            objOption.value = '<?php echo $this->_tpl_vars['field_val']; ?>
';
            optGroup.appendChild(objOption);
        <?php endforeach; endif; unset($_from); ?>
        
        if(module=='Invoice' || module=='Quotes' || module=='SalesOrder' || module=='PurchaseOrder' || module=='Issuecards' || module=='Receiptcards' || module=="Creditnote" || module=="StornoInvoice")
            blocks_length-=2;
    }  
     
    for(b=0;b<blocks_length;b+=2)
    {
            optGroup = document.createElement('optgroup');
            optGroup.label = blocks[b];
            box2.appendChild(optGroup);

            var list = module_fields[module+'|'+ blocks[b+1]];

    		for(i=0;i<list.length;i+=2)
    		{
    		      //<optgroup label="Addresse" class=\"select\" style=\"border:none\">

                  objOption=document.createElement("option");
                  objOption.innerHTML = list[i];
                  objOption.value = list[i+1];

                  optGroup.appendChild(objOption);
    		}
    }
    
    return module;    
}

var all_related_modules = new Array();

<?php $_from = $this->_tpl_vars['ALL_RELATED_MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['relatedmodulename'] => $this->_tpl_vars['related_modules']):
?>
    all_related_modules["<?php echo $this->_tpl_vars['relatedmodulename']; ?>
"] = new Array('<?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE']; ?>
','none'<?php $_from = $this->_tpl_vars['related_modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module1']):
?> ,'<?php echo ((is_array($_tmp=$this->_tpl_vars['APP'][$this->_tpl_vars['module1']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
','<?php echo $this->_tpl_vars['module1']; ?>
'<?php endforeach; endif; unset($_from); ?>);
<?php endforeach; endif; unset($_from); ?>

function change_relatedmodulesorce(first,second_name)
{ 
    second = document.getElementById(second_name);

    optionTest = true;
    lgth = second.options.length - 1;

    second.options[lgth] = null;
    if (second.options[lgth]) optionTest = false;
    if (!optionTest) return;
    var box = first;
    var number = box.options[box.selectedIndex].value;
    if (!number) return;

    var box2 = second;

    //box2.options.length = 0;

    var optgroups = box2.childNodes;
    for(i = optgroups.length - 1 ; i >= 0 ; i--)
    {
            box2.removeChild(optgroups[i]);
    }

    var list = all_related_modules[number];

    for(i=0;i<list.length;i+=2)
    {
          objOption=document.createElement("option");
          objOption.innerHTML = list[i];
          objOption.value = list[i+1];

          box2.appendChild(objOption);
    }

    clearRelatedModuleFields();
}

function clearRelatedModuleFields()
{
    second = document.getElementById("relatedmodulefields");

    lgth = second.options.length - 1;

    second.options[lgth] = null;
    if (second.options[lgth]) optionTest = false;
    if (!optionTest) return;

    var box2 = second;

    var optgroups = box2.childNodes;
    for(i = optgroups.length - 1 ; i >= 0 ; i--)
    {
            box2.removeChild(optgroups[i]);
    }

    objOption=document.createElement("option");
    objOption.innerHTML = "<?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE_FIELD']; ?>
";
    objOption.value = "";

    box2.appendChild(objOption);

}

var related_module_fields = new Array();

<?php $_from = $this->_tpl_vars['RELATED_MODULE_FIELDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['relatedmodulename'] => $this->_tpl_vars['relatedmodulefields']):
?>
    related_module_fields["<?php echo $this->_tpl_vars['relatedmodulename']; ?>
"] = new Array(<?php echo $this->_tpl_vars['relatedmodulefields']; ?>
);
<?php endforeach; endif; unset($_from); ?>

function change_relatedmodule(first,second_name)
{
    second = document.getElementById(second_name);

    optionTest = true;
    lgth = second.options.length - 1;

    second.options[lgth] = null;
    if (second.options[lgth]) optionTest = false;
    if (!optionTest) return;
    var box = first;
    var number = box.options[box.selectedIndex].value;
    if (!number) return;

    var box2 = second;

    //box2.options.length = 0;

    var optgroups = box2.childNodes;
    for(i = optgroups.length - 1 ; i >= 0 ; i--)
    {
            box2.removeChild(optgroups[i]);
    }

    if (number == "none")
    {
        objOption=document.createElement("option");
        objOption.innerHTML = "<?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE_FIELD']; ?>
";
        objOption.value = "";

        box2.appendChild(objOption);
    }
    else
    {
        var blocks = module_blocks[number];

        for(b=0;b<blocks.length;b+=2)
        {
            var list = related_module_fields[number+'|'+ blocks[b+1]];

    		if (list.length > 0)
    		{

    		    optGroup = document.createElement('optgroup');
                optGroup.label = blocks[b];
                box2.appendChild(optGroup);

        		for(i=0;i<list.length;i+=2)
        		{
                      objOption=document.createElement("option");
                      objOption.innerHTML = list[i];
                      objOption.value = list[i+1];


                      optGroup.appendChild(objOption);
        		}
    		}
        }
    }
}


function InsertIntoTemplate(element)
{

    selectField =  document.getElementById(element).value;

    if (selectedTab2 == "body")
        var oEditor = CKEDITOR.instances.body;    
    else if (selectedTab2 == "header")
        var oEditor = CKEDITOR.instances.header_body;
    else if (selectedTab2 == "footer")
        var oEditor = CKEDITOR.instances.footer_body;
    

    if(element!='header_var' && element!='footer_var' && element!='hmodulefields' && element!='fmodulefields' && element!='dateval')
    {
      	 if (selectField != '')
      	 {
               if (selectField == 'ORGANIZATION_STAMP_SIGNATURE')
       	       {
       	           insert_value = '<?php echo $this->_tpl_vars['COMPANY_STAMP_SIGNATURE']; ?>
';
      	       }
               else if (selectField == 'COMPANY_LOGO')
       	       {
       	           insert_value = '<?php echo $this->_tpl_vars['COMPANYLOGO']; ?>
';
      	       }
               else if (selectField == 'ORGANIZATION_HEADER_SIGNATURE')
       	       {
       	           insert_value = '<?php echo $this->_tpl_vars['COMPANY_HEADER_SIGNATURE']; ?>
';
      	       }
               else
      	       {
                   if (element == "articelvar")
                      insert_value = '#'+selectField+'#';
                   else if (element == "relatedmodulefields")
                      insert_value = '$R_'+selectField+'$';                   
                   else if(element == "productbloctpl" || element == "productbloctpl2")
                      insert_value = selectField;
                   else if(element == "global_lang")
                      insert_value = '%G_'+selectField+'%';
                   else if(element == "module_lang")
                      insert_value = '%M_'+selectField+'%';  
                   else if(element == "barcodeval")
                      insert_value = '[BARCODE|'+selectField+'=YOURCODE|BARCODE]'; 
                   else if(element == "customfunction")
                      insert_value = '[CUSTOMFUNCTION|'+selectField+'|CUSTOMFUNCTION]'; 
                   else
                      insert_value = '$'+selectField+'$';


               }
               oEditor.insertHtml(insert_value);
      	 }

    }
    else
    {
        
        if (selectField != '')
        {
            if(element=='hmodulefields' || element=='fmodulefields' )
                oEditor.insertHtml('$'+selectField+'$');
            else
                oEditor.insertHtml(selectField);
        }
    }
}



function savePDF()
{
    var error = 0;

    if (!ControlNumber('margin_top',true) || !ControlNumber('margin_bottom',true) || !ControlNumber('margin_left',true) || !ControlNumber('margin_right',true))
       return false;
    else
       return true;
    
}

function ControlNumber(elid,final)
{

    var control_number = document.getElementById(elid).value;

    <?php echo '

    var re = new Array();
    re[1] = new RegExp("^([0-9])");

    re[2] = new RegExp("^[0-9]{1}[.]$");

    re[3] = new RegExp("^[0-9]{1}[.][0-9]{1}$");

    '; ?>


    if (control_number.length > 3 || !re[control_number.length].test(control_number) || (final == true && control_number.length == 2))
    {
        alert("<?php echo $this->_tpl_vars['MOD']['LBL_MARGIN_ERROR']; ?>
");
        document.getElementById(elid).focus();
        return false;
    }
    else
    {
        return true;
    }

}

function refreshPosition(type)
{

    var i;

    selectbox = document.getElementById(type + "_position");
    selectbox_value = selectbox.value;

    for(i=selectbox.options.length-1;i>=0;i--)
    {
        selectbox.remove(i);
    }


    el1 = document.getElementById(type + "_function_left").value;
    el2 = document.getElementById(type + "_function_center").value;
    el3 = document.getElementById(type + "_function_right").value;


    selectbox.options[selectbox.options.length] = new Option("<?php echo $this->_tpl_vars['MOD']['LBL_EMPTY_IMAGE']; ?>
", "empty");
    if (el1 == "hf_function_1") selectbox.options[selectbox.options.length] = new Option("<?php echo $this->_tpl_vars['MOD']['LBL_LEFT']; ?>
", "left");
    if (el2 == "hf_function_1") selectbox.options[selectbox.options.length] = new Option("<?php echo $this->_tpl_vars['MOD']['LBL_CENTER']; ?>
", "center");
    if (el3 == "hf_function_1") selectbox.options[selectbox.options.length] = new Option("<?php echo $this->_tpl_vars['MOD']['LBL_RIGHT']; ?>
", "right");

    selectbox.value = selectbox_value;

}

function showHideTab(tabname)
{
    document.getElementById(selectedTab+'_tab').className="dvtUnSelectedCell";    
    document.getElementById(tabname+'_tab').className='dvtSelectedCell';
    
    document.getElementById(selectedTab+'_div').style.display='none';
    document.getElementById(tabname+'_div').style.display='block';
    var formerTab=selectedTab;
    selectedTab=tabname;     
}



function showHideTab2(tabname)
{
    document.getElementById(selectedTab2+'_tab2').className="dvtUnSelectedCell";    
    document.getElementById(tabname+'_tab2').className='dvtSelectedCell';
    
    document.getElementById(selectedTab2+'_variables').style.display='none';  
    document.getElementById(tabname+'_variables').style.display='';
    
    document.getElementById(selectedTab2+'_div2').style.display='none';
    document.getElementById(tabname+'_div2').style.display='block';

    if (tabname == "body")
    {
        document.getElementById('no_product_div').style.display='none';
        document.getElementById('product_div').style.display = '';
        document.getElementById('product_bloc_tpl_row').style.display='';        
    }    
    else
    {
        document.getElementById('product_bloc_tpl_row').style.display='none';
        document.getElementById('product_div').style.display = 'none';
        document.getElementById('no_product_div').style.display='';         
    }
    
    
    var formerTab=selectedTab2;
    selectedTab2=tabname;
}


<?php echo '
function insertFieldIntoFilename(val)
{
    if(val!=\'\')
        document.getElementById(\'nameOfFile\').value+=\'$\'+val+\'$\';    
}
'; ?>

</script>