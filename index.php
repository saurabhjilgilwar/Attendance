<br>
<?php 
    $title="Index";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //Get all specialties
    $result = $crud->getSpecialties();
?>
<!--    *first name
        *last name
        *date of birth(use datepicker)
        specialty(database admin, software developer, web administrator, other)
        email id
        contact number
        -->

    <h1 class="text-center">Registration For IT Conference </h1>
    <form method="post" action="success.php">
        <div class="mb-3">
            <label for="InputFirstName" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="InputFirstName" name="InputFirstName">
        </div>
        <div class="mb-3">
            <label for="InputLastName" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="InputLastName" name="InputLastName">
        </div>
        <div class="mb-3">
            <label for="DOB" class="form-label">Date Of Birth</label>
            <input type="text" class="form-control" id="DOB" name="DOB">
        </div>
        <div class="mb-3">
            <label for="Specialty" class="form-label">Area Of Experties</label>
            <select class="form-select" aria-label="Specialty" name="Specialty">
                <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
                <?php } ?>
            </select>
        <div class="mb-3">
            <label for="InputEmail" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="InputEmail" name="InputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="InputPhone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="InputPhone" name="InputPhone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your contact number with anyone else.</div>
        </div>
        
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </div>
    </form>
    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>
   <br>
   <br>