<?php 

   function showdetails($branch,$rollno)
    {
  
      include('connection.php') ;
   
      $sql = "SELECT * FROM `student` WHERE `rollno` = '$rollno' AND `branch` = '$branch'";
      $run = mysqli_query($conn,$sql);

        if(mysqli_num_rows($run)>0)
         {
            $data = mysqli_fetch_assoc($run);
            ?>
         
                <table border="1" align="center">
                    <tr >
                        <th colspan="3">Student Details</th>
                    </tr>
                    <tr>
                        <td rowspan="5">
                            <img src="dataimg/<?php echo $data['image']; ?>" style="max-height:150px; max-width:120px;" />
                        </td>    
                        <th >Roll NO</th>
                        <td ><?php echo $data['rollno']; ?></td>
                    </tr>
                    <tr>
                        <th >Name</th>
                        <td ><?php echo $data['name']; ?></td>
                    </tr>
                    <tr>
                        <th >Branch</th>
                        <td ><?php echo $data['branch']; ?></td>
                    </tr>
                    <tr>
                        <th >City</th>
                        <td ><?php echo $data['city']; ?></td>
                    </tr>
                    <tr>
                        <th >Mobile No</th>
                        <td ><?php echo $data['mobile']; ?></td>
                    </tr>
                </table>              

            <?php
         }
         else
          {
             echo "<script >alert('No Student Found.');</script>";

          }

    }



?>