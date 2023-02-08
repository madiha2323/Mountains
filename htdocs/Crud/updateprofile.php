<?php
    include 'header.php';
    include 'connect.php';

    $update_id = $_GET['UserId'];

if(isset($_POST['update_profile_image']))
{
    $file_name = $_FILES['image']['name'];
    $file_temp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($file_temp_name,'uploads/'.$file_name);


    $update_img_query = "UPDATE users set image='$file_name' where id='$update_id'";
    $res = mysqli_query($con,$update_img_query);

    if($res)
{
    echo "<script> alert('Profile has updated')
    window.location.href='index.php'</script>";
}
else
{
    echo "<script> alert('ERROR!')
    </script>";
}

}

    ?>

   <div class="container_fluid py-5">
       <div class="row mx-auto"> 
           <div class="col-11 mx-auto">
               <div class="row">
                   <div class="col-6 mx-auto shadow p-5">
                       <h5 class="text-center">Update Profile</h1>
                       <form action="" method='post' enctype='multipart/form-data'>
                           <label for="">Image</label>
                           <input type="file" name='image' class='form-control'>

                           <input type="submit" value='update_profile' class="btn btn-info mt-2" name='update_profile_image'>
                       </form>
                   </div>
               </div>
         
           
    <?php
    include 'footer.php';
    
    ?>