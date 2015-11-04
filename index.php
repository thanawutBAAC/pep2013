<?php
//============================================================+
// File name		: index.php
// Begin				: 26/11/2556
// Last Update	: 26/11/2556
// Author			: ��¸��ز� ���Թ���
// Version			: 1.0
// Copyright (C)	: ��§ҹ��ѡ�ҹ�к����ʹ�� ���»�Ժѵԡ��෤��������ʹ��
// Description	:  ˹���á������Ѻ Login �������к����� password �ͧ�ҹ�������١�����¤�
// input				: username , password
// output			: username , password
//============================================================+
include("lib/config.inc.php");
?>
<!doctype html>
<head>
	<TITLE><?=$webSite['title'] ?></TITLE>
	<?=$webSite['meta'] ?>
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
	<style>
		form input[type="text"], input[type="password"], textarea {
			border: 1px solid #d9dbdd;
			padding: 1em 0.625em; /* 16/16 10/16 */
			outline: none;
		}
		form input[type="text"]:focus, input[type="password"]:focus, textarea:focus {
			border: 1px solid #00DBFF;
		}
	</style>
</head>
<body>
	
	<!-- TOP BAR -->
	<div id="top-bar">
		<div class="page-full-width">
			<a href="http://baacnet/frame.php" class="round button dark ic-left-arrow image-left ">Return to baacnet</a>
		</div> <!-- end full-width -->	
	</div> <!-- end top-bar -->

	<!-- HEADER -->
	<div id="header">
		<div class="page-full-width cf">
			<div id="login-intro" class="fl">
				<h1>&nbsp;Login to �к���Ǩ�ͺ���ͷ�Һ����稨�ԧ����ǡѺ�١��� ( CDD ) </h1>
				<h4 style='margin-top:4px'>&nbsp; �� user ��� password</u> ���ǡѺ <font color='red'><strong><u>�к��ҹ�������١�����¤� </u></strong></font> </h4>
			</div> <!-- login-intro -->
			<a href="#" id="company-branding" class="fr"><img src="images/logo.png" alt=" ��Ҥ�����͡���ɵ�����ˡó����ɵ�" /></a>
		</div> <!-- end full-width -->	
	</div> <!-- end header -->
	
	<!-- MAIN CONTENT -->
	<div id="content">
		<form action="log_in.php" method="POST" id="login-form">
			<fieldset>
				<p>
					<label for="login-username">���ʾ�ѡ�ҹ</label>
					<input type="text" id="username" name='username' class="round full-width-input" value='' autofocus />
				</p>
				<p>
					<label for="login-password">���ʼ�ҹ</label>
					<input type="password" id="password" name='password' class="round full-width-input" value='' />
				</p>
				<input type="submit" class="button round blue image-right ic-right-arrow" value=' LOG IN '>&nbsp;&nbsp; <a href="http://cif/CIF/System_login_main.php?url=index.php&language=PHP&sys_code=LOAN_PROFILE&system_name=�к��Ѵ�Ӱҹ�������١���" target="_blank">������ʼ�ҹ</a>
			</fieldset>
			<br/>
				<div class="information-box round"> �����͡����ҹ <a href='download/User manual.pdf' target='_blank'> Download </a><br>
					<div style='margin-top:4px'>�ջѭ�Ң�����������§ҹ ���. (6045-51) </div>
					<div style='margin-top:4px'>�ջѭ�ҡ��������� ���. (8847-49) </div>
				</div><!-- end div information -->
		</form>
		<center>
		<p><img src='images/icons/message-boxes/warning.png'>&nbsp;&nbsp;<font size='3.0em'><strong>��С����ª��ͺؤ�ŷ��١��˹� <a href='http://172.29.31.58/biz/index.php/2013-09-20-03-06-40' target='_blank'><font color='red'> ��ԡ����� </font></a></strong></font> </p>
		</center>
	</div> <!-- end content -->

	<!-- FOOTER -->
	<div id="footer">
		<p><font color='#000000'>&copy;<?=$webSite['copyright'] ?></font></p>
	</div> <!-- end footer -->

</body>
</html>