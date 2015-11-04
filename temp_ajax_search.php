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

	$slt_type = $_POST['slt_type'];																										// ประเภทข้อมูลความเสี่ยง  0 = all
	$name_search = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['name_search'])));			//  ชื่อที่ต้องการค้นหา
	$first_name = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['first_name'])));					// ชื่อแรก
	$epithet = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['epithet'])));							// ชื่อกลาง
	$surname = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['surname'])));						// นามสกุล
	$number_search = escapeshellcmd(iconv("UTF-8","windows-874", $_POST['number_search']));			// เลขที่ประจำตัว
	$country_id = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['country_id'])));					// รหัสประเทศ
	$country_search = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['country_search'])));	// รหัสชื่อประเทศ
	$job_id = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['job_id'])));								// รหัสอาชีพ
	$job_search = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['job_search'])));				// รายชื่ออาชีพ
	$rd_type = $_POST['rd_type'];																										// ประเภทที่เลือกให้ค้นชื่อ 1 ชื่อที่ต้อง 2 แรก กลาง สกุล
	$result_type = 0;		// ผลของการค้นหา 0 ไม่พบ 1 พบ 

	// ในกรณีที่พบว่าอาชีพมีความเสี่ยง ก็ให้แสดงความเสี่ยงเลยไม่ต้องไปค้นหาข้อมูล 
	if($job_id<>0){
		$result_type = 1;
?>
	<center> พบข้อมูลอาชีพต้องห้าม &nbsp; <strong><font color='red'><u><?=$job_search ?></u></font></strong> &nbsp;&nbsp; วัน-เดือน-ปี <font color='red'><? echo date('d-m-Y') ?></font> &nbsp;&nbsp; เวลา <font color='red'><? echo date('G:i') ?></font></center>
<?
	} // end if job_id <> 0 

	// ค้นหาประเทศความเสี่ยง 
	$sql = " SELECT [country_code] ,[country_name] ,[level] FROM [tbl-country] WHERE [country_code]='".$country_id."' ";
	$obj_db->query($sql);
	// กรณีที่ไม่พบรายการ
	if($obj_db->num_rows()>0){
		$result_type = 1;
?>
	<center> พบข้อมูลประเทศต้องห้าม &nbsp; <strong><font color='red'><u><?=$country_search ?></u></font></strong> &nbsp;&nbsp; วัน-เดือน-ปี <font color='red'><? echo date('d-m-Y') ?></font> &nbsp;&nbsp; เวลา <font color='red'><? echo date('G:i') ?></font></center>
<?
	} // end if obj_db  ประเทศความเสี่ยง

	// ในกรณีที่ไม่ตรงกับเงื่อนไขอาชีพ หรือ ประเทศ ให้ค้นหาจาก 18 ไฟล์ที่เหลือ
	if($result_type==0){

	// รายการ DATA_TYPE<>'B' เป็นรายการของ UN ที่ยกเลิกไปแล้วแต่เก็บข้อมูลไว้ให้ ฝกธ ใช้ในการสืบค้นต่อไป
	// query ที่ใช้ในการค้นหา ถ้าใส่เงื่อนไขมาให้เอาไปผูกไว้กับคำสั่ง sql ถ้าไม่มีเงื่อนไขส่งมาก็ไม่ต้องเอาไปผูกด้วย
	$sql = " SELECT DISTINCT tm.ENTITY_ID, tm.INFO_SOURCE, Temp01.SN ";

	/* ประเภทชื่อที่ต้องการค้นหา */
	if($rd_type==1){					/* ชื่อทั้งหมด */
			$sql1 = " RIGHT JOIN (
					SELECT tn.ENTITY_ID, tn.SINGLE_STRING_NAME AS SN
					FROM [tbl-name] AS tn
					WHERE tn.SINGLE_STRING_NAME like '%".$name_search."%' AND tn.DATA_TYPE<>'B' ";
		// สืบค้นตามประเภทข้อมูลหรือไม่
		if($slt_type<>'0'){
			$sql1.= " AND tn.DATA_TYPE='".$slt_type."' ";
		} // end if 
			
			$sql1.= " ) AS Temp01 ON Temp01.ENTITY_ID = tm.ENTITY_ID ";
	}else{								/* ชื่อแรก ชื่อรอง นามสกุล */
			$sql1 = " RIGHT JOIN (
					SELECT tn.ENTITY_ID , tn.FIRST_NAME+' '+tn.MIDDLE_NAME+' '+tn.SURNAME AS SN
					FROM [tbl-name] AS tn
					WHERE tn.ENTITY_ID IS NOT NULL AND tn.DATA_TYPE<>'B' ";
		if($first_name<>''){				// มีชื่อหรือไม่
			$sql1.=" AND tn.FIRST_NAME like '%".$first_name."%' ";
		} // end if first_name
		if($epithet<>''){					// มีชื่อกลางหรือไม่
			$sql1.=" AND tn.MIDDLE_NAME like '%".$epithet."%' ";
		} // end if epithet
		if($surname<>''){				// มีนามสกุลหรือไม่
			$sql1.=" AND tn.SURNAME like '%".$surname."%' ";
		} // end if surname
		// สืบค้นตามประเภทข้อมูลหรือไม่
		if($slt_type<>'0'){
			$sql1.= " AND tn.DATA_TYPE='".$slt_type."' ";
		} // end if 

		$sql1.=" ) AS Temp01 ON Temp01.ENTITY_ID = tm.ENTITY_ID ";
	} // end if rd_type 

	if(trim($number_search) <>''){				/* หมายเลขอ้างอิงหรือไม่  [ เลขทีบัตร / passport ] */
	$sql.= " ,Temp02.ID_VALUE ";
			$sql1.= " RIGHT JOIN (
					SELECT td.ENTITY_ID, td.ID_VALUE
					FROM [tbl-idnumber] AS td
					WHERE td.ID_VALUE like '%".$number_search."%' AND td.DATA_TYPE<>'B' ";
		// สืบค้นตามประเภทข้อมูลหรือไม่
		if($slt_type<>'0'){
			$sql1.= " AND td.DATA_TYPE='".$slt_type."' ";
		} // end if 
			$sql1.= " ) AS Temp02 ON Temp02.ENTITY_ID = tm.ENTITY_ID ";
	}else{
		$sql.= " ,'' ";								/* ถ้าไม่ใส่หมายเลขค้นหาให้แสดงค่าว่าง */
	}  // end if number_search




	if(trim($country_search)<>''){							/* ประเทศ  */
		$sql.= " ,Temp03.ADDRESS_COUNTRY ,Temp04.BIRTHINFO_COUNTRY ";
	/* ประเทศ address */
			$sql1.= " RIGHT JOIN (
					SELECT ta.ENTITY_ID, ta.ADDRESS_COUNTRY
					FROM [tbl-address] AS ta
					WHERE ta.ADDRESS_COUNTRY like '%".$country_search."%' AND ta.DATA_TYPE<>'B' ";
				// สืบค้นตามประเภทข้อมูลหรือไม่
				if($slt_type<>'0'){
					$sql1.= " AND ta.DATA_TYPE='".$slt_type."' ";
				} // end if 
		$sql1.= " ) AS Temp03 ON Temp03.ENTITY_ID = tm.ENTITY_ID ";
	/* ประเทศ birthinfo */
			$sql1.= " RIGHT JOIN (
					SELECT tb.ENTITY_ID, tb.BIRTHINFO_COUNTRY
					FROM [tbl-birthinfo] AS tb
					WHERE tb.BIRTHINFO_COUNTRY like '%".$country_search."%' AND tb.DATA_TYPE<>'B' ";
				// สืบค้นตามประเภทข้อมูลหรือไม่
				if($slt_type<>'0'){
					$sql1.= " AND tb.DATA_TYPE='".$slt_type."' ";
				} // end if 
			$sql1.= " ) AS Temp04 ON Temp04.ENTITY_ID = tm.ENTITY_ID  ";
	/* ประเทศ  11/01/2557 */
	$sql1. 


	}else{
		$sql.= " ,'',''  ";				/* ถ้าไม่เลือกประเทศให้แสดงค่าว่าง 2 ค่า */
	} // end if country_search

	$sql.=" FROM [tbl-master] AS tm ".$sql1.'  WHERE tm.ENTITY_ID IS NOT NULL ';				/*	ถ้าไม่มีข้อมูลใน master ไม่ต้องแสดง */

	// สืบค้นตามประเภทข้อมูลหรือไม่
	if($slt_type<>'0'){
		$sql.= " AND tm.DATA_TYPE='".$slt_type."' ";
	} // end if 

	$obj_db->query($sql);
	// กรณีที่ไม่พบรายการ
	if($obj_db->num_rows()==0){
		$result_type = 0;
		 $random = substr(number_format(time() * mt_rand(),0,'',''),0,10);
?>
	<center> ไม่พบข้อมูลตามเงื่อนไขที่กำหนด &nbsp; <strong><font color='red'><u><?=$user_online.$random ?></u></font></strong> &nbsp;&nbsp; วัน-เดือน-ปี <font color='red'><? echo date('d-m-Y') ?></font> &nbsp;&nbsp; เวลา <font color='red'><? echo date('G:i') ?></font></center>
<? }else{ 
		$result_type = 1;
?>
<!-- กรณีที่พบรายการ -->
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" >
	<thead>
		<tr>
			<th align='center'>รายละเอียด</th>
			<th>ค่ารหัสประจำตัว</th>
			<th>ชื่อ สกุล</th>
			<th>หมายเลขอ้างอิง</th>
			<th>ประเทศ</th>
			<th>Name Match%</th>
		</tr>
	</thead>
	<tbody>
	<?

		WHILE($rows = $obj_db ->fetch_row()){ 
			$sum_cal = 0;											// จำนวนที่ถูกต้องของคำที่ค้นหา
			$rows2_len = strlen(trim($rows['2']));		// จำนวนคำทั้งหมดที่พบ

		if($rd_type==1){
			$num1 = @substr_count(strtoupper($rows['2']), strtoupper($name_search));
			$sum_cal = strlen($name_search)*$num1;

			$rows['2'] = highlightkeyword($rows['2'], $name_search, 1);			// ข้อความต้นฉบับ , ข้อความค้นหา, รูปแบบที่ 1
			$rows['2'] = str_replace('[#]', '<span style="color: '.'red'.';"><u>', $rows['2'] );
		}else{
			$num1 = @substr_count(strtoupper($rows['2']), strtoupper($first_name));
			$sum_cal = strlen($first_name)*$num1;
			$num2 = @substr_count(strtoupper($rows['2']), strtoupper($epithet));
			$sum_cal+= strlen($epithet)*$num2;
			$num3 = @substr_count(strtoupper($rows['2']), strtoupper($surname));
			$sum_cal+= strlen($surname)*$num3;

			$rows['2'] = highlightkeyword($rows['2'], $first_name, 1);				// ข้อความต้นฉบับ , ข้อความค้นหา, รูปแบบที่ 1
			$rows['2'] = highlightkeyword($rows['2'], $epithet, 2);					// ข้อความต้นฉบับ , ข้อความค้นหา, รูปแบบที่ 2
			$rows['2'] = highlightkeyword($rows['2'], $surname, 3);					// ข้อความต้นฉบับ , ข้อความค้นหา, รูปแบบที่ 3
			$rows['2'] = str_replace('[#]', '<span style="color: '.'red'.';"><u>', $rows['2']);
			$rows['2'] = str_replace('[&]', '<span style="color: '.'blue'.';"><u>', $rows['2']);
			$rows['2'] = str_replace('[%]', '<span style="color: '.'green'.';"><u>', $rows['2']);
		} // end if 

		$rows['2'] = str_replace('[@]', '</u></span>', $rows['2'] );

		$present_match = @number_format(($sum_cal/$rows2_len)*100,2,'.','');			// คำนวณ % ที่ตรงกับคำ

		if($present_match>50){
			$temp_class='danger';			// แดง
		}elseif($present_match>30){
			$temp_class='warning';			// ส้ม
		}else{
			$temp_class='default';			// ขาว ปกติ
		} // end if present_match 

	?>
		<tr class='<?=$temp_class?>'>
			<td align='center'><a href='print_pep.php?ENTITY_ID=<?=$rows['0'] ?>' target='_blank'> view</a></td><!-- รายละเอียด -->
			<td align='center'><?=$rows['0']?></td><!-- ค่ารหัสประจำตัว -->
			<td><?=$rows['2']?></td><!-- ชื่อที่ต้องการค้นหา -->
			<td><?=$rows['3']?></td><!-- หมายเลขอ้างถึง -->
			<td><?=$rows['4'].' '.$rows['5']?></td><!-- ประเทศ -->
			<td align='right'><?=$present_match?>%</th><!-- Match -->
		</tr>
	<? } // end whilie?>
		</tbody>
	</table>

<? } // end if num_rows

	} // end if ในกรณีที่ไม่ตรงกับเงื่อนไขอาชีพ หรือ ประเทศ ให้ค้นหาจาก 18 ไฟล์ที่เหลือ

	// เก็บ log ไว้ออกรายงาน
	$sql = " INSERT INTO [tbl-report]([user_online],[type_online],[date_time],[name_search],[first_name],[epithet]
			,[surname],[number_search],[country_search],[slt_type],[rd_type],[result_type],[job_search])
			VALUES ('".$user_online."','".$type_online."',GETDATE(),'".$name_search."','".$first_name."','".$epithet."','".$surname."',
			'".$number_search."','".$country_search."','".$slt_type."','".$rd_type."','".$result_type."','".$job_search."') ";
	$obj_db->query($sql);

	$obj_db->close();
	ob_end_flush();
?>