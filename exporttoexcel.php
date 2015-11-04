<?php  
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=export.xls");
header("Content-Transfer-Encoding: binary ");
?>
<meta http-equiv='Content-Type' content='text/html; charset=windows-874'>
<?
	echo strip_tags($_POST['tableData'],'<table><th><tr><td>');  
?>