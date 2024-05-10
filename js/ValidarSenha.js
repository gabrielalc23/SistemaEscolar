let insertPass  = document.getElementById('insertPass');
        let confirmPass = document.getElementById('confirmPass');
        
        function ValidarSenha() {
          if (insertPass.value != confirmPass.value) {
            confirmPass.setCustomValidity("Senhas diferentes!");
            confirmPass.reportValidity();
            return false;
          } else {
            confirmPass.setCustomValidity("");
            return true;
          }
        }
        confirmPass.addEventListener('input', ValidarSenha);
        
        



