<?php

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

$filename = 'test.csv';
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
      print_r($data['times_id']);
      echo $data["cpa_name"];
      $str = $data["cpa_name"];
      $strr = ConvertToUTF8($str);
      
      // iconv('GBK',"UTF-8//TRANSLIT//IGNORE",$str);
      // $str = mb_convert_encoding($str, "UTF-8", "GBK");
      echo $strr;
      echo $code_lis['psn_sex'][$data['psn_sex']];
      echo $data["q19"];
      break;
    }
  }
}
function ConvertToUTF8($text){
  $encoding = mb_detect_encoding($text, mb_detect_order(), false);
  if($encoding == "UTF-8")
  {
      $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');    
  }
  $out = iconv(mb_detect_encoding($text, mb_detect_order(), false), "UTF-8//IGNORE", $text);
  return $out;
}

?>