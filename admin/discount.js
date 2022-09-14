const buttonModal = document.querySelectorAll(".button-modal")
const modalId=document.querySelector(".modal-id")
const discount = document.querySelector(".discount")
const modalButtons = document.querySelectorAll(".modal-body button");
const type = document.querySelector("#type");
const expirydate = document.querySelector(".expirydate")

buttonModal.forEach(modal=>{
    modal.onclick = function(e){
      
       modalId.value=modal.dataset.id
     
      
      if(modal.innerHTML=="Edit discount"){
          modalButtons[0].innerHTML="Edit";
          modalButtons[1].classList.replace("d-none","d-block")
         
          const getDiscount = async ()=>{
              let req = await fetch(`./handlers/add_handler.php?get${type.value}discount=${modal.dataset.id}`);
              let res = await req.json();
                
              discount.value=res.discount
              expirydate.value=res.expirydate
          }
          getDiscount();
      }else{
         modalButtons[0].innerHTML="Add";
          modalButtons[1].classList.replace("d-block","d-none")
      }
    }
})