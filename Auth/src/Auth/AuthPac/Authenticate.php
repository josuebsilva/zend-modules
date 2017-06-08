<?php
    namespace Auth\AuthPac;
    use Zend\Authentication\AuthenticationService;

    class Authenticate{
        public function auth(){
            $auth = new AuthenticationService();
            $auth->authenticate();
        }
    }
?>