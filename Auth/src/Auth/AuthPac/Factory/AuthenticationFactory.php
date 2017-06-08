<?php
    namespace Auth\AuthPac\Factory;
    use Auth\Adapter\Adapter;
    use Interop\Container\ContainerInterface;
    use Interop\Container\Exception\ContainerException;
    use Zend\Authentication\AuthenticationService;
    use Zend\ServiceManager\Exception\ServiceNotCreatedException;
    use Zend\ServiceManager\Exception\ServiceNotFoundException;
    use Zend\ServiceManager\ServiceLocatorInterface;
    use Zend\Authentication\Storage\Session;
    use Zend\ServiceManager\Factory\FactoryInterface;

    class AuthenticationFactory implements FactoryInterface {


        /**
         * Create an object
         *
         * @param  ContainerInterface $container
         * @param  string $requestedName
         * @param  null|array $options
         * @return object
         * @throws ServiceNotFoundException if unable to resolve the service.
         * @throws ServiceNotCreatedException if an exception is raised when
         *     creating a service.
         * @throws ContainerException if any other error occurs
         */
        public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
        {
            return new AuthenticationService(new Session(), new Adapter($container,  $container->get(\Doctrine\ORM\EntityManager::class)));
        }
    }
?>