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
<table align = "center">
<form method="post" action="">
    <tr >
        <th >Enter Branch</th>
        <td > <input type="text" name="branch" placeholder="Enter Branch" required="reqhired"></td>
    
        <th >Enter Name</th>
        <td><input type="text" name="name" placeholder="Enter Name" required="reqhired"></td>
        
        <td colspan="2"><input type="submit" name="submit" value="Search"></td>
    </tr>
</form>
</table>
<table align="center" width="80%" border="1" style="margin-top:10px;">
    <tr style="background-color:black; color:white;" >
        <th >No</th>
        <th >Image</th>
        <th >Name</th>
        <th >Rollno</th>
        <th >Edit</th>
    </tr>
    <?php

  if(isset($_POST['submit']))
   {
     include('../connection.php');

    $branch = $_POST['branch'];
    $name = $_POST['name'];
  
    $sql = "SELECT * FROM `student` WHERE `branch` = '$branch' AND `name` LIKE '%$name%' ";
    $run = mysqli_query($conn, $sql);

/*$ravi = $run->num_rows;
   echo $ravi;  */ 

    if($run->num_rows > 0 )

    {
//$data = mysqli_fetch_assoc($run);

       $count=0;
       
      while($data = mysqli_fetch_assoc($run))

     { 
        $count++;
       ?>
    
     <tr align ="center">
        <td ><?php echo $count; ?></td>
        <td ><img src="../dataimg/<?php echo $data['image']; ?>" style ="max-width:100px;"/></td>
        <td ><?php echo $data['name']; ?></td>
        <td ><?php echo $data['rollno']; ?></td>
        <td ><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a></td>
    </tr>
         
       <?php

     }

      }
    else
    {
          echo "<tr ><td>No Records Found!!</td></tr>";

    }
   }

?>
</table>

</body>
</html>

