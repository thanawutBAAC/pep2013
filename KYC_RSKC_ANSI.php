<?session_start(); 
	error_reporting( error_reporting() & ~E_NOTICE );
	date_default_timezone_set('Asia/Bangkok');
	header("Content-Type: text/html; charset=windows-874"); 

	$pep_host ="Jewel,1433";
	$pep_user = "tooadm";
	$pep_password = "baac@123";
	$pep_database = "Pep2013";
	$conn = new PDO("sqlsrv:server=$pep_host ; Database = $pep_database", $pep_user, $pep_password);

	// ในเงื่อนไขที่บุคคลธรรมดาจะมีค่าเป็น 01, 02  นิติบุคคลจะเป็น 03, 04 เท่านั้น
	// COMP_CODE ฟิลด์เงื่อนไขถ้ากรณีที่ไม่ตรงกับใน array ให้ปรับค่าเป็น 02 ถ้า comp_code เป็น 0  หรือ 04 ถ้า comp_code เป็น 1
	// COMP_CODE = '0' AND
	// array ตั้งค่าเพื่อ mapping ให้ระบบ CBS 
	$array_export = array("National ID"=>'01',"??€??????????????•????????????????????•???????????"=>'02',"??€????????—??????????????•???????????•???????????"=>'02',"AMLO_REF_ID"=>'02',"Passport"=>'02',"Bosnian Personal ID No."=>'02',"British National Overseas Passport"=>'02',"C.U.R.P."=>'02',"Cartilla de Servicio Militar Nacional"=>'02',"Cedula No."=>'02',"Chinese Commercial Code"=>'02',"CNP (Personal Numerical Code)"=>'02',"Credencial electoral"=>'02',"D.N.I."=>'02',"Diplomatic Passport"=>'02',"Driver&#039;s License No."=>'02',"Electoral Registry No."=>'02',"Federal ID Card"=>'02',"Fiscal Code"=>'02',"Gender"=>'02',"Identification Number"=>'02',"Immigration No."=>'02',"Italian Fiscal Code"=>'02',"Kenyan ID No."=>'02',"LE Number"=>'02',"Moroccan Personal ID No."=>'02',"N.I.E."=>'02',"National Foreign ID Number"=>'02',"National ID"=>'02',"National ID No."=>'02',"National Identification Number"=>'02',"Numero de Identidad"=>'02',"Passport"=>'02',"Personal ID Card"=>'02',"Pilot License Number"=>'02',"R.F.C."=>'02',"Refugee ID Card"=>'02',"Residency Number"=>'02',"Romanian Permanent Resident"=>'02',"Serial No."=>'02',"SSN"=>'02',"Stateless Person ID Card"=>'02',"Stateless Person Passport"=>'02',"Tazkira National ID Card"=>'02',"Travel Document Number"=>'02',"Turkish Identificiation Number"=>'02',"VisaNumberID"=>'02',"Corp Reg"=>'03',"Corp Reg"=>'04',"Additional Sanctions Information"=>'04',"Afghan Money Service Provider License Number"=>'04',"Aircraft Construction Number (also called L/N or S"=>'04',"Aircraft Manufacture Date"=>'04',"Aircraft Manufacturer&#039;s Serial Number (MSN)"=>'04',"Aircraft Model"=>'04',"Aircraft Operator"=>'04',"BIC Container Code"=>'04',"BIK (RU)"=>'04',"Business Registration Document #"=>'04',"C.I.F."=>'04',"C.R. No."=>'04',"C.U.I.P."=>'04',"C.U.I.T."=>'04',"Certificate of Incorporation Number"=>'04',"Commercial Registry Number"=>'04',"Company Number"=>'04',"Dubai Chamber of Commerce Membership No."=>'04',"Email Address"=>'04',"Executive Order 13645 Determination -"=>'04',"Folio Mercantil No."=>'04',"Former Vessel Flag"=>'04',"Government Gazette Number"=>'04',"IFCA Determination -"=>'04',"Istanbul Chamber of Comm. No."=>'04',"License"=>'04',"Matricula Mercantil No"=>'04',"MMSI"=>'04',"NIT #"=>'04',"Numero Judicial #"=>'04',"Numero Unico de Identificacao Tributaria (NUIT)"=>'04',"Paraguayan tax identification number"=>'04',"Public Registration Number"=>'04',"Public Security and Immigration No."=>'04',"Registered Charity No."=>'04',"Registration Certificate Number (Dubai)"=>'04',"Registration ID"=>'04',"RFC"=>'04',"RIF #"=>'04',"Romanian C.R."=>'04',"Romanian Tax Registration"=>'04',"RTN"=>'04',"RUC #"=>'04',"RUT #"=>'04',"SRE Permit No."=>'04',"SWIFT/BIC"=>'04',"Tax ID No."=>'04',"Trade License No."=>'04',"UK Company Number"=>'04',"US FEIN"=>'04',"V.A.T. Number"=>'04',"Vessel Registration Identification"=>'04',"Website"=>'04');
	
	$bck2 = 2;		//  ถ้า 1 เท่ากับมีเลือก บุคคลธรรมดา
	$rd = 2;			// ถ้า 1 = windows / 2 = unix
	$news_line = chr(10);	// ;chr(0x0a)'\n

		// บุคคลธรรมดา
		if($bck2==2){
			$sql = " 

			Set NoCount ON

			CREATE TABLE #Result_Master ( entity_id nvarchar(30) NULL, gender nvarchar(15) NULL, info_source nvarchar(20) NULL, 
			user_id nvarchar(35) NULL, stamp_dttm nvarchar(50) NULL, approved_by nvarchar(10) NULL, last_update_date nvarchar(50) NULL,
			mode_mn nvarchar(10) NULL, COMP_CODE smallint )

			CREATE TABLE #Result_Name ( entity_id nvarchar(30) NULL, first_name nvarchar(200) COLLATE THAI_CI_AS NULL, middle_name nvarchar(200) COLLATE THAI_CI_AS NULL,
			 surname nvarchar(200) COLLATE THAI_CI_AS NULL, english_name nvarchar(255) NULL )
			 
			CREATE TABLE #Result_Idnumber ( entity_id nvarchar(30) NULL, id_type nvarchar(50) NULL, id_value nvarchar(100) NULL )

			CREATE TABLE #Result_Address ( entity_id nvarchar(30) NULL, address_city nvarchar(100) COLLATE THAI_CI_AS NULL, address_state nvarchar(100) COLLATE THAI_CI_AS NULL,
			 address_country nvarchar(100) COLLATE THAI_CI_AS NULL )

			INSERT INTO #Result_Master SELECT entity_id, gender,info_source, user_id, stamp_dttm, 
			approved_by, last_update_date, mode_mn, comp_code
			FROM [tbl-master] 
			WHERE DATA_TYPE <> 'B'

			INSERT INTO #Result_Name SELECT entity_id, first_name, middle_name, surname, english_name
			FROM [tbl-name]

			INSERT INTO #Result_Idnumber SELECT entity_id, id_type, id_value 
			FROM [tbl-idnumber]

			INSERT INTO #Result_Address SELECT entity_id, address_city, address_state, address_country 
			FROM [tbl-address]

			CREATE TABLE #ResultTemp01 ( entity_id nvarchar(30) NULL, first_name nvarchar(200) COLLATE THAI_CI_AS NULL, middle_name nvarchar(200) COLLATE THAI_CI_AS NULL,
			surname nvarchar(200) COLLATE THAI_CI_AS NULL, english_name nvarchar(255) NULL, gender nvarchar(15) NULL, info_source nvarchar(20) NULL, 
			user_id nvarchar(35) NULL, stamp_dttm nvarchar(50) NULL, approved_by nvarchar(10) NULL, last_update_date nvarchar(50) NULL, mode_mn nvarchar(10) NULL, COMP_CODE smallint NULL )
			INSERT INTO #ResultTemp01 
			SELECT DISTINCT tm.ENTITY_ID, tn.FIRST_NAME, tn.MIDDLE_NAME , tn.SURNAME , tn.ENGLISH_NAME,tm.GENDER, 
			tm.[INFO_SOURCE],tm.[USER_ID], tm.[STAMP_DTTM], tm.[APPROVED_BY], tm.[LAST_UPDATE_DATE], tm.[MODE_MN], tm.[comp_code]
			FROM #Result_Master tm
			LEFT JOIN (
				SELECT ENTITY_ID, FIRST_NAME, MIDDLE_NAME, SURNAME, ENGLISH_NAME
				FROM #Result_Name
			) AS tn ON tn.ENTITY_ID = tm.ENTITY_ID 

			CREATE TABLE #ResultTemp02 ( entity_id nvarchar(30) NULL, first_name nvarchar(200) COLLATE THAI_CI_AS NULL, middle_name nvarchar(200) COLLATE THAI_CI_AS NULL,
			surname nvarchar(200) COLLATE THAI_CI_AS NULL, english_name nvarchar(255) NULL, gender nvarchar(15) NULL, info_source nvarchar(20) NULL, 
			user_id nvarchar(35) NULL, stamp_dttm nvarchar(50) NULL, approved_by nvarchar(10) NULL, last_update_date nvarchar(50) NULL,
			mode_mn nvarchar(10) NULL, id_type nvarchar(50) NULL, id_value nvarchar(100) NULL, COMP_CODE smallint NULL)
			INSERT INTO #ResultTemp02
			SELECT DISTINCT tm.ENTITY_ID, tm.FIRST_NAME, tm.MIDDLE_NAME , tm.SURNAME , 
			tm.ENGLISH_NAME,tm.GENDER, tm.[INFO_SOURCE],tm.[USER_ID], 
			tm.[STAMP_DTTM], tm.[APPROVED_BY], tm.[LAST_UPDATE_DATE],tm.[MODE_MN], ti.ID_TYPE, ti.ID_VALUE, tm.[comp_code]
			FROM #ResultTemp01 tm, #Result_Idnumber ti 
			WHERE ti.ENTITY_ID = tm.ENTITY_ID 

			CREATE TABLE #ResultTemp03 ( entity_id nvarchar(30) NULL, first_name nvarchar(200) COLLATE THAI_CI_AS NULL, middle_name nvarchar(200) COLLATE THAI_CI_AS NULL,
			surname nvarchar(200) COLLATE THAI_CI_AS NULL, english_name nvarchar(255) NULL, gender nvarchar(15) NULL, info_source nvarchar(20) NULL, 
			user_id nvarchar(35) NULL, stamp_dttm nvarchar(50) NULL, approved_by nvarchar(10) NULL, last_update_date nvarchar(50) NULL,
			mode_mn nvarchar(10) NULL, id_type nvarchar(50) NULL, id_value nvarchar(100) NULL, address_city nvarchar(100) COLLATE THAI_CI_AS NULL, address_state nvarchar(100) COLLATE THAI_CI_AS NULL, address_country nvarchar(100) COLLATE THAI_CI_AS NULL, risk_flag varchar(1) NULL, COMP_CODE smallint NULL)
			INSERT INTO #ResultTemp03
			SELECT DISTINCT tm.ENTITY_ID, tm.FIRST_NAME, tm.MIDDLE_NAME , tm.SURNAME , tm.ENGLISH_NAME,tm.GENDER, 
			tm.[INFO_SOURCE],tm.[USER_ID], tm.[STAMP_DTTM], tm.[APPROVED_BY], tm.[LAST_UPDATE_DATE],tm.[MODE_MN], 
			tm.ID_TYPE, tm.ID_VALUE, ta.ADDRESS_CITY,ta.ADDRESS_STATE,ta.ADDRESS_COUNTRY,'0', tm.[comp_code]
			FROM #ResultTemp02 tm
			LEFT JOIN (
				SELECT ENTITY_ID, ADDRESS_CITY, ADDRESS_STATE, ADDRESS_COUNTRY
				FROM #Result_Address
			) AS ta ON ta.ENTITY_ID = tm.ENTITY_ID 

			drop table #Result_Master
			drop table #Result_Name
			drop table #Result_Idnumber
			drop table #Result_Address
			drop table #ResultTemp01
			drop table #ResultTemp02

			UPDATE #ResultTemp03 SET risk_flag='1'
			WHERE ([INFO_SOURCE] LIKE 'UN%') OR ([INFO_SOURCE] LIKE 'FREEZE-04%') OR ([INFO_SOURCE] LIKE 'FREEZE-05%')

			SELECT DISTINCT ID_TYPE, ID_VALUE, ENTITY_ID, '',
			FIRST_NAME+SURNAME , ENGLISH_NAME, ADDRESS_CITY, ADDRESS_STATE, ADDRESS_COUNTRY,
			[INFO_SOURCE], '3', RISK_FLAG, [USER_ID], 
			[STAMP_DTTM], [APPROVED_BY], [LAST_UPDATE_DATE], [MODE_MN], [COMP_CODE]
			FROM #ResultTemp03
			WHERE (id_type IS NOT NULL) AND (id_value IS NOT NULL) AND (id_type <> '')

			drop table #ResultTemp03

			Set NoCount Off ";

			$filename = 'KYC_RSKC_'.date('Ymd').'.TXT';
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
				} // end if 

				$i = 0;
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				WHILE($rows = $stmt->fetch( PDO::FETCH_BOTH )) { 

					if(trim($rows['1'])=='' OR trim($rows['2'])==''){
						continue;
					} // end if 

					// ตรวจสอบเงื่อนไข Mapping
					if($rows['0']=='Corp Reg' AND strlen($rows['1'])<10){
						$rows['0'] = '04';
					}elseif($rows['0']=='Corp Reg'){
						$rows['0'] = '03';
					}else{
						$rows['0'] = $array_export[trim($rows['0'])];
						if($rows['0']==''){
							if(trim($rows['17'])=='1'){						// COMP_CODE  นิติบุคคล
								$rows['0'] = '04';
							} // end if 
						} // end if 
					} // end if 

					if($rows['0']<>'03' AND $rows['0']<>'04'){
						continue;
					} // end if 

					$i++;
					for($j=0;$j<=21;$j++){
						if(is_null($rows[$j])==true){
							$rows[$j] = '';
						} // end if 
						$rows[$j] = trim($rows[$j]);							// ตัดช่องว่าง
						if(ord($rows[$j])==32){
							$rows[$j] = chr(0);
						} // end if 
					} // end for 

					$somecontent = 'D|'.$rows['0'].'|'.$rows['1'].'|'.$rows['2'].'|';	// D, รหัสประเภทข้อมูล, ข้อมูลที่ใช้ตรวจสอบ, Entity ID
					$somecontent.= $rows['3'].'|'.$rows['4'].'|'.$rows['5'].'|';					// Tile, First_name+Last_Name , ENGLISH_NAME
					$somecontent.= $rows['6'].'|'.$rows['7'].'|'.$rows['8'].'|'.$rows['9'].'|'.$rows['10'].'|';	// Address, State, Country, Info_Source, RISK_LEVEL_CODE
					$somecontent.= $rows['11'].'|'.$rows['12'].'|'.$rows['13'].'|'.$rows['14'].'|'.$rows['15'].'|'.$rows['16'];		// High_Risk_Flag, Create_User, Create_DateTime, Update_User, Update_DateTime, Flag

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

		} // end if bck1

	 $conn = null;

?>