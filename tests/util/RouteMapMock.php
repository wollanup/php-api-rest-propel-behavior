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
        public function add($method, $pattern): RouteInterface
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
        public function delete($pattern): RouteInterface
        {
        }
    
        /**
         * self::add('GET', $pattern) shortcut
         *
         * @param $pattern
         *
         * @return RouteInterface
         */
        public function get($pattern): RouteInterface
        {
        }
    
        /**
         * @return string|ActionInterface
         */
        public function getActionClass(): string
        {
        }
    
        /**
         * @return ContainerInterface
         */
        public function getContainer(): ContainerInterface
        {
            // TODO: Implement getContainer() method.
        }
    
        /**
         * @param ContainerInterface $c
         *
         * @return RouteMapInterface
         */
        public function setContainer(ContainerInterface $c): RouteMapInterface
        {
            // TODO: Implement setContainer() method.
        }
        
        /**
         * @return string
         */
        public function getPackage(): string
        {
            // TODO: Implement getPackage() method.
        }
    
        /**
         * @return string
         */
        public function getPrefix(): string
        {
            // TODO: Implement getPrefix() method.
        }
    
        /**
         * @return string
         */
        public function getResource(): string
        {
            // TODO: Implement getResource() method.
        }
    
        /**
         * @return bool
         */
        public function hasPackage(): bool
        {
            // TODO: Implement hasPackage() method.
        }
    
        /**
         * @return bool
         */
        public function isSubResourceOfPackage(): bool
        {
            // TODO: Implement isSubResourceOfPackage() method.
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
        public function patch($pattern): RouteInterface
        {
            // TODO: Implement patch() method.
        }
    
        /**
         * self::add('POST', $pattern) shortcut
         *
         * @param $pattern
         *
         * @return RouteInterface
         */
        public function post($pattern): RouteInterface
        {
            // TODO: Implement post() method.
        }
    
        /**
         * self::add('PUT', $pattern) shortcut
         *
         * @param $pattern
         *
         * @return RouteInterface
         */
        public function put($pattern): RouteInterface
        {
            // TODO: Implement put() method.
        }
    
        public function registerRoutes(RouterInterface $router) { }
    
        public function rewind() { }
    
        public function valid() { }
    }
}
