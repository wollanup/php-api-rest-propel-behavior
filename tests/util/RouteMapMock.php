<?php
namespace Eukles\RouteMap {
    
    use Eukles\Action\ActionInterface;
    use Eukles\Service\Router\RouteInterface;
    use Eukles\Service\Router\RouterInterface;
    use Psr\Container\ContainerInterface;
    
    class RouteMapMock implements RouteMapInterface
    {

        protected $container;

        public function __construct(ContainerInterface $container)
        {
            $this->container = $container;
        }
    
        /**
         * Adds a route to this RouteMap
         *
         * @param $method
         * @param $pattern
         *
         * @return RouteInterface
         */
        public function add($method, $pattern)
        {
        }

        public function current() { }
    
        /**
         * self::add('DELETE', $pattern) shortcut
         *
         * @param $pattern
         *
         * @return RouteInterface
         */
        public function delete($pattern)
        {
        }
    
        /**
         * self::add('GET', $pattern) shortcut
         *
         * @param $pattern
         *
         * @return RouteInterface
         */
        public function get($pattern)
        {
        }
    
        /**
         * @return string|ActionInterface
         */
        public function getActionClass()
        {
        }

        public function getContainer() { }

        public function getPackage() { }
    
        /**
         * @return string
         */
        public function getPrefix()
        {
        }
    
        /**
         * @return string
         */
        public function getResource()
        {
        }
    
        /**
         * @return bool
         */
        public function hasPackage()
        {
        }
    
        /**
         * @return bool
         */
        public function isSubResourceOfPackage()
        {
        }
    
        public function key() { }
    
        public function next() { }
    
        /**
         * self::add('PATCH', $pattern) shortcut
         *
         * @param $pattern
         *
         * @return RouteInterface
         */
        public function patch($pattern)
        {
        }
    
        /**
         * self::add('POST', $pattern) shortcut
         *
         * @param $pattern
         *
         * @return RouteInterface
         */
        public function post($pattern)
        {
        }
    
        /**
         * self::add('PUT', $pattern) shortcut
         *
         * @param $pattern
         *
         * @return RouteInterface
         */
        public function put($pattern)
        {
        }
    
        public function registerRoutes(RouterInterface $router) { }
    
        public function rewind() { }
    
        public function valid() { }
    }
}
