<?php 
// work modal
class Work{
    public $conn;

    function __construct() {
        $servername = "127.0.0.1";
        $username = "dane";
        $password = "dane";
        $dbname = "nal";
        // Create connection
        $conn = new \mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $this->conn = $conn;
    }

    public function checkWorkExist($id){
        $sql = "SELECT id, WorkName, DATE_FORMAT(StartingDate,'%m/%d/%Y') AS StartingDate, DATE_FORMAT(EndingDate,'%m/%d/%Y') AS EndingDate, Status 
        FROM work WHERE id = '$id'";
        $result = $this->conn->query($sql);
        // $this->conn->close();
        return $result;
    }

    public function getWork(){
        $sql = "SELECT * FROM work";
        $result = $this->conn->query($sql);
        $this->conn->close();
        return $result;
    }

    public function createWork($workName,$startingDate,$endingDate,$status){
        $sql = "INSERT INTO work (WorkName, StartingDate, EndingDate, Status) VALUES (?,?,?,?)";
        $stmt= $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $workName, $startingDate, $endingDate, $status);
        $result = $stmt->execute();
        $this->conn->close();
         // check result
        if($result){
            return "Success";
        }
        return "Error";
    }

    public function editWork($id){
        // check work exist on DB
        $check = $this->checkWorkExist($id);
        if( $check->num_rows > 0 ){
            $work = $check->fetch_assoc();
            $this->conn->close();
            return $work;
        }
        return "Error";
    }

    public function updateWork($id,$workName,$startingDate,$endingDate,$status){
        $sql = "UPDATE work SET WorkName='$workName', StartingDate='$startingDate', EndingDate='$endingDate', Status='$status'
        WHERE id='$id'";
        $result = $this->conn->query($sql);
        $this->conn->close();
        // check result
        if($result){
            return "Success";
        }
        return "ID work dont exist database";
    }

    public function deleteWork($id){
        // check work exist on DB
        $check = $this->checkWorkExist($id);
        if( $check->num_rows > 0 ){
            $sql = "DELETE FROM work WHERE id='$id'";
            $this->conn->query($sql);
            $this->conn->close();
            return "Success";
        }
        return "Error";
    }

}
?>