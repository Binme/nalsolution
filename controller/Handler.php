<?php 
// get param from request url
if( $_GET['action'] !== "" && isset($_GET['action']) && $_GET['action'] !== NULL ){
    $action = $_GET['action'];
}elseif( $_POST['action'] !== "" && !isset($_POST['action']) && $_POST['action'] !== NULL ){
    $action = $_POST['action'];
}else{
    $action = "";
}
// import class
require('../modal/Work.php');
require('./WorkFunction.php');
// init function
$work = new Work();
$workFunc = new WorkFunction($work);
// controller
switch ($action) {
    case '':
        $result = $workFunc->tables();
        // render to view
        require('../view/template/tables.php');
        break;
    case 'calendar':
        $result = $workFunc->calendar();
        // render to view
        require('../view/template/calendar.php');
        break;
    case 'viewCreate':
        $work = [];
        require('../view/template/create.php');
        break;
    case 'create':
        $result = $workFunc->create($_POST['workName'],$_POST['startingDate'],$_POST['endingDate'],$_POST['status']);
        if( $result == "Success" ){
            // redirect to table view
            header('Location: ' . substr($_SERVER['HTTP_REFERER'], 0, strrpos($_SERVER['HTTP_REFERER'], '/') )."/Handler.php");
        }
        $work = [];
        $work['WorkName'] = $_POST['workName'];
        $work['StartingDate'] = $_POST['startingDate'];
        $work['EndingDate'] = $_POST['endingDate'];
        $work['Status'] = $_POST['status'];
        $work['Error'] = $result;
        return require('../view/template/create.php');
        break;
    case 'edit':
        $result = $workFunc->edit($_GET['id']);
        if( $result == "ID work dont exist database" ){
            $error = $result;
            // redefine connection DB
            $work = new Work();
            $workFunc = new WorkFunction($work);
            $result = $workFunc->tables();
            // render to view
            return require('../view/template/tables.php');
        }
        $work = $result;
        return require('../view/template/edit.php');
        break;
    case 'update':
        $result = $workFunc->update($_POST['id'],$_POST['workName'],$_POST['startingDate'],$_POST['endingDate'],$_POST['status']);
        if( $result == "Success" ){
            // redirect to table view
            header('Location: ' . substr($_SERVER['HTTP_REFERER'], 0, strrpos($_SERVER['HTTP_REFERER'], '/') )."/Handler.php");
        }elseif( $result == "ID work dont exist database" ){
            $error = $result;
            // redefine connection DB
            $work = new Work();
            $workFunc = new WorkFunction($work);
            $result = $workFunc->tables();
            // render to view
            return require('../view/template/tables.php');
        }
        $work = [];
        $work['id'] = $_POST['id'];
        $work['WorkName'] = $_POST['workName'];
        $work['StartingDate'] = $_POST['startingDate'];
        $work['EndingDate'] = $_POST['endingDate'];
        $work['Status'] = $_POST['status'];
        $work['Error'] = $result;
        return require('../view/template/edit.php');
        break;
    case 'delete':
        $result = $workFunc->delete($_GET['id']);
        if( $result == "ID work dont exist database" ){
            $error = $result;
        }
        // redefine connection DB
        $work = new Work();
        $workFunc = new WorkFunction($work);
        $result = $workFunc->tables();
        // render to view
        return require('../view/template/tables.php');
        break;
}
?>