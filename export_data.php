<?session_start();
	header("Content-Type: text/html; charset=windows-874"); 
	include("lib/config.inc.php");
	include("lib/database.class.php");

	$obj_db = new database();
	$obj_db->connect_pep();

	// วัน เดือน ปี ปัจจุบัน
	$date_report = date("d")."/".date("m")."/".(date("Y")+543);

?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$webSite['title'] ?></title>
	<?=$webSite['meta']; ?>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
	<link href="css/style_calendar.css" rel="stylesheet" type="text/css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<script src="js/ie8-responsive-file-warning.js"></script>
	<![endif]-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/DT_bootstrap.js"></script>

</head>
<body>

<div class="container" >
<div class="row" style='margin-top:5px; margin-bottom:10px;'>
	<div class="col-md-9 col-md-offset-1">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Export ข้อมูล </a></h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body" style='padding:7px'>

						<form id="myForm" action='create_data.php' method='post'>
							<table width='100%' border='0' >
								<tr>
									<td align='right'> รูปแบบ &nbsp;&nbsp;</td>
									<td><input type='radio' name='rd' value='1' checked> Windows <input type='radio' name='rd' value='2' > Unix</td>
								</tr>
								<tr>
									<td align='right' width='100'><input type="checkbox" name="bck1" value='1'>&nbsp;&nbsp;</td>
									<td> ข้อมูล<font color='red'><u>บุคคลธรรมดา</u></font>ที่มีความเสี่ยงสูง &nbsp;( KYC_RSKP_{YYYYMMDD}.TXT ) </td>
								</tr>
								<tr>
									<td align='right'><input type="checkbox" name="bck2" value='1'>&nbsp;&nbsp;</td>
									<td> ข้อมูล<font color='red'><u>นิติบุคคล</u></font>ที่มีความเสี่ยงสูง &nbsp;( KYC_RSKC_{YYYYMMDD}.TXT ) </td>
								</tr>
								<tr height='50px'>
									<td>&nbsp;</td>
									<td><button type="submit" class="btn btn-primary glyphicon glyphicon-file" style='padding:10px' > Download ข้อมูล</button></td>
								</tr>
							</table>
						</form><!-- END forn -->

					</div><!-- End div panel-body -->
				</div><!-- End div CollapseOne -->
			</div><!-- End div panel panel-default -->
		</div><!-- End div panel-group -->
	</div><!-- End div col-md9 offset1 -->
</div><!-- End div row -->

</div><!-- End div container -->
<br>

</body>
</html>