<?php session_start();

	// ź�����Ť�� session ������ 
	session_register("user_online");
	session_register("type_online");
	session_register("profile_online");
	session_register("brcode_online");
	session_register("division_name_online");
	session_destroy();

	print '<script>window.top.location.href = "index.php";</script>';
	exit();
?>