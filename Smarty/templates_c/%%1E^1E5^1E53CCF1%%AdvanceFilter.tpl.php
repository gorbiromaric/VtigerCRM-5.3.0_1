<?php /* Smarty version 2.6.18, created on 2012-03-28 15:19:05
         compiled from AdvanceFilter.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'parse_calendardate', 'AdvanceFilter.tpl', 13, false),array('modifier', 'getTranslatedString', 'AdvanceFilter.tpl', 27, false),array('modifier', 'vtiger_imageurl', 'AdvanceFilter.tpl', 186, false),)), $this); ?>
<!--*+********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *********************************************************************************/
-->
<script src="include/js/json.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="include/js/advancefilter.js"></script>
<?php if ($this->_tpl_vars['JS_DATEFORMAT'] == ''): ?>
	<?php $this->assign('JS_DATEFORMAT', parse_calendardate($this->_tpl_vars['APP']['NTC_DATE_FORMAT'])); ?>
<?php endif; ?>
<input type="hidden" id="jscal_dateformat" name="jscal_dateformat" value="<?php echo $this->_tpl_vars['JS_DATEFORMAT']; ?>
" />
<input type="hidden" id="image_path" name="image_path" value="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
" />
<input type="hidden" name="advft_criteria" id="advft_criteria" value="" />
<input type="hidden" name="advft_criteria_groups" id="advft_criteria_groups" value="" />

<script language="JavaScript" type="text/JavaScript"> 
function addColumnConditionGlue(columnIndex) {

	var columnConditionGlueElement = document.getElementById('columnconditionglue_'+columnIndex);
	
	if(columnConditionGlueElement) {		
		columnConditionGlueElement.innerHTML = "<select name='fcon"+columnIndex+"' id='fcon"+columnIndex+"' class='detailedViewTextBox'>"+
													"<option value='and'><?php echo getTranslatedString('LBL_CRITERIA_AND', $this->_tpl_vars['MODULE']); ?>
</option>"+
													"<option value='or'><?php echo getTranslatedString('LBL_CRITERIA_OR', $this->_tpl_vars['MODULE']); ?>
</option>"+
												"</select>";
	}
}

