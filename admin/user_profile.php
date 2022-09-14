<?php
$title="User Profile";
require_once('./includes/header.php');
$username=$_SESSION["username"];
$query="SELECT * FROM login WHERE admin_username='$username' || admin_email='$username'";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $username=$row["admin_username"];
    $email=$row["admin_email"];
    $adminRole=$row["admin_role"];
    $adminType=$row["admin_type"];
}
?>
 <link href="assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-spacing">

                    <!-- Content -->
                    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                    <h3 class="">Profile</h3>
                                    <a href="user_account_setting.html" class="mt-2 edit-profile" style="visibility: hidden;"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                </div>
                                <div class="text-center user-info">
                          
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> 
                            
                                    <p class=""><?=$username;?></p>
                                </div>
                                <div class="user-info-list">

                                    <div class="">
                                        <ul class="contacts-block list-unstyled">
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg> <?=$adminRole;?>
                                            </li>
                                            
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg><?=$adminType;?>
                                            </li>
                                            <li class="contacts-block__item">
                                                <a ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><?=$email;?></a>
                                            </li>
                                           
                                            
                                        </ul>
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        

                    </div>

                    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                        <div class="skills layout-spacing ">
                            <div class="widget-content widget-content-area p-3 p-lg-5">
                               
                             
                                   <h3 class="">Change Username</h3>

                                   <form action="./handlers/changeuser_handler.php" method="POST">
                                    <input type="text" hidden value="<?=$username;?>" name="oldUsername">
                                       
                                   <input type="text" class="form-control" name="newUsername" placeholder=" Username" value="" required>
                                   <span></span>
                                   <div class="field-wrapper my-3">
                                        <button type="submit" class="btn btn-primary mt-2" value="" name="changeUsername">Change</button>
                                    </div>
                                   </form>
                                    <form action="./handlers/changeuser_handler.php" method="POST">
                                    <input type="text" hidden value="<?=$username;?>" name="oldUsername" class="old_username">
                                    <div class="mt-5">
                                    <h3 class="">Change Email</h3>
                                    <input type="email" class="form-control" name="email" placeholder=" Email" value="" required>
                                    <span></span>
                                   <div class="field-wrapper my-3">
                                        <button type="submit" class="btn btn-primary mt-2" value="" name="changeEmail">Change</button>
                                    </div>
                                    </div>
                                    </form>
                             

                            </div>
                        </div>

                        <div class="bio layout-spacing ">
                            <div class="widget-content widget-content-area">
                                

                                <div class="bio-skill-box px-3 px-lg-5">
                                <form action="./handlers/changeuser_handler.php" method="post">
                       
                                <input type="text" hidden value="<?=$email;?>" name="email">
                                  <h3 class="">Change Password</h3>
                                  <div id="password-field" class="field-wrapper input mb-4">
                                  
                                         <input id="password" required name="oldPassword" type="password" class="form-control old_password" placeholder="Old Password">
                                         <span class="text-danger"></span>
                                         <div class="field-wrapper toggle-pass mt-3 d-flex">
                                                    <span class="mr-3">Show Password</span>
                                                    <label class="switch s-primary  ">
                                                        <input type="checkbox" id="toggle-password" class="d-none " >
                                                        <span class="slider round"></span>
                                                    </label>
                                            </div>

                                   </div>
                                   
                                   <div id="password-field" class="field-wrapper input mb-4">
                                  
                                         <input id="password" required name="newPassword" type="password" class="form-control new_password" placeholder="New Password">
                                         <div class=" mt-1 d-none ">
                                                <span class="text-danger d-block">Contains 0-9</span>
                                                <span class="text-danger mx-4">Contains A-Z</span>
                                                <span class="text-danger">Contains a-z</span>
                                                <span class="text-danger mx-4">Contains special character</span>
                                                <span class="text-danger">Contains Minimum 8 characters</span>
                                         </div>

                                         
                                            <div class="field-wrapper toggle-pass mt-3 d-flex">
                                                    <span class="mr-3">Show Password</span>
                                                    <label class="switch s-primary  ">
                                                        <input type="checkbox" id="toggle-password" class="d-none " >
                                                        <span class="slider round"></span>
                                                    </label>
                                            </div>
                                  
                                    
                                   </div>

                                   <div id="password-field" class="field-wrapper input mb-4">
                                  
                                         <input id="password" required name="password" type="password" class="form-control confirm_password" placeholder="Confirm Password">
                                         <span class="text-danger"></span>
                                   </div>
                                 
                                   <div class="field-wrapper my-3">
                                        <button type="submit" class="btn btn-primary mt-2 change_password" value="" name="changePassword">Change Password</button>
                                    </div>
                                   </div>
                        

                                </div>

                            </div>                                
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

        <script>
            const oldPassword = document.querySelector('.old_password');
            const newPassword = document.querySelector('.new_password');
            const confirmPassword = document.querySelector(".confirm_password");
            const button = document.querySelector(".change_password");
            const username = document.querySelector('.old_username');
            const regExp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\W])(?=.{8,})/
            const showPassword = document.querySelectorAll("#toggle-password")
            //Verifying Oldpassword input
            oldPassword.onkeyup=function(){
                fetch(`./handlers/changeuser_handler.php?oldPassword=${oldPassword.value}&&username=${username.value}`).then(e=>e.text()).then(e=>{
                    if(e=="false"){
                        oldPassword.nextElementSibling.textContent="Invalid Password!"
                        oldPassword.classList.remove("is-valid")
                        //Disabling other password inputs
                        newPassword.setAttribute("disabled",true)
                        confirmPassword.setAttribute("disabled",true)
                        //Making button not clickable
                        button.onclick=function(e){
                            e.preventDefault();
                        }
                    }else{
                        oldPassword.classList.add("is-valid")
                        oldPassword.nextElementSibling.textContent=""
                        newPassword.removeAttribute("disabled")
                        confirmPassword.removeAttribute("disabled")
                    }
                })
            }

            //Matching newpassword with regExp
            newPassword.onkeyup=function(){
               if(newPassword.value!=""){
                newPassword.nextElementSibling.classList.replace("d-none","d-flex");
                if(regExp.test(newPassword.value)){
                    newPassword.nextElementSibling.classList.replace("d-flex","d-none");
                    newPassword.classList.add("is-valid")
                    newPassword.classList.replace("i","is-valid");
                }else{
                    newPassword.classList.replace("is-valid","i");
                    validatePassword(/[0-9]/,0,newPassword.nextElementSibling)
                    validatePassword(/[A-Z]/,1,newPassword.nextElementSibling)
                    validatePassword(/[a-z]/,2,newPassword.nextElementSibling)
                    
                    validatePassword(/\W/,3,newPassword.nextElementSibling)

                    newPassword.value.length>=8?newPassword.nextElementSibling.children[4].classList.replace("text-danger","text-success"):newPassword.nextElementSibling.children[4].classList.replace("text-success","text-danger")
                }

               }else{
                newPassword.nextElementSibling.classList.replace("d-flex","d-none");
            
                

               }
            }
            //Checking if confirmpassword==newpassword
            confirmPassword.onkeyup=function(){
                if(confirmPassword.value!=newPassword.value){
                    confirmPassword.nextElementSibling.textContent="Password doesn't match!";
                    //Changing text color when password 
                    confirmPassword.nextElementSibling.classList.add("text-danger");
                    confirmPassword.nextElementSibling.classList.remove("text-success");
                    //Preventing Default
                        button.onclick=function(e){
                            e.preventDefault();
                        }
                }else{
                    confirmPassword.nextElementSibling.textContent="Password matches!";
                    confirmPassword.nextElementSibling.classList.remove("text-danger");
                    confirmPassword.nextElementSibling.classList.add("text-success");
                    //Not preventing default
                    button.onclick=function(e){

                    }
                }
            }
            
            togglePassword(showPassword[0],oldPassword)
            togglePassword(showPassword[1],newPassword)
          
           
            function validatePassword(regExp,i,validateBox){
                newPassword.value.match(regExp) ? validateBox.children[i].classList.replace("text-danger","text-success"):validateBox.children[i].classList.replace("text-success","text-danger");
            
            }
           
            function togglePassword(toggle,password){
                toggle.onclick=function(){
                    if(password.type=="password"){
                        password.type="text"
                    }else{
                        password.type="password"
                    }
                }
            }
        </script>
  <?php
    require_once('./includes/footer.php');
  ?>