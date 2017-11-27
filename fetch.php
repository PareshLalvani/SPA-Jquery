<?php  
 include("db.php"); 
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM tbl_employee WHERE id = '".$_POST["employee_id"]."'";  
      $result = $connect->query($query);  
      $row = $result->fetch_object();  
      echo json_encode($row);  
 }  
 ?>  