<?php /* Smarty version 2.6.18, created on 2012-03-28 15:16:29
         compiled from Settings/ModuleManager/ModuleImportStep3.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'Settings/ModuleManager/ModuleImportStep3.tpl', 5, false),)), $this); ?>
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
						<table class='tableHeading' cellpadding=5 cellspacing=0 border=0 width=100%>
						<tr>
							<td class='big' colspan=2><b><?php echo $this->_tpl_vars['MOD']['VTLIB_LBL_IMPORTING_MODULE_START']; ?>
</b></td>
						</tr>
						</table>
						
						<table class='tableHeading' cellpadding=5 cellspacing=0 border=0 width=100%>
						<tr valign=top>
							<td class='cellText small'>
																<?php 
									$__moduleimport_package = $this->_tpl_vars['MODULEIMPORT_PACKAGE'];
									$__moduleimport_package_file = $this->_tpl_vars['MODULEIMPORT_PACKAGE_FILE'];
									$__moduleimport_dir_overwrite = $this->_tpl_vars['MODULEIMPORT_DIR_OVERWRITE'];

									$__moduleimport_package->import($__moduleimport_package_file, $__moduleimport_dir_overwrite);
									unlink($__moduleimport_package_file);
								 ?>
							</td>
						</tr>
						</table>

						<table class='tableHeading' cellpadding=5 cellspacing=0 border=0 width=100%>
						<tr valign=top>
							<td class='cellText small' align=right>
								<input type="hidden" name="module" value="Settings">
								<input type="hidden" name="action" value="ModuleManager">
								<input type="hidden" name="parenttab" value="Settings">
								
								<input type="submit" class="crmbutton small edit" value="<?php echo $this->_tpl_vars['APP']['LBL_FINISH']; ?>
">
							</td>
						</tr>
						</table>
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