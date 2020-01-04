
<?php

include('db_connect.php');

$errors = array('name'=>'', 'username' => '', 'email' => '', 'password'=>'');

$name='';
$username='';
$email='';
$password='';


if(isset($_POST['submit'])){
    // echo htmlspecialchars($_POST['name']);
    // echo htmlspecialchars($_POST['username']);
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['password']);


    // check name
    if(empty($_POST['name'])){
        $errors['name'] = 'Name is required!';
      
    } else {
        $name = $_POST['name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
            $errors['name']= 'Name must be a valid name)!';
        }
    }

    // check username
    if(empty($_POST['username'])){
        $errors['username'] = 'Username is required!'; 
    } 
    else {
        $username = $_POST['username'];        
        if(!preg_match('/^[a-zA-Z\s]+$/', $username)){
            $errors['username'] = 'Username must be a valid username!';
        }

         //query for all user from users table
    $sql = 'SELECT username, password FROM users';

    // make query and get data
        $result = mysqli_query($conn, $sql);
    
        // fetch the resulting rows as an array
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        foreach($users as $user)
        {
        if(strcmp($user['username'],$_POST['username'])==0)
        $errors['username'] = 'Username is already used!';
        }
    }

// check email
if(empty($_POST['email'])){
    $errors['email'] = 'Email is required!';  
} else {
    
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'email must be a valid email!';
    }
}

// check password
if(empty($_POST['password'])){
    $errors['password'] = 'Password is required!';
   
} else {
    $signed_in = true;
    $password = $_POST['password'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $password)){
        $errors['password'] = 'Password must be a valid password!';
    }
}


if(array_filter($errors)){
    //echo 'there errors in the forms';
}
else {
    //echo 'Registration successed!';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$emailpassword = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

//create sql

$sql = "INSERT INTO users(name, username, email, password) VALUES ('$name',
'$username', '$email','$password' )";

//save to db and check
if(mysqli_query($conn, $sql)){
    //success
   header('Location: index.php');  
}else{
    //error
    echo  'query error: ' . mysqli_error($conn);
}


}//echo 'IT IS OK';
//header('Location: index.php');  // ha nincs hiba vissza az index oldalra redirect
} // end the POST check             // késöbb ha nem lesz hiba akkor mehet az adat az adatbázisba

?>

<!DOCTYPE html>
<html>

<?php  include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Registration</h4>
    <form action="registration.php" class="white" method="POST">
        <label for="name">Name</label> 
        <input type="text" name="name" value = <?php echo htmlspecialchars($name)?>>
        <div class="red-text"><?php echo $errors['name']; ?></div> 
        <label for="username">Username</label>
        <input type="text" name="username" value = <?php echo htmlspecialchars($username)?>>
        <div class="red-text"><?php echo $errors['username']; ?> </div>
        <label for="email">Email</label>
        <input type="text" name="email" value= <?php echo htmlspecialchars($email)?>>
        <div class="red-text"><?php echo $errors['email']; ?> </div>
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
 