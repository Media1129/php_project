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

//start the data 
$row = new odsTableRow();
$row->addCell(new odsTableCellFloat(1, $style_justify));
$row->addCell(new odsTableCellString('教育部', $center_yellow));
$row->addCell(new odsTableCellFloat(1, $style_center));
$row->addCell(new odsTableCellFloat(1, $style_center));
$row->addCell(new odsTableCellFloat(1, $style_center));
$row->addCell(new odsTableCellFloat(1, $style_center));
$row->addCell(new odsTableCellFloat(1, $style_center));
$row->addCell(new odsTableCellFloat(1, $style_center));
$row->addCell(new odsTableCellFloat(1, $style_center));
$row->addCell(new odsTableCellFloat(1, $style_center));
$row->addCell(new odsTableCellFloat(1, $style_center));
$row->addCell(new odsTableCellFloat(1, $style_center));
$table->addRow($row);



$ods->addTable($table);
$ods->downloadOdsFile("MergeCell.ods");

?>







<?php
//為了上方必須span但其實下方仍然可以寫入東西，必須用空白將位置真的空出來
// for($i=0; $i<3; $i++) { // You need add cell odsCoveredTableCell, in covered cell except the first row (implicit)
//     $row = new odsTableRow();
//     $row->addCell( new odsCoveredTableCell() );
//     $row->addCell( new odsCoveredTableCell() );
//     $row->addCell( new odsCoveredTableCell() );
//     $row->addCell( new odsCoveredTableCell() );
//     $table->addRow($row);
// }


// Second Columns Merge 4 vertical cell
// $row = new odsTableRow();
// $cell = new odsTableCellString('得提列公務人員考試職缺與已提列考試職缺控管表（108年第4季）',$blue_border_style);
// $cell->setNumberRowsSpanned(12);
// $row->addCell( $cell );
// $table->addRow($row);

// $row = new odsTableRow();
// for($i=0;$i<12;$i++){
//     $row->addCell( new odsCoveredTableCell() );
// }
// $table->addRow($row);
?>