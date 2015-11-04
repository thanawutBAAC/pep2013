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

	$number_ref = trim($_POST['number_ref']);			// �Ţ�����ҧ�ԧ�к�
	$slt_type = $_POST['slt_type'];								// �����������Ť�������§  0 = all
	$slt_result = $_POST['slt_result'];							// �š�ä��� 1 = �� / 0 = ��辺 / all = ������
	$date_start = trim($_POST['date_start']);				// �ѹ����������
	$date_stop = trim($_POST['date_stop']);				// �ѹ�������ش
	$rd_type = $_POST['rd_type'];								// ������������͡���� 1 �ʴ������� 2 ���͡�����ҧ�ѹ���
//���Ң����ŵ�����͹䢷�����͡
	$temp_date1 = explode("/", $date_start);
	$date_start = $temp_date1[0]."/".$temp_date1[1]."/".($temp_date1[2]-543).' 00:00:00.000';			// �ѹ��������
	$temp_date2 = explode("/", $date_stop);
	$date_stop = $temp_date2[0]."/".$temp_date2[1]."/".($temp_date2[2]-543).' 23:59:59.997';			// �ѹ�������ش

	// query �����㹡���ʴ�������
	$sql = "
				SET DATEFORMAT dmy 
				SELECT [user_online] ,[name_search] ,[first_name] ,[epithet] ,[surname]
					,[number_search] ,[country_search] ,[slt_type] ,[rd_type] ,[result_type], [job_search], [number_ref], [division_name]
				FROM [tbl-report]
				WHERE 1=1 ";
				
	// ��Ǩ�ͺ����繾�ѡ�ҹ�к� 8 ����������� *** admin �������дѺ 8 ����
	// ��ҵ�ӡ��� 8 ����ʴ�੾����ǹ��Ңͧ
	if(!$position_level){
		$sql.= " AND user_online = '".$user_online."' ";		// �ʴ������ǹ�ҹ��Ңͧ
	} //  end if 
				
	// �׺�鹵���������������������
	if($slt_type<>'0'){
		$sql.= " AND slt_type='".$slt_type."' ";
	} // end if 
	// �ʴ�������͹䢾� ����
	if($slt_result<>'all'){
		$sql.= " AND result_type='".$slt_result."' ";
	} // end if 
	// �ʴ��繪�ǧ�ѹ���
	if($rd_type=='2'){
		$sql.=" AND ( [date_time]>='".$date_start."' ";
		$sql.=" AND [date_time]<='".$date_stop."' ) ";
	} // end if 
	// �ʴ��Ţ�����ҧ�ԧ�к�
	if($number_ref<>''){
		$sql.=" AND (number_ref='".$number_ref."') ";
	} // end if 

	// 㹡óշ���繼�����������ʴ�੾����ǹ�ҹ�ͧ���ͧ��ҹ��
	if($type_online == '1'){
		$sql.=" AND (profile_code=".$profile_online.") ";
	}else{  // �ó��� admin ����ʴ���� branch ������͡��ҹ�� 
		$sql.=" AND (br_code='".$branch."' ) ";
	} // end if type_online 


	$obj_db->query($sql);
	// �óշ����辺��¡��
	if($obj_db->num_rows()==0){
?>
	<center> ��辺�����ŵ�����͹䢷���˹� </center>
<?
	}else{ 
?>
<!-- �óշ�辺��¡�� -->
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" >
	<thead>
		<tr>
			<th align='center'>�ӴѺ���</th>
			<th>�������</th>
			<th>����-�����ͧ-ʡ��</th>
			<th>�����Ţ��ҧ�ԧ</th>
			<th>�����</th>
			<th>�Ҫվ/��������áԨ</th>
			<th>CDD Ref. No.</th>
			<th>������</th>
			<th>��ǹ�ҹ</th>
			<th>�š�ä���</th>
		</tr>
	</thead>
	<tbody>
	<?
		$i = 0;
		WHILE($rows = $obj_db ->fetch_row()){ 
			$i++;
	?>
		<tr>
			<td align='center'><?=$i ?></td><!-- �ӴѺ��� -->
			<td align='center'><?=$rows['1']?></td><!-- ������� -->
			<td><?=$rows['2'].$rows['3'].$rows['4']?></td><!-- ���ͷ���ͧ��ä��� -->
			<td><?=$rows['5'] ?></td><!-- �����Ţ��ҧ�֧ -->
			<td><?=$rows['6'] ?></td><!-- ����� -->
			<td><?=$rows['10'] ?></td><!-- �Ҫվ/��������áԨ -->
			<td><?=$rows['11'] ?></td><!-- �Ţ�����ҧ�ԧ�к� -->
			<td align='center'><?=$array_data[$rows['7']]?></th><!-- ������ -->
			<td><?=trim($rows['12']) ?></td>
			<td align='center'><? if(trim($rows['9'])=='1'){ echo "��"; } else{ echo "��辺"; } ?></th><!-- �š�ä��� -->
		</tr>
	<? } // end whilie?>
	</tbody>
</table>
<? } // end if num_rows
	$obj_db->close();
	ob_end_flush();
?>