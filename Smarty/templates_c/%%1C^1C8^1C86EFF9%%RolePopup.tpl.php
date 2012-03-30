<?php /* Smarty version 2.6.18, created on 2012-03-28 16:47:13
         compiled from RolePopup.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<style type="text/css">@import url("themes/<?php echo $this->_tpl_vars['THEME']; ?>
/style.css");</style>
<style type="text/css">
	a.x {
		color:black;
		text-align:center;
		text-decoration:none;
		padding:5px;
		font-weight:bold;
	}
	
	a.x:hover {
		color:#333333;
		text-decoration:underline;
		font-weight:bold;
	}

	li {
		background:transparent;
		padding:0px;
		margin:0px 0px 0px 0px;
	}

	ul li{
		margin-top:5px;
		margin-left:5px;
	}

	ul {color:black;}	 

</style>
<script type="text/javascript" src="include/js/general.js"></script>
</head>
<body marginheight="0" marginwidth="0" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0">
<table width="640" border="0" cellspacing="0" cellpadding="0" class="mailClient mailClientBg">
	<tr>
			<td>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td class="moduleName" width="80%" style="padding-left:10px;"><?php echo $this->_tpl_vars['CMOD']['LBL_ASSIGN_ROLE']; ?>
</td>
					<td  width=30% nowrap class="componentName" align=right><?php echo $this->_tpl_vars['APP']['VTIGER']; ?>
</td>
				</tr>
			</table>
			</td>
  </tr>
    </tr>
   <tr>
	    <td style="padding:10px;" valign="top" class="hdrNameBg small">
			<table cellspacing="0" cellpadding="0" style="width:100%;" class="small">
          <tr>
            <td valign="top" align="center">
                <div id="role_popup" >
							<?php echo $this->_tpl_vars['ROLETREE']; ?>

				</div>
                <!-- END OF TREE MENU -->
            </td>
          </tr>
        </table></td>
  </tr>
  <tr>
    <td align="center" style="padding:10px;" class="reportCreateBottom" >&nbsp;</td>
  </tr>
</table>
<script>
function showhide(argg,imgId)
{
	var harray=argg.split(",");
	var harrlen = harray.length;
	var i;
	for(i=0; i<harrlen; i++)
	{
        	var x=document.getElementById(harray[i]).style;
        	if (x.display=="none")
        	{
            		x.display="block";
					document.all[imgId].src = "themes/images/minus.gif";
        	}
        	else
			{
            			x.display="none";
						document.all[imgId].src = "themes/images/plus.gif";
            }
	}
}

function loadValue(currObj,roleid)
{
		window.opener.document.getElementById('role_name').value = convert_lt_gt(document.getElementById(currObj).innerHTML);
		window.opener.document.getElementById('user_role').value = roleid;
		window.close();
}
function convert_lt_gt(str)
{
	str = str.replace(/(&lt;)/g,'<');
	str = str.replace(/(&gt;)/g,'>');
	str = str.replace(/(&amp;)/g,'&');
	return str;
}		
</script>
</body>
</html>