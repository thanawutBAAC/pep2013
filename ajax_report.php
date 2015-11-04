<?session_start();
	ob_start();
	header( "Content-Type: text/html; charset=windows-874" ); 
	header( "Expires: Sat, 1 Jan 1979 00:00:00 GMT" );
	header( "Last-Modified: ".gmdate( "D, d M Y H:i:s" )."GMT" );
	header( "Cache-Control: no-cache, must-revalidate" );
	header( "Pragma: no-cache" );
	include("lib/config.inc.php");
	include("lib/database.class.php");
	include("lib/function_pep.php");

	$obj_db = new database();
	$obj_db->connect_pep();

	$number_ref = trim($_POST['number_ref']);			// เลขที่อ้างอิงระบบ
	$slt_type = $_POST['slt_type'];								// ประเภทข้อมูลความเสี่ยง  0 = all
	$slt_result = $_POST['slt_result'];							// ผลการค้นหา 1 = พบ / 0 = ไม่พบ / all = ทั้งหมด
	$date_start = trim($_POST['date_start']);				// วันที่เริ่มต้น
	$date_stop = trim($_POST['date_stop']);				// วันที่สิ้นสุด
	$rd_type = $_POST['rd_type'];								// ประเภทที่เลือกให้ค้น 1 แสดงทั้งหมด 2 เลือกระหว่างวันที่
//ค้นหาข้อมูลตามเงื่อนไขที่เลือก
	$temp_date1 = explode("/", $date_start);
	$date_start = $temp_date1[0]."/".$temp_date1[1]."/".($temp_date1[2]-543).' 00:00:00.000';			// วันที่เริ่ม
	$temp_date2 = explode("/", $date_stop);
	$date_stop = $temp_date2[0]."/".$temp_date2[1]."/".($temp_date2[2]-543).' 23:59:59.997';			// วันที่สิ้นสุด

	// query ที่ใช้ในการแสดงข้อมูล
	$sql = "
				SET DATEFORMAT dmy 
				SELECT [user_online] ,[name_search] ,[first_name] ,[epithet] ,[surname]
					,[number_search] ,[country_search] ,[slt_type] ,[rd_type] ,[result_type], [job_search], [number_ref], [division_name]
				FROM [tbl-report]
				WHERE 1=1 ";
				
	// ตรวจสอบว่าเป็นพนักงานระบบ 8 ขึ้นไปหรือไม่ *** admin ถ้าว่าระดับ 8 ขึ้นไป
	// ถ้าต่ำกว่า 8 ให้แสดงเฉพาะส่วนเจ้าของ
	if(!$position_level){
		$sql.= " AND user_online = '".$user_online."' ";		// แสดงตามส่วนงานเจ้าของ
	} //  end if 
				
	// สืบค้นตามประเภทข้อมูลหรือไม่
	if($slt_type<>'0'){
		$sql.= " AND slt_type='".$slt_type."' ";
	} // end if 
	// แสดงตามเงื่อนไขพบ ไม่พล
	if($slt_result<>'all'){
		$sql.= " AND result_type='".$slt_result."' ";
	} // end if 
	// แสดงเป็นช่วงวันที่
	if($rd_type=='2'){
		$sql.=" AND ( [date_time]>='".$date_start."' ";
		$sql.=" AND [date_time]<='".$date_stop."' ) ";
	} // end if 
	// แสดงเลขที่อ้างอิงระบบ
	if($number_ref<>''){
		$sql.=" AND (number_ref='".$number_ref."') ";
	} // end if 

	// ในกรณีที่เป็นผู้ธรรมดาให้แสดงเฉพาะส่วนงานของตนเองเท่านั้น
	if($type_online == '1'){
		$sql.=" AND (profile_code=".$profile_online.") ";
	}else{  // กรณีเป็น admin ให้แสดงตาม branch ที่เลือกเท่านั้น 
		$sql.=" AND (br_code='".$branch."' ) ";
	} // end if type_online 


	$obj_db->query($sql);
	// กรณีที่ไม่พบรายการ
	if($obj_db->num_rows()==0){
?>
	<center> ไม่พบข้อมูลตามเงื่อนไขที่กำหนด </center>
<?
	}else{ 
?>
<!-- กรณีที่พบรายการ -->
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" >
	<thead>
		<tr>
			<th align='center'>ลำดับที่</th>
			<th>ชื่อเต็ม</th>
			<th>ชื่อ-ชื่อรอง-สกุล</th>
			<th>หมายเลขอ้างอิง</th>
			<th>ประเทศ</th>
			<th>อาชีพ/ประเภทธุรกิจ</th>
			<th>CDD Ref. No.</th>
			<th>ข้อมูล</th>
			<th>ส่วนงาน</th>
			<th>ผลการค้นหา</th>
		</tr>
	</thead>
	<tbody>
	<?
		$i = 0;
		WHILE($rows = $obj_db ->fetch_row()){ 
			$i++;
	?>
		<tr>
			<td align='center'><?=$i ?></td><!-- ลำดับที่ -->
			<td align='center'><?=$rows['1']?></td><!-- ชื่อเต็ม -->
			<td><?=$rows['2'].$rows['3'].$rows['4']?></td><!-- ชื่อที่ต้องการค้นหา -->
			<td><?=$rows['5'] ?></td><!-- หมายเลขอ้างถึง -->
			<td><?=$rows['6'] ?></td><!-- ประเทศ -->
			<td><?=$rows['10'] ?></td><!-- อาชีพ/ประเภทธุรกิจ -->
			<td><?=$rows['11'] ?></td><!-- เลขที่อ้างอิงระบบ -->
			<td align='center'><?=$array_data[$rows['7']]?></th><!-- ข้อมูล -->
			<td><?=trim($rows['12']) ?></td>
			<td align='center'><? if(trim($rows['9'])=='1'){ echo "พบ"; } else{ echo "ไม่พบ"; } ?></th><!-- ผลการค้นหา -->
		</tr>
	<? } // end whilie?>
	</tbody>
</table>
<? } // end if num_rows
	$obj_db->close();
	ob_end_flush();
?>