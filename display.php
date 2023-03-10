<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5">
            <a href="user.php" class="text-light">Add User</a>
        </button>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">s1</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Hobbies</th>
      <th scope="col">Mobile</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $sql = "select * from crud";
       $result = mysqli_query($con, $sql);
       if($result){
        // $row = mysqli_fetch_assoc($result);
        // echo $row['name'];
        while($row = mysqli_fetch_assoc($result)){
          $id = $row['id'];
          $name = $row['name'];
          $lastName = $row['lastName'];
          $email = $row['email'];
          $gender = $row['gender'];
          $hobbies = $row['hobbies'];
          $file = $row['photo'];
          $mobile = $row['mobile'];
          echo '<tr>
          <td><img src='.$file.' height="60px" width="60px" border-radius="60%"></td>
          <th scope="row">'.$id.'</th>
          <td>'.$name." ".$lastName.'</td>
          <td>'.$email.'</td>
          <td>'.$gender.'</td>
          <td>'.$hobbies.'</td>
          <td>'.$mobile.'</td>
         
          <td>
          <button class="btn btn-primary"><a href="view.php?viewid='.$id.'"
          class="text-light">View</a></button>
          <button class="btn btn-warning"><a href="update.php?updateid='.$id.'"
          class="text-light">Update</a></button>
          <button class="btn btn-danger"><a href="delete.php?id='.$id.'"
          class="text-light">Delete</a></button>
          </td>
        </tr>';
        }
       }
    ?>
   
  </tbody>
</table>
</body>
</html> 