<?php

// Include the main TCPDF library (search for installation path).
require('./tcpdf_lib/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);




$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->SetFont('msungstdlight', '', 16);
$pdf->AddPage();

$tbl = <<<EOD
<h4 style="font-size: 20pt; font-weight: normal; text-align: center;"><b><font size="20">得提列公務人員考試職缺與已提列考試職缺控管表<br>（___年第__季）</font></b></h4>
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');


$tbl = <<<EOD
<br><br><br>
<table border="1" cellpadding="2"  align="center">
<tr nobr="true">
  <th rowspan="2" width="9%"><b>得提列公務人員考試職缺數</b></th>
  <th width="76%" colspan="8"><b><font size="18">已提列各種考試職缺數<br>(含申請各類候用人員之職缺)</font></b></th>
  <th width="15%"><b>備註（請填提缺<br>數）</b></th>
</tr>
<tr nobr="true">
  <th width="8%">高考<br>1級</th>
  <th width="8%">高考<br>2級</th>
  <th width="8%">高考<br>3級</th>
  <th width="8%">普通<br>考試</th>
  <th width="8%">初等<br>考試</th>
  <th width="8%">身障<br>特考</th>
  <th width="12%">原住民<br>特考</th>
  <th width="16%">中央機關請辦之特種考試</th>
  <th width="15%">因應行政院組改控管職缺數</th>
</tr>
<tr nobr="true"> 
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
</tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');


$tbl = <<<EOD
<h4><b><font size="17">請詳閱「注意事項」後再行查填。</font></b></h4>
<p><font size="17">機關（構）學校名稱：</font></p>
<p><font size="17">填表人職稱:_____________ 姓名:</font></p>
<p><font size="17">聯絡電話：</font></p>
<p><font size="17">電子郵件信箱：</font></p>

EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');



//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');
