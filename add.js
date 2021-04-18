document.getElementById('submit-btn').addEventListener('click', ()=>{
    let mail = document.getElementById('mail').value; 
    let phone = document.getElementById('telephone').value; 
    let validEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/; 
    let validPhone = /^0[1-99]([-. ]?[0-9]{2}){4}$/; 

    if(mail.match(validEmail)){
        if(phone.match(validPhone)){
            document.getElementById('add-form').submit(); 
        }else{
            alert("Numéro de téléphone invalide!"); 
        }
    }
    else{
        alert("Adresse mail invalide!"); 
    }
}); 
