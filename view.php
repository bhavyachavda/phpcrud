<?php
include 'connect.php';
$id = $_GET['viewid'];
$sql = "select * from crud where id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$lastName = $row['lastName'];
$email = $row['email'];
$gender = $row['gender'];
$hobbies = $row['hobbies'];
$mobile = $row['mobile'];
if (isset($_POST['back'])) {
    header('location:display.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">

    <title>Crud Operation</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>First Name</label>
                <?php echo $name; ?>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <?php echo $lastName; ?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <?php echo $email; ?>
            </div>
            <div class="form-group">
                <labe>Gender:</labe>
                <?php echo $gender; ?>
                <!-- <input  type="radio" id="male" value="M" name="gender" <?php if (isset($gender) && $gender == "M")
                    echo "checked"; ?>>
                <label  for="male">Male</label>
                <input  type="radio" id="female" value="F" name="gender" <?php if (isset($gender) && $gender == "F")
                    echo "checked"; ?>>
                <label  for="female">Female</label> -->
            </div>
            <div class="form-group">
                <labe>Hobbies:</labe>
                <?php echo $hobbies; ?>
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <?php echo $mobile; ?>
            </div>
            <button type="submit" class="btn btn-primary" name="back">Back</button>
        </form>
    </div>
</body>

</html>