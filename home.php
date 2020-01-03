

<?php include "templates/header.php"; ?>

<p>HOME</p>
<div>
    <?php 
    
    echo file_get_contents("about.php");

   
     ?> <br>
    
</div>
<?php include "templates/footer.php"; ?>