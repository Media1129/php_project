<?php

// Include the main TCPDF library (search for installation path).
require('../.././tcpdf_lib/tcpdf.php'); 
ob_start();
$code_list=array(		
  'psn_sex'=>array('0'=>'女','1'=>'男'),
  'q01'=>array('0'=>'專科以上學校', '1'=>'高中（職）', '2'=>'國中', '3'=>'國小', '4'=>'社會教育機構', '5'=>'學術研究機構'),
  'q02'=>array('0'=>'教師', '1'=>'研究人員', '2'=>'專業人員', '3'=>'其他（如助教、職員、運動教練）'),
  'q03'=>array('0'=>'現職','1'=>'留停'),
  'q03_2'=>array('0'=>'借調', '1'=>'育嬰', '2'=>'待親', '99'=>'其他'),
  'q03_3'=>array('0'=>'民營事業', '1'=>'財團法人', '2'=>'行政法人', '3'=>'政府機關(構)', '4'=>'民間', '99'=>'其他'),
  'q04'=>array('0'=>'教授（級）或研究員', '1'=>'副教授（級）或副研究員', '2'=>'助理教授（級）或助理研究員', '3'=>'講師輯或研究助理', '4'=>'助教或職員'),
  'q05'=>array('0'=>'否','1'=>'是'),
  'q08'=>array('0'=>'尚未確定', '1'=>'有', '99'=>'其他'),
  'q13'=>array('0'=>'無（僅係提供法令規範之諮詢及解釋）', '1'=>'有'),
  'q15'=>array('0'=>'人事單位主動安排', '1'=>'教職員自行尋求協助'),
  'q17'=>array('0'=>'1小時以上', '1'=>'30分鐘~1小時', '2'=>'30分鐘以下'),
  'q18'=>array('0'=>'否','1'=>'是'),
  'q18_2'=>array('0'=>'絕大部分仍會確認再給予回復', '1'=>'仍需教職員提供具體資料才能確定','2'=>'涉及未來制度或管理規劃，難以明確說明（請將意見填列於「教職員建議事項」相關）'),
  'q19'=>array('0'=>'0 分', '1'=>'1 分', '2'=>'2 分', '3'=>'3 分', '4'=>'4 分', '5'=>'5 分', '6'=>'6 分', '7'=>'7 分', '8'=>'8 分', '9'=>'9 分', '10'=>'10 分'),
  'q20'=>array('1'=>'有','0'=>'無'),
  'is_send'=>array('0'=>'未送出','1'=>'已送出')
);

function ConvertToUTF8($text){
  $encoding = mb_detect_encoding($text, mb_detect_order(), false);
  if($encoding == "UTF-8")
  {
      $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');    
  }
  $out = iconv(mb_detect_encoding($text, mb_detect_order(), false), "UTF-8//IGNORE", $text);
  return $out;
}




// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->SetFont('msungstdlight', '', 12);
$pdf->AddPage();

$tbl = '
<br><br>
<h4 style="font-weight: normal; text-align: center;"><b><font size="14">提供教職員退休規劃諮詢服務紀錄表</font></b></h4>
';
$pdf->writeHTML($tbl, true, false, false, false, '');

// $pdf->RoundedRect(5, 10, 40, 30, 3.50, 'DF');
// $pdf->RoundedRect(50, 10, 40, 30, 6.50, '1000');

// $style3 = array('color' => array(1, 1,123));
// $style4 = array('L' => 0,
//                 'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),
//                 'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),
//                 'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
// $pdf->Rect(145, 10, 40, 20, 'D', array('all' => $style3));
// $pdf->Rect(130, 42.5, 3.8, 3.8, 'DF');

//line
$pdf->Line(210, 39.9, 273.5, 39.9);
$pdf->Line(172, 71.5,210, 71.5);
$pdf->Line(106, 104,130, 104);
$pdf->Line(171, 104,198, 104);
$pdf->Line(232, 104,260, 104);
$pdf->Line(89, 115.7,130, 115.7);
$pdf->Line(251, 122,270, 122);
$pdf->Line(85, 167,120, 167);

$filename = 'test.csv';
$data='';
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  $row_num = 1;
  while (($line = fgetcsv($h, 1000, ",")) !== FALSE) 
  {
    if($row_num == 1) {
      $first_line = $line;
      $row_num++;
    }
    else{
      $row_num++;
      $data = array_combine($first_line,$line);
      // print_r($data['times_id']);
      break;
    }
  }
}


