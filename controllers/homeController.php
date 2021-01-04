<?php
class homeControleer extends controller {
    public function__construct(){
        parent::__construct();
    

        $u = new Users();
        if($u->isLogged() == false) {
            header("Location: ".BASE_URL."/login");
            exit;
        }
    }
    public function index(){
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();


        $this->loadTemplate('home', $data);
    }
}