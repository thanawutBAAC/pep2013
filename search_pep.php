<?session_start();
	include("lib/config.inc.php");
	include("lib/database.class.php");
	$obj_db = new database();
	$obj_db->connect_pep();

/*
	<option value="AF">Afghanistan</option>
	<option value="AL">Albania</option>
	<option value="DZ">Algeria</option>
	<option value="AS">American Samoa</option>
	<option value="AD">Andorra</option>
	<option value="AG">Angola</option>
	<option value="AI">Anguilla</option>
	<option value="AG">Antigua &amp; Barbuda</option>
	<option value="AR">Argentina</option>
	<option value="AA">Armenia</option>
	<option value="AW">Aruba</option>
	<option value="AU">Australia</option>
	<option value="AT">Austria</option>
	<option value="AZ">Azerbaijan</option>
	<option value="BS">Bahamas</option>
	<option value="BH">Bahrain</option>
	<option value="BD">Bangladesh</option>
	<option value="BB">Barbados</option>
	<option value="BY">Belarus</option>
	<option value="BE">Belgium</option>
	<option value="BZ">Belize</option>
	<option value="BJ">Benin</option>
	<option value="BM">Bermuda</option>
	<option value="BT">Bhutan</option>
	<option value="BO">Bolivia</option>
	<option value="BL">Bonaire</option>
	<option value="BA">Bosnia &amp; Herzegovina</option>
	<option value="BW">Botswana</option>
	<option value="BR">Brazil</option>
	<option value="BC">British Indian Ocean Ter</option>
	<option value="BN">Brunei</option>
	<option value="BG">Bulgaria</option>
	<option value="BF">Burkina Faso</option>
	<option value="BI">Burundi</option>
	<option value="KH">Cambodia</option>
	<option value="CM">Cameroon</option>
	<option value="CA">Canada</option>
	<option value="IC">Canary Islands</option>
	<option value="CV">Cape Verde</option>
	<option value="KY">Cayman Islands</option>
	<option value="CF">Central African Republic</option>
	<option value="TD">Chad</option>
	<option value="CD">Channel Islands</option>
	<option value="CL">Chile</option>
	<option value="CN">China</option>
	<option value="CI">Christmas Island</option>
	<option value="CS">Cocos Island</option>
	<option value="CO">Colombia</option>
	 <option value="CC">Comoros</option>
 	<option value="CG">Congo</option>
 	<option value="CK">Cook Islands</option>
 	<option value="CR">Costa Rica</option>
 	<option value="CT">Cote D'Ivoire</option>
 	<option value="HR">Croatia</option>
 	<option value="CU">Cuba</option>
 	<option value="CB">Curacao</option>
 	<option value="CY">Cyprus</option>
 	<option value="CZ">Czech Republic</option>
 	<option value="DK">Denmark</option>
 	<option value="DJ">Djibouti</option>
 	<option value="DM">Dominica</option>
 	<option value="DO">Dominican Republic</option>
 	<option value="TM">East Timor</option>
 	<option value="EC">Ecuador</option>
 	<option value="EG">Egypt</option>
 	<option value="SV">El Salvador</option>
 	<option value="GQ">Equatorial Guinea</option>
 	<option value="ER">Eritrea</option>
 	<option value="EE">Estonia</option>
 	<option value="ET">Ethiopia</option>
 	<option value="FA">Falkland Islands</option>
 	<option value="FO">Faroe Islands</option>
 	<option value="FJ">Fiji</option>
 	<option value="FI">Finland</option>
 	<option value="FR">France</option>
 	<option value="GF">French Guiana</option>
 	<option value="PF">French Polynesia</option>
 	<option value="FS">French Southern Ter</option>
 	<option value="GA">Gabon</option>
 	<option value="GM">Gambia</option>
 	<option value="GE">Georgia</option>
 	<option value="DE">Germany</option>
 	<option value="GH">Ghana</option>
 	<option value="GI">Gibraltar</option>
 	<option value="GB">Great Britain</option>
 	<option value="GR">Greece</option>
 	<option value="GL">Greenland</option>
 	<option value="GD">Grenada</option>
 	<option value="GP">Guadeloupe</option>
 	<option value="GU">Guam</option>
 	<option value="GT">Guatemala</option>
 	<option value="GN">Guinea</option>
 	<option value="GY">Guyana</option>
 	<option value="HT">Haiti</option>
 	<option value="HW">Hawaii</option>
 	<option value="HN">Honduras</option>
 	<option value="HK">Hong Kong</option>
 	<option value="HU">Hungary</option>
 	<option value="IS">Iceland</option>
 	<option value="IN">India</option>
 	<option value="ID">Indonesia</option>
 	<option value="IA">Iran</option>
 	<option value="IQ">Iraq</option>
 	<option value="IR">Ireland</option>
 	<option value="IM">Isle of Man</option>
 	<option value="IL">Israel</option>
 	<option value="IT">Italy</option>
 	<option value="JM">Jamaica</option>
 	<option value="JP">Japan</option>
 	<option value="JO">Jordan</option>
 	<option value="KZ">Kazakhstan</option>
 	<option value="KE">Kenya</option>
 	<option value="KI">Kiribati</option>
 	<option value="NK">Korea North</option>
 	<option value="KS">Korea South</option>
 	<option value="KW">Kuwait</option>
 	<option value="KG">Kyrgyzstan</option>
 	<option value="LA">Laos</option>
 	<option value="LV">Latvia</option>
 	<option value="LB">Lebanon</option>
 	<option value="LS">Lesotho</option>
 	<option value="LR">Liberia</option>
 	<option value="LY">Libya</option>
 	<option value="LI">Liechtenstein</option>
 	<option value="LT">Lithuania</option>
 	<option value="LU">Luxembourg</option>
 	<option value="MO">Macau</option>
 	<option value="MK">Macedonia</option>
 	<option value="MG">Madagascar</option>
 	<option value="MY">Malaysia</option>
 	<option value="MW">Malawi</option>
 	<option value="MV">Maldives</option>
 	<option value="ML">Mali</option>
 	<option value="MT">Malta</option>
 	<option value="MH">Marshall Islands</option>
 	<option value="MQ">Martinique</option>
 	<option value="MR">Mauritania</option>
 	<option value="MU">Mauritius</option>
 	<option value="ME">Mayotte</option>
 	<option value="MX">Mexico</option>
 	<option value="MI">Midway Islands</option>
 	<option value="MD">Moldova</option>
 	<option value="MC">Monaco</option>
 	<option value="MN">Mongolia</option>
 	<option value="MS">Montserrat</option>
 	<option value="MA">Morocco</option>
 	<option value="MZ">Mozambique</option>
 	<option value="MM">Myanmar</option>
 	<option value="NA">Nambia</option>
 	<option value="NU">Nauru</option>
 	<option value="NP">Nepal</option>
 	<option value="AN">Netherland Antilles</option>
 	<option value="NL">Netherlands (Holland, Europe)</option>
 	<option value="NV">Nevis</option>
 	<option value="NC">New Caledonia</option>
 	<option value="NZ">New Zealand</option>
 	<option value="NI">Nicaragua</option>
 	<option value="NE">Niger</option>
 	<option value="NG">Nigeria</option>
 	<option value="NW">Niue</option>
 	<option value="NF">Norfolk Island</option>
 	<option value="NO">Norway</option>
 	<option value="OM">Oman</option>
 	<option value="PK">Pakistan</option>
 	<option value="PW">Palau Island</option>
 	<option value="PS">Palestine</option>
 	<option value="PA">Panama</option>
 	<option value="PG">Papua New Guinea</option>
 	<option value="PY">Paraguay</option>
 	<option value="PE">Peru</option>
 	<option value="PH">Philippines</option>
 	<option value="PO">Pitcairn Island</option>
 	<option value="PL">Poland</option>
 	<option value="PT">Portugal</option>
 	<option value="PR">Puerto Rico</option>
 	<option value="QA">Qatar</option>
 	<option value="ME">Republic of Montenegro</option>
 	<option value="RS">Republic of Serbia</option>
 	<option value="RE">Reunion</option>
 	<option value="RO">Romania</option>
 	<option value="RU">Russia</option>
 	<option value="RW">Rwanda</option>
 	<option value="NT">St Barthelemy</option>
 	<option value="EU">St Eustatius</option>
 	<option value="HE">St Helena</option>
 	<option value="KN">St Kitts-Nevis</option>
 	<option value="LC">St Lucia</option>
 	<option value="MB">St Maarten</option>
 	<option value="PM">St Pierre &amp; Miquelon</option>
 	<option value="VC">St Vincent &amp; Grenadines</option>
 	<option value="SP">Saipan</option>
 	<option value="SO">Samoa</option>
 	<option value="AS">Samoa American</option>
 	<option value="SM">San Marino</option>
 	<option value="ST">Sao Tome &amp; Principe</option>
 	<option value="SA">Saudi Arabia</option>
 	<option value="SN">Senegal</option>
 	<option value="RS">Serbia</option>
 	<option value="SC">Seychelles</option>
 	<option value="SL">Sierra Leone</option>
 	<option value="SG">Singapore</option>
 	<option value="SK">Slovakia</option>
 	<option value="SI">Slovenia</option>
 	<option value="SB">Solomon Islands</option>
 	<option value="OI">Somalia</option>
 	<option value="ZA">South Africa</option>
 	<option value="ES">Spain</option>
 	<option value="LK">Sri Lanka</option>
 	<option value="SD">Sudan</option>
 	<option value="SR">Suriname</option>
 	<option value="SZ">Swaziland</option>
 	<option value="SE">Sweden</option>
 	<option value="CH">Switzerland</option>
 	<option value="SY">Syria</option>
 	<option value="TA">Tahiti</option>
 	<option value="TW">Taiwan</option>
 	<option value="TJ">Tajikistan</option>
 	<option value="TZ">Tanzania</option>
 	<option value="TH" selected>Thailand</option>
 	<option value="TG">Togo</option>
 	<option value="TK">Tokelau</option>
 	<option value="TO">Tonga</option>
 	<option value="TT">Trinidad &amp; Tobago</option>
 	<option value="TN">Tunisia</option>
 	<option value="TR">Turkey</option>
 	<option value="TU">Turkmenistan</option>
 	<option value="TC">Turks &amp; Caicos Is</option>
 	<option value="TV">Tuvalu</option>
 	<option value="UG">Uganda</option>
 	<option value="UA">Ukraine</option>
 	<option value="AE">United Arab Emirates</option>
 	<option value="GB">United Kingdom</option>
 	<option value="US">United States of America</option>
 	<option value="UY">Uruguay</option>
 	<option value="UZ">Uzbekistan</option>
 	<option value="VU">Vanuatu</option>
 	<option value="VS">Vatican City State</option>
 	<option value="VE">Venezuela</option>
 	<option value="VN">Vietnam</option>
 	<option value="VB">Virgin Islands (Brit)</option>
 	<option value="VA">Virgin Islands (USA)</option>
 	<option value="WK">Wake Island</option>
 	<option value="WF">Wallis &amp; Futana Is</option>
 	<option value="YE">Yemen</option>
 	<option value="ZR">Zaire</option>
 	<option value="ZM">Zambia</option>
 	<option value="ZW">Zimbabwe</option>

*/

