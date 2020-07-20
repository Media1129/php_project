<!DOCTYPE HTML>  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>  


<h1>成績登入系統</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <select name="agency">
    <option value="1">(001) 教育部</option>
    <option value="2">(002) 教育部國民及學前教育署暨所屬國立學校</option>
    <option value="3">(003) 國立臺灣藝術教育館</option>
    <option value="4">(004) 教育部體育署</option>
    <option value="5">(005) 教育部青年發展署</option>
    <option value="6">(006) 國家教育研究院</option>
    <option value="7">(007) 國家圖書館</option>
    <option value="8">(008) 國立海洋生物博物館</option>
    <option value="9">(009) 國立自然科學博物館</option>
    <option value="10">(010) 國立科學工藝博物館</option>
    <option value="11">(011) 國立臺灣科學教育館</option>
    <option value="12">(012) 國立教育廣播電臺</option>
    <option value="13">(013) 國立公共資訊圖書館</option>
    <option value="14">(014) 國立臺灣圖書館</option>
    <option value="15">(015) 國立海洋科技博物館</option>
    <option value="16">(016) 國立臺灣大學</option>
    <option value="17">(017) 國立臺灣大學醫學院附設醫院</option>
    <option value="18">(018) 國立臺灣大學醫學院附設醫院雲林分院</option>
    <option value="19">(019) 國立臺灣大學醫學院附設醫院北護分院</option>
    <option value="20">(020) 國立臺灣大學醫學院附設醫院金山分院</option>
    <option value="21">(021) 國立臺灣大學醫學院附設醫院新竹分院</option>
    <option value="22">(022) 國立臺灣大學醫學院附設醫院竹東分院</option>
    <option value="23">(023) 國立臺灣大學生物資源暨農學院實驗林管理處</option>
    <option value="24">(024) 國立臺灣大學生物資源暨農學院附設山地實驗農場</option>
    <option value="25">(025) 國立臺灣大學生物資源暨農學院附設農業試驗場</option>
    <option value="26">(026) 國立臺灣大學生物資源暨農學院附設動物醫院醫</option>
    <option value="27">(027) 國立政治大學</option>
    <option value="28">(028) 國立臺灣師範大學</option>
    <option value="29">(029) 國立成功大學</option>
    <option value="30">(030) 國立成功大學醫學院附設醫院</option>
    <option value="31">(031) 國立中興大學</option>
    <option value="32">(032) 國立中興大學農業暨自然資源學院實驗林管理處</option>
    <option value="33">(033) 國立清華大學</option>
    <option value="34">(034) 國立中央大學</option>
    <option value="35">(035) 國立交通大學</option>
    <option value="36">(036) 國立中山大學</option>
    <option value="37">(037) 國立空中大學</option>
    <option value="38">(038) 國立中正大學</option>
    <option value="39">(039) 國立臺灣海洋大學</option>
    <option value="40">(040) 國立陽明大學</option>
    <option value="41">(041) 國立陽明大學附設醫院</option>
    <option value="42">(042) 國立東華大學</option>
    <option value="43">(043) 國立暨南國際大學</option>
    <option value="44">(044) 國立臺北大學</option>
    <option value="45">(045) 國立嘉義大學</option>
    <option value="46">(046) 國立高雄大學</option>
    <option value="47">(047) 國立彰化師範大學</option>
    <option value="48">(048) 國立高雄師範大學</option>
    <option value="49">(049) 國立臺灣科技大學</option>
    <option value="50">(050) 國立臺北科技大學</option>
    <option value="51">(051) 國立高雄科技大學</option>
    <option value="52">(052) 國立雲林科技大學</option>
    <option value="53">(053) 國立屏東科技大學</option>
    <option value="54">(054) 國立臺灣藝術大學</option>
    <option value="55">(055) 國立臺北藝術大學</option>
    <option value="56">(056) 國立虎尾科技大學</option>
    <option value="57">(057) 國立宜蘭大學</option>
    <option value="58">(058) 國立聯合大學</option>
    <option value="59">(059) 國立臺中科技大學</option>
    <option value="60">(060) 國立勤益科技大學</option>
    <option value="61">(061) 國立澎湖科技大學</option>
    <option value="62">(062) 國立臺南藝術大學</option>
    <option value="63">(063) 國立臺北教育大學</option>
    <option value="64">(064) 國立臺中教育大學</option>
    <option value="65">(065) 國立臺南大學</option>
    <option value="66">(066) 國立臺東大學</option>
    <option value="67">(067) 國立體育大學</option>
    <option value="68">(068) 國立臺灣體育運動大學</option>
    <option value="69">(069) 國立臺北護理健康大學</option>
    <option value="70">(070) 國立高雄餐旅大學</option>
    <option value="71">(071) 國立金門大學</option>
    <option value="72">(072) 國立臺灣戲曲學院</option>
    <option value="73">(073) 國立屏東大學</option>
    <option value="74">(074) 國立臺北商業大學</option>
    <option value="75">(075) 國立臺南護理專科學校</option>
    <option value="76">(076) 國立臺東專科學校</option>
  </select>
  <br><br>
  得提列公務人員考試職缺數: <input type="text" name="one">
  <br><br>
  高考1級: <input type="text" name="two">
  <br><br>
  高考2級: <input type="text" name="three">
  <br><br>
  高考3級: <input type="text" name="four">
  <br><br>
  普通考試: <input type="text" name="five">
  <br><br>
  初等考試: <input type="text" name="six">
  <br><br>
  身障特考: <input type="text" name="seven">
  <br><br>
  原住民特考: <input type="text" name="eight">
  <br><br>
  中央機關請辦之特種考試 : <input type="text" name="nine">
  <br><br>
  備註-因應行政院組改控管職缺數: <input type="text" name="ten">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<br>
<form action="makeods.php" method="post"> 
  <input type="submit" name="download" value="download"/> 
</form> 


<?php
//insert data into database
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit']) ) {
  // echo $_POST['agency'];
  // echo $_POST["one"];
  // echo $_POST["two"];
  // echo $_POST["three"];
  // echo $_POST["four"];
  // echo $_POST["five"];
  // echo $_POST["six"];
  // echo $_POST["seven"];
  // echo $_POST["eight"];
  // echo $_POST["nine"];
  // echo $_POST["ten"];
  

  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $dbname = "testdb";
  // $conn = new mysqli($servername, $username, $password, $dbname);
  // if ($conn->connect_error) {
  //   die("Connection failed: " . $conn->connect_error);
  // }
  // $sql = "INSERT INTO grade_table (teacher, subj, department, studentID, grade)
  // VALUES ('$teacher', '$subj', '$department', '$studentID', '$grade')";

  // if ($conn->query($sql) === TRUE) {
  //   echo "New record created successfully";
  // } else {
  //   echo "Error: " . $sql . "<br>" . $conn->error;
  // }
  // $conn->close();

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>




</body>
</html>