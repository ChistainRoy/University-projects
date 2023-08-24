<?php
require_once('./fpdf186/fpdf.php');
include('connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$pdf = new FPDF();
$pdf->AddPage();

$pdf->AddFont('THSarabunNew_b', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew_b', '', 24);
$currentDate = date("Y-m-d");
$currentDate2 = date("d-m-Y");

$timestamp = strtotime($currentDate2);
$converted_date1 = date("d/m/Y", $timestamp);
$thai_year = date("Y", $timestamp) + 543;
$converted_date1 = str_replace(date("Y", $timestamp), $thai_year, $converted_date1);

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
$sqli = "SELECT `cumtomer`.`name`,`cumtomer`.`tel`,`cumtomer`.`address`,`order`.`order_date`,`order`.`oder_total`,`order`.`order_address`
    FROM `cumtomer`
    INNER JOIN `order` ON `cumtomer`.`cm_id` = `order`.`cm_id`
    WHERE `order`.`order_id` = $id;";
$uername_data = mysqli_query($conn, $sqli);
while ($row = mysqli_fetch_assoc($uername_data)) {
    // นำผลลัพธ์ที่ได้มาใช้งานตามต้องการ
    $order_date = $row['order_date'];
    $address = $row['address'];
    $order_address = $row['order_address'];
    $user_name = $row['name'];
    $tel = $row['tel'];
    $total = $row['oder_total'];
}
$timestamp = strtotime($order_date);
$converted_date = date("d/m/Y", $timestamp);
$thai_year = date("Y", $timestamp) + 543;
$converted_date = str_replace(date("Y", $timestamp), $thai_year, $converted_date);




$text = iconv('UTF-8', 'TIS-620', 'สัญญาซื้อขาย');
$textWidth = $pdf->GetStringWidth($text); // คำนวณความกว้างของข้อความ

$pdfWidth = $pdf->GetPageWidth(); // ความกว้างของหน้าเอกสาร
$textX = ($pdfWidth - $textWidth) / 2; // คำนวณตำแหน่ง X ที่ต้องการให้เป็นตรงกลาง

$pdf->SetX($textX); // กำหนดตำแหน่ง X
$pdf->Cell(0, 10, $text, 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(45);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew', '', 16);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'สัญญานี้ทำขึ้นที่' . ' ' . '44/19 อำเภอ เมืองตรัง จังหวัดตรัง ตำบล บ้านควน'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'วันที่ ' . $thaiFormattedDate . ' ' . 'โดย นายมงคล ซุ่นสั้น ซึ่งต่อไปในสัญญานี้ขะเรียกว่า "ผู้ขาย" ฝ่ายหนึ่ง'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'กับ ' . $user_name . ' อยู่บ้านเลขที่ ' . $address), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$formattedPhoneNumber = substr($tel, 0, 3) . "-" . substr($tel, 3, 3) . "-" . substr($tel, 6);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'โทรศัพท์ติดต่อหมายเลข ' . $formattedPhoneNumber . ' ซึ่งต่อไปในสัญญานี้จะเรียกว่า "ผู้ซื้อ" อีกฝ่ายหนึ่ง'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'คู่สัญญาทั้งสองฝ่ายตกลงทำสัญญานี้   ดังมีเงื่อนไขรายละเอียดต่อไปนี้'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(45);
$pdf->AddFont('THSarabunNew_bi', '', 'THSarabunNew_bi.php');
$pdf->SetFont('THSarabunNew_bi', '', 16);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ข้อ 1.'), 0);
$pdf->SetX(55);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew', '', 16);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'คู่สัญญาทั้งสองฝ่ายตกลงให้ถือเอาเอกสารที่แนบท้ายสัญญานี้เป็นส่วนหนึ่ง'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'แห่งสัญญานี้ด้วย คือ'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(55);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', '1.1 แบบฟอร์มใบเสนอราคาของผู้ขาย ลงวันที่ ' . $converted_date1 . ' จำนวน 1 ฉบับ'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(55);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', '1.2 แบบฟอร์มใบสั่งซื้อของผู้ซื้อ ลงวันที่ ' . $converted_date . ' จำนวน 1ฉบับ'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(45);
$formattedNum = number_format($total);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'รวมเป็นเงิน ' . $formattedNum . ' บาท โดยผู้ซื้อจะมารับสินค้าที่ซื้อขาย'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ดังกล่าวในข้อนี้ด้วยตนเอง หรือผู้ขายจะส่งของให้แก่ผู้ซื้อ ณ ' . $order_address), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ภายในกำหนด 20 วัน (สิบวัน) นับแต่วันทำสัญญานี้'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(45);
$pdf->AddFont('THSarabunNew_bi', '', 'THSarabunNew_bi.php');
$pdf->SetFont('THSarabunNew_bi', '', 16);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ข้อ 2.'), 0);
$pdf->SetX(55);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew', '', 16);
$sum = $total * 20 / 100;
$formattedNum = number_format($sum);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ในวันทำสัญญานี้ ผู้ซื้อได้ชำระค่ามัดจำเป็นเงิน ' . $formattedNum . ' บาท'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ให้แก่ผู้ขายไว้เป็น เงินสด/เป็นเช็คของธนาคาร กรุงไทย เช็คเลขที่......................................'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$resule = $total - $sum;
$formattedNum = number_format($resule);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'สำหรับราคาสินค้าส่วนที่เหลืออีกเป็นเงิน ' . $formattedNum . ' บาท นั้นผู้ซื้อตกลงชำระให้แก่ผู้ขาย'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'หลังดำเนินงานเสร็จสิ้น'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(45);
$pdf->AddFont('THSarabunNew_bi', '', 'THSarabunNew_bi.php');
$pdf->SetFont('THSarabunNew_bi', '', 16);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ข้อ 3.'), 0);
$pdf->SetX(55);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew', '', 16);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ในกรณีที่ผู้ซื้อผิดนัด ไม่ชำระราคาสินค้าให้แก่ผู้ขายภายในกำหนดตาม'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ข้อ 2. ผู้ซื้อตกลงให้ผู้ขายริบค่ามัดจำที่ผู้ซื้อชำระให้แก่ผู้ขายได้ทันที และผู้ซื้อยินยอมจ่ายเป็น'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$waring = $resule * 2;
$formattedNum = number_format($waring);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'เบี้ยปรับให้แก่ผู้ขายเป็นเงิน ' . $formattedNum . ' บาท พร้อมทั้งผู้ขายมีสิทธิบอกเลิกสัญญา'), 0);
$pdf->SetX(45);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(45);
$pdf->AddFont('THSarabunNew_bi', '', 'THSarabunNew_bi.php');
$pdf->SetFont('THSarabunNew_bi', '', 16);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ข้อ 4.'), 0);
$pdf->SetX(55);
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->SetFont('THSarabunNew', '', 16);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'หากคู่สัญญาฝ่ายหนึ่งฝ่ายใดผิดสัญญา ให้อีกฝ่ายหนึ่งมีสิทธิบอกเลิกสัญญา'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'และมีสิทธิเรียกร้องค่าเสียหายจากฝ่ายที่ผิดสัญญาได้ตามความเป็นจริง'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(45);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'สัญญานี้ทำขึ้นเป็นสองฉบับ มีข้อความถูกต้องตรงกัน คู่สัญญาต่างยึดถือไว้ฝ่าย'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ละฉบับ และทั้งสองฝ่ายได้ศึกษาเข้าใจข้อความในสัญญานี้ดีโดยตลอดแล้ว จึงได้ลงลายมือชื่อ'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(25);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'และประทับตราสำคัญไว้เป็นหลักฐานต่อหน้าพยาน'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(110);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ลงชื่อ........................................................................ผู้ขาย'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(117);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', '(........................................................................)'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(110);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ลงชื่อ........................................................................ผู้ซื้อ'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(117);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', '(........................................................................)'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(110);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ลงชื่อ........................................................................พยาน'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(117);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', '(........................................................................)'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(110);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'ลงชื่อ........................................................................พยาน'), 0);
$pdf->Ln(); // เพิ่มบรรทัดใหม่หลังจากเซลล์ข้อความ
$pdf->SetX(117);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', '(........................................................................)'), 0);
$pdf->Output();
