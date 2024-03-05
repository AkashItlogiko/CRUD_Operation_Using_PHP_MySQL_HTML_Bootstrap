<?php

// ay jayga thaki mysqli sate connected kora hoyasa.

$connect = mysqli_connect('localhost','root','','phptestDB'
);

    
 
if($_GET['id']){

$getid = $_GET['id'];

$sql = "SELECT * FROM student where id=$getid";

$query = mysqli_query($connect,$sql);

   $data = mysqli_fetch_assoc($query);

   $id       = $data['id'];
   $firstname= $data['firstname'];
   $lastname = $data['lastname'];
   $email    = $data['email'];

}

if(isset($_POST['edit'])){
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

$sql1 = "UPDATE student
 SET firstname='$firstname ', lastname='$lastname ', email='$email' WHERE id ='$id' ";

if(mysqli_query($connect,$sql1) == TRUE){
    echo "Data Updated";
  header('location:view.php');

}else{

  echo $sql1."Data not Updata";

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
    <div class="col-sm-3">

    </div>

        <div class="col-sm-6 pt-4 mt-4 border border-success py-2 ">

          <h3>Registration FORM</h3>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
          
Firstname :<br>
<input type="text" name="firstname" value="<?php echo   $firstname 
?>"><br><br>

Lastname:<br>
<input type="text" name="lastname" value="<?php echo   $lastname
?>"><br><br>

Email:<br>
<input type="email" name="email" value="<?php echo   $email 
?>"><br><br>

<input type="text" name="id" value="<?php echo $id ?>" hidden >

<input type="submit" value="Edit" name="edit" class="btn btn-success">

</form>

    </div>

        <div class="col-sm-3">

    </div>
     

  </div>

</div>

 


</body>
</html>