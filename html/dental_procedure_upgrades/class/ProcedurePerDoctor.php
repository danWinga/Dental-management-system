<?php
class ProceduresPerDoctor {	
   
	private $recordsTable = 'procedures';
	public $id;
    public $name;
    public $treatment_procedure_id;
    public $status;
	public $doctor_name;
	public $prodone;
	private $conn;
	
	public function __construct($db){
		$this->conn = $db;
		//$this->parent_category_id = 0;
    }	    
	
	public function listSummeryRecords(){

		$sqlQuery = "SELECT * FROM ".$this->recordsTable." ";

		$search = $_POST["query"];
		if(!empty($search)){
			$sqlQuery= "
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
			
			
					
			//id!=1 and  id!=2 and id!=8 and id!=59
	
		}
		
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();
		
		$query = " select b.treatment_procedure_id, a.name,		
				case b.status when '0' then 'Not Started' when '1' then 'Partially Done' when '2' then 'Done'	end as status, 
				b.date_procedure_added,concat(c.first_name,' ',c.middle_name,' ',c.last_name) as doctor_name, count(b.procedure_id) as prodone, count(b.status) as dsss
				from tplan_procedure  as b join procedures as a on b.procedure_id=a.id 
				left join users as c on c.id=b.created_by 
				where a.id= a.id  AND b.status !=0
				GROUP BY c.id order by b.treatment_procedure_id  ";
		//$sqlQuery = "SELECT * FROM ".$this->recordsTable." ";
		$stmtTotal = $this->conn->prepare($query);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();			

		while ($record = $result->fetch_assoc()) { 				
			$rows = array();
			
			
			$rows[] = $record['id'];
			$rows[] = ucfirst($record['name']);
			$rows[] = $record['all_teeth'];		
			$rows[] = $record['cost'];
			$rows[] = $record['code'];			
			$records[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$records
		);
		
		echo json_encode($output);
	}

	
	
	public function getRecord(){
		if($this->id) {
			$sqlQuery = "select b.treatment_procedure_id, a.name,		
			case b.status when '0' then 'Not Started' when '1' then 'Partially Done' when '2' then 'Done'	end as status, 
			 b.date_procedure_added,concat(c.first_name,' ',c.middle_name,' ',c.last_name) as doctor_name, count(b.procedure_id) as NoProcedureDone, count(b.status) as dsss
			from tplan_procedure  as b join procedures as a on b.procedure_id=a.id 
			left join users as c on c.id=b.created_by"; 
			$sqlQuery .=" WHERE a.id= ?  AND b.status !='0'  GROUP BY c.id order by b.treatment_procedure_id";			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$record = $result->fetch_assoc();
			echo json_encode($record);
		}
	}
	
	
}
?>










