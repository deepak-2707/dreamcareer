<html>
    <head >
        <title >Student Management System</title>
    </head>
    <body >
        <h3 style="text-align: right; margin-right: 20px;"><a href="login.php">Admin Login</a></h3>
        <h1 style="text-align: center;">Welcome to Student Management System</h1>
        
      <form method="post" action="index.php">
        
        <table style="width:40%; " border="1" align="center">
            <tr >
                <td colspan="2" style="text-align: center"">Student Information</td>
                
            </tr>
            <tr >
                <td style="text-align: left;">Branch</td>
                <td ><select name="branch" >
                    <option >CSE</option>
                    <option >Civil</option>
                    <option >MECH</option>
                    <option >EEE/EE</option>
                    </select></td>
            </tr>
            <tr >
                <td style="text-align: left;">Enter Rollno</td>
                <td ><input type="text" name="rollno" required="required"></td>
            </tr>
            <tr >
                <td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="Show Info"></td>
            </tr>
        </table>
      </form>
    </body>
</html>
    

<?php
    
  if(isset($_POST['submit']))
    {
      
       $branch = $_POST['branch'];
       $rollno = $_POST['rollno'];

       include('connection.php') ;
       include('admin/function.php') ;
 
        showdetails($branch,$rollno);     
    }


?>