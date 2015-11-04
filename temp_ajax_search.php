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

	$slt_type = $_POST['slt_type'];																										// �����������Ť�������§  0 = all
	$name_search = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['name_search'])));			//  ���ͷ���ͧ��ä���
	$first_name = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['first_name'])));					// �����á
	$epithet = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['epithet'])));							// ���͡�ҧ
	$surname = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['surname'])));						// ���ʡ��
	$number_search = escapeshellcmd(iconv("UTF-8","windows-874", $_POST['number_search']));			// �Ţ����Шӵ��
	$country_id = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['country_id'])));					// ���ʻ����
	$country_search = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['country_search'])));	// ���ʪ��ͻ����
	$job_id = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['job_id'])));								// �����Ҫվ
	$job_search = escapeshellcmd(iconv("UTF-8","windows-874", trim($_POST['job_search'])));				// ��ª����Ҫվ
	$rd_type = $_POST['rd_type'];																										// ������������͡���鹪��� 1 ���ͷ���ͧ 2 �á ��ҧ ʡ��
	$result_type = 0;		// �Ţͧ��ä��� 0 ��辺 1 �� 

	// 㹡óշ�辺����Ҫվ�դ�������§ ������ʴ���������§�������ͧ令��Ң����� 
	if($job_id<>0){
		$result_type = 1;
?>
	<center> ���������Ҫվ��ͧ���� &nbsp; <strong><font color='red'><u><?=$job_search ?></u></font></strong> &nbsp;&nbsp; �ѹ-��͹-�� <font color='red'><? echo date('d-m-Y') ?></font> &nbsp;&nbsp; ���� <font color='red'><? echo date('G:i') ?></font></center>
<?
	} // end if job_id <> 0 

	// ���һ���Ȥ�������§ 
	$sql = " SELECT [country_code] ,[country_name] ,[level] FROM [tbl-country] WHERE [country_code]='".$country_id."' ";
	$obj_db->query($sql);
	// �óշ����辺��¡��
	if($obj_db->num_rows()>0){
		$result_type = 1;
?>
	<center> �������Ż���ȵ�ͧ���� &nbsp; <strong><font color='red'><u><?=$country_search ?></u></font></strong> &nbsp;&nbsp; �ѹ-��͹-�� <font color='red'><? echo date('d-m-Y') ?></font> &nbsp;&nbsp; ���� <font color='red'><? echo date('G:i') ?></font></center>
<?
	} // end if obj_db  ����Ȥ�������§

	// 㹡óշ�����ç�Ѻ���͹��Ҫվ ���� ����� �����Ҩҡ 18 ����������
	if($result_type==0){

	// ��¡�� DATA_TYPE<>'B' ����¡�âͧ UN ���¡��ԡ��������红����������� ��� ��㹡���׺�鹵���
	// query �����㹡�ä��� ���������͹���������仼١���Ѻ����� sql �����������͹����ҡ�����ͧ���仼١����
	$sql = " SELECT DISTINCT tm.ENTITY_ID, tm.INFO_SOURCE, Temp01.SN ";

	/* ���������ͷ���ͧ��ä��� */
	if($rd_type==1){					/* ���ͷ����� */
			$sql1 = " RIGHT JOIN (
					SELECT tn.ENTITY_ID, tn.SINGLE_STRING_NAME AS SN
					FROM [tbl-name] AS tn
					WHERE tn.SINGLE_STRING_NAME like '%".$name_search."%' AND tn.DATA_TYPE<>'B' ";
		// �׺�鹵���������������������
		if($slt_type<>'0'){
			$sql1.= " AND tn.DATA_TYPE='".$slt_type."' ";
		} // end if 
			
			$sql1.= " ) AS Temp01 ON Temp01.ENTITY_ID = tm.ENTITY_ID ";
	}else{								/* �����á �����ͧ ���ʡ�� */
			$sql1 = " RIGHT JOIN (
					SELECT tn.ENTITY_ID , tn.FIRST_NAME+' '+tn.MIDDLE_NAME+' '+tn.SURNAME AS SN
					FROM [tbl-name] AS tn
					WHERE tn.ENTITY_ID IS NOT NULL AND tn.DATA_TYPE<>'B' ";
		if($first_name<>''){				// �ժ����������
			$sql1.=" AND tn.FIRST_NAME like '%".$first_name."%' ";
		} // end if first_name
		if($epithet<>''){					// �ժ��͡�ҧ�������
			$sql1.=" AND tn.MIDDLE_NAME like '%".$epithet."%' ";
		} // end if epithet
		if($surname<>''){				// �չ��ʡ���������
			$sql1.=" AND tn.SURNAME like '%".$surname."%' ";
		} // end if surname
		// �׺�鹵���������������������
		if($slt_type<>'0'){
			$sql1.= " AND tn.DATA_TYPE='".$slt_type."' ";
		} // end if 

		$sql1.=" ) AS Temp01 ON Temp01.ENTITY_ID = tm.ENTITY_ID ";
	} // end if rd_type 

	if(trim($number_search) <>''){				/* �����Ţ��ҧ�ԧ�������  [ �Ţ�պѵ� / passport ] */
	$sql.= " ,Temp02.ID_VALUE ";
			$sql1.= " RIGHT JOIN (
					SELECT td.ENTITY_ID, td.ID_VALUE
					FROM [tbl-idnumber] AS td
					WHERE td.ID_VALUE like '%".$number_search."%' AND td.DATA_TYPE<>'B' ";
		// �׺�鹵���������������������
		if($slt_type<>'0'){
			$sql1.= " AND td.DATA_TYPE='".$slt_type."' ";
		} // end if 
			$sql1.= " ) AS Temp02 ON Temp02.ENTITY_ID = tm.ENTITY_ID ";
	}else{
		$sql.= " ,'' ";								/* ��������������Ţ��������ʴ������ҧ */
	}  // end if number_search




	if(trim($country_search)<>''){							/* �����  */
		$sql.= " ,Temp03.ADDRESS_COUNTRY ,Temp04.BIRTHINFO_COUNTRY ";
	/* ����� address */
			$sql1.= " RIGHT JOIN (
					SELECT ta.ENTITY_ID, ta.ADDRESS_COUNTRY
					FROM [tbl-address] AS ta
					WHERE ta.ADDRESS_COUNTRY like '%".$country_search."%' AND ta.DATA_TYPE<>'B' ";
				// �׺�鹵���������������������
				if($slt_type<>'0'){
					$sql1.= " AND ta.DATA_TYPE='".$slt_type."' ";
				} // end if 
		$sql1.= " ) AS Temp03 ON Temp03.ENTITY_ID = tm.ENTITY_ID ";
	/* ����� birthinfo */
			$sql1.= " RIGHT JOIN (
					SELECT tb.ENTITY_ID, tb.BIRTHINFO_COUNTRY
					FROM [tbl-birthinfo] AS tb
					WHERE tb.BIRTHINFO_COUNTRY like '%".$country_search."%' AND tb.DATA_TYPE<>'B' ";
				// �׺�鹵���������������������
				if($slt_type<>'0'){
					$sql1.= " AND tb.DATA_TYPE='".$slt_type."' ";
				} // end if 
			$sql1.= " ) AS Temp04 ON Temp04.ENTITY_ID = tm.ENTITY_ID  ";
	/* �����  11/01/2557 */
	$sql1. 


	}else{
		$sql.= " ,'',''  ";				/* ���������͡���������ʴ������ҧ 2 ��� */
	} // end if country_search

	$sql.=" FROM [tbl-master] AS tm ".$sql1.'  WHERE tm.ENTITY_ID IS NOT NULL ';				/*	�������բ������ master ����ͧ�ʴ� */

	// �׺�鹵���������������������
	if($slt_type<>'0'){
		$sql.= " AND tm.DATA_TYPE='".$slt_type."' ";
	} // end if 

	$obj_db->query($sql);
	// �óշ����辺��¡��
	if($obj_db->num_rows()==0){
		$result_type = 0;
		 $random = substr(number_format(time() * mt_rand(),0,'',''),0,10);
?>
	<center> ��辺�����ŵ�����͹䢷���˹� &nbsp; <strong><font color='red'><u><?=$user_online.$random ?></u></font></strong> &nbsp;&nbsp; �ѹ-��͹-�� <font color='red'><? echo date('d-m-Y') ?></font> &nbsp;&nbsp; ���� <font color='red'><? echo date('G:i') ?></font></center>
<? }else{ 
		$result_type = 1;
?>
<!-- �óշ�辺��¡�� -->
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" >
	<thead>
		<tr>
			<th align='center'>��������´</th>
			<th>������ʻ�Шӵ��</th>
			<th>���� ʡ��</th>
			<th>�����Ţ��ҧ�ԧ</th>
			<th>�����</th>
			<th>Name Match%</th>
		</tr>
	</thead>
	<tbody>
	<?

		WHILE($rows = $obj_db ->fetch_row()){ 
			$sum_cal = 0;											// �ӹǹ���١��ͧ�ͧ�ӷ�����
			$rows2_len = strlen(trim($rows['2']));		// �ӹǹ�ӷ�������辺

		if($rd_type==1){
			$num1 = @substr_count(strtoupper($rows['2']), strtoupper($name_search));
			$sum_cal = strlen($name_search)*$num1;

			$rows['2'] = highlightkeyword($rows['2'], $name_search, 1);			// ��ͤ����鹩�Ѻ , ��ͤ�������, �ٻẺ��� 1
			$rows['2'] = str_replace('[#]', '<span style="color: '.'red'.';"><u>', $rows['2'] );
		}else{
			$num1 = @substr_count(strtoupper($rows['2']), strtoupper($first_name));
			$sum_cal = strlen($first_name)*$num1;
			$num2 = @substr_count(strtoupper($rows['2']), strtoupper($epithet));
			$sum_cal+= strlen($epithet)*$num2;
			$num3 = @substr_count(strtoupper($rows['2']), strtoupper($surname));
			$sum_cal+= strlen($surname)*$num3;

			$rows['2'] = highlightkeyword($rows['2'], $first_name, 1);				// ��ͤ����鹩�Ѻ , ��ͤ�������, �ٻẺ��� 1
			$rows['2'] = highlightkeyword($rows['2'], $epithet, 2);					// ��ͤ����鹩�Ѻ , ��ͤ�������, �ٻẺ��� 2
			$rows['2'] = highlightkeyword($rows['2'], $surname, 3);					// ��ͤ����鹩�Ѻ , ��ͤ�������, �ٻẺ��� 3
			$rows['2'] = str_replace('[#]', '<span style="color: '.'red'.';"><u>', $rows['2']);
			$rows['2'] = str_replace('[&]', '<span style="color: '.'blue'.';"><u>', $rows['2']);
			$rows['2'] = str_replace('[%]', '<span style="color: '.'green'.';"><u>', $rows['2']);
		} // end if 

		$rows['2'] = str_replace('[@]', '</u></span>', $rows['2'] );

		$present_match = @number_format(($sum_cal/$rows2_len)*100,2,'.','');			// �ӹǳ % ���ç�Ѻ��

		if($present_match>50){
			$temp_class='danger';			// ᴧ
		}elseif($present_match>30){
			$temp_class='warning';			// ���
		}else{
			$temp_class='default';			// ��� ����
		} // end if present_match 

	?>
		<tr class='<?=$temp_class?>'>
			<td align='center'><a href='print_pep.php?ENTITY_ID=<?=$rows['0'] ?>' target='_blank'> view</a></td><!-- ��������´ -->
			<td align='center'><?=$rows['0']?></td><!-- ������ʻ�Шӵ�� -->
			<td><?=$rows['2']?></td><!-- ���ͷ���ͧ��ä��� -->
			<td><?=$rows['3']?></td><!-- �����Ţ��ҧ�֧ -->
			<td><?=$rows['4'].' '.$rows['5']?></td><!-- ����� -->
			<td align='right'><?=$present_match?>%</th><!-- Match -->
		</tr>
	<? } // end whilie?>
		</tbody>
	</table>

<? } // end if num_rows

	} // end if 㹡óշ�����ç�Ѻ���͹��Ҫվ ���� ����� �����Ҩҡ 18 ����������

	// �� log ����͡��§ҹ
	$sql = " INSERT INTO [tbl-report]([user_online],[type_online],[date_time],[name_search],[first_name],[epithet]
			,[surname],[number_search],[country_search],[slt_type],[rd_type],[result_type],[job_search])
			VALUES ('".$user_online."','".$type_online."',GETDATE(),'".$name_search."','".$first_name."','".$epithet."','".$surname."',
			'".$number_search."','".$country_search."','".$slt_type."','".$rd_type."','".$result_type."','".$job_search."') ";
	$obj_db->query($sql);

	$obj_db->close();
	ob_end_flush();
?>