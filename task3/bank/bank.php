
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Bank</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">accounts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">about</a>
      </li>
      
        
      </li>
    </ul>
  </div>
</nav>
  
    <h1>Bank<h1>
  <form action="bank.php"  method="post">
  <div class="form-group col-5">
    <label for="name">user name</label>
    <input type="text" class="form-control" id="username" name="username" value="<?= $_POST['username']?? ""?>"  aria-describedby="emailHelp">
    
  </div>
  <div class="form-group col-5">
    <label for="number">loan</label>
    <input type="number" class="form-control" id="enumber" name="loan"value="<?= $_POST['loan']?? ""?>"   >
  </div>
  <div class="form-group col-5">
    <label for="number">number of years</label>
    <input type="number" class="form-control" id="enumber" name="numberofyears" value="<?= $_POST['numberofyears']?? ""?>" >
  </div>
  
  <button type="submit" class="btn btn-primary col-2 mb-5">calculate</button>
</form>



      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php 

$total;
 $tax;

$totalpermonth;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    

        if($_POST['numberofyears']<=3){


        $tax=  ($_POST['loan'])* 0.1 * ($_POST['numberofyears']);
        
        $total=$tax + $_POST['loan'];
     $totalpermonth=$total/($_POST['numberofyears']*12);
       
}
       elseif($_POST['numberofyears']>3){


        $tax=  ($_POST['loan'])* 0.15 * ($_POST['numberofyears']);
        $total=$tax + $_POST['loan'];
     $totalpermonth=$total/($_POST['numberofyears']*12);
        
}


$table=  "<table class='table bg-primary mb-5'>
<tr>
<td>information<td>
<td>value<td>
</tr>
<tr>
<td>user name<td>
<td>{$_POST['username']}<td>
</tr>
<tr>
<td>interest rate<td>
<td>{$tax} EGP<td>
</tr>
<tr>
<td>loan after interest<td>
<td>{$total} EGP<td>
</tr>
<tr>
<td>number of years<td>
<td>{$_POST['numberofyears']}<td>
</tr>
<tr>
<td>the monthly installment<td>
<td>{$totalpermonth} EGP<td>
</tr>


</table>";

echo $table;
}


?>