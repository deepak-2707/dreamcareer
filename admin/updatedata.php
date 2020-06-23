<?php
    
include('../connection.php');

     $rollno = $_POST['rollno'];
     $name = $_POST['name'];
     $city = $_POST['city'];
     $mobile = $_POST['mobile'];
     $branch = $_POST['branch']; 
     $id = $_POST['sid']; 
     $filename = $_FILES['image']['name'];
     $tempname = $_FILES['image']['tmp_name'];
     $folder = "../dataimg/".$filename;

      move_uploaded_file($tempname, $folder);     
  
     $qry = "UPDATE `student` SET `rollno`='$rollno',`name`='$name',`city`='$city',`mobile`='$mobile',`branch`='$branch',`image`='$filename' WHERE `id`='$id'"; 
     $run = mysqli_query($conn, $qry);
   
       if($run == true)
         {
       
           ?>
           <script >
             alert('Data Updated Successfully');
         
                      window.open('updateform.php?sid= <?php echo $id; ?>', '_self');
           </script>
           <?php
         }    
    
   
?>