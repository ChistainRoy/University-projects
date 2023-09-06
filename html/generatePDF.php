<?php
require_once('./fpdf186/fpdf.php');
include('connect.php');
if (isset($_GET['ids'])) {
    $id = $_GET['ids'];
}
$sql = "SELECT `order`.order_id,`order`.`oder_total`,`order`.`order_address`,oderdetail.oder_price,oderdetail.oder_qty,oder_total,product.product_name ,product.product_width,product.product_length,product.colorglass,product.colorframe
FROM `order` 
INNER JOIN oderdetail ON oderdetail.oder_id = `order`.`order_id` 
INNER JOIN product ON product.product_id = oderdetail.product_id 
WHERE `order`.order_id = 3;";
$currentDate = date("Y-m-d");
$thaiMonths = array(
    1 => 'มกราคม',
    2 => 'กุมภาพันธ์',
    3 => 'มีนาคม',
    4 => 'เมษายน',
    5 => 'พฤษภาคม',
    6 => 'มิถุนายน',
    7 => 'กรกฎาคม',
    8 => 'สิงหาคม',
    9 => 'กันยายน',
    10 => 'ตุลาคม',
    11 => 'พฤศจิกายน',
    12 => 'ธันวาคม'
);
$timestamp = strtotime($currentDate);
$buddhistYear = date("Y", $timestamp) + 543;
$monthNumber = date("n", $timestamp); // Get the month number (1-12)
$thaiMonth = $thaiMonths[$monthNumber]; // Get the Thai month name
$thaiFormattedDate = date("j $thaiMonth  ", $timestamp) . $buddhistYear;

$data = array();
$end = mysqli_query($conn, $sql);
$username = "darknight7577";
$sqli = "SELECT `cumtomer`.`name`,`cumtomer`.`tel`,`order`.`order_address`
    FROM `cumtomer`
    INNER JOIN `order` ON `cumtomer`.`cm_id` = `order`.`cm_id`
    WHERE `cumtomer`.`username` = 'darknight7577'
    AND `order`.`order_id` = $id;";
$uername_data = mysqli_query($conn, $sqli);
while ($row = mysqli_fetch_assoc($uername_data)) {
    // นำผลลัพธ์ที่ได้มาใช้งานตามต้องการ
    $order_address = $row['order_address'];
    $user_name = $row['name'];
    $tel = $row['tel'];
}
$pdf = new FPDF();
$pdf->AddPage();