//psn_sex
$pdf->Rect(130, 42.5, 3.8, 3.8, 3.5,'DF'); //男
$pdf->Rect(143, 42.5, 3.8, 3.8, 3.5, 'DF'); //女
//q01
$pdf->Rect(71.7, 49, 3.8, 3.8, 3.5, 'DF'); //專科以上學校
$pdf->Rect(110, 49, 3.8, 3.8, 3.5, 'DF'); //高中職
$pdf->Rect(139, 49, 3.8, 3.8, 3.5, 'DF'); //國中
$pdf->Rect(161, 49, 3.8, 3.8, 3.5, 'DF'); //國小
$pdf->Rect(183.5, 49, 3.8, 3.8, 3.5, 'DF'); //社會教育機構
$pdf->Rect(223, 49, 3.8, 3.8, 3.5, 'DF'); //學術研究機構 
//q02
$pdf->Rect(71.7, 55.6, 3.8, 3.8, 3.5, 'DF'); //教師
$pdf->Rect(94, 55.6, 3.8, 3.8, 3.5, 'DF'); //研究人員
$pdf->Rect(125, 55.6, 3.8, 3.8, 3.5, 'DF'); //專業人員
$pdf->Rect(155.8, 55.6, 3.8, 3.8, 3.5, 'DF'); //其他
//q03
$pdf->Rect(71.7, 62.3, 3.8, 3.8, 3.5, 'DF'); //現職
$pdf->Rect(94, 62.3, 3.8, 3.8, 3.5, 'DF'); //留停
$pdf->Rect(114.5, 62.3, 3.8, 3.8,3.5, 'DF'); //借調
$pdf->Rect(114.5, 67.7, 3.8, 3.8, 3.5, 'DF'); //育嬰
$pdf->Rect(136, 67.7, 3.8, 3.8, 3.5, 'DF'); //侍親
$pdf->Rect(158.3, 67.7, 3.8, 3.8, 3.5, 'DF'); //其他
$pdf->Rect(130, 62.3, 3.8, 3.8, 3.5, 'DF'); //民營
$pdf->Rect(156, 62.3, 3.8, 3.8, 3.5, 'DF'); //財團
$pdf->Rect(183, 62.3, 3.8, 3.8, 3.5, 'DF'); //行政
$pdf->Rect(209, 62.3, 3.8, 3.8, 3.5, 'DF'); //政府機關
$pdf->Rect(242, 62.3, 3.8, 3.8, 3.5, 'DF'); //民間
$pdf->Rect(256, 62.3, 3.8, 3.8, 3.5, 'DF'); //其他
//q04
$pdf->Rect(71.7, 74.5, 3.8, 3.8, 3.5, 'DF'); //教授
$pdf->Rect(108.4, 74.5, 3.8, 3.8, 3.5, 'DF'); //副教授
$pdf->Rect(154, 74.5, 3.8, 3.8, 3.5, 'DF'); //助理教授
$pdf->Rect(207.8, 74.5, 3.8, 3.8, 3.5, 'DF'); //講師
$pdf->Rect(71.7, 79.8, 3.8, 3.8, 3.5, 'DF'); //助教
//q05
$pdf->Rect(71.7, 86.2, 3.8, 3.8, 3.5, 'DF'); //是
$pdf->Rect(85.5, 86.2, 3.8, 3.8, 3.5, 'DF'); //否
//q06
$pdf->Rect(71.7, 93.1, 3.8, 3.8, 3.5, 'DF'); //無
$pdf->Rect(85.5, 93.1, 3.8, 3.8, 3.5, 'DF'); //身障
$pdf->Rect(103.4, 93.1, 3.8, 3.8, 3.5, 'DF'); //原住民族
$pdf->Rect(129.8, 93.1, 3.8, 3.8, 3.5, 'DF'); //體能降齡
$pdf->Rect(156.4, 93.1, 3.8, 3.8, 3.5, 'DF'); //具永久
$pdf->Rect(208.3, 93.1, 3.8, 3.8, 3.5, 'DF'); //未具永久
//q08
$pdf->Rect(71.7, 111.7, 3.8, 3.8, 3.5, 'DF'); //已確定
$pdf->Rect(160.5, 111.7, 3.8, 3.8, 3.5, 'DF'); //尚未確定
$pdf->Rect(212.3, 111.7, 3.8, 3.8, 3.5, 'DF'); //其他
//q09
$pdf->Rect(71.7, 118.4, 3.8, 3.8, 3.5, 'DF'); //提報退休案
$pdf->Rect(102.5, 118.4, 3.8, 3.8, 3.5, 'DF'); //制度了解或建議
$pdf->Rect(141.5, 118.4, 3.8, 3.8, 3.5, 'DF'); //退休規畫準備
$pdf->Rect(176.3, 118.4, 3.8, 3.8, 3.5, 'DF'); //退撫基金繳付
$pdf->Rect(211.4, 118.4, 3.8, 3.8, 3.5, 'DF'); //退休年資
$pdf->Rect(238, 118.4, 3.8, 3.8, 3.5, 'DF'); //其他
//q10
$pdf->Rect(71.7, 125.3, 3.8, 3.8, 3.5, 'DF'); //退休類型
$pdf->Rect(160.5, 125.3, 3.8, 3.8, 3.5, 'DF'); //可退休年齡
$pdf->Rect(212, 125.3, 3.8, 3.8, 3.5, 'DF'); //退休年資採計
$pdf->Rect(71.7, 130.7, 3.8, 3.8, 3.5, 'DF'); //月退休金起支年齡
$pdf->Rect(160.5, 130.7, 3.8, 3.8, 3.5, 'DF'); //延長服務
//q11
$pdf->Rect(71.7, 137.2, 3.8, 3.8, 3.5, 'DF'); //退休金種類
$pdf->Rect(161, 137.2, 3.8, 3.8, 3.5, 'DF'); //退休金停頓予恢復及剝奪、減少
$pdf->Rect(71.7, 142.5, 3.8, 3.8, 3.5, 'DF'); //退休金計算基準
$pdf->Rect(161, 142.5, 3.8, 3.8, 3.5, 'DF'); //人道關懷條款
$pdf->Rect(71.7, 147.8, 3.8, 3.8, 3.5, 'DF'); //所得替代率
$pdf->Rect(161, 147.8, 3.8, 3.8, 3.5, 'DF'); //最低保障規範
$pdf->Rect(71.7, 153.1, 3.8, 3.8, 3.5, 'DF'); //退休再任
$pdf->Rect(161, 153.1, 3.8, 3.8, 3.5, 'DF'); //退休金發放、查驗
$pdf->Rect(71.7, 158.4, 3.8, 3.8, 3.5, 'DF'); //優惠存款
$pdf->Rect(161, 158.4, 3.8, 3.8, 3.5, 'DF'); //補償金
$pdf->Rect(71.7, 163.7, 3.8, 3.8, 3.5, 'DF'); //其他
//q12
$pdf->Rect(71.7, 170.1, 3.8, 3.8, 3.5, 'DF'); //年資轉銜
$pdf->Rect(161, 170.1, 3.8, 3.8, 3.5, 'DF'); //離婚配偶請求
$pdf->Rect(205.4, 170.1, 3.8, 3.8, 3.5, 'DF'); //免受第37條及第38條限制之條件


