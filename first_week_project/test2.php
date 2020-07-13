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
$cell = new odsTableCellString('老師', $black_border_style);
$cell->setNumberColumnsSpanned(4);
$row->addCell( $cell );
$table->addRow($row);

$row = new odsTableRow();
$cell = new odsTableCellString('科目名稱', $black_border_style);
$cell->setNumberColumnsSpanned(4);
$row->addCell( $cell );
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




// Merge 4*4 cell
// $row = new odsTableRow();
// $cell = new odsTableCellString('合併 4*4 列行', $blue_border_style);
// $cell->setNumberColumnsSpanned(4);
// $cell->setNumberRowsSpanned(4);
// $row->addCell( $cell );
// $table->addRow($row);
// //spare the space
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
// $cell = new odsTableCellString('Second Columns Merge 4 cells');
// $cell->setNumberRowsSpanned(4);
// $row->addCell( new odsCoveredTableCell() );
// $row->addCell( $cell );
// $row->addCell( new odsCoveredTableCell() );
// $row->addCell( new odsCoveredTableCell() );
// $table->addRow($row);


$ods->downloadOdsFile("MergeCell.ods");

?>