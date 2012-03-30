<?php /* Smarty version 2.6.18, created on 2012-03-28 15:39:12
         compiled from modules/PDFMaker/install.tpl */ ?>
<br/>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>   		
   		<td class="showPanelBg" valign="top" width="100%">
   			<table  cellpadding="0" cellspacing="0" width="100%" border=0>
  				<tr>
				<td width="50%" valign=top>
					<form name="install"  method="POST" action="index.php">
						<input type="hidden" name="module" value="PDFMaker"/>
						<input type="hidden" name="action" value="install"/>
						<table align="center" cellpadding="15" cellspacing="0" width="85%" class="mailClient importLeadUI small" border="0">
							<tr>
								<td colspan="2" valign="middle" align="left" class="mailClientBg genHeaderSmall"><?php echo $this->_tpl_vars['MOD']['LBL_MODULE_NAME']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_INSTALL']; ?>
</td>
								<br/>
							</tr>
							<?php if ($this->_tpl_vars['STEP'] == '0'): ?>
							<tr>
    							<td border="0" cellpadding="5" cellspacing="0" width="70%">
    							<table width="100%">
    							     <tr>
                                       <td align="left" valign="top" style="padding-left:40px;">
                                       <input type="hidden" name="installtype" value="validate"/>                                       
                                       <span class="genHeaderSmall"><?php echo $this->_tpl_vars['MOD']['LBL_WELCOME']; ?>
</span>
  									   </td>
     								 </tr>
                                     <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;color:black;">
     								   <?php echo $this->_tpl_vars['MOD']['LBL_WELCOME_DESC']; ?>

                                       </td>  
     								 </tr>
     								  <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;color:black;">
     								   <?php echo $this->_tpl_vars['MOD']['LBL_WELCOME_FINISH']; ?>

                                       </td>  
     								 </tr>
                                     
                                     <tr><td align="left" valign="top" class="small">&nbsp;</td></tr>
                                       
                                     <tr>
                                       <td align="left" valign="top" style="padding-left:40px;">
                                       <input type="hidden" name="installtype" value="validate"/>                                       
                                       <strong><?php echo $this->_tpl_vars['MOD']['LBL_INSERT_KEY']; ?>
</strong>
  									   </td>
     								 </tr>
                                     <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;color:red;">
     								   <?php echo $this->_tpl_vars['MOD']['LBL_ONLINE_ASSURE']; ?>

                                       </td>  
     								 </tr>   								
     								 <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;padding-top:10px;">
     								   <input type="text" class="small detailedViewTextBox" name="key" value="" style="width:200px;font-size:13px;"/>
                                       </td>  
     								 </tr>
    							</table>    							
    						    </td>
    						    <td border="0" cellpadding="5" cellspacing="0" width="30%">
    							&nbsp;
    							</td>
 							</tr>
 							<?php elseif ($this->_tpl_vars['STEP'] == '1'): ?>
                            <tr>
    							<td border="0" cellpadding="5" cellspacing="0" width="70%">
    							<table width="100%">
    							     <tr>
                                       <td align="left" valign="top" style="padding-left:40px;">
                                       <input type="hidden" name="installtype" value="download_src"/>                                       
                                       <span class="genHeaderSmall"><?php echo $this->_tpl_vars['MOD']['LBL_DOWNLOAD_SRC']; ?>
</span>
  									   </td>
     								 </tr>
                                     <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;">
     								   <?php echo $this->_tpl_vars['MOD']['LBL_DOWNLOAD_SRC_DESC']; ?>

                                       </td>                                         
     								 </tr>
     								 <?php if ($this->_tpl_vars['MB_STRING_EXISTS'] == 'false'): ?>
                                       <tr>
                                        <td align="left" valign="top" class="small" style="padding-left:40px;color:red;">
                                        <?php echo $this->_tpl_vars['MOD']['LBL_MB_STRING_ERROR']; ?>

                                        </td>                                       
                                       </tr>
                                     <?php endif; ?>
    							</table>    							
    						    </td>
    						    <td border="0" cellpadding="5" cellspacing="0" width="30%">
    							&nbsp;
    							</td>
 							</tr>
 							<?php elseif ($this->_tpl_vars['STEP'] == '2'): ?>
							<input type="hidden" name="installtype" value="redirect_recalculate" />
							<tr>
    							<td border="0" cellpadding="5" cellspacing="0" width="70%">
    							<table width="100%">
    							     <tr>
                                       <td align="left" valign="top" style="padding-left:40px;">                                                                               
                                       <span class="genHeaderSmall"><?php echo $this->_tpl_vars['MOD']['LBL_FINAL_INSTRUCTIONS']; ?>
</span>
  									   </td>
     								 </tr>
     								 <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;">   								    
                                        <?php echo $this->_tpl_vars['MOD']['LBL_RECALCULATE_RIGHTS']; ?>

                                       </td>
                                     </tr>
    							</table>    							
    						    </td>
    						    <td border="0" cellpadding="5" cellspacing="0" width="50%">
    							&nbsp;
    							</td>
 							</tr>
 							<?php elseif ($this->_tpl_vars['STEP'] == 'error'): ?>
 							<tr>
    							<td border="0" cellpadding="5" cellspacing="0" width="50%">
    							<table width="100%">
    							     <tr>
                                       <td align="left" valign="top" style="padding-left:40px;">                                       
                                       <span class="genHeaderSmall"><?php echo $this->_tpl_vars['MOD']['LBL_INSTAL_ERROR']; ?>
