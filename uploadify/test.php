<?php session_start();
	include("../lib/database.class.php");
	include("../lib/config.inc.php");

	$obj_db = new database();
	$obj_db->connect_pep();

	$targetFile = 'C:\AppServ\www\Pep2013\uploads\hm-idnumber.csv';
	$temp_filename = 'idnumber';

	$first_column = true;  // ����繨�ԧ ����ͧ load ����������
	$objCSV = fopen("".$targetFile."", "r");
	WHILE (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {

		if(!$first_column){  // �Ѵ��¡���á�������

			if($temp_filename=='address'){
			$sql = " UPDATE [tbl-address] SET [ADDRESS_LINE] = '".htmlspecialchars($objArr['2'], ENT_QUOTES)."'
							,[ADDRESS_CITY] = '".htmlspecialchars($objArr['3'], ENT_QUOTES)."'
							,[ADDRESS_STATE] = '".htmlspecialchars($objArr['4'], ENT_QUOTES)."'
							,[ADDRESS_COUNTRY] = '".htmlspecialchars($objArr['5'], ENT_QUOTES)."'
							,[SUB_ENTITY_ID] = '".$objArr['6']."'
							,[BATCH_NO] = '".$objArr['7']."'
							,[BATCH_DATE] = ".$objArr['8']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']." 
						IF @@ROWCOUNT=0
						INSERT INTO [tbl-address] ([ENTITY_ID] ,[SYS_ID] ,[ADDRESS_LINE] ,[ADDRESS_CITY] ,[ADDRESS_STATE]
							 ,[ADDRESS_COUNTRY] ,[SUB_ENTITY_ID] ,[BATCH_NO] ,[BATCH_DATE] ,[DATA_TYPE]) VALUES
						('".$objArr['0']."',".$objArr['1'].",'".htmlspecialchars($objArr['2'], ENT_QUOTES)."','".htmlspecialchars($objArr['3'], ENT_QUOTES)."','".htmlspecialchars($objArr['4'],ENT_QUOTES)."','".htmlspecialchars($objArr['5'], ENT_QUOTES)."','".$objArr['6']."','".$objArr['7']."',".$objArr['8'].",'".$array_watchlist[$temp_type]."') ";

			}elseif($temp_filename=='birthinfo'){
			$sql = " UPDATE [tbl-birthinfo] SET [INFO_TYPE] = ".$objArr['2']."
							,[BIRTHINFO_DATE] = '".$objArr['3']."'
							,[BIRTHINFO_PLACE] = '".htmlspecialchars($objArr['4'], ENT_QUOTES)."'
							,[BIRTHINFO_COUNTRY] = '".htmlspecialchars($objArr['5'], ENT_QUOTES)."'
							,[MAIN_ENTRY] = ".$objArr['6']."
							,[SUB_ENTITY_ID] = '".$objArr['7']."'
							,[BATCH_NO] = '".$objArr['8']."'
							,[BATCH_DATE] = ".$objArr['9']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']." 
 						IF @@ROWCOUNT=0
						INSERT INTO [tbl-birthinfo] ([ENTITY_ID],[SYS_ID],[INFO_TYPE],[BIRTHINFO_DATE],[BIRTHINFO_PLACE],[BIRTHINFO_COUNTRY],[MAIN_ENTRY],[SUB_ENTITY_ID],[BATCH_NO],
						[BATCH_DATE],[DATA_TYPE]) VALUES
						('".$objArr['0']."',".$objArr['1'].",".$objArr['2'].",'".$objArr['3']."','".htmlspecialchars($objArr['4'], ENT_QUOTES)."','".htmlspecialchars($objArr['5'], ENT_QUOTES)."',".$objArr['6'].",'".$objArr['7']."','".$objArr['8']."',".$objArr['9'].",'".$array_watchlist[$temp_type]."') ";

			}elseif($temp_filename=='classification'){
			$sql = " UPDATE [tbl-classification] SET [REGULATION_DESC] = '".htmlspecialchars($objArr['2'], ENT_QUOTES)."'
							,[SECTION_NO] = ".$objArr['3']."
							,[SUB_SECTION_NO] = ".$objArr['4']."
							,[SUBSUB_SECTION_NO] = ".$objArr['5']."
							,[REGULATION_MAIN] = '".htmlspecialchars($objArr['6'], ENT_QUOTES)."'
							,[REGULATION_SUB] = '".htmlspecialchars($objArr['7'], ENT_QUOTES)."'
							,[REGULATION_SUBSUB] = '".htmlspecialchars($objArr['8'], ENT_QUOTES)."'
							,[STAMP_DTTM] = ".$objArr['9']."
							,[USER_ID] = '".$objArr['10']."'
							,[MODE_MN] = '".$objArr['11']."'
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']." 
 						IF @@ROWCOUNT=0
						INSERT INTO [tbl-classification] ([ENTITY_ID],[SYS_ID],[REGULATION_DESC],[SECTION_NO] ,[SUB_SECTION_NO],[SUBSUB_SECTION_NO],[REGULATION_MAIN]
						,[REGULATION_SUB],[REGULATION_SUBSUB],[STAMP_DTTM],[USER_ID],[MODE_MN],[DATA_TYPE])
						VALUES (
						'".$objArr['0']."',".$objArr['1'].",'".$objArr['2']."',".$objArr['3'].",".$objArr['4'].",".$objArr['5'].",'".htmlspecialchars($objArr['6'], ENT_QUOTES)."','".htmlspecialchars($objArr['7'], ENT_QUOTES)."','".htmlspecialchars($objArr['8'], ENT_QUOTES)."',".$objArr['9'].", '".$objArr['10']."', '".$objArr['11']."', '".$array_watchlist[$temp_type]."' ) ";

			}elseif($temp_filename=='classification'){
			$sql = " UPDATE [tbl-criminal] SET [SINCE_DAY] = ".$objArr['2']."
							,[SINCE_MONTH] = ".$objArr['3']."
							,[TO_DAY] = ".$objArr['4']."
							,[TO_MONTH] = ".$objArr['5']."
							,[TO_YEAR] = ".$objArr['6']."
							,[REFERENCE] = '".htmlspecialchars($objArr['7'], ENT_QUOTES)."'
							,[BATCH_NO] = '".htmlspecialchars($objArr['8'], ENT_QUOTES)."'
							,[BATCH_DATE] = ".$objArr['9']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
 						IF @@ROWCOUNT=0
						INSERT INTO [tbl-criminal] ([ENTITY_ID],[SYS_ID],[SINCE_DAY],[SINCE_MONTH],[TO_DAY],[TO_MONTH],[TO_YEAR],[REFERENCE],[BATCH_NO],[BATCH_DATE]
						,[DATA_TYPE]) VALUES (
						'".$objArr['0']."',".$objArr['1'].",".$objArr['2'].",".$objArr['3'].",".$objArr['4'].",".$objArr['5'].",".$objArr['6'].",'".htmlspecialchars($objArr['7'], ENT_QUOTES)."','".htmlspecialchars($objArr['8'], ENT_QUOTES)."',".$objArr['9'].", '".$array_watchlist[$temp_type]."' ";

			}elseif($temp_filename=='description'){
			$sql = " UPDATE [tbl-description] SET [DESCRIPTION] = '".htmlspecialchars($objArr['2'], ENT_QUOTES)."'
							,[BATCH_NO] = '".$objArr['3']."'
							,[BATCH_DATE] = ".$objArr['4']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
 						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-description] ([ENTITY_ID],[SYS_ID],[DESCRIPTION],[BATCH_NO],[BATCH_DATE],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].", '".htmlspecialchars($objArr['2'], ENT_QUOTES)."', '".$objArr['3']."',".$objArr['4'].", '".$array_watchlist[$temp_type]."' ) ";

			}elseif($temp_filename=='education'){
			$sql = " UPDATE [tbl-education] SET [SINCE_DAY] = ".$objArr['2']."
							,[SINCE_MONTH] = ".$objArr['3']."
							,[SINCE_YEAR] = ".$objArr['4']."
							,[TO_DAY] = ".$objArr['5']."
							,[TO_MONTH] = ".$objArr['6']."
							,[TO_YEAR] = ".$objArr['7']."
							,[INSTITUTE_NAME] = '".htmlspecialchars($objArr['8'], ENT_QUOTES)."'
							,[QUALIFICATION] = '".htmlspecialchars($objArr['9'], ENT_QUOTES)."'
							,[MAJOR_SUBJECT] = '".htmlspecialchars($objArr['10'], ENT_QUOTES)."'
							,[BATCH_NO] = '".$objArr['11']."'
							,[BATCH_DATE] = ".$objArr['12']."
							,[USER_ID] = '".$objArr['13']."'
							,[STAMP_DTTM] = ".$objArr['14']."
							,[MODE_MN] = '".$objArr['15']."'
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-education] ([ENTITY_ID],[SYS_ID],[SINCE_DAY],[SINCE_MONTH],[SINCE_YEAR],[TO_DAY],[TO_MONTH],[TO_YEAR]
							,[INSTITUTE_NAME],[QUALIFICATION],[MAJOR_SUBJECT],[BATCH_NO],[BATCH_DATE],[USER_ID],[STAMP_DTTM],[MODE_MN],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].",".$objArr['2'].",".$objArr['3'].",".$objArr['4'].",".$objArr['5'].",".$objArr['6'].",".$objArr['7']." 
						,'".htmlspecialchars($objArr['8'], ENT_QUOTES)."','".htmlspecialchars($objArr['9'], ENT_QUOTES)."','".htmlspecialchars($objArr['10'], ENT_QUOTES)."'
						,'".$objArr['11']."', ".$objArr['12'].", '".$objArr['13']."',".$objArr['14']." ,'".$objArr['15']."','".$array_watchlist[$temp_type]."' ) ";

			}elseif($temp_filename=='falsepositve'){
			$sql = " UPDATE [tbl-falsepositve] SET [FALSE_POSITIVE] = ".$objArr['1']."
							,[FALSE_POSITIVE_EXPIRY_DT] = ".$objArr['2']."
							,[BATCH_NO] = '".$objArr['3']."'
							,[BATCH_DATE] = ".$objArr['4']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."'
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-falsepositve]([ENTITY_ID],[FALSE_POSITIVE],[FALSE_POSITIVE_EXPIRY_DT],[BATCH_NO],[BATCH_DATE],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].",".$objArr['2'].",'".$objArr['3']."',".$objArr['4'].",'".$array_watchlist[$temp_type]."'); ";
		
			}elseif($temp_filename=='idnumber'){
			$sql = " UPDATE [tbl-idnumber] SET [ID_TYPE_CODE] = ".$objArr['2']."
							,[ID_TYPE] = '".htmlspecialchars($objArr['3'], ENT_QUOTES)."'
							,[ID_VALUE] = '".htmlspecialchars($objArr['4'], ENT_QUOTES)."'
							,[ID_COUNTRY] = '".htmlspecialchars($objArr['5'], ENT_QUOTES)."'
							,[ID_ISSUEDATE] = '".$objArr['6']."'
							,[ID_EXPIRYDATE] = '".$objArr['7']."'
							,[ID_ADDN_REF] = '".htmlspecialchars($objArr['8'], ENT_QUOTES)."'
							,[SUB_ENTITY_ID] = '".$objArr['9']."'
							,[INFO_SOURCE] = '".$objArr['10']."'
							,[ORG_ID] = '".$objArr['11']."'
							,[BATCH_NO] = '".$objArr['12']."'
							,[BATCH_DATE] = ".$objArr['13']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-idnumber] ([ENTITY_ID],[SYS_ID],[ID_TYPE_CODE],[ID_TYPE],[ID_VALUE],[ID_COUNTRY],[ID_ISSUEDATE],[ID_EXPIRYDATE]
							,[ID_ADDN_REF],[SUB_ENTITY_ID],[INFO_SOURCE],[ORG_ID],[BATCH_NO],[BATCH_DATE],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].",".$objArr['2'].",'".htmlspecialchars($objArr['3'], ENT_QUOTES)."','".htmlspecialchars($objArr['4'], ENT_QUOTES)."','".htmlspecialchars($objArr['5'], ENT_QUOTES)."','".$objArr['6']."','".$objArr['7']."','".htmlspecialchars($objArr['8'], ENT_QUOTES)."',
						'".$objArr['9']."','".$objArr['10']."','".$objArr['11']."','".$objArr['12']."', ".$objArr['13'].",'".$array_watchlist[$temp_type]."') ";

			}elseif($temp_filename=='image'){
			$sql = " UPDATE [tbl-image] SET [IMAGE_URL] = '".$objArr['2']."'
							,[BATCH_NO] = '".$objArr['3']."'
							,[BATCH_DATE] = ".$objArr['4']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-image] ([ENTITY_ID],[SYS_ID],[IMAGE_URL],[BATCH_NO],[BATCH_DATE],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].",'".$objArr['2']."','".$objArr['3']."',".$objArr['4'].",'".$array_watchlist[$temp_type]."') ";

			}elseif($temp_filename=='master'){
			$sql = " UPDATE [tbl-master] SET [INFO_SOURCE] = '".$objArr['1']."'
							,[ENTITY_TYPE] = '".$objArr['2']."'
							,[BRIEF_NAME] = '".htmlspecialchars($objArr['3'], ENT_QUOTES)."'
							,[GENDER] = '".$objArr['4']."'
							,[EXISTING_STATUS] = ".$objArr['5']."
							,[BIRTH_PLACE] = '".htmlspecialchars($objArr['6'], ENT_QUOTES)."'
							,[PROFILE_NOTES] = '".htmlspecialchars($objArr['7'], ENT_QUOTES)."'
							,[DATE_OF_BIRTH] = '".$objArr['8']."'
							,[DATE_OF_DEATH] = '".$objArr['9']."'
							,[ACTIVE_STATUS] = '".$objArr['10']."'
							,[COMP_CODE] = ".$objArr['11']."
							,[DECEASED] = '".htmlspecialchars($objArr['12'], ENT_QUOTES)."'
							,[HIGH_RISK_COUNTRY] = '".htmlspecialchars($objArr['13'], ENT_QUOTES)."'
							,[HIGH_RISK_COUNTRY_SCORE] = ".$objArr['14']."
							,[FALSE_POSITIVE] = ".$objArr['15']."
							,[FALSE_POSITIVE_EXPIRY_DT] = ".$objArr['16']."
							,[BATCH_NO] = '".$objArr['17']."'
							,[BATCH_DATE] = ".$objArr['18']."
							,[APPROVAL_STATUS] = ".$objArr['19']."
							,[RJ_REMARKS] = '".htmlspecialchars($objArr['20'], ENT_QUOTES)."'
							,[APPROVED_BY] = '".$objArr['21']."'
							,[APPROVED_DT] = ".$objArr['22']."
							,[APPROVED_TM] = ".$objArr['23']."
							,[ACTION] = '".$objArr['24']."'
							,[LAST_UPDATE_DATE] = '".$objArr['25']."'
							,[STAMP_DTTM] = '".$objArr['26']."'
							,[USER_ID] = '".$objArr['27']."'
							,[MODE_MN] = '".$objArr['28']."'
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' 
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-master] ([ENTITY_ID],[INFO_SOURCE],[ENTITY_TYPE],[BRIEF_NAME],[GENDER],[EXISTING_STATUS],[BIRTH_PLACE],[PROFILE_NOTES],[DATE_OF_BIRTH]
							,[DATE_OF_DEATH],[ACTIVE_STATUS],[COMP_CODE],[DECEASED],[HIGH_RISK_COUNTRY],[HIGH_RISK_COUNTRY_SCORE],[FALSE_POSITIVE],[FALSE_POSITIVE_EXPIRY_DT]
							,[BATCH_NO],[BATCH_DATE],[APPROVAL_STATUS],[RJ_REMARKS],[APPROVED_BY],[APPROVED_DT],[APPROVED_TM],[ACTION],[LAST_UPDATE_DATE],[STAMP_DTTM]
							,[USER_ID],[MODE_MN],[DATA_TYPE])
						VALUES ('".$objArr['0']."','".$objArr['1']."','".$objArr['2']."','".htmlspecialchars($objArr['3'], ENT_QUOTES)."','".$objArr['4']."',".$objArr['5'].",'".htmlspecialchars($objArr['6'], ENT_QUOTES)."','".htmlspecialchars($objArr['7'], ENT_QUOTES)."','".$objArr['8']."','".$objArr['9']."','".$objArr['10']."',".$objArr['11'].",'".htmlspecialchars($objArr['12'], ENT_QUOTES)."','".htmlspecialchars($objArr['13'], ENT_QUOTES)."',".$objArr['14'].",".$objArr['15'].",".$objArr['16'].",'".$objArr['17']."',".$objArr['18'].",".$objArr['19'].",'".htmlspecialchars($objArr['20'], ENT_QUOTES)."','".$objArr['21']."',".$objArr['22'].",".$objArr['23'].",'".$objArr['24']."','".$objArr['25']."','".$objArr['26']."','".$objArr['27']."','".$objArr['28']."','".$array_watchlist[$temp_type]."') ";

			}elseif($temp_filename=='name'){
			$sql = " UPDATE [tbl-name] SET [NAME_TYPE] = '".htmlspecialchars($objArr['2'], ENT_QUOTES)."'
							,[FIRST_NAME] = '".htmlspecialchars($objArr['3'], ENT_QUOTES)."'
							,[MIDDLE_NAME] = '".htmlspecialchars($objArr['4'], ENT_QUOTES)."'
							,[SURNAME] = '".htmlspecialchars($objArr['5'], ENT_QUOTES)."'
							,[SUFFIX] = '".htmlspecialchars($objArr['6'], ENT_QUOTES)."'
							,[ENTITY_NAME] = '".htmlspecialchars($objArr['7'], ENT_QUOTES)."'
							,[ENGLISH_NAME] = '".htmlspecialchars($objArr['8'], ENT_QUOTES)."'
							,[SINGLE_STRING_NAME] = '".htmlspecialchars($objArr['9'], ENT_QUOTES)."'
							,[ORIGINAL_SCRIPT_NAME] = '".htmlspecialchars($objArr['10'], ENT_QUOTES)."'
							,[FALSE_POSITIVE] = ".$objArr['11']."
							,[FALSE_POSITIVE_EXPIRY_DT] = ".$objArr['12']."
							,[APPROVAL_STATUS] = ".$objArr['13']."
							,[SUB_ENTITY_ID] = '".$objArr['14']."'
							,[CATEGORY] = '".$objArr['15']."'
							,[HIGH_RISK_COUNTRY] = '".htmlspecialchars($objArr['16'], ENT_QUOTES)."'
							,[HIGH_RISK_COUNTRY_SCORE] = ".$objArr['17']."
							,[INFO_SOURCE] = '".$objArr['18']."'
							,[ORG_ID] = '".$objArr['19']."'
							,[ACTION] = '".$objArr['20']."'
							,[ID_REF_NO] = '".htmlspecialchars($objArr['21'], ENT_QUOTES)."'
							,[BATCH_NO] = '".$objArr['22']."'
							,[BATCH_DATE] = ".$objArr['23']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-name] ([ENTITY_ID],[SYS_ID],[NAME_TYPE],[FIRST_NAME],[MIDDLE_NAME],[SURNAME],[SUFFIX],[ENTITY_NAME],[ENGLISH_NAME]
							,[SINGLE_STRING_NAME],[ORIGINAL_SCRIPT_NAME],[FALSE_POSITIVE],[FALSE_POSITIVE_EXPIRY_DT],[APPROVAL_STATUS],[SUB_ENTITY_ID]
							,[CATEGORY],[HIGH_RISK_COUNTRY],[HIGH_RISK_COUNTRY_SCORE],[INFO_SOURCE],[ORG_ID],[ACTION],[ID_REF_NO],[BATCH_NO],[BATCH_DATE],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].",'".htmlspecialchars($objArr['2'], ENT_QUOTES)."','".htmlspecialchars($objArr['3'], ENT_QUOTES)."','".htmlspecialchars($objArr['4'], ENT_QUOTES)."','".htmlspecialchars($objArr['5'], ENT_QUOTES)."','".htmlspecialchars($objArr['6'], ENT_QUOTES)."','".htmlspecialchars($objArr['7'], ENT_QUOTES)."','".htmlspecialchars($objArr['8'], ENT_QUOTES)."','".htmlspecialchars($objArr['9'], ENT_QUOTES)."','".htmlspecialchars($objArr['10'], ENT_QUOTES)."',".$objArr['11'].",".$objArr['12'].",".$objArr['13'].",'".$objArr['14']."','".$objArr['15']."','".htmlspecialchars($objArr['16'], ENT_QUOTES)."',".$objArr['17'].",'".$objArr['18']."','".$objArr['19']."','".$objArr['20']."','".htmlspecialchars($objArr['21'], ENT_QUOTES)."','".$objArr['22']."',".$objArr['23'].",'".$array_watchlist[$temp_type]."') ";

			}elseif($temp_filename=='relationship'){
			$sql = " UPDATE [tbl-relationship] SET 
							,[ASSOCIATE_ENTITY] = '".$objArr['2']."'
							,[RELATIONSHIP_TYPE] = '".htmlspecialchars($objArr['3'], ENT_QUOTES)."'
							,[EX_RELATIONSHIP] = '".$objArr['4']."'
							,[BATCH_NO] = '".$objArr['5']."'
							,[BATCH_DATE] = ".$objArr['6']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-relationship]([ENTITY_ID],[SYS_ID],[ASSOCIATE_ENTITY],[RELATIONSHIP_TYPE],[EX_RELATIONSHIP],[BATCH_NO],
							[BATCH_DATE],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].",'".$objArr['2']."','".htmlspecialchars($objArr['3'], ENT_QUOTES)."','".$objArr['4']."','".$objArr['5']."',".$objArr['6'].",'".$array_watchlist[$temp_type]."') ";

	 		}elseif($temp_filename=='relationship'){
			$sql = " UPDATE [tbl-resident] SET [TYPE] = ".$objArr['2']."
							,[COUNTRY_TYPE] = '".htmlspecialchars($objArr['3'], ENT_QUOTES)."'
							,[COUNTRY_CODE] = '".htmlspecialchars($objArr['4'], ENT_QUOTES)."'
							,[COUNTRY_DESC] = '".htmlspecialchars($objArr['5'], ENT_QUOTES)."'
							,[MAIN_ENTRY] = ".$objArr['6']."
							,[SUB_ENTITY_ID] = '".$objArr['7']."'
							,[BATCH_NO] = '".$objArr['8']."'
							,[BATCH_DATE] = ".$objArr['9']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-resident]([ENTITY_ID],[SYS_ID],[TYPE],[COUNTRY_TYPE],[COUNTRY_CODE],[COUNTRY_DESC],[MAIN_ENTRY],[SUB_ENTITY_ID],[BATCH_NO],
							[BATCH_DATE],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].",".$objArr['2'].",'".htmlspecialchars($objArr['3'], ENT_QUOTES)."','".htmlspecialchars($objArr['4'], ENT_QUOTES)."','".htmlspecialchars($objArr['5'], ENT_QUOTES)."',".$objArr['6'].",'".$objArr['7']."','".$objArr['8']."',".$objArr['9'].",'".$array_watchlist[$temp_type]."') ";

			}elseif($temp_filename=='role'){
			$sql = " UPDATE [tbl-role] SET [ROLE_TYPE] = '".htmlspecialchars($objArr['2'], ENT_QUOTES)."'
							,[SINCE_DAY] = ".$objArr['3']."
							,[SINCE_MONTH] = ".$objArr['4']."
							,[SINCE_YEAR] = ".$objArr['5']."
							,[TO_DAY] = ".$objArr['6']."
							,[TO_MONTH] = ".$objArr['7']."
							,[TO_YEAR] = ".$objArr['8']."
							,[OCC_CATEGORY] = '".htmlspecialchars($objArr['9'], ENT_QUOTES)."'
							,[OCC_TITLE] = '".htmlspecialchars($objArr['10'], ENT_QUOTES)."'
							,[ROLE_LOCATION] = '".htmlspecialchars($objArr['11'], ENT_QUOTES)."'
							,[BATCH_NO] = '".$objArr['12']."'
							,[BATCH_DATE] = ".$objArr['13']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-role] ([ENTITY_ID],[SYS_ID],[ROLE_TYPE],[SINCE_DAY],[SINCE_MONTH],[SINCE_YEAR],[TO_DAY],[TO_MONTH],[TO_YEAR],[OCC_CATEGORY],
							[OCC_TITLE],[ROLE_LOCATION],[BATCH_],BATCH_DATE],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].",'".htmlspecialchars($objArr['2'], ENT_QUOTES)."',".$objArr['3'].",".$objArr['4'].",".$objArr['5'].",".$objArr['6'].",".$objArr['7'].",".$objArr['8'].",'".htmlspecialchars($objArr['9'], ENT_QUOTES)."','".htmlspecialchars($objArr['10'], ENT_QUOTES)."','".htmlspecialchars($objArr['11'], ENT_QUOTES)."','".$objArr['12']."',".$objArr['13'].",'".$array_watchlist[$temp_type]."' ) ";

			}elseif($temp_filename=='sanction'){
			$sql = " UPDATE [tbl-sanction] SET [SINCE_DAY] = ".$objArr['2']."
							,[SINCE_MONTH] = ".$objArr['3']."
							,[SINCE_YEAR] = ".$objArr['4']."
							,[TO_DAY] = ".$objArr['5']."
							,[TO_MONTH] = ".$objArr['6']."
							,[TO_YEAR] = ".$objArr['7']."
							,[REFERENCE] = '".htmlspecialchars($objArr['8'], ENT_QUOTES)."'
							,[BATCH_NO] = '".$objArr['9']."'
							,[BATCH_DATE] = ".$objArr['10']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-sanction] ([ENTITY_ID],[SYS_ID],[SINCE_DAY],[SINCE_MONTH],[SINCE_YEAR],[TO_DAY],[TO_MONTH],[TO_YEAR]
							,[REFERENCE],[BATCH_NO],[BATCH_DATE],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].",".$objArr['2'].",".$objArr['3'].",".$objArr['4'].",".$objArr['5'].",".$objArr['6'].",".$objArr['7'].",'".htmlspecialchars($objArr['8'], ENT_QUOTES)."','".$objArr['9']."',".$objArr['10'].",'".$array_watchlist[$temp_type]."' ) ";

			}elseif($temp_filename=='source'){
			$sql = " UPDATE [tbl-source] SET [NAME] = '".htmlspecialchars($objArr['2'], ENT_QUOTES)."'
							,[BATCH_NO] = '".$objArr['3']."'
							,[BATCH_DATE] = ".$objArr['4']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-source] ([ENTITY_ID],[SYS_ID],[NAME],[BATCH_NO],[BATCH_DATE],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].",'".htmlspecialchars($objArr['2'],ENT_QUOTES)."','".$objArr['3']."',".$objArr['4'].",'".$array_watchlist[$temp_type]."') ";
	
			}elseif($temp_filename=='str'){
			$sql = " UPDATE [tbl-str] SET [ACCOUNT_NO] = '".htmlspecialchars($objArr['2'], ENT_QUOTES)."'
							,[REF_CASE_NO] = '".htmlspecialchars($objArr['3'], ENT_QUOTES)."'
							,[REF_NOTICE_NO] = '".htmlspecialchars($objArr['4'], ENT_QUOTES)."'
							,[DOC_TYPE] = '".$objArr['5']."'
							,[DOC_CONTROL_NO] = '".htmlspecialchars($objArr['6'], ENT_QUOTES)."'
							,[ORG_ID] = '".$objArr['7']."'
							,[ORG_NAME] = '".htmlspecialchars($objArr['8'], ENT_QUOTES)."'
							,[BATCH_NO] = '".$objArr['9']."'
							,[BATCH_DATE] = ".$objArr['10']."
							,[DOWNLOADABLE_IND] = ".$objArr['11']."
							,[PUBLIC_IND] = ".$objArr['12']."
							,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
						WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
						IF @@ROWCOUNT=0 
						INSERT INTO [tbl-str] ([ENTITY_ID],[SYS_ID],[ACCOUNT_NO],[REF_CASE_NO],[REF_NOTICE_NO],[DOC_TYPE],[DOC_CONTROL_NO],[ORG_ID]
							,[ORG_NAME],[BATCH_NO],[BATCH_DATE],[DOWNLOADABLE_IND],[PUBLIC_IND],[DATA_TYPE])
						VALUES('".$objArr['0']."',".$objArr['1'].",'".htmlspecialchars($objArr['2'], ENT_QUOTES)."','".htmlspecialchars($objArr['3'], ENT_QUOTES)."','".htmlspecialchars($objArr['4'], ENT_QUOTES)."','".$objArr['5']."','".htmlspecialchars($objArr['6'], ENT_QUOTES)."','".$objArr['7']."','".htmlspecialchars($objArr['8'], ENT_QUOTES)."','".$objArr['9']."',".$objArr['10'].",".$objArr['11'].",".$objArr['12'].",'".$array_watchlist[$temp_type]."') ";

			}elseif($temp_filename=='vessel'){
			$sql = " UPDATE [tbl-vessel] SET [VESSEL_CALL_SIGN] = '".htmlspecialchars($objArr['2'], ENT_QUOTES)."'
						,[VESSEL_TYPE] = '".htmlspecialchars($objArr['3'], ENT_QUOTES)."'
						,[VESSEL_TONNAGE] = '".htmlspecialchars($objArr['4'], ENT_QUOTES)."'
						,[VESSEL_GRT] = '".htmlspecialchars($objArr['5'], ENT_QUOTES)."'
						,[VESSEL_OWNER] = '".htmlspecialchars($objArr['6'], ENT_QUOTES)."'
						,[VESSEL_FLAG] = '".htmlspecialchars($objArr['7'], ENT_QUOTES)."'
						,[BATCH_NO] = '".$objArr['8']."'
						,[BATCH_DATE] = ".$objArr['9']."
						,[DATA_TYPE] = '".$array_watchlist[$temp_type]."'
					WHERE [ENTITY_ID] = '".$objArr['0']."' AND [SYS_ID] = ".$objArr['1']."
					IF @@ROWCOUNT=0 
					INSERT INTO [tbl-vessel] ([ENTITY_ID],[SYS_ID],[VESSEL_CALL_SIGN],[VESSEL_TYPE],[VESSEL_TONNAGE],[VESSEL_GRT],[VESSEL_OWNER]
						,[VESSEL_FLAG],[BATCH_NO],[BATCH_DATE],[DATA_TYPE])
					VALUES('".$objArr['0']."',".$objArr['1'].",'".htmlspecialchars($objArr['2'], ENT_QUOTES)."','".htmlspecialchars($objArr['3'], ENT_QUOTES)."','".htmlspecialchars($objArr['4'], ENT_QUOTES)."','".htmlspecialchars($objArr['5'], ENT_QUOTES)."','".htmlspecialchars($objArr['6'], ENT_QUOTES)."','".htmlspecialchars($objArr['7'], ENT_QUOTES)."','".$objArr['8']."',".$objArr['9'].",'".$array_watchlist[$temp_type]."') ";

			 } // end if temp_filename

			echo $sql."<br>";

			if(trim($objArr['0'])<>''){
				$obj_db->query($sql);
			} // end if objArr['0']

		}else{
			$first_column = false;
		} // end if first_column

	} // end while 
	
	fclose($objCSV);

$obj_db->close();

?>