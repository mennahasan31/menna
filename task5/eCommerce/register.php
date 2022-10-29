<?php

use App\Database\Models\User;
use App\Http\Request\Validation;

$title= "register";

    include "layouts/header.php";
    include "layouts/navbar.php";
    include "layouts/braedcrump.php";
   

 $validation=new Validation;

 if($_SERVER['REQUEST_METHOD'] == "POST"){
    $validation->setInput($_POST['first_name'] ?? "")->setInputName('first_name')->required()->string()->between(2,32);
    $validation->setInput($_POST['last_name'] ?? "")->setInputName('last_name')->required()->string()->between(2,32);
    $validation->setInput($_POST['email'] ?? "")->setInputName('email')->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->unique('users','email');
    $validation->setInput($_POST['phone'] ?? "")->setInputName('phone')->required()->regex('/01[0125][0-9]{8}$/')->unique('users','phone');
    $validation->setInput($_POST['password'] ?? "")->setInputName('password')->required()->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/',"Minimum eight and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character")->confirmed($_POST['password_confirmation']);
    $validation->setInput($_POST['password_confirmation'] ?? "")->setInputName('password_confirmation')->required();
    $validation->setInput($_POST['gender'] ?? "")->setInputName('gender')->required()->in([0,1]);
 }

?>
<div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                
                                <a class="active"  data-toggle="tab" href="#lg2">
                                   <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form  method="post">
                                                <input type="text" name="first_name" placeholder="first name">
                                                <input type="text" name="last_name" placeholder="last name">
                                                <input type="email" name="email" placeholder="email">
                                                <input type="number" name="phone" placeholder="phone">
                                                <input type="password" name="password" placeholder="Password">
                                                <input type="password" name="password_confirmatiom" placeholder="Password confirmation">
                                                <select name="gender" class="form-control mb-4" id="">
                                                    <option value="1">Male</option>
                                                    <option value="0">Female</option>
                                                </select>
                                                <div class="button-box">
                                                    <button type="submit"><span>Register</span></button>
                                                </div>
                                                    
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <?php 
        include "layouts/footer.php";
        include "layouts/scripts.php";
        
        ?>