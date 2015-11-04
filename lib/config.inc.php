<?php
// --------------------- session --------------------
// user_online					เก็บข้อมูลว่าใคร online ( รหัสพนักงาน / admin )
// type_online					เก็บประเภทผู้ใช้งาน 1 ผู้ใช้ทั่วไป 2 admin
// profile_online				เก็บรหัสส่วนงานของคน login
// brcode_online			เก็บรหัสส่วนงานของคน login
// division_name_online	เก็บชื่อส่วนงานของคนที่ login
// ---------------------------------------------------
$webSite['title'] = ' ระบบงานบริหารความเสี่ยง ปปง/Pep ';

$webSite['meta'] ='<META http-equiv=Content-Type content=text/html; charset=windows-874>';
$webSite['meta'].='<META name="viewport" content="width=device-width, initial-scale=1.0">';
$webSite['meta'].='<META http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">';
$webSite['meta'].='<META http-equiv=Cache-Control content=no-Cache>';
$webSite['meta'].='<META NAME="Generator" CONTENT="ฝ่ายปฏิบัติการเทคโนโลยีสารสนเทศ">';
$webSite['meta'].='<META NAME="Author" CONTENT="นายธนวุฒิ  สุรินทร์">';
$webSite['meta'].='<META NAME="Description" CONTENT=" ระบบงานบริหารความเสี่ยง ปปง/Pep ">';
$webSite['meta'].='<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">';

$webSite['footer'] = 'ระบบงานฝ่ายเงินฝาก wan : 2629 |  พัฒนาระบบโดย  กลุ่มงานสารสนเทศเพื่อการจัดการ 8535 ';
$webSite['copyright'] = 'Copyright 2013 ฝ่ายปฏิบัติการเทคโนโลยีสารสนเทศ. All rights reserved. ';

// ประเภทข้อมูล
$array_data = array("0"=>'All',"1"=>'AMLO LIST',"2"=>'OFAC',"3"=>'UN',"4"=>'HM');
$array_watchlist = array("All"=>'0',"AMLO LIST"=>'1',"OFAC"=>'2',"UN"=>'3',"HM"=>'4');

// กรณีที่เป็น B แสดงเป็นของเดิม UN
?>