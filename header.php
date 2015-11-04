<?session_start();
	include("lib/config.inc.php");
?>
<!DOCTYPE html>
<HEAD>
<TITLE><?=$webSite['title'] ?></TITLE>
<?=$webSite['meta']; ?>
<script language="JavaScript">
	status="<?=$webSite['copyright'] ?>";
</script> 
<link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<!-- TOP BAR -->
	<div id="top-bar">
		<div class="page-full-width cf">
			<ul id="nav" class="fl">
				<li class="v-sep"><span class="round button dark menu-user image-left">Logged in as <strong><?=$user_online ?></strong></span></li>
				<li><a href="search_pep.php" target='mainFrame' class="round button dark ic-search image-left"> ค้นหาข้อมูล </a></li>
				<li><a href="report_log.php" target='mainFrame' class="round button dark ic-print image-left"> รายงานผลการค้นหา </a></li>
		<?		if($type_online=='2'){  // กรณีที่เป็น admin		?>
				<li><a href="upload_data.php" target='mainFrame' class="round button dark ic-upload image-left"> upload ข้อมูล </a></li>
				<li><a href="export_data.php" target='mainFrame' class="round button dark ic-download image-left "> export ข้อมูล </a></li>
		<?		} // end if ?>
				<li><a href="Log_out.php" class="round button dark ic-power image-left">Log out</a></li>
			</ul> <!-- end nav -->
		</div> <!-- end full-width -->	
	</div> <!-- end top-bar -->
</body>
</html>