function addConditionRow(groupIndex) {
		
	var groupColumns = column_index_array[groupIndex];
	if(typeof(groupColumns) != 'undefined') { 		
		for(var i=groupColumns.length - 1; i>=0; --i) {
			var prevColumnIndex = groupColumns[i];
			if(document.getElementById('conditioncolumn_'+groupIndex+'_'+prevColumnIndex)) {
				addColumnConditionGlue(prevColumnIndex);
				break;
			}
		}
	}
	
	var columnIndex = advft_column_index_count+1;
	var nextNode = document.getElementById('groupfooter_'+groupIndex);
	
	var newNode = document.createElement('tr');
	newNodeId = 'conditioncolumn_'+groupIndex+'_'+columnIndex;
  	newNode.setAttribute('id',newNodeId);
  	newNode.setAttribute('name','conditionColumn');
	nextNode.parentNode.insertBefore(newNode, nextNode);
	
	node1 = document.createElement('td');
	node1.setAttribute('class', 'dvtCellLabel');
	node1.setAttribute('width', '25%');
	newNode.appendChild(node1);
	<?php if ($this->_tpl_vars['SOURCE'] == 'reports'): ?>
		node1.innerHTML = '<select name="fcol'+columnIndex+'" id="fcol'+columnIndex+'" onchange="updatefOptions(this, \'fop'+columnIndex+'\');addRequiredElements('+columnIndex+');updateRelFieldOptions(this, \'fval_'+columnIndex+'\');" class="detailedViewTextBox">'+
							'<option value=""><?php echo getTranslatedString('LBL_NONE', $this->_tpl_vars['MODULE']); ?>
</option>'+
	        				'<?php echo $this->_tpl_vars['COLUMNS_BLOCK']; ?>
'+
						'</select>';
	<?php else: ?>
		node1.innerHTML = "<select name='fcol"+columnIndex+"' id='fcol"+columnIndex+"' onchange='updatefOptions(this, \"fop"+columnIndex+"\");addRequiredElements("+columnIndex+");' class='detailedViewTextBox'>"+
							"<option value=''><?php echo getTranslatedString('LBL_NONE', $this->_tpl_vars['MODULE']); ?>
</option>"+
	        				"<?php echo $this->_tpl_vars['COLUMNS_BLOCK']; ?>
"+
						"</select>";
	<?php endif; ?>
	node2 = document.createElement('td');
	node2.setAttribute('class', 'dvtCellLabel');
	node2.setAttribute('width', '25%');
	newNode.appendChild(node2);
	node2.innerHTML = '<select name="fop'+columnIndex+'" id="fop'+columnIndex+'" class="repBox" style="width:100px;" onchange="addRequiredElements('+columnIndex+');">'+
							'<option value=""><?php echo getTranslatedString('LBL_NONE', $this->_tpl_vars['MODULE']); ?>
</option>'+
							'<?php echo $this->_tpl_vars['FOPTION']; ?>
'+
						'</select>';
	
	node3 = document.createElement('td');
	node3.setAttribute('class', 'dvtCellLabel');
	newNode.appendChild(node3);
	<?php if ($this->_tpl_vars['SOURCE'] == 'reports'): ?>
		node3.innerHTML = '<input name="fval'+columnIndex+'" id="fval'+columnIndex+'" class="repBox" type="text" value="">'+
						'<img height=20 width=20 align="absmiddle" style="cursor: pointer;" title="<?php echo $this->_tpl_vars['APP']['LBL_FIELD_FOR_COMPARISION']; ?>
" alt="<?php echo $this->_tpl_vars['APP']['LBL_FIELD_FOR_COMPARISION']; ?>
" src="themes/images/terms.gif" onClick="hideAllElementsByName(\'relFieldsPopupDiv\'); fnvshobj(this,\'show_val'+columnIndex+'\');"/>'+
						'<input type="image" align="absmiddle" style="cursor: pointer;" onclick="document.getElementById(\'fval'+columnIndex+'\').value=\'\';return false;" language="javascript" title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR']; ?>
" alt="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR']; ?>
" src="themes/images/clear_field.gif"/>'+
						'<div class="layerPopup" id="show_val'+columnIndex+'" name="relFieldsPopupDiv" style="border:0; position: absolute; width:300px; z-index: 50; display: none;">'+
							'<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" class="mailClient mailClientBg">'+
								'<tr>'+
									'<td>'+
										'<table width="100%" cellspacing="0" cellpadding="0" border="0" class="layerHeadingULine">'+
											'<tr background="themes/images/qcBg.gif" class="mailSubHeader">'+
												'<td width=90% class="genHeaderSmall"><b><?php echo $this->_tpl_vars['MOD']['LBL_SELECT_FIELDS']; ?>
</b></td>'+
												'<td align=right>'+
													'<img border="0" align="absmiddle" src="themes/images/close.gif" style="cursor: pointer;" alt="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE']; ?>
" title="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE']; ?>
" onclick="hideAllElementsByName(\'relFieldsPopupDiv\');"/>'+
												'</td>'+
											'</tr>'+
										'</table>'+
							
										'<table width="100%" cellspacing="0" cellpadding="0" border="0" class="small">'+
											'<tr>'+
												'<td>'+
													'<table width="100%" cellspacing="0" cellpadding="5" border="0" bgcolor="white" class="small">'+
														'<tr>'+
															'<td width="30%" align="left" class="cellLabel small"><?php echo $this->_tpl_vars['MOD']['LBL_RELATED_FIELDS']; ?>
</td>'+
															'<td width="30%" align="left" class="cellText">'+
																'<select name="fval_'+columnIndex+'" id="fval_'+columnIndex+'" onChange="AddFieldToFilter('+columnIndex+',this);" class="detailedViewTextBox">'+
																	'<option value=""><?php echo $this->_tpl_vars['MOD']['LBL_NONE']; ?>
</option>'+
													        		'<?php echo $this->_tpl_vars['REL_FIELDS']; ?>
'+
												        		'</select>'+
															'</td>'+
														'</tr>'+
													'</table>'+	
													'<!-- save cancel buttons -->'+
													'<table width="100%" cellspacing="0" cellpadding="5" border="0" class="layerPopupTransport">'+
														'<tr>'+
															'<td width="50%" align="center">'+
																'<input type="button" style="width: 70px;" value="<?php echo $this->_tpl_vars['APP']['LBL_DONE']; ?>
" name="button" onclick="hideAllElementsByName(\'relFieldsPopupDiv\');" class="crmbutton small create" accesskey="X" title="<?php echo $this->_tpl_vars['APP']['LBL_DONE']; ?>
"/>'+
															'</td>'+
														'</tr>'+
													'</table>'+	
												'</td>'+
											'</tr>'+
										'</table>'+
									'</td>'+
								'</tr>'+
							'</table>'+
						'</div>';
	<?php else: ?>
		node3.innerHTML = '<input name="fval'+columnIndex+'" id="fval'+columnIndex+'" class="repBox" type="text" value="">'+
						'<input type="image" align="absmiddle" style="cursor: pointer;" onclick="document.getElementById(\'fval'+columnIndex+'\').value=\'\';return false;" language="javascript" title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR']; ?>
" alt="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR']; ?>
" src="themes/images/clear_field.gif"/>';
	<?php endif; ?>
	
	node4 = document.createElement('td');
	node4.setAttribute('class', 'dvtCellLabel');
	node4.setAttribute('id', 'columnconditionglue_'+columnIndex);
	node4.setAttribute('width', '60px');
	newNode.appendChild(node4);
	
	node5 = document.createElement('td');
	node5.setAttribute('class', 'dvtCellLabel');
	node5.setAttribute('width', '30px');
	newNode.appendChild(node5);
	node5.innerHTML = '<a onclick="deleteColumnRow('+groupIndex+','+columnIndex+');" href="javascript:;">'+
							'<img src="themes/images/delete.gif" align="absmiddle" title="<?php echo $this->_tpl_vars['MOD']['LBL_DELETE']; ?>
..." border="0">'+
						'</a>';
	
	if(document.getElementById('fcol'+columnIndex)) updatefOptions(document.getElementById('fcol'+columnIndex), 'fop'+columnIndex);
	if(typeof(column_index_array[groupIndex]) == 'undefined') column_index_array[groupIndex] = [];
	column_index_array[groupIndex].push(columnIndex);
	advft_column_index_count++;

}

