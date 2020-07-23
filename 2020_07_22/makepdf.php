<?php

// Include the main TCPDF library (search for installation path).
require('../.././tcpdf_lib/tcpdf.php'); 
ob_start();

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
$pdf->Line(210, 39.2, 273.5, 39.2);
$pdf->Line(172, 71.5,210, 71.5);
$pdf->Line(106, 104,130, 104);
$pdf->Line(171, 104,198, 104);
$pdf->Line(232, 104,260, 104);
$pdf->Line(89, 115.7,130, 115.7);
$pdf->Line(251, 122,270, 122);
$pdf->Line(85, 167,120, 167);



//first query
$pdf->Rect(130, 42.5, 3.8, 3.8, 3.5, 'DF'); //男
$pdf->Rect(143, 42.5, 3.8, 3.8, 3.5, 'DF'); //女
//second query
$pdf->Rect(71.7, 49, 3.8, 3.8, 3.5, 'DF'); //專科以上學校
$pdf->Rect(110, 49, 3.8, 3.8, 3.5, 'DF'); //高中職
$pdf->Rect(139, 49, 3.8, 3.8, 3.5, 'DF'); //國中
$pdf->Rect(161, 49, 3.8, 3.8, 3.5, 'DF'); //國小
$pdf->Rect(183.5, 49, 3.8, 3.8, 3.5, 'DF'); //社會教育機構
$pdf->Rect(223, 49, 3.8, 3.8, 3.5, 'DF'); //學術研究機構
//third query
$pdf->Rect(71.7, 55.6, 3.8, 3.8, 3.5, 'DF'); //教師
$pdf->Rect(94, 55.6, 3.8, 3.8, 3.5, 'DF'); //研究人員
$pdf->Rect(125, 55.6, 3.8, 3.8, 3.5, 'DF'); //專業人員
$pdf->Rect(155.8, 55.6, 3.8, 3.8, 3.5, 'DF'); //其他
//fourth query
$pdf->Rect(71.7, 62.3, 3.8, 3.8, 3.5, 'DF'); //現職
$pdf->Rect(94, 62.3, 3.8, 3.8, 3.5, 'DF'); //留停
$pdf->Rect(114.5, 62.3, 3.8, 3.8, 3.5, 'DF'); //借調
$pdf->Rect(130, 62.3, 3.8, 3.8, 3.5, 'DF'); //民營
$pdf->Rect(156, 62.3, 3.8, 3.8, 3.5, 'DF'); //財團
$pdf->Rect(183, 62.3, 3.8, 3.8, 3.5, 'DF'); //行政
$pdf->Rect(209, 62.3, 3.8, 3.8, 3.5, 'DF'); //政府機關
$pdf->Rect(242, 62.3, 3.8, 3.8, 3.5, 'DF'); //民間
$pdf->Rect(256, 62.3, 3.8, 3.8, 3.5, 'DF'); //其他
$pdf->Rect(114.5, 67.7, 3.8, 3.8, 3.5, 'DF'); //育嬰
$pdf->Rect(136, 67.7, 3.8, 3.8, 3.5, 'DF'); //侍親
$pdf->Rect(158.3, 67.7, 3.8, 3.8, 3.5, 'DF'); //其他
//fiveth query
$pdf->Rect(71.7, 74.5, 3.8, 3.8, 3.5, 'DF'); //教授
$pdf->Rect(108.4, 74.5, 3.8, 3.8, 3.5, 'DF'); //副教授
$pdf->Rect(154, 74.5, 3.8, 3.8, 3.5, 'DF'); //助理教授
$pdf->Rect(207.8, 74.5, 3.8, 3.8, 3.5, 'DF'); //講師
$pdf->Rect(71.7, 79.8, 3.8, 3.8, 3.5, 'DF'); //助教
//sixth query
$pdf->Rect(71.7, 86.2, 3.8, 3.8, 3.5, 'DF'); //是
$pdf->Rect(85.5, 86.2, 3.8, 3.8, 3.5, 'DF'); //否
//seven query
$pdf->Rect(71.7, 93.1, 3.8, 3.8, 3.5, 'DF'); //無
$pdf->Rect(85.5, 93.1, 3.8, 3.8, 3.5, 'DF'); //身障
$pdf->Rect(103.4, 93.1, 3.8, 3.8, 3.5, 'DF'); //原住民族
$pdf->Rect(129.8, 93.1, 3.8, 3.8, 3.5, 'DF'); //體能降齡
$pdf->Rect(156.4, 93.1, 3.8, 3.8, 3.5, 'DF'); //具永久
$pdf->Rect(208.3, 93.1, 3.8, 3.8, 3.5, 'DF'); //未具永久
//nine query
$pdf->Rect(71.7, 111.7, 3.8, 3.8, 3.5, 'DF'); //已確定
$pdf->Rect(160.5, 111.7, 3.8, 3.8, 3.5, 'DF'); //尚未確定
$pdf->Rect(212.3, 111.7, 3.8, 3.8, 3.5, 'DF'); //其他
//ten query
$pdf->Rect(71.7, 118.4, 3.8, 3.8, 3.5, 'DF'); //提報退休案
$pdf->Rect(102.5, 118.4, 3.8, 3.8, 3.5, 'DF'); //制度了解或建議
$pdf->Rect(141.5, 118.4, 3.8, 3.8, 3.5, 'DF'); //退休規畫準備
$pdf->Rect(176.3, 118.4, 3.8, 3.8, 3.5, 'DF'); //退撫基金繳付
$pdf->Rect(211.4, 118.4, 3.8, 3.8, 3.5, 'DF'); //退休年資
$pdf->Rect(238, 118.4, 3.8, 3.8, 3.5, 'DF'); //其他
//eleven query
$pdf->Rect(71.7, 125.3, 3.8, 3.8, 3.5, 'DF'); //退休類型
$pdf->Rect(160.5, 125.3, 3.8, 3.8, 3.5, 'DF'); //可退休年齡
$pdf->Rect(212, 125.3, 3.8, 3.8, 3.5, 'DF'); //退休年資採計
$pdf->Rect(71.7, 130.7, 3.8, 3.8, 3.5, 'DF'); //月退休金起支年齡
$pdf->Rect(160.5, 130.7, 3.8, 3.8, 3.5, 'DF'); //延長服務

