<?

// ทำ hiligth โดยไม่เปลี่ยนข้อความต้นฉบับ [ ข้อความต้นฉบับ , ข้อความค้นหา, รูปแบบที่ต้องการให้จัด  ]
function highlightkeyword($str, $search,$temp_num) {
	$occurrences = @substr_count(strtolower($str), strtolower($search));
	$newstring = $str;
	$match = array();
 
	for ($i=0;$i<$occurrences;$i++) {
		$match[$i] = stripos($str, $search, $i);
		$match[$i] = substr($str, $match[$i], strlen($search));

		if($temp_num==1){
			$newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));
		}elseif($temp_num==2){
			$newstring = str_replace($match[$i], '[&]'.$match[$i].'[@]', strip_tags($newstring));
		}elseif($temp_num==3){
			$newstring = str_replace($match[$i], '[%]'.$match[$i].'[@]', strip_tags($newstring));
		} // end if 

		$temp_count = $match[$i];
	} // end for
 
	return $newstring;

} // end function 

?>