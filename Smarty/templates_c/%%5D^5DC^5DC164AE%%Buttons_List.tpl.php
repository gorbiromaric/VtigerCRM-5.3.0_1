<?php /* Smarty version 2.6.18, created on 2012-03-29 17:47:40
         compiled from modules/PDFMaker/Buttons_List.tpl */ ?>
<TABLE border=0 cellspacing=0 cellpadding=0 width=100% class=small>
<tr><td style="height:2px"></td></tr>
<tr>
	<td style="padding-left:10px;padding-right:50px;height:38px" class="moduleName" nowrap><?php echo $this->_tpl_vars['APP'][$this->_tpl_vars['CATEGORY']]; ?>
 > <a class="hdrLink" href="index.php?action=ListPDFTemplates&module=PDFMaker&parenttab=<?php echo $this->_tpl_vars['CATEGORY']; ?>
"><?php echo $this->_tpl_vars['MOD']['LBL_TEMPLATE_GENERATOR']; ?>
</a></td>
</tr>
</TABLE>