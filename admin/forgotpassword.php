<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Admin Panel || Forgot Password</title>
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
<body class="form">
    

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Password Recovery</h1>
                        <p class="signup-link">Enter your email and instructions will sent to you!</p>
                        <form class="text-left" action="handlers/forgotpassword_handler.php" method="POST">
               
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="text" value="" placeholder="Email" class="form-control email " required>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit"  class="btn btn-primary" value="" name="submit">Reset</button>
                                    </div>                                    
                                </div>

                            </div>
                        </form>                        
                        <p class="terms-conditions" style="visibility: hidden;">© Alabah's music Admin <?=date("Y");?> All Rights Reservedt</p>

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
        let email=document.querySelector('.email');
        let button = document.querySelector('button')
      
        email.onkeyup =  function(){
            fetch(`./handlers/forgotpassword_handler.php?email=${email.value}`).then(e=>e.text()).then(e=>{
                console.log(e)
                if(e=='true'){
                    email.classList.add('is-valid')
                    email.classList.remove('is-invalid')
                    button.removeAttribute("disabled")
                }else{
                      
                    email.classList.add('is-invalid')
                    email.classList.remove('is-valid');
                    button.setAttribute("disabled",true)
                }
            })
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