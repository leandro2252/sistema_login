<?php

    class listaErrores extends Db{

        //ESTAS FUNCIONES RETORNAN UN VALOR BOOLEANO
        public function checkUserNameReturnBool($userName){
            if(!empty($userName) && strlen($userName) >= 2){
                return true;
            }
            else{
                return false;
            }
        }

        public function checkPasswordReturnBool($password){
            if(!empty($password) && strlen($password) > 3){
                return true;
            }
            else{
                return false;
            }
        }

        public function checkEmailReturnBool($email){
            if(!empty($email) && strpos($email, '@') !== false && strpos($email, '.com') !== false && $this->searchEmail($email) == false){
                return true;
            }
            else{
                return false;
            }
        }

        //---------------------------------------------------------------

        //ESTAS FUNCIONES RETORNAN UN ITEM DE TIPO P
        public function checkUserNameReturnP($userName) {
            if (empty($userName)){
                return '<p class="formulario__p-invalid--registerAccount"><i class="fas fa-exclamation-triangle"></i> don\'t leave username field empty</p>';
            }
            else{
                return null;
            }
        }

        public function checkPasswordReturnP($password) {
            if(empty($password)){
                return '<p class="formulario__p-invalid--registerAccount"><i class="fas fa-exclamation-triangle"></i> don\'t leave password field empty</p>';
            }
            else if(strlen($password) < 3){
                return '<p class="formulario__p-invalid--registerAccount"><i class="fas fa-exclamation-triangle"></i> enter a password with a length greater than or equal to three numbers</p>';
            }
        }

        public function checkEmailReturnP($email) {
            echo "ESTO DEVUELVE CHECKEMAIL: " . $this->checkEmailReturnBool($email) . "<br>";
            if(empty($email)){
                return '<p class="formulario__p-invalid--registerAccount"><i class="fas fa-exclamation-triangle"></i> don\'t leave email field empty</p>';
            }
            else if($this->searchEmail($email) != false) {
                return '<p class="formulario__p-invalid--registerAccount"><i class="fas fa-exclamation-triangle"></i> the email address is already in use</p>';
            }
            else if(strpos($email, '@') === false) {
                return '<p class="formulario__p-invalid--registerAccount"><i class="fas fa-exclamation-triangle"></i> enter a valid email address</p>';
            }
            else if(strpos($email, '.com') === false){
                return '<p class="formulario__p-invalid--registerAccount"><i class="fas fa-exclamation-triangle"></i> enter a valid email address</p>';
            }
            else{
                return null;
            }
        }

    }

?>