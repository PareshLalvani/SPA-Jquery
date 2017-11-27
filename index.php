<?php  
 include("db.php"); 
 $query = "SELECT * FROM tbl_employee ORDER BY id DESC";  
 $result = $connect->query($query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
     <script>  
 $(document).ready(function(){  
     var datatable= $('#employee_datatable').DataTable({
        "order": [[ 0, "desc" ]]
      });
    

      
 });  
 </script>
 
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
              
                <br />  
                <div class="table-responsive" id="employee_data">  
                     <div align="right">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Add</button>  
                     </div>  
                     <br />  
                     <div id="employee_table">  
                          <table class="table table-bordered" id="employee_datatable">  
                             <thead>
                               <tr>  
                                    <th style="display:none;">ID</th>
                                    <th width="70%">Employee Name</th>  
                                    <th width="15%">Edit</th>  
                                    <th width="15%">View</th>
                                    <th width="15%">Delete</th>  
                               </tr>
                               </thead>
                               <tbody>  
                               <?php  
                               while($row = $result->fetch_object())  
                               {  
                               ?>  
                               <tr>  
                                <td style="display:none"><?php echo $row->id; ?></td>
                                    <td><?php echo $row->name; ?></td>  
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row->id; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                    <td><input type="button" name="view" value="view" id="<?php echo $row->id; ?>" class="btn btn-info btn-xs view_data" /></td>
                                    <td><input type="button" name="delete" value="Delete" id="<?php echo $row->id; ?>" class="btn btn-danger btn-xs delete_data" /></td>  
                               </tr>  
                               <?php  
                               }  
                               ?>  
                             </tbody>
                          </table>  
                     </div>  
                </div>  
           </div>

      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Employee Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Enter Employee Name</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <label>Enter Employee Address</label>  
                          <textarea name="address" id="address" class="form-control"></textarea>  

                          <br />  
                          <label>Select Gender</label>  
                          <select name="gender" id="gender" class="form-control">  
                               <option value="Male">Male</option>  
                               <option value="Female">Female</option>  
                          </select>  
                          <br />  
                          <label>Enter Designation</label>  
                          <input type="text" name="designation" id="designation" class="form-control" />  
                          <br />  
                          <label>Enter Age</label>  
                          <input type="text" name="age" id="age" class="form-control" />  
                          <br />  
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>


 
 <script src="ajax.js">  </script>