//psn_sex
if( $code_list['psn_sex'][$data['psn_sex']] =='男'){
  $pdf->Rect(130, 42.5, 3.8, 3.8, 'DF'); //男
}
else{
  $pdf->Rect(143, 42.5, 3.8, 3.8, 'DF'); //女
}

//q01
if( $data['q01'] == '0' ){
  $pdf->Rect(71.7, 49, 3.8, 3.8, 'DF'); //專科以上學校
}
else if( $data['q01'] == '1' ){
  $pdf->Rect(110, 49, 3.8, 3.8, 'DF'); //高中職
}
else if( $data['q01'] == '2' ){
  $pdf->Rect(139, 49, 3.8, 3.8, 'DF'); //國中
}
else if( $data['q01'] == '3' ){
  $pdf->Rect(161, 49, 3.8, 3.8, 'DF'); //國小
}
else if( $data['q01'] == '4' ){
  $pdf->Rect(183.5, 49, 3.8, 3.8, 'DF'); //社會教育機構
}
else{
  $pdf->Rect(223, 49, 3.8, 3.8, 'DF'); //學術研究機構  
}
//q02
if( $data['q02'] == '0' ){
  $pdf->Rect(71.7, 55.6, 3.8, 3.8, 'DF'); //教師
}
else if( $data['q02'] == '1' ){
  $pdf->Rect(94, 55.6, 3.8, 3.8, 'DF'); //研究人員
}
else if( $data['q02'] == '2' ){
  $pdf->Rect(125, 55.6, 3.8, 3.8, 'DF'); //專業人員
}
else{
  $pdf->Rect(155.8, 55.6, 3.8, 3.8, 'DF'); //其他
}

