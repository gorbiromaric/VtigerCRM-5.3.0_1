<?php /* Smarty version 2.6.18, created on 2012-03-29 17:49:03
         compiled from modules/PDFMaker/InventoryPdfActions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'sizeof', 'modules/PDFMaker/InventoryPdfActions.tpl', 3, false),array('modifier', 'vtiger_imageurl', 'modules/PDFMaker/InventoryPdfActions.tpl', 19, false),array('function', 'html_options', 'modules/PDFMaker/InventoryPdfActions.tpl', 7, false),)), $this); ?>
<?php if ($this->_tpl_vars['ENABLE_PDFMAKER'] == 'true'): ?>
<table border=0 cellspacing=0 cellpadding=0 style="width:100%;">
<?php if (sizeof($this->_tpl_vars['TEMPLATE_LANGUAGES']) > 1): ?>
	<tr>
		<td class="rightMailMergeContent"  style="width:100%;">    	
	    <select name="template_language" id="template_language" class="detailedViewTextBox" style="width:90%;" size="1">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['TEMPLATE_LANGUAGES'],'selected' => $this->_tpl_vars['CURRENT_LANGUAGE']), $this);?>

	    </select>
		</td>
	</tr>
<?php else: ?>
	<?php $_from = ($this->_tpl_vars['TEMPLATE_LANGUAGES']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_key'] => $this->_tpl_vars['lang']):
?>
    	<input type="hidden" name="template_language" id="template_language" value="<?php echo $this->_tpl_vars['lang_key']; ?>
"/>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
		
<tr>
	<td class="rightMailMergeContent"  style="width:100%;">   		    
	    <a href="javascript:;" onclick="document.location.href='index.php?module=PDFMaker&relmodule=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=CreatePDFFromTemplate&record=<?php echo $this->_tpl_vars['ID']; ?>
&language='+document.getElementById('template_language').value;" class="webMnu"><img src="<?php echo vtiger_imageurl('actionGeneratePDF.gif', $this->_tpl_vars['THEME']); ?>
" hspace="5" align="absmiddle" border="0"/></a>
	    <a href="javascript:;" onclick="document.location.href='index.php?module=PDFMaker&relmodule=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=CreatePDFFromTemplate&record=<?php echo $this->_tpl_vars['ID']; ?>
&language='+document.getElementById('template_language').value;" class="webMnu"><?php echo $this->_tpl_vars['APP']['LBL_EXPORT_TO_PDF']; ?>
</a>
	</td>
</tr>

<tr>
  	<td class="rightMailMergeContent"  style="width:100%;">  			
		<a href="javascript:;" onclick="fnvshobj(this,'sendpdfmail_cont');sendPDFmail('<?php echo $this->_tpl_vars['MODULE']; ?>
','<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><img src="<?php echo vtiger_imageurl('PDFMail.gif', $this->_tpl_vars['THEME']); ?>
" hspace="5" align="absmiddle" border="0"/></a>
		<a href="javascript:;" onclick="fnvshobj(this,'sendpdfmail_cont');sendPDFmail('<?php echo $this->_tpl_vars['MODULE']; ?>
','<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><?php echo $this->_tpl_vars['APP']['LBL_SEND_EMAIL_PDF']; ?>
</a>  
        <div id="sendpdfmail_cont" style="z-index:100001;position:absolute;"></div>
    </td>
</tr>

<tr>
    <td class="rightMailMergeContent"  style="width:100%;">
        <a href="javascript:;" onclick="getPDFBreaklineDiv(this,'<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><img src="modules/PDFMaker/img/PDF_bl.png" hspace="5" align="absmiddle" border="0"/></a>
        <a href="javascript:;" onclick="getPDFBreaklineDiv(this,'<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><?php echo $this->_tpl_vars['MOD']['LBL_PRODUCT_BREAKLINE']; ?>
</a>                
        <div id="PDFBreaklineDiv" style="display:none; width:350px; position:absolute;" class="layerPopup"></div>                
    </td>
</tr>

<tr>
    <td class="rightMailMergeContent"  style="width:100%;">
        <a href="javascript:;" onclick="getPDFImagesDiv(this,'<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><img src="modules/PDFMaker/img/PDF_img.png" hspace="5" align="absmiddle" border="0"/></a>
        <a href="javascript:;" onclick="getPDFImagesDiv(this,'<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><?php echo $this->_tpl_vars['MOD']['LBL_PRODUCT_IMAGE']; ?>
</a>                
        <div id="PDFImagesDiv" style="display:none; width:350px; position:absolute;" class="layerPopup"></div>                
    </td>
</tr>
</table>

<?php endif; ?>