//twelve query
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
//thirteen query
$pdf->Rect(71.7, 170.1, 3.8, 3.8, 3.5, 'DF'); //年資轉銜
$pdf->Rect(161, 170.1, 3.8, 3.8, 3.5, 'DF'); //離婚配偶請求
$pdf->Rect(205.4, 170.1, 3.8, 3.8, 3.5, 'DF'); //免受第37條及第38條限制之條件




$tb1 = '
  <br><br>
  <font size="12"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;機關（構）學校名稱：</font>
  <br>
  <table border="1" cellpadding="2"  align="center" >
    <tr nobr="true">
      <th width="7%" rowspan="9"><br><br><br><br><br><br>基本資料(諮詢服務對象)</th>
      <th width="13%"><font style="text-align:left">姓名</font></th>
      <th width="15%"></th>
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

//13 query  (13query 未完待續)
$pdf->Rect(71.7, 22, 3.8, 3.8, 3.5, 'DF'); //試算退休金
$pdf->Rect(161.5, 22, 3.8, 3.8, 3.5, 'DF'); //其他
//14 query
$pdf->Rect(71.7, 28.9, 3.8, 3.8, 3.5, 'DF'); //無
$pdf->Rect(71.7, 34.2, 3.8, 3.8, 3.5, 'DF'); //有
//16 query
$pdf->Rect(71.7, 61.1, 3.8, 3.8, 3.5, 'DF'); //人事單位主動安排
$pdf->Rect(144.4, 61.1, 3.8, 3.8, 3.5, 'DF'); //教職員自行尋求諮詢
//17 query
$pdf->Rect(71.7, 67.8, 3.8, 3.8, 3.5, 'DF'); //面對面
$pdf->Rect(102, 67.8, 3.8, 3.8, 3.5, 'DF'); //電話
$pdf->Rect(145, 67.8, 3.8, 3.8, 3.5, 'DF'); //電子郵件
$pdf->Rect(185, 67.8, 3.8, 3.8, 3.5, 'DF'); //其他
//18 query
$pdf->Rect(71.7, 79.8, 3.8, 3.8, 3.5, 'DF'); //1小時以上
$pdf->Rect(104, 79.8, 3.8, 3.8, 3.5, 'DF'); //30~1小時
$pdf->Rect(144, 79.8, 3.8, 3.8, 3.5, 'DF'); //30以下
//19 query
$pdf->Rect(71.7, 91.7, 3.8, 3.8, 3.5, 'DF'); //是
$pdf->Rect(71.7, 97, 3.8, 3.8, 3.5, 'DF'); //否
$pdf->Rect(84.7, 97, 3.8, 3.8, 3.5, 'DF'); //絕大部分
$pdf->Rect(84.7, 102.3, 3.8, 3.8, 3.5, 'DF'); //仍需教職員
$pdf->Rect(84.7, 107.6, 3.8, 3.8, 3.5, 'DF'); //涉及未來
//21 query
$pdf->Rect(71.7, 126.4, 3.8, 3.8, 3.5, 'DF'); //有
$pdf->Rect(93.8, 126.4, 3.8, 3.8, 3.5, 'DF'); //有
$pdf->Rect(124.6, 126.4, 3.8, 3.8, 3.5, 'DF'); //有
$pdf->Rect(151, 126.4, 3.8, 3.8, 3.5, 'DF'); //有
$pdf->Rect(71.7, 131.7, 3.8, 3.8, 3.5, 'DF'); //有






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
      <th><font style="text-align:left">1.本次服務類型</font></th>
      <th><font style="text-align:left"> &emsp;人事單位主動安排 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;教職員自行尋求諮詢</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">2.諮詢服務的方<br> 式</font></th>
      <th><font style="text-align:left"> &emsp;面對面 &emsp;&emsp;&emsp;&emsp;電話 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;電子郵件 &emsp;&emsp;&emsp;&emsp;&emsp;其他</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">3.諮詢服務使用<br> 時間</font></th>
      <th><font style="text-align:left"> &emsp;1小時以上 &emsp;&emsp;&emsp;30分鐘~1小時 &emsp;&emsp;&emsp;30分鐘以下</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">4.學校教職員詢問的內容均能當場給予明確答覆</font></th>
      <th><font style="text-align:left"> &emsp;是<br> &emsp;否： &emsp;絕大部分仍會確認後再予回復<br> &emsp;&emsp;&emsp;&emsp;仍需教職員提供具體資料才能確定<br> &emsp;&emsp;&emsp;&emsp;涉及未來制度或管理規劃，難以明確說明（請將意見填列於「教職員建議事項」相關）</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">5.教職員對於諮詢服務的反應</font></th>
      <th><font style="text-align:left"> &emsp;&emsp;&emsp;分（最高10分，以教職員非常不滿意（不能接受）為1分，非常滿意（肯定服務效益）為10分覈實<br> &emsp;&emsp;&emsp;&emsp;&emsp;評分計給）</font></th>
    </tr>
    <tr nobr="true">
      <th><font style="text-align:left">6.安排下一次諮詢服務</font></th>
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
 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;提供諮詢服務者：</font></p>
';
$pdf->writeHTML($tbl, true, false, false, false, '');




ob_end_clean();
//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');
?>

