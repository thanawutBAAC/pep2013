<?
$db = "(DESCRIPTION=     (ADDRESS=       (PROTOCOL=TCP)       (HOST=172.26.2.33)       (PORT=1521)     )     (CONNECT_DATA=       (SERVER=default)       (SERVICE_NAME=crmbase)     )   )";
//$db = "(DESCRIPTION=     (ADDRESS=       (PROTOCOL=TCP)       (HOST=172.29.8.2)       (PORT=1521)     )     (CONNECT_DATA=       (SERVICE_NAME=ISDDEV)     )   )";

$conn = oci_connect("cifadm","cifadm",$db); 
//$conn = oci_connect("crmusrdb","password",$db); 
//$conn = oci_connect("ap3","ap3",$db); 
?>