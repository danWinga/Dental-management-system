

<?php
//include_once('database_connection.php');
//fetch.php
//$connect = new PDO("mysql:host=localhost;dbname=dental", $username, $password);

$connect = mysqli_connect("localhost", "root", "Admin@winga123", "dental");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
      select b.treatment_procedure_id, a.name,		
      case b.status when '0' then 'Not Started' when '1' then 'Partially Done' when '2' then 'Done'	end as status, 
      b.date_procedure_added,concat(c.first_name,' ',c.middle_name,' ',c.last_name) as doctor_name, count(b.procedure_id) as prodone, count(b.status) as dsss
      from tplan_procedure  as b join procedures as a on b.procedure_id=a.id 
      left join users as c on c.id=b.created_by  
      WHERE  (a.id LIKE '%".$search."%'
      OR c.first_name LIKE '%".$search."%'
      OR c.middle_name LIKE '%".$search."%'
      OR c.last_name LIKE '%".$search."%'
      OR  a.name LIKE '%".$search."%'
      OR  b.status LIKE '%".$search."%')
      AND b.status !=0  GROUP BY c.id order by b.treatment_procedure_id
      ";
 
}
else
{
 $query = " select b.treatment_procedure_id, a.name,		
   case b.status when '0' then 'Not Started' when '1' then 'Partially Done' when '2' then 'Done'	end as status, 
   b.date_procedure_added,concat(c.first_name,' ',c.middle_name,' ',c.last_name) as doctor_name, count(b.procedure_id) as prodone, count(b.status) as dsss
   from tplan_procedure  as b join procedures as a on b.procedure_id=a.id 
   left join users as c on c.id=b.created_by 
   where a.id= a.id  AND b.status !=0
   GROUP BY c.id order by b.treatment_procedure_id  ";
 
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>index</th>
     <th> Name</th>
     <th>Doctor</th>
     <th>Status</th>
     <th>No of Procedure Per done </th>
     
    </tr>
 ';
 //$rows[] = $record['b.treatment_procedure_id'];
			//$rows[] = ucfirst($record['a.name']);
			//$rows[] = $record['doctor_name'];		
			//$rows[] = $record['b.status'];						
			//$rows[] = $record['NoProcedureDone'];	
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   <td>'.$row["treatment_procedure_id"].'</td>
   <td>'.$row["name"].'</td>
   <td>'.$row["doctor_name"].'</td>
   <td>'.$row["status"].'</td>
   <td>'.$row["prodone"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>


