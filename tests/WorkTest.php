<?php
declare(strict_types=1);
namespace Tests;

use \PHPUnit\Framework\TestCase;

require(dirname(__FILE__).'/../modal/Work.php');
require(dirname(__FILE__).'/../controller/WorkFunction.php');

class WorkTest extends TestCase{
    // Create
    public function testCreateSuccess(){
        // define work function
        $work = new \Work();
        $workFunc = new \WorkFunction($work);
        // prepare data
        $workName = "HelloBeDep";
        $startingDate = "07/05/2021";
        $endingDate = "07/12/2021";
        $status = "Doing";
        $this->assertEquals("Success",$workFunc->create($workName,$startingDate,$endingDate,$status));
    }
    public function testCreateWrongDateFormat(){
        // define work function
        $work = new \Work();
        $workFunc = new \WorkFunction($work);
        // prepare data
        $workName = "HelloBeDep";
        $startingDate = "07/05askjdjas2021";
        $endingDate = "07/12/2021";
        $status = "Doing";
        // expect result
        $error = "Starting Date is wrong format";
        // real result
        $result = $workFunc->create($workName,$startingDate,$endingDate,$status);
        // compare result
        $this->assertEquals($error,$result['startingDate']);
    }
    public function testCreateWrongStatus(){
        // define work function
        $work = new \Work();
        $workFunc = new \WorkFunction($work);
        // prepare data
        $workName = "HelloBeDep";
        $startingDate = "07/05/2021";
        $endingDate = "07/12/2021";
        $status = "askdhaskjhdajsh";
        // expect result
        $error = "Status not in Planning,Doing,Complete";
        // real result
        $result = $workFunc->create($workName,$startingDate,$endingDate,$status);
        // compare result
        $this->assertEquals($error,$result['status']);
    }
    // Edit
    public function testEditSuccess(){
        // define work function
        $work = new \Work();
        $workFunc = new \WorkFunction($work);
        // prepare data
        $id = 15;
        // real result
        $result = $workFunc->edit($id);
        $this->assertTrue(is_array($result));
    }
    public function testEditError(){
        // define work function
        $work = new \Work();
        $workFunc = new \WorkFunction($work);
        // prepare data
        $id = "asdaskjsjaksc";
        // expect result
        $error = "ID work dont exist database";
        // real result
        $result = $workFunc->edit($id);
        // compare result
        $this->assertEquals($error,$result);
    }
    // Update
    public function testUpdateSuccess(){
        // define work function
        $work = new \Work();
        $workFunc = new \WorkFunction($work);
        // prepare data
        $id = 15;
        $workName = "HelloBeDep2";
        $startingDate = "07/05/2021";
        $endingDate = "07/12/2021";
        $status = "Doing";
        $this->assertEquals("Success",$workFunc->update($id,$workName,$startingDate,$endingDate,$status));
    }
    public function testUpdateWrongDateFormat(){
        // define work function
        $work = new \Work();
        $workFunc = new \WorkFunction($work);
        // prepare data
        $id = 15;
        $workName = "HelloBeDep";
        $startingDate = "07/05askjdjas2021";
        $endingDate = "07/12/2021";
        $status = "Doing";
        // expect result
        $error = "Starting Date is wrong format";
        // real result
        $result = $workFunc->update($id,$workName,$startingDate,$endingDate,$status);
        // compare result
        $this->assertEquals($error,$result['startingDate']);
    }
    public function testUpdateWrongStatus(){
        // define work function
        $work = new \Work();
        $workFunc = new \WorkFunction($work);
        // prepare data
        $id = 15;
        $workName = "HelloBeDep";
        $startingDate = "07/05/2021";
        $endingDate = "07/12/2021";
        $status = "askdhaskjhdajsh";
        // expect result
        $error = "Status not in Planning,Doing,Complete";
        // real result
        $result = $workFunc->update($id,$workName,$startingDate,$endingDate,$status);
        // compare result
        $this->assertEquals($error,$result['status']);
    }
    // Delete
    public function testDeleteSuccess(){
        // define work function
        $work = new \Work();
        $workFunc = new \WorkFunction($work);
        // prepare data
        $id = 29;
        $this->assertEquals("Success",$workFunc->delete($id));
    }
    public function testDeleteError(){
        // define work function
        $work = new \Work();
        $workFunc = new \WorkFunction($work);
        // prepare data
        $id = "asdihsaihciuashd";
        $this->assertEquals("ID work dont exist database",$workFunc->delete($id));
    }
}