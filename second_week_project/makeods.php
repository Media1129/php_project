<?php

  require('./ods_lib/ods.php');
  require('./ods_lib/odsDraw.php');
  require('./ods_lib/odsFontFace.php');
  require('./ods_lib/odsStyle.php');
  require('./ods_lib/odsTable.php');
  require('./ods_lib/odsTableCell.php');
  require('./ods_lib/odsTableColumn.php');
  require('./ods_lib/odsTableRow.php');

  use odsPhpGenerator\ods;
  use odsPhpGenerator\odsStyleTableCell;
  use odsPhpGenerator\odsTable;
  use odsPhpGenerator\odsTableRow;
  use odsPhpGenerator\odsTableCellString;
  use odsPhpGenerator\odsCoveredTableCell;



  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = 'testdb';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM grade_table";
  $result = $conn->query($sql);


  $first_num = 0;
  if ($result->num_rows > 0) {
    // output data of each row
    while($rowdb = $result->fetch_assoc()) {
      if($first_num == 0){
        // Create Ods object
        $ods  = new ods();
        // Style border
        $black_border_style = new odsStyleTableCell();
        $black_border_style->setBorder('0.01cm solid #000000');
        $blue_border_style = new odsStyleTableCell();
        $blue_border_style->setBorder('0.01cm solid #0000ff');
        // Create table
        $table = new odsTable('MergeCell');
        $ods->addTable($table);

        // Merge 4 horizontal cell
        $row = new odsTableRow();
        $row->addCell( new odsTableCellString('老師', $black_border_style) );
        $row->addCell( new odsTableCellString($rowdb["teacher"]) );
        $table->addRow($row);


        $row = new odsTableRow();
        $row->addCell( $cell = new odsTableCellString('科目名稱', $black_border_style) );
        $row->addCell( new odsTableCellString($rowdb["subj"]) );
        $table->addRow($row);

        //blank row (not use row)
        for($i=0; $i<1; $i++) { // You need add cell odsCoveredTableCell, in covered cell except the first row (implicit)
            $row = new odsTableRow();
            $row->addCell( new odsCoveredTableCell() );
            $table->addRow($row);
        }
        $row   = new odsTableRow();
        $row->addCell( new odsTableCellString("系所") );
        $row->addCell( new odsTableCellString("學號") );
        $row->addCell( new odsTableCellString("科目") );
        $row->addCell( new odsTableCellString("分數") );
        $row->addCell( new odsTableCellString("是否及格") );
        $table->addRow($row);

        $first_num+=1;
      }
      $row2   = new odsTableRow();
      $row2->addCell( new odsTableCellString($rowdb["department"]) );
      $row2->addCell( new odsTableCellString($rowdb["studentID"]) );
      $row2->addCell( new odsTableCellString($rowdb["subj"]) );
      $row2->addCell( new odsTableCellString($rowdb["grade"]) );
      if( ( (int)$rowdb["grade"] )>=60)
        $row2->addCell( new odsTableCellString("YES") );
      else
        $row2->addCell( new odsTableCellString("NO") );
      $table->addRow($row2);
    } 
    $ods->downloadOdsFile("MergeCell.ods");
  } else {
    echo "0 results";
  }

  $ods->downloadOdsFile("MergeCell.ods");
  $conn->close();





?>