</span>
  									   </td>
     								 </tr>
                                     <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;">
     								    <?php if ($this->_tpl_vars['INVALID'] != 'true'): ?>
                                            <?php echo $this->_tpl_vars['MOD']['LBL_ERROR_TBL']; ?>
:<br/>
                                        <?php endif; ?>
     								   <?php $_from = $this->_tpl_vars['ERROR_TBL']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tbl']):
?>
     								   <pre><?php echo $this->_tpl_vars['tbl']; ?>
</pre><br />
     								   <?php endforeach; endif; unset($_from); ?>
                                       </td>  
     								 </tr>     								 
    							</table>    							
    						    </td>
    						    <td border="0" cellpadding="5" cellspacing="0" width="50%">
    							&nbsp;
    							</td>
 							</tr>
 							<?php endif; ?>
 							<tr>
								<td align="center" colspan="2" border=0 cellspacing=0 cellpadding=5 width=98% class="layerPopupTransport">	
									<?php if ($this->_tpl_vars['STEP'] == '0'): ?>
                                        <input type="submit" id="validate_button" value="<?php echo $this->_tpl_vars['MOD']['LBL_VALIDATE']; ?>
" class="crmbutton small create"/>&nbsp;&nbsp;
                                        <input type="button" id="order_button" value="<?php echo $this->_tpl_vars['MOD']['LBL_ORDER_NOW']; ?>
" class="crmbutton small cancel" onclick="window.location.href='http://www.vtiger.sk/purchase-order'"/>
              						<?php elseif ($this->_tpl_vars['STEP'] == '1'): ?>
              						    <input type="submit" id="download_button" value="<?php echo $this->_tpl_vars['MOD']['LBL_DOWNLOAD']; ?>
" class="crmbutton small create"/>&nbsp;&nbsp;
                                    <?php elseif ($this->_tpl_vars['STEP'] == '2'): ?>
              						    <input type="submit" id="next_button" value="<?php echo $this->_tpl_vars['MOD']['LBL_FINISH']; ?>
" class="crmbutton small create"/>&nbsp;&nbsp;
                                    <?php elseif ($this->_tpl_vars['STEP'] == 'error' && $this->_tpl_vars['INVALID'] != 'true'): ?>
              						    <input type="button" id="refresh_button" value="<?php echo $this->_tpl_vars['MOD']['LBL_RELOAD']; ?>
" class="crmbutton small create" onclick="window.location.reload();"/>&nbsp;&nbsp;
                                    <?php endif; ?> 
                                                 						
                                    <?php if ($this->_tpl_vars['STEP'] == 'error'): ?>
                                       <?php if ($this->_tpl_vars['INVALID'] == 'true'): ?>
                                        <input type="button" name="<?php echo $this->_tpl_vars['APP']['LBL_BACK']; ?>
" value="<?php echo $this->_tpl_vars['APP']['LBL_BACK']; ?>
" class="crmbutton small create" onclick="window.history.back()" />
                                       <?php endif; ?>
                                       <input type="button" name="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmbutton small cancel" onclick="window.location.href='index.php?module=Home&action=index&parenttab=My Home Page'" />
                                    <?php endif; ?> 
								</td>
							</tr>
 						</table>
 					</form>
 				</td>
 				</tr>
 			</table>
 		</td>
 	</tr>
</table>

<script>
function changeInstallType(type)
{

   document.getElementById('next_button').disabled = false;
   document.getElementById('next_button').style.display = "inline";
    
   if (type == "express")
   {
        bad_files_count = document.getElementById('bad_files').value;
        
        if (bad_files_count != "0") 
        {
           document.getElementById('next_button').disabled = true;
           document.getElementById('next_button').style.display = "none";
        }          
        
        document.getElementById('total_steps').innerHTML='4';
   }
   else if (type == "custom")
   {        
        document.getElementById('total_steps').innerHTML='5';
   }
}

<?php echo '    
function controlPermissions()
{
    
    
    var url = "module=PDFMaker&action=PDFMakerAjax&file=controlPermissions";
    new Ajax.Request(
                    \'index.php\',
                      {queue: {position: \'end\', scope: \'command\'},
                              method: \'post\',
                              postBody:url,
                              onComplete: function(response) {
                                      document.getElementById(\'list_permissions\').innerHTML = response.responseText;
                                      
                                      bad_files_count = document.getElementById(\'bad_files\').value;
                                      
                                      type = document.getElementById(\'installexpress\').checked;
                                      
                                      if (type == true && bad_files_count == "0")
                                      {
                                          document.getElementById(\'next_button\').disabled = false;
                                          document.getElementById(\'next_button\').style.display = "inline";
                                          
                                          document.getElementById(\'btn_control_permissions\').style.display = "none"; 
                                      }
                              }
                      }
                      );
                  
}
'; ?>
    
</script>