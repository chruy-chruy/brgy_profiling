<?php 
          if(isset($_GET['message'])){
            $message = $_GET['message'];
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/republic.ico">
    <title>Residents</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
    <script src="../../assets/js/main.js"></script>
    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>
    <script src="../../assets/js/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
</head>

<body>
    <?php 
$page = 'Resident';
include "../../navbar.php";
include "../../db_conn.php";
$id = $_GET['id'];
$squery =  mysqli_query($conn, "SELECT * from resident Where id = '$id'");
while ($row = mysqli_fetch_array($squery)) {
 ?>
        <div class="content">
            <div class="header">
                <h1>Edit <?php if ($page) {echo $page;} ?></h1>
            </div>
        <a href="./" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
        <form class="row g-3" action="update.php?id=<?php echo $row['id']?>" method="post">
            <div class="image" id="image">
                <img src="../../uploads/<?php echo $row['image'] ?>" alt="">
                <input type="text" hidden name="imageValue" value="<?php echo $row['image'] ?>">
            </div>
            <div class="input-image">
                <?php
                include "../../includes/modal_cam.php";
                ?>

            </div>
            <h3>Personal Information</h3>
            <div class="grid-container grid-container--fill">

                <div class="grid-item">
                    <label class="form-label">First Name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="name" name="middle_name" 
                    value = "<?php echo $row['middle_name']; ?>">
                </div>

                <div class="grid-item">
                    <label class="form-label">Last Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="last_name" 
                    value = "<?php echo $row['last_name']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Suffix</label>
                    <input type="text" class="form-control" id="name" name="suffix" 
                    value = "<?php echo $row['suffix']; ?>"  >
                </div>

                <div class="grid-item">
                    <label class="form-label">Gender<span class="required">*</span></label>
                    <select id="gender" name="gender" required>
                    <option value="<?php echo $row['gender']; ?>" select hidden ><?php echo $row['gender']; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Date of Birth<span class="required">*</span></label>
                    <input type="date" class="form-control" id="name" name="date_of_birth" max="<?= date('Y-m-d'); ?>" 
                    value = "<?php echo $row['date_of_birth']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Civil Status<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="civil_status" 
                    value = "<?php echo $row['civil_status']; ?>" required>
                </div>
                </div>
                <h3>Address</h3>
                <div class="grid-container grid-container--fill">

                <div class="grid-item">
                    <label class="form-label">Purok<span class="required">*</span></label>
                    <select id="purok" name="purok" required>
                    <option value="<?php echo $row['purok']; ?>" select hidden ><?php echo $row['purok']; ?></option>
                        <option value="Sitio Balite">Sitio Balite</option>
                        <option value="Sitio Spring">Sitio Spring</option>
                        <option value="Sitio Crossing">Sitio Crossing</option>
                        <option value="Purok Ni-an">Purok Ni-an</option>
                        <option value="Purok Bag-o">Purok Bag-o</option>
                        <option value="Purok Constantino">Purok Constantino</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Place of Birth<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="place_of_birth" 
                    value = "<?php echo $row['place_of_birth']; ?>" required>
                </div>
                </div>
                <h3>Contact Information</h3>
                <div class="grid-container grid-container--fill">

                <div class="grid-item">
                    <label class="form-label">Phone Number<span class="required">*</span></label>
                    <input type="number" maxlength="10" class="form-control" id="name" name="phone_number" placeholder="09123456789"
                    value = "<?php echo $row['phone_number']; ?>" required>
                </div>

                <div class="grid-item">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="name" name="email_address" 
                    value = "<?php echo $row['email_address']; ?>" >
                </div>
                </div>
                <h3>Others</h3>
                <div class="grid-container grid-container--fill">
                
                <div class="grid-item">
                    <label class="form-label">Nationality<span class="required">*</span></label>
                    <select id="nationality" name="nationality" required>
                    <option value="<?php echo $row['nationality']; ?>" select hidden ><?php echo $row['nationality']; ?></option>
                        <option value="Filipino Citizenship">Filipino Citizenship</option>
                        <option value="Foreign Citizens">Foreign Citizenship</option>
                        <option value="Naturalization">Naturalization</option>
                        <option value="Dual Citizenship">Dual Citizenship</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Educational Attainment<span class="required">*</span></label>
                    <select id="educational_attainment" name="educational_attainment" required>
                        <option value="<?php echo $row['educational_attainment']; ?>" select hidden ><?php echo $row['educational_attainment']; ?></option>
                        <option value="No Grade Completed">No Grade Completed</option>
                        <option value="Pre-School/Early Childhood Education">Pre-School/Early Childhood Education</option>
                        <option value="Elementary Education">Elementary Education</option>
                        <option value="Junior High School Education">Junior High School Education</option>
                        <option value="Senior High School Education">Senior High School Education</option>
                        <option value="High School Graduate">High School Graduate</option>
                        <option value="Vocational or Technical Education">Vocational or Technical Education</option>
                        <option value="Associate Degree">Associate Degree</option>
                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                        <option value="Master Degree">Master's Degree</option>
                        <option value="Doctoral Degree/Ph.D.">Doctoral Degree/Ph.D.</option>
                    </select>
                </div>

                <div class="grid-item">
                    <label class="form-label">Occupation</label>
                    <input type="text" class="form-control" id="name" name="occupation" 
                    value = "<?php echo $row['occupation']; ?>" >
                </div>

                <div class="grid-item">
                    <label class="form-label">Religion</label>
                    <input type="text" class="form-control" id="name" name="religion" 
                    value = "<?php echo $row['religion']; ?>"  >
                </div>

            </div>
            <div class="footer">
            <button class="save" type="submit">Update</button>
            <button class="delete" id="delBtn" type="button" onclick="del()">Delete</button>
            <?php
                include_once "../../includes/modal_del.php";
            ?>
            </div>
        </form>
        </div>

        <?php } ?>
</body>

</html>