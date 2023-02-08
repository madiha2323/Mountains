<?php
include 'header.php';
include 'connect.php';


if(isset($_POST['addnewrecord']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $image = $_FILES['image'];
 
    // echo   $image ;

    // echo "<pre>";
    // print_r($image);
    // "</pre>";

    $file_name = $_FILES['image']['name'];
    $file_temp_name = $_FILES['image']['tmp_name'];

    // echo $file_name;
    // echo "<hr> $file_temp_name";

    move_uploaded_file($file_temp_name, "uploads/.$file_name");

    $query = "INSERT INTO users (username,email,password,number,image)
    values ('$name','$email','$password','$number','$file_name')";
    $res = mysqli_query($con,$query);

    if($res)
    {
        echo"<script> alert ('Record Added Successfully')
        window.location.href='index.php' </script>";
    }
    else
    {
        echo"<script> alert ('Please Enter Correct Data')
         </script>";
    }

}

?>

<div class="container-fluid py-5">
    <div class="row">
        <div class="col-11 mx-auto">
            <h5 class='text-center mx-auto text-info'>Add New User</h5>

            <div class="row">
            <div class="col-6 mx-auto shadow-lg p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class='form-control' placeholder="Enter Name"
                        name='name'>
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Email</label>
                        <input type="text" class='form-control' placeholder="Enter Email"
                        name='email'>
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Password</label>
                        <input type="text" class='form-control' placeholder="Enter Password"
                        name='password'>
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Number</label>
                        <input type="text" class='form-control' placeholder="Enter Number"
                        name='number'>
                    </div>

                    
                    <div class="form-group mt-3">
                        <label for="">Select Image</label>
                        <input type="file" class='form-control' 
                        name='image'>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" name='addnewrecord' class='btn btn-info'>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
</div>
 <?php
include 'footer.php';
 ?> 