<?php 
$title="number";
include "header.php";
include "nav.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $_SESSION['phone_number']=$_POST['phone_number'];
  header("location:review.php");
}



?>

<form class="form " method="POST" >
<div class="form-group col-3">
            <label for="number">number</label>
            <input type="number" name="phone_number" id="number" required class="form-control"  placeholder="" aria-describedby="helpId">
                    
        </div>

        <div class="form-group">
        <div class="form-group col-1 text-danger">
            
            <input class="text-warning" type="submit" name="submit" id="submit" required class="form-control"  placeholder="" aria-describedby="helpId">
                    
        </div>
        </div>       

</form>



<?php 
  include "scripts.php";
?>