function addGroupConditionGlue(groupIndex) {
	
	var groupConditionGlueElement = document.getElementById('groupconditionglue_'+groupIndex);
	if(groupConditionGlueElement) {
		groupConditionGlueElement.innerHTML = "<select name='gpcon"+groupIndex+"' id='gpcon"+groupIndex+"' class='small'>"+
												"<option value='and'><?php echo getTranslatedString('LBL_CRITERIA_AND', $this->_tpl_vars['MODULE']); ?>
</option>"+
												"<option value='or'><?php echo getTranslatedString('LBL_CRITERIA_OR', $this->_tpl_vars['MODULE']); ?>
</option>"+
											"</select>";
	}
}

function addConditionGroup(parentNodeId) {
	
	for(var i=group_index_array.length - 1; i>=0; --i) {
		var prevGroupIndex = group_index_array[i];
		if(document.getElementById('conditiongroup_'+prevGroupIndex)) {
			addGroupConditionGlue(prevGroupIndex);
			break;
		}
	}
	
	var groupIndex = advft_group_index_count+1;
	var parentNode = document.getElementById(parentNodeId);	
	
	var newNode = document.createElement('div');
	newNodeId = 'conditiongroup_'+groupIndex;
  	newNode.setAttribute('id',newNodeId);
  	newNode.setAttribute('name','conditionGroup');
  	
  	newNode.innerHTML = "<table class='small crmTable' border='0' cellpadding='5' cellspacing='1' width='100%' valign='top' id='conditiongrouptable_"+groupIndex+"'>"+
							"<tr id='groupheader_"+groupIndex+"'>"+
								"<td colspan='5' align='right'>"+
									"<a href='javascript:void(0);' onclick='deleteGroup(\""+groupIndex+"\");'><img border=0 src=<?php echo vtiger_imageurl('close.gif', $this->_tpl_vars['THEME']); ?>
 alt='<?php echo $this->_tpl_vars['APP']['LBL_DELETE_GROUP']; ?>
' title='<?php echo $this->_tpl_vars['APP']['LBL_DELETE_GROUP']; ?>
'/></a>"+
								"</td>"+
							"</tr>"+
							"<tr id='groupfooter_"+groupIndex+"'>"+
								"<td colspan='5' align='left'>"+
									"<input type='button' class='crmbutton edit small' value='<?php echo $this->_tpl_vars['APP']['LBL_NEW_CONDITION']; ?>
' onclick='addConditionRow(\""+groupIndex+"\")' />"+
								"</td>"+
							"</tr>"+
						"</table>"+
						"<table class='small' border='0' cellpadding='5' cellspacing='1' width='100%' valign='top'>"+
							"<tr><td align='center' id='groupconditionglue_"+groupIndex+"'>"+
							"</td></tr>"+
						"</table>";

	parentNode.appendChild(newNode);
	
	group_index_array.push(groupIndex);
	advft_group_index_count++;
}
</script>

<div style="overflow:auto;" id='adv_filter_div' name='adv_filter_div'>
	<table class="small" border="0" cellpadding="5" cellspacing="0" width="100%">
		<tr>
			<td class="detailedViewHeader"><b><?php echo getTranslatedString('LBL_ADVANCED_FILTER', $this->_tpl_vars['MODULE']); ?>
</b></td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input type="button" class="crmbutton create small" value="<?php echo getTranslatedString('LBL_NEW_GROUP', $this->_tpl_vars['MODULE']); ?>
" onclick="addNewConditionGroup('adv_filter_div')" />
			</td>
		</tr>
	</table>
	<?php $_from = $this->_tpl_vars['CRITERIA_GROUPS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['GROUP_ID'] => $this->_tpl_vars['GROUP_CRITERIA']):
?>
		<?php $this->assign('GROUP_COLUMNS', $this->_tpl_vars['GROUP_CRITERIA']['columns']); ?>
		<script type="text/javascript">
			addConditionGroup('adv_filter_div');
		</script>
		<?php $_from = $this->_tpl_vars['GROUP_COLUMNS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['COLUMN_INDEX'] => $this->_tpl_vars['COLUMN_CRITERIA']):
?>
		<script type="text/javascript">
			addConditionRow('<?php echo $this->_tpl_vars['GROUP_ID']; ?>
');
			var conditionColumnRowElement = document.getElementById('fcol'+advft_column_index_count);
			conditionColumnRowElement.value = '<?php echo $this->_tpl_vars['COLUMN_CRITERIA']['columnname']; ?>
';
			updatefOptions(conditionColumnRowElement, 'fop'+advft_column_index_count);
			document.getElementById('fop'+advft_column_index_count).value = '<?php echo $this->_tpl_vars['COLUMN_CRITERIA']['comparator']; ?>
';
			addRequiredElements(advft_column_index_count);
			<?php if ($this->_tpl_vars['SOURCE'] == 'reports'): ?>
				updateRelFieldOptions(conditionColumnRowElement, 'fval_'+advft_column_index_count);
			<?php endif; ?>
			
			var columnvalue = "<?php echo $this->_tpl_vars['COLUMN_CRITERIA']['value']; ?>
";
			if('<?php echo $this->_tpl_vars['COLUMN_CRITERIA']['comparator']; ?>
' == 'bw' && columnvalue != '') {
				var values = columnvalue.split(",");
				document.getElementById('fval'+advft_column_index_count).value = values[0];
				if(values.length == 2 && document.getElementById('fval_ext'+advft_column_index_count))
					document.getElementById('fval_ext'+advft_column_index_count).value = values[1];
			} else {
				document.getElementById('fval'+advft_column_index_count).value = columnvalue;
			}
		</script>
		<?php endforeach; endif; unset($_from); ?>
		<?php $_from = $this->_tpl_vars['GROUP_COLUMNS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['COLUMN_INDEX'] => $this->_tpl_vars['COLUMN_CRITERIA']):
?>
		<script type="text/javascript">				
			if(document.getElementById('fcon<?php echo $this->_tpl_vars['COLUMN_INDEX']; ?>
')) document.getElementById('fcon<?php echo $this->_tpl_vars['COLUMN_INDEX']; ?>
').value = '<?php echo $this->_tpl_vars['COLUMN_CRITERIA']['column_condition']; ?>
';
		</script>
		<?php endforeach; endif; unset($_from); ?>
	<?php endforeach; else: ?>
	<script type="text/javascript">
		addNewConditionGroup('adv_filter_div');
	</script>
	<?php endif; unset($_from); ?>
	<?php $_from = $this->_tpl_vars['CRITERIA_GROUPS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['GROUP_ID'] => $this->_tpl_vars['GROUP_CRITERIA']):
?>
	<script type="text/javascript">
		if(document.getElementById('gpcon<?php echo $this->_tpl_vars['GROUP_ID']; ?>
')) document.getElementById('gpcon<?php echo $this->_tpl_vars['GROUP_ID']; ?>
').value = '<?php echo $this->_tpl_vars['GROUP_CRITERIA']['condition']; ?>
';
	</script>
	<?php endforeach; endif; unset($_from); ?>
</div>