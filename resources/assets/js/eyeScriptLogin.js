// Obter os icones de olhos campos html do form login
const pwdToggleBtn = document.querySelector("form .field i");
// obter os tipos dos inputs
const pwdField = document.querySelector("form .field input[type='password']");

pwdToggleBtn.onclick = ()=>{
   eyeIconsLogin();
}

// Ação para mudar os icones
function eyeIconsLogin(){

    if(pwdField.type == 'password' ){
        pwdField.type = 'text';

        pwdToggleBtn.classList.add('active');

    }else{
       pwdField.type = 'password';

       pwdToggleBtn.classList.remove('active');
    }
}