// ใช้ฟอนต์ที่คุณดาวน์โหลดมา
$pdf->AddFont('THSarabunNew_b', '', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew_b', '', 24);
$paperWidth = $pdf->GetPageWidth();
$columns = 1.75; // Number of columns
$columnWidth = ($paperWidth - 40) / $columns;
$column = 5.5; // Number of columns
$columnWidths = ($paperWidth - 40) / $column;
// ส่วนหัว

$sql_shop = "SELECT * FROM `shop`";
$shop = mysqli_query($conn, $sql_shop);
while ($row = mysqli_fetch_assoc($shop)) {
    // นำผลลัพธ์ที่ได้มาใช้งานตามต้องการ
    $boss_name = $row['boss_name'];
    $shop_address = $row['address'];
    $shop_phone = $row['phone'];
}
$text = 'ใบเสร็จรับเงิน';
$text_tis620 = iconv('UTF-8', 'TIS-620', $text);
$head_name = iconv('UTF-8', 'TIS-620', 'ชื่อลูกค้า :');
$detail = iconv('UTF-8', 'TIS-620', 'รายละเอียดลูกค้า');
$name = iconv('UTF-8', 'TIS-620', 'นาย ทรงพล ชุมทอง');
$head_address = iconv('UTF-8', 'TIS-620', 'ที่อยู่จัดส่ง :');
$head_addressshop = iconv('UTF-8', 'TIS-620', 'ที่อยู่ร้าน :');
$addressshop = iconv('UTF-8', 'TIS-620', $shop_address);
$head_call = iconv('UTF-8', 'TIS-620', 'ติดต่อ :');
$formattedPhoneNumber = substr($shop_phone, 0, 3) . "-" . substr($shop_phone, 3, 3) . "-" . substr($shop_phone, 6);
$call = iconv('UTF-8', 'TIS-620', $formattedPhoneNumber);
$shop = iconv('UTF-8', 'TIS-620', 'ร้านบัดดี้อลูมิเนียม-กระจก');
$order = iconv('UTF-8', 'TIS-620', 'ประตูบานเลื่อน');
$quy = iconv('UTF-8', 'TIS-620', '2');
$price = iconv('UTF-8', 'TIS-620', '200');
$total = iconv('UTF-8', 'TIS-620', '400');
$head_phone = iconv('UTF-8', 'TIS-620', 'เบอร์ติดต่อ :');
$phone = iconv('UTF-8', 'TIS-620', '095-443-1596');
$head_bill = iconv('UTF-8', 'TIS-620', 'วันออกบิล :');
$bill = iconv('UTF-8', 'TIS-620', $thaiFormattedDate);

$table_order = iconv('UTF-8', 'TIS-620', 'รายการสินค้า');
$table_quy = iconv('UTF-8', 'TIS-620', 'จำนวน');
$table_price = iconv('UTF-8', 'TIS-620', 'ราคาต่อหน่วย');
$table_total = iconv('UTF-8', 'TIS-620', 'ราคารวม');
$head_result = iconv('UTF-8', 'TIS-620', 'ทั้งหมด');
$head_Deposit = iconv('UTF-8', 'TIS-620', 'ค่ามัดจำ');
$Deposit = iconv('UTF-8', 'TIS-620', '-20%');
$head_netprice = iconv('UTF-8', 'TIS-620', 'รวมราคาสุทธิ');
$now = iconv('UTF-8', 'TIS-620', 'ผู้รับเงิน');

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
$pdf->SetX(100);
$pdf->Cell(20,  $imageY + 10, $head_name, 0);
$pdf->AddFont('THSarabunNew_b', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew_b', '', 18);
$pdf->Cell(0, 10, $detail, 0, 1);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew', '', 14);
$pdf->SetX(100);
$pdf->Cell(20, $imageY + 10, $head_address, 0);
$pdf->SetX(100);
$pdf->Cell(20, $imageY + 30, $head_phone, 0);
$pdf->SetX(120);
$pdf->MultiCell(0, 10, iconv('UTF-8', 'TIS-620', $user_name), 0);
$pdf->SetX(120);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', $order_address), 0);
$pdf->SetX(120);
$formattedPhoneNumber = substr($tel, 0, 3) . "-" . substr($tel, 3, 3) . "-" . substr($tel, 6);
$pdf->Cell(0, 30, iconv('UTF-8', 'TIS-620', $formattedPhoneNumber), 0);
$pdf->SetX(10);
$pdf->Cell(20, $imageY - 10, $head_addressshop, 0);
$pdf->Cell(20, 10, $addressshop, 0);
$pdf->Ln();
$pdf->Cell(20, $imageY - 10, $head_call, 0);
$pdf->Cell(20, 10, $call, 0);
$pdf->SetX(100);
$pdf->Cell(0, 30, $head_bill, 0);
$pdf->SetX(120);
$pdf->Cell(20,  30, $bill, 0);
$pdf->Ln();


// Table Header
$pdf->Cell($columnWidth, 10, $table_order, 1, 0, 'C');
$pdf->Cell($columnWidths, 10, $table_quy, 1, 0, 'C');
$pdf->Cell($columnWidths, 10, $table_price, 1, 0, 'C');
$pdf->Cell($columnWidths, 10, $table_total, 1, 1, 'C');

if ($end) {
    $Gen_Y = 100;
    $Gen_Y2 = 105;
    while ($row = mysqli_fetch_assoc($end)) {
        // นำผลลัพธ์ที่ได้มาใช้งานตามต้องการ
        $order_id = $row['order_id'];
        $oder_total = $row['oder_total'];
        $order_address = $row['order_address'];
        $oder_price = $row['oder_price'];
        $product_name = $row['product_name'];
        $product_width = $row['product_width'];
        $product_length = $row['product_length'];
        $oder_qty = $row['oder_qty'];
        if ($row['colorglass'] === "1") {
            $color = "(เขียว)";
        } else if ($row['colorglass'] === "2") {
            $color = "(ดำ)";
        } else if ($row['colorglass'] === "3") {
            $color = "(กันยูวี)";
        }
        if ($row['colorframe'] === "1") {
            $frame = "(ชา)";
        } elseif ($row['colorframe'] === "2") {
            $frame = "(นม)";
        } elseif ($row['colorframe'] === "3") {
            $frame = "(ดำ)";
        } else if ($row['colorframe'] === "4") {
            $frame = "(ไม้)";
        }
        $pdf->Cell($columnWidth, 10, iconv('UTF-8', 'TIS-620', $product_name . ' ' . $product_width . ' X ' . $product_length . ' กระจก ' . $color . ' กรอบ ' . $frame), 0, 0, '');
        $pdf->Cell($columnWidths, 10, iconv('UTF-8', 'TIS-620', $oder_qty), 0, 0, 'C');
        $formattedNum = number_format($oder_price, 2);
        $pdf->Cell($columnWidths, 10, iconv('UTF-8', 'TIS-620', $formattedNum), 0, 0, 'C');
        $total_order = $oder_price * $oder_qty;
        $formattedNum = number_format($total_order, 2);
        $pdf->Cell($columnWidths, 10, iconv('UTF-8', 'TIS-620', $formattedNum), 0, 1, 'C');
        $Gen_Y = $Gen_Y + 10;
        $Gen_Y2 = $Gen_Y2 + 10;
    }
    $oder = $oder_total * 20 / 100;
    // คืนค่าหน่วยความจำที่ใช้ในการปล่อยทรัพยากร
    mysqli_free_result($end);
} else {
    // แสดงข้อความเมื่อเกิดข้อผิดพลาดในการ query
    echo "Error: " . mysqli_error($conn);
}

// total bill
$pdf->Line(10, $Gen_Y, 200, $Gen_Y);
$pdf->Line(10, $Gen_Y2, 200, $Gen_Y2);
$pdf->Ln();
$pdf->SetX(130);
$pdf->Cell($columnWidths, 10, $head_result, 0, 1, 'C');
$pdf->SetX(174);
$formattedNum = number_format($oder_total, 2);
$pdf->Cell($columnWidths, -10, iconv('UTF-8', 'TIS-620', $formattedNum . ' บาท'), 0, 1, 'C');
$pdf->SetX(131);
$pdf->Cell($columnWidths, 30, $head_Deposit, 0, 1, 'C');
$pdf->SetX(180);
$pdf->Cell($columnWidths, -30, $Deposit, 0, 1, 'C');
$pdf->SetX(134);
$pdf->Cell($columnWidths, 50, $head_netprice, 0, 1, 'C');
$pdf->SetX(175);
$formattedNum = number_format($oder, 2);
$pdf->Cell($columnWidths, -50, iconv('UTF-8', 'TIS-620', $formattedNum . ' บาท'), 0, 1, 'C');

// เพิ่มคำสั่ง SetY เพื่อเลื่อนไปที่ตำแหน่งที่ต้องการวางช่องลายเซ็น
$pdf->SetY(250); // ปรับตำแหน่งตามความต้องการ
$pdf->SetX(140);
$imageWidth = 40;
$imageX = 160; // Current X position
$imageY = 250;
$pdf->Image('upload/send.png', $imageX, $imageY, $imageWidth);
$pdf->Line(150, 275, 200, 275);
$pdf->SetY(310);
$pdf->SetX(158);
$pdf->Cell($columnWidths, -50, $now, 0, 1, 'C');

$pdf->Output();
