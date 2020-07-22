<?php

// Include the main TCPDF library (search for installation path).
require('./tcpdf_lib/tcpdf.php'); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE exam_table INNER JOIN agency_table ON exam_table.id = agency_table.id 
      SET one = '".$_POST["one"]."',two='".$_POST["two"]."',three='".$_POST["three"]."',four='".$_POST["four"]."',five='".$_POST["five"]."',six='".$_POST["six"]."',seven='".$_POST["seven"]."',eight='".$_POST["eight"]."',nine='".$_POST["nine"]."',ten='".$_POST["ten"]."' WHERE agency_table.agency = '".$_POST['agency']."' ";

if ($conn->query($sql) === TRUE) {
  echo "update successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


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
<h4 style="font-size: 20pt; font-weight: normal; text-align: center;"><b><font size="20">得提列公務人員考試職缺與已提列考試職缺控管表<br>（108年第4季）</font></b></h4>
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');


$tbl = '
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
  <th>'.$_POST["one"].'</th>
  <th>'.$_POST["two"].'</th>
  <th>'.$_POST["three"].'</th>
  <th>'.$_POST["four"].'</th>
  <th>'.$_POST["five"].'</th>
  <th>'.$_POST["six"].'</th>
  <th>'.$_POST["seven"].'</th>
  <th>'.$_POST["eight"].'</th>
  <th>'.$_POST["nine"].'</th>
  <th>'.$_POST["ten"].'</th>
</tr>
</table>
';

$pdf->writeHTML($tbl, true, false, false, false, '');


$tbl = '
<h4><b><font size="17">請詳閱「注意事項」後再行查填。</font></b></h4>
<p><font size="17">機關（構）學校名稱：  '.$_POST['agency'].'</font></p>
<p><font size="17">填表人職稱:_____________ 姓名:_____________ </font></p>
<p><font size="17">聯絡電話：_____________ </font></p>
<p><font size="17">電子郵件信箱：_____________ </font></p>
';
$pdf->writeHTML($tbl, true, false, false, false, '');


ob_end_clean();
//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');
?>