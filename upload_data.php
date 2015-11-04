<?session_start();
//============================================================+
// File name		:	upload_data.php
// Begin				:	12/12/2556
// Last Update	:	12/02/2557
// Author			:	นายธนวุฒิ สุรินทร์
// Version			:	1.0
// Copyright (C)	:	สายงานพนักงานระบบสารสนเทศ ฝ่ายปฎิบัติการเทคโนโลยีสารสนเทศ
// Description	:	หน้าจอของ admin ใช้สำหรับปรับปรุงข้อมูลความเสี่ยง
// input				:	ไฟล์ที่ได้จากการ download มาจากระบบ CDD gateway ( จะต้องแตกไฟล์ก่อนเท่านั้น)
// output			:	ปรับปรุงข้อมูลความเสี่ยงใน database
//============================================================+
	header('Content-Type: text/html; charset=windows-874');
	include("lib/database.class.php");
	include("lib/config.inc.php");
	$obj_db = new database();
	$obj_db->connect_pep();

?>
<html>
<head>
	<title><?=$webSite['title'] ?></title>
	<?=$webSite['meta']?>
	<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">

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

<!-- ************************** Upload ข้อมูล ****************************** -->
<link href="uploadify/uploadify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="uploadify/swfobject.js"></script>
<script type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.js"></script>
<script type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<!-- ************************** END Upload  ****************************** -->
<script type="text/javascript">

	$(document).ready(function() {

		// AMLO LIST
		$('#file_upload1').uploadify({
		'uploader'  : 'uploadify/uploadify.swf',
		'script'    : 'uploadify/uploadify1.php',
		'cancelImg' : 'uploadify/cancel.png',
		'folder'    : 'uploads',				// ปลายทางที่เก็บไฟล์
		'fileDataName' : 'Filedata',		// ชื่อไฟล์ที่ทำการ  upload
		'multi'       : true,						// สามารถ upload ได้หลายไฟล์หรือไม่
		'buttonText'  : ' SELECT FILE ',	// ชื่อปุ่มที่ upload
		'fileExt'     : '*.csv; ',					// ให้แสดงเฉพาะประเภทไฟล์
		'fileDesc'    : 'CDD Watchlist',
		'removeCompleted' : false,		// หลังจาก upload เสร็จแล้วให้ลบ list หรือไม่
		'onAllComplete' : function(event, ID, fileObj, response, data) {
			alert(' file uploaded AMLO LIST successfully ');  // แสดงข้อความ
		}
		//'auto'      : true
		});
		// กดปุ่ม upload 
		$("#btn_upload1").click(function(){
			$("#file_upload1").uploadifyUpload();
		}); // end btn_upload1

		// OFAC
		$('#file_upload2').uploadify({
		'uploader'  : 'uploadify/uploadify.swf',
		'script'    : 'uploadify/uploadify2.php',
		'cancelImg' : 'uploadify/cancel.png',
		'folder'    : 'uploads',				// ปลายทางที่เก็บไฟล์
		'fileDataName' : 'Filedata',		// ชื่อไฟล์ที่ทำการ  upload
		'multi'       : true,						// สามารถ upload ได้หลายไฟล์หรือไม่
		'buttonText'  : ' SELECT FILE ',	// ชื่อปุ่มที่ upload
		'fileExt'     : '*.csv; ',					// ให้แสดงเฉพาะประเภทไฟล์
		'fileDesc'    : 'CDD Watchlist',
		'removeCompleted' : false,		// หลังจาก upload เสร็จแล้วให้ลบ list หรือไม่
		'onAllComplete' : function(event, ID, fileObj, response, data) {
			alert(' file uploaded OFAC successfully ');  // แสดงข้อความ
		}
		//'auto'      : true
		});
		// กดปุ่ม upload 
		$("#btn_upload2").click(function(){
			$("#file_upload2").uploadifyUpload();
		}); // end btn_upload1

		// UN
		$('#file_upload3').uploadify({
		'uploader'  : 'uploadify/uploadify.swf',
		'script'    : 'uploadify/uploadify3.php',
		'cancelImg' : 'uploadify/cancel.png',
		'folder'    : 'uploads',				// ปลายทางที่เก็บไฟล์
		'fileDataName' : 'Filedata',		// ชื่อไฟล์ที่ทำการ  upload
		'multi'       : true,						// สามารถ upload ได้หลายไฟล์หรือไม่
		'buttonText'  : ' SELECT FILE ',	// ชื่อปุ่มที่ upload
		'fileExt'     : '*.csv; ',					// ให้แสดงเฉพาะประเภทไฟล์
		'fileDesc'    : 'CDD Watchlist',
		'removeCompleted' : false,		// หลังจาก upload เสร็จแล้วให้ลบ list หรือไม่
		'onAllComplete' : function(event, ID, fileObj, response, data) {
			alert(' file uploaded UN successfully ');  // แสดงข้อความ
		}
		//'auto'      : true
		});
		// กดปุ่ม upload 
		$("#btn_upload3").click(function(){
			$("#file_upload3").uploadifyUpload();
		}); // end btn_upload1

		// HM
		$('#file_upload4').uploadify({
		'uploader'  : 'uploadify/uploadify.swf',
		'script'    : 'uploadify/uploadify4.php',
		'cancelImg' : 'uploadify/cancel.png',
		'folder'    : 'uploads',				// ปลายทางที่เก็บไฟล์
		'fileDataName' : 'Filedata',		// ชื่อไฟล์ที่ทำการ  upload
		'multi'       : true,						// สามารถ upload ได้หลายไฟล์หรือไม่
		'buttonText'  : ' SELECT FILE ',	// ชื่อปุ่มที่ upload
		'fileExt'     : '*.csv; ',					// ให้แสดงเฉพาะประเภทไฟล์
		'fileDesc'    : 'CDD Watchlist',
		'removeCompleted' : false,		// หลังจาก upload เสร็จแล้วให้ลบ list หรือไม่
		'onAllComplete' : function(event, ID, fileObj, response, data) {
			alert(' file uploaded HM List successfully ');  // แสดงข้อความ
		}
		//'auto'      : true
		});
		// กดปุ่ม upload 
		$("#btn_upload4").click(function(){
			$("#file_upload4").uploadifyUpload();
		}); // end btn_upload1

	}); // end document ready
