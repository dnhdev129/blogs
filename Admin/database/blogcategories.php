<?php  
class blogcategories{
	private $table = "blogcategories";
	private $conn;

	//All properties
	public $id;
	public $title;
	public $status;
	public $created_at;
	public $updated_at;

	//Connect DB
	public function __construct($db){
		$this->conn = $db;
	}

	//Read all records
	public function readAll(){
		$sql = "SELECT * FROM $this->table";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	//Read record
	public function read(){
		$sql = "SELECT * FROM $this->table
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$row = $stmt->fetch();
			$this->title = $row['title'];
			$this->status = $row['status'];
			$this->created_at = $row['created_at'];
			$this->updated_at = $row['updated_at'];
		}
	}

	//Create new blog category
	public function create(){
	    $sql = "INSERT INTO $this->table
	            SET title = :get_title,
	                status = 1,
	                created_at = :get_created_date,
	                updated_at = :get_updated_date";

	    $stmt = $this->conn->prepare($sql);
	    $stmt->bindParam(":get_title", $this->title);
	    $stmt->bindParam(":get_created_date", $this->created_at);
	    $stmt->bindParam(":get_updated_date", $this->updated_at);
	    
	    if($stmt->execute()){
	        return true;
	    }
	    return false;
	}

	//Update blog category
	public function update(){
		$sql = "UPDATE $this->table
				SET title = :get_title,
					status = :get_status,
					updated_at = :get_updated_date
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->bindParam(":get_title",$this->title);
		$stmt->bindParam(":get_status",$this->status);
		$stmt->bindParam(":get_updated_date",$this->updated_at);
		
		if($stmt->execute()){
			return true;
		}
	}

	//Delete blog category
	public function delete(){
		$sql = "DELETE FROM $this->table
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		if($stmt->execute()){
			return true;
		}

	}
}

?>