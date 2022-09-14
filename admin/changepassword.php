<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Admin Panel || Change Password</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
</head>
<body class="form overflow-hidden" >
    

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                     

                        <form class="text-left" action="handlers/forgotpassword_handler.php" method="POST">
                            <input type="text" hidden value="<?=$_GET["email"];?>" name="email">
                            <div class="form">

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <div class="d-flex align-items-center">
                                    <input id="password" name="newPassword" type="password" class="form-control new_password" placeholder="Enter New Password">
                                    
                                    </div>
                                    <div class="validate_box mt-3 " style="line-height:5px;">
                                        <p class="form-control">Must contain at least 0-9</p>
                                        <p class="form-control">Must contain at least A-Z</p>
                                        <p class="form-control">Must contain at least a-z</p>
                                        <p class="form-control">Must contain any special character</p>
                                        <p class="form-control">Must have at least 8 characters</p>

                                    </div>
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="confirmPassword" type="password" class="form-control confirm_password" placeholder="Enter Confirm Password">
                                    
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary change_password" value="" name="changePassword">Change password</button>
                                    </div>
                                    
                                </div>

                            </div>
                        </form>                        
                        <p class="terms-conditions" style="visibility: hidden;">© 2020 All Rights Reserved. <a href="dashboard.php">CORK</a> is a product of Designreset. <a href="javascript:void(0);">Cookie Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p>

                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>

    <script>
        let newPassword = document.querySelector(".new_password");
        let confirmPassword = document.querySelector(".confirm_password")
        let validateBox = document.querySelector(".validate_box");
        let regExp = /([a-zA-Z0-9\W]){8}$/
        let changePasswordBtn =document.querySelector('.change_password');
        
        validateBox.classList.add("d-none")
            newPassword.onkeyup=function(){
                if(regExp.test(newPassword.value)){

                newPassword.classList.add('is-valid');

                if(newPassword.value.length==8){
                    validateBox.children[4].classList.add("is-valid");
                    validateBox.children[4].classList.remove("is-invalid");
                }
                
                 }else{

                newPassword.classList.remove('is-valid');
                validatePassword(/[0-9]/,0)
                validatePassword(/[A-Z]/,1)
                validatePassword(/[a-z]/,2)
                validatePassword(/\W/,3)
                
                 }
            
            }

        newPassword.onfocus=function(){
            validateBox.classList.remove("d-none");
        }
       
        confirmPassword.onkeyup = function(){
            validateBox.classList.add('d-none')
            if(newPassword.value==confirmPassword.value){
                confirmPassword.classList.add('is-valid');
                confirmPassword.classList.remove('is-invalid');
                changePasswordBtn.removeAttribute("disabled")
            }else{
                confirmPassword.classList.add('is-invalid');
                confirmPassword.classList.remove('is-valid');
            }
        }

        function validatePassword(regExp,i){
            if(newPassword.value.match(regExp)){
                    validateBox.children[i].classList.add("is-valid");
                    validateBox.children[i].classList.remove("is-invalid");
                }else {
                    validateBox.children[i].classList.add("is-invalid");
                    validateBox.children[i].classList.remove("is-valid");
                    changePasswordBtn.setAttribute("disabled",true);
                }
        }
    </script>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-1.js"></script>

</body>
</html>