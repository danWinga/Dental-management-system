if(isset($_POST["query"]) )
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
