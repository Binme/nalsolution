<?php 
// work function
class WorkFunction{
    public $work;
    public $status = array("Planning","Doing","Complete");
    function __construct($work) {
        $this->work = $work;
    }

    public function tables(){
        $result = $this->work->getWork();
        return $result;
    }

    public function calendar(){
        $result = $this->work->getWork();
        return $result;
    }

    function validateDate($format, $date){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    public function create($workName,$startingDate,$endingDate,$status){
        $error = [];
        $workName = filter_var($workName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if ($this->validateDate('m/d/Y', $startingDate) == false) {
            $error['startingDate'] = "Starting Date is wrong format";
        }else{
            // Creating timestamp from given date
            $startingDate = date("Y-m-d", strtotime($startingDate));
        }
        if ($this->validateDate('m/d/Y', $endingDate) == false) {
            $error['endingDate'] = "Ending Date is wrong format";
        }else{
            // Creating timestamp from given date
            $endingDate = date("Y-m-d", strtotime($endingDate));
        }
        $status = filter_var($status, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if( !in_array($status, $this->status) ){
            $error['status'] = "Status not in Planning,Doing,Complete";
        }
        if (!empty($error)) {
            return $error;
        }
        $result = $this->work->createWork($workName,$startingDate,$endingDate,$status);
        return $result;
    }

    public function edit($id){
        // validate data
        $id = filter_var($id, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $work = $this->work->editWork($id);
        // check result
        if( $work == "Error" ){
            $error = "ID work dont exist database";
            return $error;
        }
        return $work;
    }

    public function update($id,$workName,$startingDate,$endingDate,$status){
        // validate data
        $error = [];
        $workName = filter_var($workName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if ($this->validateDate('m/d/Y', $startingDate) == false) {
            $error['startingDate'] = "Starting Date is wrong format";
        }else{
            // Creating timestamp from given date
            $startingDate = date("Y-m-d", strtotime($startingDate));
        }
        if ($this->validateDate('m/d/Y', $endingDate) == false) {
            $error['endingDate'] = "Ending Date is wrong format";
        }else{
            // Creating timestamp from given date
            $endingDate = date("Y-m-d", strtotime($endingDate));
        }
        $status = filter_var($status, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if( !in_array($status, $this->status) ){
            $error['status'] = "Status not in Planning,Doing,Complete";
        }
        if (!empty($error)) {
            return $error;
        }
        $result = $this->work->updateWork($id,$workName,$startingDate,$endingDate,$status);
        return $result;
    }

    public function delete($id){
        // validate data
        $id = filter_var($id, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $result = $this->work->deleteWork($id);
        // check result
        if( $result == "Error" ){
            $error = "ID work dont exist database";
            return $error;
        }
        return $result;
    }

}
?>