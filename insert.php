 <?php  
 include("db.php");
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $name = $connect->real_escape_string($_POST["name"]);  
      $address = $connect->real_escape_string($_POST["address"]);  
      $gender = $connect->real_escape_string($_POST["gender"]);  
      $designation = $connect->real_escape_string($_POST["designation"]);  
      $age = $connect->real_escape_string($_POST["age"]);  
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE tbl_employee   
           SET name='$name',   
           address='$address',   
           gender='$gender',   
           designation = '$designation',   
           age = '$age'   
           WHERE id='".$_POST["employee_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO tbl_employee(name, address, gender, designation, age)  
           VALUES('$name', '$address', '$gender', '$designation', '$age');  
           ";  
           $message = 'Data Inserted';  
      }  
      if($connect->query($query))  
      {  
       // echo $output;exit;
           $output .= '<label class="text-success ">' . $message . '</label>';  
           $select_query = "SELECT * FROM tbl_employee ORDER BY id DESC";  
           $result = $connect->query($select_query);  
           $output .= '  
                <table class="table table-bordered" id="employee_datatable">  
                     <thead>
                     <tr>  
                          <th width="70%">Employee Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>
                     </thead>
                     <tbody>  
           ';  
           while($row = $result->fetch_object())  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row->name . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row->id .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row->id . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</tbody></table>';  
      }  
      echo $output;  
 }  
 ?>  