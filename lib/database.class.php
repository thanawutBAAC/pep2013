<?php
class database{


/*	private $pep_host ="THANAWUT\SQLEXPRESS";
	private $pep_user = "user01";
	private $pep_password = "123456";
	private $pep_database = "Pep2013";

	private $iso_host ="dt01";
	private $iso_user = "sa";
	private $iso_password = "";
	private $iso_database = "iso";
*/	

	private $iso_host ="WEBDB\APPLICATION,1051";
	private $iso_user = "isousr";
	private $iso_password = "iso@123";
	private $iso_database = "iso";


	private $pep_host ="JEWEL";
	private $pep_user = "tooadm";
	private $pep_password = "baac@123";
	private $pep_database = "Pep2013";

	private $db_result=NULL;		// เก็บค่าผลลัพธ์ที่ได้ 
	private $conn;						// เก็บตัว connection
	function connect_iso(){
		$this->conn = mssql_connect($this->iso_host,$this->iso_user,$this->iso_password) or die(" ไม่สามารถติดต่อเครื่อง Server ได้ ");
		mssql_select_db($this->iso_database,$this->conn) or die(" ไม่สามารถติดต่อฐานข้อมูลระบบคุณภาพได้ ");
	} // end function connect 

	function connect_pep(){
		$this->conn = mssql_connect($this->pep_host,$this->pep_user,$this->pep_password) or die(" ไม่สามารถติดต่อเครื่อง Server ได้ ");
		mssql_select_db($this->pep_database,$this->conn) or die(" ไม่สามารถติดต่อฐานข้อมูลระบบงบประมาณได้ ");
		//ini_set('mssql.charset', 'UTF-8');
	} // end function connect 

	function close(){
		return mssql_close($this->conn);
	} // end function close

	function query($sql){	
		$this->db_result = mssql_query($sql,$this->conn) or $this->error();
		return $this->db_result;
	} // end function query

	function result($field_name){
		return mssql_result($this->db_result,0,$field_name);
	} // end function result 
	
	function fetch_array($type){
		return mssql_fetch_array($this->db_result,$type);
	} // end function fetch_array

	function free_result(){
		return mssql_free_result($this->db_result);
	} // end function free_result

	function num_rows(){
		return mssql_num_rows($this->db_result);
	} // end function num_rows

	function data_seek($num_seek){
		return mssql_data_seek($this->db_result, $num_seek);
	} // end function data_seek

	function fetch_row(){
		return mssql_fetch_row($this->db_result);
	} // end function fetch_row

	function get_affected_rows() {
		return mssql_affected_rows();
	} // end function get_affected_rows

	function begin_transaction(){
		$this->query("BEGIN TRAN");
	} // end function transaction

	function commit(){
		$this->query("COMMIT");
	} // end function commit

	function rollback(){
		$this->query("ROLLBACK");
	} // end function rollback

	function error() {
		$errdesc = error_reporting(E_ERROR | E_WARNING | E_PARSE);
		$message = "Error Desc : ".$errdesc."\r\n";
		$message.= "Date : ".gmdate("l dS of F Y h:i:s A")."\r\n";
		$message.= "File: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		echo "<p><textarea rows='10' cols='60'>".htmlspecialchars($message)."</textarea></p>";
		exit();
	} // end function error

} // end class

?>