?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$webSite['title'] ?></title>
	<?=$webSite['meta']; ?>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<script src="js/ie8-responsive-file-warning.js"></script>
	<![endif]-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/DT_bootstrap.js"></script>

<script type="text/javascript">

	$(document).ready(function(){

		if($("[rel=tooltip]").length) {
			$("[rel=tooltip]").tooltip();
		} 

		$("#btn_clear").click(function(){
			$("#name_search").val("");
			$("#first_name").val("");
			$("#epithet").val("");
			$("#surname").val("");
			$("#number_search").val("");
			$("#slt_country").val('TH');
			$("#slt_job").get(0).selectedIndex = 0;

			$("#div_result").html("");			// ล้างค่าที่ค้นหา
		});

		$("#rad02").attr('checked', true).click(function(){
			$("#name_search").prop('disabled', true);
			$("#first_name").prop('disabled', false);
			$("#epithet").prop('disabled', false);
			$("#surname").prop('disabled', false);
			$("#match_check").prop('disabled', false);
		});

		$("#rad01").attr('checked', true).click(function(){
			$("#name_search").prop('disabled', false);
			$("#first_name").prop('disabled', true);
			$("#epithet").prop('disabled', true);
			$("#surname").prop('disabled', true);
			$("#match_check").prop('disabled', true);
		});

	}); // end document ready

	function SubmitData(){

		// ตรวจสอบเงื่อนไขการเลือกค้นหาข้อมูล
		if(document.getElementById("rad01").checked){
			if(document.getElementById("name_search").value.length==0 && document.getElementById("number_search").value.length==0){
				alert(' กรุณาป้อนข้อมูล [ ชื่อที่ต้องการค้นหา ] ');
				document.getElementById("name_search").focus();
				return false;
			} // end if 
		}else if(document.getElementById("rad02").checked){
			if(document.getElementById("first_name").value.length==0 && document.getElementById("epithet").value.length==0 && document.getElementById("surname").value.length==0 && document.getElementById("number_search").value.length==0 && document.getElementById("number_search").value.length==0){
				alert(' กรุณาป้อนข้อมูล [ ชื่อแรก, ชื่อรอง, นามสกุล, หมายเลขอ้างอิง ] อย่างใดอย่างหนึ่ง ');
				return false;
			} // end if 
		} // end if 

			// ส่งโดย POST jquery		$( "#slt_country option:selected" ).text();
		$.post("ajax_search.php", { slt_type: $("#slt_type").val(), name_search: $("#name_search").val(), first_name: $("#first_name").val(), epithet: $("#epithet").val(), surname: $("#surname").val(), number_search: $("#number_search").val(), country_id: $("#slt_country option:selected").val(), country_search: $("#slt_country option:selected").text(), job_id: $("#slt_job option:selected").val(), job_search: $("#slt_job option:selected").text(), rd_type: $('input[name=rd_type]:checked', '#myForm').val() },

			function(result) {
				$("#div_result").html(result);
				$("#div_result").show();

				$('#example').dataTable( {
					"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
					"sPaginationType": "bootstrap",
					"oLanguage": {
						"sLengthMenu": "_MENU_ records per page"
					}
				} ); // end function result

			},''); // end post 

	} // end function SubmitData

