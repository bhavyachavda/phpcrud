<?php 
include 'connect.php';
$id = $_GET['updateid'];
$sql = "select * from crud where id = $id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$lastName = $row['lastName'];
$email = $row['email'];
$gender = $row['gender'];
$hobbies = $row['hobbies'];
$mobile = $row['mobile'];

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobbies'];
    $mobile = $_POST['mobile'];

    $sql = "update crud set id='$id', name = '$name', lastName='$lastName', 
    email = '$email', gender='$gender',hobbies='$hobbies', mobile = '$mobile' where id = $id";
    $result = mysqli_query($con,$sql);
    if($result){
        // echo "Data updated successfully";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
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
                <input type="text" class="form-control" 
                placeholder="Enter your first name" 
                name="name" autocomplete="off"
                value=<?php echo $name;?>>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" 
                placeholder="Enter your last name" 
                name="lastName" autocomplete="off"
                value=<?php echo $lastName;?>>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" 
                placeholder="Enter your email" 
                name="email" autocomplete="off"
                value=<?php echo $email;?>>
            </div>
            <div >
                <label>Gender:</label>
                <input  type="radio" id="male" value="M" name="gender" <?php if(isset($gender) && $gender=="M") echo "checked";?>>
                <label  for="male">Male</label>
                <input  type="radio" id="female" value="F" name="gender" <?php if(isset($gender) && $gender=="F") echo "checked";?>>
                <label  for="female">Female</label>
            </div>
            <div>
                <label>Hobbies:</label>
                <input  type="checkbox" id="Reading" value="Reading" name="hobbies" <?php if(isset($hobbies) && $hobbies=="Reading") echo "checked";?>>
                <label  for="Reading">Reading</label>
                <input  type="checkbox" id="Travelling" value="Travelling" name="hobbies" <?php if(isset($hobbies) && $hobbies=="Travelling") echo "checked";?>>
                <label  for="Travelling">Travelling</label>
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="phone" class="form-control" placeholder="Enter your mobile number" 
                name="mobile" autocomplete="off"
                value=<?php echo $mobile;?>>
            </div>
            <button type="submit" class="btn btn-primary" name="save">Update</button>
        </form>
    </div>
</body>

</html>