//q_03
if( $data['q03'] == '0' ){ //現職
  $pdf->Rect(71.7, 62.3, 3.8, 3.8, 'DF'); //現職
}
else { //留停
  $pdf->Rect(94, 62.3, 3.8, 3.8, 'DF'); //留停
  //q03_2
  if( $data['q03_2']=='0'){
    $pdf->Rect(114.5, 62.3, 3.8, 3.8, 'DF'); //借調
    //q03_3
    if( $data['q03_3']=='0'){
      $pdf->Rect(130, 62.3, 3.8, 3.8, 'DF'); //民營
    }
    else if( $data['q03_3']=='1'){
      $pdf->Rect(156, 62.3, 3.8, 3.8, 'DF'); //財團
    }
    else if( $data['q03_3']=='2'){
      $pdf->Rect(183, 62.3, 3.8, 3.8, 'DF'); //行政
    }
    else if( $data['q03_3']=='3'){
      $pdf->Rect(209, 62.3, 3.8, 3.8, 'DF'); //政府機關
    }
    else if( $data['q03_3']=='4'){
      $pdf->Rect(242, 62.3, 3.8, 3.8, 'DF'); //民間
    }
    else{
      $pdf->Rect(256, 62.3, 3.8, 3.8, 'DF'); //其他
    }


  }
  else if( $data['q03_2']=='1'){ //育嬰
    $pdf->Rect(114.5, 67.7, 3.8, 3.8, 'DF'); //育嬰
  }
  else if( $data['q03_2']=='2'){ //侍親
    $pdf->Rect(136, 67.7, 3.8, 3.8, 'DF'); //侍親
  }
  else { //其他
    $pdf->Rect(158.3, 67.7, 3.8, 3.8, 'DF'); //其他
  }
}

//q04
if( $data['q04']=='0' ){
  $pdf->Rect(71.7, 74.5, 3.8, 3.8, 'DF'); //教授
}
else if( $data['q04']=='1' ){
  $pdf->Rect(108.4, 74.5, 3.8, 3.8, 'DF'); //副教授
}
else if( $data['q04']=='2' ){
  $pdf->Rect(154, 74.5, 3.8, 3.8, 'DF'); //助理教授
}
else if( $data['q04']=='3' ){
  $pdf->Rect(207.8, 74.5, 3.8, 3.8, 'DF'); //講師
}
else {
  $pdf->Rect(71.7, 79.8, 3.8, 3.8, 'DF'); //助教
}
//q05
if( $data['q05']=='0'){
  $pdf->Rect(85.5, 86.2, 3.8, 3.8, 'DF'); //否
}
else{
  $pdf->Rect(71.7, 86.2, 3.8, 3.8, 'DF'); //是
}
//q06
if( $data['q06']=='Y'){
  $pdf->Rect(71.7, 93.1, 3.8, 3.8,  'DF'); //無
}
if( $data['q06_1']=='Y'){
  $pdf->Rect(85.5, 93.1, 3.8, 3.8,  'DF'); //身障
}
if( $data['q06_2']=='Y'){
  $pdf->Rect(103.4, 93.1, 3.8, 3.8, 'DF'); //原住民族
}
if( $data['q06_3']=='Y'){
  $pdf->Rect(129.8, 93.1, 3.8, 3.8, 'DF'); //體能降齡
}
if( $data['q06_4']=='Y'){
  $pdf->Rect(156.4, 93.1, 3.8, 3.8, 'DF'); //具永久
}
if( $data['q06_5']=='Y'){
  $pdf->Rect(208.3, 93.1, 3.8, 3.8, 'DF'); //未具永久
}
//q08
if( $data['q08']=='0'){
  $pdf->Rect(160.5, 111.7, 3.8, 3.8, 'DF'); //尚未確定
}
else if( $data['q08']=='1'){
  $pdf->Rect(71.7, 111.7, 3.8, 3.8, 'DF'); //已確定
}
else{
  $pdf->Rect(212.3, 111.7, 3.8, 3.8, 'DF'); //其他
}
//q09
if( $data['q09']=='Y'){
  $pdf->Rect(71.7, 118.4, 3.8, 3.8, 'DF'); //提報退休案
}
if( $data['q09_1']=='Y'){
  $pdf->Rect(102.5, 118.4, 3.8, 3.8, 'DF'); //制度了解或建議
}
if( $data['q09_2']=='Y'){
  $pdf->Rect(141.5, 118.4, 3.8, 3.8, 'DF'); //退休規畫準備
}
if( $data['q09_3']=='Y'){
  $pdf->Rect(176.3, 118.4, 3.8, 3.8,'DF'); //退撫基金繳付
}
if( $data['q09_4']=='Y'){
  $pdf->Rect(211.4, 118.4, 3.8, 3.8, 'DF'); //退休年資
}
if( $data['q09_5']=='Y'){
  $pdf->Rect(238, 118.4, 3.8, 3.8, 'DF'); //其他 
}
//q10
if( $data['q10']=='Y'){
  $pdf->Rect(71.7, 125.3, 3.8, 3.8, 'DF'); //退休類型
}
if( $data['q10_1']=='Y'){
  $pdf->Rect(160.5, 125.3, 3.8, 3.8, 'DF'); //可退休年齡
}
if( $data['q10_2']=='Y'){
  $pdf->Rect(212, 125.3, 3.8, 3.8, 'DF'); //退休年資採計
}
if( $data['q10_3']=='Y'){
  $pdf->Rect(71.7, 130.7, 3.8, 3.8, 'DF'); //月退休金起支年齡
}
if( $data['q10_4']=='Y'){
  $pdf->Rect(160.5, 130.7, 3.8, 3.8, 'DF'); //延長服務
}
//q11
if( $data['q11']=='Y'){
  $pdf->Rect(71.7, 137.2, 3.8, 3.8, 'DF'); //退休金種類
}
if( $data['q11_1']=='Y'){
  $pdf->Rect(161, 137.2, 3.8, 3.8, 'DF'); //退休金停頓予恢復及剝奪、減少
}
if( $data['q11_2']=='Y'){
  $pdf->Rect(71.7, 142.5, 3.8, 3.8, 'DF'); //退休金計算基準
}
if( $data['q11_3']=='Y'){
  $pdf->Rect(161, 142.5, 3.8, 3.8, 'DF'); //人道關懷條款
}
if( $data['q11_4']=='Y'){
  $pdf->Rect(71.7, 147.8, 3.8, 3.8, 'DF'); //所得替代率
}
if( $data['q11_5']=='Y'){
  $pdf->Rect(161, 147.8, 3.8, 3.8, 'DF'); //最低保障規範
}
if( $data['q11_6']=='Y'){
  $pdf->Rect(71.7, 153.1, 3.8, 3.8, 'DF'); //退休再任
}
if( $data['q11_7']=='Y'){
  $pdf->Rect(161, 153.1, 3.8, 3.8, 'DF'); //退休金發放、查驗
}
if( $data['q11_8']=='Y'){
  $pdf->Rect(71.7, 158.4, 3.8, 3.8, 'DF'); //優惠存款
}
if( $data['q11_9']=='Y'){
  $pdf->Rect(161, 158.4, 3.8, 3.8, 'DF'); //補償金
}
if( $data['q11_99']=='Y'){
  $pdf->Rect(71.7, 163.7, 3.8, 3.8, 'DF'); //其他
}
//q12
if( $data['q12']=='Y'){
  $pdf->Rect(71.7, 170.1, 3.8, 3.8, 'DF'); //年資轉銜
}
if( $data['q12_1']=='Y'){
  $pdf->Rect(161, 170.1, 3.8, 3.8, 'DF'); //離婚配偶請求
}
if( $data['q12_2']=='Y'){
  $pdf->Rect(205.4, 170.1, 3.8, 3.8, 'DF'); //免受第37條及第38條限制之條件
}





