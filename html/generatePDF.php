<?php
require_once('./fpdf186/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

// ใช้ฟอนต์ที่คุณดาวน์โหลดมา
$pdf->AddFont('THSarabunNew_b', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew_b', '', 24);
$paperWidth = $pdf->GetPageWidth();
$columns = 2; // Number of columns
$columnWidth = ($paperWidth - 40) / $columns;
$column = 5; // Number of columns
$columnWidths = ($paperWidth - 40) / $column;
// ส่วนหัว
$text = 'ใบเสร็จรับเงิน #1';
$text_tis620 = iconv('UTF-8', 'TIS-620', $text);
$head_name = iconv('UTF-8', 'TIS-620', 'ชื่อลูกค้า :');
$detail = iconv('UTF-8', 'TIS-620', 'รายละเอียดลูกค้า');
$name = iconv('UTF-8', 'TIS-620', 'นาย ทรงพล ชุมทอง');
$head_address = iconv('UTF-8', 'TIS-620', 'ที่อยู่จัดส่ง :');
$head_addressshop = iconv('UTF-8', 'TIS-620', 'ที่อยู่ร้าน :');
$addressshop = iconv('UTF-8', 'TIS-620', '44/19 อำเภอ เมืองตรัง ตำบล บ้านควน จังหวัด ตรัง');
$head_call = iconv('UTF-8', 'TIS-620', 'ติดต่อ :');
$call = iconv('UTF-8', 'TIS-620', '065-804-9714');
$shop = iconv('UTF-8', 'TIS-620', 'ร้านบัดดี้อลูมิเนียม-กระจก');
$address = iconv('UTF-8', 'TIS-620', '44/19');
$order = iconv('UTF-8', 'TIS-620', 'ประตูบานเลื่อน');
$quy = iconv('UTF-8', 'TIS-620', '2');
$price = iconv('UTF-8', 'TIS-620', '200');
$total = iconv('UTF-8', 'TIS-620', '400');

$table_order = iconv('UTF-8', 'TIS-620', 'รายการสินค้า');
$table_quy = iconv('UTF-8', 'TIS-620', 'จำนวน');
$table_price = iconv('UTF-8', 'TIS-620', 'ราคาต่อหน่วย');
$table_total = iconv('UTF-8', 'TIS-620', 'ราคารวม');


$pdf->Cell(71, 10, '', 0, 0, 'L');
$pdf->Cell(59, 5, $text_tis620, 0, 0, 'L');
$pdf->Cell(59, 10, '', 0, 01, 'L');


// Customer Information
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew', '', 14);
$imageWidth = 20;
$imageX = $pdf->GetX(); // Current X position
$imageY = 20;
$pdf->Image('upload/b.png', $imageX, $imageY, $imageWidth);
$pdf->Ln();
$pdf->Cell(20, $imageY + 10, $shop, 0);
$pdf->SetX(120);
$pdf->Cell(20,  $imageY + 10, $head_name, 0);
$pdf->AddFont('THSarabunNew_b', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew_b', '', 16);
$pdf->Cell(0, 10, $detail, 0, 1);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew', '', 14);
$pdf->SetX(120);
$pdf->Cell(20, $imageY + 10, $head_address, 0);
$pdf->SetX(120);
$pdf->Cell(20, $imageY + 30, $head_address, 0);
$pdf->SetX(140);
$pdf->MultiCell(0, 10, $name, 0);
$pdf->SetX(140);
$pdf->Cell(0, 10, $detail, 0);
$pdf->SetX(140);
$pdf->Cell(0, 30, $detail, 0);
$pdf->SetX(10);
$pdf->Cell(20, $imageY - 10, $head_addressshop, 0);
$pdf->Cell(20, 10, $addressshop, 0);
$pdf->Ln();
$pdf->Cell(20, $imageY - 10, $head_call, 0);
$pdf->Cell(20, 10, $call, 0);
$pdf->SetX(120);
$pdf->Cell(0, 30, $head_addressshop, 0);
$pdf->SetX(140);
$pdf->Cell(20,  30, $addressshop, 0);
$pdf->Ln();


// Table Header
$pdf->Cell($columnWidth, 10, $table_order, 1, 0, 'C');
$pdf->Cell($columnWidths, 10, $table_quy, 1, 0, 'C');
$pdf->Cell($columnWidths, 10, $table_price, 1, 0, 'C');
$pdf->Cell($columnWidths, 10, $table_total, 1, 1, 'C');


$pdf->Cell($columnWidth, 10, $order, 0, 0, '');
$pdf->Cell($columnWidths, 10, $quy, 0, 0, 'C');
$pdf->Cell($columnWidths, 10, $price, 0, 0, 'C');
$pdf->Cell($columnWidths, 10, $total, 0, 1, 'C');
// $pdf->Line(10, 90, 200, 90);


$pdf->Cell($columnWidth, 10, $order, 0, 0, '');
$pdf->Cell($columnWidths, 10, $quy, 0, 0, 'C');
$pdf->Cell($columnWidths, 10, $price, 0, 0, 'C');
$pdf->Cell($columnWidths, 10, $total, 0, 1, 'C');
// $pdf->Line(10, 100, 200, 100);
$pdf->Ln();


$pdf->Output();
