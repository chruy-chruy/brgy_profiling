
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$page = 'Indigency';
include "../../navbar.php";
include "../../db_conn.php";

 ?>
    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/republic.ico">
    <title><?php if ($page) {echo "Barangay ".$page;} ?></title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
    <!-- <script src="../../assets/js/table.js"></script> -->
    <script src="../../assets/js/jquery-3.7.0.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
</head>

<body>

        <div class="content">
            <?php include "../../includes/alert.php"; ?>
            <div class="header">
                <h1><?php if ($page) {echo "Barangay ".$page;} ?></h1>
            </div>
            <div class="search-box">
                <a href="#"><button class="generate" id="certBtn" type="button" onclick="generate()">Generate</button></a>
                <?php
                include_once "../../includes/modal_cert.php";
            ?>
            </div>
            <div class="table_wrap">
            <table id="example" class="data list">
                <thead>
                    <th style="width: 60px;">ID</th>
                    <th>Resident</th>
                    <th>Purpose</th>
                    <th>Date Issued</th>
                    <th style="width: 55px;">Action</th>
                </thead>
                <?php
        $squery =  mysqli_query($conn, "SELECT * from indigency ");
         while ($row = mysqli_fetch_array($squery)) {
            $resident_id = $row['resident_id'];
            $squery2 =  mysqli_query($conn, "SELECT * from resident Where id = $resident_id");
           $res = mysqli_fetch_array($squery2)
        ?>
                <tr class="table-row">
                    <td>24-<?php echo $row['id'] ?></td>
                    <td>
                        <div class="profile">
                        <img src="../../uploads/<?php echo $res['image'] ?>" alt="">
                        <span class="name"><?php echo $res['first_name'] . " " . $res['last_name'] ?></span>
                        </div>
                    </td>
                    <td><?php echo $row['purpose'] ?></td>
                    <td><?php echo $row['issued_date'] ?></td>
                    <td>
                        <a class="view" href="view.php?id=<?php echo $row['id'] ?>&resident_id=<?php echo $row['resident_id'] ?>">
                        View
                        </a>
                        <!-- <a href=""><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a> -->
                    </td>
                </tr>
                <?php }?>
            </table>
            </div>
    </div>
<script>new DataTable('#example', {
    order: [[0, 'desc']]
});
new DataTable('#example2',{
  info: false,
    ordering: false,
    paging: false
});</script>

</body>

</html>