</script>

</head>
<body>

<div class="container">

<!-- AMLO List -->
<div class="row" style='margin-top:5px; margin-bottom:10px;'>
	<div class="col-md-7 col-md-offset-2">
		<div class="panel-group" id="accordion1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapse1">  Upload ข้อมูล ( AMLO List ) </a></h4>
				</div>
				<div id="collapse1" class="panel-collapse collapse ">
					<div class="panel-body" style='padding:7px'>
						<input type="file" id="file_upload1" name="file_upload1" style='margin-top: 2;' />
						<button type="button" id='btn_upload1' class="btn btn-primary glyphicon glyphicon-upload" style='padding:10px' > Upload Files </button>
							<table class="table table-striped table-bordered table-hover" style='margin-top:10px'>
								<tr align='center' bgcolor='#FFB400'>
									<td> ลำดับที่ </td>
									<td> ชื่อไฟล์ </td>
									<td> ประเภท </td>
									<td> วัน-เวลา</td>
								</tr>
						<? 
							// แสดงข้อมูล ไฟล์ ที่เคย upload แล้ว AMLO List
							$sql = "
								SET DATEFORMAT dmy;
								SELECT TOP 15 [FILE_NAME] ,[FILE_LINK] ,[FILE_TYPE] , CONVERT(varchar, [DATE_TIME] , 103), CONVERT(varchar, [DATE_TIME] , 108)  FROM [tbl-upload] 
								WHERE FILE_TYPE='1' 
								ORDER BY [DATE_TIME] DESC "; 
							$obj_db->query($sql);
							$i = 0;
							WHILE($rows = $obj_db ->fetch_row()){ 
								$i++;
						?>
								<tr align='center'>
									<td><?=$i ?></td>
									<td align='left'><?=$rows['0']?></td>
									<td><?=$array_data[$rows['2']]?></td>
									<td><?=$rows['3']?> - <?=$rows['4']?></td>
								</tr>
						<? } // end while ?>
							</table>
					</div><!-- End div panel-body -->
				</div><!-- End div CollapseOne -->
			</div><!-- End div panel panel-default -->
		</div><!-- End div panel-group -->
	</div><!-- End div col-md7 offset2 -->
</div><!-- End div row -->

<!-- OFAC -->
<div class="row" style='margin-top:5px; margin-bottom:10px;'>
	<div class="col-md-7 col-md-offset-2">
		<div class="panel-group" id="accordion2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapse2">  Upload ข้อมูล ( OFAC ) </a></h4>
				</div>
				<div id="collapse2" class="panel-collapse collapse ">
					<div class="panel-body" style='padding:7px'>
						<input type="file" id="file_upload2" name="file_upload2" style='margin-top: 2;' />
						<button type="button" id='btn_upload2' class="btn btn-primary glyphicon glyphicon-upload" style='padding:10px' > Upload Files </button>
							<table class="table table-striped table-bordered table-hover" style='margin-top:10px'>
								<tr align='center' bgcolor='#FFB400'>
									<td> ลำดับที่ </td>
									<td> ชื่อไฟล์ </td>
									<td> ประเภท </td>
									<td> วัน-เวลา</td>
								</tr>
						<? 
							// แสดงข้อมูล ไฟล์ ที่เคย upload แล้ว OFAC
							$sql = "
								SET DATEFORMAT dmy;
								SELECT TOP 15 [FILE_NAME] ,[FILE_LINK] ,[FILE_TYPE] , CONVERT(varchar, [DATE_TIME] , 103), CONVERT(varchar, [DATE_TIME] , 108)  FROM [tbl-upload] 
								WHERE FILE_TYPE='2' 
								ORDER BY [DATE_TIME] DESC "; 
							$obj_db->query($sql);
							$i = 0;
							WHILE($rows = $obj_db ->fetch_row()){ 
								$i++;
						?>
								<tr align='center'>
									<td><?=$i ?></td>
									<td align='left'><?=$rows['0']?></td>
									<td><?=$array_data[$rows['2']]?></td>
									<td><?=$rows['3']?> - <?=$rows['4']?></td>
								</tr>
						<? } // end while ?>
							</table>
					</div><!-- End div panel-body -->
				</div><!-- End div CollapseOne -->
			</div><!-- End div panel panel-default -->
		</div><!-- End div panel-group -->
	</div><!-- End div col-md7 offset2 -->
