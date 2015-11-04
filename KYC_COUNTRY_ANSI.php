<?session_start(); 
	error_reporting( error_reporting() & ~E_NOTICE );
	date_default_timezone_set('Asia/Bangkok');
	header("Content-Type: text/html; charset=windows-874"); 

	$pep_host ="Jewel,1433";
	$pep_user = "tooadm";
	$pep_password = "baac@123";
	$pep_database = "Pep2013";
	$conn = new PDO("sqlsrv:server=$pep_host ; Database = $pep_database", $pep_user, $pep_password);

	// สร้างไฟล์ฐานข้อมูลประเทศเสี่ยงทั้งหมดให้ทีมลูกค้า 
	$news_line = chr(10);	// ;chr(0x0a)'\n

	$sql = " SELECT [country_code], [country_name], [level] FROM [tbl-country] ";

	$filename = 'KYC_COUNTRY_'.date('Ymd').'.TXT';
	$somecontent = "H|".date('Ymd');
	$somecontent = iconv("UTF-8", "Windows-874", $somecontent);
	$temp_file = dirname(__FILE__)."/download/ANSI/".$filename;
	if(!$handle = fopen($temp_file, 'w')){
		echo "Cannot open file ($filename)";
		exit;
	} // end if 

	if (is_writable($temp_file)) {
		// Write $somecontent to our opened file.
		// สร้างหัวบรรทัด
		if (fwrite($handle, $somecontent.$news_line) === FALSE) {
			echo "Cannot write to file ($filename)";
			exit;
		} // end if fwrite

		$i = 0;
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		WHILE($rows = $stmt->fetch( PDO::FETCH_BOTH )) { 
			$i++;
			$somecontent = trim($rows['0']).'|'.trim($rows['1']).'|'.trim($rows['2']);	// รหัส ชื่อ ระดับความเสี่ยง
			$somecontent = iconv("UTF-8", "Windows-874", $somecontent);
			fwrite($handle,$somecontent.$news_line );					//write to txtfile
		} // end while 

		// สร้างบรรทัดสุดท้าย
		$somecontent = "T|".$i;
		$somecontent = iconv("UTF-8", "Windows-874", $somecontent);
		fwrite($handle,$somecontent.$news_line);					//write to txtfile
		fclose($handle);
	} else {
		echo "The file $filename is not writable";
	} // end if is_writable

	 $conn = null;
?>