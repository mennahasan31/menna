<?php 
  define('maxGrade',100);
  define('total',500);
  
  $percentage="";
  $message="";
  if($_POST){
    $c= $_POST['chemistry'];
    $p= $_POST['physics'];
    $b= $_POST['biology'];
    $m= $_POST['mathematics'];
    $C=$_POST['computer'];
    $grade=$c+$p+$b+$m+$C;
    $percentage=($grade/total)*100;
        switch ($percentage) {
            case $percentage>100  :
            case $percentage<0 :
                $message="invalid grade";
                break;



            case $percentage >=90 && $percentage<=100 :
                $message= "your grade is A";
                break;

            case $percentage >=80 && $percentage<90 :
                $message= "your grade is B";
                break;

            case $percentage >=70 && $percentage<80 :
                 $message= "your grade is C";
                 break;

            case $percentage >=60 && $percentage<70:
                 $message= "your grade is D";
                 break;

            case $percentage >=40 && $percentage<60 :
                    $message= "your grade is E";
                    break;
            
            case $percentage < 40 :
                    $message= "your grade is F";
                    break;
        
        }



  }


?>









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
  <div class="contianer">
        <div class="row">
            <div class="col-12 text-center text-danger mt-2">
                <h1> Grade </h1>
            </div>
            <div class="col-4 offset-4 mt-3">
                <form  method="post">
                    <div class="form-group">
                      <label for="number">physics</label>
                      <input type="number" name="physics" id="number" class="form-control" placeholder="" aria-describedby="helpId" >

                      <label for="number">chemistry</label>
                      <input type="number" name="chemistry" id="number" class="form-control" placeholder="" aria-describedby="helpId">

                      <label for="number">biology</label>
                      <input type="number" name="biology" id="number" class="form-control" placeholder="" aria-describedby="helpId">

                      <label for="number">mathematics</label>
                      <input type="number" name="mathematics" id="number" class="form-control" placeholder="" aria-describedby="helpId">

                      <label for="number">computer</label>
                      <input type="number" name="computer" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-outline-danger rounded form-control"> Find </button>
                    </div>
                </form>
                
            </div>
        </div>
      </div>
        
      <?php
          
          echo "<div class='alert alert-success text-center text-danger mt-2 h2' > your percentage is : {$percentage}% and  {$message}</div>";
      
      ?>

      

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>