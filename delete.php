<?php  
 include("db.php"); 
 if(isset($_POST["employee_id"]))  
 {  
       $query = "DELETE FROM tbl_employee WHERE id = '".$_POST["employee_id"]."'";  
      if($connect->query($query))
      {
      	echo "Successfully Deleted";
      }  
        
 }  
 ?>  