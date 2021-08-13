<br>
<?php 
    $title="View Record";
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    //Get all attendee
    $result = $crud->getAttendees();
?>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Specialty</th>  
        <th scope="col">Action</th>  
        </tr>
    </thead>
    <tbody>
        <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td><?php echo $r["attendee_id"] ?></td>
                <td><?php echo $r["firstName"] ?></td>
                <td><?php echo $r["lastName"] ?></td>
                <td><?php echo $r["name"] ?></td>                
                <td>
                    <a href="view.php?id=<?php echo $r["attendee_id"] ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r["attendee_id"] ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure want to delete this record..?');" href="delete.php?id=<?php echo $r["attendee_id"] ?>" class="btn btn-Danger">Delete</a>
                </td>                
            </tr>
        <?php } ?>
    </tbody>
    </table>  

<br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>
   <br>
   <br>