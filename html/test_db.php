<?php
  $switchValue = $_POST['switchValue'];
  $value = $_POST['hiddenValue'];

  if ($switchValue === "true" ) {
    // The switch value is true
    $response = array("status" => "success", "msg" => "บันทึกสำเร็จ");
  } else{
    // The switch value is false
    $response = array("status" => "error", "msg" => "ยกเลิกสำเร็จ");
  }
  
  // Do something with the switch value
  
  // Return a response (e.g., success message or updated data)
  $jsonResponse = json_encode($response);
  echo $jsonResponse;
  
?>