$tb1 = '
  <br><br>
  <font size="12"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;機關（構）學校名稱：'.ConvertToUTF8($data["cpa_name"]).'</font>
  <br>
  <table border="1" cellpadding="2"  align="center" >
    <tr nobr="true">
      <th width="7%" rowspan="9"><br><br><br><br><br><br>基本資料(諮詢服務對象)</th>
      <th width="13%"><font style="text-align:left">姓名</font></th>
      <th width="15%">'.ConvertToUTF8($data["psn_name"]).'</th>
      <th width="5%">性別:</th>
      <th width="18%"><font style="text-align:left"> &emsp;&emsp;男 &emsp;&emsp;女</font></th>
      <th width="15%"><font style="text-align:left"> &nbsp;諮詢日期:</font></th>
      <th width="22%"><font style="text-align:left"> &emsp;&emsp;&emsp;&emsp;年 &emsp;&emsp;月 &emsp;&emsp;日</font></th>
    </tr>
    
    <tr nobr="true">
      <th><font style="text-align:left">服務機構</font></th>
      <th colspan="5"><font style="text-align:left"> &emsp;專科以上學校   &ensp;&emsp;&emsp;高中(職)   &ensp;&emsp;&emsp;國中   &ensp;&emsp;&emsp;國小   &ensp;&emsp;&emsp;社會教育機構   &ensp;&emsp;&emsp;學術研究機構</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">身分別（一）</font></th>
      <th colspan="5"><font style="text-align:left"> &emsp;教師 &ensp;&emsp;&emsp;研究人員 &ensp;&emsp;&emsp;專業人員 &ensp;&emsp;&emsp;其他(如助教、職員、運動教練)</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">身分別（二）</font></th>
      <th colspan="5"><font style="text-align:left"> &emsp;現職 &ensp;&emsp;&emsp;留停：1. &emsp;借調( &emsp;民營事業 &ensp;&emsp;財團法人 &ensp;&emsp;行政法人 &ensp;&emsp;政府機關(構) &ensp;&emsp;民間 &ensp;其他)<br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 2. &emsp;育嬰；3. &emsp;侍親；4.
       &emsp; 其他</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">專上學校或機構職稱（級）</font></th>
      <th colspan="5"><font style="text-align:left"> &emsp;教授(級)或研究員 &emsp;副教授(級)或副研究員 &emsp;助理教授(級)或助理研究員 &emsp;講師級或研究助理<br> &emsp;助教或職員</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">兼任行政職務</font></th>
      <th colspan="5"><font style="text-align:left"> &emsp;是 &emsp;&emsp;否</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">特殊身分</font></th> 
      <th colspan="5"><font style="text-align:left"> &emsp;無 &emsp;&emsp;身障 &emsp;&emsp;原住民族 &emsp;&emsp;體能降齡 &emsp;&emsp;具永久居留證外籍教師 &emsp;&emsp;未具永久居留證外籍教師</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">任職年資<br>（截至諮詢日）</font></th>
      <th colspan="5" ><font style="text-align:left">退撫新制實施前： &emsp;&ensp;年 &emsp;&ensp;月、退撫新制實施後： &emsp;&ensp;年 &emsp;&ensp;月 &emsp;&emsp;；&emsp;&emsp;合計： &emsp;&ensp;年 &emsp;&ensp;月</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">預計退休日期</font></th>
      <th colspan="5"><font style="text-align:left"> &emsp;已確定 &emsp;&emsp;年 &emsp;&emsp;月 &emsp;&emsp;日 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;尚未確定 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;其他</font></th>
    </tr>

    <tr nobr="true">
      <th width="7%" rowspan="4"><br><br><br><br><br><br><font style="text-align:left">諮詢服務內容</font></th>
      <th width="13%"><font style="text-align:left">諮詢類型及目的</font></th>
      <th width="75%"><font style="text-align:left"> &emsp;提報退休案 &emsp;&emsp;制度瞭解或建議 &emsp;&emsp;退休規劃準備 &emsp;&emsp;退撫基金繳付 &emsp;&emsp;退休年資 &emsp;&emsp;其他</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">退休類型及條件</font></th>
      <th><font style="text-align:left"> &emsp;退休類型（自願、屆齡、命退）&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;可退休年齡 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;退休年資採計<br> &emsp;月退休金起支年齡（指標數、展期、減額）&emsp;&emsp;延長服務</font></th>
    </tr>
    <tr nobr="true">
      <th><br><br><br><br><font style="text-align:left">退休給與</font></th>
      <th><font style="text-align:left"> &emsp;退休金種類（一次、月退、兼領） &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;退休金停領與恢復及剝奪、減少<br> &emsp;退休金計算基準 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;人道關懷條款<br> &emsp;所得替代率 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;最低保障規範<br> &emsp;退休再任 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;&emsp;退休金發放、查驗<br> &emsp;優惠存款 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;補償金<br> &emsp;其他</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">其他</font></th>
      <th><font style="text-align:left"> &emsp;年資轉銜（年資併計、年資保留） &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;離婚配偶請求 &emsp;&emsp;&emsp;&emsp;免受第37條及第38條限制之條件</font></th>
    </tr>
  </table>
