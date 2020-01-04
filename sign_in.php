<?php

include('db_connect.php');

$errors = array('username' => '', 'password'=>'');

$username='';
$password='';
$login = false;


if(isset($_POST['submit'])){
    
    // check username
    if(empty($_POST['username'])){
        $errors['username'] = 'Username is required!'; 
    } 
    else {
        $username = $_POST['username']; 

        if(!preg_match('/^[a-zA-Z\s]+$/', $username)){
            $errors['username'] = 'Username must be a valid username!';
        }
    }


// check password
if(empty($_POST['password'])){
    $errors['password'] = 'Password is required!';
   
} 
else {
    $password = $_POST['password'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $password)){
        $errors['password'] = 'Password must be a valid password!';
    }
}

//query for all user from users table
$sql = 'SELECT username, password FROM users';

// make query and get data
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($users as $user){
    if(strcmp($user['username'],$_POST['username'])==0){
    if(strcmp($user['password'], $_POST['password'])==0){
        $login =true; }
    }
    }

    if(!$login)
        $errors['username'] = 'Login failed!';
     

if(array_filter($errors)){
    //echo 'there errors in the forms';
}
else {

    echo 'Login successed!';

header('Location: shop.php'); 
}
}  


?>

<!DOCTYPE html>
<html>

<?php  include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Sign in</h4>
    <form action="sign_in.php" class="white" method="POST">
        
        <label for="username">Username</label>
        <input type="text" name="username" value = <?php echo htmlspecialchars($username)?>>
        <div class="red-text"><?php echo $errors['username']; ?> </div>
       
        <label for="password">Password</label>
        <input type="text" name="password" value= <?php echo htmlspecialchars($password)?>>
        <div class="red-text"><?php echo $errors['password']; ?> </div>
        <div class="center">
            <input type="submit" name="submit" value="submit"class="btn brand z-depth-0">

        </div>
    </form>

</section> 

<?php  include('templates/footer.php'); ?>

</body>
 </html>
 