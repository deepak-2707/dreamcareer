<?php 

     	session_start();

       if(isset($_SESSION['uid']))
						{
   
}
else
{
header('location:../..admin/login.php');
}
?>
<?php
    include('header.php');
    include('title.php');
    include('../connection.php');
    
    $sid = $_GET['sid'];
    
    $sql = "SELECT * FROM `student` WHERE `id` ='$sid'";
    $run = mysqli_query($conn, $sql);
    
  $data = mysqli_fetch_assoc($run);
   
    
?>
 <form method="post" action="updatedata.php" enctype="multipart/form-data">
    <table align="center" border="1" style="width: 50%; margin-top:40px; color:white;">
        <tr >
            <th >Roll No</th>
            <td align="center"><input type="text" name="rollno" value="<?php echo $data['rollno']; ?>" required="required"></td>
        </tr>
        <tr >
            <th >Full Name</th>
            <td align="center"><input type="text" name="name" value="<?php echo $data['name']; ?>" required="required"></td>
        </tr>
        <tr >
            <th >City</th>
            <td align="center"><input type="text" name="city" value="<?php echo $data['city']; ?>" required="required"></td>
        </tr>
        <tr >
            <th >Mobile No</th>
            <td align="center"><input type="number" name="mobile" value="<?php echo $data['mobile']; ?>" required="required"></td>
        </tr>   
        <tr >
            <th >Branch</th>
            <td align="center"><input type="text" name="branch" value="<?php echo $data['branch']; ?>" required="required"></td>
        </tr>
        <tr >
            <th >Image</th>
            <td align="center"><input type="file" name="image" required="required"></td>
        </tr>
        <tr >
            
            <td align="center" colspan="2">
                <input type="hidden" name="sid" value="<?php echo $data['id']; ?>"/>
                <input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form> 

</body>
</html>
