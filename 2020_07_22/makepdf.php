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


$tb1 = '
  <table border="1" cellpadding="2"  align="center">
    <tr nobr="true">
      <th rowspan="9">基本資料(諮詢服務對象)</th>
      <th>姓名</th>
      <th></th>
      <th>性別:</th>
      <th>男 女</th>
      <th>諮詢日期</th>
      <th>年 月 日</th>
    </tr>
    <tr nobr="true">
      <th>服務機構</th>
    </tr>
    <tr nobr="true">
      <th>身分別(一)</th>
    </tr>
    <tr nobr="true">
      <th>身分別(二)</th>
    </tr>
    <tr nobr="true">
      <th>專上學校或機構職稱(級)</th>
    </tr>
    <tr nobr="true">
      <th>兼任行政職務</th>
    </tr>
    <tr nobr="true">
      <th>特殊身分</th>
    </tr>
    <tr nobr="true">
      <th>任職年資(截至諮詢日)</th>
    </tr>
    <tr nobr="true">
      <th>預計退休日期</th>
    </tr>


  </table>
';
$pdf->writeHTML($tb1, true, false, false, false, '');
// $tbl = '
// <br><br><br>
// <table border="1" cellpadding="2"  align="center">
// <tr nobr="true">
//   <th rowspan="2" width="9%"><b>得提列公務人員考試職缺數</b></th>
//   <th width="76%" colspan="8"><b><font size="18">已提列各種考試職缺數<br>(含申請各類候用人員之職缺)</font></b></th>
//   <th width="15%"><b>備註（請填提缺<br>數）</b></th>
// </tr>
// <tr nobr="true">
//   <th width="8%">高考<br>1級</th>
//   <th width="8%">高考<br>2級</th>
//   <th width="8%">高考<br>3級</th>
//   <th width="8%">普通<br>考試</th>
//   <th width="8%">初等<br>考試</th>
//   <th width="8%">身障<br>特考</th>
//   <th width="12%">原住民<br>特考</th>
//   <th width="16%">中央機關請辦之特種考試</th>
//   <th width="15%">因應行政院組改控管職缺數</th>
// </tr>
// <tr nobr="true"> 
//   <th>'.$_POST["one"].'</th>
//   <th>'.$_POST["two"].'</th>
//   <th>'.$_POST["three"].'</th>
//   <th>'.$_POST["four"].'</th>
//   <th>'.$_POST["five"].'</th>
//   <th>'.$_POST["six"].'</th>
//   <th>'.$_POST["seven"].'</th>
//   <th>'.$_POST["eight"].'</th>
//   <th>'.$_POST["nine"].'</th>
//   <th>'.$_POST["ten"].'</th>
// </tr>
// </table>
// ';

// $pdf->writeHTML($tbl, true, false, false, false, '');


// $tbl = '
// <h4><b><font size="17">請詳閱「注意事項」後再行查填。</font></b></h4>
// <p><font size="17">機關（構）學校名稱：  '.$_POST['agency'].'</font></p>
// <p><font size="17">填表人職稱:_____________ 姓名:_____________ </font></p>
// <p><font size="17">聯絡電話：_____________ </font></p>
// <p><font size="17">電子郵件信箱：_____________ </font></p>
// ';
// $pdf->writeHTML($tbl, true, false, false, false, '');


ob_end_clean();
//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');
?>