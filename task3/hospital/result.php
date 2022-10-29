<?php 
$title="result";
include "header.php";
include "nav.php";
$total=50;
$messege;

$table="<table class='table'>
<tbody>
<tr>
<td class='col-6'> are you satisfied with the level of hiegine?</td>

<td class='col-6'>";
if($_SESSION['radio1']==0){
    echo "bad";
}
elseif($_SESSION['radio1']==3){
    echo "good";
}
elseif($_SESSION['radio1']==5){
    echo "very good";
}
elseif($_SESSION['radio1']==10){
    echo "excellent";
}

$table .= "</td>
</tr>

<tr>
<td class='col-6'> are you satisfied with the price of the service?</td>

<td class='col-6'>";
if($_SESSION['radio2']==0){
    echo "bad";
}
elseif($_SESSION['radio2']==3){
    echo "good";
}
elseif($_SESSION['radio2']==5){
    echo "very good";
}
elseif($_SESSION['radio2']==10){
    echo "excellent";
}

$table .= "</td>
</tr>

<tr>
<td class='col-6'> are you satisfied with the service of nursing?</td>

<td class='col-6'>";
if($_SESSION['radio3']==0){
    echo "bad";
}
elseif($_SESSION['radio3']==3){
    echo "good";
}
elseif($_SESSION['radio3']==5){
    echo "very good";
}
elseif($_SESSION['radio3']==10){
    echo "excellent";
}

$table .= "</td>
</tr>
<tr>
<td class='col-6'> are you satisfied with the level of doctors?</td>

<td class='col-6'>";
if($_SESSION['radio4']==0){
    echo "bad";
}
elseif($_SESSION['radio4']==3){
    echo "good";
}
elseif($_SESSION['radio4']==5){
    echo "very good";
}
elseif($_SESSION['radio4']==10){
    echo "excellent";
}

$table .= "</td>
</tr>
<tr>
<td class='col-6'> are you satisfied with the level of calmness?</td>

<td class='col-6'>";
if($_SESSION['radio5']==0){
    echo "bad";
}
elseif($_SESSION['radio5']==3){
    echo "good";
}
elseif($_SESSION['radio5']==5){
    echo "very good";
}
elseif($_SESSION['radio5']==10){
    echo "excellent";
}

$table .= "</td>
</tr>



</tbody>
</table>";

echo $table;
// echo $messege;

if($_SESSION['radio1']+$_SESSION['radio2']+$_SESSION['radio3']+$_SESSION['radio4']+$_SESSION['radio5']<$total/2){

    echo "total-> bad <br>";
    echo "we will call you on {$_SESSION['phone_number']} to make the service better";
}
else{
    echo"total -> good <br>";
    echo"thank you";
}
