<br>
<?php 
    $title="User Login";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //if data was submitted via a form POST request, then....
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password.$username);

        $result = $user->getUser($username, $new_password);
        if(!$result){
            echo '<div class="alert alert-danger" role="alert">
             Username or Password is incorrect !! Try again later.
          </div>';
        }
        else{
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['id'];
            header("Location: viewrecords.php");
        }
    }
?>

<h1 class="text-center"><?php echo "$title"?></h1>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
    <table class="table table-sm">
        <tr>
            <td><label for="username">Username: *</label></td>
            <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
            </td>
        </tr>
        <tr>
            <td><label for="password">Password: *</label></td>
            <td><input type="password" name="password" class="form-control" id="password"></td>
        </tr>
    </table>
    <br>
    <br>
    <br>   
    <div class="d-grid gap-2 col-6 mx-auto">
        <input type="submit" value="login" class="btn btn-primary btn-block"><br/> 
        <a href="#" class="text-center">Forgot Password</a>       
    </div>
</form>

<br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>
   <br>
   <br>