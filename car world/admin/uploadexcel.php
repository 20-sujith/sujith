<?php
require("connection.php"); 
  $output = "";
         
        $output .= '<table class="table table-bordered" border="1">  
                    <tr>  
                          
                          <th scope="col">NAME</th>
                          <th scope="col">EMAIL</th>
                          <th scope="col">PASSWORD</th>
                          <th scope="col">COUNTRY</th>
                          <th scope="col">STATE</th>
                          
                    </tr>';
             
   $res =$con->query("SELECT*FROM `tb_regfrom` JOIN `states` ON tb_regfrom.state=states.stat_id JOIN `countries` ON states.country_id=countries.cont_id");
   $count=$res->num_rows;
   if($count>0)
   {
	   
	   while($row=$res->fetch_assoc())
	   {
 
    $output .= '<tr>  
                        
                         <td>'.$row['username'].'</td> 
                         <td>'.$row['email'].'</td>  
                         <td>'.$row['password'].'</td>   
                         <td>'.$row['name'].'</td>   
                         <td>'.$row['sname'].'</td>   
                            
                          
                    </tr>';  
        }
   }
        $output .= '</table>';
   
        
        $filename = "table_data_export_".date('Ymd') . ".xls";         
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");  
        echo $output;  
?>