</div><!-- End div row -->

<!-- UN -->
<div class="row" style='margin-top:5px; margin-bottom:10px;'>
	<div class="col-md-7 col-md-offset-2">
		<div class="panel-group" id="accordion3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapse3">  Upload ข้อมูล ( UN ) </a></h4>
				</div>
				<div id="collapse3" class="panel-collapse collapse ">
					<div class="panel-body" style='padding:7px'>
						<input type="file" id="file_upload3" name="file_upload3" style='margin-top: 2;' />
						<button type="button" id='btn_upload3' class="btn btn-primary glyphicon glyphicon-upload" style='padding:10px' > Upload Files </button>
							<table class="table table-striped table-bordered table-hover" style='margin-top:10px'>
								<tr align='center' bgcolor='#FFB400'>
									<td> ลำดับที่ </td>
									<td> ชื่อไฟล์ </td>
									<td> ประเภท </td>
									<td> วัน-เวลา</td>
								</tr>
						<? 
							// แสดงข้อมูล ไฟล์ ที่เคย upload แล้ว UN
							$sql = "
								SET DATEFORMAT dmy;
								SELECT TOP 15 [FILE_NAME] ,[FILE_LINK] ,[FILE_TYPE] , CONVERT(varchar, [DATE_TIME] , 103), CONVERT(varchar, [DATE_TIME] , 108)  FROM [tbl-upload] 
								WHERE FILE_TYPE='3'
								ORDER BY [DATE_TIME] DESC "; 
							$obj_db->query($sql);
							$i = 0;
							WHILE($rows = $obj_db ->fetch_row()){ 
								$i++;
						?>
								<tr align='center'>
									<td><?=$i ?></td>
									<td align='left'><?=$rows['0']?></td>
									<td><?=$array_data[$rows['2']]?></td>
									<td><?=$rows['3']?> - <?=$rows['4']?></td>
								</tr>
						<? } // end while ?>
							</table>
					</div><!-- End div panel-body -->
				</div><!-- End div CollapseOne -->
			</div><!-- End div panel panel-default -->
		</div><!-- End div panel-group -->
	</div><!-- End div col-md7 offset2 -->
</div><!-- End div row -->

<!-- HM -->
<div class="row" style='margin-top:5px; margin-bottom:10px;'>
	<div class="col-md-7 col-md-offset-2">
		<div class="panel-group" id="accordion4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion4" href="#collapse4">  Upload ข้อมูล ( HM ) </a></h4>
				</div>
				<div id="collapse4" class="panel-collapse collapse ">
					<div class="panel-body" style='padding:7px'>
						<input type="file" id="file_upload4" name="file_upload4" style='margin-top: 2;' />
						<button type="button" id='btn_upload4' class="btn btn-primary glyphicon glyphicon-upload" style='padding:10px' > Upload Files </button>
							<table class="table table-striped table-bordered table-hover" style='margin-top:10px'>
								<tr align='center' bgcolor='#FFB400'>
									<td> ลำดับที่ </td>
									<td> ชื่อไฟล์ </td>
									<td> ประเภท </td>
									<td> วัน-เวลา</td>
								</tr>
						<? 
							// แสดงข้อมูล ไฟล์ ที่เคย upload แล้ว HM
							$sql = "
								SET DATEFORMAT dmy;
								SELECT TOP 15 [FILE_NAME] ,[FILE_LINK] ,[FILE_TYPE] , CONVERT(varchar, [DATE_TIME] , 103), CONVERT(varchar, [DATE_TIME] , 108)  FROM [tbl-upload] 
								WHERE FILE_TYPE='4'
								ORDER BY [DATE_TIME] DESC "; 
							$obj_db->query($sql);
							$i = 0;
							WHILE($rows = $obj_db ->fetch_row()){ 
								$i++;
						?>
								<tr align='center'>
									<td><?=$i ?></td>
									<td align='left'><?=$rows['0']?></td>
									<td><?=$array_data[$rows['2']]?></td>
									<td><?=$rows['3']?> - <?=$rows['4']?></td>
								</tr>
						<? } // end while ?>
							</table>
					</div><!-- End div panel-body -->
				</div><!-- End div CollapseOne -->
			</div><!-- End div panel panel-default -->
		</div><!-- End div panel-group -->
	</div><!-- End div col-md7 offset2 -->
</div><!-- End div row -->

</div><!-- End div container -->
<?
	$obj_db->close();
?>
</body>
</html>