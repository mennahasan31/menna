<?php
  if($_POST)
{
    $first=$_POST['frist_number'];
    $second=$_POST['second_number'];

    if($_POST['group1'] == "add") {
            $result= $first+ $second;
            }
    else if($_POST['group1'] == "subtract") {
            $result= $first - $second;
            }
    else if($_POST['group1'] == "times") {
            $result= $first * $second;
            }
    if($_POST['group1'] == "divide") {
            $result= $first / $second;
            }
    if($_POST['group1'] == "reminder") {
              $result= $first % $second;
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
                <h1> calculator </h1>
            </div>
            <div class="col-4 offset-4 mt-3">
                <form  method="post">
                    <div class="form-group">
                      <label for="number">first number</label>
                       <input type="number" name="frist_number" id="number" class="form-control" placeholder="" aria-describedby="helpId" >

                       <label for="number">second number</label>
                       <input type="number" name="second_number" id="number" class="form-control" placeholder="" aria-describedby="helpId" >

                       <input type="radio" name="group1" id="add" value="add" checked="true"><span>+<span><br>
                        <input type="radio" name="group1" id="subtract" value="subtract"><span>-<span><br>
                        <input type="radio" name="group1" id="times" value="times"><span>*<span><br>
                        <input type="radio" name="group1" id="divide" value="divide"><span>/<span><br>
                        <input type="radio" name="group1" id="reminder" value="reminder"><span>%<span><br>
                        <p></p>
                        <button type="submit" name="answer" id="answer" value="answer">Calculate</button>

        
                    </div>
                </form>    
            </div>       
        </div>
   </div> 

   <?php
          
          echo "<div class='alert alert-success text-center text-danger mt-2 h2' > result is : {$result}</div>";
      
      ?>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>