<?php
//============================================================+
// File name		: log_in.php
// Begin				: 26/11/2556
// Last Update	: 26/11/2556
// Author			: นายธนวุฒิ สุรินทร์
// Version			: 1.0
// Copyright (C)	: สายงานพนักงานระบบสารสนเทศ ฝ่ายปฎิบัติการเทคโนโลยีสารสนเทศ
// Description	: ใช้ตรวจสอบผู้เข้าใช้งานระบบ
// input				: username , password
// output			: type_online 1 = user / type_online 2 = admin
//============================================================+
session_cache_limiter('private, must-revalidate');
session_cache_expire(30);
session_start();
session_regenerate_id();

/*
if (!isset($_SESSION['CREATED'])) {
	$_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 1800) {
	// session started more than 30 minutes ago
	session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
	$_SESSION['CREATED'] = time();  // update creation time
}
*/

include_once("lib/config.inc.php");
include_once("lib/database.class.php");
?>
<!DOCTYPE html>
<html lang="th">
<head>
<title><?=$webSite['title'] ?></title>
<?=$webSite['meta']; ?>
<?
	$username = escapeshellcmd(trim($_POST['username']));			// username
	$password = escapeshellcmd(trim($_POST['password']));			// password

	// ตรวจสอบข้อมูล
	if($username=='admin' && $password=='secret'){
		$user_online = 'admin';
		$profile_online = '0';
		$type_online = '2';
		$brcode_online = '';
		$division_name_online = '';
		$position_level = true;
	}else{

		include("lib/database.ociclass.php");

		$Sqlnid = "SELECT a.emp_code as xxx, a.title, a.fname, a.lname, a.password, ";
		$Sqlnid = $Sqlnid . "      b.position_name, a.position_level, a.position_code, ";
		$Sqlnid = $Sqlnid . "      upper(c.division_code) as division_code, c.division_name1, c.division_name2, ";
		$Sqlnid = $Sqlnid . "      c.division_area, c.br_code, c.PROFILECODE, e.DIVCODE ";
		$Sqlnid = $Sqlnid . " FROM DB2INST1.TB_EMPLOYEE a INNER JOIN DB2INST1.TB_POSITION_CODE b ";
		$Sqlnid = $Sqlnid . "   ON a.position_code = b.position_code ";
		$Sqlnid = $Sqlnid . "INNER JOIN DB2INST1.TB_DIVISION_CODE c ";
		$Sqlnid = $Sqlnid . "   ON upper(a.division_code) = upper(c.division_code) ";
		$Sqlnid = $Sqlnid . "LEFT OUTER JOIN CBSADM.TB_BRMAPPROFILE d ";
		$Sqlnid = $Sqlnid . "   ON c.br_code = d.BRCODE ";
		$Sqlnid = $Sqlnid . "LEFT OUTER JOIN  CBSADM.TB_PROFILECODE e ";
		$Sqlnid = $Sqlnid . "   ON d.PROFILECODE = e.PROFILECODE ";
		$Sqlnid = $Sqlnid . "WHERE a.emp_code = '".$username."' ";

	//echo $Sqlnid;
		$rsnid =  oci_parse($conn,$Sqlnid);
		oci_execute($rsnid);
		$nrows = oci_fetch_all($rsnid, $results);

		$j = 0;
		$result_userlogin;  // array เก็บผลที่ได้

		if($nrows>0){

			for ($i = 0; $i < $nrows; $i++) {
				foreach ($results as $data) {
					$result_userlogin[$j] = $data[$i];
					$j++;
				} // end foreach
			} // end for
			//echo $result_userlogin['4'];
			if($result_userlogin['4']==$password){
				$user_online = trim($result_userlogin['0']);		 //0-emp_code
				$type_online = '1';											// ประเภทผู้ใช้ทั่วไป
				// ตรวจสอบว่าถ้าระดับสูงกว่า 8 ให้สามารถดูในสาขาตัวเองได้ 
				if(trim($result_userlogin['6'])>=8){
					$position_level = true;
				}else{
					$position_level = false;
				} // end if 

				$profile_online = trim($result_userlogin['13']);	// profile_code
				$brcode_online = trim($result_userlogin['12']);	// brcode
				$division_name_online = trim($result_userlogin['9']); // division_name
			}else{
				echo "<strong> รหัสผ่าน ไม่ถูกต้อง </strong>";
				echo "ใช้รหัสผ่านระบบฐานข้อมูลลูกค้ารายคน ในกรณีไม่ทราบให้เลือกเปลี่ยนรหัสผ่าน ";
				exit();
			} // end if UserPasword
		} // end if nrows>0

	} // end if  check user

	session_register("user_online");
	session_register("type_online");
	session_register("profile_online");
	session_register("brcode_online");
	session_register("position_level");
	session_register("division_name_online");

?>
</head>
	<frameset rows="55,*" frameborder="NO" border="0" framespacing="0">
		<frame src="header.php" name="topFrame" scrolling="NO" noresize >
		<frame src="search_pep.php" name="mainFrame" bgcolor='#669900'>
	</frameset>
	<noframes><body>
	ระบบไม่สามารถแสดงผลแบบ Frames ได้ กรุณาติดต่อฝ่ายคอมพิวเตอร์เพื่อปรับปรุงโปรแกรม Internet Explorer 
	</body></noframes>
</html>