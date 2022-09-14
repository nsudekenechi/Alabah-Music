let username = document.querySelector(".username")
let password = document.querySelector(".password");
let loginButton = document.querySelector(".log_in")
let checkBox = document.querySelector(".checkbox")
username.onkeyup = function(){
    fetch(`./handlers/index_handler.php?username=${username.value}`).then(e=>e.text()).then(e=>{
        if(e=='true'){
           
            username.classList.add('is-valid')
            username.classList.remove('is-invalid')
            loginButton.removeAttribute("disabled")
        }else{
           username.classList.add('is-invalid')
           username.classList.remove('is-valid')
           loginButton.setAttribute("disabled",true)
          
        }
    })

    
}

password.onkeyup = function(){
    fetch(`./handlers/index_handler.php?username=${username.value}&&password=${password.value}`).then(e=>e.text()).then(e=>{
        if(e=='truetrue'){
           
            password.classList.add('is-valid')
            password.classList.remove('is-invalid')
            loginButton.removeAttribute("disabled")
        }else{
            
           password.classList.add('is-invalid')
           password.classList.remove('is-valid')
           loginButton.setAttribute("disabled",true)
          
        }
    })

    
}

