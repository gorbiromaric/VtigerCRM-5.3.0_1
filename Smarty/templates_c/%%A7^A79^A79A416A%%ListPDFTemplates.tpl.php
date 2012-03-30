<?php /* Smarty version 2.6.18, created on 2012-03-29 17:47:40
         compiled from modules/PDFMaker/ListPDFTemplates.tpl */ ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script>
function ExportTemplates()
{
	if(typeof(document.massdelete.selected_id) == 'undefined')
		return false;
        x = document.massdelete.selected_id.length;
        idstring = "";

        if ( x == undefined)
        {

                if (document.massdelete.selected_id.checked)
                {
                        idstring = document.massdelete.selected_id.value;
                        
                        window.location.href = "index.php?module=PDFMaker&action=PDFMakerAjax&file=ExportPDFTemplate&templates="+idstring;
		     	xx=1;
                }
                else
                {
                        alert("<?php echo $this->_tpl_vars['APP']['SELECT_ATLEAST_ONE']; ?>
");
                        return false;
                }
        }
        else
        {
                xx = 0;
                for(i = 0; i < x ; i++)
                {
                        if(document.massdelete.selected_id[i].checked)
                        {
                                idstring = document.massdelete.selected_id[i].value +";"+idstring
                        xx++
                        }
                }
                if (xx != 0)
                {
                        document.massdelete.idlist.value=idstring;
                        
                        window.location.href = "index.php?module=PDFMaker&action=PDFMakerAjax&file=ExportPDFTemplate&templates="+idstring;
                }
                else
                {
                        alert("<?php echo $this->_tpl_vars['APP']['SELECT_ATLEAST_ONE']; ?>
");
                        return false;
                }
       }

}
</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/PDFMaker/Buttons_List.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table border="0" cellpadding="0" cellspacing="0" width="98%">   
<tr>
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
    <form  name="massdelete" method="POST" onsubmit="VtigerJS_DialogBox.block();">
    <input name="idlist" type="hidden">
    <input name="module" type="hidden" value="PDFMaker">
    <input name="parenttab" type="hidden" value="Tools">
    <input name="action" type="hidden" value="">

    <table border=0 cellspacing=0 cellpadding=0 width="100%" >
    <tr><td>
        <table border=0 cellspacing=0 cellpadding=5 width=100% class="listTableTopButtons">
        <tr>
			<td align="right">
            <input type="button" value="<?php echo $this->_tpl_vars['MOD']['PDFMakerManual']; ?>
" class="crmbutton small save" title="<?php echo $this->_tpl_vars['MOD']['PDFMakerManual']; ?>
" onclick="window.location.href='http://www.its4you.sk/images/pdf_maker/pdfmakerfree-for-vtigercrm.pdf'" />&nbsp;
            </td>		
        </tr>
        </table>
        
        <table border=0 cellspacing=0 cellpadding=5 width=100% class="listTable">
        <tr>
            <td width=2% class="colHeader small">#</td>
            <td width=20% class="colHeader small"><?php echo $this->_tpl_vars['MOD']['LBL_MODULENAMES']; ?>
</td>
        </tr>
        <?php $_from = $this->_tpl_vars['PDFTEMPLATES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mailmerge'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mailmerge']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['mailmerge']['iteration']++;
?>
        <tr>
            <td class="listTableRow small" valign=top><?php echo $this->_foreach['mailmerge']['iteration']; ?>
</td>
            <td class="listTableRow small" valign=top><?php echo $this->_tpl_vars['template']['module']; ?>
</a></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </table>
        </form>
    </td>
    </tr>
    <tr><td align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo $this->_tpl_vars['MOD']['PDF_MAKER']; ?>
 <?php echo $this->_tpl_vars['VERSION']; ?>
 <?php echo $this->_tpl_vars['MOD']['COPYRIGHT']; ?>
</td></tr>
    </table>

</td></tr></table>