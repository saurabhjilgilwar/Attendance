<br>
<?php 
    $title="Index";
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    //Get all specialties
    $result = $crud->getSpecialties();

    if (!isset($_GET['id'])){
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
    
?>


    <h1 class="text-center">Edit Record</h1>
    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" /> 
        <div class="mb-3">
            <label for="InputFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstName'] ?>" id="InputFirstName" name="InputFirstName">
        </div>
        <div class="mb-3">
            <label for="InputLastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastName'] ?>" id="InputLastName" name="InputLastName">
        </div>
        <div class="mb-3">
            <label for="DOB" class="form-label">Date Of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['DOB'] ?>" id="DOB" name="DOB">
        </div>
        <div class="mb-3">
            <label for="Specialty" class="form-label">Area Of Experties</label>
            <select class="form-select" aria-label="Specialty" name="Specialty">
                <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $r['specialty_id'] ?>"
                        <?php if($r['specialty_id'] == $attendee['specialty_id']) {echo 'selected';} ?>>
                        <?php echo $r['name'] ?>
                    </option>
                <?php } ?>
            </select>
        <div class="mb-3">
            <label for="InputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="InputEmail" name="InputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="InputPhone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactNumber'] ?>" id="InputPhone" name="InputPhone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your contact number with anyone else.</div>
        </div>
        
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-success" type="submit" name="submit">Save Changes</button>
            <a href="viewrecords.php" class="btn btn-dark">Back</a>
        </div>
    </form>
<?php } ?>
    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>
   <br>
   <br>