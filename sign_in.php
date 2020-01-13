<!DOCTYPE html>
<html>

<?php  include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Sign in</h4>
    <form action="authenticate.php" class="white" method="POST">
        
    <label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
	</form>

</section> 

<?php  include('templates/footer.php'); ?>

</body>
</html>
 