<?php /* Smarty version 2.6.18, created on 2012-03-29 17:48:35
         compiled from modules/PDFMaker/DetailViewPDFTemplate.tpl */ ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/PDFMaker/Buttons_List.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script>
function ExportTemplates()
{
     window.location.href = "index.php?module=PDFMaker&action=PDFMakerAjax&file=ExportPDFTemplate&templates=<?php echo $this->_tpl_vars['TEMPLATEID']; ?>
";
}
</script>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
                <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">

				<!-- DISPLAY -->
				<table border=0 cellspacing=0 cellpadding=5 width=100%>
		    	<form method="post" action="index.php" name="etemplatedetailview" onsubmit="VtigerJS_DialogBox.block();">  
				<input type="hidden" name="action" value="">
				<input type="hidden" name="module" value="PDFMaker">
				<input type="hidden" name="templateid" value="<?php echo $this->_tpl_vars['TEMPLATEID']; ?>
">
				<input type="hidden" name="parenttab" value="<?php echo $this->_tpl_vars['PARENTTAB']; ?>
">
				<input type="hidden" name="isDuplicate" value="false">
				<input type="hidden" name="subjectChanged" value="">
				<tr>
										<td class=heading2 valign=bottom>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['MOD']['LBL_VIEWING']; ?>
 &quot;<?php echo $this->_tpl_vars['MODULENAME']; ?>
&quot; </b></td>
				</tr>
				</table>
				<table border=0 cellspacing=0 cellpadding=10 width=100% >
				<tr>
				<td>
					<table border=0 cellspacing=0 cellpadding=5 width=100% >
						
					<tr>
					  <td colspan="2" valign=top class="cellText small" style="padding:5px 0px 0px 0px;">
                      <table width="100%"  border="0" cellspacing="0" cellpadding="0" class="thickBorder">
                        <tr>
                          <td valign=top>
                          <table width="100%"  border="0" cellspacing="0" cellpadding="5" >
                              <tr>
                                <td colspan="2" valign="top" class="small" style="background-color:#cccccc"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PDF_TEMPLATE']; ?>
</strong></td>
                              </tr>
                              <tr>
                                <td valign="top" width="20%" class="cellLabel small"><?php echo $this->_tpl_vars['MOD']['LBL_HEADER_TAB']; ?>
</td>
                                <td class="cellText small" width="80%">&nbsp;<?php echo $this->_tpl_vars['HEADER']; ?>
</td>
                              </tr>
                              
                              <tr>
                                <td valign="top" class="cellLabel small"><?php echo $this->_tpl_vars['MOD']['LBL_BODY']; ?>
</td>
                                <td class="cellText small">&nbsp;<?php echo $this->_tpl_vars['BODY']; ?>
</td>
                              </tr>
                              
                              <tr>
                                <td valign="top" class="cellLabel small"><?php echo $this->_tpl_vars['MOD']['LBL_FOOTER_TAB']; ?>
</td>
                                <td class="cellText small">&nbsp;<?php echo $this->_tpl_vars['FOOTER']; ?>
</td>
                              </tr>
                              
                          </table>
                          </td>                          
                        </tr>                        
                      </table>
                      </td>
					  </tr>
					  
					  
					</table> 					
				</td>
				</tr><tr><td align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo $this->_tpl_vars['MOD']['PDF_MAKER']; ?>
 <?php echo $this->_tpl_vars['VERSION']; ?>
 <?php echo $this->_tpl_vars['MOD']['COPYRIGHT']; ?>
</td></tr>
				</table>

			</td>
			</tr>
			</table>
		</td>
	</tr>
	</form>
	</table>
		


</td>
   </tr>   
</tbody>
</table>