<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .swal2-styled.swal2-confirm {
      background-color: #f1c40f; /* Yellow background color */
      color: #fff; /* Text color */
    }
    .swal2-styled.swal2-deny {
      background-color: #e74c3c; /* Red background color */
      color: #fff; /* Text color */
    }
    .swal2-styled.swal2-cancel {
      background-color: #3498db; /* Blue background color */
      color: #fff; /* Text color */
    }
  </style>
</head>
<body>
<?php
    echo "<input type='button' onclick='callAlert()' value='PHP alert สวยๆ'>";
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function callAlert() {
        Swal.fire({
            title: 'ยินดีต้อนรับ',
            text: 'เข้าสู่เว็บไซต์ Devdit',
            icon: 'success',
            confirmButtonText: 'ยอดเยี่ยมเลย',
            denyButtonText: 'ไม่ใช่',
            cancelButtonText: 'ยกเลิก',
            showDenyButton: true,
            showCancelButton: true,
            showCloseButton: true,
            buttonsStyling: false,
            customClass: {
              confirmButton: 'swal2-styled swal2-confirm',
              denyButton: 'swal2-styled swal2-deny',
              cancelButton: 'swal2-styled swal2-cancel'
            },
            input: 'text',
            inputLabel: 'Your input',
            inputPlaceholder: 'Enter something'
        }).then((result) => {
            if (result.isConfirmed) {
                const inputValue = result.value;
                Swal.fire(`You entered: ${inputValue}`);
            } else if (result.isDenied) {
                Swal.fire('You clicked "ไม่ใช่"');
            } else if (result.isDismissed) {
                Swal.fire('You clicked "ยกเลิก"');
            }
        });
    }
</script>
</body>
</html>
