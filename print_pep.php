<?session_start();
	header( "Content-Type: text/html; charset=windows-874" ); 
	include("lib/config.inc.php");
	include("lib/database.class.php");
	date_default_timezone_set('Asia/Bangkok');

	$obj_db = new database();
	$obj_db->connect_pep();
	$ENTITY_ID = $_GET['ENTITY_ID'];																								// รหัส entity

	// ข้อมูลพื้นฐาน 
	$sql = " SELECT ENTITY_ID,ENTITY_TYPE,INFO_SOURCE,ACTIVE_STATUS,GENDER,
					DATE_OF_BIRTH,DATE_OF_DEATH,EXISTING_STATUS,PROFILE_NOTES, BIRTH_PLACE
				FROM [tbl-master] 
				WHERE ENTITY_ID='".$ENTITY_ID."' ";
	$obj_db->query($sql);

	$Entity_type = $obj_db->result("ENTITY_TYPE");
	$Info_source = $obj_db->result("INFO_SOURCE");
	$Active_status = $obj_db->result("ACTIVE_STATUS");
	$Gender = $obj_db->result("GENDER");
	$Date_of_birth= $obj_db->result("DATE_OF_BIRTH");
	$Date_of_death= $obj_db->result("DATE_OF_DEATH");
	$Existing_status= $obj_db->result("EXISTING_STATUS");
	$Profile_notes= $obj_db->result("PROFILE_NOTES");
	$Birth_place= $obj_db->result("BIRTH_PLACE");

?>
<!doctype html>
<head>
	<TITLE><?=$webSite['title'] ?></TITLE>
	<?=$webSite['meta'] ?>
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
	<style>
	
	table.print {
		/*border-collapse: collapse;*/
		border-spacing: 0;
		margin-top:10px;
		margin-bottom: 10px;
		margin-left: auto;
		margin-right: auto;
		text-align:left;
		padding:2px;
	}

	table.print td{
		border:1px solid #FFFFFF;
		height:20px;
		font-size: 1.05em;
	}
	</style>
</head>
<body>

