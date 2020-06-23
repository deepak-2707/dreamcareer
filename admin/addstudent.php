<?php 

     	session_start();

       if(isset($_SESSION['uid']))
						{
   
}
else
{
header('location:../login.php');
}
?>
<?php
    include('header.php');
    include('title.php');
?>

<form method="post" action="" enctype="multipart/form-data">
    <table align="center" border="1" style="width: 50%; margin-top:40px; color:white;">
        <tr >
            <th >Roll No</th>
            <td align="center"><input type="text" name="rollno" placeholder="Enter Roll no" required="required"></td>
        </tr>
        <tr >
            <th >Full Name</th>
            <td align="center"><input type="text" name="name" placeholder="Enter Name" required="required"></td>
        </tr>
        <tr >
            <th >City</th>
            <td align="center"><input type="text" name="city" placeholder="Enter City" required="required"></td>
        </tr>
        <tr >
            <th >Mobile No</th>
            <td align="center"><input type="number" name="mobile" placeholder="Enter Mobile No" required="required"></td>
        </tr>   
        <tr >
            <th >Branch</th>
            <td align="center"><input type="text" name="branch" placeholder="Enter Branch" required="required"></td>
        </tr>
        <tr >
            <th >Image</th>
            <td align="center"><input type="file" name="image" required="required"></td>
        </tr>
        <tr >
            
            <td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>

</body>
</html>
<?php
     
  if(isset($_POST['submit']))
    {
      include('../connection.php');

     $rollno = $_POST['rollno'];
     $name = $_POST['name'];
     $city = $_POST['city'];
     $mobile = $_POST['mobile'];
     $branch = $_POST['branch'];  
     $filename = $_FILES['image']['name'];
     $tempname = $_FILES['image']['tmp_name'];
     $folder = "../dataimg/".$filename;

      move_uploaded_file($tempname, $folder);     
  
     $qry = "INSERT INTO `student`(`rollno`, `name`, `city`, `mobile`, `branch`, `image`) VALUES ('$rollno','$name','$city','$mobile','$branch','$filename')"; 
     $run = mysqli_query($conn, $qry);
   
       if($run == true)
         {
       
           ?>
           <script >
             alert('Data Inserted Successfully');    
           </script>
           <?php
         }
    }   
 ?>