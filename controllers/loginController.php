<?php
class loginController extends controller {

        public function index(){
           $data = array();

           if(isset($_POST['email']) && !empty($_POST['email'])) {
                   $email = addslashes($_POST['email']);
                   $pass = addslashes($_POST['passwoerd']);

                   $u = new Users();
                   
                   if($u->doLogin($email, $pass)) {
                           header("Location: ".BASE_URL);
                           exit;
                   } else {
                           $data['error'] = 'Email ou senha incorretos';
                   }
           }
           
           $this->loadView('login', $data);

        }
        
}