<table width='900' border='1' align='center' class='print'>
	<tr>
		<td rowspan='3' width='25%'><strong> CDD Filtering Information </strong></td>
		<td rowspan='3' width='55%'>&nbsp;</td>
		<td width='20%'><strong> วันที่พิมพ์ </strong>: <?=date('d-m-Y') ?></td>
	</tr>
	<tr>
		<td><strong> เวลาพิมพ์ </strong>: <?=date('H:i:s') ?></td>
	</tr>
	<tr>
		<td><strong> พิมพ์โดย </strong>: <?=$user_online ?></td>
	</tr>
	<tr><td colspan='3'><hr></td></tr>
	<tr>
		<td colspan='3'><strong>หมายเลขประจำตัว </strong><?=$ENTITY_ID ?> &nbsp;&nbsp; <strong>ประเภทของข้อมูล </strong><?=$Entity_type ?> &nbsp;&nbsp; <strong>ชนิดของข้อมูล </strong><?=$Info_source ?> &nbsp;&nbsp; <strong>สถานะใช้งานล่าสุด </strong><?=$Active_status ?></td>
	</tr>
	<tr><td colspan='3'><hr></td></tr>
	<tr>
		<td><strong> ข้อมูลทั่วไป </strong></td>
	</tr>
	<tr>
		<td><strong> เพศ/บริษัท </strong></td>
		<td><?=$Gender ?></td>
	</tr>
	<tr>
		<td><strong> สถานะปัจจุบัน </strong></td>
		<td><? if($Date_of_death<>''){ echo " Alive "; } ?></td>
	</tr>
	<tr>
		<td><strong> สถานที่เกิด </strong></td>
		<td><?=$Birth_place ?></td>
	</tr>
	<tr>
		<td><strong> วัน เดือน ปีเกิด </strong></td>
		<td><?=$Date_of_birth ?></td>
	</tr>
	<tr>
		<td><strong> ผู้ตาย </strong></td>
		<td></td>
	</tr>
	<tr>
		<td><strong> วันที่เสียชีวิต </strong></td>
		<td><?=$Date_of_death ?></td>
	</tr>
	<tr>
		<td><strong> หมายเหตุข้อมูลโดยรวม </strong></td>
		<td><?=$Profile_notes?></td>
	</tr>
	<tr>
		<td><strong> ชื่อ </strong></td>
	</tr>
	<?
		// แสดงข้อมูลชื่อทั้งหมด 
		$sql = " SELECT tn.NAME_TYPE, tn.FIRST_NAME ,tn.MIDDLE_NAME ,tn.SURNAME ,tn.SUFFIX ,tn.ENGLISH_NAME ,tn.SINGLE_STRING_NAME ,tn.ORIGINAL_SCRIPT_NAME
					FROM [tbl-name] AS tn
					WHERE tn.ENTITY_ID='".$ENTITY_ID."' ";
		$obj_db->query($sql);
	?>
	<tr>
		<td colspan='3' align='center'>
			<?
				if($obj_db->num_rows()==0){
					echo "** No Record Found... ";
				}else{
			?>
				<table width='99%' border='1' align='center'>
				<tr align='center' bgcolor='#cfcfcf'>
					<td>ประเภทของชื่อ</td>
					<td>ชื่อแรก</td>
					<td>ชื่อรอง</td>
					<td>นามสกุล</td>
					<td>คำนำหน้าชื่อ/ยศ</td>
					<td>ชื่อภาษาอังกฤษ</td>
					<td>ชื่ออักขระ</td>
					<td>ชื้อสตริปต์เดิม</td>
				</tr>
			<?
					WHILE($rows = $obj_db ->fetch_row()){ 
			?>
				<tr>
					<td><?=trim($rows['0']) ?></td>
					<td><?=trim($rows['1']) ?></td>
					<td><?=trim($rows['2']) ?></td>
					<td><?=trim($rows['3']) ?></td>
					<td><?=trim($rows['4']) ?></td>
					<td><?=trim($rows['5']) ?></td>
					<td><?=trim($rows['6']) ?></td>
					<td><?=trim($rows['7']) ?></td>
				</tr>
			<? } // end while ?>
				</table>
			<?
				} // end if 
			?>
		</td>
	</tr>
	<tr>
		<td><strong> ข้อมูลการเกิด </strong></td>
	</tr>
	<?
		// แสดงข้อมูลการเกิด
		$sql = " SELECT tb.BIRTHINFO_DATE ,tb.BIRTHINFO_PLACE ,tb.BIRTHINFO_COUNTRY 
					FROM [tbl-birthinfo] as tb
					WHERE tb.ENTITY_ID='".$ENTITY_ID."' ";
		$obj_db->query($sql);

	?>
	<tr>
		<td colspan='3' align='center'>
		<?
				if($obj_db->num_rows()==0){
					echo "** No Record Found... ";
				}else{
		?>
			<table width='99%' border='1' align='center'>
			<tr align='center' bgcolor='#cfcfcf'>
				<td>เลขที่</td>
				<td>ประเภทข้อมูล</td>
				<td>รายการขาเข้า</td>
				<td>ว ด ป เกิด</td>
				<td>สถานที่เกิด</td>
				<td>ประเทศ</td>
			</tr>
		<?
				$i = 0;
				WHILE($rows = $obj_db ->fetch_row()){ 
					$i++;
		?>
			<tr>
				<td><?=$i ?></td>
				<td><?=trim($rows['0']) ?></td>
				<td><?=trim($rows['1']) ?></td>
				<td><?=trim($rows['2']) ?></td>
				<td><?=trim($rows['3']) ?></td>
				<td><?=trim($rows['4']) ?></td>
			</tr>
		<? } // end while ?>
			</table>
		<?
			} // end if 
		?>
		</td>
	</tr>
	<tr>
		<td><strong> หมายเลขประจำตัว </strong></td>
	</tr>
	<?
		// แสดงข้อมูลเลขประจำตัว
		$sql = " SELECT td.ID_TYPE ,td.ID_VALUE ,td.ID_ISSUEDATE ,td.ID_EXPIRYDATE ,td.ID_COUNTRY ,td.ID_ADDN_REF 
					FROM [tbl-idnumber] AS td 
					WHERE td.ENTITY_ID='".$ENTITY_ID."' ";
		$obj_db->query($sql);
	?>
	<tr>
		<td colspan='3' align='center'>
		<?
				if($obj_db->num_rows()==0){
					echo "** No Record Found... ";
				}else{
		?>
			<table width='99%' border='1' align='center'>
			<tr align='center' bgcolor='#cfcfcf'>
				<td>เลขที่</td>
				<td>ประเภทรหัส</td>
				<td>หมายเลขประตัว/อ้างอิง</td>
				<td>ว/ด/ป ออกให้</td>
				<td>ว/ด/ป หมดอายุ</td>
				<td>ออกให้โดยประเทศ</td>
				<td>ข้อมูลเพิ่มเติม</td>
			</tr>
		<?
				$i = 0;
				WHILE($rows = $obj_db ->fetch_row()){ 
					$i++;
		?>
			<tr>
				<td><?=$i ?></td>
				<td><?=trim($rows['0']) ?></td>
				<td><?=trim($rows['1']) ?></td>
				<td><?=trim($rows['2']) ?></td>
				<td><?=trim($rows['3']) ?></td>
				<td><?=trim($rows['4']) ?></td>
				<td><?=trim($rows['5']) ?></td>
			</tr>
		<? } // end while ?>
			</table>
		<?
			} // end if 
		?>
		</td>
	</tr>
	<tr>
		<td><strong> ความสัมพันธ์ </strong></td>
	</tr>
	<?
		// แสดงความสัมพันธ์
		$sql = " SELECT tr.ASSOCIATE_ENTITY, tr.RELATIONSHIP_TYPE, tr.EX_RELATIONSHIP 
					FROM [tbl-relationship] AS tr
					WHERE tr.ENTITY_ID='".$ENTITY_ID."' ";
		$obj_db->query($sql);
	?>
	<tr>
		<td colspan='3' align='center'>
		<?
			if($obj_db->num_rows()==0){
				echo "** No Record Found... ";
			}else{
				echo " Yes.. ";
			} // end if 
		?>
		</td>
	</tr>
	<tr>
		<td><strong> รูปภาพ </strong></td>
	</tr>
	<tr>
		<td colspan='3' align='center'> ** No Record Found... </td>
	</tr>
	<tr>
		<td><strong> ที่มาของข้อมูล </strong></td>
	</tr>
	<tr>
		<td colspan='3' align='center'>
		<?
			if($obj_db->num_rows()==0){
				echo "** No Record Found... ";
			}else{
				echo " Yes.. ";
			} // end if 
		?>
		</td>
	</tr>
	<tr>
		<td><strong> พาหนะ </strong></td>
	</tr>
	<?
		 // แสดงข้อมูล พาหนะ
		$sql = " SELECT tv.VESSEL_CALL_SIGN, tv.VESSEL_TONNAGE, tv.VESSEL_GRT, tv.VESSEL_OWNER
					FROM [tbl-vessel] AS tv
					WHERE tv.ENTITY_ID='".$ENTITY_ID."' ";
		$obj_db->query($sql);
	?>
	<tr>
		<td colspan='3' align='center'>
			<?
				if($obj_db->num_rows()==0){
					echo "** No Record Found... ";
				}else{
					echo " Yes.. ";
				} // end if 
			?>
		</td>
	</tr>
	<tr>
		<td><strong> รายงานธุรกรรมที่มีเหตุอันควรสงสัย </strong></td>
	</tr>
	<tr>
		<td colspan='3' align='center'>
		<?
			if($obj_db->num_rows()==0){
				echo "** No Record Found... ";
			}else{
				echo " Yes.. ";
			} // end if 
		?>
		</td>
	</tr>
	<tr>
		<td colspan='3' align='center'><hr></td>
	</tr>
	<tr>
		<td colspan='3' align='center'><strong> Confidental </strong></td>
	</tr>
	<tr>
		<td colspan='3' align='center'>This infomation is strictly confidential, in relation to the observance of the anti-money laundering laws. It is not, under any circumstances, to be shared with any other person, unless in the conduct of dutites or in abiding by the laws, or without prior express permission of the Anti-Money Laundering Office, Thailand.</td>
	</tr>
	<tr>
		<td colspan='3' align='center'>&nbsp;</td>
	</tr>
</table>
<br>
<center><button type="button" class='print_none' style='padding:10px' onclick=" window.print() " > พิมพ์รายงาน </button>
</center>
<br>
</body>
</html>