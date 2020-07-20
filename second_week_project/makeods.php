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
  use odsPhpGenerator\odsStyleTableColumn;
  use odsPhpGenerator\odsTableColumn;
  use odsPhpGenerator\odsFontFace;
  use odsPhpGenerator\odsTableCellFloat;



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
  $sql = "SELECT * FROM exam_table";
  $result = $conn->query($sql);


  $first_num = 0;
  $numcal = array("0","0","0","0","0","0","0","0","0","0" );
  if ($result->num_rows > 0) {
    // output data of each row
    while($rowdb = $result->fetch_assoc()) {
      if($first_num == 0){
        // Create Ods object
        $ods  = new ods();

        // Create table
        $table = new odsTable('MergeCell');

        // Font Face
        $font_face = new odsFontFace('標楷體');
        $ods->addFontFaces($font_face);


        //set column width
        $styleColumn = new odsStyleTableColumn();
        $styleColumn->setColumnWidth("0.7cm");
        $column1 = new odsTableColumn($styleColumn);
        $styleColumn = new odsStyleTableColumn();
        $styleColumn->setColumnWidth("6cm");
        $column2 = new odsTableColumn($styleColumn);
        $styleColumn = new odsStyleTableColumn();
        $styleColumn->setColumnWidth("1.5cm");
        $column3 = new odsTableColumn($styleColumn);
        $styleColumn = new odsStyleTableColumn();
        $styleColumn->setColumnWidth("1cm");
        $column4 = new odsTableColumn($styleColumn);
        $styleColumn = new odsStyleTableColumn();
        $styleColumn->setColumnWidth("1.9cm");
        $column5 = new odsTableColumn($styleColumn);
        $table->addTableColumn($column1);
        $table->addTableColumn($column2);
        $table->addTableColumn($column3);
        for($i=0; $i<7; $i++) { 
          $table->addTableColumn($column4);
        }
        $table->addTableColumn($column5);
        $table->addTableColumn($column5);

        //set the cell text style
        $style_center = new odsStyleTableCell(); //center
        $style_center->setTextAlign('center');
        $style_center->setBorder('0.01cm solid #000000');
        $style_center->setFontFace($font_face);


        $style_right = new odsStyleTableCell(); //right
        $style_right->setTextAlign('end');
        $style_right->setBorder('0.01cm solid #000000');
        $style_right->setFontFace($font_face);

        $style_justify = new odsStyleTableCell();
        $style_justify->setTextAlign('justify');
        $style_justify->setBackgroundColor('#ffff00');
        $style_justify->setBorder('0.01cm solid #000000');
        $style_justify->setFontFace($font_face);

        $center_yellow = new odsStyleTableCell(); //center
        $center_yellow->setTextAlign('center');
        $center_yellow->setBackgroundColor('#ffff00');
        $center_yellow->setBorder('0.01cm solid #000000');
        $center_yellow->setFontFace($font_face);
        // Green background
        // $style2 = new odsStyleTableCell();
        // $style2->setBackgroundColor('#00ff00');

        //first row
        $row = new odsTableRow();
        $cell = new odsTableCellString('得提列公務人員考試職缺與已提列考試職缺控管表（108年第4季）', $style_center);
        $cell->setNumberColumnsSpanned(12);
        $cell->setNumberRowsSpanned(1);
        $row->addCell( $cell );
        $table->addRow($row);
        //second row
        $row = new odsTableRow();
        $cell = new odsTableCellString('109.1.3', $style_right);
        $cell->setNumberColumnsSpanned(12);
        $cell->setNumberRowsSpanned(1);
        $row->addCell( $cell );
        $table->addRow($row);
        //third row
        $row = new odsTableRow();
        $row->addCell( new odsCoveredTableCell() );
        $row->addCell( new odsCoveredTableCell() )  ;
        $cell = new odsTableCellString('得提列公務人員考試職缺數', $style_justify);
        $cell->setNumberColumnsSpanned(1);
        $cell->setNumberRowsSpanned(2);
        $row->addCell($cell);
        $cell = new odsTableCellString('已提列各種考試職缺數', $center_yellow);
        $cell->setNumberColumnsSpanned(8);
        $cell->setNumberRowsSpanned(1);
        $row->addCell($cell);
        $cell = new odsTableCellString('備註-因應行政院組改控管職缺數', $style_justify);
        $cell->setNumberColumnsSpanned(1);
        $cell->setNumberRowsSpanned(2);
        $row->addCell($cell);
        $table->addRow($row);
        //fourth row
        $row = new odsTableRow();
        $cell = new odsTableCellString('編號', $style_justify);
        $row->addCell($cell);
        $cell = new odsTableCellString('機關（構）學校全銜', $center_yellow);
        $row->addCell($cell);
        $row->addCell( new odsCoveredTableCell() );
        $cell = new odsTableCellString('高考1級', $style_justify);
        $row->addCell($cell);
        $cell = new odsTableCellString('高考2級', $style_justify);
        $row->addCell($cell);
        $cell = new odsTableCellString('高考3級', $style_justify);
        $row->addCell($cell);
        $cell = new odsTableCellString('普通考試', $style_justify);
        $row->addCell($cell);
        $cell = new odsTableCellString('初等考試', $style_justify);
        $row->addCell($cell);
        $cell = new odsTableCellString('身障特考', $style_justify);
        $row->addCell($cell);
        $cell = new odsTableCellString('原住民特考', $style_justify);
        $row->addCell($cell);
        $cell = new odsTableCellString('中央機關請辦之特種考試', $style_justify);
        $row->addCell($cell);
        $table->addRow($row);

        $first_num+=1;
      }
      //start the data 
      $row = new odsTableRow();
      $row->addCell(new odsTableCellFloat((int)$rowdb["id"], $style_justify));
      //find the agency name by id
      $sql2 = "SELECT * FROM agency_table WHERE id='".$rowdb["id"]."' ";
      $result2 = $conn->query($sql2);
      $rowdb2 = $result2->fetch_assoc();
      //buile the table
      $row->addCell(new odsTableCellString($rowdb2['agency'], $center_yellow));
      $row->addCell(new odsTableCellFloat((int)$rowdb["one"], $style_center));
      $row->addCell(new odsTableCellFloat((int)$rowdb["two"], $style_center));
      $row->addCell(new odsTableCellFloat((int)$rowdb["three"], $style_center));
      $row->addCell(new odsTableCellFloat((int)$rowdb["four"], $style_center));
      $row->addCell(new odsTableCellFloat((int)$rowdb["five"], $style_center));
      $row->addCell(new odsTableCellFloat((int)$rowdb["six"], $style_center));
      $row->addCell(new odsTableCellFloat((int)$rowdb["seven"], $style_center));
      $row->addCell(new odsTableCellFloat((int)$rowdb["eight"], $style_center));
      $row->addCell(new odsTableCellFloat((int)$rowdb["nine"], $style_center));
      $row->addCell(new odsTableCellFloat((int)$rowdb["ten"], $style_center));
      $table->addRow($row);
      //calculate the total num on each col
      $numcal[0] = (int)$numcal[0]+(int)$rowdb["one"];
      $numcal[1] = (int)$numcal[1]+(int)$rowdb["two"];
      $numcal[2] = (int)$numcal[2]+(int)$rowdb["three"];
      $numcal[3] = (int)$numcal[3]+(int)$rowdb["four"];
      $numcal[4] = (int)$numcal[4]+(int)$rowdb["five"];
      $numcal[5] = (int)$numcal[5]+(int)$rowdb["six"];
      $numcal[6] = (int)$numcal[6]+(int)$rowdb["seven"];
      $numcal[7] = (int)$numcal[7]+(int)$rowdb["eight"];
      $numcal[8] = (int)$numcal[8]+(int)$rowdb["nine"];
      $numcal[9] = (int)$numcal[9]+(int)$rowdb["ten"];

      
    } 
    $row = new odsTableRow();
    $cell = new odsTableCellString('合計', $center_yellow);
    $cell->setNumberColumnsSpanned(2);
    $cell->setNumberRowsSpanned(1);
    $row->addCell($cell);

    for($x=0;$x<10;$x++){
      $row->addCell(new odsTableCellFloat((int)$numcal[$x], $style_center)); 
    }
    $table->addRow($row);

    $row = new odsTableRow();
    $cell = new odsTableCellString('已提列', $center_yellow);
    $cell->setNumberColumnsSpanned(2);
    $cell->setNumberRowsSpanned(1);
    $row->addCell($cell);
    $tmpnum=0;
    for($x=1;$x<=8;$x++){
      $tmpnum += (int)$numcal[$x]; 
    }
    $cell = new odsTableCellFloat($tmpnum, $style_center);
    $cell->setNumberColumnsSpanned(10);
    $cell->setNumberRowsSpanned(1);
    $row->addCell($cell);
    $table->addRow($row);

    $row = new odsTableRow();
    $cell = new odsTableCellString('提缺比(提缺數44個/得提缺數114個)', $center_yellow);
    $cell->setNumberColumnsSpanned(2);
    $cell->setNumberRowsSpanned(1);
    $row->addCell($cell);
    $table->addRow($row);
    
    $ods->addTable($table);
    $ods->downloadOdsFile("MergeCell.ods");
  } else {
    echo "0 results";
  }

  // $ods->downloadOdsFile("MergeCell.ods");
  $conn->close();





?>