</script>

</head>
<body>

<div class="container" >
<div class="row" style='margin-top:5px; margin-bottom:10px;'>
	<div class="col-md-10 col-md-offset-1">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">  เงื่อนไขการค้นหาข้อมูล </a></h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body" style='padding:7px'>
						<form id="myForm">
							<table width='100%' border='0' >
								<tr>
									<td> ประเภทของข้อมูล </td>
									<td colspan='2' align='left'>
										<div class="form-group has-error" style='margin-bottom:0px'>
											<select id='slt_type' name='slt_type' class="form-control input-sm">
										<?		// แสดงประเภทข้อมูลของ risk ทังหมด
												foreach($array_data as $key=>$value){
										?>
												<option value='<?=$key?>'><?=$value ?></option>
										<?		} // end foreach ?>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td><input type="radio" name="rd_type" id="rad01" value="1" > ชื่อที่ต้องการค้นหา</td>
									<td colspan='3'><input type="text" class="form-control input-sm" id="name_search" name="name_search" maxlength='50'></td>
								</tr>
								<tr>
									<td><input type="radio" name="rd_type" id="rad02" value="2" > ชื่อแรก</td>
									<td><input type="text" class="form-control input-sm" id="first_name" name="first_name" size="12" maxlength='20' disabled></td>
									<td>&nbsp; ชื่อรอง </td>
									<td><input type="text" class="form-control input-sm" id="epithet" name="epithet" size="12" maxlength='20' disabled></td>
									<td>&nbsp; นามสกุล </td>
									<td><input type="text" class="form-control input-sm" id="surname" name="surname" size="12" maxlength='20' disabled></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><a href='#' rel="tooltip" title=" หมายเลขบัตรประชาชน / หมายเลข Passport " data-placement="top"> หมายเลขอ้างอิง </a></td>
									<td colspan='2'><input type="text" class="form-control input-sm" id="number_search" name='number_search' maxlength='40'></td>
									<td colspan='4' rowspan='3' align='center'>
										<button type="button" class="btn btn-primary glyphicon glyphicon-search" style='padding:10px' onclick=" SubmitData() " > ค้นหาข้อมูล </button>&nbsp;
										<button type="button" class="btn btn-primary glyphicon glyphicon-refresh" style='padding:10px' id='btn_clear'> ล้างข้อมูล </button>
									</td>
								</tr>
								<tr>
									<td><a href='#' rel="tooltip" title=" ที่อยู่ตามทะเบียนบ้าน / ที่อยู่ติดต่อได้ / ที่อยู่ที่ทำงาน " data-placement="top"> ประเทศ </a></td>
									<td colspan='2'>
										<select class="form-control input-sm" id='slt_country' name='slt_country'>
										<? 
											$sql = " SELECT country_code, country_name_thai, country_name_eng FROM [tbl-country-cbs] ORDER BY 1 "; 
											$obj_db->query($sql);
											WHILE($rows = $obj_db ->fetch_row()){ 
										?>
											<option value='<?=trim($rows['0']) ?>' <? if($rows['0']=='TH'){ echo " selected"; }?>><?=$rows['0'].'-'.trim($rows['1']) ?></option>
										<?
											} // end while 
										?>
										</select>
									</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><a href='#' rel="tooltip" title=" อาชีพ/ประเภทธุรกิจ " data-placement="top"> อาชีพ/ประเภทธุรกิจ </a></td>
									<td colspan='2'>
										<select class="form-control input-sm" id='slt_job' name='slt_job'>
										<?
											// แสดงข้อมูลรายชื่ออาชีพทังหมด
											$sql = " SELECT [job_id], [job_name] FROM [tbl-jobs] ORDER BY CAST(job_id AS int) ";
											$obj_db->query($sql);
											WHILE($rows = $obj_db ->fetch_row()){ 
										?>
											<option value='<?=$rows['0']?>' ><?=trim($rows['1']) ?></option>
										<?	 } // end while ?>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan='7'><small><font color='red'>* หมายเลขอ้างอิง</font> : หมายเลขบัตรประชาชน / หมายเลข Passport  |<font color='red'> * ประเทศ </font> : ที่อยู่ตามทะเบียนบ้าน / ที่อยู่ติดต่อได้ / ที่อยู่ที่ทำงาน </small>
									</td>
								</tr>
							</table>
						</form>

					</div><!-- End div panel-body -->
				</div><!-- End div CollapseOne -->
			</div><!-- End div panel panel-default -->
		</div><!-- End div panel-group -->
	</div><!-- End div col-md9 offset1 -->
</div><!-- End div row -->

<!-- ****************************************************  พื้นที่แสดงผลข้อมูล Result ************************************************* -->
	<br><div id='div_result' style="display:none"></div>
<!-- **************************************************  END พื้นที่แสดงผลข้อมูล Result ********************************************* -->

</div><!-- End div container -->
</body>
</html>