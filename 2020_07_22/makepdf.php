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
<h4 style="font-size: 20pt; font-weight: normal; text-align: center;"><b><font size="15">提供教職員退休規劃諮詢服務紀錄表</font></b></h4>
';
$pdf->writeHTML($tbl, true, false, false, false, '');

// $pdf->RoundedRect(5, 10, 40, 30, 3.50, 'DF');
// $pdf->RoundedRect(50, 10, 40, 30, 6.50, '1000');

// $style3 = array('color' => array(1, 1,123));
// $style4 = array('L' => 0,
//                 'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),
//                 'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),
//                 'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));

$pdf->Rect(100, 10, 5, 5, 3.5, 'DF');
// $pdf->Rect(145, 10, 40, 20, 'D', array('all' => $style3));

// <font style="text-align:left"> </font>
$tb1 = '
  <p><p>
  <table border="1" cellpadding="2"  align="center" >
    <tr nobr="true">
      <th width="7%" rowspan="9"><br><br><br><br><br><br>基本資料(諮詢服務對象)</th>
      <th width="13%">姓名</th>
      <th width="15%"></th>
      <th width="5%">性別:</th>
      <th width="18%"><font style="text-align:left"> &emsp;&emsp;男 &emsp;&emsp;女</font></th>
      <th width="15%"><font style="text-align:left"> &nbsp;諮詢日期:</font></th>
      <th width="22%"><font style="text-align:left"> &emsp;&emsp;&emsp;&emsp;年 &emsp;&emsp;月 &emsp;&emsp;日</font></th>
    </tr>
    <tr nobr="true">
      <th>服務機構</th>
      <th colspan="5"><font style="text-align:left"> &emsp;專科以上學校   &ensp;&emsp;&emsp;高中(職)   &ensp;&emsp;&emsp;國中   &ensp;&emsp;&emsp;國小   &ensp;&emsp;&emsp;社會教育機構   &ensp;&emsp;&emsp;學術研究機構</font></th>
    </tr>
    <tr nobr="true">
      <th>身分別(一)</th>
      <th colspan="5"><font style="text-align:left"> &emsp;教師 &ensp;&emsp;&emsp;研究人員 &ensp;&emsp;&emsp;專業人員 &ensp;&emsp;&emsp;其他(如助教、職員、運動教練)</font></th>
    </tr>
    <tr nobr="true">
      <th>身分別(二)</th>
      <th colspan="5"><font style="text-align:left"> &emsp;現職 &ensp;&emsp;&emsp;留停：1. &emsp;借調( &emsp;民營事業 &ensp;&emsp;財團法人 &ensp;&emsp;行政法人 &ensp;&emsp;政府機關(構) &ensp;&emsp;民間 &ensp;其他)<br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 2. &emsp;育嬰；3. &emsp;侍親；4.
       &emsp; 其他</font></th>
    </tr>
    <tr nobr="true">
      <th>專上學校或機構職稱(級)</th>
      <th colspan="5"><font style="text-align:left"> &emsp;教授(級)或研究員 &emsp;副教授(級)或副研究員 &emsp;助理教授(級)或助理研究員 &emsp;講師級或研究助理<br> &emsp;助教或職員</font></th>
    </tr>
    <tr nobr="true">
      <th>兼任行政職務</th>
      <th colspan="5"><font style="text-align:left"> &emsp;是 &emsp;&emsp;否</font></th>
    </tr>
    <tr nobr="true">
      <th>特殊身分</th>
      <th colspan="5"><font style="text-align:left"> &emsp;無 &emsp;&emsp;身障 &emsp;&emsp;原住民族 &emsp;&emsp;體能降齡 &emsp;&emsp;具永久居留證外籍教師 &emsp;&emsp;具永久居留證外籍教師</font></th>
    </tr>
    <tr nobr="true">
      <th>任職年資<br>(截至諮詢日)</th>
      <th colspan="5" ><font style="text-align:left">退撫新制實施前： &emsp;&ensp;年 &emsp;&ensp;月、退撫新制實施後： &emsp;&ensp;年 &emsp;&ensp;月 &emsp;&emsp;；&emsp;&emsp;合計： &emsp;&ensp;年 &emsp;&ensp;月</font></th>
    </tr>
    <tr nobr="true">
      <th>預計退休日期</th>
      <th colspan="5"><font style="text-align:left"> &emsp;已確定 &emsp;&emsp;年 &emsp;&emsp;月 &emsp;&emsp;日 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;尚未確定 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;其他</font></th>
    </tr>
    <tr nobr="true">
      <th width="7%" rowspan="4"><br><br>諮詢服務內容</th>
      <th width="13%">諮詢類型及目的</th>
      <th width="75%"><font style="text-align:left"> &emsp;提報退休案 &emsp;&emsp;制度瞭解或建議 &emsp;&emsp;退休規劃準備 &emsp;&emsp;退撫基金繳付 &emsp;&emsp;退休年資 &emsp;&emsp;其他</font></th>
    </tr>
    <tr nobr="true">
      <th>退休類型及條件</th>
      <th><font style="text-align:left"> &emsp;退休類型（自願、屆齡、命退）&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;可退休年齡 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;退休年資採計<br> &emsp;月退休金起支年齡（指標數、展期、減額）&emsp;&emsp;延長服務</font></th>
    </tr>
    <tr nobr="true">
      <th>退休給與</th>
      <th><font style="text-align:left"> &emsp;退休金種類（一次、月退、兼領） &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;退休金停領與恢復及剝奪、減少<br> &emsp;退休金計算基準 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;人道關懷條款<br> &emsp;所得替代率 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;最低保障規範<br> &emsp;退休再任 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;&emsp;退休金發放、查驗<br> &emsp;優惠存款 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;補償金<br> &emsp;其他</font></th>
    </tr>
    <tr nobr="true">
      <th>其他</th>
      <th><font style="text-align:left"> &emsp;年資轉銜（年資併計、年資保留） &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;離婚配偶請求 &emsp;&emsp;&emsp;&emsp;免受第37條及第38條限制之條件</font></th>
    </tr>
    
  </table>
';
$pdf->writeHTML($tb1, true, false, false, false, '');

$pdf->AddPage();


ob_end_clean();
//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');
?>