';
$pdf->writeHTML($tb1, true, false, false, false, '');






//second page
$pdf->AddPage();

//line
$pdf->Line(175, 26, 200, 26);
$pdf->Line(83, 38, 270, 38);
$pdf->Line(198, 71.7, 220, 71.7);
$pdf->Line(71, 118, 83, 118);
$pdf->Line(201, 180, 267, 180);


//q12 continue
$pdf->Rect(71.7, 22, 3.8, 3.8, 3.5, 'DF'); //試算退休金
$pdf->Rect(161.5, 22, 3.8, 3.8, 3.5, 'DF'); //其他
//q13
$pdf->Rect(71.7, 28.9, 3.8, 3.8, 3.5, 'DF'); //無
$pdf->Rect(71.7, 34.2, 3.8, 3.8, 3.5, 'DF'); //有
//q15
$pdf->Rect(71.7, 61.1, 3.8, 3.8, 3.5, 'DF'); //人事單位主動安排
$pdf->Rect(144.4, 61.1, 3.8, 3.8, 3.5, 'DF'); //教職員自行尋求諮詢
//q16
$pdf->Rect(71.7, 67.8, 3.8, 3.8, 3.5, 'DF'); //面對面
$pdf->Rect(102, 67.8, 3.8, 3.8, 3.5, 'DF'); //電話
$pdf->Rect(145, 67.8, 3.8, 3.8, 3.5, 'DF'); //電子郵件
$pdf->Rect(185, 67.8, 3.8, 3.8, 3.5, 'DF'); //其他
//q17
$pdf->Rect(71.7, 79.8, 3.8, 3.8, 3.5, 'DF'); //1小時以上
$pdf->Rect(104, 79.8, 3.8, 3.8, 3.5, 'DF'); //30~1小時
$pdf->Rect(144, 79.8, 3.8, 3.8, 3.5, 'DF'); //30以下
//q18
$pdf->Rect(71.7, 91.7, 3.8, 3.8, 3.5, 'DF'); //是
$pdf->Rect(71.7, 97, 3.8, 3.8, 3.5, 'DF'); //否
$pdf->Rect(84.7, 97, 3.8, 3.8, 3.5, 'DF'); //絕大部分
$pdf->Rect(84.7, 102.3, 3.8, 3.8, 3.5, 'DF'); //仍需教職員
$pdf->Rect(84.7, 107.6, 3.8, 3.8, 3.5, 'DF'); //涉及未來
//q20
$pdf->Rect(71.7, 126.4, 3.8, 3.8, 3.5, 'DF'); //有
$pdf->Rect(93.8, 126.4, 3.8, 3.8, 3.5, 'DF'); //面對面
$pdf->Rect(124.6, 126.4, 3.8, 3.8, 3.5, 'DF'); //電話
$pdf->Rect(151, 126.4, 3.8, 3.8, 3.5, 'DF'); //電子郵件
$pdf->Rect(71.7, 131.7, 3.8, 3.8, 3.5, 'DF'); //無


