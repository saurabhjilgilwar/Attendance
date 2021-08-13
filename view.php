<br>
<?php 
    $title="View Record";
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    //Get attendee by id
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        
    }else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
        $r = $result;

?>


<div class="card bg-dark text-white" style="width: 18rem;">
        <div class="card-body">
            <h3 class="card-title">
            <?php echo $result["firstName"] . " " . $result['lastName'] ?>
            </h3>
            <h5 class="card-subtitle mb-2 text-muted"><?php echo $result['name'] ?></h5>
            <h6 class="card-text"><?php echo "DOB : ".$result['DOB']."</br>". $result['emailaddress']."</br>". $result['contactNumber'] ?></h6>
            
        </div>
    </div>
    <br>
    <a href="viewrecords.php?id=<?php echo $r["attendee_id"] ?>" class="btn btn-dark">Back</a>
    <a href="edit.php?id=<?php echo $r["attendee_id"] ?>" class="btn btn-warning">Edit</a>
    <a onclick="return confirm('Are you sure want to delete this record..?');" href="delete.php?id=<?php echo $r["attendee_id"] ?>" class="btn btn-Danger">Delete</a>

<?php } ?>

    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>
   <br>
   <br>