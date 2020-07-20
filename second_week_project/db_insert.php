<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



// $sql = "UPDATE exam_table INNER JOIN agency_table ON exam_table.id = agency_table.id 
//         SET one = 9 WHERE agency_table.agency = '教育部' ";

  $sql2 = "SELECT * FROM agency_table WHERE id=3";
  $result2 = $conn->query($sql2);
  $rowdb2 = $result2->fetch_assoc();
  echo $rowdb2['agency'];
  // if ($result->num_rows > 0) {
  //   // output data of each row
  //   while($rowdb = $result->fetch_assoc()) {
  //     echo $rowdb['agency'];
  //   }
  // }
//insert exam_table for 76 row
// for($x = 1; $x <= 76; $x++) {
//   // echo $agency_list[$x];
//   $sql = "INSERT INTO exam_table (id,one,two,three,four,five,six,seven,eight,nine,ten)
//   VALUES ('$x',0,0,0,0,0,0,0,0,0,0)";
//   if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
// }

//insert agency table
// $agency_list = array("教育部", "教育部國民及學前教育署暨所屬國立學校","國立臺灣藝術教育館","教育部體育署","教育部青年發展署","國家教育研究院","國家圖書館","國立海洋生物博物館","國立自然科學博物館","國立科學工藝博物館","國立臺灣科學教育館","國立教育廣播電臺","國立公共資訊圖書館","國立臺灣圖書館","國立海洋科技博物館","國立臺灣大學","國立臺灣大學醫學院附設醫院","國立臺灣大學醫學院附設醫院雲林分院","國立臺灣大學醫學院附設醫院北護分院","國立臺灣大學醫學院附設醫院金山分院","國立臺灣大學醫學院附設醫院新竹分院","國立臺灣大學醫學院附設醫院竹東分院","國立臺灣大學生物資源暨農學院實驗林管理處","國立臺灣大學生物資源暨農學院附設山地實驗農場","國立臺灣大學生物資源暨農學院附設農業試驗場","國立臺灣大學生物資源暨農學院附設動物醫院醫","國立政治大學","國立臺灣師範大學","國立成功大學","國立成功大學醫學院附設醫院","國立中興大學","國立中興大學農業暨自然資源學院實驗林管理處","國立清華大學","國立中央大學","國立交通大學","國立中山大學","國立空中大學","國立中正大學","國立臺灣海洋大學","國立陽明大學","國立陽明大學附設醫院","國立東華大學","國立暨南國際大學","國立臺北大學","國立嘉義大學","國立高雄大學","國立彰化師範大學","國立高雄師範大學","國立臺灣科技大學","國立臺北科技大學","國立高雄科技大學","國立雲林科技大學","國立屏東科技大學","國立臺灣藝術大學","國立臺北藝術大學","國立虎尾科技大學","國立宜蘭大學","國立聯合大學","國立臺中科技大學","國立勤益科技大學","國立澎湖科技大學","國立臺南藝術大學","國立臺北教育大學","國立臺中教育大學","國立臺南大學","國立臺東大學","國立體育大學","國立臺灣體育運動大學","國立臺北護理健康大學","國立高雄餐旅大學","國立金門大學","國立臺灣戲曲學院","國立屏東大學","國立臺北商業大學","國立臺南護理專科學校","國立臺東專科學校");
// $arrlength = count($agency_list);
// for($x = 1; $x <= $arrlength; $x++) {
//   // echo ;
//   $tmp = $agency_list[$x-1];
//   $sql = "INSERT INTO agency_table (id,agency)
//   VALUES ('$x','$tmp')";
//   if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
// }

$conn->close();
?>