//q12 continue
if($data['q12_3']=='Y'){
  $pdf->Rect(71.7, 22, 3.8, 3.8, 'DF'); //試算退休金
}
if($data['q12_99']=='Y'){
  $pdf->Rect(161.5, 22, 3.8, 3.8, 'DF'); //其他
}
//q13
if($data['q13']=='0'){
  $pdf->Rect(71.7, 28.9, 3.8, 3.8, 'DF'); //無
}
else{
  $pdf->Rect(71.7, 34.2, 3.8, 3.8, 'DF'); //有
}
//q15
if($data['q15']=='0'){
  $pdf->Rect(71.7, 61.1, 3.8, 3.8, 'DF'); //人事單位主動安排
}
else{
  $pdf->Rect(144.4, 61.1, 3.8, 3.8, 'DF'); //教職員自行尋求諮詢
}
//q16
if($data['q16']=='Y'){
  $pdf->Rect(71.7, 67.8, 3.8, 3.8, 'DF'); //面對面
}
if($data['q16_1']=='Y'){
  $pdf->Rect(102, 67.8, 3.8, 3.8, 'DF'); //電話
}
if($data['q16_2']=='Y'){
  $pdf->Rect(145, 67.8, 3.8, 3.8, 'DF'); //電子郵件
}
if($data['q16_99']=='Y'){
  $pdf->Rect(185, 67.8, 3.8, 3.8, 'DF'); //其他
}
//q17
if($data['q17']=='0'){
  $pdf->Rect(71.7, 79.8, 3.8, 3.8, 'DF'); //1小時以上
}
else if($data['q17']=='1'){
  $pdf->Rect(104, 79.8, 3.8, 3.8, 'DF'); //30~1小時
}
else{
  $pdf->Rect(144, 79.8, 3.8, 3.8, 'DF'); //30以下
}
//q18
if($data['q18']=='1'){
  $pdf->Rect(71.7, 91.7, 3.8, 3.8, 'DF'); //是
}
else{
  $pdf->Rect(71.7, 97, 3.8, 3.8, 'DF'); //否
  if($data['q18_2']=='0'){
    $pdf->Rect(84.7, 97, 3.8, 3.8, 'DF'); //絕大部分
  }
  else if($data['q18_2']=='1'){
    $pdf->Rect(84.7, 102.3, 3.8, 3.8, 'DF'); //仍需教職員
  }
  else{
    $pdf->Rect(84.7, 107.6, 3.8, 3.8, 'DF'); //涉及未來
  }
}
//q20
if($data['q20']=='1'){
  $pdf->Rect(71.7, 126.4, 3.8, 3.8, 'DF'); //有
}
else{
  $pdf->Rect(71.7, 131.7, 3.8, 3.8, 'DF'); //無
  if($data['q20_1']=='Y'){
    $pdf->Rect(93.8, 126.4, 3.8, 3.8, 'DF'); //面對面
  }
  if($data['q20_2']=='Y'){
    $pdf->Rect(124.6, 126.4, 3.8, 3.8, 'DF'); //電話
  }
  if($data['q20_3']=='Y'){
    $pdf->Rect(151, 126.4, 3.8, 3.8, 'DF'); //電子郵件
  }
}








