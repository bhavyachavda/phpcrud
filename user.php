<?php
include 'connect.php';
    
    if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobbies'];
    $mobile = $_POST['mobile'];
    $target_dir = "/xampp/htdocs/crudoperation/images/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "jfif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       
      } else {
    
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        //   echo "File is valid, and was successfully uploaded.\n";
        } 
        else {
          echo "Possible file upload attack!\n";
        }
      }
        // $new = implode(" ",$hobbies);
    $target_file1 = "/crudoperation/images/" . basename($_FILES["file"]["name"]);
    $sql = "insert into crud (name,lastName,email,gender,hobbies,mobile,photo)
    values('$name','$lastName','$email','$gender','$hobbies','$mobile','$target_file1')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Data inserted successfully";
        header('location:display.php');
    } else {
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
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Enter your last name" name="lastName"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off">
            </div>
            <div>
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
            <div>
                <label htmlFor="photo">Select Image :</label>
                <input type="file" name="file" accept='image/*' />
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="phone" class="form-control" placeholder="Enter your mobile number" name="mobile"
                    autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="save">Submit</button>
        </form>
    </div>
</body>

</html>