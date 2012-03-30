<?php

if(is_dir("modules/PDFMaker/mpdf")) 
	require_once("modules/PDFMaker/ListPDFTemplates.php");
else 
	require_once("modules/PDFMaker/install.php");
?>