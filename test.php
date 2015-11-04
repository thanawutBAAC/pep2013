<?session_start(); 
	header("Content-Type: text/html; charset=windows-874"); 

	$news_line = chr(10);	// ;chr(0x0a)'\n
	echo 'Thanawut Surin';

			$filename = 'KYC_RSKP_'.date('Ymd').'.txt';
			$somecontent = "H|".date('Ymd');

			if(!$handle = fopen("download/".$filename, 'w')) {
				echo "Cannot open file ($filename)";
				exit;
			} // end if 

			if (is_writable("download/".$filename)) {
				// Write $somecontent to our opened file.
				// สร้างหัวบรรทัด
				if (fwrite($handle, $somecontent.$news_line) === FALSE) {
					echo "Cannot write to file ($filename)";
					exit;
				} // end if 


				$i = 0;
				WHILE($i <=100){ 
					$somecontent = '';
					$i++;
					for($j=0;$j<=21;$j++){
						$somecontent = $somecontent.$j;
					} // end for 
					
					fwrite($handle,$somecontent.$news_line );					//write to txtfile
				} // end while 

				// สร้างบรรทัดสุดท้าย
				$somecontent = "T|".$i;
				fwrite($handle,$somecontent.$news_line);					//write to txtfile
				fclose($handle);
			} else {
				echo "The file $filename is not writable";
			} // end if is_writable




?>