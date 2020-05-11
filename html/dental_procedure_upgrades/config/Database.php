<?php
class Database{
	
	private $host  = '127.0.0.1';
    private $user  = 'root';
    private $password   = "Admin@winga123";
    private $database  = "dental"; 
    
    public function getConnectionx(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $connx;
		}
	}

	public function getConnectionB(){
		$conn = mysqli_connect("127.0.0.1", "root", "Admin@winga123", "dental");
		//$conn = new PDO("mysql:host=localhost;dbname=dental", $username, $password);		
		//$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
	}
	
	
}
?>
