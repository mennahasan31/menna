<?php 
$title="review";
include "header.php";
include "nav.php";
$evaluation=array("Bad","Good","Very good","Exellent");
if($_SERVER['REQUEST_METHOD'] == "POST"){
   
    $_SESSION['radio1']=$_POST['radio1'];
    $_SESSION['radio2']=$_POST['radio2'];
    $_SESSION['radio3']=$_POST['radio3'];
    $_SESSION['radio4']=$_POST['radio4'];
    $_SESSION['radio5']=$_POST['radio5'];
    
    header("location:result.php");
   }

 $table="<form method='POST'> <table class='table col-12'/>
<thead>
<tr>
    <td class='col-4 ' >Question</td>
    <td class='col-2' >{$evaluation[0]}</td>
    <td class='col-2'>{$evaluation[1]}</td>
    <td class='col-2' >{$evaluation[2]}</td>
    <td class='col-2' >{$evaluation[3]}</td>
</tr>
</thead>
<tbody>";
$table.=  "<tr>
    <td class='col-4' >are you satisfied with the level of hiegine?</td>
    
    <td><input class='col-2' type='radio' name='radio1' value='0'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio1' value='3'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio1' value='5'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio1' value='10'  aria-label='Radio button for following text input'></td>

   
    </tr>";

    $table.=  "<tr>
    <td class='col-4' >are you satisfied with the price of service?</td>
    
    <td><input class='col-2' type='radio' name='radio2' value='0'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio2' value='3'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio2' value='5'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio2' value='10'  aria-label='Radio button for following text input'></td>

    
    </tr>";

    $table.=  "<tr>
    <td class='col-4' >are you satisfied with the nursing service?</td>
    
    <td><input class='col-2' type='radio' name='radio3' value='0'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio3' value='3'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio3' value='5'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio3' value='10'  aria-label='Radio button for following text input'></td>

    
    </tr>";

    $table.=  "<tr>
    <td class='col-4' >are you satisfied with the level of doctors?</td>
    
    <td><input class='col-2' type='radio' name='radio4' value='0'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio4' value='3'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio4' value='5'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio4' value='10'  aria-label='Radio button for following text input'></td>

    
    </tr>";

    $table.=  "<tr>
    <td class='col-4' >are you satisfied with the calmness in hospital?</td>
    
    <td><input class='col-2' type='radio' name='radio5' value='0'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio5' value='3'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio5' value='5'  aria-label='Radio button for following text input'></td>
    <td><input class='col-2' type='radio' name='radio5' value='10'  aria-label='Radio button for following text input'></td>

    
    </tr>


 </tbody>
</table> 
<input class='text-warning' type='submit' name='submit1' id='submit1' required class='form-control'  placeholder='' aria-describedby='helpId'>

</form>";

echo $table;












