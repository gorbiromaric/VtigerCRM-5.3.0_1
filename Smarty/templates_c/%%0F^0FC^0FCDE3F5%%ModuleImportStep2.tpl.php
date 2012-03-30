<?php /* Smarty version 2.6.18, created on 2012-03-28 15:16:22
         compiled from Settings/ModuleManager/ModuleImportStep2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'Settings/ModuleManager/ModuleImportStep2.tpl', 5, false),)), $this); ?>
<div id="vtlib_modulemanager_import" style="display:block;position:absolute;width:500px;"></div>
<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tr>
	<td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
    <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
    <br>

	<div align=center>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'SetMenu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<table class="settingsSelUITopLine" border="0" cellpadding="5" cellspacing="0" width="100%">
		<tr>
			<td rowspan="2" valign="top" width="50"><img src="<?php echo vtiger_imageurl('vtlib_modmng.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
" title="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
" border="0" height="48" width="48"></td>
			<td class="heading2" valign="bottom"><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> &gt; <?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_MODULE_MANAGER']; ?>
 &gt; <?php echo $this->_tpl_vars['APP']['LBL_IMPORT']; ?>
</b></td>
		</tr>

		<tr>
			<td class="small" valign="top"><?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_MODULE_MANAGER_DESCRIPTION']; ?>
</td>
		</tr>
		</table>
				
		<br>
		<table border="0" cellpadding="10" cellspacing="0" width="100%">
		<tr>
			<td>
				<div id="vtlib_modulemanager_import_div">
                	<form method="POST" action="index.php">
						<?php if ($this->_tpl_vars['MODULEIMPORT_FAILED'] != ''): ?>
							<table class='tableHeading' cellpadding=5 cellspacing=0 border=0 width=100%>
							<tr>
								<td class='big' colspan=2><b><?php echo $this->_tpl_vars['MOD']['VTlIB_LBL_IMPORT_FAILURE']; ?>
</b></td>
							</tr>
							</table>
							<table cellpadding=5 cellspacing=0 border=0 width=80%>
							<tr valign=top>
								<td class='cellText small'>
									<?php if ($this->_tpl_vars['MODULEIMPORT_FILE_INVALID'] == 'true'): ?>
										<font color=red><b><?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_INVALID_FILE']; ?>
</b></font> <?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_INVALID_IMPORT_TRY_AGAIN']; ?>

									<?php else: ?>
										<font color=red><?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_UNABLE_TO_UPLOAD']; ?>
</font> <?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_UNABLE_TO_UPLOAD2']; ?>

									<?php endif; ?>
								</td>
							</tr>
							</table>
							<table class='tableHeading' cellpadding=5 cellspacing=0 border=0 width=100%>
							<tr valign=top>
								<td class='cellText small' colspan=2 align=right>
									<input type="hidden" name="module" value="Settings">
									<input type="hidden" name="action" value="ModuleManager">
									<input type="hidden" name="parenttab" value="Settings">						
									<input type="submit" class="crmbutton small edit" value="<?php echo $this->_tpl_vars['APP']['LBL_FINISH']; ?>
">
								</td>
							</tr>
							</table>
						<?php else: ?>
							<table class='tableHeading' cellpadding=5 cellspacing=0 border=0 width=100%>
							<tr>
								<td class='big' colspan=2><b><?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_VERIFY_IMPORT_DETAILS']; ?>
</b></td>
							</tr>
							</table>
							<table cellpadding=5 cellspacing=0 border=0 width=100%>
							<tr valign=top>
								<td class='cellLabel small' width=20%>
									<b><?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_MODULE_NAME']; ?>
</b>
								</td>
								<td class='cellText small'>
									<?php echo $this->_tpl_vars['MODULEIMPORT_NAME']; ?>

									<?php if ($this->_tpl_vars['MODULEIMPORT_EXISTS'] == 'true'): ?> <font color=red><b><?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_EXISTS']; ?>
</b></font> <?php endif; ?>
								</td>
							</tr>
							<?php if ($this->_tpl_vars['MODULEIMPORT_DIR']): ?>
							<tr valign=top>
								<td class='cellLabel small' width=20%>
									<b><?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_MODULE_DIR']; ?>
</b>
								</td>
								<td class='cellText small'>
									<?php echo $this->_tpl_vars['MODULEIMPORT_DIR']; ?>

									<?php if ($this->_tpl_vars['MODULEIMPORT_DIR_EXISTS'] == 'true'): ?> <font color=red><b><?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_EXISTS']; ?>
</b></font> 
																			<?php endif; ?>
								</td>
							</tr>
							<?php endif; ?>
							<tr valign=top>
								<td class='cellLabel small' width=20%>
									<b><?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_REQ_VTIGER_VERSION']; ?>
</b>
								</td>
								<td class='cellText small'>
									<?php echo $this->_tpl_vars['MODULEIMPORT_DEP_VTVERSION']; ?>

								</td>
							</tr>

							<?php $this->assign('need_license_agreement', 'false'); ?>

							<?php if ($this->_tpl_vars['MODULEIMPORT_LICENSE']): ?>
							<?php $this->assign('need_license_agreement', 'true'); ?>
							<tr valign=top>
								<td class='cellLabel small' width=20%>
									<b><?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_LICENSE']; ?>
</b>
								</td>
								<td class='cellText small'>
									<textarea readonly class='small' style="background-color: #F5F5F5; border: 0; height: 150px; font: 10px 'Lucida Console', 'Courier New', Arial, sans-serif;"><?php echo $this->_tpl_vars['MODULEIMPORT_LICENSE']; ?>
</textarea><br>
									<?php echo '
									<input type="checkbox" onclick="if(this.form.yesbutton){if(this.checked){this.form.yesbutton.disabled=false;}else{this.form.yesbutton.disabled=true;}}"> '; ?>
 <?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_LICENSE_ACCEPT_AGREEMENT']; ?>

								</td>
							</tr>
							<?php endif; ?>
							</table>
							<table class='tableHeading' cellpadding=5 cellspacing=0 border=0 width=100%>
							<tr valign=top>
								<td class='cellText small' colspan=2 align=right>
									<input type="hidden" name="module" value="Settings">
									<input type="hidden" name="action" value="ModuleManager">
									<input type="hidden" name="parenttab" value="Settings">
									<input type="hidden" name="module_import_file" value="<?php echo $this->_tpl_vars['MODULEIMPORT_FILE']; ?>
">
									<input type="hidden" name="module_import_type" value="<?php echo $this->_tpl_vars['MODULEIMPORT_TYPE']; ?>
">
									<input type="hidden" name="module_import" value="Step3">
									<input type="hidden" name="module_import_cancel" value="false">

									<?php if ($this->_tpl_vars['MODULEIMPORT_EXISTS'] == 'true' || $this->_tpl_vars['MODULEIMPORT_DIR_EXISTS'] == 'true'): ?>										
										<input type="submit" class="crmbutton small delete" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" 
												onclick="this.form.module_import.value=''; this.form.module_import_cancel.value='true';">
									<?php else: ?>
										<?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_PROCEED_WITH_IMPORT']; ?>

										<input type="submit" class="crmbutton small edit" value="<?php echo $this->_tpl_vars['MOD']['LBL_YES']; ?>
" 
											<?php if ($this->_tpl_vars['need_license_agreement'] == 'true'): ?> disabled=true <?php endif; ?>	name="yesbutton">
										<input type="submit" class="crmbutton small delete" value="<?php echo $this->_tpl_vars['MOD']['LBL_NO']; ?>
" 
												onclick="this.form.module_import.value=''; this.form.module_import_cancel.value='true';">
									<?php endif; ?>
								</td>
							</tr>
							</table>
						<?php endif; ?>
					</form>
                </div>
			</td>
		</tr>
		</table>
		<!-- End of Display -->
		
		</td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
   </div>

        </td>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
	</tr>
</table>
<br>