$tb1 = '
  <p><p>
  <table border="1" cellpadding="2"  align="center" >
    <tr nobr="true">
      <th width="7%"></th>
      <th width="13%"></th>
      <th width="75%"><font style="text-align:left"> &emsp;試算退休金所得替代率 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;其他</font></th>
    </tr>
    <tr nobr="true">
      <th colspan="2"><font style="text-align:left">對教職員提供退休規畫建議</font></th>
      <th><font style="text-align:left"> &emsp;無（僅係提供法令規範之諮詢及解釋）<br> &emsp;有：</font></th>
    </tr>
    <tr nobr="true">
      <th colspan="2" rowspan="3"><br><br><font style="text-align:left">教職員提出的建議事項</font></th>
      <th><font style="text-align:left">退休制度規範面</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">服務提供及管理</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">其他</font></th>
    </tr>
    <tr nobr="true">
      <th rowspan="6"><br><br><br><br><font style="text-align:left">諮詢服務的評估</font></th>
      <th><font style="text-align:left"> 1.本次服務類型</font></th>
      <th><font style="text-align:left"> &emsp;人事單位主動安排 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;教職員自行尋求諮詢</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left"> 2.諮詢服務的方<br> &emsp;式</font></th>
      <th><font style="text-align:left"> &emsp;面對面 &emsp;&emsp;&emsp;&emsp;電話 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;電子郵件 &emsp;&emsp;&emsp;&emsp;&emsp;其他</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left"> 3.諮詢服務使用<br> &emsp;時間</font></th>
      <th><font style="text-align:left"> &emsp;1小時以上 &emsp;&emsp;&emsp;30分鐘~1小時 &emsp;&emsp;&emsp;30分鐘以下</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left"> 4.學校教職員詢<br> &ensp;問的內容均能<br> &emsp;當場給予明確<br> &emsp;答覆</font></th>
      <th><font style="text-align:left"> &emsp;是<br> &emsp;否： &emsp;絕大部分仍會確認後再予回復<br> &emsp;&emsp;&emsp;&emsp;仍需教職員提供具體資料才能確定<br> &emsp;&emsp;&emsp;&emsp;涉及未來制度或管理規劃，難以明確說明（請將意見填列於「教職員建議事項」相關）</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left"> 5.教職員對於諮<br> &emsp;詢服務的反應</font></th>
      <th><font style="text-align:left"> &emsp;'.ConvertToUTF8($data["q19"]).' &emsp;分（最高10分，以教職員非常不滿意（不能接受）為1分，非常滿意（肯定服務效益）為10分覈實<br> &emsp;&emsp;&emsp;&emsp;&emsp;評分計給）</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left"> 6.安排下一次諮<br> &emsp;詢服務</font></th>
      <th><font style="text-align:left"> &emsp;有： &emsp;&emsp;&emsp;面對面 &emsp;&emsp;&emsp;&emsp;電話 &emsp;&emsp;&emsp;&emsp;電子郵件<br> &emsp;無</font></th>
    </tr>
  </table>
';
$pdf->writeHTML($tb1,true,false,false,false,'');
$tbl = '
<p><font size="12"> &emsp;※備註：<br> &emsp;1.本表應於提供服務後，由提供諮詢服務者自行記錄，不得由被服務者記錄填寫。<br>
 &emsp;2.提供諮詢服務前，應先向教職員說明所反應之意見將摘要記錄，並僅作為後續制度或實務改善之參考分析，絕不另作其他用途使用。<br>
 &emsp;3.本表僅諮詢服務對象係依「公立學校教職員退休資遣撫卹條例」辦理退休者適用之。<br>
 &emsp;4.為利後續統計分析用，請勿任意更改本表內容及順序。<br><br>
 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;提供諮詢服務者：'.ConvertToUTF8($data["psn_name"]).'</font></p>
';
$pdf->writeHTML($tbl, true, false, false, false, '');




ob_end_clean();
//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');
?>

