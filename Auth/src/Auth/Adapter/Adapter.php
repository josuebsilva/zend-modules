<?php
    namespace Auth\Adapter;

    use User\Entity\User;
    use Zend\Authentication\Adapter\AdapterInterface;
    use Zend\Authentication\Result;
    use Zend\ServiceManager\ServiceManager;

    class Adapter implements AdapterInterface{

        private $user;
        private $pass;
        private $serviceLocator;
        /**
         * @var $entityManager \Doctrine\ORM\EntityManager
         * */
        protected $entityManager;

        public function __construct($serviceLocator, $entityManager){
            $this->serviceLocator = $serviceLocator;
            $this->entityManager  = $entityManager;
        }

        /**
         * @param mixed $user
         */
        public function setUser($user)
        {
            $this->user = $user;
        }

        /**
         * @param mixed $pass
         */
        public function setPass($pass)
        {
            $this->pass = $pass;
        }


        public function authenticate(){
            /**
             * @var $user \User\Entity\User
             * */
            $user = $this->entityManager->getRepository(User::class)->findBy([
                "email" => $this->user,
                "pass"  => $this->pass
            ]);

            if($user != false){
                return new Result(Result::SUCCESS, $user, array());
            }

            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array());
        }
    }
    