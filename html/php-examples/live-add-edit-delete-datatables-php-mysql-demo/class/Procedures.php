<?php
class Procedures {	
   
	private $recordsTable = 'procedures';
	public $id;
    public $name;
    public $all_teeth;
    public $cost;
	public $type;
	public $listed;
	public $code;
	public $parent_category_id;
	private $conn;
	
	public function __construct($db){
		$this->conn = $db;
		//$this->parent_category_id = 0;
    }	    
	
	public function listRecords(){
		
		$sqlQuery = "SELECT * FROM ".$this->recordsTable." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR all_teeth LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR cost LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR type LIKE "%'.$_POST["search"]["value"].'%" ';	
			$sqlQuery .= ' OR listed LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR code LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR parent_category_id LIKE "%'.$_POST["search"]["value"].'%" ';	
			$sqlQuery .= ' AND id!=1 and  id!=2 and id!=8 and id!=59 )';
					
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
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->recordsTable);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();			

		while ($record = $result->fetch_assoc()) { 				
			$rows = array();
			$typeSel=$listType ='';
			$rows[] = $record['id'];
			$rows[] = ucfirst($record['name']);
			$rows[] = $record['all_teeth'];		
			$rows[] = $record['cost'];	
			//$rows[] = $record['type'];
			
			if($record['type']== 0){
				$typeSel ="sijui";
				$rows[] = $typeSel;
			}
			if($record['type']== 1){
				$typeSel ="Normal";
				$rows[] = $typeSel;
			}
			if($record['type']== 2){
				$typeSel ="Xray";
				$rows[] = $typeSel;
			}
			if($record['listed']== 0){
				$listType ="no";
				$rows[] = $listType;
			}
			if($record['listed']== 1){
				$listType ="yes";
				$rows[] = $listType;
			}

			
			//$rows[] = $type_selected;
			//$rows[] = $listed_selected;
						
			$rows[] = $record['code'];
			$rows[] = $record['parent_category_id'];					
			$rows[] = '<button type="button" name="update" id="'.$record["id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$rows[] = '<button type="button" name="delete" id="'.$record["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
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
			$sqlQuery = "
				SELECT * FROM ".$this->recordsTable." 
				WHERE id = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$record = $result->fetch_assoc();
			echo json_encode($record);
		}
	}

	
	public function updateRecord(){
		
		if($this->id) {			
			
			$stmt = $this->conn->prepare("
			UPDATE ".$this->recordsTable." 
			SET name = ?, all_teeth = ?, cost = ?, type = ?, listed = ?, code = ?, parent_category_id = ?
			WHERE id = ?");
	 
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->all_teeth = htmlspecialchars(strip_tags($this->all_teeth));
			$this->cost = htmlspecialchars(strip_tags($this->cost));
			$this->type = htmlspecialchars(strip_tags($this->type));
			$this->listed = htmlspecialchars(strip_tags($this->listed));
			$this->code = htmlspecialchars(strip_tags($this->code));
			$this->parent_category_id = htmlspecialchars(strip_tags($this->parent_category_id));
			
			
			$stmt->bind_param("sssssssi", $this->name, $this->all_teeth, $this->cost, $this->type, $this->listed, $this->code, $this->parent_category_id, $this->id);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}

	public function fill_type_option(){

  		$sqlQuery = "SELECT * FROM ".$this->recordsTable." ";

		  $stmt = $this->conn->prepare($sqlQuery);
		  $stmt->execute();
		  $result = $stmt->get_result();
		  $records = "";
		  
		  $output = '<option value=""> Select Type</option>';
		  $typeValueOne = $typeNameOne="";
		  $typeValueTwo = $typeNameTwo="";

		  foreach($result as $row){				
			$rows = array();

						
			if($row['type']==1){
				$typeValueOne =1;
				$typeNameOne="Normal";
			}
			elseif ($row['type']==2){
				$typeValueTwo =2;
				$typeNameTwo="Xray";

			}
			
			
		}	
		$output .= '<option value="'.$typeValueOne.'">'.$typeNameOne.'</option>';
		$output .= '<option value="'.$typeValueTwo.'">'.$typeNameTwo.'</option>';
		//$records = $output;
		echo $output;

	}

	public function fill_all_teeth_option(){

		$sqlQuery = "SELECT * FROM ".$this->recordsTable." ";

		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();
		$records = array();
		
		$output = '<option value=""> Select Type</option>';
		$typeValueOne = $typeNameOne="";
		$typeValueTwo = $typeNameTwo="";

		foreach($result as $row){				
		  $rows = array();

					  
		  if($row['all_teeth']=="yes"){
			  $typeValueOne ="yes";
			  $typeNameOne="Yes";
		  }
		  elseif ($row['all_teeth']=="no"){
			  $typeValueTwo ="no";
			  $typeNameTwo="No";

		  }
		  
		  
	  }	
	  $output .= '<option value="'.$typeValueOne.'">'.$typeNameOne.'</option>';
	  $output .= '<option value="'.$typeValueTwo.'">'.$typeNameTwo.'</option>';

	  echo $output;
	  //echo json_encode($output);

  }

	public function addRecord(){
		
		if($this->name) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->recordsTable."(`name`, `all_teeth`, `cost`, `type`, `listed`, `code`, `parent_category_id`)
			VALUES(?,?,?,?,?,?,?)");
		
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->all_teeth = htmlspecialchars(strip_tags($this->all_teeth));
			$this->cost = htmlspecialchars(strip_tags($this->cost));
			$this->type = htmlspecialchars(strip_tags($this->type));
			$this->listed = htmlspecialchars(strip_tags($this->listed));
			$this->code = htmlspecialchars(strip_tags($this->code));
			$this->parent_category_id = htmlspecialchars(strip_tags($this->parent_category_id));
			
			
			$stmt->bind_param("sissssi", $this->name, $this->all_teeth, $this->cost, $this->type, $this->listed, $this->code, $this->parent_category_id);
			
			if($stmt->execute()){
				return true;
			}		
		}
	}
	public function deleteRecord(){
		if($this->id) {			

			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->recordsTable." 
				WHERE id = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}
}
?>

















<?php
/** 
class Procedures {	
   
	private $recordsTable = 'procedures';
	public $id;
    public $name;
    public $all_teeth;
    public $cost;
	public $type;
	public $listed;
	public $code;
	public $parent_category_id;
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
	}
	
	public function listProcedures(){
		$sql="select * from procedures where id!=1 and  id!=2 and id!=8 and id!=59 order by name";

		$sqlQuery = "SELECT * FROM ".$this->recordsTable." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR all_teeth LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR cost LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR type LIKE "%'.$_POST["search"]["value"].'%") ';	
			$sqlQuery .= ' OR listed LIKE "%'.$_POST["search"]["value"].'%") ';	
			$sqlQuery .= ' OR code LIKE "%'.$_POST["search"]["value"].'%") ';
			$sqlQuery .= ' OR parent_category_id LIKE "%'.$_POST["search"]["value"].'%") ';	
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'AND id!=1 and  id!=2 and id!=8 and id!=59 ORDER BY id DESC ';
		}
		
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->recordsTable );
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
			$rows[] = $record['type'];
			$rows[] = $record['listed'];
			$rows[] = $record['code'];
			$rows[] = $record['parent_category_id'];					
			$rows[] = '<button type="button" name="update" id="'.$record["id"].'" class="btn btn-warning btn-xs update">Update</button>';
			$rows[] = '<button type="button" name="delete" id="'.$record["id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$records[] = $rows;

			$output = array(
				"draw"	=>	intval($_POST["draw"]),			
				"iTotalRecords"	=> 	$displayRecords,
				"iTotalDisplayRecords"	=>  $allRecords,
				"data"	=> 	$records
			);
			
			echo json_encode($output);
		}	

	}

	public function getProcedure(){
		if($this->id) {
			$sqlQuery = "
				SELECT * FROM ".$this->recordsTable." 
				WHERE id = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$record = $result->fetch_assoc();
			echo json_encode($record);
		}
	}
	
	

	// Update procedure 
	
	public function updateProcedure(){
		
		if($this->id) {			
			
			$stmt = $this->conn->prepare("
			UPDATE ".$this->recordsTable." 
			SET name= ?, all_teeth = ?, cost = ?, type = ?, listed = ?, code = ? , parent_category_id = ?
			WHERE id = ?");
	 
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->all_teeth = htmlspecialchars(strip_tags($this->all_teeth));
			$this->cost = htmlspecialchars(strip_tags($this->cost));
			$this->type = htmlspecialchars(strip_tags($this->type));
			$this->listed = htmlspecialchars(strip_tags($this->listed));
			$this->code = htmlspecialchars(strip_tags($this->code));
			$this->parent_category_id = htmlspecialchars(strip_tags($this->parent_category_id));
			
			
			$stmt->bind_param("sisssi", $this->name, $this->all_teeth, $this->cost, $this->type, $this->listed, $this->code, $this->parent_category_id, $this->id);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}

	public function addProcedure(){
		
		if($this->name) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->recordsTable."(`name`, `all_teeth`, `cost`, `type`, `listed`, `code`, `parent_category_id`)
			VALUES(?,?,?,?,?)");
		
			
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->all_teeth = htmlspecialchars(strip_tags($this->all_teeth));
			$this->cost = htmlspecialchars(strip_tags($this->cost));
			$this->type = htmlspecialchars(strip_tags($this->type));
			$this->listed = htmlspecialchars(strip_tags($this->listed));
			$this->code = htmlspecialchars(strip_tags($this->code));
			$this->parent_category_id = htmlspecialchars(strip_tags($this->parent_category_id));
			
			
			$stmt->bind_param("sisssi", $this->name, $this->all_teeth, $this->cost, $this->type, $this->listed, $this->code, $this->parent_category_id);
			if($stmt->execute()){
				return true;
			}		
		}
	}

	public function deleteProcedure(){
		if($this->id) {			

			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->recordsTable." 
				WHERE id = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}
}
*/
?>