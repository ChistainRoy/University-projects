<?php
  $selectedDate = $_POST['selectedDate'];
  $currentDate = date('Y-m-d');
  $twentyDaysLater = date('Y-m-d', strtotime('+20 days'));
  if (strtotime($selectedDate) <= strtotime($currentDate)) {
    // The switch value is true
    $response = array("status" => "error", "msg" => "ไม่สามารจองวันที่ผ่านมาแล้วได้");
  } else if (strtotime($selectedDate) > strtotime($twentyDaysLater)){
    // The switch value is false
    $response = array("status" => "error", "msg" => "จองได้ไม่เกิน 20 วัน");
  }else{
    $response = array("status" => "success", "msg" => "บันทึกการจองสำเร็จ");
  }
  
  // Do something with the switch value
  
  // Return a response (e.g., success message or updated data)
  $jsonResponse = json_encode($response);
  echo $jsonResponse;
  
?>