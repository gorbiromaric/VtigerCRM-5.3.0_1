<?php /* Smarty version 2.6.18, created on 2012-03-28 16:45:54
         compiled from UserEditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'UserEditView.tpl', 80, false),array('modifier', 'getTranslatedString', 'UserEditView.tpl', 195, false),)), $this); ?>
<script language="JavaScript" type="text/javascript" src="include/js/menu.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/ColorPicker2.js"></script>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>

<script language="JavaScript" type="text/javascript">

 	var cp2 = new ColorPicker('window');
	
function pickColor(color)
{
	ColorPicker_targetInput.value = color;
        ColorPicker_targetInput.style.backgroundColor = color;
}	

function openPopup(){
		window.open("index.php?module=Users&action=UsersAjax&file=RolePopup&parenttab=Settings","roles_popup_window","height=425,width=640,toolbar=no,menubar=no,dependent=yes,resizable =no");
	}	
</script>	

<script language="javascript">
function check_duplicate()
{
	var user_name = window.document.EditView.user_name.value;
	var status = CharValidation(user_name,'name');
	
	VtigerJS_DialogBox.block();
	
        if(status)
	{
	new Ajax.Request(
                'index.php',
                {queue: {position: 'end', scope: 'command'},
                        method: 'post',
                        postBody: 'module=Users&action=UsersAjax&file=Save&ajax=true&dup_check=true&userName='+user_name,
                        onComplete: function(response) {
							if(response.responseText.indexOf('SUCCESS') > -1)
							{
							//	$('user_status').disabled = false;
								document.EditView.submit();
							}
			       				else {
			       					VtigerJS_DialogBox.unblock();
									alert(response.responseText);
						        }
			            }
                }
        );
	}
	else
            alert(alert_arr.NO_SPECIAL+alert_arr.IN_USERNAME)
}

</script>

<!-- vtlib customization: Help information assocaited with the fields -->
<?php if ($this->_tpl_vars['FIELDHELPINFO']): ?>
<script type='text/javascript'>
<?php echo 'var fieldhelpinfo = {}; '; ?>

<?php $_from = $this->_tpl_vars['FIELDHELPINFO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['FIELDHELPKEY'] => $this->_tpl_vars['FIELDHELPVAL']):
?>
	fieldhelpinfo["<?php echo $this->_tpl_vars['FIELDHELPKEY']; ?>
"] = "<?php echo $this->_tpl_vars['FIELDHELPVAL']; ?>
";
<?php endforeach; endif; unset($_from); ?>
</script>
<?php endif; ?>
<!-- END -->

<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
        <br>

	<div align=center>
	<?php if ($this->_tpl_vars['PARENTTAB'] == 'Settings'): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'SetMenu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>

		<form name="EditView" method="POST" action="index.php" ENCTYPE="multipart/form-data" onsubmit="VtigerJS_DialogBox.block();">
		<input type="hidden" name="module" value="Users">
		<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['ID']; ?>
">
		<input type="hidden" name="mode" value="<?php echo $this->_tpl_vars['MODE']; ?>
">
		<input type='hidden' name='parenttab' value='<?php echo $this->_tpl_vars['PARENTTAB']; ?>
'>
		<input type="hidden" name="activity_mode" value="<?php echo $this->_tpl_vars['ACTIVITYMODE']; ?>
">
		<input type="hidden" name="action">
		<input type="hidden" name="return_module" value="<?php echo $this->_tpl_vars['RETURN_MODULE']; ?>
">
		<input type="hidden" name="return_id" value="<?php echo $this->_tpl_vars['RETURN_ID']; ?>
">
		<input type="hidden" name="return_action" value="<?php echo $this->_tpl_vars['RETURN_ACTION']; ?>
">			
		<input type="hidden" name="tz" value="Europe/Berlin">			
		<input type="hidden" name="holidays" value="de,en_uk,fr,it,us,">			
		<input type="hidden" name="workdays" value="0,1,2,3,4,5,6,">			
		<input type="hidden" name="namedays" value="">			
		<input type="hidden" name="weekstart" value="1">
		<input type="hidden" name="hour_format" value="<?php echo $this->_tpl_vars['HOUR_FORMAT']; ?>
">
		<input type="hidden" name="start_hour" value="<?php echo $this->_tpl_vars['START_HOUR']; ?>
">
		<input type="hidden" name="form_token" value="<?php echo $this->_tpl_vars['FORM_TOKEN']; ?>
">

	<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="settingsSelUITopLine">
	<tr><td align="left">
		<table class="settingsSelUITopLine" border="0" cellpadding="5" cellspacing="0" width="100%">
		<tr>
			<td rowspan="2" width="50"><img src="<?php echo vtiger_imageurl('ico-users.gif', $this->_tpl_vars['THEME']); ?>
" align="absmiddle"></td>
			<td>	
				<span class="lvtHeaderText">
				<?php if ($this->_tpl_vars['PARENTTAB'] != ''): ?>	
				<b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
 </a> &gt; <a href="index.php?module=Administration&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
</a> &gt; 
					<?php if ($this->_tpl_vars['MODE'] == 'edit'): ?>
						<?php echo $this->_tpl_vars['UMOD']['LBL_EDITING']; ?>
 "<?php echo $this->_tpl_vars['USERNAME']; ?>
" 
					<?php else: ?>
						<?php if ($this->_tpl_vars['DUPLICATE'] != 'true'): ?>
						<?php echo $this->_tpl_vars['UMOD']['LBL_CREATE_NEW_USER']; ?>

						<?php else: ?>
						<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATING']; ?>
 "<?php echo $this->_tpl_vars['USERNAME']; ?>
"
						<?php endif; ?>
					<?php endif; ?>
					</b></span>
				<?php else: ?>
                                <span class="lvtHeaderText">
                                <b><?php echo $this->_tpl_vars['APP']['LBL_MY_PREFERENCES']; ?>
</b>
                                </span>
                                <?php endif; ?>
			</td>
			<td rowspan="2" nowrap>&nbsp;
			</td>
	 	</tr>
		<tr>
			<?php if ($this->_tpl_vars['MODE'] == 'edit'): ?>
				<td><b class="small"><?php echo $this->_tpl_vars['UMOD']['LBL_EDIT_VIEW']; ?>
 "<?php echo $this->_tpl_vars['USERNAME']; ?>
"</b>
			<?php else: ?>
				<?php if ($this->_tpl_vars['DUPLICATE'] != 'true'): ?>
				<td><b class="small"><?php echo $this->_tpl_vars['UMOD']['LBL_CREATE_NEW_USER']; ?>
</b>
				<?php endif; ?>
			<?php endif; ?>
			</td>
                </tr>
		</table>
	</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td nowrap align="right">
				<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accesskey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="small crmbutton save"  name="button" value="  <?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
  "  onclick="this.form.action.value='Save'; return verify_data(EditView)" style="width: 70px;" type="button" />
				<input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accesskey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="small crmbutton cancel" name="button" value="  <?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
  " onclick="window.history.back()" style="width: 70px;" type="button" />
						
		</td>
	</tr>
	<tr><td class="padTab" align="left">
				<table width="100%" border="0" cellpadding="0" cellspacing="0">

		<tr><td colspan="2">
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="99%">
			<tr>
			    <td align="left" valign="top">
			             <table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr><td align="left">
						<?php $_from = $this->_tpl_vars['BLOCKS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['blockforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['blockforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['header'] => $this->_tpl_vars['data']):
        $this->_foreach['blockforeach']['iteration']++;
?>
						<br>
		                                <table class="tableHeading" border="0" cellpadding="5" cellspacing="0" width="100%">
                		                <tr>
                                		    <?php echo '<td class="big"><strong>'; ?><?php echo $this->_foreach['blockforeach']['iteration']; ?><?php echo '. '; ?><?php echo $this->_tpl_vars['header']; ?><?php echo '</strong></td><td class="small" align="right">&nbsp;</td>'; ?>

                		              	</tr>
                                		</table>
		                                <table border="0" cellpadding="5" cellspacing="0" width="100%">
						<!-- Handle the ui types display -->
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "DisplayFields.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						</table>
						<?php $this->assign('list_numbering', $this->_foreach['blockforeach']['iteration']); ?>
					   <?php endforeach; endif; unset($_from); ?>
				<br>
			    	<table class="tableHeading" border="0" cellpadding="5" cellspacing="0" width="100%">
			    	<tr>
				     <td class="big">	
					<strong><?php echo $this->_tpl_vars['list_numbering']+1; ?>
. <?php echo $this->_tpl_vars['UMOD']['LBL_HOME_PAGE_COMP']; ?>
</strong>
				     </td>
				     <td class="small" align="right">&nbsp;</td>	
			        </tr>
			    	</table>
			    	<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<?php $_from = $this->_tpl_vars['HOMEORDER']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['values'] => $this->_tpl_vars['homeitems']):
?>
					<tr><td class="dvtCellLabel" align="right" width="30%"><?php echo getTranslatedString($this->_tpl_vars['UMOD'][$this->_tpl_vars['values']], 'Home'); ?>
</td>
					    <?php if ($this->_tpl_vars['homeitems'] != ''): ?>
					    	<td class="dvtCellInfo" align="center" width="5%">
					   	<input name="<?php echo $this->_tpl_vars['values']; ?>
" value="<?php echo $this->_tpl_vars['values']; ?>
" checked type="radio"></td><td class="dvtCellInfo" align="left" width="20%"><?php echo $this->_tpl_vars['UMOD']['LBL_SHOW']; ?>
</td> 		
					    	<td class="dvtCellInfo" align="center" width="5%">
					   	<input name="<?php echo $this->_tpl_vars['values']; ?>
" value="" type="radio"></td><td class="dvtCellInfo" align="left"><?php echo $this->_tpl_vars['UMOD']['LBL_HIDE']; ?>
</td> 		
					    <?php else: ?>	
					    	<td class="dvtCellInfo" align="center" width="5%">
					   	<input name="<?php echo $this->_tpl_vars['values']; ?>
" value="<?php echo $this->_tpl_vars['values']; ?>
" type="radio"></td><td class="dvtCellInfo" align="left"><?php echo $this->_tpl_vars['UMOD']['LBL_SHOW']; ?>
</td> 		
					    	<td class="dvtCellInfo" align="center" width="5%">
					   	<input name="<?php echo $this->_tpl_vars['values']; ?>
" value="" checked type="radio"></td><td class="dvtCellInfo" align="left"><?php echo $this->_tpl_vars['UMOD']['LBL_HIDE']; ?>
</td> 		
					    <?php endif; ?>	
					</tr>			
				<?php endforeach; endif; unset($_from); ?>
			    	</table>
				<!-- Added for User Based TagCloud -->
                                <table class="tableHeading" border="0" cellpadding="5" cellspacing="0" width="100%">
                                <tr>
                                     <td class="big">
                                        <strong><?php echo $this->_tpl_vars['list_numbering']+2; ?>
. <?php echo $this->_tpl_vars['UMOD']['LBL_TAGCLOUD_DISPLAY']; ?>
</strong>
                                     </td>
                                     <td class="small" align="right">&nbsp;</td>
                                </tr>
                                </table>
				<!-- End of Header -->
				<table border="0" cellpadding="5" cellspacing="0" width="100%">
                                        <tr><td class="dvtCellLabel" align="right" width="30%"><?php echo $this->_tpl_vars['UMOD']['LBL_TAG_CLOUD']; ?>
</td>
                                            <?php if ($this->_tpl_vars['TAGCLOUDVIEW'] == 'true'): ?>
                                                <td class="dvtCellInfo" align="center" width="5%">
                                                <input name="tagcloudview" value="true" checked type="radio"></td><td class="dvtCellInfo" align="left" ><?php echo $this->_tpl_vars['UMOD']['LBL_SHOW']; ?>
</td>
                                                <td class="dvtCellInfo" align="center" width="5%">
                                                <input name="tagcloudview" value="false" type="radio"></td><td class="dvtCellInfo" align="left"><?php echo $this->_tpl_vars['UMOD']['LBL_HIDE']; ?>
</td>
					    <?php else: ?>
						<td class="dvtCellInfo" align="center" width="5%">
                                                <input name="tagcloudview" value="true" type="radio"></td><td class="dvtCellInfo" align="left"><?php echo $this->_tpl_vars['UMOD']['LBL_SHOW']; ?>
</td>
						<td class="dvtCellInfo" align="center" width="5%">
						<input name="tagcloudview" value="false" checked type="radio"></td><td class="dvtCellInfo" align="left"><?php echo $this->_tpl_vars['UMOD']['LBL_HIDE']; ?>
</td>
                                            <?php endif; ?>
					</tr>
				</table>
				<!--end of Added for User Based TagCloud -->
				<br>
				<tr><td colspan=4>&nbsp;</td></tr>
							
					        <tr>
					       		<td colspan=4 align="right">
							<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accesskey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="small crmbutton save"  name="button" value="  <?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
  "  onclick="this.form.action.value='Save'; return verify_data(EditView)" style="width: 70px;" type="button" />
							<input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accesskey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="small crmbutton cancel" name="button" value="  <?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
  " onclick="window.history.back()" style="width: 70px;" type="button" />
							</td>
						</tr>
					    </table>
					 </td></tr>
					</table>
			  	   </td></tr>
				   </table>
				 <br>
				  </td></tr>
				<tr><td class="small"><div align="right"><a href="#top"><?php echo $this->_tpl_vars['MOD']['LBL_SCROLL']; ?>
</a></div></td></tr>
				</table>
			</td>
			</tr>
			</table>
			</form>	
</td>
</tr>
</table>
</td></tr></table>
<br>
<?php echo $this->_tpl_vars['JAVASCRIPT']; ?>