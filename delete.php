<?php 
    require_once 'db/conn.php';
    if(!$_GET['id']){
        include 'includes/errormessage.php';
    }else{
        //Get ID values
        $id = $_GET['id'];

        //Call delete function
        $result = $crud->deleteAttendees($id);
        //redirect list
        if($result){
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }

?>