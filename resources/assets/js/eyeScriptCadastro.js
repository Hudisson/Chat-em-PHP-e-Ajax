// Obter os icones de olhos campos html do form cadastro
const pwdToggleBtn = document.querySelector("form .field i");
const pwdToggleBtn2 = document.querySelector("form .field-rsenha i");

// obter os tipos dos inputs
const pwdField = document.querySelector("form .field input[type='password']");
const pwdField2 = document.querySelector("form .field-rsenha input[type='password']");

pwdToggleBtn.onclick = ()=>{
    eyeIconsCadastro();
}

pwdToggleBtn2.onclick = ()=>{
    eyeIconsCadastro();
}

// Ação para mudar os icones
function eyeIconsCadastro(){

    if(pwdField.type == 'password' ){
        pwdField.type = 'text';
        pwdField2.type = 'text';

        pwdToggleBtn.classList.add('active');
        pwdToggleBtn2.classList.add('active');

    }else{
       pwdField.type = 'password';
       pwdField2.type = 'password';

       pwdToggleBtn.classList.remove('active');
       pwdToggleBtn2.classList.remove('active');
    }
}