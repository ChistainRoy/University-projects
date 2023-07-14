<?php
include('connect.php');
$query = mysqli_query($conn, "SELECT * FROM `cumtomer`");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap and DataTables Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <table id="customerTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th><i class="fab fa-angular fa-lg text-danger me-3"></i>cm_id</th>
                <th>username</th>
                <th class="d-none">password</th>
                <th>name</th>
                <th>tel</th>
                <th>address</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fetch = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?php echo $fetch['cm_id'] ?></td>
                    <td><?php echo $fetch['username'] ?></td>
                    <td class="d-none"><?php echo $fetch['password'] ?></td>
                    <td><?php echo $fetch['name'] ?></td>
                    <td><?php echo $fetch['tel'] ?></td>
                    <td><?php echo $fetch['address'] ?></td>
                    <td>
                        <button type="button" class="btn rounded-pill btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal<?php echo $fetch['cm_id'] ?>">
                            <span class="tf-icons bx bxs-edit"></span>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#del<?php echo $fetch['cm_id'] ?>">
                            <span class="tf-icons bx bx-x"></span>
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable();
        });
    </script>
</body>

</html>