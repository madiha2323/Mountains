<?php
    include 'header.php';
    include 'connect.php';

if(isset($_GET['delId']))
{
    // echo "Delete";

    $del_id = $_GET['delId'];
    $Del_query = "DELETE from users where id='$del_id'";
    $del_res = mysqli_query($con,$Del_query);
    if($del_res)
    {
        
        echo"<script> alert ('Record has been deleted')
        window.location.href='index.php' </script>";
    }
    else
    {
        echo "<script> alert('Record can't be deleted') </script>";
    }
}
    ?>

   <div class="container_fluid py-5">
       <div class="row mx-auto">
           <div class="col-11 mx-auto">
         
           <h4 class="text-center my-5">All Users</h4>
                <?php
                $query = "SELECT * From users ";
                $res = mysqli_query($con,$query);
               

                 // echo mysqli_num_rows($res);

                if(mysqli_num_rows($res) > 0)
                {
                    // echo "<h5>User Found</h5>";

                    echo "<table class='table table-bordered'>
                    <tr>
                    <th> Sno </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Password </th>
                    <th> Number </th>
                    <th> Image </th>

                    <th> Action </th>

                    </tr>";
                    
                    $counter =1;

                    while($row = mysqli_fetch_assoc($res))
                    {
                        echo "<tr>
                        
                                <td> $counter </td>
                                <td> $row[username]</td>
                                <td> $row[email]</td>
                                <td> $row[password]</td>
                                <td> $row[number]</td>
                                <td> <img src='uploads/$row[image]' alt='$row[username]' width='100px'> </td>
                                

                                <td>
                                <a href='./addnew.php' class='btn btn-dark'> Add New Record</a>

                                <a href='./updateprofile.php?UserId=$row[id]' class='btn btn-success'> Update Profile </a>

                                <a href='./edit.php?UserId=$row[id]' class='btn btn-info'> Edit </a>

                                 <a href='index.php?delId=$row[id]' class='btn btn-danger'> Delete</a>
                                </td>



                                
                        </tr>";
                        $counter++;
                    }
                    echo "</table>";
                }
                else
                {
                    echo "<h5 class='text-danger'>User Not Found</h5>"; 
                }
            ?>
       </div>
       </div>
   </div>
    <?php
    include 'footer.php';
    
    ?>