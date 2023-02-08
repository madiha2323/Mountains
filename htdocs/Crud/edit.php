<?php
include 'header.php';
include 'connect.php';

    $update_id = $_GET['UserId'];

    $per_data_res = mysqli_query($con, "SELECT * from users where id='$update_id'");

    $user_prev_data = mysqli_fetch_assoc($per_data_res);

    if(isset($_POST['update_record']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $number = $_POST['number'];

        $update_query = "UPDATE users set username ='$name' , email='$email' , password='$password' , number='$number' where id='$update_id' ";
        
        $update_query_result = mysqli_query($con,$update_query);

        if( $update_query_result)
        {
            echo "<script> alert('Record Updated')
            window.href.location='index.php' </script>";
        }
        else 
        {
            echo "<script> alert('Record not Updated')
             </script>";
        }
    }


?>
<div class="container-fluid py-5">
    <div class="row">
        <div class="col-11 mx-auto">
            <h5 class='text-center mx-auto text-info'>Edit User</h5>

            <div class="row">
            <div class="col-6 mx-auto shadow-lg p-3">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" value='<?php echo $user_prev_data['username']?>' class='form-control' placeholder="Enter Name"
                        name='name'>
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Email</label>
                        <input type="text" value='<?php echo $user_prev_data['email']?>'  class='form-control' placeholder="Enter Email"
                        name='email'>
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Password</label>
                        <input type="text"  value='<?php echo $user_prev_data['password']?>' class='form-control' placeholder="Enter Password"
                        name='password'>
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Number</label>
                        <input type="text"  value='<?php echo $user_prev_data['number']?>' class='form-control' placeholder="Enter Number"
                        name='number'>
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" value='UPDATE' name='update_record' class='btn btn-dark'>
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