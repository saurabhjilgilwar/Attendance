<br>
<?php 
    $title="Success";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        //extract value from the $_POST array
        $fname = $_POST["InputFirstName"];
        $lname = $_POST["InputLastName"];
        $dob = date('y.m.d', strtotime( $_POST["DOB"]));
        $email = $_POST["InputEmail"];
        $contact = $_POST["InputPhone"];
        $specialty = $_POST["Specialty"];
        //call function to insert and track if success or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);

        if ($isSuccess){
            include 'includes/successmessage.php';           
        }
        else{
            include 'includes/errormessage.php';
        }
    }
?>

<!-- print out the value that were passed to the action page using method="get"-->
<!--
    <div class="card bg-dark text-white" style="width: 18rem;">
        <div class="card-body">
            <h3 class="card-title">
            <?php //echo $_GET["InputFirstName"] . " " . $_GET['InputLastName'] ?>
            </h3>
            <h5 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['Specialty'] ?></h5>
            <h6 class="card-text"><?php // echo "DOB : ".$_GET['DOB']."</br>". $_GET['InputEmail']."</br>". $_GET['InputPhone'] ?></h6>
            
        </div>
    </div>
-->
    <div class="card bg-dark text-white" style="width: 18rem;">
        <div class="card-body">
            <h3 class="card-title">
            <?php echo $_POST["InputFirstName"] . " " . $_POST['InputLastName'] ?>
            </h3>
            <h5 class="card-subtitle mb-2 text-muted"><?php echo $_POST['Specialty'] ?></h5>
            <h6 class="card-text"><?php echo "DOB : ".$_POST['DOB']."</br>". $_POST['InputEmail']."</br>". $_POST['InputPhone'] ?></h6>
            
        </div>
    </div>


    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>
   <br>
   <br>