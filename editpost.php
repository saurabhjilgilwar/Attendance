<?php
    $title="Editpost";
    require_once 'db/conn.php';
    //Get value from post operation
    if(isset($_POST['submit'])){
        //extract value from the $_POST array
        $id = $_POST["id"];
        $fname = $_POST["InputFirstName"];
        $lname = $_POST["InputLastName"];
        $dob = date('y.m.d', strtotime( $_POST["DOB"]));
        $email = $_POST["InputEmail"];
        $contact = $_POST["InputPhone"];
        $specialty = $_POST["Specialty"];

        //call crud function
        $result = $crud->editAttendees($id,$fname, $lname, $dob, $email, $contact, $specialty);
        //Redirect to index.php
        if($result){
            header("Location: viewrecords.php");
        }else{
            include 'includes/errormessage.php';
        }
    }else{
        include 'includes/errormessage.php';
    }

?>