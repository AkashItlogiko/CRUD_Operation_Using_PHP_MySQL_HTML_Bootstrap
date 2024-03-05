<?php
// ay jayga thaki mysqli sate connected kora hoyasa.

$connect = mysqli_connect('localhost','root','','phptestDB'
);

if(isset($_GET['deleteid'])){

$deleteid = $_GET['deleteid'];

$sql ="DELETE FROM student WHERE id = $deleteid" ;

if(mysqli_query($connect,$sql)==TRUE){
header('loction:view.php');
}

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-1">

    </div>

        <div class="col-sm-10 pt-4 mt-4 border border-success py-2 ">
  
<h3 class="text-center p-2 m-2 bg-info text-white">User's Information</h3>

        <?php

 $sql= "SELECT * FROM student";

 $query = mysqli_query($connect,
 $sql);

  echo "<table class='table table-success'>

  <tr><th>Id</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>
  <th>Action</th>
  </tr>";

    while( $data = mysqli_fetch_assoc($query)){

     $id = $data['id'];

     $firstname = $data['firstname'];

     $lastname = $data['lastname']; 

     $email = $data['email'];

echo  "<tr>
<td>$id</td>
<td>$firstname.</td>
<td>$lastname</td>
<td>$email</td>

<td> <span class='btn btn-success'>
  
<a href='edit.php?id=$id' class='text-white text-decoration-none'>

Edit </a>

</span> 

 <span class='btn btn-primary'>

 <a href='view.php?deleteid=$id' class='text-white text-decoration-none'>

Delete

</span>
</td>
</tr>";

 }

?>


    </div>

        <div class="col-sm-1">

    </div>
     

  </div>

</div>

 


</body>
</html>